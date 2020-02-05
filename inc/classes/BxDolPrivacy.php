<?php defined('BX_DOL') or die('hack attempt');
/**
 * Copyright (c) UNA, Inc - https://una.io
 * MIT License - https://opensource.org/licenses/MIT
 *
 * @defgroup    UnaCore UNA Core
 * @{
 */

define('BX_DOL_PG_HIDDEN', '1');
define('BX_DOL_PG_MEONLY', '2');
define('BX_DOL_PG_ALL', '3');
define('BX_DOL_PG_MEMBERS', '4');
define('BX_DOL_PG_FRIENDS', '5');
define('BX_DOL_PG_FRIENDS_SELECTED', '6');
define('BX_DOL_PG_RELATIONS', '7');
define('BX_DOL_PG_RELATIONS_SELECTED', '8');
define('BX_DOL_PG_CUSTOM', '9');

define('BX_DOL_PG_DEFAULT', BX_DOL_PG_ALL);

/**
 * Privacy settings for any content.
 *
 * Integration of the content with privacy engine allows site member
 * to organize the access to his content.
 *
 * In addition to regular privacy groups (Public, Friends), spaces are supported. 
 * When some space (usually some another profile) is specified as privacy, 
 * then another profile visibility is used to check the privacy.
 *
 * Related classes:
 *  BxDolPrivacyQuery - database queries.
 *
 * Example of usage:
 * 1. Register your privacy actions in `sys_privacy_actions` database table.
 * 2. Add one privacy field(with INT type) in the table with your items for each action.
 *    For example, for action 'comment', the field name should be 'allow_comment_to'.
 * 3. Add group choosers for necessary actions in the form, which is used to add new items.
 * @code
 *    $oPrivacy = new BxDolPrivacy();
 *    $oPrivacy->getGroupChooser($iItemOwnerId, $sModuleUri, $sModuleAction);
 * @endcode
 *
 * 4. Check privacy when any user tries to view an item.
 * @code
 *    $oPrivacy = new BxDolPrivacy($sTable, $sFieldId, $sFieldOwnerId);
 *    if($oPrivacy->check($sAction, $iObjectId, $iViewerId)) {
 *     //show necessary content
 *    }
 * @endcode
 *
 *    @see an example of integration in BoonEx modules, for example: Posts
 *
 *
 * Memberships/ACL:
 * Doesn't depend on user's membership.
 *
 *
 * Alerts:
 * no alerts available
 *
 */
class BxDolPrivacy extends BxDolFactory implements iBxDolFactoryObject
{
    protected $_oDb;
    protected $_sObject;
    protected $_aObject;

    protected $_aGroupsSettings;
    protected $_aGroupsExclude;
    
    protected $_sFormUsers;
    protected $_sFormDisplayUsersSelect;

    /**
     * Constructor
     * @param $aObject array of grid options
     */
    protected function __construct($aObject)
    {
        parent::__construct();

        $this->_aObject = $aObject;
        $this->_sObject = $aObject['object'];

        $this->_oDb = new BxDolPrivacyQuery();
        $this->_oDb->init($this->_aObject);

        $this->_aGroupsSettings = array(
            BX_DOL_PG_FRIENDS_SELECTED => array('connection' => 'sys_profiles_friends'),
            BX_DOL_PG_RELATIONS_SELECTED => array('connection' => 'sys_profiles_relations')
        );

        $this->_aGroupsExclude = array();

        $this->_sFormUsers = 'sys_privacy_group_custom';
        $this->_sFormDisplayUsersSelect = 'sys_privacy_group_custom_manage';
    }

    /**
     * Get privacy object instance by object name
     * @param $sObject object name
     * @return object instance or false on error
     */
    public static function getObjectInstance($sObject)
    {
        if(isset($GLOBALS['bxDolClasses']['BxDolPrivacy!' . $sObject]))
            return $GLOBALS['bxDolClasses']['BxDolPrivacy!' . $sObject];

        $aObject = BxDolPrivacyQuery::getPrivacyObject($sObject);
        if(!$aObject || !is_array($aObject))
            return false;

        $sClass = 'BxTemplPrivacy';
        if(!empty($aObject['override_class_name'])) {
            $sClass = $aObject['override_class_name'];
            if(!empty($aObject['override_class_file']))
                require_once(BX_DIRECTORY_PATH_ROOT . $aObject['override_class_file']);
        }

        $o = new $sClass($aObject);
        return ($GLOBALS['bxDolClasses']['BxDolPrivacy!' . $sObject] = $o);
    }

    /**
     * Get Select element with available groups.
     *
     * @param  string  $sObject  privacy object name.
     * @param  integer $iOwnerId object's owner ID.
     * @param  array   $aParams  an array of custom selector's params (dynamic_groups - an array of arrays('key' => group_id, 'value' => group_title), title - the title to be used for generated field).
     * @return an      array with Select element description.
     */
    public static function getGroupChooser($sObject, $iOwnerId = 0, $aParams = array())
    {
        $oPrivacy = BxDolPrivacy::getObjectInstance($sObject);
        if(empty($oPrivacy))
            return array();

        $sModule = $oPrivacy->_aObject['module'];
        $sAction = $oPrivacy->_aObject['action'];

        if($iOwnerId == 0)
            $iOwnerId = bx_get_logged_profile_id();

        $sValue = $oPrivacy->_oDb->getDefaultGroupByUser($sModule, $sAction, $iOwnerId);
        if(empty($sValue))
            $sValue = $oPrivacy->_oDb->getDefaultGroup($sModule, $sAction);

        $aValues = $oPrivacy->getGroups();

        $aValues = $oPrivacy->addDynamicGroups($aValues, $iOwnerId, $aParams);

        $aValues = $oPrivacy->addAclGroups($aValues, $iOwnerId, $aParams);

        $aValues = $oPrivacy->addSpaces($aValues, $iOwnerId, $aParams);

        $sName = $oPrivacy->convertActionToField($sAction);

        $sTitle = isset($aParams['title']) && !empty($aParams['title']) ? $aParams['title'] : '';
        if(empty($sTitle)) {
            $sTitle = $oPrivacy->_oDb->getTitle($sModule, $sAction);
            $sTitle = _t(!empty($sTitle) ? $sTitle : '_' . $sName);
        }

        return array(
            'type' => 'select',
            'name' => $sName,
            'caption' => $sTitle,
            'value' => $sValue,
            'values' => $aValues,
            'attrs' => array(
                'class' => 'sys-privacy-group',
                'onchange' => 'javascript: ' . $oPrivacy->getJsObjectName() . '.selectGroup(this);'
            ),
            'checker' => array(
                'func' => 'avail',
                'error' => _t('_sys_ps_ferr_incorrect_select')
            ),
            'db' => array(
                'pass' => 'Int'
            ),
            'content' => $oPrivacy->getJsScript()
        );
    }

    public function actionLoadGroupCustom()
    {
        $iProfileId = (int)bx_get('profile_id');
        $iContentId = (int)bx_get('content_id');
        $iGroupId = (int)bx_get('group_id');

        $oForm = BxDolForm::getObjectInstance($this->_sFormUsers, $this->_sFormDisplayUsersSelect);
        return echoJson(array('eval' => $this->getJsObjectName() . '.onSelectGroup(oData);', 'content' => $oForm->getElementGroupCustom(array(
            'profile_id' => $iProfileId, 
            'content_id' => $iContentId, 
            'object' => $this->_sObject, 
            'group_id' => $iGroupId
        ))));
    }

    public function actionSelectGroup()
    {
        $aValues = array(
            'profile_id' => (int)bx_get('profile_id'),
            'content_id' => (int)bx_get('content_id'),
            'object' => $this->_sObject,
            'group_id' => (int)bx_get('group_id')
        );

        $aParams = array(
            'popup_only' => (bool)bx_get('popup_only')
        );

        if(!isset($this->_aGroupsSettings[$aValues['group_id']]))
            return echoJson(array());

        if($aValues['profile_id'] != bx_get_logged_profile_id())
            return echoJson(array('msg' => _t('_sys_ps_ferr_incorrect_gc_owner')));

        if(($mixedResult = $this->isSelectGroupCustom($aValues)) !== true)
            return echoJson(array('msg' => $mixedResult));

        return echoJson($this->getSelectGroup($aValues, $aParams));
    }

    public function actionUsersList()
    {
        $iGroup = (int)bx_get('group');
        if(!isset($this->_aGroupsSettings[$iGroup]))
            return echoJson(array());

        $oConnection = BxDolConnection::getObjectInstance($this->_aGroupsSettings[$iGroup]['connection']);
        if(!$oConnection)
            return echoJson(array());

        $iProfileId = bx_get_logged_profile_id();
        $aConnectedIds = $oConnection->getConnectedContent($iProfileId, true);
        if(empty($aConnectedIds) || !is_array($aConnectedIds))
            return echoJson(array());

        $sTerm = bx_get('term');
        $aProfiles = BxDolService::call('system', 'profiles_search', array($sTerm), 'TemplServiceProfiles');
        if(empty($aProfiles))
            return echoJson(array());
        
        $aResult = array();
        foreach($aProfiles as $aProfile)
            if(in_array($aProfile['value'], $aConnectedIds))
                $aResult[] = $aProfile;

        echoJson($aResult);
    }

    public function loadGroupCustom($iProfileId, $iContentId, $iGroupId, $aHtmlIds)
    {
        return $this->_oTemplate->_wrapInTagJsCode($this->getJsObjectName() . ".loadGroupCustom(" . json_encode(array(
            'iProfileId' => $iProfileId,
            'iContentId' => $iContentId,
            'iGroupId' => $iGroupId,
            'aHtmlIds' => $aHtmlIds
        )) . ");");
    }

    public function getGroupSettings($iGroup)
    {
        if(empty($this->_aGroupsSettings[$iGroup]) || !is_array($this->_aGroupsSettings[$iGroup]))
            return false;

        return $this->_aGroupsSettings[$iGroup];
    }

    public function getGroupCustom($aParams)
    {
        return $this->_oDb->getGroupCustom($aParams);
    }

    public function updateGroupCustom($aParamsSet, $aParamsWhere)
    {
        return $this->_oDb->updateGroupCustom($aParamsSet, $aParamsWhere);
    }

    public function deleteGroupCustom($aParamsWhere)
    {
        return $this->_oDb->deleteGroupCustom($aParamsWhere);
    }

    public function associateGroupCustomWithContent($iProfileId, $iContentId, $iGroupId)
    {
        return $this->updateGroupCustom(array('content_id' => $iContentId), array(
            'profile_id' => $iProfileId,
            'content_id' => 0,
            'object' => $this->_sObject,
            'group_id' => $iGroupId
        ));
    }

    public function reassociateGroupCustomWithContent($iProfileId, $iContentId, $iGroupId)
    {
        $aGroupCustom = $this->getGroupCustom(array(
            'type' => 'pco', 
            'profile_id' => $iProfileId,
            'content_id' => $iContentId,
            'object' => $this->_sObject
        ));

        if(!empty($aGroupCustom) && is_array($aGroupCustom) && $aGroupCustom['group_id'] != $iGroupId)
            $this->deleteGroupCustom(array('id' => $aGroupCustom['id']));

        return $this->associateGroupCustomWithContent($iProfileId, $iContentId, $iGroupId);
    }

    public function deleteGroupCustomByContentId($iContentId)
    {
        return $this->_oDb->deleteGroupCustom(array('content_id' => $iContentId, 'object' => $this->_sObject));
    }

    public function deleteGroupCustomByProfileId($iProfileId)
    {
        $aGroups = $this->_oDb->getGroupCustom(array('type' => 'profile_id', 'profile_id' => $iProfileId));
        if(empty($aGroups) || !is_array($aGroups))
            return true;

        foreach($aGroups as $aGroup)
            $this->_oDb->deleteGroupCustom(array('id' => $aGroup['id']));

        return true;
    }

    public function addDynamicGroups($aValues, $iOwnerId, $aParams)
    {
        if (isset($aParams['dynamic_groups']) && is_array($aParams['dynamic_groups']))
            $aValues = array_merge($aValues, $aParams['dynamic_groups']);

        return $aValues;
    }

    public function addAclGroups($aValues, $iOwnerId, $aParams)
    {
        $aLevels = BxDolAcl::getInstance()->getMemberships(false, true, true, true);
        if(empty($aLevels) || !is_array($aLevels))
            return $aValues;

        $aValues[] = array('type' => 'group_header', 'value' => mb_strtoupper(_t('_sys_privacy_groups_acl')));
        foreach($aLevels as $iId => $sTitle)
            $aValues[] = array('key' => 'ml' . $iId, 'value' => $sTitle);
        $aValues[] = array('type' => 'group_end');

        return $aValues;
    }

    public function addSpaces($aValues, $iOwnerId, $aParams)
    {
        if (!$this->_aObject['spaces'])
            return $aValues;

        if (!($oProfile = BxDolProfile::getInstance($iOwnerId)))
            return $aValues;

        if (!($aModules = BxDolModuleQuery::getInstance()->getModules()))
            return $aValues;

        $bProfileProcessed = true; // don't allow to post to profiles for now
        foreach ($aModules as $aModule) {
            if (!$aModule['enabled'])
                continue;

            if ('all' != $this->_aObject['spaces'] && false === stripos($this->_aObject['spaces'], $aModule['name']))
                continue;

            if (!BxDolRequest::serviceExists($aModule['name'], 'act_as_profile'))
                continue;

            $bActAsProfile = BxDolService::call($aModule['name'], 'act_as_profile');
            if ($bActAsProfile && $bProfileProcessed)
                continue;
            if ($bActAsProfile)
                $bProfileProcessed = true;

            $a = BxDolService::call($aModule['name'], 'get_participating_profiles', array($oProfile->id()));
            $aSpaces = array();            
            foreach ($a as $iProfileId) {
                if (!($o = BxDolProfile::getInstance($iProfileId)))
                    continue;
                $aSpaces[-$iProfileId] = array('key' => -$iProfileId, 'value' => $o->getDisplayName());
            }

            if ($aSpaces) {
                $aItemStart = array(array('type' => 'group_header', 'value' => mb_strtoupper(BxDolService::call($aModule['name'], 'get_space_title'))));
                $aItemEnd = array(array('type' => 'group_end'));
                $aValues = array_merge($aValues, $aItemStart, array_values($aSpaces), $aItemEnd);
            }
        }
        
        return $aValues;
    }
    
    /**
     * Get database field name for action.
     *
     * @param  string $sObject privacy object name.
     * @param  string $sAction action name.
     * @return string with field name.
     */
    public static function getFieldName($sObject, $sAction = '')
    {
    	$oPrivacy = BxDolPrivacy::getObjectInstance($sObject);
        if(empty($oPrivacy))
            return '';

		if(empty($sAction))
			$sAction = $oPrivacy->_aObject['action'];

        return $oPrivacy->convertActionToField($sAction);
    }

    /**
     * Get necessary condition array to use privacy in search classes
     * @param $mixedGroupId group ID or array of group IDs
     * @return array of conditions, for now with 'restriction' part only is returned
     */
    public function getContentByGroupAsCondition($mixedGroupId)
    {
        $aResult = array(
            'restriction' => array (
                'privacy_' . $this->_sObject => array(
                    'value' => $mixedGroupId,
                    'field' => $this->convertActionToField($this->_aObject['action']),
                    'operator' => is_array($mixedGroupId) ? 'in' : '=',
                    'table' => $this->_aObject['table'],
                ),
            ),
        );      
        bx_alert('system', 'privacy_condition', 0, false, array(
            'group_id' => $mixedGroupId,
            'field' => $this->convertActionToField($this->_aObject['action']),
            'object' => $this->_aObject,
            'privacy_object' => $this,
            'result' => &$aResult
            )
        );
        return $aResult;
    }

    /**
     * Get necessary condition array to use privacy in search classes
     * @param $iProfileIdOwner owner profile ID
     * @return array of conditions, for now with 'restriction' part only is returned
     */
    public function getContentPublicAsCondition($iProfileIdOwner = 0, $aCustomGroups = array())
    {
        $mixedPrivacyGroups = $this->getPrivacyGroupsForContentPublic($iProfileIdOwner, $aCustomGroups);
        if($mixedPrivacyGroups === true)
        	return array();

        return $this->getContentByGroupAsCondition($mixedPrivacyGroups);
    }

    /**
     * Get necessary parts of SQL query to use privacy in other queries
     * @param $mixedGroupId group ID or array of group IDs
     * @return array of SQL string parts, for now 'where' part only is returned
     */
    public function getContentByGroupAsSQLPart($mixedGroupId)
    {
        $sField = $this->convertActionToField($this->_aObject['action']);
        return $this->_oDb->getContentByGroupAsSQLPart($sField, $mixedGroupId);
    }

	/**
     * Get necessary parts of SQL query to use privacy in other queries
     * @param $iProfileIdOwner owner profile ID
     * @return array of SQL string parts, for now 'where' part only is returned
     */
    public function getContentPublicAsSQLPart($iProfileIdOwner = 0, $aCustomGroups = array())
    {
        $mixedPrivacyGroups = $this->getPrivacyGroupsForContentPublic($iProfileIdOwner, $aCustomGroups);
		if($mixedPrivacyGroups === true)
        	return array();

        return $this->getContentByGroupAsSQLPart($mixedPrivacyGroups);
    }

    /**
     * Check whether the viewer can make requested action.
     *
     * @param  integer $iObjectId object ID the action to be performed with.
     * @param  integer $iViewerId viewer ID.
     * @return boolean result of operation.
     */
    public function check($iObjectId, $iViewerId = 0)
    {
        if(empty($iViewerId))
            $iViewerId = (int)bx_get_logged_profile_id();

        $aObject = $this->getObjectInfo($this->convertActionToField($this->_aObject['action']), $iObjectId);
        if(empty($aObject) || !is_array($aObject))
            return false;

        if($aObject['group_id'] == BX_DOL_PG_HIDDEN)
            return false;

        if(isAdmin() || $iViewerId == $aObject['owner_id'])
            return true;

        if(strncmp($aObject['group_id'], 'ml', 2) === 0) {
            $iLevel = (int)substr($aObject['group_id'], 2);
            return (bool)BxDolAcl::getInstance()->isMemberLevelInSet(array($iLevel), $iViewerId);
        }

        if($aObject['group_id'] < 0)
            return $this->checkSpace($aObject, $iViewerId);

        $aGroup = $this->_oDb->getGroupsBy(array('type' => 'id', 'id' => $aObject['group_id']));
        if(!empty($aGroup) && is_array($aGroup) && (int)$aGroup['active'] == 1 && !empty($aGroup['check'])) {
            $sCheckMethod = $this->getCheckMethod($aGroup['check']);
            if(method_exists($this, $sCheckMethod) && $this->$sCheckMethod((substr($sCheckMethod, -8) == 'ByObject' ? $aObject : $aObject['owner_id']), $iViewerId))
                return true;
        }

        return $this->isDynamicGroupMember($aObject['group_id'], $aObject['owner_id'], $iViewerId, $iObjectId);
    }

    public function checkSpace($aObject, $iViewerId)
    {
        $oProfile = BxDolProfile::getInstance(-$aObject['group_id']);
        if (!$oProfile)
            return false;

        return CHECK_ACTION_RESULT_ALLOWED === BxDolService::call($oProfile->getModule(), 'check_space_privacy', array($oProfile->getContentId()));
    }

    public function checkMeOnly($iOwnerId, $iViewerId)
    {
        return false;
    }

    public function checkPublic($iOwnerId, $iViewerId)
    {
        return true;
    }

    public function checkMembers($iOwnerId, $iViewerId)
    {
        return isMember();
    }

    public function checkFriends($iOwnerId, $iViewerId)
    {
        return BxDolConnection::getObjectInstance('sys_profiles_friends')->isConnected($iOwnerId, $iViewerId, true);
    }

    public function checkFriendsSelectedByObject($aObject, $iViewerId)
    {
        if(!$this->checkFriends($aObject['owner_id'], $iViewerId))
            return false;

        $aGroupCustom = $this->getGroupCustom(array(
            'type' => 'pcog_ext', 
            'profile_id' => $aObject['owner_id'], 
            'content_id' => $aObject['id'], 
            'object' => $this->_sObject, 
            'group_id' => $aObject['group_id']
        ));

        return !empty($aGroupCustom['members']) && is_array($aGroupCustom['members']) && in_array($iViewerId, $aGroupCustom['members']);
    }

    public function checkRelations($iOwnerId, $iViewerId)
    {
        return BxDolConnection::getObjectInstance('sys_profiles_relations')->isConnected($aObject['owner_id'], $iViewerId, true);
    }

    public function checkRelationsSelectedByObject($aObject, $iViewerId)
    {
        if(!$this->checkRelations($aObject['owner_id'], $iViewerId))
            return false;

        $aGroupCustom = $this->getGroupCustom(array(
            'type' => 'pcog_ext', 
            'profile_id' => $aObject['owner_id'], 
            'content_id' => $aObject['id'], 
            'object' => $this->_sObject, 
            'group_id' => $aObject['group_id']
        ));

        return !empty($aGroupCustom['members']) && is_array($aGroupCustom['members']) && in_array($iViewerId, $aGroupCustom['members']);
    }

    public function checkCustomByObject($aObject, $iViewerId)
    {
        return '';
    }

    public function setTableFieldAuthor($sValue)
    {
        $this->_aObject['table_field_author'] = $sValue;

        $this->_oDb->init($this->_aObject);
    }

    protected function getObjectInfo($sAction, $iObjectId)
    {
        return $this->_oDb->getObjectInfo($sAction, $iObjectId);
    }

	protected function getPrivacyGroupsForContentPublic($iProfileIdOwner = 0, $aCustomGroups = array())
    {
    	$aGroups = array(BX_DOL_PG_ALL);
        if(isLogged()) {
            $iProfileIdLogged = bx_get_logged_profile_id();
            if($iProfileIdLogged == $iProfileIdOwner)
                return true;

            $aGroups[] = BX_DOL_PG_MEMBERS;
            if($iProfileIdOwner && $this->checkFriends($iProfileIdOwner, $iProfileIdLogged))
                $aGroups[] = BX_DOL_PG_FRIENDS;
        }

        return array_merge($aGroups, $aCustomGroups);
    }

    protected function getCheckMethod($s)
    {
        if(substr($s, 0, 1) != '@')
            return false;

        return bx_gen_method_name(str_replace('@', 'check_', $s));
    }

    protected function convertActionToField($sAction)
    {
    	return 'allow_' . strtolower(str_replace(' ', '-', $sAction)) . '_to';
    }

    /**
     * Check whethere viewer is a member of dynamic group.
     *
     * @param  mixed   $mixedGroupId   dynamic group ID.
     * @param  integer $iObjectOwnerId object owner ID.
     * @param  integer $iViewerId      viewer ID.
     * @return boolean result of operation.
     */
    protected function isDynamicGroupMember($mixedGroupId, $iObjectOwnerId, $iViewerId, $iObjectId)
    {
        return false;
    }

    /**
     * get privacy groups for getGroupChooser
     */ 
    protected function getGroups() 
    {
        $aValues = array();
        $aGroups = $this->_oDb->getGroupsBy(array('type' => 'active'));
        foreach($aGroups as $aGroup) {
            if((int)$aGroup['active'] == 0 || in_array($aGroup['id'], $this->_aGroupsExclude))
               continue;

            $aValues[] = array('key' => $aGroup['id'], 'value' => _t($aGroup['title']));
        }
        return $aValues;
    }

    /**
     * Check whethere custom group is allowed in current circumstances.
     * NOTE. Can be overwritten if it's needed.
     * 
     * @param type $aParams an array of parameters.
     * @return boolean result of operation.
     */
    protected function isSelectGroupCustom($aParams)
    {
        return true;
    }
}

/** @} */
