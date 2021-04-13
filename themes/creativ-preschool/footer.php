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


<footer id="colophon" class="site-footer" role="contentinfo">    <img src="https://unsungheroes.tk/wp-content/themes/creativ-preschool/assets/images/top-cloud-bg.png">       
    <div class="site-info">
                <div class="wrapper">
					<span class="copy-right"> Copyright © 2021 UnsungHeroes</span>
        </div><!-- .wrapper --> 
    </div> <!-- .site-info -->
    
  		</footer>

</body>  
</html>