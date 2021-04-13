<?php
/**
 * Theme Palace basic theme structure hooks
 *
 * This file contains structural hooks.
 *
 * @package Theme Palace
 * @subpackage Kidspress
 * @since Kidspress 1.0.0
 */

$options = kidspress_get_theme_options();


if ( ! function_exists( 'kidspress_doctype' ) ) :
	/**
	 * Doctype Declaration.
	 *
	 * @since Kidspress 1.0.0
	 */
	function kidspress_doctype() {
	?>
		<!DOCTYPE html>
			<html <?php language_attributes(); ?>>
	<?php
	}
endif;

add_action( 'kidspress_doctype', 'kidspress_doctype', 10 );


if ( ! function_exists( 'kidspress_head' ) ) :
	/**
	 * Header Codes
	 *
	 * @since Kidspress 1.0.0
	 *
	 */
	function kidspress_head() {
		?>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
			<link rel="pingback" href="<?php echo esc_url( get_bloginfo( 'pingback_url' ) ); ?>">
		<?php endif;
	}
endif;
add_action( 'kidspress_before_wp_head', 'kidspress_head', 10 );

if ( ! function_exists( 'kidspress_page_start' ) ) :
	/**
	 * Page starts html codes
	 *
	 * @since Kidspress 1.0.0
	 *
	 */
	function kidspress_page_start() {
		?>
		<div id="page" class="site">
			<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'kidspress' ); ?></a>
			<div class="menu-overlay"></div>

		<?php
	}
endif;
add_action( 'kidspress_page_start_action', 'kidspress_page_start', 10 );

if ( ! function_exists( 'kidspress_page_end' ) ) :
	/**
	 * Page end html codes
	 *
	 * @since Kidspress 1.0.0
	 *
	 */
	function kidspress_page_end() {
		?>
		</div><!-- #page -->
		<?php
	}
endif;
add_action( 'kidspress_page_end_action', 'kidspress_page_end', 10 );


if ( ! function_exists( 'kidspress_header_start' ) ) :
	/**
	 * Header start html codes
	 *
	 * @since Kidspress 1.0.0
	 *
	 */
	function kidspress_header_start() { ?>

		<header id="masthead" class="site-header" role="banner">
			<div class="wrapper">
				
		<?php
	}
endif;
add_action( 'kidspress_header_action', 'kidspress_header_start', 20 );

if ( ! function_exists( 'kidspress_site_branding' ) ) :
	/**
	 * Site branding codes
	 *
	 * @since Kidspress 1.0.0
	 *
	 */
	function kidspress_site_branding() {
		$options  = kidspress_get_theme_options();
		$header_txt_logo_extra = $options['header_txt_logo_extra'];		
		?>
		<div class="site-branding">
			<?php if ( in_array( $header_txt_logo_extra, array( 'show-all', 'logo-title', 'logo-tagline' ) )  ) { ?>
				<div class="site-logo">
					<?php the_custom_logo(); ?>
				</div>
			<?php } 
			if ( in_array( $header_txt_logo_extra, array( 'show-all', 'title-only', 'logo-title', 'show-all', 'tagline-only', 'logo-tagline' ) ) ) : ?>
				<div id="site-identity">
					<?php
					if( in_array( $header_txt_logo_extra, array( 'show-all', 'title-only', 'logo-title' ) )  ) {
						if ( kidspress_is_latest_posts() ) : ?>
							<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						<?php else : ?>
							<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
						<?php
						endif;
					} 
					if ( in_array( $header_txt_logo_extra, array( 'show-all', 'tagline-only', 'logo-tagline' ) ) ) {
						$description = get_bloginfo( 'description', 'display' );
						if ( $description || is_customize_preview() ) : ?>
							<p class="site-description"><?php echo esc_html( $description ); /* WPCS: xss ok. */ ?></p>
						<?php
						endif; 
					}?>
				</div>
        	<?php endif; ?>
		</div><!-- .site-branding -->
		<?php
	}
endif;
add_action( 'kidspress_header_action', 'kidspress_site_branding', 30 );

if ( ! function_exists( 'kidspress_site_navigation' ) ) :
	/**
	 * Site navigation codes
	 *
	 * @since Kidspress 1.0.0
	 *
	 */
	function kidspress_site_navigation() {
		?>

		 <nav id="site-navigation" class="main-navigation" role="navigation" aria-label="Primary Menu">
		<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
			<?php
			echo kidspress_get_svg( array( 'icon' => 'menu' ) );
			echo kidspress_get_svg( array( 'icon' => 'close' ) );
			?>					
			<span class="menu-label"><?php esc_html_e( 'Menu', 'kidspress' ); ?></span>
		</button>

			<?php 
       	
        		wp_nav_menu( array(
        			'theme_location' => 'primary',
        			'container' => 'div',
        			'menu_class' => 'menu nav-menu',
        			'menu_id' => 'primary-menu',
        			'echo' => true,
        			'fallback_cb' => 'kidspress_menu_fallback_cb',
        		) );
        	?>
		</nav><!-- #site-navigation -->
		<?php
	}
endif;
add_action( 'kidspress_header_action', 'kidspress_site_navigation', 40 );


if ( ! function_exists( 'kidspress_header_end' ) ) :
	/**
	 * Header end html codes
	 *
	 * @since Kidspress 1.0.0
	 *
	 */
	function kidspress_header_end() {
		?>
			</div><!-- .wrapper -->
		</header><!-- #masthead -->
		<?php
	}
endif;

add_action( 'kidspress_header_action', 'kidspress_header_end', 60 );

if ( ! function_exists( 'kidspress_content_start' ) ) :
	/**
	 * Site content codes
	 *
	 * @since Kidspress 1.0.0
	 *
	 */
	function kidspress_content_start() {
		?>
		<div id="content" class="site-content">
		<?php
	}
endif;
add_action( 'kidspress_content_start_action', 'kidspress_content_start', 10 );

if ( ! function_exists( 'kidspress_header_image' ) ) :
	/**
	 * Header Image codes
	 *
	 * @since Kidspress 1.0.0
	 *
	 */
	function kidspress_header_image() {
		if ( kidspress_is_frontpage() )
			return;
		$header_image = get_header_image();
		if ( is_singular() ) :
			$header_image = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'full' ) : $header_image;
		endif;
		?>

		<div id="page-site-header" class="relative" style="background-image: url('<?php echo esc_url( $header_image ); ?>');">
            <div class="overlay"></div>
            <div class="wrapper">
                <header class="page-header">
                    <h2 class="page-title"><?php kidspress_custom_header_banner_title(); ?></h2>
                </header>

                <?php kidspress_add_breadcrumb(); ?>
            </div><!-- .wrapper -->
        </div><!-- #page-site-header -->
		<?php
	}
endif;
add_action( 'kidspress_header_image_action', 'kidspress_header_image', 10 );

if ( ! function_exists( 'kidspress_add_breadcrumb' ) ) :
	/**
	 * Add breadcrumb.
	 *
	 * @since Kidspress 1.0.0
	 */
	function kidspress_add_breadcrumb() {
		$options = kidspress_get_theme_options();
		// Bail if Breadcrumb disabled.
		$breadcrumb = $options['breadcrumb_enable'];
		if ( false === $breadcrumb ) {
			return;
		}
		
		// Bail if Home Page.
		if ( kidspress_is_frontpage() ) {
			return;
		}

		echo '<div id="breadcrumb-list">';
				/**
				 * kidspress_simple_breadcrumb hook
				 *
				 * @hooked kidspress_simple_breadcrumb -  10
				 *
				 */
				do_action( 'kidspress_simple_breadcrumb' );
		echo '</div><!-- #breadcrumb-list -->';
		return;
	}
endif;
add_action( 'kidspress_header_image_action', 'kidspress_add_breadcrumb', 20 );

if ( ! function_exists( 'kidspress_content_end' ) ) :
	/**
	 * Site content codes
	 *
	 * @since Kidspress 1.0.0
	 *
	 */
	function kidspress_content_end() {
		?>
			<div class="menu-overlay"></div>
		</div><!-- #content -->
		<?php
	}
endif;
add_action( 'kidspress_content_end_action', 'kidspress_content_end', 10 );

if ( ! function_exists( 'kidspress_footer_start' ) ) :
	/**
	 * Footer starts
	 *
	 * @since Kidspress 1.0.0
	 *
	 */
	function kidspress_footer_start() {
		?>
		<footer id="colophon" class="site-footer" role="contentinfo">
		<?php
	}
endif;
add_action( 'kidspress_footer', 'kidspress_footer_start', 10 );

if ( ! function_exists( 'kidspress_footer_site_info' ) ) :
	/**
	 * Footer starts
	 *
	 * @since Kidspress 1.0.0
	 *
	 */
	function kidspress_footer_site_info() {
		$theme_data = wp_get_theme();
        $options = kidspress_get_theme_options();
        $search = array( '[the-year]', '[site-link]' );
	
       	$replace = array( date( 'Y' ), '<a href="'. esc_url( home_url( '/' ) ) .'">'. esc_attr( get_bloginfo( 'name', 'display' ) ) . '</a>' );

        $options['copyright_text'] = str_replace( $search, $replace, $options['copyright_text'] );
        $copyright_text = $options['copyright_text']; 
        $poweredby_text = esc_html( $theme_data->get( 'Name') ) . '&nbsp;' . esc_html__( 'by', 'kidspress' ). '&nbsp;<a target="_blank" href="'. esc_url( $theme_data->get( 'AuthorURI' ) ) .'">'. esc_html( ucwords( $theme_data->get( 'Author' ) ) ) .'</a>';
        ?>
		<div class="site-info col-2">
                <div class="wrapper">
                    <span >
	                   	<?php echo kidspress_santize_allow_tag( $copyright_text ); 
	               			echo kidspress_santize_allow_tag( $poweredby_text );
	                		if ( function_exists( 'the_privacy_policy_link' ) ) {
								the_privacy_policy_link( ' | ' );
							}
	                	?>
                	</span>
                </div><!-- .wrapper -->    
            </div><!-- .site-info -->

		<?php
	}
endif;
add_action( 'kidspress_footer', 'kidspress_footer_site_info', 40 );

if ( ! function_exists( 'kidspress_footer_scroll_to_top' ) ) :
	/**
	 * Footer starts
	 *
	 * @since Kidspress 1.0.0
	 *
	 */
	function kidspress_footer_scroll_to_top() {
		$options  = kidspress_get_theme_options();
		if ( true === $options['scroll_top_visible'] ) : ?>
			<div class="backtotop"><?php echo kidspress_get_svg( array( 'icon' => 'up' ) ); ?></div>
		<?php endif;
	}
endif;
add_action( 'kidspress_footer', 'kidspress_footer_scroll_to_top', 40 );

if ( ! function_exists( 'kidspress_footer_end' ) ) :
	/**
	 * Footer starts
	 *
	 * @since Kidspress 1.0.0
	 *
	 */
	function kidspress_footer_end() {
		?>
		</footer>
		<?php
	}
endif;
add_action( 'kidspress_footer', 'kidspress_footer_end', 100 );
