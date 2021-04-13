<?php
$overlay_titletag = get_theme_mod( 'overlay-seo-site-title', customizer_library_get_default( 'overlay-seo-site-title' ) );
$overlay_desctag = get_theme_mod( 'overlay-seo-site-tagline', customizer_library_get_default( 'overlay-seo-site-tagline' ) ); ?>
<header id="masthead" class="site-header overlay-header-default <?php echo ( get_theme_mod( 'overlay-social-set-header-color', customizer_library_get_default( 'overlay-social-set-header-color' ) ) ) ? sanitize_html_class( 'social-icons-color' ) : ''; ?> <?php echo ( get_theme_mod( 'overlay-enable-sticky-header', customizer_library_get_default( 'overlay-enable-sticky-header' ) ) && 'stick-logonav' == get_theme_mod( 'overlay-stick-header-element', customizer_library_get_default( 'overlay-stick-header-element' ) ) ) ? sanitize_html_class( 'stick-logonav' ) : ''; ?> <?php echo ( get_theme_mod( 'overlay-enable-sticky-header', customizer_library_get_default( 'overlay-enable-sticky-header' ) ) && 'stick-logonav' == get_theme_mod( 'overlay-stick-header-element', customizer_library_get_default( 'overlay-stick-header-element' ) ) && get_theme_mod( 'overlay-stuckheader-botalign', customizer_library_get_default( 'overlay-stuckheader-botalign' ) ) ) ? sanitize_html_class( 'stick-logonav-botalign' ) : ''; ?>">
    <?php
    if ( !get_theme_mod( 'overlay-remove-topbar', customizer_library_get_default( 'overlay-remove-topbar' ) ) ) :
        // Get Site Top Bar
        get_template_part( '/templates/header/topbar/'.get_theme_mod( 'overlay-topbar-layout', customizer_library_get_default( 'overlay-topbar-layout' ) ) );
    endif; ?>
    
    <?php echo esc_html( 'stick-logonav' == get_theme_mod( 'overlay-stick-header-element', customizer_library_get_default( 'overlay-stick-header-element' ) ) ) ? '<div class="site-stick-header stick-header"><div class="site-stick-inner">' : ''; ?>

        <div class="site-container overlay-header-container">
            <div class="site-header-inner">

                <div class="overlay-header-sicons">
                    <?php if ( !get_theme_mod( 'overlay-header-remove-social', customizer_library_get_default( 'overlay-header-remove-social' ) ) ) : ?>
                        <?php get_template_part( 'templates/social-links' ); ?>
                    <?php endif; ?>
                </div>

                <div class="site-branding align-items-<?php echo sanitize_html_class( get_theme_mod( 'overlay-logo-alignment', customizer_library_get_default( 'overlay-logo-alignment' ) ) ); ?>">
                    <?php echo esc_html( get_theme_mod( 'overlay-uploaded-logo', customizer_library_get_default( 'overlay-uploaded-logo' ) ) && get_theme_mod( 'overlay-logo-align-side', customizer_library_get_default( 'overlay-logo-align-side' ) ) ) ? '<div class="site-logo-align">' : ''; ?>
                        
                        <?php echo esc_html( get_theme_mod( 'overlay-uploaded-logo', customizer_library_get_default( 'overlay-uploaded-logo' ) ) && get_theme_mod( 'overlay-logo-align-side', customizer_library_get_default( 'overlay-logo-align-side' ) ) ) ? '<div class="site-logo-align-inner">' : ''; ?>
                            
                            <?php if ( has_custom_logo() ) : ?>
                                <?php the_custom_logo(); ?>

                                <?php if ( get_theme_mod( 'overlay-add-back-title', customizer_library_get_default( 'overlay-add-back-title' ) ) || get_theme_mod( 'overlay-add-back-tagline', customizer_library_get_default( 'overlay-add-back-tagline' ) ) ) : ?>
                                    <div class="site-logo-title">
                                        <?php if ( get_theme_mod( 'overlay-add-back-title', customizer_library_get_default( 'overlay-add-back-title' ) ) ) : ?>
                                            <?php echo '<' .tag_escape( $overlay_titletag ) . ' class="site-title">'; ?><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a><?php echo '</' . tag_escape( $overlay_titletag ) . '>'; ?>
                                        <?php endif; ?>
                                        <?php if ( get_theme_mod( 'overlay-add-back-tagline', customizer_library_get_default( 'overlay-add-back-tagline' ) ) ) : ?>
                                            <?php
                                            $overlay_description = get_bloginfo( 'description', 'display' );
                                            if ( $overlay_description || is_customize_preview() ) : ?>
                                                <?php echo '<' . tag_escape( $overlay_desctag ) . ' class="site-description">'; ?><?php echo esc_attr( $overlay_description ); ?><?php echo '</' . tag_escape( $overlay_desctag ) . '>'; ?>
                                            <?php
                                            endif; ?>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>
                            <?php else : ?>
                                <div class="site-logo-title">
                                        <?php echo '<' .tag_escape( $overlay_titletag ) . ' class="site-title">'; ?><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a><?php echo '</' . tag_escape( $overlay_titletag ) . '>'; ?>
                                    <?php
                                    $overlay_description = get_bloginfo( 'description', 'display' );
                                    if ( $overlay_description || is_customize_preview() ) : ?>
                                        <?php echo '<' . tag_escape( $overlay_desctag ) . ' class="site-description">'; ?><?php echo esc_attr( $overlay_description ); ?><?php echo '</' . tag_escape( $overlay_desctag ) . '>'; ?>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                        
                        <?php echo esc_html( get_theme_mod( 'overlay-uploaded-logo', customizer_library_get_default( 'overlay-uploaded-logo' ) ) && get_theme_mod( 'overlay-logo-align-side', customizer_library_get_default( 'overlay-logo-align-side' ) ) ) ? '</div>' : ''; ?>

                    <?php echo esc_html( get_theme_mod( 'overlay-uploaded-logo', customizer_library_get_default( 'overlay-uploaded-logo' ) ) && get_theme_mod( 'overlay-logo-align-side', customizer_library_get_default( 'overlay-logo-align-side' ) ) ) ? '</div>' : ''; ?>
                </div><!-- .site-branding -->

                <div class="site-header-inner-right">
                    <?php
                    if ( get_theme_mod( 'overlay-header-add-topcart', customizer_library_get_default( 'overlay-header-add-topcart' ) ) ) :
                        if ( function_exists( 'overlay_woocommerce_header_cart' ) ) {
                            overlay_woocommerce_header_cart();
                        }
                    endif; ?>

                    <?php if ( !get_theme_mod( 'overlay-remove-header-search', customizer_library_get_default( 'overlay-remove-header-search' ) ) ) : ?>
                        <?php if ( 'overlay-search-always' == get_theme_mod( 'overlay-header-search-type', customizer_library_get_default( 'overlay-header-search-type' ) ) ) : ?>
                            <div class="header-search-block">
                                <?php get_search_form(); ?>
                            </div>
                        <?php elseif ( 'overlay-search-plugin-shortcode' == get_theme_mod( 'overlay-header-search-type', customizer_library_get_default( 'overlay-header-search-type' ) ) ) : ?>
                            <div class="header-search-block">
                                <?php
                                if ( get_theme_mod( 'overlay-search-shortcode' ) ) :
                                    echo do_shortcode( sanitize_text_field( get_theme_mod( 'overlay-search-shortcode' ) ) );
                                else :
                                    esc_html_e( '[ Enter a Shortcode ]', 'overlay-child-lifestyle' );
                                endif; ?>
                            </div>
                        <?php else : ?>
                            <button class="header-search">
                                <i class="fas fa-search search-btn"></i>
                            </button>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            
            </div>
        </div>

        <?php if ( !get_theme_mod( 'overlay-remove-main-nav', customizer_library_get_default( 'overlay-remove-main-nav' ) ) ) : ?>
            <nav id="site-navigation" class="main-navigation <?php echo sanitize_html_class( get_theme_mod( 'overlay-menu-position', customizer_library_get_default( 'overlay-menu-position' ) ) ); ?> <?php echo sanitize_html_class( get_theme_mod( 'overlay-header-nav-style', customizer_library_get_default( 'overlay-header-nav-style' ) ) ); ?> <?php echo ( get_theme_mod( 'overlay-align-nav-full-width', customizer_library_get_default( 'overlay-align-nav-full-width' ) ) ) ? sanitize_html_class( 'main-nav-full-width' ) : ''; ?> <?php echo ( get_theme_mod( 'overlay-align-nav-center', customizer_library_get_default( 'overlay-align-nav-center' ) ) ) ? sanitize_html_class( 'main-nav-center' ) : ''; ?> <?php echo ( 'stick-onlynav' == get_theme_mod( 'overlay-stick-header-element', customizer_library_get_default( 'overlay-stick-header-element' ) ) ) ? sanitize_html_class( 'stick-header' ) : ''; ?> <?php echo sanitize_html_class( get_theme_mod( 'overlay-dd-style', customizer_library_get_default( 'overlay-dd-style' ) ) ); ?>">
                <div class="site-container">
                    <button class="menu-toggle" aria-controls="main-menu" aria-expanded="false">
                        <?php if ( get_theme_mod( 'overlay-mobile-menu-addicon', customizer_library_get_default( 'overlay-mobile-menu-addicon' ) ) ) : ?>
                            <span><i class="fas <?php echo sanitize_html_class( get_theme_mod( 'overlay-mobile-menu-icon', customizer_library_get_default( 'overlay-mobile-menu-icon' ) ) ); ?>"></i></span>
                        <?php endif; ?>
                        <?php echo esc_html( get_theme_mod( 'overlay-mobile-menu-text', customizer_library_get_default( 'overlay-mobile-menu-text' ) ) ); ?>
                    </button>
                    <div class="menu-main-menu-container">
                        <?php
                        wp_nav_menu( array(
                            'theme_location' => 'overlay-main-menu',
                            'menu_id'        => 'overlay-main-menu',
                            'container_class'=> 'main-menu-inner',
                        ) ); ?>
                        <button class="main-menu-close"></button>
                    </div>
                </div>
            </nav><!-- #site-navigation -->
        <?php endif; ?>

    <?php echo esc_html( 'stick-logonav' == get_theme_mod( 'overlay-stick-header-element', customizer_library_get_default( 'overlay-stick-header-element' ) ) ) ? '</div></div>' : ''; ?>
    
</header><!-- #masthead -->