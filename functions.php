<?php
/**
 * Susanstripes functions and definitions
 *
 * @package Susanstripes
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'susanstripes_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function susanstripes_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Susanstripes, use a find and replace
	 * to change 'susanstripes' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'susanstripes', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	//add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'susanstripes' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'susanstripes_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // susanstripes_setup
add_action( 'after_setup_theme', 'susanstripes_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function susanstripes_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'susanstripes' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'susanstripes_widgets_init' );


/**
 * Enqueue styles.
 */

if ( !function_exists( 'susanstripes_styles' ) ) :

	function susanstripes_styles() {

		// Conditional css for debug or production mode

		if ( WP_DEBUG ) :

			// Enqueue our debug stylesheet [development mode - non-minified]
			wp_enqueue_style( 'susanstripes_styles', get_stylesheet_directory_uri() . '/assets/css/app.css', '', '9' );
			wp_enqueue_style( 'font_awesome_styles', get_stylesheet_directory_uri() . '/assets/components/components-font-awesome/css/font-awesome.css', '' );

		else :

			// Enqueue our minified stylesheet [production mode - minified stylesheet]
			wp_enqueue_style( 'susanstripes_styles', get_stylesheet_directory_uri() . '/assets/css/app.min.css', '', '9' );
			wp_enqueue_style( 'font_awesome_styles', get_stylesheet_directory_uri() . '/assets/components/components-font-awesome/css/font-awesome.min.css', '' );

		endif;

	}

add_action( 'wp_enqueue_scripts', 'susanstripes_styles' );

endif;

if ( !function_exists( 'susanstripes_final_styles' ) ) :

	function susanstripes_final_styles() {

		wp_enqueue_style( 'final_styles', get_stylesheet_directory_uri() . '/style.css', '' );

	}

add_action( 'wp_enqueue_scripts', 'susanstripes_final_styles' , 99 ); /* 99 = LAST */

endif;




/**
 * Enqueue scripts.
 */
function susanstripes_scripts() {

	// Add modernizer.js for shimming HTML5 elements that older browsers may not detect and for mobile detection
	wp_enqueue_script ( 'modernizr', get_template_directory_uri() . '/assets/components/modernizr/modernizr.js', '', '', false );

	// Add fastclick.js file to footer (for help with devices with touch UIs)
	wp_enqueue_script ( 'fastclick_js', get_template_directory_uri() . '/assets/components/fastclick/lib/fastclick.js', '', '', true );

	// Add core Foundation js to footer
	wp_enqueue_script( 'foundation-js', get_template_directory_uri() . '/assets/components/foundation/js/foundation.min.js', array( 'jquery' ), '5', true );

	wp_enqueue_script( 'susanstripes-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'susanstripes-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'susanstripes_scripts' );


function susanstripes_init_scripts() {
	wp_enqueue_script('susanstripes_init_scripts', get_template_directory_uri(__FILE__) . '/js/susanstripes-onload.js', array('jquery') );
}
add_action('init', 'susanstripes_init_scripts');


/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

add_filter('wp_head','foundation_header');

function foundation_header(){
	?>
	<script type="text/javascript">
		jQuery(document).ready(function($) {
			$(document).foundation();
		});
	</script>
	<?php
}

add_filter( 'wp_nav_menu', 'susanstripes_nav_menu', 10, 2 );

function susanstripes_nav_menu( $menu ){
	$menu = str_replace('current-menu-item', 'current-menu-item active', $menu);
	return $menu;
}
