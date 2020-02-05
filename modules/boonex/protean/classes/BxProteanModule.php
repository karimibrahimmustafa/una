<?php defined('BX_DOL') or die('hack attempt');
/**
 * Copyright (c) UNA, Inc - https://una.io
 * MIT License - https://opensource.org/licenses/MIT
 *
 * @defgroup    Protean Protean template
 * @ingroup     UnaModules
 *
 * @{
 */

bx_import ('BxBaseModTemplateModule');

class BxProteanModule extends BxBaseModTemplateModule
{
    function __construct(&$aModule)
    {
        parent::__construct($aModule);
    }

    public function serviceGetOptionsFormInputEditorSkin()
    {
        $aResultError = array(
            array('key' => '', 'value' => _t('_bx_protean_stg_cpt_option_form_input_editor_skin_unavailable'))
        );

        $oEditor = BxDolEditor::getObjectInstance();
        if(!$oEditor)
            return $aResultError;

        $aSkins = $oEditor->getSkins();
        if(empty($aSkins) || !is_array($aSkins))
            return $aResultError;

        return array_merge(array(
            array('key' => '', 'value' => _t('_bx_protean_stg_cpt_option_form_input_editor_skin_select'))
        ), $aSkins);
    }

    function serviceIncludeCssJs()
    {
        if(BxDolTemplate::getInstance()->getCode() != $this->_oConfig->getUri())
            return '';

    	$sCss = trim(getParam($this->_oConfig->getName() . '_styles_custom'));
        return !empty($sCss) ? $this->_oTemplate->_wrapInTagCssCode($sCss) : '';
    }
}

/** @} */
