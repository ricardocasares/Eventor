<div class="page-header">
	<h2>Search results for "<?=$query?>"</h2>
</div>
<table class="table table-bordered table-striped">
	<tr>
		<th>Event name</th>
		<th>Cost</th>
		<th>Address</th>
		<th>Start</th>
		<th>End</dth>
		<th>Actions</dth>
	</tr>
<?php foreach($events as $e):?>
	<tr>
		<td>
			<span class="label" style="background:<?=$e->category->color?>"><?=$e->category->name?></span>
			<?=anchor('events/edit/'.$e->id,$e->title)?>
		</td>
		<td>$<?=$e->cost?></td>
		<td><?=$e->address?></td>
		<td><?=mdate('%m/%d/%Y',mysql_to_unix($e->start))?></td>
		<td><?=mdate('%m/%d/%Y',mysql_to_unix($e->end))?></td>
		<td>
			<?=anchor('events/show/'.$e->id,'<i class="icon-share"></i> View','class="btn" data-toggle="modal" data-original-title="'.$e->title.'"')?>
			<?=anchor('events/edit/'.$e->id,'<i class="icon-pencil"></i> Edit','class="btn"')?>
			<?php if($this->session->userdata('admin')):?>
			<?=anchor('events/delete/'.$e->id,'<i class="icon-trash icon-white"></i> Delete','class="danger btn btn-danger"')?>
			<?php endif?>
		</td>
	</tr>
<?php endforeach?>
</table>
<?php if($events->paged->total_pages > 1):?>
<div class="pagination">
  <ul>
  	<?php if($events->paged->has_previous):?>
    <li><?=anchor('products/search/'.$query.'/'.$events->paged->previous_page,'Previous')?></li>
    <?php endif?>
    <li class="active"><a>Page <?=$events->paged->current_page?>/<?=$events->paged->total_pages?></a></li>
    <?php if($events->paged->has_next):?>
    <li><?=anchor('products/search/'.$query.'/'.$events->paged->next_page,'Next')?></li>
    <?php endif?>
  </ul>
</div>
<?php endif?>

