<div id="bx-dbd-cache" class="bx-dbd-block-content bx-clearfix">
	<?php if($a['bx_if:show_chart']['condition']){ ?>
		<div class="bx-dbd-chart bx-def-border"></div>

		<script type="text/javascript">
			<?php echo $a['bx_if:show_chart']['content']['js_object'];?>.initChart('cache', <?php echo $a['bx_if:show_chart']['content']['chart_data'];?>);
		</script>
	<?php } ?>
	<?php if($a['bx_if:show_empty']['condition']){ ?><?php echo $a['bx_if:show_empty']['content']['message'];?><?php } ?>
</div>