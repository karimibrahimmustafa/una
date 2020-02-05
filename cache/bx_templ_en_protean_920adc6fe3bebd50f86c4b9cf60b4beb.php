<div class="bx-menu-main-bar-gap bx-def-centered bx-def-padding-leftright bx-def-page-width bx-def-box-sizing">
    <div id="bx-menu-main-bar-wrapper" class="bx-menu-main-bar-wrapper bx-def-round-corners bx-def-color-bg-sec">
        <div id="bx-menu-main-bar" class="bx-menu-main-bar">
            <?php echo $this->processInjection($this->aPage['name_index'], 'injection_top_menu_before'); ?>
            <?php echo $a['code'];?>
            <?php echo $this->processInjection($this->aPage['name_index'], 'injection_top_menu_after'); ?>
        </div>
    </div>
</div>