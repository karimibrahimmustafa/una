<div id="bx-dbd-space" class="bx-dbd-block-content">
	<?php if($a['bx_if:show_content']['condition']){ ?>
		<div class="bx-dbd-chart bx-def-border"></div>

		<script type="text/javascript">
			<?php echo $a['bx_if:show_content']['content']['js_object'];?>.initChart('space', <?php echo $a['bx_if:show_content']['content']['chart_data'];?>);
		</script>
	<?php } ?>
	<?php if($a['bx_if:show_loader']['condition']){ ?>
		<script type="text/javascript">
			$(document).ready(function() {
				<?php echo $a['bx_if:show_loader']['content']['js_object'];?>.getBlockContent('space');
			});
		</script>
	<?php } ?>
</div>