<div class="page-header">
	<h2>Add an event</h2>
</div>
<?=form_open("events/add",array('class' => 'form-horizontal'))?>
	<?=form_fieldset('Enter event details')?>
	<div class="control-group <?=(isset($errors['title'])?'error':'')?>">
		<?=form_label('Event title','title')?>
		<div class="controls">
			<?=form_input('title',isset($_POST['title']) ? $_POST['title'] : '','id="title"')?>
			<span class="help-inline"><?php echo isset($errors['title']) ? $errors['title'] : '<span class="label label-important">required</span> Enter event title'; ?></span>
		</div>
	</div>
	<div class="control-group <?=(isset($errors['category_id'])?'error':'')?>">
		<?=form_label('Category','category_id')?>
		<div class="controls">
			<?=form_dropdown('category_id',$categories,isset($_POST['category_id']) ? $_POST['category_id']:'','id="category_id"')?>
			<span class="help-inline"><?php echo isset($errors['category_id']) ? $errors['category_id'] : '<span class="label label-important">required</span> Select an event category'; ?></span>
		</div>
	</div>
	<div class="control-group <?=(isset($errors['start'])?'error':'')?>">
		<?=form_label('Start date','start')?>
		<div class="controls">
			<?=form_input('sday',isset($_POST['sday']) ? $_POST['sday'] : '','id="start" class="input-mini" placeholder="DD"')?>
			<?=form_input('smonth',isset($_POST['smonth']) ? $_POST['smonth'] : '','class="input-mini" placeholder="MM"')?>
			<?=form_input('syear',isset($_POST['syear']) ? $_POST['syear'] : '','class="input-mini" placeholder="YYYY"')?>
			<span class="help-inline"><?php echo isset($errors['start']) ? $errors['start'] : '<span class="label label-important">required</span> Enter event start date'; ?></span>
		</div>
	</div>
	<div class="control-group <?=(isset($errors['end'])?'error':'')?>">
		<?=form_label('End date','end')?>
		<div class="controls">
			<?=form_input('eday',isset($_POST['eday']) ? $_POST['eday'] : '','id="end" class="input-mini" placeholder="DD"')?>
			<?=form_input('emonth',isset($_POST['emonth']) ? $_POST['emonth'] : '','class="input-mini" placeholder="MM"')?>
			<?=form_input('eyear',isset($_POST['eyear']) ? $_POST['eyear'] : '','class="input-mini" placeholder="YYYY"')?>
			<span class="help-inline"><?php echo isset($errors['end']) ? $errors['end'] : 'Enter event end date'; ?></span>
		</div>
	</div>
	<div class="control-group <?=(isset($errors['cost'])?'error':'')?>">
		<?=form_label('Cost','cost')?>
		<div class="controls">
			<div class="input-prepend">
				<span class="add-on">$</span>
				<?=form_input('cost',isset($_POST['cost']) ? $_POST['cost'] : '','id="cost" class="input-small"')?>
				<span class="help-inline"><?php echo isset($errors['cost']) ? $errors['cost'] : 'Enter event cost, ie: 15 USD'; ?></span>
			</div>
		</div>
	</div>
	<div class="control-group <?=(isset($errors['address'])?'error':'')?>">
		<?=form_label('Address','address')?>
		<div class="controls">
			<div class="input-prepend">
				<span class="add-on"><i class="icon-home"></i></span>
				<?=form_input('address',isset($_POST['address']) ? $_POST['address'] : '','id="address" class="input-xlarge"')?>
				<span class="help-inline"><?php echo isset($errors['address']) ? $errors['address'] : 'Enter event address'; ?></span>
			</div>
		</div>
	</div>
	<div class="control-group <?=(isset($errors['coords'])?'error':'')?>">
		<?=form_label('Coordinates','coords')?>
		<div class="controls">
			<div class="input-prepend">
				<span class="add-on"><i class="icon-map-marker"></i></span>
				<?=form_input('coords',isset($_POST['coords']) ? $_POST['coords'] : '','id="coords" class="input-large"')?>
				<span class="help-inline"><?php echo isset($errors['address']) ? $errors['address'] : 'Address latitude / longitude'; ?></span>
			</div>
			<div id="map"></div>
		</div>
	</div>
	<div class="control-group <?=(isset($errors['description'])?'error':'')?>">
		<?=form_label('Description','description')?>
		<div class="controls">
			<?=form_textarea('description', isset($_POST['description']) ? $_POST['description'] : '','id="description" class="span6"')?>
			<span class="help-inline"><?php echo isset($errors['description']) ? $errors['description'] : '<span class="label label-important">required</span> Event description'; ?></span>
		</div>
	</div>
	<?=form_fieldset_close()?>
	<div class="form-actions">
		<?=form_button(array('type' => 'submit', 'content' => 'Save event', 'class' => 'btn btn-primary'))?>
		<?=form_button(array('type' => 'submit', 'content' => 'Save & continue adding', 'name' => 'continue', 'class' => 'btn'))?>
		<?=form_button(array('type' => 'reset', 'content' => 'Cancel', 'class' => 'btn back'))?>
	</div>
<?=form_close()?>

