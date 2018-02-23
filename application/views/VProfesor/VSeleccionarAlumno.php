<!--==============================================
=         Seleccionar Alumno y Enviar a Subri Calificaciones                =
===============================================-->

<div class="container">
	<div class="card-panel">
		<!--=============================================================
		=            Inicio de Formulario por el Metodo Post            =
		==============================================================-->
		
			<form action="<?= site_url("/CProfesor/Vhistorial"); ?>" method="POST">
			<div class="row">
				  <form class="col s12">
				      <div class="row">
						<h2 class="col offset-m1 s12">Seleccionar Materia</h2>
						<!--===================================================
						=            Desplegable de Tabla Materias            =
						========================s============================-->
						<div class="input-field col s6  offset-m1 m4">
							<select name="alumno">
								<option value="" disabled selected>Alumnos</option>					
								<?php foreach ($ress as $i=> $ress):?>							
										<?php if ($ress!==false): ?>
										<option value="<?php echo $ress->id ?>"><?php echo $ress->name." ".$ress->lastname?></option>
										<?php else: ?>
										<option value="" disabled="">Alumno no disponibles</option>
										
										<?php endif; ?>
										

								<?php endforeach;?>
							

							</select>
							<label>Elije una Alumno</label>
						</div>
						<!--====  End of Desplegable de Tabla Materias  ====-->
				        
				        
				    </div>
			        <!--====  End of Parte de Calificacion  ====
    			</form>-->
			</div>

			<div class="divider"></div>
			<div class="row">
				<p class="center-align"><button class="btn waves-effect">Seleccionar Materia</button></p>
			</div>
		</form>
	</div>
</div>
</div>


<!--====  End of Seleccionar Alumno y Enviar a historial  ====-->

