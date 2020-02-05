/**
 * Copyright (c) UNA, Inc - https://una.io
 * MIT License - https://opensource.org/licenses/MIT
 *
 * @defgroup    UnaCore UNA Core
 * @{
 */

function BxDolVote(oOptions)
{
    if(typeof oOptions === 'undefined')
        return;

    this._sObjName = oOptions.sObjName === undefined ? 'oVote' : oOptions.sObjName; // javascript object name, to run current object instance from onTimer
    this._sSystem = oOptions.sSystem; // current comment system
    this._iAuthorId = oOptions.iAuthorId; // this comment's author ID.
    this._iObjId = oOptions.iObjId; // this object id comments

    this._sActionsUri = 'vote.php';
    this._sActionsUrl = oOptions.sRootUrl + this._sActionsUri; // actions url address

    this._sAnimationEffect = 'fade';
    this._iAnimationSpeed = 'slow';
    this._sSP = oOptions.sStylePrefix === undefined ? 'bx-vote' : oOptions.sStylePrefix;
    this._aHtmlIds = oOptions.aHtmlIds;
}

BxDolVote.prototype.init = function()
{
    return;
};

BxDolVote.prototype.toggleByPopup = function(oLink)
{
    var oData = this._getDefaultParams();
    oData['action'] = 'GetVotedBy';

    $(oLink).dolPopupAjax({
        id: this._aHtmlIds['by_popup'], 
        url: bx_append_url_params(this._sActionsUri, oData)
    });
};

BxDolVote.prototype.vote = function(oLink, iValue, onComplete)
{
    var $this = this;
    var oParams = this._getDefaultParams();
    oParams['action'] = 'Vote';
    oParams['value'] = iValue;

    $.post(
    	this._sActionsUrl,
    	oParams,
    	function(oData) {
            if(oData && oData.message != undefined)
                bx_alert(oData.message, function() {
                    $this.onVote(oLink, oData, onComplete);
                });
            else
                $this.onVote(oLink, oData, onComplete);
        },
        'json'
    );
};

BxDolVote.prototype.onVote = function(oLink, oData, onComplete)
{
    if(oData && oData.code != 0)
        return;

    var oCounter = this._getCounter(oLink);
    if(oCounter && oCounter.length > 0) {
        oCounter.html(oData.countf);

        oCounter.parents('.' + this._sSP + '-counter-holder:first').bx_anim(oData.count > 0 ? 'show' : 'hide');
    }

    if(typeof onComplete == 'function')
        onComplete(oLink, oData);
};

BxDolVote.prototype._getCounter = function(oElement)
{
    if($(oElement).hasClass(this._sSP))
        return $(oElement).find('.' + this._sSP + '-counter');
    else 
        return $(oElement).parents('.' + this._sSP + ':first').find('.' + this._sSP + '-counter');
};

BxDolVote.prototype._loadingInButton = function(e, bShow)
{
    if($(e).length)
        bx_loading_btn($(e), bShow);
    else
        bx_loading($('body'), bShow);
};

BxDolVote.prototype._getDefaultParams = function() 
{
    var oDate = new Date();
    return {
        sys: this._sSystem,
        id: this._iObjId,
        _t: oDate.getTime()
    };
};

/** @} */
