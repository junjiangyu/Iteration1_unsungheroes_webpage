<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Creativ Preschool
 */

/**
 *
 * @hooked creativ_preschool_footer_start
 */
do_action( 'creativ_preschool_action_before_footer' );

/**
 * Hooked - creativ_preschool_footer_top_section -10
 * Hooked - creativ_preschool_footer_section -20
 */

/**
 * Hooked - creativ_preschool_footer_end. 
 */
do_action( 'creativ_preschool_action_after_footer' );

wp_footer(); ?>

<head>

</head>


<footer id="colophon" class="site-footer" role="contentinfo">    <img src="https://unsungheroes.tk/wp-content/themes/creativ-preschool/assets/images/top-cloud-bg.png">       
    <div class="site-info">
                <div class="wrapper">
					
					
				   <footer style="text-align:center;">
            <ul class="list-inline" >
               <ul class="list-inline-item" style="display:inline;"><a href="https://unsungheroes.tk/" >HOME</a></ul>
               <ul class="list-inline-item" style="display:inline;"><a href="https://unsungheroes.tk/lets-garden/">LET'S GARDEN</a></ul>
				    <ul class="list-inline-item" style="display:inline;"><a href="https://unsungheroes.tk/dessert/">LET'S COOK</a></ul>
				    <ul class="list-inline-item" style="display:inline;"><a href="https://unsungheroes.tk/sport/">LET'S EXERCISE</a></ul>
				    <ul class="list-inline-item" style="display:inline;"><a href="https://unsungheroes.tk/arts/">LET'S ART</a></ul>
				     <ul class="list-inline-item" style="display:inline;"><a href="https://unsungheroes.tk/lets-find-your-animal-hero/">LET'S FIND YOUR ANIMAL HERO</a></ul>
            </ul>
            <span class="copy-right" style="margin-top:30px;"> Copyright © 2021 UnsungHeroes</span>
        </footer>
       					
        </div><!-- .wrapper --> 
    </div> <!-- .site-info -->
    
  		</footer>

<?php do_action('wp_mm_body_prior_close_hook'); ?>
</body>  
</html>