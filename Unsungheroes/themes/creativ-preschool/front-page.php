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
	 <a id="add"></a>
<!-- Quiz-section start -->

									
		

<div class="elementor-element elementor-element-a502162 elementor-cta--skin-cover elementor-animated-content elementor-bg-transform elementor-bg-transform-zoom-in elementor-widget elementor-widget-call-to-action" data-id="a502162" data-element_type="widget" data-widget_type="call-to-action.default">
				<div class="elementor-widget-container">
					<a href="https://unsungheroes.tk/lets-find-your-animal-hero/" class="elementor-cta">
				   <div class="elementor-cta" style="height: 600px; text-align:center;vertical-align:middle;">
					<div class="elementor-cta__bg-wrapper" >
				<div class="elementor-cta__bg elementor-bg" style=" background: linear-gradient( #b5b5b58c, rgb(105 104 104 / 60%) ),
    url(https://unsungheroes.tk/wp-content/uploads/2021/04/qwe.png);"></div>
				<div class="elementor-cta__bg-overlay"></div>
			</div>                            
							<div class="elementor-cta__content" style="margin-top: 100px;">
				
									<h2 class="elementor-cta__title elementor-cta__content-item elementor-content-item elementor-animated-item--grow" style="text-shadow: 2px 2px 1px #000000;font-size: 40px;">
					Let's find your animal hero		</h2>
				
									<div class="elementor-cta__description elementor-cta__content-item elementor-content-item elementor-animated-item--grow">
						<p style="text-shadow: 2px 2px 1px #000000;font-size: 20px;">Self-care is about meeting your basic needs so you can be physically and mentally healthy. </p>
                            <p style="text-shadow: 2px 2px 1px #000000;font-size: 20px;">We designed a self-care quiz for you to know what makes you pleasant. </p>
										<p style="text-shadow: 2px 2px 1px #000000;font-size: 20px;">After this quiz, you can get your spirit animal and find out more fun activities that we recommend you to play.</p></div>
				
									<div class="elementor-cta__button-wrapper elementor-cta__content-item elementor-content-item elementor-animated-item--grow">
					<span class="btn" style="background: #ff7096;color:white">
						LET'S BE ACTIVE			
										</span>
										
					</div>
					   </div></div>
						</a>
				</div>
				</div>
	


   
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