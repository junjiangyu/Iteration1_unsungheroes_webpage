<?php
/**
 * Customizer active callbacks
 *
 * @package Theme Palace
 * @subpackage Kidspress
 * @since Kidspress 1.0.0
 */

if ( ! function_exists( 'kidspress_is_breadcrumb_enable' ) ) :
	/**
	 * Check if breadcrumb is enabled.
	 *
	 * @since Kidspress 1.0.0
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function kidspress_is_breadcrumb_enable( $control ) {
		return $control->manager->get_setting( 'kidspress_theme_options[breadcrumb_enable]' )->value();
	}
endif;

if ( ! function_exists( 'kidspress_is_pagination_enable' ) ) :
	/**
	 * Check if pagination is enabled.
	 *
	 * @since Kidspress 1.0.0
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function kidspress_is_pagination_enable( $control ) {
		return $control->manager->get_setting( 'kidspress_theme_options[pagination_enable]' )->value();
	}
endif;

/**
 * Front Page Active Callbacks
 */

/**
 * Check if slider section is enabled.
 *
 * @since Kidspress 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function kidspress_is_slider_section_enable( $control ) {
	return ( $control->manager->get_setting( 'kidspress_theme_options[slider_section_enable]' )->value() );
}

/**
 * Check if service section is enabled.
 *
 * @since Kidspress 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function kidspress_is_service_section_enable( $control ) {
	return ( $control->manager->get_setting( 'kidspress_theme_options[service_section_enable]' )->value() );
}

/**
 * Check if course section is enabled.
 *
 * @since Kidspress 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function kidspress_is_course_section_enable( $control ) {
	return ( $control->manager->get_setting( 'kidspress_theme_options[course_section_enable]' )->value() );
}

/**
 * Check if course section content type is post.
 *
 * @since Kidspress 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function kidspress_is_course_section_content_post_enable( $control ) {
	$content_type = $control->manager->get_setting( 'kidspress_theme_options[course_content_type]' )->value();
	return kidspress_is_course_section_enable( $control ) && ( 'post' == $content_type );
}

/**
 * Check if course section content type is course.
 *
 * @since Kidspress 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function kidspress_is_course_section_content_course_enable( $control ) {
	$content_type = $control->manager->get_setting( 'kidspress_theme_options[course_content_type]' )->value();
	return kidspress_is_course_section_enable( $control ) && ( 'course' == $content_type );
}


/**
 * Check if subscription section is enabled.
 *
 * @since Kidspress 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function kidspress_is_subscription_section_enable( $control ) {
	return ( $control->manager->get_setting( 'kidspress_theme_options[subscription_section_enable]' )->value() );
}

/**
 * Check if about section is enabled.
 *
 * @since Kidspress 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function kidspress_is_about_section_enable( $control ) {
	return ( $control->manager->get_setting( 'kidspress_theme_options[about_section_enable]' )->value() );
}

/**
 * Check if blog section is enabled.
 *
 * @since Kidspress 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function kidspress_is_blog_section_enable( $control ) {
	return ( $control->manager->get_setting( 'kidspress_theme_options[blog_section_enable]' )->value() );
}

/**
 * Check if blog section content type is category.
 *
 * @since Kidspress 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function kidspress_is_blog_section_content_category_enable( $control ) {
	$content_type = $control->manager->get_setting( 'kidspress_theme_options[blog_content_type]' )->value();
	return kidspress_is_blog_section_enable( $control ) && ( 'category' == $content_type );
}

/**
 * Check if blog section content type is recent.
 *
 * @since Kidspress 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function kidspress_is_blog_section_content_recent_enable( $control ) {
	$content_type = $control->manager->get_setting( 'kidspress_theme_options[blog_content_type]' )->value();
	return kidspress_is_blog_section_enable( $control ) && ( 'recent' == $content_type );
}

/**
 * Check if cta section is enabled.
 *
 * @since Kidspress 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function kidspress_is_cta_section_enable( $control ) {
	return ( $control->manager->get_setting( 'kidspress_theme_options[cta_section_enable]' )->value() );
}

