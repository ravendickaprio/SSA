<!--===============================
=            Registrar            =
================================-->

<div class="container">
	<div class="card-panel">
		<!--=============================================================
		=            Inicio de Formulario por el Metodo Post            =
		==============================================================-->
		
		<form action="<?= site_url("/Welcome/Registrar_Alumno/"); ?>" method="POST">
			<div class="row">
				 <form class="col s10 offset-s1">
				      <div class="row">
						<h2 class="col offset-s1 offset-m1 s11 m11">Formulario de Registro Alumno</h2>	
						<h6 class="col offset-s1 offset-m1 s11 m11">Llena los campos (todos los campos son obligatorios)</h6>	
				        <div class="input-field col s6 offset-m1 m4">
				          <i class="material-icons prefix">account_circle</i>
				          <input id="icon_prefix" type="text" class="validate" name="nombre" data-length="20" required>
				          <label for="icon_prefix">* Nombre</label>
				        </div>
				        <div class="input-field col s6  offset-m1 m4">
				          <i class="material-icons prefix">account_circle</i>
				          <input id="icon_prefix" type="text" class="validate" name="apellido" data-length="20" required>
				          <label for="icon_prefix">* Apellido </label>
				        </div>
				        <div class="input-field col s6 offset-m1 m4">
				          <i class="material-icons prefix">https</i>
				          <input id="icon_telephone" type="password" class="validate" name="pass" required>
				          <label for="icon_telephone">* Contraseña</label>
				        </div>
				        <div class="input-field col s6 offset-m1 m4">
				          <i class="material-icons prefix">school</i>
				          <input id="icon_prefix" type="text" class="validate" name="mat" required>
				          <label for="icon_prefix">* Matricula</label>
				        </div>
				        <div class="input-field col s6 offset-m1 m4">
				          <i class="material-icons prefix">phone</i>
				          <input id="icon_telephone" type="tel" class="validate" name="cel" required>
				          <label for="icon_telephone">* Telefono</label>
				        </div>
				        <div class="input-field col s6 offset-m1 m4">
				          <i class="material-icons prefix">email</i>
				          <input id="icon_telephone" type="email" class="validate" name="correo" required>
				          <label for="icon_telephone" data-error="Correo no valido" data-success="Correo Valido">* Correo</label>
				        </div>
				          <div class="input-field col s6 offset-m1 m4">
						    <select name="PE" required>
						      <option value="" disabled selected>Plan de estudio</option>
						      <option value="1">Fenix</option>
						      <option value="2">Minerva</option>
						    </select>
						    <label>* Elejir Plan de estudio</label>
						  </div>
    			</form>
			</div>
			<div class="divider"></div>
			<div class="row">
				<p class="center-align"><button class="btn waves-effect">Registrar</button></p>
			</div>
		</form>
	</div>
</div>
</div>
<!--====  End of Registrar  ====-->
