<?php
/**
 * The theme header
 * 
 * @package bootstrap-basic
 */
?>
<!DOCTYPE html>
<!--[if lt IE 7]>  <html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>     <html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>     <html class="no-js lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width">

		<link rel="profile" href="http://gmpg.org/xfn/11">
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
		
		<!--wordpress head-->
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		<!--[if lt IE 8]>
			<p class="ancient-browser-alert">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/" target="_blank">upgrade your browser</a>.</p>
		<![endif]-->
		
		
		<header role="banner" id="site-header">
			<div class="row main-navigation">
				<div>
					<nav id="main-menu" class="navbar navbar-default" role="navigation">
						<div class="navbar-header">

							<div class="pull-left brand-name-mobile visible-xs">
								<span>
									<a href="<?= home_url("/"); ?>">
										<?= get_bloginfo();?>
									</a>
								</span>
							</div>


							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-primary-collapse">
								<span class="sr-only"><?php _e('Toggle navigation', 'bootstrap-basic'); ?></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						
						<div class="collapse navbar-collapse navbar-primary-collapse">
							
							<div class="pull-left brand-name hidden-xs">
								<span>
									<a href="<?= home_url("/"); ?>">
										<?= get_bloginfo();?>
									</a>
								</span>
							</div>

							<div class="pull-right menu">
								<?php wp_nav_menu(array('theme_location' => 'primary', 'container' => false, 'menu_class' => 'nav navbar-nav', 'walker' => new BootstrapBasicMyWalkerNavMenu())); ?> 

								<ul class="rrss">
									<li>
										<a href="https://www.behance.net/chris0013" target="_blank">
											<i class="fa fa-behance"></i>
										</a>
									</li>

									<li>
										<a href="http://chrisstoudt.tumblr.com/" target="_blank">
											<i class="fa fa-tumblr"></i>
										</a>
									</li>

									<li>
										<a href="https://www.linkedin.com/in/christian-stoudt-14591b33" target="_blank">
											<i class="fa fa-linkedin"></i>
										</a>
									</li>

									<li>
										<a href="https://www.instagram.com/chrisstoudt_sketchbook/" target="_blank">
											<i class="fa fa-instagram"></i>
										</a>
									</li>
								</ul>
							</div>

							<?php dynamic_sidebar('navbar-right'); ?> 
						</div><!--.navbar-collapse-->
					</nav>
				</div>
			</div><!--.main-navigation-->
		</header>
		
		
		<div id="content">
