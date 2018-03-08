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
	<script>
		$(document).ready(function(){
      	$('.parallax').parallax();
    	});
		$(function() {
			$(".button-menu").sideNav();
			$('select').material_select();
			/*----------  Carrucel de Imagenes  ----------*/
			$('.carousel.carousel-slider').carousel({fullWidth: true});
			/*Otro gato*/
			$('.collapsible').collapsible();
			/*----------  conteo de caracteres  ----------*/
			$('input#input_text, textarea#textarea1').characterCounter();
			$('.datepicker').pickadate({
			    selectMonths: true, // Creates a dropdown to control month
			    selectYears: 15, // Creates a dropdown of 15 years to control year,
			    today: 'Today',
			    clear: 'Clear',
			    close: 'Ok',
			    closeOnSelect: false // Close upon selecting a date,
			  });
			
			  $('.timepicker').pickatime({
			    default: 'now', // Set default time: 'now', '1:30AM', '16:30'
			    fromnow: 0,       // set default time to * milliseconds from now (using with default = 'now')
			    //twelvehour: false, // Use AM/PM or 24-hour format
			    donetext: 'OK', // text for done-button
			    cleartext: 'Clear', // text for clear-button
			    canceltext: 'Cancel', // Text for cancel-button
			    autoclose: false, // automatic close timepicker
			    ampmclickable: true, // make AM PM clickable
			    aftershow: function(){} //Function for after opening timepicker
			  });
		});
	</script>
	<script>
function valida(e){

    
        
    tecla = (document.all) ? e.keyCode : e.which;

    //Tecla de retroceso para borrar, siempre la permite
    if (tecla==8){
        return true;
    }
        
    // Patron de entrada, en este caso solo acepta numeros
    patron =/[0-9]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
}
</script>
</head>
<body>