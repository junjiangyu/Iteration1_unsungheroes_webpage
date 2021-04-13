<?php
/**
 * Template part for displaying custom post type posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package TP Education
 * @since 1.0
 */

function kidspress_single_content(){
?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="blog-post-wrap">
			<?php
			if ( has_post_thumbnail() ) :
				the_post_thumbnail( 'large', array( 'alt' => the_title_attribute( array( 'echo' => false ) ) ) );
			endif; ?>
			<header class="entry-header">
				<?php
				if ( is_single() ) :
					the_title( '<h1 class="entry-title tp-education-header">', '</h1>' );
				else :
					the_title( '<h2 class="entry-title tp-education-header"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				endif;
				?>

				<p class="entry-meta">
					<?php 
					// load post meta
					tp_education_posted_on(); 
					?>
				</p><!-- .entry-meta -->
			</header>

			<div class="entry-container">
				<?php
				$post_type = get_query_var( 'post_type' );
				switch ( $post_type ) {
					case 'tp-class': ?>
						<ul class="tp-education-meta entry-meta">
							<li><?php tp_class_age_group(); ?></li>
							<li><?php tp_class_size(); ?></li>
							<li><?php tp_class_cost();  ?></li>
							<li><?php tp_class_period(); ?></li>
						</ul><!-- .tp-education-meta -->
					<?php break;

					case 'tp-course': ?>
							<ul class="tp-education-meta entry-meta">
								<li><?php tp_course_type(); ?></li>
								<li><?php tp_course_duration(); ?></li>
								<li><?php tp_course_price(); ?></li>
								<li><?php tp_course_students(); ?></li>
								<li><?php tp_course_language(); ?></li>
								<li><?php tp_course_assessment(); ?></li>
								<li><?php tp_course_skills(); ?></li>
								<li><?php tp_course_professor(); ?></li>
								<li><?php tp_course_counselors(); ?></li>
							</ul><!-- .tp-education-meta -->
					<?php break;

					case 'tp-event': ?>
						<ul class="tp-education-meta entry-meta">
							<li><?php tp_event_date(); ?></li>
							<li><?php tp_event_start_time(); ?></li>
							<li><?php tp_event_end_time(); ?></li>
							<li><?php tp_event_location(); ?></li>
						</ul><!-- .tp-education-meta -->
					<?php break;

					case 'tp-excursion': ?>
						<ul class="tp-education-meta entry-meta">
							<li><?php tp_excursion_start_date(); ?></li>
							<li><?php tp_excursion_end_date(); ?></li>
							<li><?php tp_event_end_time(); ?></li>
							<li><?php tp_excursion_location(); ?></li>
						</ul><!-- .tp-education-meta -->
					<?php break;

					case 'tp-team': ?>
						<ul class="tp-education-meta entry-meta">
							<li><?php tp_team_designation(); ?></li>
							<li><?php tp_team_phone(); ?></li>
							<li><?php tp_team_skype(); ?></li>
							<li><?php tp_team_website(); ?></li>
							<li><?php tp_team_courses(); ?></li>
							<li><?php tp_team_social(); ?></li>
						</ul><!-- .tp-education-meta -->
					<?php break;

					case 'tp-affiliation': ?>
						<ul class="tp-education-meta entry-meta">
							<li><?php tp_affiliation_link(); ?></li>
						</ul><!-- .tp-education-meta -->
					<?php break;

					case 'tp-testimonial': ?>
						<ul class="tp-education-meta entry-meta">
							<li><?php tp_testimonial_rating(); ?></li>
							<li><?php tp_testimonial_designation(); ?></li>
							<li><?php tp_testimonial_social(); ?></li>
						</ul><!-- .tp-education-meta -->	
					<?php break;
					
					default:
					break;
				}

				?>

			<div class="entry-content">
				<?php
					the_content( sprintf(
						/* translators: %s: Name of current post. */
						wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'kidspress' ), array( 'span' => array( 'class' => array() ) ) ),
						the_title( '<span class="screen-reader-text">"', '"</span>', false )
					) );

					wp_link_pages( array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'kidspress' ),
						'after'  => '</div>',
					) );
				?>
			</div><!-- .entry-content -->
		</div> <!-- .entry-container -->

			<div class="about-author">
				<div class="author-image">
					<?php echo get_avatar( get_the_author_meta( 'ID' ), 200 ); ?>
				</div><!-- .author-image -->
				<div class="author-content">
					<div class="author-name clear">
						<h6><?php the_author_posts_link(); ?></h6>
					</div><!-- .author-name -->
					<?php 
					$author_description = get_the_author_meta( 'description');
					if( ! empty( $author_description ) ) : ?>
		        		<p><?php the_author_meta( 'description'); ?></p>
		        	<?php endif; ?>
				</div><!-- .author-content -->
			</div><!-- .about-author -->

		</div><!-- .blog-post-wrap -->
	</article><!-- #post-## -->
<?php
}
remove_action( 'tp_education_single_content_action', 'tp_education_single_content', 10 );
add_action( 'tp_education_single_content_action', 'kidspress_single_content', 10 );

// sidebar condition
add_filter( 'tp_education_is_sidebar_enable_filter', 'kidspress_is_sidebar_enable' );

// pagination
add_action( 'tp_education_pagination_action', 'kidspress_pagination' );
add_action( 'tp_education_post_pagination_action', 'kidspress_post_pagination' );

//related posts
function kidspress_related_posts_content() { ?>
<div id="related-posts" class="two-columns">

    <?php
    $id = get_the_id();
    $post_type = get_query_var( 'post_type' );
    $taxonomy = get_post_taxonomies( $id );
    $terms = wp_get_post_terms( $id, $taxonomy, array( 'fields' => 'ids' ) );
    $args = array(
            'post_type'       => $post_type,  
            'posts_per_page'  => 2,
            'terms'           => $terms,
            'post__not_in'    => array( $id )
        );
    $the_query = new WP_Query( $args );
    if ( $the_query->have_posts() ) :
    ?>
        <h2 class="related-post-title"><?php _e( 'Related posts', 'kidspress' ); ?></h2>
        <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
            <article id="post-3" class="column-wrapper blog-item has-post-thumbnail hentry">
                <div class="blog-post-wrap">
                    <a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true">
                        <?php  
                        if ( has_post_thumbnail() ) { 
                            the_post_thumbnail( 'post-thumbnail', array( 'alt' => the_title_attribute( array( 'echo' => false ) ) ) );
                        } else {
                            echo '<img src="' . TP_EDUCATION_URL_PATH . '/assets/images/demo-300x200.jpg" alt="' . the_title_attribute( array( 'echo' => false ) ) . '">';
                        }
                        ?>
                    </a><!-- .post-thumbnail -->

                    <header class="entry-header">
                        <h2 class="entry-title">
                            <a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
                        </h2>

                        <?php
                        $post_type = get_query_var( 'post_type' );
                        switch ( $post_type ) {
                            case 'tp-class': ?>
                                <ul class="tp-education-meta entry-meta">
                                    <li><?php tp_class_age_group(); ?></li>

                                    <li><?php tp_class_size(); ?></li>

                                    <li><?php tp_class_cost(); ?></li>   

                                    <li><?php tp_class_period(); ?></li>
                                </ul><!-- .tp-education-meta -->
                            <?php break;

                            case 'tp-course': ?>
                                <ul class="tp-education-meta entry-meta">
                                    <li><?php tp_course_type(); ?></li>

                                    <li><?php tp_course_duration(); ?></li>
                                </ul><!-- .tp-education-meta -->
                            <?php break;

                            case 'tp-event': ?>
                                <ul class="tp-education-meta entry-meta">
                                    <li><?php tp_event_date(); ?></li>

                                    <li><?php tp_event_start_time(); ?></li>

                                    <li><?php tp_event_end_time(); ?></li>

                                    <li><?php tp_event_location(); ?></li>
                                </ul><!-- .tp-education-meta -->
                            <?php break;

                            case 'tp-excursion': ?>
                                <ul class="tp-education-meta entry-meta">
                                    <li><?php tp_excursion_start_date(); ?></li>

                                 	<li><?php tp_excursion_end_date(); ?></li>

                                 	<li><?php tp_event_end_time(); ?></li>

                                 	<li><?php tp_excursion_location(); ?></li>
                                </ul><!-- .tp-education-meta -->
                            <?php break;

                            case 'tp-team': ?>
                                <ul class="tp-education-meta entry-meta">
                                    <li><?php tp_team_designation(); ?></li>
                                </ul><!-- .tp-education-meta -->
                            <?php break;

                            case 'tp-affiliation': ?>
                                <ul class="tp-education-meta entry-meta">
                                    <li><?php tp_affiliation_link(); ?></li>
                                </ul><!-- .tp-education-meta -->

                            <?php break;
                            
                            default:
                            break;
                        }

                        ?>

                    </header><!-- .entry-header -->

                </div><!-- .blog-post-wrap -->
            </article><!-- #post-1 -->
        <?php endwhile; 
        wp_reset_postdata();
    endif; ?>
</div><!-- .two-columns -->
<?php }
remove_action( 'tp_education_related_posts_content_action', 'tp_education_related_posts_content', 10 );

add_action( 'tp_education_related_posts_content_action', 'kidspress_related_posts_content', 10 );