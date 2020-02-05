<div class="bx-def-centered bx-def-padding-sec-leftright bx-def-page-width bx-def-box-sizing">
    <div id="bx-informer" class="bx-def-margin-top bx-def-padding-sec-leftright">
        <?php if(is_array($a['bx_repeat:messages'])) for($i=0; $i<count($a['bx_repeat:messages']); $i++){ ?>
            <div id="<?php echo $a['bx_repeat:messages'][$i]['id'];?>" class="bx-informer-msg <?php echo $a['bx_repeat:messages'][$i]['class'];?> bx-def-padding bx-def-round-corners bx-def-margin-top">
                <?php echo $a['bx_repeat:messages'][$i]['msg'];?>
            </div>
        <?php } else if(is_string($a['bx_repeat:messages'])) echo $a['bx_repeat:messages']; ?>
    </div>
</div>