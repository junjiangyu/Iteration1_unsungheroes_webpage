<?php
/**
 * Kidspress Pro WooCoommerce compatibility hooks.
 *
 * This is the template that includes all WooCoommerce hooks to make the theme compatible with WooCommerce.
 *
 * @package Theme Palace
 * @subpackage Kidspress
 * @since Kidspress 1.0.0
 */

remove_action( 'woocommerce_archive_description', 'woocommerce_taxonomy_archive_description' ,10 );
remove_action( 'woocommerce_archive_description', 'woocommerce_product_archive_description' ,10 );
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb' ,20 );

function kidspress_before_main_content() {
	echo '<div id="inner-content-wrapper" class="wrapper page-section">';
}
add_action( 'woocommerce_before_main_content', 'kidspress_before_main_content', 5 );

function kidspress_after_main_content() {
	echo '</div>';
}
add_action( 'woocommerce_sidebar', 'kidspress_after_main_content', 20 );

// Change number or products per row to 3
add_filter('loop_shop_columns', 'kidspress_loop_columns');
if ( ! function_exists('kidspress_loop_columns')) {
	/**
	 * Shop Page no. of column
	 *
	 * @since Kidspress 1.0
	 *
	 */
	function kidspress_loop_columns() {
		return 3; // 3 products per row
	}
}

// remove title
add_filter('woocommerce_show_page_title', 'kidspress_hide_title' );
function kidspress_hide_title() {
	return false;
}
