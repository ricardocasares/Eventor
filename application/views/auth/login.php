<div class="page-header">
	<h2><?=lang('public_menu_login')?></h2>
</div>
<?=form_open('auth/do_login',array('class' => 'form-horizontal'))?>
	<div class="control-group">
		<label class="control-label" for="username">Nombre de usuario</label>
		<div class="controls">
			<input type="text" class="input-xlarge" id="username" name="username" />
			<p class="help-block">Puede utilizar su nombre de usuario o email.</p>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="password">Password</label>
		<div class="controls">
			<input type="password" class="input-xlarge" id="password" name="password" />
			<p class="help-block">Ingrese su clave personal.</p>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="remember">Recordarme</label>
		<div class="controls">
			<label class="checkbox">
				<input type="checkbox" id="remember" value="1">
				Deseo recordar mis datos en este equipo.
			</label>
		</div>
	</div>
	<div class="form-actions">
		<button type="submit" class="btn btn-primary">Iniciar sesión</button>
		<button class="btn back" type="reset">Cancelar</button>
	</div>
<?=form_close()?>

