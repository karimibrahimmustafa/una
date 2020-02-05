<div class="bx-form-input-files-uploaders bx-def-margin-sec-top">
    <?php echo $a['uploaders_buttons'];?>
    <div class="bx-clear"></div>
</div>
<?php echo $a['info'];?>
<?php echo $a['error'];?>
<div id="<?php echo $a['id_container_errors'];?>" class="bx-form-input-files-errors"></div>
<div id="<?php echo $a['id_container_result'];?>" class="bx-form-input-files-result bx-clearfix"></div>
<script>
    $(document).ready(function(){
        if (<?php echo $a['is_init_ghosts'];?>)
            <?php echo $a['uploader_instance_name'];?>.restoreGhosts();
    });
</script>