<div class="page-header">
	<h2>Change password</h2>
</div>
<?=form_open("users/password/".$u->id,array('class' => 'form-horizontal'))?>
	<div class="control-group <?=(isset($errors['password'])?'error':'')?>">
		<?=form_label('Password','password')?>
		<div class="controls">
			<?=form_password('password',isset($_POST['password']) ? $_POST['password'] : '','id="password"')?>
			<span class="help-inline"><?php echo isset($errors['password']) ? $errors['password'] : '<span class="label label-important">required</span> Enter desired password'; ?></span>
		</div>
	</div>
	<div class="control-group <?=(isset($errors['password_confirm'])?'error':'')?>">
		<?=form_label('Confirm password','password_confirm')?>
		<div class="controls">
			<?=form_password('password_confirm',isset($_POST['password_confirm']) ? $_POST['password_confirm'] : '','id="password_confirm"')?>
			<span class="help-inline"><?php echo isset($errors['password_confirm']) ? $errors['password_confirm'] : '<span class="label label-important">required</span> Confirm selected password'; ?></span>
		</div>
	</div>
	<?=form_fieldset_close()?>
	<div class="form-actions">
		<?=form_button(array('type' => 'submit', 'content' => 'Change password', 'class' => 'btn btn-primary'))?>
		<?=form_button(array('type' => 'reset', 'content' => 'Cancel', 'class' => 'btn back'))?>
	</div>
<?=form_close()?>
