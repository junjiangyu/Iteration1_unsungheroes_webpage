<?php
	/**
	 * The header for our theme.
	 *
	 * This is the template that displays all of the <head> section and everything up until <div id="content">
	 *
	 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
	 *
	 * @package Theme Palace
	 * @subpackage Kidspress
	 * @since Kidspress 1.0.0
	 */

	/**
	 * kidspress_doctype hook
	 *
	 * @hooked kidspress_doctype -  10
	 *
	 */
	do_action( 'kidspress_doctype' );

?>
<head>
<?php
	/**
	 * kidspress_before_wp_head hook
	 *
	 * @hooked kidspress_head -  10
	 *
	 */
	do_action( 'kidspress_before_wp_head' );

	wp_head(); 
?>
</head>

<body <?php body_class(); ?>>
<?php do_action( 'wp_body_open' ) ?>
<?php
	/**
	 * kidspress_page_start_action hook
	 *
	 * @hooked kidspress_page_start -  10
	 *
	 */
	do_action( 'kidspress_page_start_action' ); 

	/**
	 * kidspress_header_action hook
	 *
	 * @hooked kidspress_header_start -  10
	 * @hooked kidspress_site_branding -  20
	 * @hooked kidspress_site_navigation -  30
	 * @hooked kidspress_header_end -  50
	 *
	 */
	do_action( 'kidspress_header_action' );

	/**
	 * kidspress_content_start_action hook
	 *
	 * @hooked kidspress_content_start -  10
	 *
	 */
	do_action( 'kidspress_content_start_action' );

	/**
	 * kidspress_header_image_action hook
	 *
	 * @hooked kidspress_header_image -  10
	 *
	 */
	do_action( 'kidspress_header_image_action' );

    if ( kidspress_is_frontpage() ) {
    	$options = kidspress_get_theme_options();
    	$sorted = array();
    	if ( ! empty( $options['sortable'] ) ) {
			$sorted = explode( ',' , $options['sortable'] );
		}

		foreach ( $sorted as $section ) {
			add_action( 'kidspress_primary_content', 'kidspress_add_'. $section .'_section' );
		}
		do_action( 'kidspress_primary_content' );
	}
	