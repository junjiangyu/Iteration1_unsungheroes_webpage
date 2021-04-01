<?php
/**
 * Subscription section
 *
 * This is the template for the content of subscription section
 *
 * @package Theme Palace
 * @subpackage Kidspress
 * @since Kidspress 1.0.0
 */
if ( ! function_exists( 'kidspress_add_subscription_section' ) ) :
    /**
    * Add subscription section
    *
    *@since Kidspress 1.0.0
    */
    function kidspress_add_subscription_section() {
        $options = kidspress_get_theme_options();
        // Check if subscription is enabled on frontpage
        $subscription_enable = apply_filters( 'kidspress_section_status', true, 'subscription_section_enable' );

        if ( true !== $subscription_enable ) {
            return false;
        }

        // Render subscription section now.
        kidspress_render_subscription_section();
    }
endif;

if ( ! function_exists( 'kidspress_render_subscription_section' ) ) :
  /**
   * Start subscription section
   *
   * @return string subscription content
   * @since Kidspress 1.0.0
   *
   */
   function kidspress_render_subscription_section() {
        if ( ! class_exists( 'Jetpack' ) ) {
            return;
        } elseif ( class_exists( 'Jetpack' ) ) {
            if ( ! Jetpack::is_module_active( 'subscriptions' ) )
                return;
        }

        $options = kidspress_get_theme_options();
        $btn_label = ! empty( $options['subscription_btn_title'] ) ? $options['subscription_btn_title'] : esc_html__( 'Subscribe Now', 'kidspress' );

        ?>

        <div id="subscribe-us" class="relative page-section same-background">
                <div class="wrapper">
                    <?php if ( ! empty( $options['subscription_title'] ) ) : ?>
                        <div class="section-header">
                            <h2 class="section-title"><?php echo esc_html( $options['subscription_title'] ); ?></h2>
                        </div><!-- .section-header -->
                    <?php endif; 

                    $subscription_shortcode = '[jetpack_subscription_form title="" subscribe_text="" subscribe_button="' . esc_html( $btn_label ) . '" show_subscribers_total="0"]';
                        echo do_shortcode( wp_kses_post( $subscription_shortcode ) );
                    ?>
                </div><!-- .wrapper -->
            </div><!-- #subscribe-us -->

    <?php }
endif;
