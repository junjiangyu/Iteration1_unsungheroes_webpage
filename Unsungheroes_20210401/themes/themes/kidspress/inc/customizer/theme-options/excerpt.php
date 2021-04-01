<?php
/**
 * Excerpt options
 *
 * @package Theme Palace
 * @subpackage Kidspress
 * @since Kidspress 1.0.0
 */

// Add excerpt section
$wp_customize->add_section( 'kidspress_excerpt_section', array(
	'title'             => esc_html__( 'Excerpt','kidspress' ),
	'description'       => esc_html__( 'Excerpt section options.', 'kidspress' ),
	'panel'             => 'kidspress_theme_options_panel',
) );


// long Excerpt length setting and control.
$wp_customize->add_setting( 'kidspress_theme_options[long_excerpt_length]', array(
	'sanitize_callback' => 'kidspress_sanitize_number_range',
	'validate_callback' => 'kidspress_validate_long_excerpt',
	'default'			=> $options['long_excerpt_length'],
) );

$wp_customize->add_control( 'kidspress_theme_options[long_excerpt_length]', array(
	'label'       		=> esc_html__( 'Blog Page Excerpt Length', 'kidspress' ),
	'description' 		=> esc_html__( 'Total words to be displayed in archive page/search page.', 'kidspress' ),
	'section'     		=> 'kidspress_excerpt_section',
	'type'        		=> 'number',
	'input_attrs' 		=> array(
		'style'       => 'width: 80px;',
		'max'         => 100,
		'min'         => 5,
	),
) );

// read more text setting and control
$wp_customize->add_setting( 'kidspress_theme_options[read_more_text]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['read_more_text'],
) );

$wp_customize->add_control( 'kidspress_theme_options[read_more_text]', array(
	'label'           	=> esc_html__( 'Read More Text Label', 'kidspress' ),
	'section'        	=> 'kidspress_excerpt_section',
	'type'				=> 'text',
) );
