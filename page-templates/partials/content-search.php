<?php
/**
 * The template part for displaying results in search pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Susanstripes
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->

	<footer class="entry-footer">
		<?php susanstripes_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
