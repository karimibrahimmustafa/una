<?php defined('BX_DOL') or die('hack attempt');
/**
 * Copyright (c) UNA, Inc - https://una.io
 * MIT License - https://opensource.org/licenses/MIT
 *
 * @defgroup    UnaBaseView UNA Base Representation Classes
 * @{
 */

/**
 * Privacy representation.
 * @see BxDolPrivacy
 */
class BxBasePrivacy extends BxDolPrivacy
{
    protected $_oTemplate;

    protected $_sJsObjClass;
    protected $_sJsObjName;

    public function __construct ($aOptions, $oTemplate)
    {
        parent::__construct ($aOptions);

        if ($oTemplate)
            $this->_oTemplate = $oTemplate;
        else
            $this->_oTemplate = BxDolTemplate::getInstance();

        $this->_sJsObjClass = 'BxDolPrivacy';
        $this->_sJsObjName = 'oBxDolPrivacy' . bx_gen_method_name($this->_sObject);

        $sHtmlId = str_replace(array('_' , ' '), array('-', '-'), $this->_sObject);
        $this->_aHtmlIds = array(
            'group_element' => 'bx-form-element-' . $this->convertActionToField($this->_aObject['action']),
            'group_custom_element' => 'sys-pgc-' . $sHtmlId,
            'users_select_popup' => 'sys-privacy-usp-' . $sHtmlId . '-'
        );
    }

    public function getJsObjectName()
    {
        return $this->_sJsObjName;
    }

    /**
     * Get initialization section of comments box
     *
     * @return string
     */
    public function getJsScript($bDynamicMode = false)
    {
        $aParams = array(
            'sObject' => $this->_sObject,
            'sObjName' => $this->_sJsObjName,
            'sRootUrl' => BX_DOL_URL_ROOT,
            'aGroupSettings' => $this->_aGroupsSettings,
            'aHtmlIds' => $this->_aHtmlIds
        );

        return $this->addCssJs($bDynamicMode) . $this->_oTemplate->_wrapInTagJsCode("if(window['" . $this->_sJsObjName . "'] == undefined) var " . $this->_sJsObjName . " = new " . $this->_sJsObjClass . "(" . json_encode($aParams) . ");");
    }

    protected function addCssJs($bDynamicMode = false)
    {
        $sInclude = '';

        $sInclude .= $this->_oTemplate->addJs(array(
            'jquery-ui/jquery-ui.custom.min.js',
            'jquery-ui/jquery.ui.widget.min.js', 
            'jquery-ui/jquery.ui.autocomplete.min.js', 
            'BxDolPrivacy.js'
        ), $bDynamicMode);

        $sInclude .= $this->_oTemplate->addCss(array(
            'forms.css', 
            'privacy.css'
        ), $bDynamicMode);

        return $bDynamicMode ? $sInclude : '';
    }

    protected function getSelectGroup($aValues = array(), $aParams = array())
    {
        $sJsObject = $this->getJsObjectName();

        $oForm = BxDolForm::getObjectInstance($this->_sFormUsers, $this->_sFormDisplayUsersSelect);
        $oForm->initChecker($aValues);

        if($oForm->isSubmittedAndValid()) {
            $aMembers = array();
            if(($aMembersSearch = $oForm->getCleanValue('search')) !== false)
                $aMembers = array_merge($aMembers, $aMembersSearch);

            if(($aMembersList = $oForm->getCleanValue('list')) !== false)
                $aMembers = array_merge($aMembers, $aMembersList);

            $aMembers = array_unique($aMembers);
            if(empty($aMembers) || !is_array($aMembers))
                return array();

            $iGroupCustomId = $oForm->getGroupCustomId();
            if(!$iGroupCustomId) {
                $this->deleteGroupCustom(array(
                    'profile_id' => $oForm->getCleanValue('profile_id'),
                    'content_id' => $oForm->getCleanValue('content_id'),
                    'object' => $oForm->getCleanValue('object')
                ));

                $iGroupCustomId = $oForm->insert();
                foreach($aMembers as $iMemberId)
                    $this->_oDb->insertGroupCustomMember(array('group_id' => $iGroupCustomId, 'member_id' => $iMemberId));
            }
            else {
                $this->_oDb->deleteGroupCustomMember(array('group_id' => $iGroupCustomId));

                foreach($aMembers as $iMemberId)
                    $this->_oDb->insertGroupCustomMember(array('group_id' => $iGroupCustomId, 'member_id' => $iMemberId));
            }

            return array('eval' => $sJsObject . '.onSelectUsers(oData);', 'content' => $oForm->getElementGroupCustom(array(
                'value' => $iGroupCustomId, 
                'value_members' => $aMembers
            )));
        }

        $iGroupId = $oForm->getGroupId();
        $sContent = BxTemplFunctions::getInstance()->transBox($this->_aHtmlIds['users_select_popup'] . $iGroupId, $this->_oTemplate->parseHtmlByName('privacy_users_select_popup.html', array(
            'js_object' => $sJsObject,
            'group' => $iGroupId,
            'form' => $oForm->getCode(),
            'form_id' => $oForm->getId()
        )));

        $aResult = array('popup' => array('html' => $sContent, 'options' => array('closeOnOuterClick' => false)));
        if(isset($aParams['popup_only']) && (bool)$aParams['popup_only'] === true)
            return $aResult;

        return array_merge($aResult, array(
            'eval' => $sJsObject . '.onSelectGroup(oData);', 
            'content' => $oForm->getElementGroupCustom()
        ));
    }
}

/** @} */
