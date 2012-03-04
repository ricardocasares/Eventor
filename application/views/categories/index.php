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
		<td><?=$c->event_count?></td>
		<td>
			<?=anchor('categories/edit/'.$c->id,'<i class="icon-pencil"></i> Edit','class="btn"')?>
			<?php if($this->session->userdata('admin')):?>
			<?=anchor('categories/delete/'.$c->id,'<i class="icon-trash icon-white"></i> Delete','class="btn btn-danger danger"')?>
			<?php endif?>
		</td>
	</tr>
<?php endforeach?>
</table>
<div class="row-fluid">
	<div class="span6">
		<?php if($categories->paged->total_pages > 1):?>
		<div class="pagination">
		  <ul>
		  	<?php if($categories->paged->has_previous):?>
			<li><?=anchor('categories/'.$categories->paged->previous_page,'Anterior')?></li>
			<?php endif?>
			<li class="active"><a>Página <?=$categories->paged->current_page?>/<?=$categories->paged->total_pages?></a></li>
			<?php if($categories->paged->has_next):?>
categories
			<?php endif?>
		  </ul>
		</div>
		<?php else:?>
			&nbsp;
		<?php endif?>
	</div>
	<div class="span6">
		<p class="pull-right">
			<?=anchor('categories/add','<i class="icon-plus"></i> Add category','class="btn"')?>
		</p>
	</div>
</div>
