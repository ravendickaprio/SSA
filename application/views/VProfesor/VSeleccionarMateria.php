<!--==============================================
=         Seleccionar Materia y Enviar a Subri Calificaciones                =
===============================================-->

<div class="container" >
	<div class="card-panel">
		<!--=============================================================
		=            Inicio de Formulario por el Metodo Post            =
		==============================================================-->
		
			<form action="<?= site_url("/CProfesor/SubirCalificaciones"); ?>" method="POST">
			<div class="row">
				  <form class="col s12">
				      <div class="row">
						<h2 class="col offset-m1 s12">Seleccionar Materia</h2>
						<!--===================================================
						=            Desplegable de Tabla Materias            =
						========================s============================-->
						<div class="input-field col s6  offset-m1 m4">
							<select name="curso">
								<option value="" disabled selected>Cursos</option>					
								<?php foreach ($ress2 as $i=> $ress2):?>							
										<?php if ($ress2!==false): ?>
										<option value="<?php echo $ress2->idClave ?>"><?php echo $ress2->name." ".$ress2->Seccion?></option>
										<?php else: ?>
										<option value="" disabled="">Materias no disponibles</option>
										
										<?php endif; ?>
										

								<?php endforeach;?>
							

							</select>
							<label>Elije una Materia</label>
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


<!--====  End of Seleccionar Materia y Enviar a Subri Calificaciones  ====-->

