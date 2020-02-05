<div class="bx-base-profile-unit bx-def-unit bx-def-unit-live-search bx-def-margin-sec-bottom" data-ts="<?php echo $a['ts'];?>">
    <div class="bx-def-unit-img">
	    <a class="bx-def-font-align-center" href="<?php echo $a['content_url'];?>">
			<?php if($a['bx_if:show_thumb_image']['condition']){ ?>
			    <img class="bx-base-pofile-unit-thumb bx-def-thumb bx-def-thumb-size" src="<?php echo $a['bx_if:show_thumb_image']['content']['thumb_url'];?>" />
			<?php } ?>
			<?php if($a['bx_if:show_thumb_letter']['condition']){ ?>
			    <p class="bx-base-pofile-unit-thumb bx-def-thumb bx-def-thumb-size bx-def-border bx-def-box-sizing" style="background-color:rgba(<?php echo $a['bx_if:show_thumb_letter']['content']['color'];?>)"><?php echo $a['bx_if:show_thumb_letter']['content']['letter'];?></p>
			<?php } ?>
	    </a>
    </div><div class="bx-def-unit-info bx-def-thumb-size-max-height bx-def-padding-sec-left"><a href="<?php echo $a['content_url'];?>"><?php echo $a['title'];?></a><br /><span class="bx-def-fonr-grayed bx-def-font-small"><?php echo $a['module_name'];?></span></div>
</div>