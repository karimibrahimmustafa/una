<div id="bx-dbd-htools" class="bx-dbd-block-content">
	<?php if($a['bx_if:show_content']['condition']){ ?>
		<div class="bx-dbd-htools bx-clearfix">
			<?php if(is_array($a['bx_if:show_content']['content']['bx_repeat:items'])) for($i=0; $i<count($a['bx_if:show_content']['content']['bx_repeat:items']); $i++){ ?>
				<div class="bx-dbd-htools-item bx-def-margin-sec-bottom"><?php echo $a['bx_if:show_content']['content']['bx_repeat:items'][$i]['status'];?> <?php echo $a['bx_if:show_content']['content']['bx_repeat:items'][$i]['msg'];?></div>
			<?php } else if(is_string($a['bx_if:show_content']['content']['bx_repeat:items'])) echo $a['bx_if:show_content']['content']['bx_repeat:items']; ?>
		</div>
	<?php } ?>
	<?php if($a['bx_if:show_loader']['condition']){ ?>
		<script type="text/javascript">
			$(document).ready(function() {
				<?php echo $a['bx_if:show_loader']['content']['js_object'];?>.getBlockContent('htools');
			});
		</script>
	<?php } ?>
</div>