<script type="text/javascript">
	$(document).ready(function(){
		var datos = {
			type: "pie",
			data : {
				datasets :[{
					data : [
						5,
						10,
						40,
						12,
						23,
						1,
					],
					backgroundColor: [
						"#F7464A",
						"#46BFBD",
						"#FDB45C",
						"#949FB1",
						"#4D5360",
						"#9C2C2C",
					],
				}],
				labels : [
					"Alumnos con 5 o menos",
					"Alumnos con 6",
					"Alumnos con 7",
					"Alumnos con 8",
					"Alumnos con 9",
					"Alumnos con 9",
				]
			},
			options : {
				responsive : true,
			}
		};

		var canvas = document.getElementById('chart').getContext('2d');
		window.pie = new Chart(canvas, datos);
	});
</script>