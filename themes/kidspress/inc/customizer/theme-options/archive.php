<?php
/**
 * Archive options
 *
 * @package Theme Palace
 * @subpackage Kidspress
 * @since Kidspress 1.0.0
 */

// Add archive section
$wp_customize->add_section( 'kidspress_archive_section', array(
	'title'             => esc_html__( 'Blog/Archive','kidspress' ),
	'description'       => esc_html__( 'Archive section options.', 'kidspress' ),
	'panel'             => 'kidspress_theme_options_panel',
) );

// Your latest posts title setting and control.
$wp_customize->add_setting( 'kidspress_theme_options[your_latest_posts_title]', array(
	'default'           => $options['your_latest_posts_title'],
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'kidspress_theme_options[your_latest_posts_title]', array(
	'label'             => esc_html__( 'Your Latest Posts Title', 'kidspress' ),
	'description'       => esc_html__( 'This option only works if Static Front Page is set to "Your latest posts."', 'kidspress' ),
	'section'           => 'kidspress_archive_section',
	'type'				=> 'text',
	'active_callback'   => 'kidspress_is_latest_posts'
) );


// Archive author category setting and control.
$wp_customize->add_setting( 'kidspress_theme_options[hide_category]', array(
	'default'           => $options['hide_category'],
	'sanitize_callback' => 'kidspress_sanitize_switch_control',
) );

$wp_customize->add_control( new Kidspress_Switch_Control( $wp_customize, 'kidspress_theme_options[hide_category]', array(
	'label'             => esc_html__( 'Hide Category', 'kidspress' ),
	'section'           => 'kidspress_archive_section',
	'on_off_label' 		=> kidspress_hide_options(),
) ) );
