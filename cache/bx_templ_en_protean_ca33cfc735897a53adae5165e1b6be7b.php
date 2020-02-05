<?php echo $a['content'];?>
<script type="text/javascript">
    var <?php echo $a['js_object'];?> = new BxDolStudioPermissionsActions({
        sActionUrl: 'http://localhost/una2/grid.php',
        sPageUrl: 'http://localhost/una2/studio/builder_permissions.php?page=actions',
        sObjNameGrid: '<?php echo $a['grid_object'];?>',
        sParamsDivider: '<?php echo $a['params_divider'];?>',
        sTextSearchInput: 'Search...'
    });
</script>