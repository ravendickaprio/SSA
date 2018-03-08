
<!--==============================
=            Logearse            =
===============================-->

<div class="container">
	<div class="card-panel">
		<div class="divider"></div>
		<div id="container"  class="col md-1">
			<script type="text/javascript">
			Highcharts.chart('container', {
		    chart: {
		        type: 'pie',
		        options3d: {
		            enabled: true,
		            alpha: 45
		        }
		    },
		    title: {
		        text: 'Calicicaciones de '
		    },
		    //subtitle: {
		    //    text: '3D donut in Highcharts'
		    //},
		    plotOptions: {
		        pie: {
		            innerSize: 100,
		            depth: 45
		        }
		    },
		    series: [{
		        name: 'Delivered amount',
		        data: [

		            ['Alumnos con 5', <?php echo $rns[0]+3; ?>],
		            ['Alumnos con 6', <?php echo $rns[1]+3; ?>],
		            ['Alumnos con 7', <?php echo $rns[2]+3; ?>],
		            ['Alumnos con 8', <?php echo $rns[3]+3; ?>],
		            ['Alumnos con 9', <?php echo $rns[4]+3; ?>],
		            ['Alumnos con 10', <?php echo $rns[5]+3; ?>],
		            
		        ]
		    }]
		});
			</script>
		</div>
	</div>
</div>

<!--====  End of Logearse  ====-->



