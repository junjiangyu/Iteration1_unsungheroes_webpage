<?php
/**
 * Breadcrumb options
 *
 * @package Theme Palace
 * @subpackage Kidspress
 * @since Kidspress 1.0.0
 */

$wp_customize->add_section( 'kidspress_breadcrumb', array(
	'title'             => esc_html__( 'Breadcrumb','kidspress' ),
	'description'       => esc_html__( 'Breadcrumb section options.', 'kidspress' ),
	'panel'             => 'kidspress_theme_options_panel',
) );

// Breadcrumb enable setting and control.
$wp_customize->add_setting( 'kidspress_theme_options[breadcrumb_enable]', array(
	'sanitize_callback' => 'kidspress_sanitize_switch_control',
	'default'          	=> $options['breadcrumb_enable'],
) );

$wp_customize->add_control( new Kidspress_Switch_Control( $wp_customize, 'kidspress_theme_options[breadcrumb_enable]', array(
	'label'            	=> esc_html__( 'Enable Breadcrumb', 'kidspress' ),
	'section'          	=> 'kidspress_breadcrumb',
	'on_off_label' 		=> kidspress_switch_options(),
) ) );

// Breadcrumb separator setting and control.
$wp_customize->add_setting( 'kidspress_theme_options[breadcrumb_separator]', array(
	'sanitize_callback'	=> 'sanitize_text_field',
	'default'          	=> $options['breadcrumb_separator'],
) );

$wp_customize->add_control( 'kidspress_theme_options[breadcrumb_separator]', array(
	'label'            	=> esc_html__( 'Separator', 'kidspress' ),
	'active_callback' 	=> 'kidspress_is_breadcrumb_enable',
	'section'          	=> 'kidspress_breadcrumb',
) );
