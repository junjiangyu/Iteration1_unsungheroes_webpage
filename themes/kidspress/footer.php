<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Theme Palace
 * @subpackage Kidspress
 * @since Kidspress 1.0.0
 */

/**
 * kidspress_footer_primary_content hook
 *
 * @hooked kidspress_add_contact_section -  10
 *
 */
do_action( 'kidspress_footer_primary_content' );

/**
 * kidspress_content_end_action hook
 *
 * @hooked kidspress_content_end -  10
 *
 */
do_action( 'kidspress_content_end_action' );

/**
 * kidspress_content_end_action hook
 *
 * @hooked kidspress_footer_start -  10
 * @hooked Kidspress_Footer_Widgets->add_footer_widgets -  20
 * @hooked kidspress_footer_site_info -  40
 * @hooked kidspress_footer_end -  100
 *
 */
do_action( 'kidspress_footer' );

/**
 * kidspress_page_end_action hook
 *
 * @hooked kidspress_page_end -  10
 *
 */
do_action( 'kidspress_page_end_action' ); 

?>

<?php wp_footer(); ?>

</body>
</html>
