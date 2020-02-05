<!DOCTYPE html>
<html lang="<?php echo $this->parseSystemKey('lang', $mixedKeyWrapperHtml);?>">
<head>
    <?php echo $this->processInjection($this->aPage['name_index'], 'injection_head_begin'); ?>

    <meta http-equiv="Content-Type" content="text/html; charset=<?php echo $this->parseSystemKey('page_charset', $mixedKeyWrapperHtml);?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0" />
    <title><?php echo $this->parseSystemKey('page_header', $mixedKeyWrapperHtml);?></title>
    <base href="http://localhost/una2/" />

    <?php echo $this->parseSystemKey('meta_info', $mixedKeyWrapperHtml);?>
    <?php echo $this->parseSystemKey('page_robots', $mixedKeyWrapperHtml);?>

    <meta http-equiv="Content-Style-Type" content="text/css" />

    <bx_include_css_styles />
    <bx_include_css_system />
    <bx_include_css />

    <?php echo $this->parseSystemKey('dol_images', $mixedKeyWrapperHtml);?>
    <?php echo $this->parseSystemKey('dol_lang', $mixedKeyWrapperHtml);?>
    <?php echo $this->parseSystemKey('dol_options', $mixedKeyWrapperHtml);?>

    <bx_include_js_system />
    <bx_include_js />
   
    <script type="text/javascript" language="javascript">
    var sUrlRoot = 'http://localhost/una2/';

    $(document).ready(function () {
        bx_time('<?php echo $this->parseSystemKey('lang_country', $mixedKeyWrapperHtml);?>');
    });

    (function(w) {
        var dpr = (w.devicePixelRatio === undefined ? 1 : Math.round(w.devicePixelRatio));
        if ($.cookie('devicePixelRatio') == dpr || dpr < 2)
            return;
        $.cookie('devicePixelRatio', dpr, {expires: 365, path: '/'});
        window.location.reload();
    })(window);

    var oMediaPhone = window.matchMedia('(max-width:720px)');
    var oMediaPhone2 = window.matchMedia('(min-width:533px) and (max-width:720px)');
    var oMediaTablet = window.matchMedia('(min-width:720px) and (max-width:<?php echo $this->parseSystemKey('page_width', $mixedKeyWrapperHtml);?>)');
    var oMediaTablet2 = window.matchMedia('(min-width:533px) and (max-width:<?php echo $this->parseSystemKey('page_width', $mixedKeyWrapperHtml);?>)');
    var oMediaDesktop = window.matchMedia('(min-width:<?php echo $this->parseSystemKey('page_width', $mixedKeyWrapperHtml);?>)');

    function fMediaCallback(e) {
        if (oMediaPhone.matches)
            $('html').addClass('bx-media-phone');
        else
            $('html').removeClass('bx-media-phone');
        
        if (oMediaPhone2.matches)
            $('html').addClass('bx-media-phone2');
        else
            $('html').removeClass('bx-media-phone2');
        
        if (oMediaTablet.matches)
            $('html').addClass('bx-media-tablet');
        else
            $('html').removeClass('bx-media-tablet');
        
        if (oMediaTablet2.matches)
            $('html').addClass('bx-media-tablet2');
        else
            $('html').removeClass('bx-media-tablet2');

        if (oMediaDesktop.matches)
            $('html').addClass('bx-media-desktop');
        else
            $('html').removeClass('bx-media-desktop');
    }

    oMediaPhone.addListener(fMediaCallback);
    oMediaPhone2.addListener(fMediaCallback);
    oMediaTablet.addListener(fMediaCallback);
    oMediaTablet2.addListener(fMediaCallback);
    oMediaDesktop.addListener(fMediaCallback);

    fMediaCallback(null);

</script>
    <script type="text/javascript" language="javascript">
    var bUseSvgLoading = false;
    var sUseSvgLoading = '';
    if(!bUseSvgLoading) {
        var aSpinnerOpts = {
            lines: 7, // The number of lines to draw
            length: 0, // The length of each line
            width: 8, // The line thickness
            radius: 7, // The radius of the inner circle
            corners: 1, // Corner roundness (0..1)
            rotate: 0, // The rotation offset
            direction: 1, // 1: clockwise, -1: counterclockwise
            color: '#283C50', // #rgb or #rrggbb or array of colors
            speed: 1, // Rounds per second
            trail: 60, // Afterglow percentage
            shadow: false, // Whether to render a shadow
            hwaccel: false, // Whether to use hardware acceleration
            className: 'bx-sys-spinner', // The CSS class to assign to the spinner
            zIndex: 2e9, // The z-index (defaults to 2000000000)
            top: '50%', // Top position relative to parent in px
            left: '50%' // Left position relative to parent in px
        };

        var aSpinnerSmallOpts = $.extend({}, aSpinnerOpts, {
            lines: 6,
            width: 6,
            radius: 4,
            color: '#333',
            top: '50%',
            left: 'calc(100% - 20px)'
        });
    }
</script>

    <script type="text/javascript" language="javascript">
    $(document).ready(function () {
        // hide toolbar on scrolldown, show - on scroll up
        new Headroom($('#bx-toolbar').get(0), {
            tolerance: {
                down: 10,
                up: 20
            },
            offset: 200,
            classes: {
                initial: "bx-toolbar-anim",
                pinned: "bx-toolbar-reset",
                unpinned: "bx-toolbar-up"
            },
            onUnpin: function() {
                bx_menu_slide_close_all_opened();
            }
        }).init();
    });
</script>

    <script type="text/javascript" language="javascript">
    $(document).ready(function () {
        bx_activate_anim_icons('#283C50');
    });
</script>

    <?php echo $this->parseSystemKey('extra_js', $mixedKeyWrapperHtml);?>

    <?php echo $this->parseSystemKey('system_injection_head', $mixedKeyWrapperHtml);?>
    <?php echo $this->processInjection($this->aPage['name_index'], 'injection_head'); ?>
    <meta name="theme-color" content="#f5faff" />
</head>
<body class="bx-def-font bx-def-color-bg-page bx-def-image-bg-page" dir="<?php echo $this->parseSystemKey('lang_direction', $mixedKeyWrapperHtml);?>" <?php echo $this->processInjection($this->aPage['name_index'], 'injection_body'); ?> >
    <?php echo $this->parseSystemKey('system_injection_header', $mixedKeyWrapperHtml);?>
    <?php echo $this->processInjection($this->aPage['name_index'], 'injection_header'); ?>
    <noscript>
        <div class="bx-def-padding" style="text-align:center; color:red;background-color: rgba(255,234,193,.5);    border-radius: .1875rem;">
       		 <?php echo $this->parseSystemKey('system_js_requred', $mixedKeyWrapperHtml);?>
       </div>
    </noscript>


<div class="bx-main <?php echo $this->processInjection($this->aPage['name_index'], 'injection_main_class'); ?>">
    <?php echo $this->processInjection($this->aPage['name_index'], 'top'); ?>

    <div id="bx-toolbar" class="bx-header bx-def-image-bg-header bx-def-color-bg-header bx-def-border-header bx-shadow-header bx-def-z-index-nav">
        <div class="bx-def-centered bx-def-padding-sec-leftright bx-def-page-width bx-def-box-sizing">
            <div class="bx-toolbar-content-wrapper bx-content-padding-header">
                    <div id="bx-toolbar-content" class="bx-clearfix">
                        <div id="bx-menu-toolbar-1-container">
                            <?php echo $this->getMenu('sys_toolbar_site'); ?>
                        </div>
                        <div id="bx-logo-container">
                            <?php echo $this->processInjection($this->aPage['name_index'], 'injection_logo_before'); ?>
                                <?php echo $this->parseSystemKey('main_logo', $mixedKeyWrapperHtml);?>
                            <?php echo $this->processInjection($this->aPage['name_index'], 'injection_logo_after'); ?>
                        </div>
                        <div id="bx-menu-toolbar-2-container">
                            <?php echo $this->getMenu('sys_toolbar_member'); ?>
                        </div>
                    </div>
                    </div>
        </div>
    </div>

    <?php echo $this->processInjection($this->aPage['name_index'], 'injection_between_cover_logo'); ?>
    <?php echo $this->parseSystemKey('cover', $mixedKeyWrapperHtml);?>
    <?php echo $this->processInjection($this->aPage['name_index'], 'injection_between_cover_top_menu'); ?>

    <?php echo $this->getMenu('sys_site_submenu'); ?>

    <?php echo $this->processInjection($this->aPage['name_index'], 'injection_between_content_menu'); ?>

    <div id="bx-content-wrapper">
        <?php echo $this->parseSystemKey('informer', $mixedKeyWrapperHtml);?>
        <div class="bx-page-wrapper bx-def-centered bx-def-padding-sec-leftright bx-def-page-width bx-def-box-sizing">
            <div id="bx-content-container" class="bx-content-container bx-def-padding-sec-leftright">
                <?php echo $this->processInjection($this->aPage['name_index'], 'injection_content_before'); ?>
                <div id="bx-content-main" class="bx-content-main bx-def-margin-sec-topbottom">

<?php echo $a['page_main_code'];?>
		
		                <?php echo $this->processInjection($this->aPage['name_index'], 'injection_content_after'); ?>
		
		                <div class="bx-clear"></div>
		
		            <?php echo $this->processInjection($this->aPage['name_index'], 'banner_bottom'); ?>
		
		        </div> <!-- #bx-content-main -->
		
		        <?php echo $this->processInjection($this->aPage['name_index'], 'injection_between_content_footer'); ?>
		
		    </div> <!-- #bx-content-container -->
		
		</div>

	</div> <!-- #bx-content-wrapper -->

	<div id="bx-footer-wrapper" class="bx-def-image-bg-footer bx-def-color-bg-footer bx-def-border-footer bx-shadow-footer">	
            <div class="bx-def-centered bx-def-padding-sec-leftright bx-def-page-width bx-def-box-sizing">
                <div id="bx-footer" class="bx-footer bx-def-padding-sec-left bx-def-padding-sec-right bx-clearfix">
                    <div class="bx-footer-cnt bx-content-padding-footer">
                        <?php echo $this->processInjection($this->aPage['name_index'], 'injection_footer_before'); ?>

                        <div id="bx-menu-bottom">
                            <?php echo $this->getMenu('sys_footer'); ?>
                        </div>

                        <?php echo $this->processInjection($this->aPage['name_index'], 'injection_footer_after'); ?>
                    </div>
                </div>
            </div>
	</div>

	<?php echo $this->getMenu('sys_site_action'); ?>
</div>

        <?php echo $this->parseSystemKey('system_injection_footer', $mixedKeyWrapperHtml);?>
       <?php echo $this->processInjection($this->aPage['name_index'], 'injection_footer'); ?>
    </body>
</html>