<?php
/**
 * Susanstripes Theme Customizer
 *
 * @package Susanstripes
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function susanstripes_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	$wp_customize->add_setting( 'header_image_large' , array(
	    'default'     => 'none',
	    'transport'   => 'refresh',
	) );

	$wp_customize->add_setting( 'header_image_small' , array(
	    'default'     => 'none',
	    'transport'   => 'refresh',
	) );

	$wp_customize->add_section( 'susanstripes_theme_options' , array(
	    'title'      => __( 'Header Image', 'susanstripes' ),
	    'priority'   => 30,
	) );

	$wp_customize->add_control( 
		new WP_Customize_Image_Control(
           	$wp_customize,
           	'header_image_large',
           	array(
               	'label'      => __( 'For large screens', 'susanstripes' ),
               	'section'    => 'susanstripes_theme_options',
               	'settings'   => 'header_image_large',
               	'context'    => 'susanstripes' 
           	)
       	)
   	);

	$wp_customize->add_control( 
		new WP_Customize_Image_Control(
           	$wp_customize,
           	'header_image_small',
           	array(
               	'label'      => __( 'For small screens', 'susanstripes' ),
               	'section'    => 'susanstripes_theme_options',
               	'settings'   => 'header_image_small',
               	'context'    => 'susanstripes' 
           	)
       	)
   	);

}
add_action( 'customize_register', 'susanstripes_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function susanstripes_customize_preview_js() {
	wp_enqueue_script( 'susanstripes_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'susanstripes_customize_preview_js' );
