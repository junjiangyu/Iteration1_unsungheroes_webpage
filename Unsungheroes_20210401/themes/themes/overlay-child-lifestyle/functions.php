<?php
/**
 * Overlay Child functions and definitions
 */
define( 'OVERLAYHCHILD_LIFESTYLE_THEME_VERSION' , '1.0.5' );

/**
 * Enqueue parent theme style
 */
function overlaychild_lifestyle_enqueue_styles() {
    $customizer_library = Customizer_Library::Instance();
    $customizer_library->options['overlay-body-font']['default'] = 'Poppins';
    $customizer_library->options['overlay-primary-color']['default'] = '#7bbee8';
    $customizer_library->options['overlay-header-nav-style']['default'] = 'overlay-nav-solid';

    wp_enqueue_style( 'overlay-style', get_template_directory_uri() . '/style.css', array(), OVERLAYHCHILD_LIFESTYLE_THEME_VERSION );
    
    wp_enqueue_style( 'overlaychild-lifestyle-style', get_stylesheet_uri(), array( 'overlay-style' ), OVERLAYHCHILD_LIFESTYLE_THEME_VERSION );
    wp_enqueue_style( 'overlaychild-lifestyle-header-style', get_stylesheet_directory_uri() . '/templates/header/header-style.css', array( 'overlay-style', 'overlay-header-style' ), OVERLAYHCHILD_LIFESTYLE_THEME_VERSION );

    // Load Responsive Stylesheets
	if ( !get_theme_mod( 'overlay-responsive-disable', customizer_library_get_default( 'overlay-responsive-disable' ) ) ) :
		$overlaychild_resp_mobile = get_theme_mod( 'overlay-mobile-breakat', customizer_library_get_default( 'overlay-mobile-breakat' ) );
		wp_enqueue_style( 'overlaychild-lifestyle-resp-mobile', get_stylesheet_directory_uri()."/inc/css/overlaychild-lifestyle-mobile.css", array( 'overlay-header-style' ), OVERLAYHCHILD_LIFESTYLE_THEME_VERSION, '(max-width: '.esc_attr( $overlaychild_resp_mobile ).'px)' );
	endif;
}
add_action( 'wp_enqueue_scripts', 'overlaychild_lifestyle_enqueue_styles' );

/**
 * Enqueue Child Theme custom customizer styling.
 */
function overlaychild_lifestyle_load_customizer_script() {
	wp_enqueue_script( 'overlaychild-lifestyle-customizer-js', get_stylesheet_directory_uri() . "/inc/js/customizer-custom.js", array( 'jquery', 'overlay-customizer-js' ), OVERLAYHCHILD_LIFESTYLE_THEME_VERSION, true );
    wp_enqueue_style( 'overlaychild-lifestyle-customizer-css', get_stylesheet_directory_uri() . "/inc/css/customizer.css", array( 'overlay-customizer-css' ), OVERLAYHCHILD_LIFESTYLE_THEME_VERSION );
}
add_action( 'customize_controls_enqueue_scripts', 'overlaychild_lifestyle_load_customizer_script' );

/**
 * Enqueue Child Theme custom customizer styling.
 */
function overlaychild_lifestyle_load_customizer_settings() {
    global $wp_customize;
    $wp_customize->get_setting( 'overlay-body-font' )->default = 'Poppins';
    $wp_customize->get_setting( 'overlay-primary-color' )->default = '#7bbee8';
    $wp_customize->get_setting( 'overlay-header-nav-style' )->default = 'overlay-nav-solid';
}
add_action( 'customize_controls_init', 'overlaychild_lifestyle_load_customizer_settings' );
add_action( 'customize_preview_init', 'overlaychild_lifestyle_load_customizer_settings' );
