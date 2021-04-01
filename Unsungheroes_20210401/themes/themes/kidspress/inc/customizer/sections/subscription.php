<?php
/**
 * Subscription Section options
 *
 * @package Theme Palace
 * @subpackage Kidspress
 * @since Kidspress 1.0.0
 */

// Add Subscription section
$wp_customize->add_section( 'kidspress_subscription_section', array(
	'title'             => esc_html__( 'Subscription','kidspress' ),
	'description'       => esc_html__( 'Note: To activate this section you need to install Jetpack Plugin and activate subscription module.', 'kidspress' ),
	'panel'             => 'kidspress_front_page_panel',
) );

// Subscription content enable control and setting
$wp_customize->add_setting( 'kidspress_theme_options[subscription_section_enable]', array(
	'default'			=> 	$options['subscription_section_enable'],
	'sanitize_callback' => 'kidspress_sanitize_switch_control',
) );

$wp_customize->add_control( new Kidspress_Switch_Control( $wp_customize, 'kidspress_theme_options[subscription_section_enable]', array(
	'label'             => esc_html__( 'Subscription Section Enable', 'kidspress' ),
	'section'           => 'kidspress_subscription_section',
	'on_off_label' 		=> kidspress_switch_options(),
) ) );

// subscription title setting and control
$wp_customize->add_setting( 'kidspress_theme_options[subscription_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['subscription_title'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'kidspress_theme_options[subscription_title]', array(
	'label'           	=> esc_html__( 'Title', 'kidspress' ),
	'section'        	=> 'kidspress_subscription_section',
	'active_callback' 	=> 'kidspress_is_subscription_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'kidspress_theme_options[subscription_title]', array(
		'selector'            => '#subscribe-us .section-header h2',
		'settings'            => 'kidspress_theme_options[subscription_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'kidspress_subscription_title_partial',
    ) );
}

// subscription btn title setting and control
$wp_customize->add_setting( 'kidspress_theme_options[subscription_btn_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['subscription_btn_title'],
) );

$wp_customize->add_control( 'kidspress_theme_options[subscription_btn_title]', array(
	'label'           	=> esc_html__( 'Button Label', 'kidspress' ),
	'section'        	=> 'kidspress_subscription_section',
	'active_callback' 	=> 'kidspress_is_subscription_section_enable',
	'type'				=> 'text',
) );

