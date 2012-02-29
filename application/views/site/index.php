<div class="hero-unit">
	<h1><?=lang('public_welcome')?></h1>
    <p><strong><?=lang('public_tagline')?></strong><p>
    <p><?=lang('public_description')?></p>
    <p><?=anchor('tour','<i class="icon-film icon-white"></i> '.lang('public_button_start_tour'),'class="btn btn-large btn-info"')?> <?=anchor('signup','<i class="icon-user icon-white"></i> '.lang('public_button_create_account'),'class="btn btn-large btn-success"')?></p>
</div>
<div class="row-fluid">
        <div class="span4">
        	<div class="well" style="background:#FFC;">
				<h2><?=lang('extremely_simple')?></h2>
				<p>Cargue el sistema con sus productos e ingrese la cantidad existente y la cantidad crítica, luego vaya registrando entradas y salidas de sus productos, el sistema le notificará los productos lleguen a su existencia crítica.</p>
				<p><a class="btn btn-info"><i class="icon-film icon-white"></i> <?=lang('public_button_learn')?></a></p>
        	</div>
        </div>
        <div class="span4">
        	<div class="well" style="background:#FFC;">
				<h2><?=lang('super_fast')?></h2>
				<p>Desarrollado con la última tecnología HTML5 y software de código abierto, hemos llegado a un balance perfecto entre diseño y usabilidad</p>
				<p><a class="btn btn-info"><i class="icon-film icon-white"></i> <?=lang('public_button_learn')?></a></p>
			</div>
       </div>
        <div class="span4">
        	<div class="well" style="background: #FFC;">
				<h2><?=lang('wherever_you_are')?> <sup><span class="label label-warning"><?=lang('public_label_new')?></span></sup></h2>
				<p>Stockr está diseñado para ser usado tanto en computadoras como dispositivos móviles, por lo tanto puede dotar a sus empleados de tabletas o smartphones para registar el movimiento de productos.</p>
				<p><a class="btn btn-info"><i class="icon-film icon-white"></i> <?=lang('public_button_learn')?></a></p>
			</div>
        </div>
</div>
<div class="page-header">
	<h3>Lo que dicen nuestros clientes</h3>
</div>
<?php
	$quotes = array(
            '<p>El sistema es sorprendentemente simple, cargo mis productos, registro las entradas y salidas, y ahora cada vez que me falta algo lo sé y el sistema me avisa antes de tener que salir a comprar a las apuradas.</p>
	<small>Pipo Gaetano, <em>Restaurante "La Lola"</em></small>',
            '<p>Puedo hacer mi trabajo de forma ágil y estar siempre al tanto de lo que tengo que pedir a mis proveedores, antes de que se acaben mis productos. Además puedo entrar al sistema desde cualquier lugar, sin necesidad de una computadora, sólo con mi teléfono.</p>
	<small>Rubén Puga, <em>Full Cerámicos</em></small>',
    );
?>
<blockquote>
	<?=random_element($quotes)?>
</blockquote>
