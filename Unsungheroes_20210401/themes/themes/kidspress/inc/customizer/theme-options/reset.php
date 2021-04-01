<?php
/**
 * Reset options
 *
 * @package Theme Palace
 * @subpackage Kidspress
 * @since Kidspress 1.0.0
 */

/**
* Reset section
*/
// Add reset enable section
$wp_customize->add_section( 'kidspress_reset_section', array(
	'title'             => esc_html__('Reset all settings','kidspress'),
	'description'       => esc_html__( 'Caution: All settings will be reset to default. Refresh the page after clicking Save & Publish.', 'kidspress' ),
) );

// Add reset enable setting and control.
$wp_customize->add_setting( 'kidspress_theme_options[reset_options]', array(
	'default'           => $options['reset_options'],
	'sanitize_callback' => 'kidspress_sanitize_checkbox',
	'transport'			  => 'postMessage',
) );

$wp_customize->add_control( 'kidspress_theme_options[reset_options]', array(
	'label'             => esc_html__( 'Check to reset all settings', 'kidspress' ),
	'section'           => 'kidspress_reset_section',
	'type'              => 'checkbox',
) );
