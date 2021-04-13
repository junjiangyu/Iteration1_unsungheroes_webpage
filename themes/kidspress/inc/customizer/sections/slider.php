<?php
/**
 * Slider Section options
 *
 * @package Theme Palace
 * @subpackage Kidspress
 * @since Kidspress 1.0.0
 */

// Add Slider section
$wp_customize->add_section( 'kidspress_slider_section', array(
	'title'             => esc_html__( 'Slider','kidspress' ),
	'description'       => esc_html__( 'Slider Section options.', 'kidspress' ),
	'panel'             => 'kidspress_front_page_panel',
) );

// Slider content enable control and setting
$wp_customize->add_setting( 'kidspress_theme_options[slider_section_enable]', array(
	'default'			=> 	$options['slider_section_enable'],
	'sanitize_callback' => 'kidspress_sanitize_switch_control',
) );

$wp_customize->add_control( new Kidspress_Switch_Control( $wp_customize, 'kidspress_theme_options[slider_section_enable]', array(
	'label'             => esc_html__( 'Slider Section Enable', 'kidspress' ),
	'section'           => 'kidspress_slider_section',
	'on_off_label' 		=> kidspress_switch_options(),
) ) );

// Slider content enable control and setting
$wp_customize->add_setting( 'kidspress_theme_options[slider_autoplay_enable]', array(
	'default'			=> 	$options['slider_autoplay_enable'],
	'sanitize_callback' => 'kidspress_sanitize_switch_control',
) );

$wp_customize->add_control( new Kidspress_Switch_Control( $wp_customize, 'kidspress_theme_options[slider_autoplay_enable]', array(
	'label'             => esc_html__( 'Slider Autoplay Enable', 'kidspress' ),
	'section'           => 'kidspress_slider_section',
	'on_off_label' 		=> kidspress_switch_options(),
) ) );

for ( $i = 1; $i <= 3; $i++ ) :
	// slider pages drop down chooser control and setting
	$wp_customize->add_setting( 'kidspress_theme_options[slider_content_page_' . $i . ']', array(
		'sanitize_callback' => 'kidspress_sanitize_page',
	) );

	$wp_customize->add_control( new Kidspress_Dropdown_Chooser( $wp_customize, 'kidspress_theme_options[slider_content_page_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Page %d', 'kidspress' ), $i ),
		'section'           => 'kidspress_slider_section',
		'choices'			=> kidspress_page_choices(),
		'active_callback'	=> 'kidspress_is_slider_section_enable',
	) ) );
endfor;

// slider btn title setting and control
$wp_customize->add_setting( 'kidspress_theme_options[slider_btn_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['slider_btn_title'],
) );

$wp_customize->add_control( 'kidspress_theme_options[slider_btn_title]', array(
	'label'           	=> esc_html__( 'Button Label', 'kidspress' ),
	'section'        	=> 'kidspress_slider_section',
	'active_callback' 	=> 'kidspress_is_slider_section_enable',
	'type'				=> 'text',
) );
