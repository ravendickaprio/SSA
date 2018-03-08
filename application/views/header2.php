<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>SSA|<?php if ($this->session->userdata('s_level')!==NULL){echo $this->session->userdata('s_name');}?></title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="<?= site_url("/css/materialize.min.css"); ?>">
	<link rel="stylesheet" href="<?= site_url("/css/fonts.css"); ?>">
	<!--<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">-->
	<script src="<?= site_url("/js/jquery.js"); ?>"></script>
	<script src="<?= site_url("/js/materialize.min.js"); ?>"></script>
	<script src="<?= site_url("/Chart/Chart.bundle.min.js"); ?>"></script>
	<script>
		$(function() {
			$(".button-menu").sideNav();
			$('select').material_select();
			/*----------  Carrucel de Imagenes  ----------*/
			$('.carousel.carousel-slider').carousel({fullWidth: true});
			/*Otro gato*/
			$('.collapsible').collapsible();
			/*----------  conteo de caracteres  ----------*/
			$('input#input_text, textarea#textarea1').characterCounter();
			
		});
	</script>
	<script type="text/javascript">
	$(document).ready(function(){
		var datos = {
			type: "pie",
			data : {
				datasets :[{
					data : [
						<?php echo $rns[0]+3; ?>,
						<?php echo $rns[1]+3; ?>,
						<?php echo $rns[2]+3; ?>,
						<?php echo $rns[3]+3; ?>,
						<?php echo $rns[4]+3; ?>,
						<?php echo $rns[5]+3; ?>,
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
	
</head>
<body>