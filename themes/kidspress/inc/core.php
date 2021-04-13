<?php
/**
 * Core file.
 *
 * This is the template that includes all the other files for core featured of Theme Palace
 *
 * @package Theme Palace
 * @subpackage Kidspress
 * @since Kidspress 1.0.0
 */

/**
 * Include options function.
 */
require get_template_directory() . '/inc/options.php';


// Load customizer defaults values
require get_template_directory() . '/inc/customizer/defaults.php';


/**
 * Merge values from default options array and values from customizer
 *
 * @return array Values returned from customizer
 * @since Kidspress 1.0.0
 */
function kidspress_get_theme_options() {
  $kidspress_default_options = kidspress_get_default_theme_options();

  return array_merge( $kidspress_default_options , get_theme_mod( 'kidspress_theme_options', $kidspress_default_options ) ) ;
}

if ( is_admin() ) {
   /**
   * Load admin custom styles
   * 
   */
  function kidspress_load_admin_style( $hook ) {
    if( $hook == 'post.php' || $hook == 'post-new.php'  ){
      wp_register_style( 'kidspress_admin_css', get_template_directory_uri() . '/assets/css/admin-style' . kidspress_min() . '.css', false, '1.0.0' );
      wp_enqueue_style( 'kidspress_admin_css' );
    }
    return;
  }
  add_action( 'admin_enqueue_scripts', 'kidspress_load_admin_style' );
}

/**
 * Add breadcrumb functions.
 */
require get_template_directory() . '/inc/breadcrumb-class.php';

/**
 * Add helper functions.
 */
require get_template_directory() . '/inc/helpers.php';

/**
 * Add structural hooks.
 */
require get_template_directory() . '/inc/structure.php';

/**
 * Add metabox
 */
require get_template_directory() . '/inc/metabox.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer/customizer.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/sections/sections.php';

/**
* TGM plugin additions.
*/
require get_template_directory() . '/inc/tgm-plugin/tgm-hook.php';

if ( class_exists( 'CatchThemesDemoImportPlugin' ) ) {
    /**
    * OCDI plugin demo importer compatibility.
    */
    require get_template_directory() . '/inc/demo-import.php';
}

if ( class_exists( 'WooCommerce' ) ) {
    /**
     * Woocommerce
     */
    require get_template_directory() . '/inc/woocommerce.php';
}

/**
 * Custom widget additions.
 */
require get_template_directory() . '/inc/widgets/widgets.php';

if ( class_exists( 'TP_Education' ) ) {
    /**
    * TP Education plugin single page compatibility.
    */
    require get_template_directory() . '/inc/tp-education.php';
}

