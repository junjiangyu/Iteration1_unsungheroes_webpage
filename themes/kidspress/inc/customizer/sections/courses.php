<?php
/**
 * Courses Section options
 *
 * @package Theme Palace
 * @subpackage Kidspress
 * @since Kidspress 1.0.0
 */

// Add Courses section
$wp_customize->add_section( 'kidspress_course_section', array(
	'title'             => esc_html__( 'Courses','kidspress' ),
	'description'       => esc_html__( 'Courses Section options.', 'kidspress' ),
	'panel'             => 'kidspress_front_page_panel',
) );

// Courses content enable control and setting
$wp_customize->add_setting( 'kidspress_theme_options[course_section_enable]', array(
	'default'			=> 	$options['course_section_enable'],
	'sanitize_callback' => 'kidspress_sanitize_switch_control',
) );

$wp_customize->add_control( new Kidspress_Switch_Control( $wp_customize, 'kidspress_theme_options[course_section_enable]', array(
	'label'             => esc_html__( 'Course Section Enable', 'kidspress' ),
	'section'           => 'kidspress_course_section',
	'on_off_label' 		=> kidspress_switch_options(),
) ) );

// course title setting and control
$wp_customize->add_setting( 'kidspress_theme_options[course_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['course_title'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'kidspress_theme_options[course_title]', array(
	'label'           	=> esc_html__( 'Title', 'kidspress' ),
	'section'        	=> 'kidspress_course_section',
	'active_callback' 	=> 'kidspress_is_course_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'kidspress_theme_options[course_title]', array(
		'selector'            => '#our-courses .section-header h2.section-title',
		'settings'            => 'kidspress_theme_options[course_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'kidspress_course_title_partial',
    ) );
}

// Courses content enable control and setting
$wp_customize->add_setting( 'kidspress_theme_options[course_section_bg_image_enable]', array(
	'default'			=> 	$options['course_section_bg_image_enable'],
	'sanitize_callback' => 'kidspress_sanitize_switch_control',
) );

$wp_customize->add_control( new Kidspress_Switch_Control( $wp_customize, 'kidspress_theme_options[course_section_bg_image_enable]', array(
	'label'             => esc_html__( 'Enable Cloud Border', 'kidspress' ),
	'section'           => 'kidspress_course_section',
	'active_callback' 	=> 'kidspress_is_course_section_enable',
	'on_off_label' 		=> kidspress_switch_options(),
) ) );

// Courses content type control and setting
$wp_customize->add_setting( 'kidspress_theme_options[course_content_type]', array(
	'default'          	=> $options['course_content_type'],
	'sanitize_callback' => 'kidspress_sanitize_select',
) );

$wp_customize->add_control( 'kidspress_theme_options[course_content_type]', array(
	'label'             => esc_html__( 'Content Type', 'kidspress' ),
	'section'           => 'kidspress_course_section',
	'type'				=> 'select',
	'active_callback' 	=> 'kidspress_is_course_section_enable',
	'choices'			=> kidspress_popular_course_content_type(),
) );

for ( $i = 1; $i <= 3 ; $i++ ) :

	// course posts drop down chooser control and setting
	$wp_customize->add_setting( 'kidspress_theme_options[course_content_post_' . $i . ']', array(
		'sanitize_callback' => 'kidspress_sanitize_page',
	) );

	$wp_customize->add_control( new Kidspress_Dropdown_Chooser( $wp_customize, 'kidspress_theme_options[course_content_post_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Post %d', 'kidspress' ), $i ),
		'section'           => 'kidspress_course_section',
		'choices'			=> kidspress_post_choices(),
		'active_callback'	=> 'kidspress_is_course_section_content_post_enable',
	) ) );

	// course pages drop down chooser control and setting
	$wp_customize->add_setting( 'kidspress_theme_options[course_content_course_' . $i . ']', array(
		'sanitize_callback' => 'kidspress_sanitize_page',
	) );

	$wp_customize->add_control( new Kidspress_Dropdown_Chooser( $wp_customize, 'kidspress_theme_options[course_content_course_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Course %d', 'kidspress' ), $i ),
		'section'           => 'kidspress_course_section',
		'choices'			=> kidspress_course_choices(),
		'active_callback'	=> 'kidspress_is_course_section_content_course_enable',
	) ) );

endfor;
