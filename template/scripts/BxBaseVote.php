<?php defined('BX_DOL') or die('hack attempt');
/**
 * Copyright (c) UNA, Inc - https://una.io
 * MIT License - https://opensource.org/licenses/MIT
 *
 * @defgroup    UnaBaseView UNA Base Representation Classes
 * @{
 */

/**
 * @see BxDolVote
 */
class BxBaseVote extends BxDolVote
{
    protected static $_sTmplContentElementBlock;
    protected static $_sTmplContentElementInline;
    protected static $_sTmplContentCounter;

    protected $_aElementDefaults;

    protected $_bCssJsAdded;

    protected $_sJsClsName;
    protected $_sJsObjName;
    protected $_sStylePrefix;

    protected $_aHtmlIds;

    protected $_sTmplNameLegend;
    protected $_sTmplNameByList;

    public function __construct($sSystem, $iId, $iInit = true, $oTemplate = false)
    {
        parent::__construct($sSystem, $iId, $iInit, $oTemplate);

        $this->_aElementDefaults = array();

        $this->_bCssJsAdded = false;
        $this->_sStylePrefix = 'bx-vote';

        $this->_sJsClsName = 'BxDolVote';
        $this->_sJsObjName = 'oVote' . bx_gen_method_name($sSystem, array('_' , '-')) . $iId;

        $sHtmlId = str_replace(array('_' , ' '), array('-', '-'), $sSystem) . '-' . $iId;
        $this->_aHtmlIds = array(
            'counter' => 'bx-vote-counter-' . $sHtmlId,
            'by_popup' => 'bx-vote-by-popup-' . $sHtmlId
        );

        $this->_sTmplNameLegend = 'vote_legend.html';
        $this->_sTmplNameByList = 'vote_by_list.html';

        if(empty(self::$_sTmplContentElementBlock))
            self::$_sTmplContentElementBlock = $this->_oTemplate->getHtml('vote_element_block.html');

        if(empty(self::$_sTmplContentElementInline))
            self::$_sTmplContentElementInline = $this->_oTemplate->getHtml('vote_element_inline.html');

        if(empty(self::$_sTmplContentCounter))
            self::$_sTmplContentCounter = $this->_oTemplate->getHtml('vote_counter.html');
    }

    public function getJsClassName()
    {
        return $this->_sJsClsName;
    }

    public function getJsObjectName()
    {
        return $this->_sJsObjName;
    }

    public function getJsScript($bDynamicMode = false)
    {
        $aParams = array(
            'sObjName' => $this->_sJsObjName,
            'sSystem' => $this->getSystemName(),
            'iAuthorId' => $this->_getAuthorId(),
            'iObjId' => $this->getId(),
            'sRootUrl' => BX_DOL_URL_ROOT,
            'sStylePrefix' => $this->_sStylePrefix,
            'aHtmlIds' => $this->_aHtmlIds
        );
        $sCode = "var " . $this->getJsObjectName() . " = new " . $this->getJsClassName() . "(" . json_encode($aParams) . ");";

        return $this->_oTemplate->_wrapInTagJsCode($sCode);
    }

    public function getJsClick($iValue = 0)
    {
        return $this->getJsObjectName() . '.vote(this, ' . $iValue . ')';
    }

    public function getJsClickCounter($aParams = array())
    {
        return $this->getJsObjectName() . '.toggleByPopup(this)';
    }

    public function getCounter($aParams = array())
    {
        $bShowEmpty = isset($aParams['show_counter_empty']) && $aParams['show_counter_empty'] == true;
        $bAllowedViewViewVoters = $this->isAllowedVoteViewVoters();

        $sClass = $this->_sStylePrefix . '-counter';
        if(!empty($aParams['class_counter']))
            $sClass .= $aParams['class_counter'];

        $aTmplVarsAttrs = array(
            array('key' => 'class', 'value' => $sClass),
        );

        if($bAllowedViewViewVoters)
            $aTmplVarsAttrs = array_merge($aTmplVarsAttrs, array(
                array('key' => 'href', 'value' => 'javascript:void(0)'),
                array('key' => 'title', 'value' => bx_html_attribute($this->_getTitleDoBy($aParams))),
                array('key' => 'onclick', 'value' => 'javascript:' . $this->getJsClickCounter($aParams))
            ));

        $sHtmlId = isset($aParams['id_counter']) ? $aParams['id_counter'] : $this->_aHtmlIds['counter'];
        if(!empty($sHtmlId))
            $aTmplVarsAttrs[] = array('key' => 'id', 'value' => $sHtmlId);

        $aVote = !empty($aParams['vote']) && is_array($aParams['vote']) ? $aParams['vote'] : $this->_getVote();
        $sContent = $bShowEmpty || (int)$aVote['count'] > 0 ? $this->_getLabelCounter($aVote['count'], $aParams) : '';

        return $this->_oTemplate->parseHtmlByContent($this->_getTmplContentCounter(), array(
            'bx_if:show_text' => array(
                'condition' => !$bAllowedViewViewVoters,
                'content' => array(
                    'bx_repeat:attrs' => $aTmplVarsAttrs,
                    'content' => $sContent
                )
            ),
            'bx_if:show_link' => array(
                'condition' => $bAllowedViewViewVoters,
                'content' => array(
                    'bx_repeat:attrs' => $aTmplVarsAttrs,
                    'content' => $sContent
                )
            ),
            'bx_repeat:attrs' => $aTmplVarsAttrs,
            'content' => $sContent
        ));
    }

    public function getLegend($aParams = array())
    {
        return '';
    }

    public function getElementBlock($aParams = array())
    {
        $aParams['usage'] = BX_DOL_VOTE_USAGE_BLOCK;

        return $this->getElement($aParams);
    }

    public function getElementInline($aParams = array())
    {
        $aParams['usage'] = BX_DOL_VOTE_USAGE_INLINE;

        return $this->getElement($aParams);
    }

    public function getElement($aParams = array())
    {
        $sMethod = '_getTmplContentElement' . bx_gen_method_name(!empty($aParams['usage']) ? $aParams['usage'] : BX_DOL_VOTE_USAGE_DEFAULT);
        if(!method_exists($this, $sMethod))
            return '';

        $aTmplVars = $this->_getTmplVarsElement($aParams);
        if(empty($aTmplVars) || !is_array($aTmplVars))
            return '';

        return $this->_oTemplate->parseHtmlByContent($this->$sMethod(), $aTmplVars);
    }

    /**
     * Internal methods.
     * 
     * This method should be overwritten by subclass.
     */
    protected function _getTmplVarsElement($aParams = array())
    {
    	$aParams = array_merge($this->_aElementDefaults, $aParams);

    	$bDynamicMode = isset($aParams['dynamic_mode']) && $aParams['dynamic_mode'] === true;
        $bShowCounterEmpty = isset($aParams['show_counter_empty']) && $aParams['show_counter_empty'] == true;

        $iObjectId = $this->getId();
        $iAuthorId = $this->_getAuthorId();

        $bCount = $this->_isCount();
        $isAllowedVote = $this->isAllowedVote();
        $isAllowedVoteView = $this->isAllowedVoteView();
        $aParams['is_voted'] = $this->isPerformed($iObjectId, $iAuthorId);
        $aParams['track'] = $aParams['is_voted'] ? $this->_getTrack($iObjectId, $iAuthorId) : array();

        //--- Do Vote
        $bTmplVarsDoVote = $this->_isShowDoVote($aParams, $isAllowedVote, $bCount);
        $aTmplVarsDoVote = array();
        if($bTmplVarsDoVote)
            $aTmplVarsDoVote = array(
                'style_prefix' => $this->_sStylePrefix,
                'do_vote' => $this->_getDoVote($aParams, $isAllowedVote),
            );

        //--- Counter
        $bTmplVarsCounter = $this->_isShowCounter($aParams, $isAllowedVote, $isAllowedVoteView, $bCount);
        $aTmplVarsCounter = array();
        if($bTmplVarsCounter)
            $aTmplVarsCounter = array(
                'style_prefix' => $this->_sStylePrefix,
                'bx_if:show_hidden' => array(
                    'condition' => !$bCount && !$bShowCounterEmpty,
                    'content' => array()
                ),
                'counter' => $this->getCounter($aParams)
            );

        //--- Legend
        $bTmplVarsLegend = $this->_isShowLegend($aParams, $isAllowedVote, $isAllowedVoteView, $bCount);
        $aTmplVarsLegend = array();
        if($bTmplVarsLegend)
            $aTmplVarsLegend = array(
                'legend' => $this->getLegend($aParams)
            );

        if(!$bTmplVarsDoVote && !$bTmplVarsCounter && !$bTmplVarsLegend)
            return array();

        $sClass = $this->_sStylePrefix . '-' . $this->_sType;
        if(!empty($aParams['class_element']))
            $sClass .= $aParams['class_element'];

        return array(
            'style_prefix' => $this->_sStylePrefix,
            'html_id' => $this->_aHtmlIds['main'],
            'class' => $sClass,
            'bx_if:show_vote_data' => array(
                'condition' => false,
                'content' => array()
            ),
            'bx_if:show_do_vote' => array(
                'condition' => $bTmplVarsDoVote,
                'content' => $aTmplVarsDoVote
            ),
            'bx_if:show_counter' => array(
                'condition' => $bTmplVarsCounter,
                'content' => $aTmplVarsCounter
            ),
            'bx_if:show_legend' => array(
            	'condition' => $bTmplVarsLegend,
            	'content' => $aTmplVarsLegend
            ),
            'script' => $this->getJsScript($bDynamicMode)
        );
    }

    protected function _getDoVote($aParams = array(), $isAllowedVote = true)
    {
        return '';
    }

    protected function _getLabelCounter($iCount, $aParams = array())
    {
        return _t('_vote_counter', $iCount);
    }

    protected function _getVotedBy($aParams = array())
    {
        $aTmplUsers = array();

        $aUserIds = $this->_oQuery->getPerformedBy($this->getId());
        foreach($aUserIds as $iUserId) {
            list($sUserName, $sUserUrl, $sUserIcon, $sUserUnit) = $this->_getAuthorInfo($iUserId);
            $aTmplUsers[] = array(
                'style_prefix' => $this->_sStylePrefix,
                'user_unit' => $sUserUnit
            );
        }

        if(empty($aTmplUsers))
            $aTmplUsers = MsgBox(_t('_Empty'));

        return $this->_oTemplate->parseHtmlByName($this->_sTmplNameByList, array(
            'style_prefix' => $this->_sStylePrefix,
            'bx_repeat:list' => $aTmplUsers
        ));
    }

    protected function _isShowDoVote($aParams, $isAllowedVote, $bCount)
    {
        return !isset($aParams['show_do_vote']) || $aParams['show_do_vote'] == true;
    }

    protected function _isShowCounter($aParams, $isAllowedVote, $isAllowedVoteView, $bCount)
    {
        return isset($aParams['show_counter']) && $aParams['show_counter'] === true && $isAllowedVoteView && ($isAllowedVote || $bCount);
    }

    protected function _isShowLegend($aParams, $isAllowedVote, $isAllowedVoteView, $bCount)
    {
        return false;
    }

    protected function _getTmplContentElementBlock()
    {
        return self::$_sTmplContentElementBlock;
    }

    protected function _getTmplContentElementInline()
    {
        return self::$_sTmplContentElementInline;
    }

    protected function _getTmplContentCounter()
    {
        return self::$_sTmplContentCounter;
    }
}

/** @} */
