<div class="tabs">
	<ul class="nav nav-tabs">
		<li class="active"><a href="#profile" data-toggle="tab">Perfil</a></li>
		<li><a href="#password" data-toggle="tab">Contraseña</a></li>
		<li><a href="#plan" data-toggle="tab">Planes</a></li>
	</ul>
	<div class="tab-content">
		<div class="tab-pane active" id="profile">
			<?=form_open('config/#/profile',array('class' => 'form-horizontal'))?>
				<fieldset>
					<legend>Configuración de perfil</legend>
					<div class="control-group">
						<label class="control-label" for="name">Nombre completo</label>
						<div class="controls">
							<?=form_input(array('id' => 'name', 'name' => 'name', 'value' => $user->name, 'class' => 'input-xlarge'))?>
							<p class="help-block">Dinos tu nombre completo.</p>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="email">Email</label>
						<div class="controls">
							<?=form_input(array('id' => 'email', 'name' => 'email', 'value' => $user->email, 'class' => 'input-xlarge'))?>
							<p class="help-block">Tu dirección de correo electrónico.</p>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="phone">Teléfono</label>
						<div class="controls">
							<?=form_input(array('id' => 'phone', 'name' => 'phone', 'value' => $user->phone, 'class' => 'input-xlarge'))?>
							<p class="help-block">Tu número de teléfono.</p>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="address">Dirección</label>
						<div class="controls">
							<?=form_textarea(array('id' => 'address', 'name' => 'address', 'value' => $user->address, 'class' => 'input-xlarge', 'rows' => 3))?>
							<p class="help-block">Tu dirección postal.</p>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="optionsCheckbox">Newsletter</label>
						<div class="controls">
							<label class="checkbox">
							<input type="checkbox" id="optionsCheckbox" value="option1">
							Deseo recibir noticias en mi dirección de correo.
							</label>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="select01">Lenguaje</label>
						<div class="controls">
							<select id="select01">
							<option>Español</option>
							<option>English</option>
							<option>Portuguese</option>
							<option>Française</option>
							<option>Italiano</option>
							</select>
							<p class="help-block">Tu idioma de preferencia.</p>
						</div>
					</div>
					<div class="form-actions">
						<button type="submit" class="btn btn-primary">Guardar información</button>
					</div>
				</fieldset>
			</form>
		</div>
		<div class="tab-pane" id="password">
			<?=form_open('config/#/password',array('class' => 'form-horizontal'))?>
				<fieldset>
					<legend>Cambia tu contraseña</legend>
					<div class="control-group">
						<label class="control-label" for="password">Contraseña actual</label>
						<div class="controls">
							<?=form_password(array('id' => 'password', 'name' => 'password', 'class' => 'input-xlarge'))?>
							<p class="help-block">Ingresa tu contraseña actual para poder modificar tu contraseña.</p>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="new_password">Nueva contraseña</label>
						<div class="controls">
							<?=form_input(array('id' => 'new_password', 'name' => 'new_password', 'class' => 'input-xlarge'))?>
							<p class="help-block">Escribe tu nueva contraseña aquí.</p>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="new_password_confirm">Confirmación</label>
						<div class="controls">
							<?=form_input(array('id' => 'new_password_confirm', 'name' => 'new_password_confirm', 'class' => 'input-xlarge'))?>
							<p class="help-block">Escribe otra vez tu nueva contraseña</p>
						</div>
					</div>
					<div class="form-actions">
						<button type="submit" class="btn btn-primary">Guardar información</button>
					</div>
				</fieldset>
			</form>
		</div>
		<div class="tab-pane" id="plan">
			<div class="page-header">
				<h3>Tu plan</h3>
			</div>
			<div class="well" style="background: #FFC;">
				<p><span class="label label-success"><?=$user->plan->name?></span></p>
				<p><span class="label"><?=$user->product->count()?> / <?=$user->plan->products?></span> Productos restantes</p>
				<div class="progress progress-info">
					<div class="bar" style="width: <?=($user->product->count()/$user->plan->products)*100?>%;"></div>
				</div>
			</div>
			<div class="page-header">
				<h3><?=lang('public_menu_plans')?></h3>
			</div>
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
							<p><?=anchor('subscriptions/create/'.$p->id,'<i class="icon-shopping-cart icon-white"></i> $'.$p->cost.' USD/m Comprar ahora','class="btn btn-success"')?></p>
						</div>
					</div>
				</div>
				<?php endforeach?>
			</div>
		</div>
	</div>
</div>

