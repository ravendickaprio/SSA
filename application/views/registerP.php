<!--===============================
=            Registrar            =
================================-->

<div class="container">
	<div class="card-panel">
		<!--=============================================================
		=            Inicio de Formulario por el Metodo Post            =
		==============================================================-->
		
		<form action="<?= site_url("/Welcome/Registrar_Profesor/"); ?>" method="POST">
			<div class="row">
				 <form class="col s10 offset-s1">
				      <div class="row">
						<h2 class="col offset-s1 offset-m1 s11 m11">Formulario de Registro Profesor</h2>	
						<h6 class="col offset-s1 offset-m1 s11 m11">Llena los campos</h6>	
				        <div class="input-field col s6 offset-m1 m4">
				          <i class="material-icons prefix">account_circle</i>
				          <input id="icon_prefix" type="text" class="validate" name="nombre" required>
				          <label for="icon_prefix">*Nombre</label>
				        </div>
				        <div class="input-field col s6 offset-m1 m4">
				          <i class="material-icons prefix">account_circle</i>
				          <input id="icon_prefix" type="text" class="validate" name="apellido" required>
				          <label for="icon_prefix">Apellido	</label>
				        </div>
				        <div class="input-field col s6 offset-m1 m4">
				          <i class="material-icons prefix">school</i>
				          <input id="icon_prefix" type="text" class="validate" name="mat" onkeypress="return valida(event)" required>
				          <label for="icon_prefix">*Matricula</label>
				        </div>
				        <div class="input-field col s6 offset-m1 m4">
				          <i class="material-icons prefix">email</i>
				          <input id="icon_telephone" type="email" class="validate" name="correo" required>
				          <label for="icon_telephone" data-error="Correo no valido" data-success="Correo Valido">* Correo</label>
				        </div>
				        <div class="input-field col s6 offset-m1 m4">
				          <i class="material-icons prefix">phone</i>
				          <input id="icon_telephone" type="tel" class="validate" name="cel" onkeypress="return valida(event)">
				          <label for="icon_telephone">Ext Telefonica</label>
				        </div>
				        <div class="input-field col s6 offset-m1 m4">
				          <i class="material-icons prefix">store</i>
				          <input id="icon_telephone" type="tel" class="validate" name="cubi">
				          <label for="icon_telephone">Cubículo</label>
				        </div>
				        <div class="input-field col s6 offset-m1 m4">
				          <i class="material-icons prefix">https</i>
				          <input id="icon_telephone" type="password" class="validate" name="pass" required>
				          <label for="icon_telephone">* Contraseña</label>
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
