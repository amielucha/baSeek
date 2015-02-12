<?php
/**
 * baSeek Theme Customizer
 *
 * @package baSeek
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function baseek_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', 'baseek_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function baseek_customize_preview_js() {
	wp_enqueue_script( 'baseek_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'baseek_customize_preview_js' );

add_action('customize_register', 'baseek_customize');
function baseek_customize($wp_customize) {
	// Layout Options
	//-------------------------------------------------------------------
	$wp_customize->remove_control('display_header_text');

	$wp_customize->add_section( 'baseek_customizer_layout', array(
	    'title'          => 'Layout Options',
	    'priority'       => 200,
	) );

	// Fullwidth Template
	$wp_customize->add_setting( 'fullwidth', array(
	    'default'        => 1,
	) );

	$wp_customize->add_control( 'fullwidth', array(
	    'label'   => 'Fullwidth Template',
	    'section' => 'baseek_customizer_layout',
	    'type'    => 'checkbox',
	) );


	$wp_customize->add_setting( 'header_widget_w', array(
	    'default'        => 6,
	) );

	$wp_customize->add_control( 'header_widget_w', array(
	  'label'   => 'Header Widget Width:',
	  'section' => 'baseek_customizer_layout',
	  'type'    => 'select',
	  'choices'    => array(
	      '4' => '4',
	      '5' => '5',
	      '6' => '6',
	      '7' => '7',
	      '8' => '8',
	      '9' => '9',
	      '10' => '10',
	      '11' => '11',
	      '12' => '12',
	      ),
	) );


	$wp_customize->add_setting( 'sidebar_w', array(
	    'default'        => "8",
	) );

	$wp_customize->add_control( 'sidebar_w', array(
	  'label'   => 'Sidebar width (grid columns):',
	  'section' => 'baseek_customizer_layout',
	  'type'    => 'select',
	  'choices'    => array(
	      '4' => '4',
	      '5' => '5',
	      '6' => '6',
	      '7' => '7',
	      '8' => '8',
	      '9' => '9',
	      '10' => '10',
	      '11' => '11',
	      '12' => '12',
	      ),
	) );


	$wp_customize->add_setting( 'sidebar_position', array(
	    'default'        => "right",
	) );

	$wp_customize->add_control( 'sidebar_position', array(
	  'label'   => 'Sidebar position:',
	  'section' => 'baseek_customizer_layout',
	  'type'    => 'select',
	  'choices'    => array(
	      'right' => 'right',
	      'left' => 'left',
	      'hidden' => 'hidden',
	      ),
	) );

	$wp_customize->add_setting( 'pagination_above', array(
	    'default'        => 1,
	) );

	$wp_customize->add_control( 'pagination_above', array(
	    'label'   => 'Show top pagination on archive pages',
	    'section' => 'baseek_customizer_layout',
	    'type'    => 'checkbox',
	) );


	$wp_customize->add_setting( 'pagination_below', array(
	    'default'        => 1,
	) );

	$wp_customize->add_control( 'pagination_below', array(
	    'label'   => 'Show bottom pagination on archive pages',
	    'section' => 'baseek_customizer_layout',
	    'type'    => 'checkbox',
	) );


	$wp_customize->add_setting( 'next_post_above', array(
	    'default'        => 1,
	) );

	$wp_customize->add_control( 'next_post_above', array(
	    'label'   => 'Show top next/prev post navigation',
	    'section' => 'baseek_customizer_layout',
	    'type'    => 'checkbox',
	) );


	$wp_customize->add_setting( 'next_post_below', array(
	    'default'        => 1,
	) );

	$wp_customize->add_control( 'next_post_below', array(
	    'label'   => 'Show bottom next/prev post navigation',
	    'section' => 'baseek_customizer_layout',
	    'type'    => 'checkbox',
	) );
}
