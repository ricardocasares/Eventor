<div class="page-header">
	<h2>Account settings</h2>
</div>
<?=form_open("users/account/".$u->id,array('class' => 'form-horizontal'))?>
	<div class="control-group <?=(isset($errors['username'])?'error':'')?>">
		<?=form_label('Username','username')?>
		<div class="controls">
			<?=form_input('username',isset($_POST['username']) ? $_POST['username'] : $u->username,'id="username"')?>
			<span class="help-inline"><?php echo isset($errors['username']) ? $errors['username'] : '<span class="label label-important">required</span> Enter desired username'; ?></span>
		</div>
	</div>
	<div class="control-group <?=(isset($errors['email'])?'error':'')?>">
		<?=form_label('Email','email')?>
		<div class="controls">
			<?=form_input('email',isset($_POST['email']) ? $_POST['email'] : $u->email,'class="input-xlarge" id="email"')?>
			<span class="help-inline"><?php echo isset($errors['email']) ? $errors['email'] : '<span class="label label-important">required</span> Enter user email'; ?></span>
		</div>
	</div>
	<?=form_fieldset_close()?>
	<div class="form-actions">
		<?=form_button(array('type' => 'submit', 'content' => 'Save account settings', 'class' => 'btn btn-primary'))?>
		<?=form_button(array('type' => 'reset', 'content' => 'Cancel', 'class' => 'btn back'))?>
	</div>
<?=form_close()?>
