<?php 
/**
 * Template part for displaying About Section
 *
 *@package Creativ Preschool
 */
    $our_courses_section_title    = creativ_preschool_get_option( 'our_courses_section_title' );
    $cs_content_type              = creativ_preschool_get_option( 'cs_content_type' );
    $number_of_cs_items           = creativ_preschool_get_option( 'number_of_cs_items' );

    if( $cs_content_type == 'cs_page' ) :
        for( $i=1; $i<=$number_of_cs_items; $i++ ) :
            $our_courses_posts[] = creativ_preschool_get_option( 'our_courses_page_'.$i );
        endfor;  
    elseif( $cs_content_type == 'cs_post' ) :
        for( $i=1; $i<=$number_of_cs_items; $i++ ) :
            $our_courses_posts[] = creativ_preschool_get_option( 'our_courses_post_'.$i );
        endfor;
    endif;
    ?>

    <?php if( !empty($our_courses_section_title) ):?>
        <div class="section-header">
            <div class="wrapper">
                <h2 class="section-title"><?php echo esc_html($our_courses_section_title);?></h2>
            </div><!-- .wrapper -->
        </div><!-- .section-header -->
    <?php endif;?>

    <?php if( $cs_content_type == 'cs_page' ) : ?>
        <div class="section-content page-section clear">
            <div class="wrapper courses-slider" data-slick='{"slidesToShow": 3, "slidesToScroll": 1, "infinite": false, "speed": 1200, "dots": true, "arrows":false, "autoplay": false, "fade": false }'>
                <?php $args = array (
                    'post_type'     => 'page',
                    'post_per_page' => count( $our_courses_posts ),
                    'post__in'      => $our_courses_posts,
                    'orderby'       =>'post__in',
                );        
                $loop = new WP_Query($args);                        
                if ( $loop->have_posts() ) :
                $i=-1;  
                    while ($loop->have_posts()) : $loop->the_post(); $i++;?>
                    
                    <article>
                        <div class="featured-course-wrapper">
                            <?php if ( has_post_thumbnail() ) : ?>
                                <div class="featured-image">
                                    <a href="<?php the_permalink();?>"><img src="<?php the_post_thumbnail_url(); ?>"/></a>
                                </div><!-- .featured-image -->
                            <?php endif; ?>

                            <div class="entry-container">
                                <header class="entry-header">
                                    <h2 class="entry-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
                                </header>

                                <div class="entry-content">
                                    <?php
                                        $excerpt = creativ_preschool_the_excerpt( 25 );
                                        echo wp_kses_post( wpautop( $excerpt ) );
                                    ?>
                                </div><!-- .entry-content -->
                            </div><!-- .entry-container -->
                        </div><!-- .featured-course-wrapper -->
                    </article>

                  <?php endwhile;?>
                  <?php wp_reset_postdata(); ?>
                <?php endif;?>
            </div><!-- .wrapper -->
        </div><!-- .section-content -->
    
    <?php else: ?>
        <div class="section-content page-section clear">
            <div class="wrapper courses-slider" data-slick='{"slidesToShow": 3, "slidesToScroll": 1, "infinite": false, "speed": 1200, "dots": true, "arrows":false, "autoplay": false, "fade": false }'>
                <?php $args = array (
                    'post_type'     => 'post',
                    'post_per_page' => count( $our_courses_posts ),
                    'post__in'      => $our_courses_posts,
                    'orderby'       =>'post__in',
                    'ignore_sticky_posts' => true,
                );        
                $loop = new WP_Query($args);                        
                if ( $loop->have_posts() ) :
                $i=-1;  
                    while ($loop->have_posts()) : $loop->the_post(); $i++;?> 
				
				
                    
                    <article>			
                        <div class="featured-course-wrapper">
                            <?php if ( has_post_thumbnail() ) : ?>
                                <div class="featured-image">
                                    <a href="<?php the_permalink();?>"><img src="<?php the_post_thumbnail_url(); ?>"/></a>
                                </div><!-- .featured-image -->
                            <?php endif; ?>

                            <div class="entry-container">
								 <div class="Content<?php echo ($i);?>">		
                                <header class="entry-header">
                                    <h2 class="entry-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
                                </header>

                                <div class="entry-content">
								  							
									<div class="para1">
										
									   <p  style="text-align: left;margin-top: 20px;">Our body needs proper sleep and rest to heal and renew the energy to function properly. This healing is essential for physical and mental activity throughout the day. Pre-teens need 9 to 11 hours of daily sleep time.</p>
										</div>
									   
                         <div class="para2">   
									<p style="text-align: left;margin-top: 20px;">Hobby helps us keep busy and engaged. When you have an interest in some activities and enjoy doing them, you take healthy steps to improve your emotional wellbeing <br><br> 
										Find out more: 
										<a href="https://www.youngcarersnsw.org.au/community/cooks-corner/">cooking recipes</a>, 
										<a href="https://kidsgardening.org/?__cf_chl_captcha_tk__=8ebbe0790650452ebcec225c6bd752d1fac9ab2b-1617177465-0-AUN0sAl3Td5gJgdQXSVPsr6jAMQyuK5ZqcGgV9IR6ijC2_tmYptcc1kP6oRbt43oAPuTtPnueVTjQNeFPmfoBAQDzbHPytpAb9E6MKhu7_ZDvA-OnVVkyT-735J7OEbJLTMQyE-aO1Tldkibu1EmvRNQBlVeXpPcW-zE2szGONoWI3oBBYkFq6gJt-BC1eQxkKgPicv-e0_mLTzAQfqdWrxOcIrqosOQqB_YNwZ6LKnWOxYI_PPANbWURv58YbuCb6yC1HQWoE0D4DRnd8PCOAgfEWSJYW8yG0H9ZyPlaRQ8WRa-kYJZ4IIT2uER-uKjsRgNevU0rkklHClnGboPhspj6zUFP7265SGuEplcQGUOlOo-t0-3bZdl6cQn1XM_YM8cHp8QFqMxlEjV4tN0xeJJ3G-xShzK6IdxqCqIVaidC3rY-UqZRGyaD8lPG2XGzCSWxiqEbNK6OTbkcw9aHybsEgb0PdAn7SKKfmCGf98YwmOE49hULoH4s7QRoydpeVw2uvyX-R7eBlktFkRNfSF7cBxKuS4HIVNBlOMYvgz_Z3HDqiWe0Xy6RdujUGUPZInNQHdso_f4hpptdnaHOyc">kids gardening</a>,
										<a href="http://scrapcoloring.com/">colouring</a></p>
									   </div>
									<div class="para3">
										<p style="text-align: left;margin-top: 20px;">When you are exposed to sunlight, it causes the release of ‘happiness hormones’.When you remain physically active and exercise daily, your blood flow improves in your entire body and makes you feel more energetic, fresh, and mentally active.</p></div>
                                </div><!-- .entry-content -->
                            </div><!-- .entry-container -->
							</div>
                        </div><!-- .featured-course-wrapper -->						
                    </article>

                  <?php endwhile;?>
                  <?php wp_reset_postdata(); ?>
                <?php endif;?>
            </div><!-- .wrapper -->
        </div><!-- .section-content -->
    <?php endif;

