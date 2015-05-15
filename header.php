<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Susanstripes
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>


<div class="off-canvas-wrap" data-offcanvas>
	<div class="inner-wrap">

		<nav class="tab-bar show-for-small-only">
			<section class="left-small">
				<a class="left-off-canvas-toggle menu-icon" ><span></span></a>
			</section>
		</nav>

		<!-- Off Canvas Menu -->
		<aside class="left-off-canvas-menu">
		<!-- whatever you want goes here -->
			<ul>
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'container' => '', 'menu_class' => '', 'menu_id' => '', 'items_wrap' => '%3$s' ) ); ?>
			</ul>
		</aside>


<div id="page" class="hfeed site">

	<header id="masthead" class="site-header row" role="banner">


		<div class="small-12 columns"><!-- .columns start -->

			<div class="site-branding">

				<div class="row show-for-small-only">

					<div class="small-12 columns"><!-- .columns start -->

						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img class="site-header" src="http://weavercrawford.com/wp-content/uploads/2015/05/awc2name-small-screen.png"/></a>

					</div><!-- .columns end -->

				</div><!-- .row end -->

				<div class="row show-for-medium-up">

					<div class="medium-6 columns"><!-- .columns start -->

						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img class="site-header" src="http://weavercrawford.com/wp-content/uploads/2015/05/awc2name-large-screen-black.png"/></a>

					</div><!-- .columns end -->

					<div class="medium-6 columns"><!-- .columns start -->

						<div class="container">
						    <div class="stripe"></div>
						    <div class="stripe"></div>
						    <div class="stripe"></div>
						    <div class="stripe"></div>
						    <div class="stripe"></div>
						    <div class="stripe"></div>
						    <div class="stripe"></div>
						    <div class="stripe"></div>
						    <div class="stripe"></div>
						</div>

					</div><!-- .columns end -->

				</div><!-- .row end -->

			</div><!-- .site-branding -->

		</div><!-- .columns end -->


	</header><!-- #masthead -->

	<div class="main-navigation row">

		<div class="small-12 columns"><!-- .columns start -->

			<nav id="site-navigation" class="top-bar hide-for-small" data-topbar role="navigation">
				<section class="top-bar-section">
					<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
				</section>
			</nav><!-- #site-navigation -->

		</div><!-- .columns end -->

	</div><!-- .main-navigation -->

	<div id="content" class="site-content row">
