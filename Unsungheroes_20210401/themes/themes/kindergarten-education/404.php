<?php
/**
 * The template for displaying 404 pages (Not Found).
 * @package Kindergarten Education
 */
get_header(); ?>

<main id="skip_content" role="main" class="content_box">
    <div class="container">
        <div class="page-content text-center">
            <h1><?php echo esc_html(get_theme_mod('kindergarten_education_page_not_found_heading',__('404 Not Found','kindergarten-education')));?></h1>
            <p class="text-404 mt-3"><?php echo esc_html(get_theme_mod('kindergarten_education_page_not_found_text',__('Looks like you have taken a wrong turn. Dont worry it happens to the best of us.','kindergarten-education')));?></p>
            <?php if( get_theme_mod('kindergarten_education_page_not_found_button','Back to Home Page') != ''){ ?>
                <div class="read-moresec my-5">
                    <a href="<?php echo esc_url( home_url() ); ?>" class="button mt-3 py-3 px-5"><?php echo esc_html(get_theme_mod('kindergarten_education_page_not_found_button',__('Back to Home Page','kindergarten-education')));?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('kindergarten_education_page_not_found_button',__('Back to Home Page','kindergarten-education')));?></span></a>
                </div>
            <?php } ?>
            <div class="clearfix"></div>
        </div>
    </div>
</main>

<?php get_footer(); ?>