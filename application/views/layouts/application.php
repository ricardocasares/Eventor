<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Eventor</title>
    <meta name="description" content="">
    <meta name="author" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1.0; maximum-scale=1.0; user-scalable=1;" />
	<meta name="HandheldFriendly" content="True" />

    <!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le styles -->
    <?=link_tag('static/css/application.css')?>
     <?=link_tag('static/css/calendar.css')?>
     <?=link_tag('static/css/jquery.miniColors.css')?>
    <?=link_tag('static/css/bootstrap.css')?>
    <?=link_tag('static/css/bootstrap-responsive.css')?>

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="images/favicon.ico">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">
  </head>
  <body>
	<div class="navbar navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<?=anchor('upcoming',$settings->appname,'class="brand"')?>
				<div class="nav-collapse">
					<ul class="nav pills">
						<li <?=active('upcoming')?>><?=anchor('upcoming','<i class="icon-asterisk icon-white"></i> '.lang('menu_upcoming'))?></li>
						<li <?=active('calendar')?>><?=anchor('calendar','<i class="icon-calendar icon-white"></i> Calendar')?></li>
						<li class="dropdown" id="menu1">
							<?=anchor('#menu1','<i class="icon-time icon-white"></i> Manage events <b class="caret"></b>','class="dropdown-toggle" data-toggle="dropdown"')?>
							<ul class="dropdown-menu">
								<li <?=active('events')?>><?=anchor('events/index','<i class="icon-th-list"></i> List all events')?></li>
								<li <?=active('categories')?>><?=anchor('categories/index','<i class="icon-th-list"></i> List all categories')?></li>
							</ul>
						</li>
						<?php if($sess->admin):?>
						<li class="dropdown" id="menu2">
							<?=anchor('#menu2','<i class="icon-cog icon-white"></i> Settings <b class="caret"></b>','class="dropdown-toggle" data-toggle="dropdown"')?>
							<ul class="dropdown-menu">
								<li <?=active('users')?>><?=anchor('users','<i class="icon-user"></i> Manage users')?></li>
								<li <?=active('settings')?>><?=anchor('settings','<i class="icon-cog"></i> Application settings')?></li>
							</ul>
						</li>
						<?php endif?>
					</ul>
					<ul class="nav pull-right">
						<li class="dropdown" id="menu3">
							<?=anchor('#menu3','<i class="icon-user icon-white"></i> '.$sess->username.' <b class="caret"></b>','class="dropdown-toggle" data-toggle="dropdown"')?>
							<ul class="dropdown-menu">
								<li <?=active('users/account')?>><?=anchor('users/account','<i class="icon-cog"></i> Account settings')?></li>
								<li <?=active('users/password')?>><?=anchor('users/password','<i class="icon-lock"></i> Change password')?></li>
								<li class="divider"></li>
								<li><?=anchor('logout','<i class="icon-off"></i> '.lang('menu_logout'))?></li>
							</ul>
						</li>
					</ul>
					<?=form_open('events/do_search',array('class' => 'navbar-search pull-right'))?>
						<?=form_input(array('name'=>'query','class'=>'search-query','placeholder'=>'Search event'))?>
					<?=form_close()?>
					<!--<p class="navbar-text pull-right">De nuevo por aquí <a href="#">ricardocasares</a>?</p>-->
				</div><!--/.nav-collapse -->
			</div>
		</div>
	</div>

    <div class="container">
    	<?=$this->session->flashdata('msg')?>
    	<?=$yield?>
		<hr>

		<footer>
			<p>&copy; 2012 <?=anchor('http://www.betamonster.com.ar/','Betamonster, Inc.')?></p>
		</footer>

    </div><!--/.fluid-container-->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <script type="text/javascript" src="<?=site_url('static/js/jquery-1.7.1.min.js')?>"></script>
    <script type="text/javascript" src="<?=site_url('static/js/jquery-ui-1.8.18.custom.min.js')?>"></script>
    <script type="text/javascript" src="<?=site_url('static/js/bootstrap.min.js')?>"></script>
    <script type="text/javascript" src="<?=site_url('static/js/jquery.miniColors.min.js')?>"></script>
    <script type="text/javascript" src="<?=site_url('static/js/jquery.geolocationpicker.js')?>"></script>
    <script type="text/javascript">
    	$(document).ready(function(){
    		$("fieldset input:first").focus();

			$('.danger').live('click', function(){
				return confirm('Está seguro de realizar esta acción?');
			});
			
			$('.tip').tooltip();

			$('.back').click(function(e){
				history.go(-1);
			});

			$('#color').miniColors();

			function getAddress(){
              return $('#address').val();
            }

			$('#coords').geoLocationPicker({
              defaultAddressCallback: getAddress
            });

            $('[data-toggle="modal"]').click(function(e) {
				e.preventDefault();
				var href = $(this).attr('href');
				if (href.indexOf('#') == 0) {
					$(href).modal('open');
				} else {
					$.get(href, function(data) {
						$('<div class="modal" >' + data + '</div>').modal();
					}).success(function() { $('input:text:visible:first').focus(); });
				}
			});
			$('.sortable').sortable({
				connectWith: '.sortable',
				helper: 'original',
				stop: function(event,ui){
					var event = parseInt(ui.item.find('a').attr('id'));
					var day = parseInt(ui.item.parents('td:first').find('.day_listing').html());
					var title = ui.item.find('a').text();
					ui.item.find('a').text('saving...');
					$.ajax({
						type: "POST",
						url: "<?=site_url('events/drag')?>",
						data: {id: event, day: day}
					}).done(function( msg ) {
						ui.item.find('a').text(msg);
					});
				}
			}).disableSelection();
		});
    </script>
  </body>
</html>
