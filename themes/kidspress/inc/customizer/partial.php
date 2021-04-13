<?php
/**
* Partial functions
*
* @package Theme Palace
* @subpackage Kidspress
* @since Kidspress 1.0.0
*/

if ( ! function_exists( 'kidspress_course_title_partial' ) ) :
    // hero_content title
    function kidspress_course_title_partial() {
        $options = kidspress_get_theme_options();
        return esc_html( $options['course_title'] );
    }
endif;


if ( ! function_exists( 'kidspress_about_title_partial' ) ) :
    // about title
    function kidspress_about_title_partial() {
        $options = kidspress_get_theme_options();
        return esc_html( $options['about_title'] );
    }
endif;

if ( ! function_exists( 'kidspress_about_btn_title_partial' ) ) :
    // about btn title
    function kidspress_about_btn_title_partial() {
        $options = kidspress_get_theme_options();
        return esc_html( $options['about_btn_title'] );
    }
endif;

if ( ! function_exists( 'kidspress_service_title_partial' ) ) :
    // service title
    function kidspress_service_title_partial() {
        $options = kidspress_get_theme_options();
        return esc_html( $options['service_title'] );
    }
endif;


if ( ! function_exists( 'kidspress_blog_title_partial' ) ) :
    // blog title
    function kidspress_blog_title_partial() {
        $options = kidspress_get_theme_options();
        return esc_html( $options['blog_title'] );
    }
endif;

if ( ! function_exists( 'kidspress_cta_title_partial' ) ) :
    // cta title
    function kidspress_cta_title_partial() {
        $options = kidspress_get_theme_options();
        return esc_html( $options['cta_title'] );
    }
endif;


if ( ! function_exists( 'kidspress_subscription_title_partial' ) ) :
    // subscription title
    function kidspress_subscription_title_partial() {
        $options = kidspress_get_theme_options();
        return esc_html( $options['subscription_title'] );
    }
endif;

if ( ! function_exists( 'kidspress_subscription_btn_title_partial' ) ) :
    // subscription btn title
    function kidspress_subscription_btn_title_partial() {
        $options = kidspress_get_theme_options();
        return esc_html( $options['subscription_btn_title'] );
    }
endif;
