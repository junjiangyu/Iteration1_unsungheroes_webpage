<?php
/**
 * Custom Kids Meta Details Widget
 *
 * @package Kidspress
 * @since Kidspress 1.0
 */

if ( ! class_exists( 'Kidspress_Kids_Meta_Details_Widget' ) ) :

	/**
	 * Kids Meta Details widget.
	 */
	class Kidspress_Kids_Meta_Details_Widget extends WP_Widget {

		/**
		 * Register widget with WordPress.
		 */
		public function __construct() {
			$widget_ops = array(
				'classname'   => 'kids_meta_details',
				'description' => esc_html__( 'An widget to pick icon heading and details in footer.', 'kidspress' ),
			);
			parent::__construct( 'kids_meta_details', esc_html__('TP: Kids Meta Details','kidspress'), $widget_ops );
		}

		/**
		 * Front-end display of widget.
		 *
		 * @see WP_Widget::widget()
		 *
		 * @param array $args     Widget arguments.
		 * @param array $instance Saved values from database.
		 */
		public function widget( $args, $instance ) {
			extract( $args , EXTR_SKIP );

			$tpiw_title   			= ( ! empty( $instance['title'] ) ) ? ( $instance['title'] ) : '';
            $tpiw_title   			= apply_filters( 'widget_title', $tpiw_title , $instance, $this->id_base );
            $tpiw_description   	= ( ! empty( $instance['description'] ) ) ? ( $instance['description'] ) : '';
            $tpiw_icon   			= ( ! empty( $instance['icon'] ) ) ? ( $instance['icon'] ) : '';

			echo $args['before_widget'];
				if ( ! empty( $tpiw_title ) || ! empty ( $tpiw_icon )) {
					echo $args['before_title'] . ' <i class="fa '. esc_attr( $tpiw_icon ) . '"></i>' . esc_html( $tpiw_title ) . $args['after_title'];
				}
		?>
               <div class="textwidget">
                  <?php echo wp_kses_post( $tpiw_description ); ?>
               </div><!-- .textwidget -->
        <?php
			echo $args['after_widget'];
		}

		/**
		 * Back-end widget form.
		 *
		 * @see WP_Widget::form()
		 *
		 * @param array $instance Previously saved values from database.
		 */
		public function form( $instance ) {
			// Defaults.
	        $instance = wp_parse_args( (array) $instance, array(
				'title'         	=>  '',
				'description'       =>  '',
				'icon'           	=>  '',
	      	) );

	        $id = uniqid();	
			$tpiw_title        		= htmlspecialchars( $instance['title'] );
			$tpiw_description       = ! empty ( $instance['description'] ) ? $instance['description'] : '' ;
			$tpiw_icon           	= htmlspecialchars( $instance['icon'] );
			?>

			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title :', 'kidspress' ); ?></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $tpiw_title ); ?>">
			</p>

			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'description' ) ); ?>"><?php esc_html_e( 'Description :', 'kidspress' ); ?></label>
				<textarea class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'description' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'description' ) ); ?>"  value="<?php echo esc_attr( $tpiw_description ); ?>"> <?php echo wp_kses_post( $tpiw_description ); ?> </textarea>
			</p>

			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'icon' ) ); ?>"><?php esc_html_e( 'Pick Icon :', 'kidspress' ); ?></label>
                <input id="<?php echo esc_attr( $this->get_field_id( 'icon' ) . '-' . esc_attr( $id ) ); ?>" placeholder="<?php esc_attr_e( 'Click here to select icon', 'kidspress' ); ?>" class="widefat kidspress-icon-picker" name="<?php echo esc_attr( $this->get_field_name( 'icon' ) ); ?>" value="<?php echo esc_attr( $tpiw_icon ); ?>" />
			</p>


		<?php
		}

		/**
		 * Sanitize widget form values as they are saved.
		 *
		 * @see WP_Widget::update()
		 *
		 * @param array $new_instance Values just sent to be saved.
		 * @param array $old_instance Previously saved values from database.
		 *
		 * @return array Updated safe values to be saved.
		 */
		public function update( $new_instance, $old_instance ) {
			$instance               	= $old_instance;
			$instance['title']      	= ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ): '';
			$instance['description']	= ( ! empty( $new_instance['description'] ) ) ? wp_kses_post( $new_instance['description'] ): '';
			$instance['icon']         	= ( ! empty( $new_instance['icon'] ) ) ? sanitize_text_field( $new_instance['icon'] ): '';

			return $instance;
		}

	} // class tp_kids_meta_details_widget
endif;
