<div class="bx-paginate bx-clearfix <?php echo $a['paginate_class'];?>" <?php if(is_array($a['bx_repeat:attrs'])) for($i=0; $i<count($a['bx_repeat:attrs']); $i++){ ?><?php echo $a['bx_repeat:attrs'][$i]['key'];?>="<?php echo $a['bx_repeat:attrs'][$i]['value'];?>" <?php } else if(is_string($a['bx_repeat:attrs'])) echo $a['bx_repeat:attrs']; ?>>

    <div class="bx-paginate-btns bx-def-margin-sec-right bx-btn-group bx-clearfix">
        <?php echo $a['btn_prev'];?>
        <?php echo $a['btn_next'];?>
    </div>

    <?php if($a['bx_if:info']['condition']){ ?>
        <div class="bx-paginate-info">
            <?php echo $a['bx_if:info']['content']['text'];?>
        </div>
    <?php } ?>

    <?php if($a['bx_if:view_all']['condition']){ ?>
        <div class="bx-paginate-view-all">
            <a href="<?php echo $a['bx_if:view_all']['content']['lnk_url'];?>" title="<?php echo $a['bx_if:view_all']['content']['lnk_title'];?>"><?php echo $a['bx_if:view_all']['content']['lnk_content'];?></a>
        </div>
    <?php } ?>

</div>