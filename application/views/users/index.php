<div class="page-header">
	<h2>Users list</h2>
</div>
<table class="table table-bordered table-striped table-condensed">
	<tr>
		<th>Username</th>
		<th>Email</th>
		<th>Administrator</th>
		<th>Actions</th>
	</tr>
<?php foreach($users as $u):?>
	<tr>
		<td><?=$u->username?></td>
		<td><?=$u->email?></td>
		<td><?=($u->admin)?'<i class="icon-ok"></i>':'<i class="icon-ban-circle"></i>'?></td>
		<td>
			<?=anchor('users/edit/'.$u->id,'<i class="icon-pencil"></i> Edit','class="btn"')?>
			<?=anchor('users/delete/'.$u->id,'<i class="icon-trash icon-white"></i> Delete','class="btn btn-danger danger"')?>
		</td>
	</tr>
<?php endforeach?>
</table>
<div class="row-fluid">
	<div class="span6">
		<?php if($users->paged->total_pages > 1):?>
		<div class="pagination">
		  <ul>
		  	<?php if($users->paged->has_previous):?>
			<li><?=anchor('users/'.$users->paged->previous_page,'Anterior')?></li>
			<?php endif?>
			<li class="active"><a>Página <?=$users->paged->current_page?>/<?=$users->paged->total_pages?></a></li>
			<?php if($users->paged->has_next):?>
users
			<?php endif?>
		  </ul>
		</div>
		<?php else:?>
			&nbsp;
		<?php endif?>
	</div>
	<div class="span6">
		<p class="pull-right">
			<?=anchor('users/add','<i class="icon-plus"></i> Add user','class="btn"')?>
		</p>
	</div>
</div>
