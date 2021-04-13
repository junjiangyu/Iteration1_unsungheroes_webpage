<?php
/**
 * The template for displaying home page.
 * @package Creativ Preschool
 */

if ( 'posts' != get_option( 'show_on_front' ) ){ 
    get_header(); ?>
    <?php $enabled_sections = creativ_preschool_get_sections();
    if( is_array( $enabled_sections ) ) {
        foreach( $enabled_sections as $section ) {

            if( ( $section['id'] == 'featured-slider' ) ){ ?>
                <?php $enable_featured_slider = creativ_preschool_get_option( 'enable_featured_slider' );
                if( true ==$enable_featured_slider): ?>
                    <section id="<?php echo esc_attr( $section['id'] ); ?>">
                        <?php get_template_part( 'sections/section', esc_attr( $section['id'] ) ); ?>
                        <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/cloud-bg.png' ) ?>" class="cloud-bg">
                    </section>
            <?php endif; ?>

        <?php } elseif( $section['id'] == 'our-services' ) { ?>
                <?php $enable_our_services_section = creativ_preschool_get_option( 'enable_our_services_section' );
                if( true ==$enable_our_services_section): ?>
                    <section id="<?php echo esc_attr( $section['id'] ); ?>" class="page-section">
                        <div class="wrapper">
                            <?php get_template_part( 'sections/section', esc_attr( $section['id'] ) ); ?>
                        </div>
                    </section>
            <?php endif; ?>

<!-- Quiz-section start -->

<section id="about-us" class="page-section">
                        <div class="wrapper">
                                        <div class="section-content">
			
  									
                
                <article>

                    <div class="featured-image">
                        <a href="https://unsungheroes.tk/supermission/" class="post-thumbnail-link"></a>
                    </div><!-- .featured-image -->

                    <div class="entry-container">
                        <header class="entry-header">
                            <h2 class="entry-title"><a href="https://unsungheroes.tk/supermission/">Super Mission</a></h2>
                        </header>

                        <div class="entry-content">
                           
							<p>Hello, unsung hero! Do you want to know what kind of superpowers you have? Come and find out through the mission! </p>
                        </div><!-- .entry-content -->

                                                                            <div class="read-more">
                                <a href="https://unsungheroes.tk/supermission/" class="btn btn-primary">Start the Mission</a>
                            </div><!-- .read-more -->
                                            </div><!-- .entry-container -->
                </article>

                                                </div>

                            </div>
                    </section>

<!-- Quiz-section end -->




  <?php } elseif( $section['id'] == 'about-us' ) { ?>
                <?php $enable_about_us_section = creativ_preschool_get_option( 'enable_about_us_section' );
                if( true ==$enable_about_us_section): ?>
                    <section id="<?php echo esc_attr( $section['id'] ); ?>" class="page-section">
                        <div class="wrapper">
                            <?php get_template_part( 'sections/section', esc_attr( $section['id'] ) ); ?>
                        </div>
                    </section>
            <?php endif; ?>

   
  

            <?php } elseif( $section['id'] == 'our-courses' ) { ?>
                <?php $enable_our_courses_section = creativ_preschool_get_option( 'enable_our_courses_section' );
                if(true ==$enable_our_courses_section): ?>
                    <section id="<?php echo esc_attr( $section['id'] ); ?>">  
                        <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/top-cloud-bg.png' ) ?>">       
                        <?php get_template_part( 'sections/section', esc_attr( $section['id'] ) ); ?>
                    </section>
            <?php endif; ?>

        

            <?php } elseif( $section['id'] == 'team' ) { ?>
                <?php $enable_team_section = creativ_preschool_get_option( 'enable_team_section' );
                if( true ==$enable_team_section): ?>
                    <section id="<?php echo esc_attr( $section['id'] ); ?>">
                        <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/top-cloud-bg.png' ) ?>">
                        <?php get_template_part( 'sections/section', esc_attr( $section['id'] ) ); ?>
                    </section>
            <?php endif; ?>

            <?php } elseif( $section['id'] == 'cta' ) { ?>
                <?php $enable_cta_section = creativ_preschool_get_option( 'enable_cta_section' );
                if( true ==$enable_cta_section): ?>
                    <section id="<?php echo esc_attr( $section['id'] ); ?>">                        
                        <?php get_template_part( 'sections/section', esc_attr( $section['id'] ) ); ?>
                    </section>
            <?php endif;

            }
            elseif( ( $section['id'] == 'blog' ) ){ ?>
                <?php $enable_blog_section = creativ_preschool_get_option( 'enable_blog_section' );
                if(true ==$enable_blog_section): ?>
                    <section id="<?php echo esc_attr( $section['id'] ); ?>" class="blog-posts-wrapper page-section">
                        <div class="wrapper">
                            <?php get_template_part( 'sections/section', esc_attr( $section['id'] ) ); ?>
                        </div>
                    </section>
                <?php endif;
            }
        }
    }
    if( true == creativ_preschool_get_option('enable_frontpage_content') ) { ?>
        <div class="wrapper page-section">
            <?php include( get_page_template() ); ?>
        </div>
    <?php }
    get_footer();
} 
elseif ('posts' == get_option( 'show_on_front' ) ) {
    include( get_home_template() );
} 