<?php
if(empty($auth)) {
    header("location:/index.php"); 
    die();
}
?>


<!DOCTYPE html>
<!--[if IE 8]>    <html class="no-js ie8 ie" lang="en"> <![endif]-->
<!--[if IE 9]>    <html class="no-js ie9 ie" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
	
<head>
		<meta charset="utf-8">
		<title>Plug.ged</title>
		<meta name="description" content="">
		<meta name="author" content="Lucas Vasconcelos">
		<meta name="robots" content="index, follow">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<!-- jQuery Visualize Styles -->
		<link rel="stylesheet" type="text/css" href="css/plugins/jquery.visualize.css">

		<!-- jQuery FullCalendar Styles -->
		<link rel="stylesheet" type="text/css" href="css/plugins/jquery.fullcalendar.css">
		
		<!-- jQuery jGrowl Styles -->
		<link rel="stylesheet" type="text/css" href="css/plugins/jquery.jgrowl.css">
		
		<!-- Styles -->
		<link rel="stylesheet" type="text/css" href="css/chromatron-blue.css">
		
		<!-- Fav and touch icons -->
		<link rel="shortcut icon" href="favicon.ico">
		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="img/icons/apple-touch-icon-114-precomposed.html">
		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="img/icons/apple-touch-icon-72-precomposed.html">
		<link rel="apple-touch-icon-precomposed" href="img/icons/apple-touch-icon-57-precomposed.html">
		
		<!-- JS Libs -->
		<script type="text/javascript" async="" src="http://www.google-analytics.com/ga.js"></script><script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
		<script>window.jQuery || document.write('<script src="js/libs/jquery.js"><\/script>')</script>
		<script src="js/libs/jquery-ui.min.js"></script>

		<script src="js/libs/modernizr.js"></script>
		<script src="js/libs/selectivizr.js"></script>
		
		<script>
			$(document).ready(function(){
				
				// Tooltips for widgets
				$('.widget [title]').tooltip({
					placement: 'right',
					container: 'body'
				});

				// Tooltips for brand & nav toggle button
				$('.nav-toggle, .brand').tooltip({
					placement: 'bottom',
					container: 'body'
				});

				// Tooltips
				$('[title]').tooltip({
					placement: 'top',
					container: 'body'
				});

				// Close button for widgets
				$('.widget').alert();
				
				// Remove tooltip when widget is closed
				$('.widget').bind('close', function () {
					$(this).find('.close').tooltip('destroy');
				});
				
				// Tabs
				$('.demoTabs a').click(function (e) {
					e.preventDefault();
					$(this).tab('show');
					$('.fullcalendar, .full-calendar-gcal').fullCalendar('render'); // Refresh jQuery FullCalendar for hidden tabs
				});
				
			});
		</script>

	
	<style type="text/css">.jqstooltip { position: absolute;left: 0px;top: 0px;visibility: hidden;background: rgb(0, 0, 0) transparent;background-color: rgba(0,0,0,0.6);filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000);-ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000)";color: white;font: 10px arial, san serif;text-align: left;white-space: nowrap;padding: 5px;border: 1px solid white;z-index: 10000;}.jqsfield { color: white;font: 10px arial, san serif;text-align: left;}</style></head>
	<body>
		
		<!-- Main page container -->
		<div class="container-fluid">
			
			<!-- Navigation block toggle button -->
			<a href="#" class="nav-toggle" title="" data-original-title="On/Off navigation-block"><span class="awe-chevron-left"></span></a>
			
			<!-- Left (navigation) side -->
			<section class="navigation-block">
			
				<!-- Main page header -->
				<header>
				
					<!-- Main page logo -->
					<h1><a class="brand" href="#" data-original-title="" title=""></a></h1>
					
					<!-- Main page headline -->
					<p>Ranking para salas do Plug.dj em PHP </p>
					
				</header>
				<!-- /Main page header -->
				
				<!-- User profile -->
				<section class="user-profile">
					<figure>
						<img alt="John Pixel avatar" src="http://i.imgur.com/I9XgD1Q.png">
						<figcaption>
							<strong><a href="#" class="">♫ BALADA DOS VIRJS ♫</a></strong>
							<em>@IsaacSergio</em></br>
							<em><?php echo $UsersOnlineCount;?> DJ's online</em>
							<ul>
								<li><a class="btn btn-primary btn-flat" href="http://plug.dj/baladadadp/" title="" data-original-title="Entrar na sala">Entrar na sala</a></li>
								
							</ul>
						</figcaption>
					</figure>
				</section>
				<!-- /User profile -->
				
				<!-- Responsive navigation -->
				<a href="#" class="btn btn-navbar btn-large" data-toggle="collapse" data-target=".nav-collapse"><span class="fam-house"></span> Dashboard</a>
				

				
				<!-- Main navigation -->
				<nav class="main-navigation nav-collapse" role="navigation">
					<ul>
						<li class="current"><a href="?p=i" class="no-submenu"><span class="fam-house"></span>Início</a></li>
						
						<li>
							<a href="#"><span class="fam-chart-line"></span>TOP 10 - Vídeos</a>
							<ul style="display: none;">
								<li><a href="?p=t">Mais tocadas</a></li>
								<li><a href="?p=t&s=l">Mais legais</a></li>
								<li><a href="?p=t&s=m">Mais chatas</a></li>
								<li><a href="?p=t&s=c">Mais adicionadas</a></li>
								<li><a href="?p=t&s=el">Mais legais por execução</a></li>
								<li><a href="?p=t&s=em">Mais chatas por execução</a></li>
								<li><a href="?p=t&s=ec">Mais adicionadas por execução</a></li>
							</ul>
						</li>
						<li>
							<a href="#"><span class="fam-rosette"></span>TOP 10 - DJ's</a>
							<ul style="display: none;">
								<li><a href="?p=t&s=d">Os que mais tocam</a></li>
								<li><a href="?p=t&s=dl">Os mais legais</a></li>
								<li><a href="?p=t&s=dm">Os mais chatos</a></li>
								<li><a href="?p=t&s=dc">Os mais adicionados</a></li>
							</ul>
						</li>


						<li><a href="?p=t&s=h" class="no-submenu"><span class="fam-text-padding-left"></span>Histórico da sala</a></li>
						<li><a href="#" class="no-submenu"><span class="fam-cog"></span>ITEM 1</a></li>
						<li><a href="#" class="no-submenu"><span class="fam-heart"></span>ITEM 2</a></li>
						<li>
							<a href="#"><span class="fam-rainbow"></span>Staff</a>
							<ul style="display: none;">
								<li><a href="#">A</a></li>
								<li><a href="#">B</a></li>
								<li><a href="#">C</a></li>
								<li><a href="#">D</a></li>
							</ul>
						</li>
												<li><a href="#" class="no-submenu"><span class="fam-book-open"></span>ITEM 4</a></li>
					</ul>
				</nav>
				<!-- /Main navigation -->
				
				<!-- Side note -->
				
				<!-- /Side note -->
				
				<!-- Side note with nested style -->
				<section class="side-note nested">
					<h2>Plug.ged&copy; 2014</h2>
					<p>Ranking para salas do Plug.dj</p>
					<p>Feito por @Lucaslg26 e @Caipira</p>
				</section>
				<!-- /Side note with nested style -->
				
			</section>
			<!-- /Left (navigation) side -->