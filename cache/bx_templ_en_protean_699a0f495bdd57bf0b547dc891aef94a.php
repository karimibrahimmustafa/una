<div id="<?php echo $a['form_container_id'];?>" class="bx-uploader-form-cont bx-popup-width">
	<?php echo $a['file_field'];?>

    <div class="bx-uploader-loading"></div>
    <div class="bx-def-padding-sec-bottom bx-croppie-msg"></div>
    <div class="bx-def-padding-sec-bottom" id="<?php echo $a['errors_container_id'];?>"></div>

    <div class="bx-croppie-element bx-def-margin-topbottom"></div>

    <div class="bx-def-padding-top bx-clearfix">
        <button class="bx-crop-action bx-btn bx-btn-disabled bx-def-margin-sec-right bx-def-margin-sec-top bx-crop-upload bx-btn-primary">Upload</button>
        <button class="bx-crop-action bx-btn bx-btn-disabled bx-def-margin-sec-right bx-def-margin-sec-top bx-crop-rotate" data-deg="-90">Rotate Left</button>
        <button class="bx-crop-action bx-btn bx-btn-disabled bx-def-margin-sec-right bx-def-margin-sec-top bx-crop-rotate" data-deg="90">Rotate Right</button>
        <div class="bx-btn bx-def-margin-sec-top" onclick="<?php echo $a['uploader_instance_name'];?>.onClickCancel()">Close</div>
    </div>

</div>

<script>
setTimeout(function () {    
    <?php echo $a['uploader_instance_name'];?>.initUploader({
        bx_form: {
            uo: "<?php echo $a['engine'];?>",
            so: "<?php echo $a['storage_object'];?>",
            uid: "<?php echo $a['uniq_id'];?>",
            m: "<?php echo $a['multiple'];?>",
            c: "<?php echo $a['content_id'];?>",
            p: "<?php echo $a['storage_private'];?>",
            a: "upload"
        },
        viewport: {
            width: 240,
            height: 240,
            // type: 'circle'
        },
        boundary: {
            width: 280,
            height: 280
        },
        enableOrientation: true
    });
}, 100);
</script>