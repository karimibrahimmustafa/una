<div class="bx-base-pofile-popup-wrapper">

    <div class="bx-base-pofile-popup-btn bx-def-padding">
        <?php if($a['bx_if:owner']['condition']){ ?>
            <a class="bx-btn" href="<?php echo $a['bx_if:owner']['content']['change_image_url'];?>">Change Picture</a>
        <?php } ?>
        <a class="bx-btn bx-def-margin-sec-left" title="Close" href="javascript:void(0);" onclick="$(this).parents().filter('.bx-popup-wrapper').dolPopupHide()"><i class="sys-icon times"></i></a>
    </div>

    <img class="bx-base-pofile-popup-image" src="<?php echo $a['image_url'];?>" />
</div>