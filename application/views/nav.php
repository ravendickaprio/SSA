<nav>
	<div class="nav-wrapper light-blue darken-3">
		
		<a href="#!" class="brand-logo hide-on-med-and-up"></a>
		<!--======================================
		=            Nombre en el nav            =
		=======================================-->
		
		<!--<?php 
			echo $this->session->userdata('s_name'); 
			echo $this->session->userdata('s_level'); 
			var_dump($this->session->s_level);
		?>-->


		<!--=====================================
		=            Polo Comento esto!            =
		======================================-->
		
		<!--<a class='dropdown-button btn #b0bec5 blue-grey lighten-3' href='#' style="margin: 1em 1em; float:right;" data-activates='dropdown1'> Boton normal para copiar :V </a> -->

	<!--===============================================
	=            Session Activa con imagen            =
	================================================-->
	
    <?php if ($this->session->userdata('s_level')!==NULL): ?>
    	<!-- Dropdown Trigger -->
  		<div class="chip dropdown-button btn" data-activates='dropdown1' style="margin: 1em 1em; float:right;">
   		 	<img src="<?= site_url("/css/yuna.jpg"); ?>" alt="Contact Person">
  		 	<?php $nombre=$this->session->userdata('s_name')." ".$this->session->userdata('s_lastname');
  		 		echo $nombre;?>
  		</div>
	
	<!--====  End of Session Activa con imagen  ====-->
	
		<!--=========================================
		=            Dropdown Estructura            =
		==========================================-->
	  	<!-- Dropdown Structure -->
	 	 <ul id='dropdown1' class='dropdown-content'>
	 	 	<?php if ($this->session->userdata('s_level')==="1" || $this->session->userdata('s_level')==="2"): ?>
				<li>
					<!--<i class="material-icons" style="font-size:1rem">border_color</i>-->
					<a href ="<?= site_url("/CProfesor/MostrarPerfil/");?>">Perfil</a>
				</li>
				<!--<li>
					<i class="material-icons" style="font-size:1rem">assignment_ind</i>
					<a href ="#!">Contacto</a>
				</li>-->
	 	 		
	 	 	<?php else: ?>
				<li>
					<!--<i class="material-icons" style="font-size:1rem">border_color</i>-->
					<a href ="<?= site_url("/CAlumno/MostrarPerfil/");?>">Perfil</a>
				</li>
				<!--<li>
					<i class="material-icons" style="font-size:1rem">assignment_ind</i>
					<a href ="#!">Contacto</a>
				</li>-->
	 	 	<?php endif ?>
			<li class   ="divider"></li>
			<li><a href ="<?= site_url("/Welcome/Cerrar/");?>">Cerrar Sesion</a></li>
			<!--==================================
			=            Polo Comento            =
			===================================-->
			
	  	   <!-- html comment Botones que podemos usar
	  	   <li><a href="#!"><i class="material-icons">view_module</i>holi</a></li>
	  	   <li><a href="#!"><i class="material-icons">cloud</i>holix2</a></li>-->
	  	</ul>
		
		<!--====  End of Dropdown Estructura  ====-->
	
	<!--=============================
	=            SideNav            =
	==============================-->
	
    <?php endif ?>

		<ul class="left">
			<li><a href="#!" data-activates="mobile-demo" class="button-menu"><i class="material-icons">menu</i></a></li>
		</ul>

		<ul class="side-nav" id="mobile-demo">	
			<li>
				<img src="<?= site_url("/css/BUAP.png");  ?>" alt="" style="left-margin: 0em;width: 100%;">
			</li>

			<!--=====================================================
			=            php-if de validacion de session            =
			======================================================-->
			
			
			<?php if ($this->session->userdata('s_level')!==NULL): ?>
				<?php if($this->session->userdata('s_level')==="1" || $this->session->userdata('s_level')==="2"): ?>
					<!--====================================
					=            Si es Profesor            =
					=====================================-->
					
					<li><a href="<?= site_url("/CProfesor/abrircurso/");?>" class="black-text"><i class="material-icons">account_box</i>Abrir Curso</a></li>

					<li><a href="<?= site_url("/CProfesor/MostrarCursosP/"); ?>"><i class="material-icons">account_box</i>Cursos</a></li> 

					<li><a href="<?= site_url("/CProfesor/IngresarAlumnos/"); ?>"><i class="material-icons">account_box</i> Ingresar Alumnos </a></li> 

					<li><a href="<?= site_url("/CProfesor/SeleccionarMateria/"); ?>"><i class="material-icons">account_box</i>Subir Calificaciones</a></li> 

					<li><a href="<?= site_url("/CProfesor/Estadisticas/"); ?>"><i class="material-icons">account_box</i>Estadisticas</a></li> 

					<li><a href="<?= site_url("/CProfesor/SeleccionarAlumno/"); ?>"><i class="material-icons">account_box</i>Historial</a></li> 
					<?php if ($this->session->userdata('s_level')==="1"): ?>
						<li><a href="<?= site_url("/CProfesor/Estadisticas/");?>" class="black-text"><i class="material-icons">account_box</i>.Fortune</a></li>

					<?php endif ?>


				<?php else: #nivel 3 ?> 
					<!--==================================
					=            Si es Alumno            =
					===================================-->
					
					<li><a href="<?= site_url("/CAlumno/MostrarMaterias/");?>" class="black-text"><i class="material-icons">account_box</i>Materias</a></li>

					<li><a href="<?= site_url("/CAlumno/VMostrarCalificaciones/"); ?>"><i class="material-icons">account_box</i>Calificaciones</a></li>

					<li><a href="<?= site_url("/CAlumno/MostrarPprofesores/"); ?>"><i class="material-icons">account_box</i>Profesores</a></li>
					
					<li><a href="<?= site_url("/CAlumno/VMostrarCalificaciones/"); ?>"><i class="material-icons">account_box</i>Historial Académco</a></li>  
				
				<?php endif; ?>
			<?php else: ?>
				<!--=================================
				=            Sin Session            =
				==================================-->
				
				<li><a href="<?= site_url("/Welcome/Session/");?>" class="black-text"><i class="material-icons ">fingerprint</i>Identificarse</a></li>
				
				<li>	
					<ul class="collapsible" data-collapsible="accordion">
    						<li>
    						  <a class="collapsible-header" style="margin-left: 1.2em;"><i class="material-icons">account_box</i>Registrar</a>

    					 	 <div class="collapsible-body"><a href="<?= site_url("/Welcome/RegisterP/"); ?>" style=	"color:black; margin-left: 5em;">Profesor</a></div>
    					 	 <div class="collapsible-body"><a href="<?= site_url("/Welcome/RegisterA/"); ?>" style="color:black; margin-left: 5em;">Alumno</a></div>
    						</li>
					</ul>
				</li>
				
				

			<?php endif; ?>

			
			<!--====  End of php-if de validacion de session  ====-->
			

			<!--==================================
			=            Polo Comento            =
			===================================-->
			
			<!--Enlaces extra del nav
			<li><a class="subheader">Subheader</a></li>
			<li><a class="waves-effect" href="#!">Third Link With Waves</a></li>
			<li>
				<img src="<?= site_url("/css/Imagenes/pts.png");  ?>" alt="" style="left-margin: 0em;width: 100%;">
			</li>-->
		</ul>
	</div>
	
	<!--====  End of SideNav  ====-->
	
</nav>

