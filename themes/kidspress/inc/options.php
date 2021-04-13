<?php
/**
 * Theme Palace options
 *
 * @package Theme Palace
 * @subpackage Kidspress
 * @since Kidspress 1.0.0
 */

/**
 * List of pages for page choices.
 * @return Array Array of page ids and name.
 */
function kidspress_page_choices() {
    $pages = get_pages();
    $choices = array();
    $choices[0] = esc_html__( '--Select--', 'kidspress' );
    foreach ( $pages as $page ) {
        $choices[ $page->ID ] = $page->post_title;
    }

    return  $choices;
}

/**
 * List of posts for post choices.
 * @return Array Array of post ids and name.
 */
function kidspress_post_choices() {
    $posts = get_posts( array( 'numberposts' => -1 ) );
    $choices = array();
    $choices[0] = esc_html__( '--Select--', 'kidspress' );
    foreach ( $posts as $post ) {
        $choices[ $post->ID ] = $post->post_title;
    }
    wp_reset_postdata();
    return  $choices;
}

/**
 * List of pages for page choices.
 * @return Array Array of page ids and name.
 */
function kidspress_course_choices() {
    $courses = get_posts( array( 'numberposts' => -1, 'post_type'=>'tp-course' ) );
    $choices = array();
    $choices[0] = esc_html__( '--Select--', 'kidspress' );
    foreach ( $courses as $course ) {
        $choices[ $course->ID ] = $course->post_title;
    }
    wp_reset_postdata();
    return  $choices;
}

if ( ! function_exists( 'kidspress_site_layout' ) ) :
    /**
     * Site Layout
     * @return array site layout options
     */
    function kidspress_site_layout() {
        $kidspress_site_layout = array(
            'wide'  => get_template_directory_uri() . '/assets/images/full.png',
            'boxed-layout' => get_template_directory_uri() . '/assets/images/boxed.png',
        );

        $output = apply_filters( 'kidspress_site_layout', $kidspress_site_layout );
        return $output;
    }
endif;

if ( ! function_exists( 'kidspress_selected_sidebar' ) ) :
    /**
     * Sidebars options
     * @return array Sidbar positions
     */
    function kidspress_selected_sidebar() {
        $kidspress_selected_sidebar = array(
            'sidebar-1'             => esc_html__( 'Default Sidebar', 'kidspress' ),
            'optional-sidebar'      => esc_html__( 'Optional Sidebar 1', 'kidspress' ),
        );

        $output = apply_filters( 'kidspress_selected_sidebar', $kidspress_selected_sidebar );

        return $output;
    }
endif;


if ( ! function_exists( 'kidspress_global_sidebar_position' ) ) :
    /**
     * Global Sidebar position
     * @return array Global Sidebar positions
     */
    function kidspress_global_sidebar_position() {
        $kidspress_global_sidebar_position = array(
            'right-sidebar' => get_template_directory_uri() . '/assets/images/right.png',
            'no-sidebar'    => get_template_directory_uri() . '/assets/images/full.png',
        );

        $output = apply_filters( 'kidspress_global_sidebar_position', $kidspress_global_sidebar_position );

        return $output;
    }
endif;


if ( ! function_exists( 'kidspress_sidebar_position' ) ) :
    /**
     * Sidebar position
     * @return array Sidbar positions
     */
    function kidspress_sidebar_position() {
        $kidspress_sidebar_position = array(
            'right-sidebar' => get_template_directory_uri() . '/assets/images/right.png',
            'no-sidebar'    => get_template_directory_uri() . '/assets/images/full.png',
            'no-sidebar-content'   => get_template_directory_uri() . '/assets/images/boxed.png',
        );

        $output = apply_filters( 'kidspress_sidebar_position', $kidspress_sidebar_position );

        return $output;
    }
endif;


if ( ! function_exists( 'kidspress_pagination_options' ) ) :
    /**
     * Pagination
     * @return array site pagination options
     */
    function kidspress_pagination_options() {
        $kidspress_pagination_options = array(
            'numeric'   => esc_html__( 'Numeric', 'kidspress' ),
            'default'   => esc_html__( 'Default(Older/Newer)', 'kidspress' ),
        );

        $output = apply_filters( 'kidspress_pagination_options', $kidspress_pagination_options );

        return $output;
    }
endif;

if ( ! function_exists( 'kidspress_switch_options' ) ) :
    /**
     * List of custom Switch Control options
     * @return array List of switch control options.
     */
    function kidspress_switch_options() {
        $arr = array(
            'on'        => esc_html__( 'Enable', 'kidspress' ),
            'off'       => esc_html__( 'Disable', 'kidspress' )
        );
        return apply_filters( 'kidspress_switch_options', $arr );
    }
endif;

if ( ! function_exists( 'kidspress_hide_options' ) ) :
    /**
     * List of custom Switch Control options
     * @return array List of switch control options.
     */
    function kidspress_hide_options() {
        $arr = array(
            'on'        => esc_html__( 'Yes', 'kidspress' ),
            'off'       => esc_html__( 'No', 'kidspress' )
        );
        return apply_filters( 'kidspress_hide_options', $arr );
    }
endif;

if ( ! function_exists( 'kidspress_popular_course_content_type' ) ) :
    /**
     * Destination Options
     * @return array site gallery options
     */
    function kidspress_popular_course_content_type() {
        $kidspress_popular_course_content_type = array(
            'post'      => esc_html__( 'Post', 'kidspress' ),
        );

        if ( class_exists( 'TP_Education' ) ) {
            $kidspress_popular_course_content_type = array_merge( $kidspress_popular_course_content_type, array(
                'course'            => esc_html__( 'Course', 'kidspress' ),
                ) );
        }

        $output = apply_filters( 'kidspress_popular_course_content_type', $kidspress_popular_course_content_type );


        return $output;
    }
endif;
