<div id="bx-uploader-file-{storage_object}-{file_id}" class="bx-uploader-ghost bx-def-margin-sec-top bx-clearfix">
    <input type="hidden" name="<?php echo $a['name'];?>[]" value="{file_id}" />
    <div class="bx-base-general-icon-wrapper bx-def-margin-sec-right">
        <img src="{file_icon}" class="bx-def-round-corners bx-base-general-icon bx-base-general-icon-{file_id}" />
    </div>
    <span class="bx-base-general-uploader-ghost">
        <a class="bx-btn bx-btn-small bx-def-margin-sec-right" href="javascript:void(0);" onclick="bx_base_general_delete_ghost('{file_id}', '{file_url}', '{file_icon}', ['<?php echo $this->parseSystemKey('editor_id', $mixedKeyWrapperHtml);?>'], {js_instance_name});">Delete</a>
    </span>
</div>