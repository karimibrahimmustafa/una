<div class="bx-menu-floating-blocks-info bx-def-font-grayed bx-def-font-small">
    <strong><?php echo $a['total_value'];?> <?php echo $a['total_caption'];?> </strong>
    <?php if($a['bx_if:counter1']['condition']){ ?>
        &bull; <?php echo $a['bx_if:counter1']['content']['value'];?> <?php echo $a['bx_if:counter1']['content']['caption'];?>
    <?php } ?>
    <?php if($a['bx_if:counter2']['condition']){ ?>
        &bull; <span class="col-red1"><?php echo $a['bx_if:counter2']['content']['value'];?> <?php echo $a['bx_if:counter2']['content']['caption'];?></span>
    <?php } ?>
</div>