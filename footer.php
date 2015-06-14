<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Susanstripes
 */
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer row" role="contentinfo">


		<div class="small-12 columns"><!-- .columns start -->

			<div class="site-info">
				<p><a href="http://australiansteve.com"><i class="fa fa-copyright"></i> AustralianSteve.com</a></p>
			</div><!-- .site-info -->

		</div><!-- .columns end -->


	</footer><!-- #colophon -->

	<script>
		var siteTitle = "<?php bloginfo('name'); ?>";
		var siteURL = "<?php bloginfo('url'); ?>";
		var windowLocation = window.location.href.replace(/\/$/, ""); // .replace() removes trailing slash (one)

		if (windowLocation === "<?php bloginfo('url'); ?>")
		{
			siteTitle = document.title;
			window.history.pushState(
		        {
		            "html": jQuery('#page').html(),
		            "pageTitle": siteTitle
		        },
		        siteTitle,
		        "<?php bloginfo('url'); ?>"
		   	);
		}
	</script>	
</div><!-- #page -->

<?php wp_footer(); ?>


		<!-- close the off-canvas menu -->
		<a class="exit-off-canvas"></a>

	</div><!-- .inner-wrap -->
</div><!-- .off-canvas-wrap -->


</body>
</html>
