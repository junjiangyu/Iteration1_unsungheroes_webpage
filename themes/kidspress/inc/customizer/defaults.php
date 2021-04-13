<?php
/**
 * Customizer default options
 *
 * @package Theme Palace
 * @subpackage Kidspress
 * @since Kidspress 1.0.0
 * @return array An array of default values
 */

function kidspress_get_default_theme_options() {
	$theme_data = wp_get_theme();
	$kidspress_default_options = array(
		// Color Options
		'header_title_color'			=> '#fff',
		'header_tagline_color'			=> '#fff',
		'header_txt_logo_extra'			=> 'show-all',
		
		// breadcrumb
		'breadcrumb_enable'				=> true,
		'breadcrumb_separator'			=> '/',
		
		// layout 
		'site_layout'         			=> 'wide',
		'sidebar_position'         		=> 'right-sidebar',
		'post_sidebar_position' 		=> 'right-sidebar',
		'page_sidebar_position' 		=> 'right-sidebar',

		// excerpt options
		'long_excerpt_length'           => 25,
		'read_more_text'           		=> esc_html__( 'Read More', 'kidspress' ),
		
		// pagination options
		'pagination_enable'         	=> true,
		'pagination_type'         		=> 'default',

		// footer options
		'copyright_text'           		=> sprintf( esc_html_x( 'Copyright &copy; %1$s %2$s. ', '1: Year, 2: Site Title with home URL', 'kidspress' ), '[the-year]', '[site-link]' ) . esc_html__( 'All Rights Reserved | ', 'kidspress' ),
		'scroll_top_visible'        	=> true,

		// reset options
		'reset_options'      			=> false,
		
		// homepage options
		'enable_frontpage_content' 		=> false,

		// homepage sections sortable
		'sortable' 						=> 'slider,cta,service,course,about,blog,subscription',

		// blog/archive options
		'your_latest_posts_title' 		=> esc_html__( 'Blogs', 'kidspress' ),
		'hide_date' 					=> false,
		'hide_category'					=> false,

		// single post theme options
		'single_post_hide_date' 		=> false,
		'single_post_hide_author'		=> false,
		'single_post_hide_category'		=> false,
		'single_post_hide_tags'			=> false,

		/* Front Page */

		// slider
		'slider_section_enable'			=> false,
		'slider_autoplay_enable'		=> false,
		'slider_btn_title'				=> esc_html__( 'Learn More', 'kidspress' ),

		// Call To Action
		'cta_section_enable'			=> false,
		'cta_btn_title'					=> esc_html__( 'Learn More', 'kidspress' ),

		// service
		'service_section_enable'		=> false,
		'service_title'					=> esc_html__( 'Learn As You Play', 'kidspress' ),

		// course
		'course_section_enable'			=> false,
		'course_section_bg_image_enable' => true,
		'course_content_type'			=> 'post',
		'course_title'					=> esc_html__( 'Playful Courses', 'kidspress' ),

		// About
		'about_section_enable'			=> false,
		'about_btn_title'				=> esc_html__( 'Learn More', 'kidspress' ),

		// blog
		'blog_section_enable'			=> false,
		'blog_section_bg_image_enable'	=> true,
		'blog_content_type'				=> 'recent',
		'blog_title'					=> esc_html__( 'Our School Life', 'kidspress' ),


		// subscription
		'subscription_section_enable'	=> false,
		'subscription_title'			=> esc_html__( 'Subscribe Now', 'kidspress' ),
		'subscription_btn_title'		=> esc_html__( 'Subscribe Now', 'kidspress' ),

	);

	$output = apply_filters( 'kidspress_default_theme_options', $kidspress_default_options );

	// Sort array in ascending order, according to the key:
	if ( ! empty( $output ) ) {
		ksort( $output );
	}

	return $output;
}