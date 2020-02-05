
 {
function BxDolMenuMoreAuto(options){this._sObject=options.sObject;this._iItemsStatic=undefined==options.iItemsStatic?0:options.iItemsStatic;this._aHtmlIds=undefined==options.aHtmlIds?{}:options.aHtmlIds;this._sKeyWidth='bx-mma-width';this._sClassItem='.bx-menu-item';this._sClassItemMore=this._sClassItem+'.bx-menu-item-more-auto';this._sClassItemMoreSubmenu='.bx-menu-submenu-more-auto';this._sClassItemStatic='bx-menu-item-static'}
BxDolMenuMoreAuto.prototype.init=function(){var $this=this;$(document).ready(function(){$('.bx-menu-object-'+$this._sObject).each(function(){var oMenu=$(this);var oItemMore=oMenu.find($this._sClassItemMore);var oItemMoreSubmenu=oItemMore.find($this._sClassItemMoreSubmenu);for(var i=0;i<$this._iItemsStatic;i++)
oItemMore.prevAll($this._sClassItem+':not(.'+$this._sClassItemStatic+'):last').addClass($this._sClassItemStatic);var iMenu=0;oMenu.children($this._sClassItem+':visible').each(function(){iMenu+=$this._getWidth($(this))});var iParent=oMenu.parent().width();var iItemMore=oItemMore.outerWidth(!0);oMenu.css('overflow','visible');if(iMenu<iParent)
return;$this._moveToSubmenu(oMenu,oItemMore,oItemMoreSubmenu,iParent,iItemMore)});$(window).on('resize',function(){$this.update()});$($this._sClassItem).on('resize',function(){$this.update(!0)})})};BxDolMenuMoreAuto.prototype.update=function(bForceCalculate){var $this=this;$('.bx-menu-object-'+this._sObject).each(function(){var oMenu=$(this);var oItemMore=oMenu.find($this._sClassItemMore);var oItemMoreSubmenu=oItemMore.find($this._sClassItemMoreSubmenu);var iMenu=0;oMenu.children($this._sClassItem+':visible').each(function(){iMenu+=$this._getWidth($(this),bForceCalculate)});var iParent=oMenu.parent().width();var iItemMore=oItemMore.outerWidth(!0);if(iMenu>iParent)
$this._moveToSubmenu(oMenu,oItemMore,oItemMoreSubmenu,iParent,iItemMore);if(iMenu<iParent)
$this._moveFromSubmenu(oMenu,oItemMore,oItemMoreSubmenu,iParent,iMenu)})};BxDolMenuMoreAuto.prototype.more=function(oElement){var oElement=$(oElement);oElement.parents('li:first').find('#'+this._aHtmlIds.more_auto_popup).dolPopup({pointer:{el:oElement},moveToDocRoot:!1})}
BxDolMenuMoreAuto.prototype._moveToSubmenu=function(oMenu,oItemMore,oItemMoreSubmenu,iParent,iItemMore){var $this=this;var bRelocateOthers=!1;var iWidthTotal=iItemMore;var oSubmenuItemFirst=oItemMoreSubmenu.children(this._sClassItem+':first');oMenu.children(this._sClassItem+':not('+this._sClassItemMore+')').each(function(){var oItem=$(this);var iItem=$this._getWidth(oItem);if((bRelocateOthers||iWidthTotal+iItem>iParent)&&!oItem.hasClass($this._sClassItemStatic)){oItem.addClass('bx-def-color-bg-hl-hover');if(!oSubmenuItemFirst.length)
oItemMoreSubmenu.append(oItem.detach());else oSubmenuItemFirst.before(oItem.detach());bRelocateOthers=!0;return}
iWidthTotal+=iItem});if(oItemMoreSubmenu.find('li').length)
oItemMore.show()};BxDolMenuMoreAuto.prototype._moveFromSubmenu=function(oMenu,oItemMore,oItemMoreSubmenu,iParent,iMenu){var $this=this;var bStopRelocation=!1;var iWidthTotal=iMenu;oItemMoreSubmenu.children(this._sClassItem).each(function(){if(bStopRelocation)
return;var oItem=$(this);var iItem=$this._getWidth(oItem);if(iWidthTotal+iItem>iParent){bStopRelocation=!0;return}
oItem.removeClass('bx-def-color-bg-hl-hover');oItemMore.before(oItem.detach());iWidthTotal+=iItem});if(!oItemMoreSubmenu.find('li').length)
oItemMore.hide()};BxDolMenuMoreAuto.prototype._getWidth=function(oItem,bForceCalculate){var iItem=parseInt(oItem.attr(this._sKeyWidth));if(!bForceCalculate&&iItem)
return iItem;iItem=oItem.outerWidth(!0);if(iItem)
oItem.attr(this._sKeyWidth,iItem);return iItem}
 }

 {
function BxDolLiveUpdates(oOptions){this._sActionsUrl=oOptions.sActionsUrl==undefined?sUrlRoot+'live_updates.php':oOptions.sActionsUrl;this._sObjName=oOptions.sObjName==undefined?'oLiveUpdates':oOptions.sObjName;this._iInterval=oOptions.iInterval==undefined?3000:oOptions.iInterval;this._aSystemsActive=oOptions.aSystemsActive==undefined?{}:oOptions.aSystemsActive;this._aSystemsTransient=oOptions.aSystemsTransient==undefined?{}:oOptions.aSystemsTransient;this._bServerRequesting=oOptions.bServerRequesting==undefined?!1:oOptions.bServerRequesting;this._sHash=oOptions.sHash==undefined?'':oOptions.sHash;this._iIndex=0;this._iHandler=0;this._bBusy=!1;this.init()}
BxDolLiveUpdates.prototype.init=function(){var $this=this;if(this._iHandler)
this.destroy();$(document).ready(function(){$this._iHandler=setInterval(function(){$this.perform()},$this._iInterval)})};BxDolLiveUpdates.prototype.add=function(oData){if(!oData)
return;if(oData.name!=undefined&&oData.value!=undefined){if(!this._aSystemsActive[oData.name])
this._aSystemsActive[oData.name]=oData.value;if(!this._aSystemsTransient[oData.name])
this._aSystemsTransient[oData.name]=1}
if(oData.hash!=undefined)
this._sHash=oData.hash};BxDolLiveUpdates.prototype.destroy=function(){if(this._iHandler)
clearInterval(this._iHandler)};BxDolLiveUpdates.prototype.perform=function(){if(!this._bServerRequesting||this._bBusy)
return;var $this=this;var oDate=new Date();this._bBusy=!0;$.post(this._sActionsUrl,{index:this._iIndex,systems_active:this._aSystemsActive,systems_transient:this._aSystemsTransient,hash:this._sHash,_t:oDate.getTime()},function(aData){$.each(aData,function(iIndex,oValue){if(oValue.system&&$this._aSystemsActive[oValue.system]!=undefined&&oValue.data)
$this._aSystemsActive[oValue.system]=oValue.data.count_new;if(oValue.method){var oFunc=function(oData){eval(oValue.method)};oFunc(oValue.data)}});$this._bBusy=!1},'json');this._iIndex+=1}
 }
