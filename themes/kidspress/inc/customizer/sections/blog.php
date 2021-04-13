<?php
/**
 * Blog Section options
 *
 * @package Theme Palace
 * @subpackage Kidspress
 * @since Kidspress 1.0.0
 */

// Add Blog section
$wp_customize->add_section( 'kidspress_blog_section', array(
	'title'             => esc_html__( 'Blog','kidspress' ),
	'description'       => esc_html__( 'Blog Section options.', 'kidspress' ),
	'panel'             => 'kidspress_front_page_panel',
) );

// Blog content enable control and setting
$wp_customize->add_setting( 'kidspress_theme_options[blog_section_enable]', array(
	'default'			=> 	$options['blog_section_enable'],
	'sanitize_callback' => 'kidspress_sanitize_switch_control',
) );

$wp_customize->add_control( new Kidspress_Switch_Control( $wp_customize, 'kidspress_theme_options[blog_section_enable]', array(
	'label'             => esc_html__( 'Blog Section Enable', 'kidspress' ),
	'section'           => 'kidspress_blog_section',
	'on_off_label' 		=> kidspress_switch_options(),
) ) );

// Service content enable control and setting
$wp_customize->add_setting( 'kidspress_theme_options[blog_section_bg_image_enable]', array(
	'default'			=> 	$options['blog_section_bg_image_enable'],
	'sanitize_callback' => 'kidspress_sanitize_switch_control',
) );

$wp_customize->add_control( new Kidspress_Switch_Control( $wp_customize, 'kidspress_theme_options[blog_section_bg_image_enable]', array(
	'label'             => esc_html__( 'Enable Cloud Border', 'kidspress' ),
	'section'           => 'kidspress_blog_section',
	'on_off_label' 		=> kidspress_switch_options(),
	'active_callback' 	=> 'kidspress_is_blog_section_enable',
) ) );


// blog title setting and control
$wp_customize->add_setting( 'kidspress_theme_options[blog_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['blog_title'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'kidspress_theme_options[blog_title]', array(
	'label'           	=> esc_html__( 'Title', 'kidspress' ),
	'section'        	=> 'kidspress_blog_section',
	'active_callback' 	=> 'kidspress_is_blog_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'kidspress_theme_options[blog_title]', array(
		'selector'            => '#latest-posts .section-header h2.section-title',
		'settings'            => 'kidspress_theme_options[blog_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'kidspress_blog_title_partial',
    ) );
}

// Blog content type control and setting
$wp_customize->add_setting( 'kidspress_theme_options[blog_content_type]', array(
	'default'          	=> $options['blog_content_type'],
	'sanitize_callback' => 'kidspress_sanitize_select',
) );

$wp_customize->add_control( 'kidspress_theme_options[blog_content_type]', array(
	'label'             => esc_html__( 'Content Type', 'kidspress' ),
	'section'           => 'kidspress_blog_section',
	'type'				=> 'select',
	'active_callback' 	=> 'kidspress_is_blog_section_enable',
	'choices'			=> array( 
		'category' 	=> esc_html__( 'Category', 'kidspress' ),
		'recent' 	=> esc_html__( 'Recent', 'kidspress' ),
	),
) );

// Add dropdown category setting and control.
$wp_customize->add_setting(  'kidspress_theme_options[blog_content_category]', array(
	'sanitize_callback' => 'kidspress_sanitize_single_category',
) ) ;

$wp_customize->add_control( new Kidspress_Dropdown_Taxonomies_Control( $wp_customize,'kidspress_theme_options[blog_content_category]', array(
	'label'             => esc_html__( 'Select Category', 'kidspress' ),
	'description'      	=> esc_html__( 'Note: Latest five posts will be shown from selected category', 'kidspress' ),
	'section'           => 'kidspress_blog_section',
	'type'              => 'dropdown-taxonomies',
	'active_callback'	=> 'kidspress_is_blog_section_content_category_enable'
) ) );

// Add dropdown categories setting and control.
$wp_customize->add_setting( 'kidspress_theme_options[blog_category_exclude]', array(
	'sanitize_callback' => 'kidspress_sanitize_category_list',
) ) ;

$wp_customize->add_control( new Kidspress_Dropdown_Category_Control( $wp_customize,'kidspress_theme_options[blog_category_exclude]', array(
	'label'             => esc_html__( 'Select Excluding Categories', 'kidspress' ),
	'description'      	=> esc_html__( 'Note: Select categories to exclude. Press Shift key select multilple categories.', 'kidspress' ),
	'section'           => 'kidspress_blog_section',
	'type'              => 'dropdown-categories',
	'active_callback'	=> 'kidspress_is_blog_section_content_recent_enable'
) ) );
