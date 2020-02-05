<div class="bx-chart-growth">
	<div class="bx-chart-growth-controls bx-def-margin-bottom"><?php echo $a['controls'];?></div>
	<div class="bx-chart-growth-graph bx-def-border">
        <div class="bx-chart-growth-graph-error bx-def-font-align-center"></div>
		<canvas id="bx_chart_growth_graph" width="100%"></canvas>
	</div>
	<script type="text/javascript">
        var oBxDolChartGrowth = new BxDolChartGrowth({
            sObjName: 'oBxDolChartGrowth',
            sRootUrl: 'http://localhost/una2/',
            sDateFrom: '<?php echo $a['date_from'];?>',
            sDateTo: '<?php echo $a['date_to'];?>'
        });
    </script>
</div>