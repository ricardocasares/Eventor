<?=$calendar?>
<h5>Color reference</h5>
<span id="drag" class="label label-success">Drag me please</span>
<?php foreach($categories as $c):?>
	<span class="label" style="background:<?=$c->color?>"><?=$c->name?></span>
<?php endforeach?>

