<div class="bx-msg-box-container bx-def-margin-top bx-def-margin-bottom" id="<?php echo $a['id'];?>">
    <div class="bx-msg-box bx-def-padding bx-def-round-corners bx-def-color-bg-hl">
        <?php echo $a['msgText'];?>
    </div>
    <?php if($a['bx_if:timer']['condition']){ ?>
        <script type="text/javascript" language="javascript">
            setTimeout("$('#<?php echo $a['bx_if:timer']['content']['id'];?>').bx_anim('hide', 'fade', 'slow', function(){$(this).remove();})", <?php echo $a['bx_if:timer']['content']['time'];?>);
        </script>
    <?php } ?>
</div>