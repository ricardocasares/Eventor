<div class="page-header">
	<h2>Add user</h2>
</div>
<?=form_open("users/add/",array('class' => 'form-horizontal'))?>
	<div class="control-group <?=(isset($errors['username'])?'error':'')?>">
		<?=form_label('Username','username')?>
		<div class="controls">
			<?=form_input('username',isset($_POST['username']) ? $_POST['username'] : '','id="username"')?>
			<span class="help-inline"><?php echo isset($errors['username']) ? $errors['username'] : '<span class="label label-important">required</span> Enter desired username'; ?></span>
		</div>
	</div>
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
	<div class="control-group <?=(isset($errors['email'])?'error':'')?>">
		<?=form_label('Email','email')?>
		<div class="controls">
			<?=form_input('email',isset($_POST['email']) ? $_POST['email'] : '','class="input-xlarge" id="email"')?>
			<span class="help-inline"><?php echo isset($errors['email']) ? $errors['email'] : '<span class="label label-important">required</span> Enter user email'; ?></span>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="admin">Administrator?</label>
		<div class="controls">
			<label class="checkbox">
				<input type="checkbox" name="admin" id="admin" value="1">
				<span class="label">optional</span> Yes
			</label>
			<p class="help-block">Non-administrator users may add/edit events but not delete.</p>
		</div>
	</div>
	<?=form_fieldset_close()?>
	<div class="form-actions">
		<?=form_button(array('type' => 'submit', 'content' => 'Save user', 'class' => 'btn btn-primary'))?>
		<?=form_button(array('type' => 'submit', 'name' => 'continue', 'content' => 'Save & continue adding', 'class' => 'btn'))?>
		<?=form_button(array('type' => 'reset', 'content' => 'Cancel', 'class' => 'btn back'))?>
	</div>
<?=form_close()?>

