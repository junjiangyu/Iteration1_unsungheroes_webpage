<?php
/**
 * Footer options
 *
 * @package Theme Palace
 * @subpackage Kidspress
 * @since Kidspress 1.0.0
 */

// Footer Section
$wp_customize->add_section( 'kidspress_section_footer',
	array(
		'title'      			=> esc_html__( 'Footer Options', 'kidspress' ),
		'priority'   			=> 900,
		'panel'      			=> 'kidspress_theme_options_panel',
	)
);

// footer text
$wp_customize->add_setting( 'kidspress_theme_options[copyright_text]',
	array(
		'default'       		=> $options['copyright_text'],
		'sanitize_callback'		=> 'kidspress_santize_allow_tag',
		'transport'				=> 'postMessage',
	)
);
$wp_customize->add_control( 'kidspress_theme_options[copyright_text]',
    array(
		'label'      			=> esc_html__( 'Copyright Text', 'kidspress' ),
		'section'    			=> 'kidspress_section_footer',
		'type'		 			=> 'textarea',
    )
);

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'kidspress_theme_options[copyright_text]', array(
		'selector'            => '.site-info .copyright span',
		'settings'            => 'kidspress_theme_options[copyright_text]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'kidspress_copyright_text_partial',
    ) );
}

// scroll top visible
$wp_customize->add_setting( 'kidspress_theme_options[scroll_top_visible]',
	array(
		'default'       	=> $options['scroll_top_visible'],
		'sanitize_callback' => 'kidspress_sanitize_switch_control',
	)
);
$wp_customize->add_control( new Kidspress_Switch_Control( $wp_customize, 'kidspress_theme_options[scroll_top_visible]',
    array(
		'label'      		=> esc_html__( 'Display Scroll Top Button', 'kidspress' ),
		'section'    		=> 'kidspress_section_footer',
		'on_off_label' 		=> kidspress_switch_options(),
    )
) );