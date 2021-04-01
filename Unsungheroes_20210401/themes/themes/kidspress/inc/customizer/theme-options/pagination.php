<?php
/**
 * pagination options
 *
 * @package Theme Palace
 * @subpackage Kidspress
 * @since Kidspress 1.0.0
 */

// Add sidebar section
$wp_customize->add_section( 'kidspress_pagination', array(
	'title'               => esc_html__('Pagination','kidspress'),
	'description'         => esc_html__( 'Pagination section options.', 'kidspress' ),
	'panel'               => 'kidspress_theme_options_panel',
) );

// Sidebar position setting and control.
$wp_customize->add_setting( 'kidspress_theme_options[pagination_enable]', array(
	'sanitize_callback' => 'kidspress_sanitize_switch_control',
	'default'             => $options['pagination_enable'],
) );

$wp_customize->add_control( new Kidspress_Switch_Control( $wp_customize, 'kidspress_theme_options[pagination_enable]', array(
	'label'               => esc_html__( 'Pagination Enable', 'kidspress' ),
	'section'             => 'kidspress_pagination',
	'on_off_label' 		=> kidspress_switch_options(),
) ) );

// Site layout setting and control.
$wp_customize->add_setting( 'kidspress_theme_options[pagination_type]', array(
	'sanitize_callback'   => 'kidspress_sanitize_select',
	'default'             => $options['pagination_type'],
) );

$wp_customize->add_control( 'kidspress_theme_options[pagination_type]', array(
	'label'               => esc_html__( 'Pagination Type', 'kidspress' ),
	'section'             => 'kidspress_pagination',
	'type'                => 'select',
	'choices'			  => kidspress_pagination_options(),
	'active_callback'	  => 'kidspress_is_pagination_enable',
) );
