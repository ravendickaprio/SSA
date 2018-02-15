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
				 <form class="col s12">
				      <div class="row">
						
						

				        <div class="input-field col s6">
				          <i class="material-icons prefix">account_circle</i>
				          <input id="icon_prefix" type="text" class="validate" name="nombre">
				          <label for="icon_prefix">First Name</label>
				        </div>
				        <div class="input-field col s6">
				          <i class="material-icons prefix">account_circle</i>
				          <input id="icon_prefix" type="text" class="validate" name="apellido">
				          <label for="icon_prefix">Last Name</label>
				        </div>
				        <div class="input-field col s6">
				          <i class="material-icons prefix">rowing</i>
				          <input id="icon_prefix" type="text" class="validate" name="mat">
				          <label for="icon_prefix">Matricula</label>
				        </div>
				        <div class="input-field col s6">
				          <i class="material-icons prefix">phone</i>
				          <input id="icon_telephone" type="tel" class="validate" name="cel">
				          <label for="icon_telephone">Telephone</label>
				        </div>
				        <div class="input-field col s6">
				          <i class="material-icons prefix">child_care</i>
				          <input id="icon_telephone" type="tel" class="validate" name="cubi">
				          <label for="icon_telephone">Cubículo</label>
				        </div>
				        <div class="input-field col s6">
				          <i class="material-icons prefix">https</i>
				          <input id="icon_telephone" type="text" class="validate" name="correo">
				          <label for="icon_telephone">Correo</label>
				        </div><div class="input-field col s6">
				          <i class="material-icons prefix">https</i>
				          <input id="icon_telephone" type="password" class="validate" name="pass">
				          <label for="icon_telephone">Contraseña</label>
				        </div>
				         
						<!--    <label>Plan de estudio</label>
						  <select class="browser-default">
						    <option value="" disabled selected>Choose your figther-fosil</option>
						    <option value="1">Fenix</option>
						    <option value="2">Minerva</option>
						    <option value="3">A la minerga</option>
						  </select>
				      </div>-->
    			</form>
			</div>
			<div class="divider"></div>
			<div class="row">
				<p class="center-align"><button class="btn waves-effect">Registrar</button></p>
			</div>
		</form>
	</div>
</div>

<!--====  End of Registrar  ====-->
