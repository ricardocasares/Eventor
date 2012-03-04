<div class="page-header">
	<h2><?=lang('public_menu_login')?></h2>
</div>
<?=form_open('auth/do_login',array('class' => 'well form-horizontal'))?>
	<div class="control-group">
		<label class="control-label" for="username">Nombre de usuario</label>
		<div class="controls">
			<div class="input-prepend">
			<span class="add-on"><i class="icon-user"></i></span>
				<input type="text" class="input-xlarge" id="username" name="username" />
				<p class="help-block">Puede utilizar su nombre de usuario o email.</p>
			</div>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="password">Password</label>
		<div class="controls">
			<div class="input-prepend">
				<span class="add-on"><i class="icon-lock"></i></span>			
				<input type="password" class="input" id="password" name="password" />
				<p class="help-block">Ingrese su clave personal.</p>
			</div>
		</div>
	</div>
	<div class="form-actions">
		<button type="submit" class="btn btn-primary">Iniciar sesión</button>
		<button class="btn back" type="reset">Cancelar</button>
	</div>
<?=form_close()?>

