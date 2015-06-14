<?php
/**
 * Template Name: Gallery preview
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

			<ul class="small-block-grid-1 medium-block-grid-2 large-block-grid-3 austeve_gallery_preview">

				<?php dynamic_sidebar('austeve_gallery_1'); ?>
			
			</ul>

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