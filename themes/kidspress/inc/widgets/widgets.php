<?php
/**
 * Theme Palace widgets inclusion
 *
 * This is the template that includes all custom widgets of Kidspress
 *
 * @package Theme Palace
 * @subpackage Kidspress
 * @since Kidspress 1.0.0
 */

/**
 * Enqueue admin scripts for Image Widget
 * @uses  wp_enqueue_script, and  admin_enqueue_scripts hook
 *
 * @since Kidspress 1.0
 */
function kidspress_kids_meta_details_widget_upload_enqueue( $hook ) {

  	if( 'widgets.php' !== $hook )
      	return;

    // fontawesome
	wp_enqueue_style( 'font-awesome-css', get_template_directory_uri() . '/assets/css/font-awesome' . kidspress_min() . '.css' );

 	wp_enqueue_style( 'simple-iconpicker-css', get_template_directory_uri() . '/assets/css/simple-iconpicker' . kidspress_min() . '.css' );
	wp_enqueue_script( 'jquery-simple-iconpicker', get_template_directory_uri() . '/assets/js/simple-iconpicker' . kidspress_min() . '.js', array( 'jquery' ), '', true );
	
	wp_enqueue_script( 'custom-icon-script', get_template_directory_uri() . '/assets/js/custom-icon' . kidspress_min() . '.js', array( 'jquery' ), '', true );

}
add_action( 'admin_enqueue_scripts', 'kidspress_kids_meta_details_widget_upload_enqueue' );


/*
 * Add kids-meta-details widget
 */
require get_template_directory() . '/inc/widgets/kids-meta-details.php';

/*
 * Add social link widget
 */
require get_template_directory() . '/inc/widgets/social-link-widget.php';


/**
 * Register widgets
 */
function kidspress_register_widgets() {


	register_widget( 'Kidspress_Kids_Meta_Details_Widget' );
	register_widget( 'kidspress_social_link' );

}
add_action( 'widgets_init', 'kidspress_register_widgets' );
