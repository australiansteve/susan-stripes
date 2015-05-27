<?php
/**
 * Template Name: Content only
 * 
 * @package Woodstove
 */

?>
<!-- austeve-dynamic-content -->
<div class="small-12 columns"><!-- .columns start -->

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'page-templates/partials/content', 'page' ); ?>

				<?php
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
				?>

			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

</div><!-- .columns end -->
<!-- end austeve-dynamic-content -->

