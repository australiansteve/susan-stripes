<?php
/**
 * Template Name: Content only
 * 
 * @package Susanstripes
 */
?>

<?php
$is_ajax = !empty( $_SERVER['HTTP_X_REQUESTED_WITH'] ) && strtolower( $_SERVER['HTTP_X_REQUESTED_WITH'] ) == 'xmlhttprequest';

if ( !$is_ajax ) {
   // Regular request!
	get_header(); 
}
?>

<!-- austeve-dynamic-content -->
<div class="small-12 columns"><!-- .columns start -->

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'page-templates/partials/content', 'page' ); ?>

			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

</div><!-- .columns end -->
<!-- end austeve-dynamic-content -->


<?php
if ( !$is_ajax ) {
   // Regular request!
	get_footer(); 
}
?>