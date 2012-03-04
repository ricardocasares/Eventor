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
    <style type="text/css">
    	body {
    		padding:20px;
    	}
    </style>

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="images/favicon.ico">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">
  </head>
  <body>
	<div class="container-fluid">
    	<?=$this->session->flashdata('msg')?>
    	<?=$yield?>
    </div>

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <script type="text/javascript" src="<?=site_url('static/js/jquery-1.7.1.min.js')?>"></script>
    <script type="text/javascript" src="<?=site_url('static/js/bootstrap.min.js')?>"></script>
    <script type="text/javascript" src="<?=site_url('static/js/jquery.miniColors.min.js')?>"></script>
    <script type="text/javascript" src="<?=site_url('static/js/jquery.geolocationpicker.js')?>"></script>
    <script type="text/javascript">
    	$(document).ready(function(){

    		$('.add').live('click',function(e){
				e.preventDefault();
				$('.clone:first').clone().appendTo('#log');
			});
			$('.remove').live('click',function(e){
				e.preventDefault();
				var rows = $('#log tr').size();
				if(rows > 2) {
					$(this).parent().parent().remove();
				}
			});

			$('.danger').live('click', function(){
				return confirm('Está seguro de realizar esta acción?');
			});

			$('a[href="#' + window.location.hash.substr(2) + '"]').click();

			$('.nav-tabs a').on('shown', function (e) {
				window.location.hash = '/' + e.target.hash.substr(1);
			});

			$('.pop').tooltip();
			$('.tip').tooltip();

			$('.back').click(function(e){
				history.go(-1);
			});

			$('#color').miniColors();

			function getAddress(){
              return $('#address').val();
            }

			$('input#coords').geoLocationPicker({
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
		});
    </script>
  </body>
</html>

