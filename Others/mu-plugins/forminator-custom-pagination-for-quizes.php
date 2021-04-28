<?php
/**
 * Plugin Name: [Forminator] - Add simple pagination for Quiz
 * Description: [Forminator] - Add simple pagination for Quiz
 * Jira: browse/FOR-369
 * Author: Thobk @ WPMUDEV
 * Author URI: https://premium.wpmudev.org
 * License: GPLv2 or later
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
} elseif ( defined( 'WP_CLI' ) && WP_CLI ) {
	return;
}

add_action( 'after_setup_theme', 'wpmudev_forminator_custom_pagination_for_quizes_func', 100 );

function wpmudev_forminator_custom_pagination_for_quizes_func() {
	if ( defined('FORMINATOR_PRO') && class_exists( 'Forminator' )  ) {

		class WPMUDEV_FM_Pagination_Quizes{
			private $number_questions_per_page = 1;// Enter number questions per page, default is 5.
			private $button_prev = 'Prev';// Change the label for Prev button.
			private $button_next = 'Next';// Change the label for Next button.
			private $include_form_ids = [];
			private $exclude_form_ids = [];//enter list exclude form ids, e.g: [234,456]

			private $current_page = 1;
			private $id_item = 0;
			private $message = 'Please answer the questions!';

			public function __construct(){

				add_action( 'forminator_field_markup', array( $this, 'separated_the_page' ), 10, 3 );
			}

			public function separated_the_page( $html, $field, $quiz ){
				if( 'forminator_quizzes' !== $quiz->model->get_post_type() ){
					return $html;
				}

				if( ! empty( $this->include_form_ids ) ){
					if( ! in_array( $quiz->model->id, $this->include_form_ids ) ){
						return $html;
					}
				}elseif( ! empty( $this->exclude_form_ids ) && in_array( $quiz->model->id, $this->exclude_form_ids ) ){
					return $html;
				}

				static $total;
				if( ! $total ){
					$total = count( $quiz->get_fields() );
				}

				if( $total <= $this->number_questions_per_page ){
					return $html;
				}

				$this->id_item ++;
				if( $total > $this->number_questions_per_page && ( $this->number_questions_per_page === 1 || 1 === $this->id_item % $this->number_questions_per_page ) ){
					$html = sprintf('<div class="wpmudev-fm-page fm-page-%d" data-page-id="%d">', $this->current_page, $this->current_page) . $html;
				}

				if( $this->id_item === 1 ){
					$html = '
					<style>
						#wpmudev-fm-page-wrapper .wpmudev-fm-page{
							display:none;
						}
						#wpmudev-fm-page-wrapper .wpmudev-fm-page.fm-page-1{
							display:block;
						}
						#wpmudev-fm-page-wrapper ~ .forminator-quiz--result{
							border-top:none!important;
						}
						#wpmudev-fm-page-wrapper .forminator-last{
							padding-bottom:30px;
							margin-bottom:30px;
							border-bottom:1px solid rgba(0,0,0,0.12);
						}
						#wpmudev-fm-page-wrapper .wpmudev-pagi-nav{
							display: flex;
							justify-content: space-between;
						}
						#wpmudev-fm-page-wrapper .wpmudev-fm-btn.disabled{
							opacity:0;
						}
						#wpmudev-fm-page-wrapper .wpmudev-fm-btn:disabled{
							background:#ccc!important;
							color:#fff!important;
							cursor: default;
						}
						#wpmudev-fm-valid-message{
							color:red;
							display:none;
							margin-top:30px;
						}
						.wpmudev-quiz-inc-pagination .forminator-button:disabled{
							display:none!important;
						}
					</style>
					<div id="wpmudev-fm-page-wrapper">'. $html;
				}


				if( $this->id_item === $total || 0 === $this->id_item % $this->number_questions_per_page ){
					$html .= '</div>';
					if( $this->id_item === $total ){
						// pagination nav
						$html .= '<div class="wpmudev-pagi-nav">';
						$html .= sprintf('<a class="button wpmudev-fm-btn wpmudev-fm-prev disabled"><img src="https://unsungheroes.tk/wp-content/uploads/2021/04/left.png" style="width:50px"></a>', $this->button_prev );
						$html .= sprintf('<a class="button wpmudev-fm-btn wpmudev-fm-next"><img src="https://unsungheroes.tk/wp-content/uploads/2021/04/right.png" style="width:50px"></a>', $this->button_next );
						$html .= '</div>';

						$html .= '</div>
						<div id="wpmudev-fm-valid-message"><h4 style="color:red;text-align:center;">'. esc_html( $this->message ) .'</h4></div>
						<script>
							(function($){
								var _total_page = '. $this->current_page .',
										_
								$(function(){
									var _current_page = 1,
											_page_wrapper = $("#wpmudev-fm-page-wrapper"),
											_message_el = $("#wpmudev-fm-valid-message"),
											_form = _page_wrapper.closest(".forminator-quiz");
									function back_to_top(){
										$("html,body").stop().animate({
												scrollTop: _page_wrapper.offset().top - 40
											});
									}
									_page_wrapper.on("click", ".wpmudev-fm-btn", function(e){
										e.preventDefault();
										if( $(this).hasClass("disabled") ){
											return;
										}
										let _current_page_el = _page_wrapper.find(".fm-page-"+ _current_page);
										if( _current_page_el.length ){
											if( $(this).hasClass("wpmudev-fm-next") ){
												if( _current_page < _total_page ){
													if( _current_page_el.find(":checked").length === _current_page_el.children().length ){
														_current_page ++;
														_current_page_el.slideUp();
														_page_wrapper.find(".fm-page-"+ _current_page ).slideDown();
														if( _current_page === _total_page ){
															$(this).addClass("disabled");
														}
														$(this).prev(".disabled").removeClass("disabled");
														// back to top
														back_to_top();
														// hide message
														_message_el.hide();
													}else{
														_message_el.fadeIn(200);
													}
												}
											}else if( _current_page > 1 ){
												_current_page --;
												_current_page_el.slideUp();
												_page_wrapper.find(".fm-page-"+ _current_page ).slideDown();
												$(this).next(".disabled").removeClass("disabled");
												if( 1 === _current_page ){
													$(this).addClass("disabled");
												}
												// back to top
												back_to_top();
											}
										}
									});
									// add custom form class
									_page_wrapper.parent().addClass("wpmudev-quiz-inc-pagination");
								});
							})(window.jQuery);
						</script>
						';//close wrapper
					}else{
						$this->current_page ++;
					}
				}

				return $html;
			}


		}

		$run = new WPMUDEV_FM_Pagination_Quizes;
	}
}