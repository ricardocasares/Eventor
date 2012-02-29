<?php if(isset($errors['product'])):?>
	<div class="alert alert-error">
		<?=$errors['product']?>
	</div>
<?php endif?>
<?=form_open('signup',array('class' => 'form-horizontal'))?>
	<fieldset>
		<legend>Crear una cuenta</legend>
		<div class="control-group <?=(isset($errors['username'])?'error':'')?>">
			<label class="control-label" for="username">Nombre de usuario</label>
			<div class="controls">
				<?=form_input('username',isset($_POST['username']) ? $_POST['username'] : '','id="username"')?>
				<p class="help-block"><?php echo isset($errors['username']) ? $errors['username'] : 'Elige tu nombre de usuario.'; ?></p>
			</div>
		</div>
		<div class="control-group <?=(isset($errors['email'])?'error':'')?>">
			<label class="control-label" for="email">Email</label>
			<div class="controls">
				<?=form_input('email',isset($_POST['email']) ? $_POST['email'] : '','id="email"')?>
				<p class="help-block"><?php echo isset($errors['email']) ? $errors['email'] : 'Ingresa tu dirección de email para confirmar tu cuenta.'; ?></p>
			</div>
		</div>
		<div class="control-group <?=(isset($errors['password'])?'error':'')?>">
			<label class="control-label" for="password">Contraseña</label>
			<div class="controls">
				<?=form_password('password',isset($_POST['password']) ? $_POST['password'] : '','id="password"')?>
				<p class="help-block"><?php echo isset($errors['password']) ? $errors['password'] : 'Escribe una contraseña aquí.'; ?></p>
			</div>
		</div>
		<div class="control-group <?=(isset($errors['password_confirm'])?'error':'')?>">
			<label class="control-label" for="password_confirm">Confirmar contraseña</label>
			<div class="controls">
				<?=form_password('password_confirm',isset($_POST['password_confirm']) ? $_POST['password_confirm'] : '','id="password_confirm"')?>
				<p class="help-block"><?php echo isset($errors['password_confirm']) ? $errors['password_confirm'] : 'Escribe otra vez tu contraseña elegida.'; ?></p>
			</div>
		</div>
		<div class="control-group <?=(isset($errors['plan_id'])?'error':'')?>">
			<label class="control-label">Elige tu plan</label>
			<div class="controls">
				<?php foreach($plans as $p):?>
				<label class="radio">
					<?=form_radio('plan_id',$p->id,isset($_POST['plan_id']) && ($_POST['plan_id'] == $p->id))?>
					<span class="label label-success"><?=$p->name?></span> <strong><?=($p->cost) ? '$'.$p->cost.' USD/mes' : 'Gratis'?></strong>
				</label>
				<?php endforeach?>
				<p class="help-block"><?php echo isset($errors['plan_id']) ? $errors['plan_id'] : 'Selecciona un plan para tu cuenta.'; ?></p>
			</div>
		</div>
		<div class="form-actions">
			<button type="submit" class="btn btn-primary btn-success">Crear mi cuenta</button>
			<button type="reset" class="btn back">Cancelar</button>
		</div>
	</fieldset>
</form>

