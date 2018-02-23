<!--==============================================
=            Ingrear alumnos a cursos            =
===============================================-->

<div class="container">
	<div class="card-panel">
		<!--=============================================================
		=            Inicio de Formulario por el Metodo Post            =
		==============================================================-->
		
			<form action="<?= site_url("/CProfesor/RegistraAlumno/"); ?>" method="POST">
			<div class="row">
				  <form class="col s12">
				      <div class="row">
						
						<!--===================================================
						=            Desplegable de Tabla Materias            =
						========================s============================-->
						<div class="input-field col s6  offset-m1 m4">
							<select name="curso">
								<option value="" disabled selected>Cursos</option>					
								<?php foreach ($ress2 as $i=> $ress2):?>							
										<?php if ($ress2!==false): ?>
										<option value="<?php echo $ress2->idClave ?>"><?php echo $ress2->name ?></option>
										<?php else: ?>
										<option value="" disabled="">Materias no disponibles</option>
										
										<?php endif; ?>
										

								<?php endforeach;?>
							

							</select>
							<label>Elije una Materia</label>
						</div>
						<!--====  End of Desplegable de Tabla Materias  ====-->
				        <div class="input-field col s6  offset-m1 m4">
							<select multiple name="alumnos">
								<option value="" disabled selected>Alumnos</option>					
								<?php foreach ($ress3 as $i=> $ress3):?>							
										<?php if ($ress3!==false): ?>
										<option value="<?php echo $ress3->id ?>"><?php echo $ress3->name ?></option>
										<?php else: ?>
										<option value="" disabled="">Alumnos no disponibles</option>
										
										<?php endif; ?>
										

								<?php endforeach;?>
							

							</select>
							<label>Elije una Materia</label>
						</div>
				       
				        <!--Salon y horario-->
				        <!--===========================================
				        =            Parte de Calificacion            =
				        ============================================-->
				       
				        
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


<!--====  End of Ingrear alumnos a cursos  ====-->

