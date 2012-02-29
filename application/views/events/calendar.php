<?=$calendar?>
<h5>Color reference</h5>
<?php foreach($categories as $c):?>
	<span class="label" style="background:<?=$c->color?>"><?=$c->name?></span>
<?php endforeach?>

