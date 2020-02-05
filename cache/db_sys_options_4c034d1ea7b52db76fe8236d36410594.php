<?php $mixedData=array (
  'sys_cron_time' => '0',
  'sys_install_time' => '1580842777',
  'sys_upgrade_channel' => 'stable',
  'sys_revision' => '3',
  'sys_eq_time' => '0',
  'sys_push_queue_time' => '0',
  'sys_ftp_login' => '',
  'sys_ftp_password' => '',
  'sys_ftp_dir' => '',
  'sys_template_cache_image_enable' => '',
  'sys_template_cache_image_max_size' => '5',
  'sys_email_attachable_email_templates' => '',
  'sys_redirect_after_account_added' => 'page.php?i=account-profile-switcher&register=1',
  'sys_redirect_after_email_confirmation' => '',
  'sys_editor_default' => 'sys_tinymce',
  'sys_captcha_default' => 'sys_recaptcha_new',
  'sys_player_default' => 'sys_html5',
  'sys_player_default_format' => 'sd',
  'sys_live_updates_interval' => '10000',
  'sys_tinymce_plugins_mini' => 'autolink,image,link,lists,paste,fullscreen',
  'sys_tinymce_toolbar_mini' => 'bold italic underline removeformat | bullist numlist | alignleft aligncenter alignright | blockquote | link unlink image | fullscreen',
  'sys_tinymce_plugins_standard' => 'advlist,autolink,autosave,code,hr,image,link,lists,media,paste,fullscreen',
  'sys_tinymce_toolbar_standard' => 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | fullscreen',
  'sys_tinymce_plugins_full' => 'advlist,anchor,autolink,autoresize,autosave,charmap,code,emoticons,hr,image,link,lists,media,nonbreaking,pagebreak,preview,paste,save,searchreplace,table,textcolor,visualblocks,fullscreen',
  'sys_tinymce_toolbar_full' => 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image, preview media | forecolor emoticons | fullscreen',
  'sys_search_keyword_min_len' => '1',
  'sys_relations' => 'bx_persons_bx_persons',
  'enable_gd' => 'on',
  'sys_transcoder_queue_storage' => '',
  'site_email_html_template_header' => '<html>
    <head></head>
    <body bgcolor="#eee" style="margin:0; padding:0;">
        <div style="padding:20px; background-color:#eee;">
            <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
                <tr><td valign="top">
                    <div style="color:#333; padding:20px; border:1px solid #ccc; border-radius:3px; background-color:#fff; font:14px Helvetica, Arial, sans-serif;">
                        <div style="border-bottom:2px solid #eee; padding-bottom:10px; margin-bottom:20px; font-weight:bold; font-size:22px; color:#999;">{site_name}</div>',
  'site_email_html_template_footer' => '
                    </div>
                </td></tr>
                <tr><td valign="top">
                    <div style="margin-top:5px; text-align:center; color:#999; font:11px Helvetica, Arial, sans-serif;">{about_us}&nbsp;&nbsp;&nbsp;{unsubscribe}</div>
                </td></tr>
            </table>
        </div>
    </body>
</html>',
  'sys_site_logo' => '0',
  'sys_site_logo_alt' => '0',
  'sys_site_icon' => '0',
  'sys_site_logo_width' => '240',
  'sys_site_logo_height' => '48',
  'sys_site_splash_code' => '<style>
    /*--- Splash ---*/
  	.bx-page {
        position: relative;
  	}
	.bx-header {
        position: relative;
      	display: -webkit-flex;
        display: flex;
        -webkit-align-items: center;
        align-items: center;
      	justify-content: center;
      	-webkit-justify-content: center;
        height: 4rem;
        border-bottom: 1px solid rgba(0, 0, 0, 0.1);
      	font-weight: 700;
      	font-size: 2rem;
    }
    .bx-splash {
        position: relative;
        display: -webkit-flex;
        display: flex;
      	-webkit-align-items: center;
        align-items: center;
      	min-height: 100vh;
    }
    .bx-spl-preload {
        position: absolute;

        top: 0px;
        left: 0px;
        width: 1px;
        height: 1px;

        overflow: hidden;
    }
    .bx-spl-line {
      	position: relative;
        display: -webkit-flex;
        display: flex;
        -webkit-align-items: stretch;
        align-items: stretch;
    }
  	.bx-media-phone .bx-spl-line {
      	-webkit-flex-direction: column;
      	flex-direction: column;
    }
  	.bx-spl-cell {
      	position: relative;
  	}
  	.bx-media-phone .bx-spl-cell {
      	-webkit-basis: 100% !important; 
      	flex-basis: 100% !important;
      	width: 100% !important;
  	}
    .bx-spl-line.bx-spl-l1 .bx-spl-cell {
      	display: -webkit-flex;
        display: flex;
        -webkit-align-items: center;
        align-items: center;
    }
  	.bx-spl-line.bx-spl-l1 .bx-spl-cell.bx-spl-c1 {
        -webkit-flex: 1 1 70%; 
        flex:  1 1 70%;
      	width: 70%;
    }
  	.bx-media-phone .bx-spl-line.bx-spl-l1 .bx-spl-cell.bx-spl-c1 {
      	text-align: center;
  	}
  	.bx-spl-line.bx-spl-l1 .bx-spl-cell.bx-spl-c2 {
        -webkit-flex: 0 0 30%; 
        flex:  0 1 30%;
      	-webkit-justify-content: center;
        justify-content: center;
      	width: 30%;
    }
    .bx-spl-line.bx-spl-l1 .bx-spl-image {
      	max-width: 100%;
    }
    .bx-spl-line.bx-spl-l2 .bx-spl-cell {
        -webkit-flex: 1 1 33%; 
        flex:  1 1 33%;
      	width: 33%;
    }
  	.bx-media-phone .bx-spl-line.bx-spl-l2 .bx-spl-cell {
      	text-align: center;
  	}
    .bx-spl-line.bx-spl-l2 .bx-spl-cicon {
		position: relative;
      	display: -webkit-flex;
        display: flex;
        -webkit-align-items: flex-start;
        align-items: flex-start;
      	justify-content: flex-start;
      	-webkit-justify-content: flex-start;
    }
    .bx-media-phone .bx-spl-line.bx-spl-l2 .bx-spl-cicon {
      	justify-content: center;
      	-webkit-justify-content: center;
    }
    .bx-spl-line.bx-spl-l2 .bx-spl-cicon .animation {
        width: 4.25rem;
        height: 4.25rem;
    }
</style>
<div class="bx-page bx-def-color-bg-page">
  <div class="bx-header">__logo__</div>
  <div class="bx-splash">
      <div class="bx-splash-cnt bx-def-page-width bx-def-centered bx-def-padding-leftright">
          <div class="bx-spl-preload">
            <img src="<bx_image_url:spl-image-main.svg />">
          </div>
          <div class="bx-spl-line bx-spl-l1">
            <div class="bx-spl-cell bx-spl-c1">
              <div class="bx-spl-ccnt bx-def-padding">
                <div class="bx-spl-title bx-def-font-h1 bx-def-font-semibold"><bx_text:_sys_txt_splash_title /></div>
                <div class="bx-spl-slogan bx-def-padding-sec-top bx-def-padding-bottom bx-def-font-grayed"><bx_text:_sys_txt_splash_slogan /></div>
                <div class="bx-spl-image bx-def-padding-top">
                  <img class="bx-spl-image" src="<bx_image_url:spl-image-main.svg />" />
                </div>
              </div>
            </div>
            <div class="bx-spl-cell bx-spl-c2 bx-hide-when-logged-in">
              <div class="bx-spl-ccnt bx-def-padding">__join_form_in_box__</div>
            </div>
          </div>
          <div class="bx-spl-line bx-spl-l2 bx-def-padding">
            <div class="bx-spl-cell bx-spl-c1">
              <div class="bx-spl-ccnt bx-def-padding">
                <div class="bx-spl-cicon connect"><div class="animation"></div></div>
                <div class="bx-spl-ctitle bx-def-padding-sec-topbottom bx-def-font-h2"><bx_text:_sys_txt_splash_connect /></div>
                <div class="bx-spl-ctext bx-def-font-grayed"><bx_text:_sys_txt_splash_connect_text /></div>
              </div>
            </div>
            <div class="bx-spl-cell bx-spl-c2">
              <div class="bx-spl-ccnt bx-def-padding">
                <div class="bx-spl-cicon share"><div class="animation"></div></div>
                <div class="bx-spl-ctitle bx-def-padding-sec-topbottom bx-def-font-h2"><bx_text:_sys_txt_splash_share /></div>
                <div class="bx-spl-ctext bx-def-font-grayed"><bx_text:_sys_txt_splash_share_text /></div>
              </div>
            </div>
            <div class="bx-spl-cell bx-spl-c3">
              <div class="bx-spl-ccnt bx-def-padding">
                <div class="bx-spl-cicon create"><div class="animation"></div></div>
                <div class="bx-spl-ctitle bx-def-padding-sec-topbottom bx-def-font-h2"><bx_text:_sys_txt_splash_create /></div>
                <div class="bx-spl-ctext bx-def-font-grayed"><bx_text:_sys_txt_splash_create_text /></div>
              </div>
            </div>
          </div>
      </div>
  </div>
</div>
<script>
  var animConnect = bodymovin.loadAnimation({
    container: $(\'.bx-spl-cicon.connect .animation\').get(0),
    path: \'<bx_image_url:spl-icon-connect.json />\',
    renderer: \'svg\',
    loop: true,
    autoplay: true,
  });
  var animShare = bodymovin.loadAnimation({
    container: $(\'.bx-spl-cicon.share .animation\').get(0),
    path: \'<bx_image_url:spl-icon-share.json />\',
    renderer: \'svg\',
    loop: true,
    autoplay: true,
  });
  var animCreate = bodymovin.loadAnimation({
    container: $(\'.bx-spl-cicon.create .animation\').get(0),
    path: \'<bx_image_url:spl-icon-create.json />\',
    renderer: \'svg\',
    loop: true,
    autoplay: true,
  });
</script>',
  'sys_site_splash_enabled' => '',
  'sys_site_cover_common' => '0',
  'sys_unit_cover_profile' => '0',
  'lang_default' => 'en',
  'lang_subst_from_en' => 'on',
  'sys_format_date' => 'D MMM YYYY',
  'sys_format_time' => 'HH:mm',
  'sys_format_datetime' => 'D MMM YYYY h:mm:ss a',
  'sys_format_timeago' => '432000',
  'template' => 'protean',
  'sys_db_cache_enable' => 'on',
  'sys_db_cache_engine' => 'File',
  'sys_cache_memcache_host' => '',
  'sys_cache_memcache_port' => '11211',
  'sys_page_cache_enable' => 'on',
  'sys_page_cache_engine' => 'File',
  'sys_pb_cache_enable' => 'on',
  'sys_pb_cache_engine' => 'File',
  'sys_template_cache_enable' => 'on',
  'sys_template_cache_engine' => 'FileHtml',
  'sys_template_cache_css_enable' => 'on',
  'sys_template_cache_js_enable' => 'on',
  'sys_template_cache_minify_css_enable' => 'on',
  'sys_template_cache_minify_js_enable' => 'on',
  'sys_template_cache_compress_enable' => 'on',
  'sys_oauth_key' => 'mwlr2gpfgu',
  'sys_oauth_secret' => 'yunpsnzvpv8xle6xvqhdemgheph2dn7d',
  'currency_code' => 'USD',
  'currency_sign' => '&#36;',
  'client_image_resize_width' => '2048',
  'client_image_resize_height' => '2048',
  'useLikeOperator' => 'on',
  'sys_default_payment' => '',
  'sys_maps_api_key' => '',
  'sys_embed_default' => 'sys_embedly',
  'sys_embedly_api_key' => '',
  'sys_iframely_api_key' => '',
  'permalinks_pages' => 'on',
  'permalinks_modules' => 'on',
  'permalinks_storage' => 'on',
  'sys_security_form_token_enable' => 'on',
  'sys_security_form_token_lifetime' => '86400',
  'sys_recaptcha_key_public' => '',
  'sys_recaptcha_key_private' => '',
  'sys_add_nofollow' => 'on',
  'site_title' => 'SehaSky',
  'site_email' => 'kimokimo191098@gmail.com',
  'site_email_notify' => 'kimokimo191098@gmail.com',
  'site_tour_home' => 'on',
  'site_tour_studio' => 'on',
  'add_to_mobile_homepage' => 'on',
  'site_login_social_compact' => '',
  'sys_autoupdate' => 'on',
  'sys_autoupdate_force_modified_files' => '',
  'sys_per_page_search_keyword_single' => '24',
  'sys_per_page_search_keyword_plural' => '3',
  'sys_metatags_hashtags_max' => '9',
  'sys_metatags_mentions_max' => '9',
  'sys_storage_default' => 'Local',
  'sys_storage_s3_access_key' => '',
  'sys_storage_s3_secret_key' => '',
  'sys_storage_s3_bucket' => '',
  'sys_storage_s3_domain' => '',
  'sys_account_online_time' => '5',
  'sys_account_autoapproval' => 'on',
  'sys_account_activation_letter' => '',
  'sys_account_confirmation_type' => 'email',
  'sys_account_activation_2fa_enable' => '',
  'sys_account_auto_profile_creation' => 'on',
  'sys_account_default_profile_type' => 'bx_persons',
  'sys_account_limit_profiles_number' => '0',
  'sys_account_limit_incorrect_login_attempts' => '6',
  'sys_acl_expire_notification_days' => '1',
  'sys_acl_expire_notify_once' => 'on',
  'enable_notification_pruning' => '',
  'enable_notification_account' => 'on',
  'sys_eq_send_per_start' => '500',
  'sys_eq_send_per_start_to_recipient' => '2',
  'sys_push_app_id' => '',
  'sys_push_rest_api' => '',
  'sys_push_short_name' => '',
  'sys_push_safari_id' => '',
  'sys_push_queue_send_per_start' => '500',
  'sys_push_queue_send_per_start_to_recipient' => '2',
  'sys_twilio_gate_sid' => '',
  'sys_twilio_gate_token' => '',
  'sys_twilio_gate_from_number' => '',
  'bx_en_switcher_title' => 'English',
  'bx_protean_switcher_title' => 'Protean',
  'bx_protean_default_mix' => '2',
  'bx_protean_general_item_bg_color_hover' => 'rgba(210, 230, 250, 0.3)',
  'bx_protean_general_item_bg_color_active' => 'rgba(196, 248, 156, 0.4)',
  'bx_protean_general_item_bg_color_disabled' => 'rgba(221, 221, 221, 1.0)',
  'bx_protean_header_height' => '4rem',
  'bx_protean_header_content_padding' => '0.5rem',
  'bx_protean_header_bg_color' => 'rgba(255, 255, 255, 1)',
  'bx_protean_header_bg_image' => '',
  'bx_protean_header_bg_image_repeat' => 'no-repeat',
  'bx_protean_header_bg_image_attachment' => 'scroll',
  'bx_protean_header_bg_image_size' => 'cover',
  'bx_protean_site_logo' => '',
  'bx_protean_site_logo_alt' => '',
  'bx_protean_site_logo_width' => '240',
  'bx_protean_site_logo_height' => '48',
  'bx_protean_header_border_color' => 'rgba(0, 0, 0, 0.2)',
  'bx_protean_header_border_size' => '1px',
  'bx_protean_header_shadow' => '0px 1px 3px 0px rgba(0, 0, 0, 0.05)',
  'bx_protean_header_icon_color' => 'rgba(30, 150, 250, 0.8)',
  'bx_protean_header_icon_color_hover' => 'rgba(30, 150, 250, 1)',
  'bx_protean_header_link_color' => 'rgba(30, 150, 250, 0.8)',
  'bx_protean_header_link_color_hover' => 'rgba(30, 150, 250, 1)',
  'bx_protean_footer_bg_color' => 'rgba(30, 150, 250, 0.5)',
  'bx_protean_footer_bg_image' => '',
  'bx_protean_footer_bg_image_repeat' => 'no-repeat',
  'bx_protean_footer_bg_image_attachment' => 'scroll',
  'bx_protean_footer_bg_image_size' => 'cover',
  'bx_protean_footer_content_padding' => '1rem',
  'bx_protean_footer_border_color' => 'rgba(0, 0, 0, 1)',
  'bx_protean_footer_border_size' => '1px',
  'bx_protean_footer_shadow' => 'none',
  'bx_protean_footer_font_color' => 'rgba(40, 50, 60, 0.9)',
  'bx_protean_footer_icon_color' => 'rgba(10, 120, 220, 1)',
  'bx_protean_footer_icon_color_hover' => 'rgba(10, 120, 220, 1)',
  'bx_protean_footer_link_color' => 'rgba(10, 120, 220, 1)',
  'bx_protean_footer_link_color_hover' => 'rgba(10, 120, 220, 1)',
  'bx_protean_body_bg_color' => 'rgb(230, 240, 250)',
  'bx_protean_body_bg_image' => '',
  'bx_protean_body_bg_image_repeat' => 'no-repeat',
  'bx_protean_body_bg_image_attachment' => 'scroll',
  'bx_protean_body_bg_image_size' => 'cover',
  'bx_protean_page_width' => '1024',
  'bx_protean_body_icon_color' => 'rgba(30, 150, 250, 0.9)',
  'bx_protean_body_icon_color_hover' => 'rgba(30, 150, 250, 1)',
  'bx_protean_body_link_color' => 'rgba(30, 150, 250, 0.9)',
  'bx_protean_body_link_color_hover' => 'rgba(30, 150, 250, 1)',
  'bx_protean_cover_height' => '30vh',
  'bx_protean_cover_bg_color' => 'rgba(255, 255, 255, 1)',
  'bx_protean_cover_content_padding' => '2rem 3rem 2rem 3rem',
  'bx_protean_cover_border_color' => 'rgba(208, 208, 208, 0)',
  'bx_protean_cover_border_size' => '0px',
  'bx_protean_cover_border_radius' => '0px',
  'bx_protean_cover_shadow' => 'none',
  'bx_protean_cover_icon_border_color' => 'rgba(208, 208, 208, 1)',
  'bx_protean_cover_icon_border_size' => '1px',
  'bx_protean_cover_icon_border_radius' => '3px',
  'bx_protean_cover_icon_shadow' => 'none',
  'bx_protean_cover_text_align' => 'center',
  'bx_protean_cover_text_shadow' => '0px 1px 3px rgba(0, 0, 0, .3)',
  'bx_protean_cover_font_family' => 'Arial, sans-serif',
  'bx_protean_cover_font_size' => '2.0rem',
  'bx_protean_cover_font_color' => 'rgba(255, 255, 255, 1)',
  'bx_protean_cover_font_weight' => '700',
  'bx_protean_block_bg_color' => 'rgba(245, 250, 255, 0.9)',
  'bx_protean_block_bg_image' => '',
  'bx_protean_block_bg_image_repeat' => 'no-repeat',
  'bx_protean_block_bg_image_attachment' => 'scroll',
  'bx_protean_block_bg_image_size' => 'cover',
  'bx_protean_block_content_padding' => '1rem',
  'bx_protean_block_border_color' => 'rgba(0, 0, 0, 0)',
  'bx_protean_block_border_size' => '0px',
  'bx_protean_block_border_radius' => '3px',
  'bx_protean_block_shadow' => '0px 1px 2px 0px rgba(0, 0, 0, 0.05)',
  'bx_protean_block_title_bg_color' => 'rgba(255, 255, 255, 0)',
  'bx_protean_block_title_padding' => '0.3rem 1rem 0rem 1rem',
  'bx_protean_block_title_border_color' => 'rgba(0, 0, 0, 0)',
  'bx_protean_block_title_border_size' => '0px',
  'bx_protean_block_title_border_radius' => '0px',
  'bx_protean_block_title_font_family' => 'Arial, sans-serif',
  'bx_protean_block_title_font_size' => '1rem',
  'bx_protean_block_title_font_color' => 'rgba(40, 50, 60, 0.8)',
  'bx_protean_block_title_font_weight' => '700',
  'bx_protean_block_title_div_height' => '0px',
  'bx_protean_block_title_div_bg_color' => 'rgba(40, 60, 80, 0)',
  'bx_protean_card_bg_color' => 'rgba(255, 255, 255, 1)',
  'bx_protean_card_bg_color_hover' => 'rgba(255, 255, 255, 0.5)',
  'bx_protean_card_bg_image' => '',
  'bx_protean_card_bg_image_repeat' => 'no-repeat',
  'bx_protean_card_bg_image_attachment' => 'scroll',
  'bx_protean_card_bg_image_size' => 'cover',
  'bx_protean_card_content_padding' => '1rem',
  'bx_protean_card_border_color' => 'rgba(0, 0, 0, 0.1)',
  'bx_protean_card_border_size' => '1px',
  'bx_protean_card_border_radius' => '3px',
  'bx_protean_card_shadow' => '0px 1px 3px 0px rgba(0, 0, 0, 0.05)',
  'bx_protean_popup_bg_color' => 'rgba(255, 255, 255, 1)',
  'bx_protean_popup_bg_image' => '',
  'bx_protean_popup_bg_image_repeat' => 'no-repeat',
  'bx_protean_popup_bg_image_attachment' => 'scroll',
  'bx_protean_popup_bg_image_size' => 'cover',
  'bx_protean_popup_content_padding' => '1.25rem',
  'bx_protean_popup_border_color' => 'rgba(0, 0, 0, 0.2)',
  'bx_protean_popup_border_size' => '1px',
  'bx_protean_popup_border_radius' => '3px',
  'bx_protean_popup_shadow' => '0px 1px 5px 0px rgba(0, 0, 0, 0.05)',
  'bx_protean_popup_title_bg_color' => 'rgba(230, 240, 250, 0.9)',
  'bx_protean_popup_title_padding' => '1.25rem',
  'bx_protean_popup_title_font_family' => 'Arial, sans-serif',
  'bx_protean_popup_title_font_size' => '1rem',
  'bx_protean_popup_title_font_color' => 'rgba(40, 50, 60, 0.9)',
  'bx_protean_menu_main_bg_color' => 'rgba(255, 255, 255, 0.9)',
  'bx_protean_menu_main_bg_image' => '',
  'bx_protean_menu_main_bg_image_repeat' => 'no-repeat',
  'bx_protean_menu_main_bg_image_attachment' => 'scroll',
  'bx_protean_menu_main_bg_image_size' => 'cover',
  'bx_protean_menu_main_content_padding' => '0px',
  'bx_protean_menu_main_border_color' => 'rgba(0, 0, 0, 0.1)',
  'bx_protean_menu_main_border_size' => '0px',
  'bx_protean_menu_main_shadow' => 'none',
  'bx_protean_menu_main_font_family' => 'Arial, sans-serif',
  'bx_protean_menu_main_font_size' => '1rem',
  'bx_protean_menu_main_font_color' => 'rgba(40, 50, 60, 0.8)',
  'bx_protean_menu_main_font_color_hover' => 'rgba(40, 50, 60, 0.9)',
  'bx_protean_menu_main_font_color_active' => 'rgba(20, 30, 40, 1)',
  'bx_protean_menu_main_font_shadow' => 'none',
  'bx_protean_menu_main_font_weight' => '700',
  'bx_protean_menu_account_bg_color' => 'rgba(255, 255, 255, 0.9)',
  'bx_protean_menu_account_bg_image' => '',
  'bx_protean_menu_account_bg_image_repeat' => 'no-repeat',
  'bx_protean_menu_account_bg_image_attachment' => 'scroll',
  'bx_protean_menu_account_bg_image_size' => 'cover',
  'bx_protean_menu_account_content_padding' => '0px',
  'bx_protean_menu_account_border_color' => 'rgba(0, 0, 0, 0.1)',
  'bx_protean_menu_account_border_size' => '0px',
  'bx_protean_menu_account_shadow' => 'none',
  'bx_protean_menu_account_font_family' => 'Arial, sans-serif',
  'bx_protean_menu_account_font_size' => '1rem',
  'bx_protean_menu_account_font_color' => 'rgba(40, 50, 60, 0.8)',
  'bx_protean_menu_account_font_color_hover' => 'rgba(40, 50, 60, 0.9)',
  'bx_protean_menu_account_font_color_active' => 'rgba(20, 30, 40, 1)',
  'bx_protean_menu_account_font_shadow' => 'none',
  'bx_protean_menu_account_font_weight' => '400',
  'bx_protean_menu_page_bg_color' => 'rgba(255, 255, 255, 0.9)',
  'bx_protean_menu_page_bg_image' => '',
  'bx_protean_menu_page_bg_image_repeat' => 'no-repeat',
  'bx_protean_menu_page_bg_image_attachment' => 'scroll',
  'bx_protean_menu_page_bg_image_size' => 'cover',
  'bx_protean_menu_page_content_padding' => '0.3rem',
  'bx_protean_menu_page_border_color' => 'rgba(0, 0, 0, 0.1)',
  'bx_protean_menu_page_border_size' => '1px',
  'bx_protean_menu_page_shadow' => 'none',
  'bx_protean_menu_page_font_family' => 'Arial, sans-serif',
  'bx_protean_menu_page_font_size' => '1rem',
  'bx_protean_menu_page_font_color' => 'rgba(40, 50, 60, 0.8)',
  'bx_protean_menu_page_font_color_hover' => 'rgba(30, 150, 250, 1)',
  'bx_protean_menu_page_font_color_active' => 'rgba(30, 150, 250, 1)',
  'bx_protean_menu_page_font_shadow' => 'none',
  'bx_protean_menu_page_font_weight' => '400',
  'bx_protean_menu_slide_bg_color' => 'rgba(255, 255, 255, 0.9)',
  'bx_protean_menu_slide_bg_image' => '',
  'bx_protean_menu_slide_bg_image_repeat' => 'no-repeat',
  'bx_protean_menu_slide_bg_image_attachment' => 'scroll',
  'bx_protean_menu_slide_bg_image_size' => 'cover',
  'bx_protean_menu_slide_content_padding' => '1.25rem',
  'bx_protean_menu_slide_border_color' => 'rgba(0, 0, 0, 0.1)',
  'bx_protean_menu_slide_border_size' => '1px 0px 1px 0px',
  'bx_protean_menu_slide_shadow' => 'none',
  'bx_protean_menu_slide_font_family' => 'Arial, sans-serif',
  'bx_protean_menu_slide_font_size' => '1.0rem',
  'bx_protean_menu_slide_font_color' => 'rgba(40, 50, 60, 0.8)',
  'bx_protean_menu_slide_font_color_hover' => 'rgba(40, 50, 60, 0.9)',
  'bx_protean_menu_slide_font_color_active' => 'rgba(20, 30, 40, 1)',
  'bx_protean_menu_slide_font_shadow' => 'none',
  'bx_protean_menu_slide_font_weight' => '400',
  'bx_protean_form_input_height' => '2rem',
  'bx_protean_form_input_bg_color' => 'rgba(255, 255, 255, 0.8)',
  'bx_protean_form_input_bg_color_active' => 'rgba(255, 255, 255, 1)',
  'bx_protean_form_input_border_color' => 'rgba(40, 60, 80, 0.5)',
  'bx_protean_form_input_border_color_active' => 'rgba(30, 150, 250, 1)',
  'bx_protean_form_input_border_size' => '1px',
  'bx_protean_form_input_shadow' => 'inset 0px 0px 2px 1px rgba(0,0,0,0.15)',
  'bx_protean_form_input_font_family' => 'Arial, sans-serif',
  'bx_protean_form_input_font_size' => '1rem',
  'bx_protean_form_input_font_color' => 'rgba(20, 30, 40, 1)',
  'bx_protean_form_input_editor_skin' => '',
  'bx_protean_button_lg_height' => '2rem',
  'bx_protean_button_lg_bg_color' => 'rgba(30, 150, 250, 0.8)',
  'bx_protean_button_lg_bg_color_hover' => 'rgba(30, 150, 250, 1)',
  'bx_protean_button_lg_border_color' => 'rgba(30, 150, 250, 0.8)',
  'bx_protean_button_lg_border_color_hover' => 'rgba(30, 150, 250, 1)',
  'bx_protean_button_lg_border_size' => '1px',
  'bx_protean_button_lg_border_radius' => '3px',
  'bx_protean_button_lg_shadow' => '0px 0px 0px 1px rgba(0,0,0,0.0)',
  'bx_protean_button_lg_font_family' => 'Arial, sans-serif',
  'bx_protean_button_lg_font_size' => '1rem',
  'bx_protean_button_lg_font_color' => 'rgba(255, 255, 255, 0.9)',
  'bx_protean_button_lg_font_color_hover' => 'rgba(255, 255, 255, 1)',
  'bx_protean_button_lg_font_shadow' => 'none',
  'bx_protean_button_lg_font_weight' => '700',
  'bx_protean_button_sm_height' => '1.5rem',
  'bx_protean_button_sm_bg_color' => 'rgba(40, 180, 140, 0.8)',
  'bx_protean_button_sm_bg_color_hover' => 'rgba(40, 180, 140, 1)',
  'bx_protean_button_sm_border_color' => 'rgba(40, 180, 140, 0.8)',
  'bx_protean_button_sm_border_color_hover' => 'rgba(40, 180, 140, 1)',
  'bx_protean_button_sm_border_size' => '1px',
  'bx_protean_button_sm_border_radius' => '2px',
  'bx_protean_button_sm_shadow' => '0px 0px 0px 1px rgba(0,0,0,0)',
  'bx_protean_button_sm_font_family' => 'Arial, sans-serif',
  'bx_protean_button_sm_font_size' => '0.75rem',
  'bx_protean_button_sm_font_color' => 'rgba(255, 255, 255, 0.9)',
  'bx_protean_button_sm_font_color_hover' => 'rgba(255, 255, 255, 1)',
  'bx_protean_button_sm_font_shadow' => 'none',
  'bx_protean_button_sm_font_weight' => '400',
  'bx_protean_font_family' => 'Arial, sans-serif',
  'bx_protean_font_size_default' => '18px',
  'bx_protean_font_color_default' => 'rgba(40, 50, 60, 0.9)',
  'bx_protean_font_color_grayed' => 'rgba(40, 50, 60, 0.5)',
  'bx_protean_font_color_contrasted' => 'rgba(255, 255, 255, 1)',
  'bx_protean_font_size_small' => '12px',
  'bx_protean_font_size_middle' => '15px',
  'bx_protean_font_size_large' => '18px',
  'bx_protean_font_size_h1' => '32px',
  'bx_protean_font_weight_h1' => '700',
  'bx_protean_font_color_default_h1' => 'rgba(40, 50, 60, 1)',
  'bx_protean_font_color_grayed_h1' => 'rgba(40, 50, 60, 0.5)',
  'bx_protean_font_color_contrasted_h1' => 'rgba(255, 255, 255, 0.9)',
  'bx_protean_font_color_link_h1' => 'rgba(30, 150, 250, 0.9)',
  'bx_protean_font_color_link_h1_hover' => 'rgba(30, 150, 250, 1)',
  'bx_protean_font_size_h2' => '24px',
  'bx_protean_font_weight_h2' => '700',
  'bx_protean_font_color_default_h2' => 'rgba(40, 60, 80, 0.9)',
  'bx_protean_font_color_grayed_h2' => 'rgba(40, 60, 80, 0.5)',
  'bx_protean_font_color_contrasted_h2' => 'rgba(255, 255, 255, 1)',
  'bx_protean_font_color_link_h2' => 'rgba(30, 150, 250, 0.9)',
  'bx_protean_font_color_link_h2_hover' => 'rgba(30, 150, 250, 1)',
  'bx_protean_font_size_h3' => '20px',
  'bx_protean_font_weight_h3' => '500',
  'bx_protean_font_color_default_h3' => 'rgba(40, 60, 80, 0.9)',
  'bx_protean_font_color_grayed_h3' => 'rgba(40, 60, 80, 0.5)',
  'bx_protean_font_color_contrasted_h3' => 'rgba(255, 255, 255, 1)',
  'bx_protean_font_color_link_h3' => 'rgba(30, 150, 250, 0.9)',
  'bx_protean_font_color_link_h3_hover' => 'rgba(30, 150, 250, 1)',
  'bx_protean_styles_custom' => 'div.bx-market-unit-cover div.bx-base-text-unit-no-thumb {
 border-width: 0px;
}',
  'bx_protean_vpt_font_size_scale' => '100%',
  'bx_protean_vpm_font_size_scale' => '87.5%',
  'bx_persons_autoapproval' => 'on',
  'bx_persons_default_acl_level' => '3',
  'bx_persons_redirect_aadd' => 'profile',
  'bx_persons_redirect_aadd_custom_url' => '',
  'bx_persons_num_connections_quick' => '6',
  'bx_persons_per_page_browse' => '24',
  'bx_persons_num_rss' => '10',
  'bx_persons_per_page_browse_showcase' => '32',
  'bx_persons_per_page_browse_recommended' => '10',
  'bx_persons_searchable_fields' => 'fullname,description',
  'bx_persons_public_subscriptions' => '',
  'bx_persons_public_subscribed_me' => '',
  'bx_persons_enable_profile_activation_letter' => 'on',
); ?>