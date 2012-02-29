<h2><?=lang('public_menu_plans')?></h2>
<hr />
<div class="row-fluid">
	<?php foreach($plans as $p):?>
	<div class="span4">
		<div class="thumbnail">
			<div class="caption">
				<h3><span class="label label-success"><?=$p->name?></span></h3>
				<ul class="unstyled">
					<li>Límite de productos <span class="label"><?=$p->products?></span></li>
					<li>Acceso móvil <span><?=$p->mobile?'<i class="icon-ok-sign"></i>':'<i class="icon-ban-circle"></i>'?></span></li>
					<li>Soporte vía email <span><?=$p->email_support?'<i class="icon-ok-sign"></i>':'<i class="icon-ban-circle"></i>'?></span></li>
					<span><li>Soporte vía Skype <span><?=$p->skype_support?'<i class="icon-ok-sign"></i>':'<i class="icon-ban-circle"></i>'?></span></li>
				</ul>
				<p><?=anchor('signup','<i class="icon-shopping-cart icon-white"></i> $'.$p->cost.' USD/m Comprar ahora','class="btn btn-success"')?></p>
			</div>
		</div>
	</div>
	<?php endforeach?>
</div>

