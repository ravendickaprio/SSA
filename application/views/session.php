
<!--==============================
=            Logearse            =
===============================-->

<div class="container">
	<div class="card-panel">
		<form action="<?= site_url("/Welcome/Validation/"); ?>" method="POST">
			<div class="row">
				<h2 class="col offset-s1 offset-m1">Iniciar Session</h2>
				<div class="input-field col offset-m2 m6 offset-s1 s10">
					<i class="material-icons prefix">account_circle</i>
					<input id="user" type="text" class="validate" name="user" onkeypress="return valida(event)" required>
					<label for="user">ID (Matricula)</label>
				</div>
			</div>
			<div class="row">
				<div class="input-field col offset-m2 m6 offset-s1 s10">
					<i class="material-icons prefix">https</i>
					<input id="mat" type="password" class="validate" name="mat" required>
					<label for="mat">Contraseña</label>
				</div>
			</div>
				<!--====================================
				=               Input                  =
				=====================================-->
				
				
				
				<div class="row">
					<div class="input-field col offset-m2 m6 offset-s1 s10 ">
			    	 <select id="lvl" name="lvl">
			  		    <option value="" disabled selected>Profesor o Alumno</option>
			   		   <option  value="1">Profesor</option>
			   		   <option  value="2">Alumno</option>
			   		 </select>
			  		 <label>Profesor o Alumno</label>
			  		</div>
				</div>


		<div class="row">
			<p class="center-align"><button class="btn waves-effect pulse">Iniciar Sesi&oacute;n</button></p>
		</div>

		</form>
		<div class="divider"></div>
		
	</div>
</div>

<!--====  End of Logearse  ====-->



