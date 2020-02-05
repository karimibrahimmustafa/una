<div id="bx-sliding-menu-account" class="bx-sliding-menu-main bx-sliding-menu-fullheight bx-def-z-index-nav bx-def-color-bg-block bx-def-border-bottom bx-def-box-sizing bx-search-site" style="display:none; opacity:1;">
    <div class="bx-def-page-width bx-def-centered">
        <div class="bx-sliding-menu-main-cnt">
            <a class="bx-sliding-menu-close bx-def-margin-sec-top bx-def-margin-right bx-def-font-h1" href="javascript:void(0);" onclick="bx_menu_slide_inline('#bx-sliding-menu-account')"><i class="sys-icon times"></i></a>

            <div class="bx-menu-account-popup bx-menu-object-<?php echo $a['object'];?> bx-def-padding-top bx-def-padding-leftright">
                <div class="bx-menu-account-popup-profile bx-clearfix"><?php echo $a['active_profile'];?></div>
                <div class="bx-menu-account-popup-menu bx-def-margin-sec-top"><?php echo $a['menu_notifications'];?></div>
            </div>
            <div class="bx-menu-account-popup-profile-switcher bx-def-box-sizing"><?php echo $a['profile_switcher'];?></div>
            <?php if($a['bx_if:multiple_profiles_mode']['condition']){ ?>
                <hr class="bx-def-hr" />
                <div class="bx-menu-account-popup-profile-switcher-link bx-def-padding">
                    <a class="bx-btn" href="<?php echo $a['bx_if:multiple_profiles_mode']['content']['url_switch_profile'];?>">
                        <i class="sys-icon plus"></i><span class="bx-def-padding-sec-left">Create a new profile</span>
                    </a>
                </div>
            <?php } ?>
        </div>
    </div>
</div>