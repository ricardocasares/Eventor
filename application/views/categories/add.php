<div class="page-header">
	<h2>Add event category</h2>
</div>
<?=form_open("categories/add/",array('class' => 'form-horizontal'))?>
	<div class="control-group <?=(isset($errors['name'])?'error':'')?>">
		<?=form_label('Category name','name')?>
		<div class="controls">
			<?=form_input('name',isset($_POST['name']) ? $_POST['name'] : '')?>
			<span class="help-inline"><?php echo isset($errors['name']) ? $errors['name'] : '<span class="label label-important">required</span> Enter category name'; ?></span>
		</div>
	</div>
	<div class="control-group <?=(isset($errors['color'])?'error':'')?>">
		<?=form_label('Category color','color')?>
		<div class="controls">
			<?=form_input('color',isset($_POST['color']) ? $_POST['color'] : '','id="color" class="input-small"')?>
			<span class="help-inline"><?php echo isset($errors['color']) ? $errors['color'] : '<span class="label label-important">required</span> Hexadecimal format, ie: #27A38F'; ?></span>
		</div>
	</div>
	<?=form_fieldset_close()?>
	<div class="form-actions">
		<?=form_button(array('type' => 'submit', 'content' => 'Save category', 'class' => 'btn btn-primary'))?>
		<?=form_button(array('type' => 'submit', 'name' => 'continue', 'content' => 'Save & continue adding', 'class' => 'btn'))?>
		<?=form_button(array('type' => 'reset', 'content' => 'Cancel', 'class' => 'btn back'))?>
	</div>
<?=form_close()?>

