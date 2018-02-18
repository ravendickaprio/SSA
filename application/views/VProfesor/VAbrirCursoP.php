<!--===============================
=            Registrar   Curso         =
================================-->

<div class="container">
	<div class="card-panel">
		<!--=============================================================
		=            Inicio de Formulario por el Metodo Post            =
		==============================================================-->
		
		<form action="<?= site_url("/CProfesor/RegistraCuerso/"); ?>" method="POST">
			<div class="row">
				  <form class="col s12">
				      <div class="row">
						
						<!--===================================================
						=            Desplegable de Tabla Materias            =
						========================s============================-->
						<div class="input-field col s6  offset-m1 m4">
							<select name="mat">
								<option value="" disabled selected>Materias</option>
								<?php foreach ($ress as $i => $ress):?>
								<?php if ($ress!==false): ?>
								<option value="<?php echo $ress->id ?>"><?php echo $ress->name ?></option>
								<?php else: ?>
								<option value="" disabled="">Materias no disponibles</option>
								
								<?php endif ?>
								<?php endforeach;?>
							</select>
							<label>Elije una Materia</label>
						</div>
						<!--====  End of Desplegable de Tabla Materias  ====-->

				        <div class="input-field col s6 m2">
							<select name="pe">
								<option value="" disabled selected>Periodo</option>
								<option value="Primavera">Primavera</option>
								<option value="Verano">Verano</option>
								<option value="Otoño">Otoño</option>
							</select>
							<label>Elije el Periodo</label>
						</div>
				        <div class="input-field col s6 offset-m1 m2 ">
				          <input id="icon_prefix" type="text" class="validate" name="nrc">
				          <label for="icon_prefix">NRC </label>
				        </div>
				        <div class="input-field col s6 m2">
				          <input id="icon_prefix" type="text" class="validate" name="seccion">
				          <label for="icon_prefix">Seccion</label>
				        </div>

				        <div class="input-field col s6 offset-m1 m2">
				          <input id="icon_prefix" type="text" class="datepicker" name="Finicio">
				          <label for="icon_prefix">Fecha Inicio</label>
				        </div>
						<div class="input-field col s6 m2">
				          <input id="icon_prefix" type="text" class="datepicker" name="Ffinal">
				          <label for="icon_prefix">Fecha Fin</label>
				        </div>
				        <div class="input-field col s6 offset-m1 m2">
				          <input id="icon_prefix" type="text" class="validate" name="salon">
				          <label for="icon_prefix">Salon</label>
				        </div>
				        <div class="input-field col s6 m2">
				          <input id="icon_prefix" type="text" class="validate" name="horario">
				          <label for="icon_prefix">Horario</label>
				        </div>
				        <!--Salon y horario-->
				        <!--===========================================
				        =            Parte de Calificacion            =
				        ============================================-->
				        <div class="divider"></div>
				        <div class="row">
				        	<div class="col s12 m12">
				        		<h5 class="col offset-s1 offset-m1 s11 m11">Criterios de evaluacion</h5>
				        		<p class="col offset-s1 offset-m1"> Nota se Pueden dejar sin calificacion (Se puede Editar posteriormente)</p>
				        	</div>
				        	<div class="input-field col   s4 offset-m1 m1">
					          <input id="icon_prefix" type="text" class="validate" name="parsial1">
					          <label for="icon_prefix">parsial 1</label>
					        </div>
					        <div class="input-field col s4 m1">
					          <input id="icon_prefix" type="text" class="validate" name="parsial2">
					          <label for="icon_prefix">parsial 2</label>
					        </div>
					        <div class="input-field col s4 m1">
					          <input id="icon_prefix" type="text" class="validate" name="parsial3">
					          <label for="icon_prefix">parsial 3</label>
					        </div>
					        <div class="input-field col s4 offset-m1 m1">
					          <input id="icon_prefix" type="text" class="validate" name="tareas">
					          <label for="icon_prefix">tareas</label>
					        </div>
					        <div class="input-field col s4  m1">
					          <input id="icon_prefix" type="text" class="validate" name="practicas">
					          <label for="icon_prefix">practicas</label>
					        </div>
					        <div class="input-field col s4  m1">
					          <input id="icon_prefix" type="text" class="validate" name="proyecto">
					          <label for="icon_prefix">proyecto</label>
					        </div>
					        <div class="input-field col s12 offset-m1 m1">
					          <input id="icon_prefix" type="text" class="validate" name="otro">
					          <label for="icon_prefix">otro</label>
					        </div> 

					    </div>
				    </div>
			        <!--====  End of Parte de Calificacion  ====
    			</form>-->
			</div>
			<div class="divider"></div>
			<div class="row">
				<p class="center-align"><button class="btn waves-effect">Registrar Materia</button></p>
			</div>
		</form>
	</div>
</div>
</div>

<!--====  End of Registrar  ====-->
