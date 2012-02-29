<div class="page-header">
	<h2>Listado de alertas</h2>
</div>
<table class="table table-bordered">
	<tr>
		<th>Código</th>
		<th>Producto</th>
		<th>Existencia</th>
		<th>Alerta</th>
	</tr>
<?php foreach($products as $p):?>
	<tr>
		<td><?=$p->id?></td>
		<td><?=$p->name?></td>
		<td><?=$p->existence?> <abbr title="<?=$p->measure->name?>"><?=$p->measure->symbol?></abbr></td>
		<td><?=$p->threshold?> <abbr title="<?=$p->measure->name?>"><?=$p->measure->symbol?></abbr></td>
	</tr>
<?php endforeach?>
</table>
