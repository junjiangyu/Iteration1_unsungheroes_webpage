<?php
/**
 * Courses section
 *
 * This is the template for the content of course section
 *
 * @package Theme Palace
 * @subpackage Kidspress
 * @since Kidspress 1.0.0
 */
if ( ! function_exists( 'kidspress_add_course_section' ) ) :
    /**
    * Add course section
    *
    *@since Kidspress 1.0.0
    */
    function kidspress_add_course_section() {
    	$options = kidspress_get_theme_options();
        // Check if course is enabled on frontpage
        $course_enable = apply_filters( 'kidspress_section_status', true, 'course_section_enable' );

        if ( true !== $course_enable ) {
            return false;
        }
        // Get course section details
        $section_details = array();
        $section_details = apply_filters( 'kidspress_filter_course_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        // Render course section now.
        kidspress_render_course_section( $section_details );
    }
endif;

if ( ! function_exists( 'kidspress_get_course_section_details' ) ) :
    /**
    * course section details.
    *
    * @since Kidspress 1.0.0
    * @param array $input course section details.
    */
    function kidspress_get_course_section_details( $input ) {
        $options = kidspress_get_theme_options();

        // Content type.
        $course_content_type  = $options['course_content_type'];
        
        $content = array();

        switch ( $course_content_type ) {
        	
            case 'post':
                $post_ids = array();

                for ( $i = 1; $i <= 3; $i++ ) {
                    if ( ! empty( $options['course_content_post_' . $i] ) ) :
                        $post_ids[] = $options['course_content_post_' . $i];
                    endif;
                }
                
                $args = array(
                    'post_type'         => 'post',
                    'post__in'          => ( array ) $post_ids,
                    'posts_per_page'    => 3,
                    'orderby'           => 'post__in',
                    'ignore_sticky_posts'   => true,
                    );                    
            break;

            case 'course':
                if ( ! class_exists( 'TP_Education' ) ) {
                    return;
                }
                $course_ids = array();

                for ( $i = 1; $i <= 3; $i++ ) {
                    if ( ! empty( $options['course_content_course_' . $i] ) ) :
                        $course_ids[] = $options['course_content_course_' . $i];
                    endif;
                }

               $args = array(
                    'post_type'         => 'tp-course',
                    'post__in'          => ( array ) $course_ids,
                    'posts_per_page'    => 3,
                    'orderby'           => 'post__in',
                    'ignore_sticky_posts'   => true,
                    ); 

            break;

            default:
            break;
        }

            // Run The Loop.
            $query = new WP_Query( $args );
            if ( $query->have_posts() ) : 
                $i = 0;
                while ( $query->have_posts() ) : $query->the_post();
                    $page_post['id']        = get_the_id();
                    $page_post['title']     = get_the_title();
                    $page_post['url']       = get_the_permalink();
                    $page_post['excerpt']   = kidspress_trim_content( 20 );
                    $page_post['author']    = kidspress_author();
                    $page_post['image']     = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'post-thumbnail' ) : get_template_directory_uri() . '/assets/uploads/no-featured-image-590x650.jpg';

                    // Push to the main array.
                    array_push( $content, $page_post );
                    $i++;
                endwhile;
            endif;
            wp_reset_postdata();

            
        if ( ! empty( $content ) ) {
            $input = $content;
        }
        return $input;
    }
endif;
// course section content details.
add_filter( 'kidspress_filter_course_section_details', 'kidspress_get_course_section_details' );


if ( ! function_exists( 'kidspress_render_course_section' ) ) :
  /**
   * Start course section
   *
   * @return string course content
   * @since Kidspress 1.0.0
   *
   */
   function kidspress_render_course_section( $content_details = array() ) {
        $options = kidspress_get_theme_options();
        $course_content_type  = $options['course_content_type'];

        if ( empty( $content_details ) ) {
            return;
        } ?>

         <div id="our-courses" class="relative page-section" style="background-image: url('<?php echo $options['course_section_bg_image_enable'] ? esc_url(get_template_directory_uri() . '/assets/uploads/blue-cloud-bg.png') : ''; ?>')">
                <div class="wrapper">
                    <?php if ( ! empty( $options['course_title'] ) ) : ?>
                        <div class="section-header">
                            <h2 class="section-title"><?php echo esc_html( $options['course_title'] ); ?></h2>
                        </div><!-- .section-header -->
                    <?php endif; ?>


                    <div class="section-content clear col-3">
                        <?php foreach ( $content_details as $content ) : ?>
                            <article>
                                <div class="course-item-wrapper">
                                    <div class="featured-image" style="background-image: url('<?php echo esc_url( $content['image']); ?>');">

                                        <?php if ( in_array( $course_content_type, array( 'course' ) ) ) : ?>
                                            <div class="tp-education-meta">
                                                <div class="author-meta">
                                                    <?php  
                                                        $professor = get_post_meta( $content['id'], 'tp_course_professor_value', true );
                                                        if ( has_post_thumbnail( $professor ) ) :
                                                        ?>
                                                            <div class="image">

                                                                <a href="<?php echo esc_attr( $content['id'] ); ?>"><img src="<?php echo esc_url( get_the_post_thumbnail_url( $professor, 'thumbnail' ) ); ?>" alt="<?php the_title_attribute( array( 'post' => $professor ) ) ?>"></a>
                                                            </div><!-- .image -->
                                                     <?php endif; ?>

                                                    <div class="user">
                                                    <?php tp_course_professor( $content['id'] ); ?>
                                                    </div><!-- .user -->
                                                </div><!-- .author-meta -->

                                                <div class="price-meta">
                                                    <?php tp_course_price( $content['id'] ); ?>
                                                    <span class="tp-class-period"><?php esc_html_e( 'Per/Month', 'kidspress' ) ?></span>                                                 
                                                </div><!-- .price -->
                                            </div><!-- .tp-education-meta -->
                                        <?php endif; ?>
                                    </div><!-- .featured-image -->

                                    <div class="entry-container">
                                        <div class="entry-meta">
                                            <?php if( in_array( $course_content_type, array( 'course' ) ) ) : ?>
                                                <span class="cat-links">
                                                    <?php $course_cats = get_the_terms( $content['id'], 'tp-course-category' );
                                                    ?>
                                                        <ul class="post-categories">
                                                            <?php foreach ( $course_cats as $cats ) : ?>
                                                                <li><a href="<?php echo esc_url( get_term_link( $cats->term_id ) ); ?>"> <?php echo esc_html( $cats->name ); ?> </a></li>
                                                            <?php endforeach; ?>
                                                        </ul>                                   
                                                </span><!-- .cat-links -->
                                            <?php endif; ?>
                                        </div><!-- .entry-meta -->

                                        <header class="entry-header">
                                            <h2 class="entry-title"><a href="<?php echo esc_url( $content['url'] ); ?>"><?php echo esc_html( $content['title'] ); ?></a></h2>
                                        </header>

                                        <div class="entry-content">
                                            <p><?php echo esc_html( $content['excerpt'] ); ?></p>
                                        </div><!-- .entry-content -->
                                    </div><!-- .entry-container -->
                                </div><!-- .course-item-wrapper -->
                            </article>
                        <?php endforeach; ?>
                    </div><!-- .section-content -->
                </div><!-- .wrapper -->
            </div><!-- #our-courses -->

    <?php }
endif;