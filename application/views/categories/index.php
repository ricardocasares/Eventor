<div class="page-header">
	<h2>Categories list</h2>
</div>
<table class="table table-bordered table-striped table-condensed">
	<tr>
		<th>Name</th>
		<th>Color</th>
		<th>Events count</th>
		<th>Actions</th>
	</tr>
<?php foreach($categories as $c):?>
	<tr>
		<td><?=$c->name?></td>
		<td><span class="label" style="background:<?=$c->color?>"><?=$c->color?></span></td>
		<td><?=$c->events->count()?></td>
		<td>
			<?=anchor('categories/edit/'.$c->id,'<i class="icon-pencil"></i> Edit','class="btn"')?>
			<?php if($this->session->userdata('admin')):?>
			<?=anchor('categories/delete/'.$c->id,'<i class="icon-trash icon-white"></i> Delete','class="btn btn-danger danger"')?>
			<?php endif?>
		</td>
	</tr>
<?php endforeach?>
</table>

