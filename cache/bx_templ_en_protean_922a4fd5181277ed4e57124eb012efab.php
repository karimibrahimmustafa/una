<div class="bx-chart-stats bx-def-font-align-center">
    <div class="bx-chart-stats-graph">
        <canvas id="bx_chart_stats_graph" width="100%"></canvas>
	    <script type="text/javascript">
	    	var oStatsChart = new Chart($("#bx_chart_stats_graph"), {
	    		type: 'doughnut',
	    		data: <?php echo $a['chart_data'];?>,
	    		options: {
	    		    legend: {
	    		        position: 'bottom'
	    		    },
	    		    padding: {
	    		        left: 0,
	    		        right: 0,
	    		        top: 0,
	    		        bottom: 0
	    		    },
	    		    maintainAspectRatio: false
	    		},
	    	});
	    	$("#bx_chart_stats_graph").height(450);
	    </script>
    </div>
</div>