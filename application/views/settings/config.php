<div class="page-header">
	<h2>Settings</h2>
</div>
<?=form_open("settings/config/",array('class' => 'form-horizontal'))?>
	<?=form_fieldset('Application settings')?>
	<div class="control-group <?=(isset($errors['appname'])?'error':'')?>">
		<?=form_label('Application name','appname')?>
		<div class="controls">
			<?=form_input('appname',isset($_POST['appname']) ? $_POST['appname'] : $s->appname,'id="appname"')?>
			<span class="help-inline"><?php echo isset($errors['appname']) ? $errors['appname'] : '<span class="label label-important">required</span> Enter application name'; ?></span>
		</div>
	</div>
	<div class="control-group <?=(isset($errors['language'])?'error':'')?>">
		<?=form_label('Language','language')?>
		<div class="controls">
			<?=form_dropdown('language',array(
				'es' => 'Español',
				'en' => 'English',
				'pt' => 'Português'),isset($_POST['language']) ? $_POST['language']: $s->language,'id="language"')?>
			<span class="help-inline"><?php echo isset($errors['language']) ? $errors['language'] : '<span class="label label-important">required</span> Select application language'; ?></span>
		</div>
	</div>
	<div class="control-group <?=(isset($errors['per_page'])?'error':'')?>">
		<?=form_label('Items per page','per_page')?>
		<div class="controls">
			<?=form_input('per_page',isset($_POST['per_page']) ? $_POST['per_page'] : $s->per_page,'id="per_page"')?>
			<span class="help-inline"><?php echo isset($errors['per_page']) ? $errors['per_page'] : '<span class="label label-important">required</span> How much items will be displayed per page'; ?></span>
		</div>
	</div>
	<?=form_fieldset_close()?>
	<?=form_fieldset('Email settings')?>
	<div class="control-group <?=(isset($errors['category_id'])?'error':'')?>">
		<?=form_label('Email protocol','mail_protocol')?>
		<div class="controls">
			<?=form_dropdown('mail_protocol',array('SMTP','PHP mail()','Sendmail'),isset($_POST['mail_protocol']) ? $_POST['mail_protocol']: $s->mail_protocol,'id="mail_protocol"')?>
			<span class="help-inline"><?php echo isset($errors['mail_protocol']) ? $errors['mail_protocol'] : '<span class="label label-important">required</span> Select mail protocol'; ?></span>
		</div>
	</div>
	<div class="control-group <?=(isset($errors['mailpath'])?'error':'')?>">
		<?=form_label('Sendmail path','mailpath')?>
		<div class="controls">
			<?=form_input('mailpath',isset($_POST['mailpath']) ? $_POST['mailpath'] : $s->mailpath,'id="mailpath"')?>
			<span class="help-inline"><?php echo isset($errors['mailpath']) ? $errors['mailpath'] : '<span class="label">optional</span> Your path to sendmail'; ?></span>
		</div>
	</div>
	<div class="control-group <?=(isset($errors['smtp_host'])?'error':'')?>">
		<?=form_label('SMTP server','smtp_host')?>
		<div class="controls">
			<?=form_input('smtp_host',isset($_POST['smtp_host']) ? $_POST['smtp_host'] : $s->smtp_host,'id="smtp_host"')?>
			<span class="help-inline"><?php echo isset($errors['smtp_host']) ? $errors['smtp_host'] : '<span class="label">optional</span> Your SMTP server address'; ?></span>
		</div>
	</div>
	<div class="control-group <?=(isset($errors['smtp_port'])?'error':'')?>">
		<?=form_label('SMTP port','smtp_port')?>
		<div class="controls">
			<?=form_input('smtp_port',isset($_POST['smtp_port']) ? $_POST['smtp_port'] : $s->smtp_port,'id="smtp_port"')?>
			<span class="help-inline"><?php echo isset($errors['smtp_port']) ? $errors['smtp_port'] : '<span class="label">optional</span> Your SMTP port number'; ?></span>
		</div>
	</div>
	<div class="control-group <?=(isset($errors['smtp_user'])?'error':'')?>">
		<?=form_label('SMTP username','smtp_user')?>
		<div class="controls">
			<?=form_input('smtp_user',isset($_POST['smtp_user']) ? $_POST['smtp_user'] : $s->smtp_user,'id="smtp_user"')?>
			<span class="help-inline"><?php echo isset($errors['smtp_user']) ? $errors['smtp_user'] : '<span class="label">optional</span> Your SMTP username'; ?></span>
		</div>
	</div>
	<div class="control-group <?=(isset($errors['smtp_pass'])?'error':'')?>">
		<?=form_label('SMTP password','smtp_pass')?>
		<div class="controls">
			<?=form_password('smtp_pass',isset($_POST['smtp_pass']) ? $_POST['smtp_pass'] : $s->smtp_pass,'id="smtp_pass"')?>
			<span class="help-inline"><?php echo isset($errors['smtp_pass']) ? $errors['smtp_pass'] : '<span class="label">optional</span> Your SMTP password'; ?></span>
		</div>
	</div>
	<?=form_fieldset_close()?>
	<div class="form-actions">
		<?=form_button(array('type' => 'submit', 'content' => 'Apply settings', 'class' => 'btn btn-primary'))?>
		<?=form_button(array('type' => 'reset', 'content' => 'Cancel', 'class' => 'btn back'))?>
	</div>
<?=form_close()?>

