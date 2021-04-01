<?php 
/**
 * Template part for displaying our_servicess Section
 *
 *@package Creativ Preschool
 */

    $our_services_section_title    = creativ_preschool_get_option( 'our_services_section_title' );
    $services_content_type         = creativ_preschool_get_option( 'services_content_type' );
    $number_of_items               = creativ_preschool_get_option( 'number_of_items' );

    if( $services_content_type == 'services_page' ) :
        for( $i=1; $i<=$number_of_items; $i++ ) :
            $our_services_pages[] = creativ_preschool_get_option( 'our_services_page_'.$i );
        endfor;  
    elseif( $services_content_type == 'services_post' ) :
        for( $i=1; $i<=$number_of_items; $i++ ) :
            $our_services_posts[] = creativ_preschool_get_option( 'our_services_post_'.$i );
        endfor;
    endif;
    ?>

<div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-48724f7" data-id="48724f7" data-element_type="column">
			<div class="elementor-widget-wrap elementor-element-populated">
								<div class="elementor-element elementor-element-32e6483 elementor-widget elementor-widget-eael-adv-tabs" data-id="32e6483" data-element_type="widget" data-widget_type="eael-adv-tabs.default">
				<div class="elementor-widget-container">
			        <div id="eael-advance-tabs-32e6483" class="eael-advance-tabs eael-tabs-horizontal" data-tabid="32e6483">
                <div class="eael-tabs-nav">
              <ul class="eael-tab-inline-icon">
                                            <li class="inactive" style="border: 4px solid #ff7096;border-radius: 25px;">
                                                                <i class="fas fa-home"></i>  
												<span class="eael-tab-title" style="font-family: 'Sniglet', cursive;font-size: 15px;font-weight: 600;margin-left: 5px;">About us</span>
                        </li>
                                            <li class="inactive" style="border: 4px solid #ff7096;border-radius: 25px;">
                                                                <i class="fas fa-hippo"></i>                                                             <span class="eael-tab-title" style="font-family: 'Sniglet', cursive;font-size: 15px;font-weight: 600;margin-left: 5px;">About carers</span>
                        </li>
                                    </ul>
            </div>
        <div class="eael-tabs-content">
                
            <div class="clearfix inactive" style="margin-bottom: 80px;">
						<h3 style="line-height: 40px">We are a group people who are desperate to help young sibling carers in Victoria, to motivate them to improve their welling and health. You are not alone, we are here with you!
						</h3>                                         		
				
				</div>
                
                    <div class="clearfix inactive" style="margin-bottom: 80px;">

						<h3  style="line-height: 40px">Young sibling carers are people who provide unpaid care and support to their siblings who have a disability, mental illness, chronic condition, terminal illness, an alcohol or other drug issue. 
Usually, young sibling carers have to provide personal care to their siblings such as washing, dressing, feeding, showing and etc. Pre-teens have to balance their schoolworks and caring responsibilities.
.</h3>
						<h4>•	1.7% of children under the age of 15 years were carers </h4>
						<h4>•	young carers often have limited choice about their caring role which can have significant negative effects, including poor physical, mental health and educational outcomes</h4>
						<h4>
							•	Young people in low resource and single-parent households were more likely to take on a caring role
						</h4>
				</div>
                            </div>
        </div>
		</div>
				</div>
					</div>
		</div>


    <?php if( !empty($our_services_section_title) ):?>
        <div class="section-header">
            <h2 class="section-title"><?php echo esc_html($our_services_section_title);?></h2>
			    <div class="anchor"><a href="#add" class="fa fa-arrow-down fa-2x"></a></div>
        </div><!-- .section-header -->
    <?php endif;?>
    
    <?php if( $services_content_type == 'services_page' ) : ?>
        <div class="section-content clear col-3">
            <?php $args = array (
                'post_type'     => 'page',
                'post_per_page' => count( $our_services_pages ),
                'post__in'      => $our_services_pages,
                'orderby'       =>'post__in',
            );  

            $loop = new WP_Query($args);                        
            if ( $loop->have_posts() ) :
            $i=-1; $j=0;  
                while ($loop->have_posts()) : $loop->the_post(); $i++; $j++;
                $our_services_icons[$j] = creativ_preschool_get_option( 'our_services_icon_'.$j ); ?>        
                
                <article>
                    <div class="service-item-wrapper">
                        <?php if( !empty( $our_services_icons[$j] ) ) : ?>
                            <div class="icon-container">
                                <a href="<?php the_permalink();?>"><i class="<?php echo esc_attr( $our_services_icons[$j] )?>"></i></a>
                            </div><!-- .icon-container -->
                        <?php endif; ?>
                        
                        <header class="entry-header">
                            <h2 class="entry-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
                        </header>
				

                        <div class="entry-content">
                            <?php
                                $excerpt = creativ_preschool_the_excerpt( 20 );
                                echo wp_kses_post( wpautop( $excerpt ) );
                            ?>
                        </div><!-- .entry-content -->
                    </div><!-- .service-item-wrapper -->
                </article>

              <?php endwhile;?>
              <?php wp_reset_postdata(); ?>
            <?php endif;?>
        </div><!-- .section-content -->

    <?php else: ?>
        <div class="section-content clear col-3">
            <?php $args = array (
                'post_type'     => 'post',
                'post_per_page' => count( $our_services_posts ),
                'post__in'      => $our_services_posts,
                'orderby'       =>'post__in',
                'ignore_sticky_posts' => true,
            );   
            $loop = new WP_Query($args);                        
            if ( $loop->have_posts() ) :
            $i=-1; $j=0;  
                while ($loop->have_posts()) : $loop->the_post(); $i++; $j++;
                $our_services_icons[$j] = creativ_preschool_get_option( 'our_services_icon_'.$j ); ?>        
                
                <article>
                    <div class="service-item-wrapper">
                        <?php if( !empty( $our_services_icons[$j] ) ) : ?>
                            <div class="icon-container">
                                <a href="<?php the_permalink();?>"><i class="<?php echo esc_attr( $our_services_icons[$j] )?>"></i></a>
                            </div><!-- .icon-container -->
                        <?php endif; ?>
                        
                        <header class="entry-header">
                            <h2 class="entry-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
                        </header>
						
						<div class="anchor"><a href="#add">
					</a></div>

                        <div class="entry-content">
                            <?php
                                $excerpt = creativ_preschool_the_excerpt( 20 );
                                echo wp_kses_post( wpautop( $excerpt ) );
                            ?>
                        </div><!-- .entry-content -->
                    </div><!-- .service-item-wrapper -->
                </article>

              <?php endwhile;?>
              <?php wp_reset_postdata(); ?>
            <?php endif;?>
	<a name="add"></a>
        </div><!-- .section-content -->
    <?php endif;

			