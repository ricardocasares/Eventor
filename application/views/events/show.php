<div class="modal" id="myModal">
	<div class="modal-header">
		<a class="close" data-dismiss="modal">×</a>
		<h3><?=$event->title?></h3>
	</div>
	<div class="modal-body">
		<div class="row-fluid">
			<div class="span6">
				<div class="well" id="map">
					<?php if($event->coords):?>
						<div class="thumbnail thumbnail-map">
							<a title="<?=$event->address?>" href="http://maps.google.com/maps?q=<?=$event->address?>&hl=en&sll=<?=$event->coords?>&t=h&z=16">
								<img src="http://maps.googleapis.com/maps/api/staticmap?zoom=16&size=208x150&maptype=hybrid&markers=color:red%7C<?=$event->coords?>&sensor=false" alt="" />
							</a>
						</div>
					<?php endif?>
					<ul class="unstyled event-tags">
						<?php if(!$event->coords && $event->address):?>
						<li class="scroll">
							<i class="icon-home"></i> Address <a href="http://maps.google.com/maps?q=<?=$event->address?>&hl=en&t=h&z=16" rel="tooltip" class="pull-right tip" title="<?=$event->address?>"><?php echo (strlen($event->address) > 25) ? '<marquee scrolldelay="450" behavior="alternate">'.$event->address.'</marquee>' : $event->address?></a>
						</li>
						<?php endif?>
						<li><i class="icon-time"></i> Starts <span class="pull-right"><?=mdate("%m/%d/%Y", mysql_to_unix($event->start))?></span></li>
						<?php if($event->end):?>
						<li><i class="icon-time"></i> Ends <span class="pull-right"><?=mdate("%m/%d/%Y", mysql_to_unix($event->end))?></span></li>
						<?php endif?>
						<?php if($event->cost):?>
						<li><i class="icon-shopping-cart"></i> Cost <span class="pull-right">$<?=$event->cost?></span></li>
						<?php endif?>
						<li><i class="icon-tag"></i> Category <span class="pull-right"><span class="label" style="background: <?=$event->category_color?>"><?=$event->category_name?></span></span></li>
					</ul>
				</div>
			</div>
			<div class="span6">
				<div id="description">
					<?=$event->description?>
				</div>
			</div>
		</div>
	</div>
	<div class="modal-footer">
		<a href="#" class="btn" data-dismiss="modal">Close</a>
		<?php if($this->session->userdata('id')):?>
		<?=anchor('events/edit/'.$event->id,'<i class="icon-pencil"></i> Edit event details','class="btn"')?>
		<?php if($this->session->userdata('admin')):?>
		<?=anchor('events/delete/'.$event->id,'<i class="icon-trash icon-white"></i> Delete event','class="btn btn-danger danger"')?>
		<?php endif?>
		<?php endif?>
	</div>
</div>

