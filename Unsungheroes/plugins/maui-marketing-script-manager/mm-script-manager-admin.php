<?php
if (!class_exists('MM_Script_Manager')) {

    class MM_Script_Manager {

        function __construct() {
            add_action('admin_enqueue_scripts', array($this, 'load_mm_script_manager_admin'));
            add_action('admin_menu', array($this, 'register_mm_script_manager_menu'));
            add_action('wp_head', array($this, 'mm_script_manager_add_head'));
            add_action('wp_footer', array($this, 'mm_script_manager_add_footer'));
            add_action('wp_mm_body_after_open_hook', array($this, 'mm_script_manager_add_body_after_open'));
            add_action('wp_mm_body_prior_close_hook', array($this, 'mm_script_manager_add_body_prior_close'));
            add_action("wp_ajax_mm_script_add_new_repeater_item", array($this, "mm_script_manager_add_new_repeater_item"));
            add_action("wp_ajax_nopriv_mm_script_add_new_repeater_item", array($this, "mm_script_manager_add_new_repeater_item"));
        }

        function load_mm_script_manager_admin() {
            wp_enqueue_script('jquery');
            wp_enqueue_script('jquery-ui-autocomplete');
            wp_register_style('mm_script_manager_admin_css', plugin_dir_url(__FILE__) . 'css/mm-script-manager-admin.css', false, '1.0.0');
            wp_enqueue_style('jquery-css-admin', plugin_dir_url(__FILE__) . 'css/jquery-ui.css', false, '1.0.0');
            wp_enqueue_style('mm_script_manager_admin_css');
            wp_enqueue_script('tagsinput_script', plugin_dir_url(__FILE__) . 'js/jquery.tagsinput.min.js', array('jquery'));
            wp_register_script('mm_script_manager_admin_js', plugin_dir_url(__FILE__) . 'js/mm-script-manager-admin.js', array('jquery', 'jquery-ui-autocomplete'));
            wp_localize_script('mm_script_manager_admin_js', 'mmAjax', array('ajaxurl' => admin_url('admin-ajax.php')));
            wp_enqueue_script('mm_script_manager_admin_js');
        }

        function register_mm_script_manager_menu() {
            add_menu_page('Maui Marketing Scripts, Tags & CSS', 'Maui Marketing Scripts, Tags & CSS', 'manage_options', 'mm-script-manager', array($this, 'mm_script_manager_menu_page'), plugin_dir_url(__FILE__) . '/images/h_t_icon.png', 101);
        }

        function mm_script_manager_add_new_repeater_item() {
            $current_id = $_POST['current_id'] + 1;
            ob_start();
            ?>
            <div class="repeater-item" data-repeater-item>
                <div class="column half">
                    <textarea type="text" name="form-item[<?php echo $current_id; ?>][item-code]" class="item-code" placeholder="Script Code" rows="13"></textarea>
                </div>
                <div class="list-mm">
                    <div class="column auto auto-left div-item-type">
                        <label for="item-type"><?php _e('Code Type', 'mm_script_manager'); ?></label>
                        <select class="item-type" name="form-item[<?php echo $current_id; ?>][item-type]">
                            <option value="css"><?php _e('CSS', 'mm_script_manager'); ?></option> 
                            <option value="js"><?php _e('JS', 'mm_script_manager'); ?></option> 
                            <option value="tag_html"><?php _e('TAG/HTML', 'mm_script_manager'); ?></option> 
                        </select>
                    </div>
                    <div class="column auto div-item-destination">
                        <label for="item-destination"><?php _e('Placement', 'mm_script_manager'); ?></label>
                        <select class="item-destination" name="form-item[<?php echo $current_id; ?>][item-destination]">
                            <option value="header"><?php _e('Header', 'mm_script_manager'); ?></option> 
                            <option value="body_open"><?php _e('After Body Tag', 'mm_script_manager'); ?></option> 
                            <option value="body_close"><?php _e('Before Body End Tag', 'mm_script_manager'); ?></option> 
                            <option value="footer"><?php _e('Footer', 'mm_script_manager'); ?></option> 
                        </select>
                    </div>  
                </div>
                <div class="column list-custom-post">
                    <div class="div-item-load">
                        <div>
                            <label for="item-load"><?php _e('Autoload Option', 'mm_script_manager'); ?></label>
                            <select class="item-load" name="form-item[<?php echo $current_id; ?>][item-load]">
                                <option value="all"><?php _e('Load by default on custom post types', 'mm_script_manager'); ?></option>
                                <option value="custom"><?php _e('Load On Specific Posts', 'mm_script_manager'); ?></option>
                            </select>
                        </div>
                        <div class="ip_tab hidden">
                            <input type="text" value="" name="form-item[<?php echo $current_id; ?>][post_type_custom_input]" id="post_type_custom_input_<?php echo $current_id; ?>" />
                        </div>
                    </div>
                    <div class="custom-post custom_post_types_list_<?php echo $current_id; ?> cpt ">
                        <p><?php _e('Include this script on selected post types:', 'mm_script_manager'); ?></p>
                        <ul class="custom_post_types_checkboxes">
                            <?php
                            $get_post_types = get_post_types('', 'objects');
                            if (!empty($get_post_types)) {
                                $i = 0;
                                foreach ($get_post_types as $post_type) {
                                    if ($post_type->name != 'revision' && $post_type->name != 'nav_menu_item') {
                                        ?>
                                        <li><input type="checkbox" id="post_type_selected_<?php echo $i; ?>" value="<?php echo $post_type->name ?>" name="form-item[<?php echo $current_id; ?>][post_type_selected_<?php echo $i; ?>]"><?php echo $post_type->labels->name ?> (<?php echo $post_type->name ?>)</li>
                        <?php $i++;
                    }
                }
            } ?>
                        </ul>

                    </div>
                    <div class="column auto ption cpt ">
                        <p><input type="checkbox" value="exclude" id="exclude_post_type_<?php echo $current_id; ?>" name="form-item[<?php echo $current_id; ?>][exclude_post_type]" /><?php _e('Exclude', 'mm_script_manager'); ?><p>
                            <input type="text" value="" name="form-item[<?php echo $current_id; ?>][exclude_post_type_input]" id="exclude_post_type_input_<?php echo $current_id; ?>" />
                        <hr style="margin: 15px 0 25px;float: left;width: 97%;">
                        <p><input type="checkbox" value="include" id="include_post_type_<?php echo $current_id; ?>" name="form-item[<?php echo $current_id; ?>][include_post_type]" /><?php _e('Include', 'mm_script_manager'); ?><p>
                            <input type="text" value="" name="form-item[<?php echo $current_id; ?>][include_post_type_input]" id="include_post_type_input_<?php echo $current_id; ?>" />
                    </div>

                </div>
                <input type="button" value="<?php _e('Delete', 'mm_script_manager'); ?>" class="btn_delete_repeater_item_<?php echo $current_id; ?> delete_item button-secondary" />
                <script type="text/javascript">
                    jQuery(document).ready(function($) {
                        $('.btn_delete_repeater_item_' + '<?php echo $current_id; ?>').on("click", function() {
                            var current_id = jQuery('.item_ID').val();
                            $(this).closest(".repeater-item").remove();
                            var id = parseInt(current_id) - 1;
                            jQuery('.item_ID').val(id);
                        });
                        jQuery('#exclude_post_type_input_' + '<?php echo $current_id; ?>').tagsInput({width: '100%', height: '40px', defaultText: 'Add a slug'});
                        jQuery('#include_post_type_input_' + '<?php echo $current_id; ?>').tagsInput({width: '100%', height: '40px', defaultText: 'Add a slug'});
                        jQuery('#post_type_custom_input_' + '<?php echo $current_id; ?>').tagsInput({width: '100%', height: '40px', defaultText: 'Add a slug'});

                        jQuery(".item-load").click(function() {
                            if (jQuery(this).val() == "all") {
                                jQuery(this).parents('.repeater-item').find('.cpt').removeClass('hidden');
                                jQuery(this).parents('.repeater-item').find('.ip_tab').addClass('hidden');
                            }
                            else {
                                jQuery(this).parents('.repeater-item').find('.cpt').addClass('hidden');
                                jQuery(this).parents('.repeater-item').find('.ip_tab').removeClass('hidden');
                            }
                        });

                        $('#exclude_post_type_input_<?php echo $current_id; ?>_tag').attr("disabled", true);
                        $("#exclude_post_type_<?php echo $current_id; ?>").click(function() {
                            if ($(this).is(':checked')) {
                                $('#exclude_post_type_input_<?php echo $current_id; ?>_tag').attr("disabled", false);
                            } else if ($(this).not(':checked')) {
                                $('#exclude_post_type_input_<?php echo $current_id; ?>_tag').attr("disabled", true);
                            }
                        });

                        $('#include_post_type_input_<?php echo $current_id; ?>_tag').attr("disabled", true);
                        $("#include_post_type_<?php echo $current_id; ?>").click(function() {
                            if ($(this).is(':checked')) {
                                $('#include_post_type_input_<?php echo $current_id; ?>_tag').attr("disabled", false);
                            } else if ($(this).not(':checked')) {
                                $('#include_post_type_input_<?php echo $current_id; ?>_tag').attr("disabled", true);
                            }
                        });

                        setTimeout(disabledInput, 0);
                        function disabledInput() {
                            if ($("#exclude_post_type_<?php echo $key; ?>").is(':checked')) {
                                $('#exclude_post_type_input_<?php echo $current_id; ?>_tag').attr("disabled", false);
                            }
                            if ($("#include_post_type_<?php echo $key; ?>").is(':checked')) {
                                $('#include_post_type_input_<?php echo $current_id; ?>_tag').attr("disabled", false);
                            }
                        }
                    });
                </script> 
            </div>
            <?php
            $html = ob_get_clean();
            echo $html;
            die();
        }

        function mm_script_manager_menu_page() {
            if (!current_user_can('manage_options')) {
                wp_die(__('You do not have sufficient permissions to access this page.', 'mm_script_manager'));
            }
            if (!get_option('mm_custom_save_script')) {
                update_option('mm_custom_save_script', '');
            }
            if (!get_option('add_script_to_body')) {
                update_option('add_script_to_body', 'yes');
                $status_script = get_option('add_script_to_body');
            }
            $post_types1 = get_post_types();
            $count_post_type = count($post_types1);
            $array_list = array();
            if(isset($_POST['form-item'])){
              $array_list =     $_POST['form-item'];
            }
            if (isset($_POST['form-item']) && $_POST['add_item_form_submit'] == 'form_submit') {
                $script = array();
                if (!empty($array_list)) {
                    foreach ($array_list as $key => $value) {
                        if (isset($value) && !empty($value)) {
                            $item_ID = $key;
                            $item_code = stripslashes($value['item-code']);
                            if (!empty($item_code)) {
                                $item_type = $value['item-type'];
                                $item_destination = $value['item-destination'];
                                $item_load = $value['item-load'];

                                if ($item_load == "custom") {
                                    if (!empty($value['post_type_custom_input'])) {
                                        $post_type_custom_input = $value['post_type_custom_input'];
                                    }
                                }
                                if ($item_load == "all") {
                                    $post_type = array();
                                    $i = 0;
                                    while ($value['post_type_selected_' . $i] || $i < $count_post_type) {
                                        if ($value['post_type_selected_' . $i]) {
                                            $post_type[] = $value['post_type_selected_' . $i];
                                        }
                                        $i++;
                                    }
                                    $exclude_post_type = $value['exclude_post_type'];
                                    $include_post_type = $value['include_post_type'];
                                    if ($exclude_post_type == "exclude") {
                                        $exclude_post_type_input = $value['exclude_post_type_input'];
                                    } else {
                                        $exclude_post_type_input = "";
                                    }
                                    if ($include_post_type == "include") {
                                        $include_post_type_input = $value['include_post_type_input'];
                                    } else {
                                        $include_post_type_input = "";
                                    }
                                }
                                $script[$item_ID] = array(
                                    'item-code' => $item_code,
                                    'item-type' => $item_type,
                                    'item-destination' => $item_destination,
                                    'item-load' => $item_load,
                                    'post_type_selected' => $post_type,
                                    'exclude_post_type' => $exclude_post_type,
                                    'include_post_type' => $include_post_type,
                                    'exclude_post_type_input' => $exclude_post_type_input,
                                    'include_post_type_input' => $include_post_type_input,
                                    'post_type_custom_input' => $post_type_custom_input
                                );
                            }
                        }
                    }
                    $script = serialize($script);
                    update_option('mm_custom_save_script', $script);
                    $list_item = unserialize(get_option('mm_custom_save_script'));
                    if (intval(count($list_item)) > 0) {
                        $current_id = intval(count($list_item));
                    } else {
                        $current_id = 0;
                    }
                    //
                }
            } else {
                if (get_option('mm_custom_save_script')) {
                    $list_item = unserialize(get_option('mm_custom_save_script'));
                }
                if (intval(count($list_item)) > 0) {
                    $current_id = intval(count($list_item));
                } else {
                    $current_id = 0;
                }
            }
            ?> 
            <div class="wrap">
                <div class="maui_logo center"> 
                    <a href="http://mauimarketing.com/"><img height="100" width="300" src="<?php echo plugin_dir_url(__FILE__); ?>/images/logo.png" alt="<?php _e('Maui Marketing', 'mm_script_manager') ?>" title="<?php _e('Maui Marketing', 'mm_script_manager') ?>"></a>
                </div>
                <hr>
                <h2><div id="icon-cm" class="icon32"><br></div><?php _e('Maui Marketing Scripts, Tags & CSS Manager', 'mm_script_manager'); ?></h2>
                <form class="repeater" method="post" action="" id="form-item-script">
                    <div id="wrap-repeater-item">
                        <?php
                        if (!empty($list_item)) {
                            foreach ($list_item as $key => $list) {
                                ?>
                                <div class="repeater-item">
                                    <div class="column half">
                                        <textarea type="text" name="form-item[<?php echo $key; ?>][item-code]" class="item-code" placeholder="Script Code" rows="13"><?php echo $list['item-code']; ?></textarea>
                                    </div>
                                    <div class="list-mm">
                                        <div class="column auto auto-left div-item-type">
                                            <label for="item-type"><?php _e('Code Type', 'mm_script_manager'); ?></label>
                                            <select class="item-type" name="form-item[<?php echo $key; ?>][item-type]">
                                                <option value="css" <?php if ($list['item-type'] == 'css') echo 'selected=selected'; ?>><?php _e('CSS', 'mm_script_manager'); ?></option> 
                                                <option value="js" <?php if ($list['item-type'] == 'js') echo 'selected=selected'; ?>><?php _e('JS', 'mm_script_manager'); ?></option> 
                                                <option value="tag_html" <?php if ($list['item-type'] == 'tag_html') echo 'selected=selected'; ?>><?php _e('TAG/HTML', 'mm_script_manager'); ?></option> 
                                            </select>
                                        </div>
                                        <div class="column auto div-item-destination">
                                            <label for="item-destination"><?php _e('Placement', 'mm_script_manager'); ?></label>
                                            <select class="item-destination" name="form-item[<?php echo $key; ?>][item-destination]">
                                                <option value="header" <?php if ($list['item-destination'] == 'header') echo 'selected=selected'; ?>><?php _e('Header', 'mm_script_manager'); ?></option> 
                                                <option value="body_open" <?php if ($list['item-destination'] == 'body_open') echo 'selected=selected'; ?>><?php _e('After Body Tag', 'mm_script_manager'); ?></option> 
                                                <option value="body_close" <?php if ($list['item-destination'] == 'body_close') echo 'selected=selected'; ?>><?php _e('Before Body End Tag', 'mm_script_manager'); ?></option> 
                                                <option value="footer" <?php if ($list['item-destination'] == 'footer') echo 'selected=selected'; ?>><?php _e('Footer', 'mm_script_manager'); ?></option> 
                                            </select>
                                        </div>  
                                    </div>
                                    <div class="column list-custom-post">
                                        <div class="div-item-load">
                                            <div>
                                                <label for="item-load"><?php _e('Autoload Option', 'mm_script_manager'); ?></label>
                                                <select class="item-load" name="form-item[<?php echo $key; ?>][item-load]">
                                                    <option value="all" <?php if ($list['item-load'] == 'all') echo 'selected=selected'; ?>><?php _e('Load by default on custom post types', 'mm_script_manager'); ?></option>
                                                    <option value="custom" <?php if ($list['item-load'] == 'custom') echo 'selected=selected'; ?>><?php _e('Load On Specific Posts', 'mm_script_manager'); ?></option>
                                                </select>
                                            </div>
                                            <div class="ip_tab <?php if ($list['item-load'] == 'all') echo "hidden"; ?>">
                                                <input type="text" value="<?php echo $list['post_type_custom_input'] ?>" name="form-item[<?php echo $key; ?>][post_type_custom_input]" id="post_type_custom_input_<?php echo $key; ?>" />
                                            </div>
                                        </div>
                                        <div class="custom-post custom_post_types_list_<?php echo $key; ?> cpt <?php if ($list['item-load'] != 'all') echo "hidden"; ?>">
                                            <p><?php _e('Include this script on selected post types:', 'mm_script_manager'); ?></p>
                                            <ul class="custom_post_types_checkboxes">
                                                <?php
                                                $get_post_types = get_post_types('', 'objects');
                                                if (!empty($get_post_types)) {
                                                    $i = 0;
                                                    foreach ($get_post_types as $post_type) {
                                                        if ($post_type->name != 'revision' && $post_type->name != 'nav_menu_item') {
                                                            ?>
                                                            <li><input type="checkbox" id="post_type_selected_<?php echo $i; ?>" value="<?php echo $post_type->name ?>" name="form-item[<?php echo $key; ?>][post_type_selected_<?php echo $i; ?>]" <?php if (in_array($post_type->name, $list['post_type_selected'])) echo 'checked'; ?>><?php echo $post_type->labels->name ?> (<?php echo $post_type->name ?>)</li>
                                                            <?php $i++;
                                                        }
                                                    }
                                                } ?>
                                            </ul>

                                        </div>
                                        <div class="column auto ption cpt <?php if ($list['item-load'] != 'all') echo "hidden"; ?>">
                                            <p><input type="checkbox" <?php if ($list['exclude_post_type_input'] != "") echo 'checked="checked"' ?> value="exclude" id="exclude_post_type_<?php echo $key; ?>" name="form-item[<?php echo $key; ?>][exclude_post_type]" /><?php _e('Exclude', 'mm_script_manager'); ?><p>
                                                <input type="text" value="<?php echo $list['exclude_post_type_input'] ?>" name="form-item[<?php echo $key; ?>][exclude_post_type_input]" id="exclude_post_type_input_<?php echo $key; ?>" />
                                            <hr style="margin: 15px 0 25px;float: left;width: 97%;">
                                            <p><input type="checkbox" <?php if ($list['include_post_type_input'] != "") echo 'checked="checked"' ?> value="include" id="include_post_type_<?php echo $key; ?>" name="form-item[<?php echo $key; ?>][include_post_type]" /><?php _e('Include', 'mm_script_manager'); ?><p>
                                                <input type="text" value="<?php echo $list['include_post_type_input'] ?>" name="form-item[<?php echo $key; ?>][include_post_type_input]" id="include_post_type_input_<?php echo $key; ?>" />
                                        </div>
                                    </div>
                                    <input type="button" value="<?php _e('Delete', 'mm_script_manager'); ?>" class="btn_delete_repeater_item_<?php echo $key; ?> delete_item button-secondary" />
                                    <script type="text/javascript">
                                        jQuery(document).ready(function($) {
                                            $('.btn_delete_repeater_item_' + '<?php echo $key; ?>').on("click", function() {
                                                var current_id = jQuery('.item_ID').val();
                                                $(this).closest(".repeater-item").remove();
                                                var id = parseInt(current_id) - 1;
                                                jQuery('.item_ID').val(id);
                                            });
                                            jQuery('#exclude_post_type_input_' + '<?php echo $key; ?>').tagsInput({width: '100%', height: '40px', defaultText: 'Add a slug'});
                                            jQuery('#include_post_type_input_' + '<?php echo $key; ?>').tagsInput({width: '100%', height: '40px', defaultText: 'Add a slug'});
                                            jQuery('#post_type_custom_input_' + '<?php echo $key; ?>').tagsInput({width: '100%', height: '40px', defaultText: 'Add a slug'});

                                            $('#exclude_post_type_input_<?php echo $key; ?>_tag').attr("disabled", true);
                                            $("#exclude_post_type_<?php echo $key; ?>").click(function() {
                                                if ($(this).is(':checked')) {
                                                    $('#exclude_post_type_input_<?php echo $key; ?>_tag').attr("disabled", false);
                                                } else if ($(this).not(':checked')) {
                                                    $('#exclude_post_type_input_<?php echo $key; ?>_tag').attr("disabled", true);
                                                }
                                            });

                                            $('#include_post_type_input_<?php echo $key; ?>_tag').attr("disabled", true);
                                            $("#include_post_type_<?php echo $key; ?>").click(function() {
                                                if ($(this).is(':checked')) {
                                                    $('#include_post_type_input_<?php echo $key; ?>_tag').attr("disabled", false);
                                                } else if ($(this).not(':checked')) {
                                                    $('#include_post_type_input_<?php echo $key; ?>_tag').attr("disabled", true);
                                                }
                                            });

                                            setTimeout(disabledInput, 0);
                                            function disabledInput() {
                                                if ($("#exclude_post_type_<?php echo $key; ?>").is(':checked')) {
                                                    $('#exclude_post_type_input_<?php echo $key; ?>_tag').attr("disabled", false);
                                                }
                                                if ($("#include_post_type_<?php echo $key; ?>").is(':checked')) {
                                                    $('#include_post_type_input_<?php echo $key; ?>_tag').attr("disabled", false);
                                                }
                                            }

                                        });
                                    </script> 
                                </div>
                                <?php
                            }
                        }
                        ?>
                        <div class="repeater-item" data-repeater-item>
                            <div class="column half">
                                <textarea type="text" name="form-item[<?php echo $current_id; ?>][item-code]" class="item-code" placeholder="Script Code" rows="13"></textarea>
                            </div>
                            <div class="list-mm">
                                <div class="column auto auto-left div-item-type">
                                    <label for="item-type"><?php _e('Code Type', 'mm_script_manager'); ?></label>
                                    <select class="item-type" name="form-item[<?php echo $current_id; ?>][item-type]">
                                        <option value="css"><?php _e('CSS', 'mm_script_manager'); ?></option> 
                                        <option value="js"><?php _e('JS', 'mm_script_manager'); ?></option> 
                                        <option value="tag_html"><?php _e('TAG/HTML', 'mm_script_manager'); ?></option> 
                                    </select>
                                </div>
                                <div class="column auto div-item-destination">
                                    <label for="item-destination"><?php _e('Placement', 'mm_script_manager'); ?></label>
                                    <select class="item-destination" name="form-item[<?php echo $current_id; ?>][item-destination]">
                                        <option value="header"><?php _e('Header', 'mm_script_manager'); ?></option> 
                                        <option value="body_open"><?php _e('After Body Tag', 'mm_script_manager'); ?></option> 
                                        <option value="body_close"><?php _e('Before Body End Tag', 'mm_script_manager'); ?></option> 
                                        <option value="footer"><?php _e('Footer', 'mm_script_manager'); ?></option> 
                                    </select>
                                </div>  
                            </div>
                            <div class="column list-custom-post">
                                <div class="div-item-load">
                                    <div>
                                        <label for="item-load"><?php _e('Autoload Option', 'mm_script_manager'); ?></label>
                                        <select class="item-load" name="form-item[<?php echo $current_id; ?>][item-load]">
                                            <option value="all"><?php _e('Load by default on custom post types', 'mm_script_manager'); ?></option>
                                            <option value="custom"><?php _e('Load On Specific Posts', 'mm_script_manager'); ?></option>
                                        </select>
                                    </div>
                                    <div class="ip_tab hidden">
                                        <input type="text" value="" name="form-item[<?php echo $current_id; ?>][post_type_custom_input]" id="post_type_custom_input_<?php echo $current_id; ?>" />
                                    </div>
                                </div>
                                <div class="custom-post custom_post_types_list_<?php echo $current_id; ?> cpt ">
                                    <p><?php _e('Include this script on selected post types:', 'mm_script_manager'); ?></p>
                                    <ul class="custom_post_types_checkboxes">
                                        <?php
                                        $get_post_types = get_post_types('', 'objects');
                                        $i = 0;
                                        foreach ($get_post_types as $post_type) {
                                            if ($post_type->name != 'revision' && $post_type->name != 'nav_menu_item') {
                                                ?>
                                                <li><input type="checkbox" id="post_type_selected_<?php echo $i; ?>" value="<?php echo $post_type->name ?>" name="form-item[<?php echo $current_id; ?>][post_type_selected_<?php echo $i; ?>]"><?php echo $post_type->labels->name ?> (<?php echo $post_type->name ?>)</li>
                    <?php $i++;
                }
            } ?>
                                    </ul>
                                </div>
                                <div class="column auto ption cpt ">
                                    <p><input type="checkbox" value="exclude" id="exclude_post_type_<?php echo $current_id; ?>" name="form-item[<?php echo $current_id; ?>][exclude_post_type]" /><?php _e('Exclude', 'mm_script_manager'); ?><p>
                                        <input type="text" value="" name="form-item[<?php echo $current_id; ?>][exclude_post_type_input]" id="exclude_post_type_input_<?php echo $current_id; ?>" />
                                    <hr style="margin: 15px 0 25px;float: left;width: 97%;">
                                    <p><input type="checkbox" value="include" id="include_post_type_<?php echo $current_id; ?>" name="form-item[<?php echo $current_id; ?>][include_post_type]" /><?php _e('Include', 'mm_script_manager'); ?><p>
                                        <input type="text" value="" name="form-item[<?php echo $current_id; ?>][include_post_type_input]" id="include_post_type_input_<?php echo $current_id; ?>" />
                                </div>
                            </div>
                            <input type="button" value="<?php _e('Delete', 'mm_script_manager'); ?>" class="btn_delete_repeater_item_<?php echo $current_id; ?> delete_item button-secondary" />
                            <script type="text/javascript">
                                jQuery(document).ready(function($) {
                                    $('.btn_delete_repeater_item_' + '<?php echo $current_id; ?>').on("click", function() {
                                        var current_id = jQuery('.item_ID').val();
                                        $(this).closest(".repeater-item").remove();
                                        var id = parseInt(current_id) - 1;
                                        jQuery('.item_ID').val(id);
                                    });
                                    jQuery('#exclude_post_type_input_' + '<?php echo $current_id; ?>').tagsInput({width: '100%', height: '40px', defaultText: 'Add a slug'});
                                    jQuery('#include_post_type_input_' + '<?php echo $current_id; ?>').tagsInput({width: '100%', height: '40px', defaultText: 'Add a slug'});
                                    jQuery('#post_type_custom_input_' + '<?php echo $current_id; ?>').tagsInput({width: '100%', height: '40px', defaultText: 'Add a slug'});

                                    $('#exclude_post_type_input_<?php echo $current_id; ?>_tag').attr("disabled", true);
                                    $("#exclude_post_type_<?php echo $current_id; ?>").click(function() {
                                        if ($(this).is(':checked')) {
                                            $('#exclude_post_type_input_<?php echo $current_id; ?>_tag').attr("disabled", false);
                                        } else if ($(this).not(':checked')) {
                                            $('#exclude_post_type_input_<?php echo $current_id; ?>_tag').attr("disabled", true);
                                        }
                                    });

                                    $('#include_post_type_input_<?php echo $current_id; ?>_tag').attr("disabled", true);
                                    $("#include_post_type_<?php echo $current_id; ?>").click(function() {
                                        if ($(this).is(':checked')) {
                                            $('#include_post_type_input_<?php echo $current_id; ?>_tag').attr("disabled", false);
                                        } else if ($(this).not(':checked')) {
                                            $('#include_post_type_input_<?php echo $current_id; ?>_tag').attr("disabled", true);
                                        }
                                    });

                                    setTimeout(disabledInput, 0);
                                    function disabledInput() {
                                        if ($("#exclude_post_type_<?php echo $key; ?>").is(':checked')) {
                                            $('#exclude_post_type_input_<?php echo $current_id; ?>_tag').attr("disabled", false);
                                        }
                                        if ($("#include_post_type_<?php echo $key; ?>").is(':checked')) {
                                            $('#include_post_type_input_<?php echo $current_id; ?>_tag').attr("disabled", false);
                                        }
                                    }
                                });
                            </script> 
                        </div>
                    </div>
                    <input type="hidden" value="<?php echo $current_id; ?>" name="item-ID" class="item_ID"/>
                    <input type="button" value="<?php _e('Add new', 'mm_script_manager'); ?>" id="btn_add_new_repeater_item" class="button-primary" />
                    <input type="hidden" value="form_submit" name="add_item_form_submit" />
                    <input type="submit" name="submit" id="submit" class="button button-primary" value="<?php _e('Save Changes', 'mm_script_manager'); ?>">
                </form>
            </div>
            <?php
        }

        function mm_script_manager_add_head() {
            global $post;
            $check_css = false;
            $check_js = false;
            $check_tag = false;

            $post_id = $post->ID;
            $custom_post = get_post_type($post_id);
            $post_slug = $post->post_name;
            if (get_option('mm_custom_save_script')) {
                $list_item = unserialize(get_option('mm_custom_save_script'));
            }
            $style = "\n<!-- Maui Marketing Header Manager -->\n" . '<style type="text/css">' . "\n";
            $script = "\n<!-- Maui Marketing Header Manager -->\n" . '<script type="text/javascript">' . "\n";
            $tag = "\n<!-- Maui Marketing Header Manager -->\n";
            if(is_array($list_item)&& !empty($list_item)){
            foreach ($list_item as $key => $data) {
                $check_exclude = array();
                $check_include = array();
                $check_post = $data['post_type_selected'];
                if ($data['item-load'] == 'all') {
                    if ($data['exclude_post_type'] == 'exclude') {
                        if (strpos($data['exclude_post_type_input'], ",")) {
                            $check_exclude = explode(",", $data['exclude_post_type_input']);
                        } else {
                            $check_exclude[] = $data['exclude_post_type_input'];
                        }
                    }
                    if ($data['include_post_type'] == 'include') {
                        if (strpos($data['include_post_type_input'], ",")) {
                            $check_include = explode(",", $data['include_post_type_input']);
                        } else {
                            $check_include[] = $data['include_post_type_input'];
                        }
                    }
                } else {
                    if (!empty($data['post_type_custom_input'])) {
                        if (strpos($data['post_type_custom_input'], ",")) {
                            $check_include = explode(",", $data['post_type_custom_input']);
                        } else {
                            $check_include[] = $data['post_type_custom_input'];
                        }
                    } else {
                        $check_include = $data['post_type_custom_input'];
                    }
                }
                if ($data['item-destination'] == 'header') {
                    if ($data['item-type'] == 'css') {
                        $check_css = 'true';
                        if ($data['item-load'] == 'all') {
                            if (!empty($check_post)) {
                                if (in_array($custom_post, $check_post)) {
                                    if (!in_array($post_slug, $check_exclude)) {
                                        $style .= $data['item-code'];
                                    }
                                } else {
                                    if (in_array($post_slug, $check_include)) {
                                        $style .= $data['item-code'];
                                    }
                                }
                            } else {
                                $style .= $data['item-code'];
                            }
                        }
                        if ($data['item-load'] == 'custom') {
                            if (!empty($check_include)) {
                                if (in_array($post_slug, $check_include)) {
                                    $style .= $data['item-code'];
                                }
                            } else {
                                $style .= $data['item-code'];
                            }
                        }
                    } elseif ($data['item-type'] == 'js') {
                        $check_js = 'true';
                        if ($data['item-load'] == 'all') {
                            if (!empty($check_post)) {
                                if (in_array($custom_post, $check_post)) {
                                    if (!in_array($post_slug, $check_exclude)) {
                                        $script .= $data['item-code'];
                                    }
                                } else {
                                    if (in_array($post_slug, $check_include)) {
                                        $script .= $data['item-code'];
                                    }
                                }
                            } else {
                                $script .= $data['item-code'];
                            }
                        }
                        if ($data['item-load'] == 'custom') {
                            if (!empty($check_include)) {
                                if (in_array($post_slug, $check_include)) {
                                    $script .= $data['item-code'];
                                }
                            } else {
                                $script .= $data['item-code'];
                            }
                        }
                    } else {
                        $check_tag = "true";
                        if ($data['item-load'] == 'all') {
                            if (!empty($check_post)) {
                                if (in_array($custom_post, $check_post)) {
                                    if (!in_array($post_slug, $check_exclude)) {
                                        $tag .= $data['item-code'];
                                    }
                                } else {
                                    if (in_array($post_slug, $check_include)) {
                                        $tag .= $data['item-code'];
                                    }
                                }
                            } else {
                                $tag .= $data['item-code'];
                            }
                        }
                        if ($data['item-load'] == 'custom') {
                            if (!empty($check_include)) {
                                if (in_array($post_slug, $check_include)) {
                                    $tag .= $data['item-code'];
                                }
                            } else {
                                $tag .= $data['item-code'];
                            }
                        }
                    }
                }
            }
            }//not empty
            $style .= "\n</style>\n<!-- End Maui Marketing Header Manager -->\n";
            $script .= "\n</script>\n<!-- End Maui Marketing Header Manager -->\n";
            if ($check_css == 'true') {
                echo $style;
            }
            if ($check_js == 'true') {
                echo $script;
            }
            if ($check_tag == 'true') {
                echo $tag . "\n<!-- End Maui Marketing Header Manager -->\n";
            }
        }

        function mm_script_manager_add_footer() {
            global $post;
            $check_css = false;
            $check_js = false;
            $check_tag = false;

            $post_id = $post->ID;
            $custom_post = get_post_type($post_id);
            $post_slug = $post->post_name;
            if (get_option('mm_custom_save_script')) {
                $list_item = unserialize(get_option('mm_custom_save_script'));
            }
            $style = "\n<!-- Maui Marketing Footer Manager -->\n" . '<style type="text/css">' . "\n";
            $script = "\n<!-- Maui Marketing Footer Manager -->\n" . '<script type="text/javascript">' . "\n";
            $tag = "\n<!-- Maui Marketing Footer Manager -->\n";
            if(is_array($list_item)&& !empty($list_item)){
            foreach ($list_item as $key => $data) {
                $check_exclude = array();
                $check_include = array();
                $check_post = $data['post_type_selected'];
                if ($data['item-load'] == 'all') {
                    if ($data['exclude_post_type'] == 'exclude') {
                        if (strpos($data['exclude_post_type_input'], ",")) {
                            $check_exclude = explode(",", $data['exclude_post_type_input']);
                        } else {
                            $check_exclude[] = $data['exclude_post_type_input'];
                        }
                    }
                    if ($data['include_post_type'] == 'include') {
                        if (strpos($data['include_post_type_input'], ",")) {
                            $check_include = explode(",", $data['include_post_type_input']);
                        } else {
                            $check_include[] = $data['include_post_type_input'];
                        }
                    }
                } else {
                    if (!empty($data['post_type_custom_input'])) {
                        if (strpos($data['post_type_custom_input'], ",")) {
                            $check_include = explode(",", $data['post_type_custom_input']);
                        } else {
                            $check_include[] = $data['post_type_custom_input'];
                        }
                    } else {
                        $check_include = $data['post_type_custom_input'];
                    }
                }
                if ($data['item-destination'] == 'footer') {
                    if ($data['item-type'] == 'css') {
                        $check_css = 'true';
                        if ($data['item-load'] == 'all') {
                            if (!empty($check_post)) {
                                if (in_array($custom_post, $check_post)) {
                                    if (!in_array($post_slug, $check_exclude)) {
                                        $style .= $data['item-code'];
                                    }
                                } else {
                                    if (in_array($post_slug, $check_include)) {
                                        $style .= $data['item-code'];
                                    }
                                }
                            } else {
                                $style .= $data['item-code'];
                            }
                        }
                        if ($data['item-load'] == 'custom') {
                            if (!empty($check_include)) {
                                if (in_array($post_slug, $check_include)) {
                                    $style .= $data['item-code'];
                                }
                            } else {
                                $style .= $data['item-code'];
                            }
                        }
                    } elseif ($data['item-type'] == 'js') {
                        $check_js = 'true';
                        if ($data['item-load'] == 'all') {
                            if (!empty($check_post)) {
                                if (in_array($custom_post, $check_post)) {
                                    if (!in_array($post_slug, $check_exclude)) {
                                        $script .= $data['item-code'];
                                    }
                                } else {
                                    if (in_array($post_slug, $check_include)) {
                                        $script .= $data['item-code'];
                                    }
                                }
                            } else {
                                $script .= $data['item-code'];
                            }
                        }
                        if ($data['item-load'] == 'custom') {
                            if (!empty($check_include)) {
                                if (in_array($post_slug, $check_include)) {
                                    $script .= $data['item-code'];
                                }
                            } else {
                                $script .= $data['item-code'];
                            }
                        }
                    } else {
                        $check_tag = "true";
                        if ($data['item-load'] == 'all') {
                            if (!empty($check_post)) {
                                if (in_array($custom_post, $check_post)) {
                                    if (!in_array($post_slug, $check_exclude)) {
                                        $tag .= $data['item-code'];
                                    }
                                } else {
                                    if (in_array($post_slug, $check_include)) {
                                        $tag .= $data['item-code'];
                                    }
                                }
                            } else {
                                $tag .= $data['item-code'];
                            }
                        }
                        if ($data['item-load'] == 'custom') {
                            if (!empty($check_include)) {
                                if (in_array($post_slug, $check_include)) {
                                    $tag .= $data['item-code'];
                                }
                            } else {
                                $tag .= $data['item-code'];
                            }
                        }
                    }
                }
            }
            }
            $style .= "\n</style>\n<!-- End Maui Marketing Footer Manager -->\n";
            $script .= "\n</script>\n<!-- End Maui Marketing Footer Manager -->\n";
            if ($check_css == 'true') {
                echo $style;
            }
            if ($check_js == 'true') {
                echo $script;
            }
            if ($check_tag == 'true') {
                echo $tag . "\n<!-- End Maui Marketing Footer Manager -->\n";
            }
        }

        function mm_script_manager_add_body_after_open() {
            global $post;
            $check_css = false;
            $check_js = false;
            $check_tag = false;

            $post_id = $post->ID;
            $custom_post = get_post_type($post_id);
            $post_slug = $post->post_name;
            if (get_option('mm_custom_save_script')) {
                $list_item = unserialize(get_option('mm_custom_save_script'));
            }
            $style = "\n<!-- Maui Marketing After Body Tag Manager -->\n" . '<style type="text/css">' . "\n";
            $script = "\n<!-- Maui Marketing After Body Tag Manager -->\n" . '<script type="text/javascript">' . "\n";
            $tag = "\n<!-- Maui Marketing After Body Tag Manager -->\n";
            if(is_array($list_item)&& !empty($list_item)){
            foreach ($list_item as $key => $data) {
                $check_exclude = array();
                $check_include = array();
                $check_post = $data['post_type_selected'];
                if ($data['item-load'] == 'all') {
                    if ($data['exclude_post_type'] == 'exclude') {
                        if (strpos($data['exclude_post_type_input'], ",")) {
                            $check_exclude = explode(",", $data['exclude_post_type_input']);
                        } else {
                            $check_exclude[] = $data['exclude_post_type_input'];
                        }
                    }
                    if ($data['include_post_type'] == 'include') {
                        if (strpos($data['include_post_type_input'], ",")) {
                            $check_include = explode(",", $data['include_post_type_input']);
                        } else {
                            $check_include[] = $data['include_post_type_input'];
                        }
                    }
                } else {
                    if (!empty($data['post_type_custom_input'])) {
                        if (strpos($data['post_type_custom_input'], ",")) {
                            $check_include = explode(",", $data['post_type_custom_input']);
                        } else {
                            $check_include[] = $data['post_type_custom_input'];
                        }
                    } else {
                        $check_include = $data['post_type_custom_input'];
                    }
                }
                if ($data['item-destination'] == 'body_open') {
                    if ($data['item-type'] == 'css') {
                        $check_css = 'true';
                        if ($data['item-load'] == 'all') {
                            if (!empty($check_post)) {
                                if (in_array($custom_post, $check_post)) {
                                    if (!in_array($post_slug, $check_exclude)) {
                                        $style .= $data['item-code'];
                                    }
                                } else {
                                    if (in_array($post_slug, $check_include)) {
                                        $style .= $data['item-code'];
                                    }
                                }
                            } else {
                                $style .= $data['item-code'];
                            }
                        }
                        if ($data['item-load'] == 'custom') {
                            if (!empty($check_include)) {
                                if (in_array($post_slug, $check_include)) {
                                    $style .= $data['item-code'];
                                }
                            } else {
                                $style .= $data['item-code'];
                            }
                        }
                    } elseif ($data['item-type'] == 'js') {
                        $check_js = 'true';
                        if ($data['item-load'] == 'all') {
                            if (!empty($check_post)) {
                                if (in_array($custom_post, $check_post)) {
                                    if (!in_array($post_slug, $check_exclude)) {
                                        $script .= $data['item-code'];
                                    }
                                } else {
                                    if (in_array($post_slug, $check_include)) {
                                        $script .= $data['item-code'];
                                    }
                                }
                            } else {
                                $script .= $data['item-code'];
                            }
                        }
                        if ($data['item-load'] == 'custom') {
                            if (!empty($check_include)) {
                                if (in_array($post_slug, $check_include)) {
                                    $script .= $data['item-code'];
                                }
                            } else {
                                $script .= $data['item-code'];
                            }
                        }
                    } else {
                        $check_tag = "true";
                        if ($data['item-load'] == 'all') {
                            if (!empty($check_post)) {
                                if (in_array($custom_post, $check_post)) {
                                    if (!in_array($post_slug, $check_exclude)) {
                                        $tag .= $data['item-code'];
                                    }
                                } else {
                                    if (in_array($post_slug, $check_include)) {
                                        $tag .= $data['item-code'];
                                    }
                                }
                            } else {
                                $tag .= $data['item-code'];
                            }
                        }
                        if ($data['item-load'] == 'custom') {
                            if (!empty($check_include)) {
                                if (in_array($post_slug, $check_include)) {
                                    $tag .= $data['item-code'];
                                }
                            } else {
                                $tag .= $data['item-code'];
                            }
                        }
                    }
                }
            }
            }
            $style .= "\n</style>\n<!-- End Maui Marketing After Body Tag Manager -->\n";
            $script .= "\n</script>\n<!-- End Maui Marketing After Body Tag Manager -->\n";
            if ($check_css == 'true') {
                echo $style;
            }
            if ($check_js == 'true') {
                echo $script;
            }
            if ($check_tag == 'true') {
                echo $tag . "\n<!-- End Maui Marketing After Body Tag Manager -->\n";
            }
        }

        function mm_script_manager_add_body_prior_close() {
            global $post;
            $check_css = false;
            $check_js = false;
            $check_tag = false;
            
            $post_id = $post->ID;
            $custom_post = get_post_type($post_id);
            $post_slug = $post->post_name;
            if (get_option('mm_custom_save_script')) {
                $list_item = unserialize(get_option('mm_custom_save_script'));
            }
            $style = "\n<!-- Maui Marketing Before Body End Tag Manager -->\n" . '<style type="text/css">' . "\n";
            $script = "\n<!-- Maui Marketing Before Body End Tag Manager -->\n" . '<script type="text/javascript">' . "\n";
            $tag = "\n<!-- Maui Marketing Before Body End Tag Manager -->\n";
            if(is_array($list_item)&& !empty($list_item)){
            foreach ($list_item as $key => $data) {
                $check_exclude = array();
                $check_include = array();
                $check_post = $data['post_type_selected'];
                if ($data['item-load'] == 'all') {
                    if ($data['exclude_post_type'] == 'exclude') {
                        if (strpos($data['exclude_post_type_input'], ",")) {
                            $check_exclude = explode(",", $data['exclude_post_type_input']);
                        } else {
                            $check_exclude[] = $data['exclude_post_type_input'];
                        }
                    }
                    if ($data['include_post_type'] == 'include') {
                        if (strpos($data['include_post_type_input'], ",")) {
                            $check_include = explode(",", $data['include_post_type_input']);
                        } else {
                            $check_include[] = $data['include_post_type_input'];
                        }
                    }
                } else {
                    if (!empty($data['post_type_custom_input'])) {
                        if (strpos($data['post_type_custom_input'], ",")) {
                            $check_include = explode(",", $data['post_type_custom_input']);
                        } else {
                            $check_include[] = $data['post_type_custom_input'];
                        }
                    } else {
                        $check_include = $data['post_type_custom_input'];
                    }
                }
                if ($data['item-destination'] == 'body_close') {
                    if ($data['item-type'] == 'css') {
                        $check_css = 'true';
                        if ($data['item-load'] == 'all') {
                            if (!empty($check_post)) {
                                if (in_array($custom_post, $check_post)) {
                                    if (!in_array($post_slug, $check_exclude)) {
                                        $style .= $data['item-code'];
                                    }
                                } else {
                                    if (in_array($post_slug, $check_include)) {
                                        $style .= $data['item-code'];
                                    }
                                }
                            } else {
                                $style .= $data['item-code'];
                            }
                        }
                        if ($data['item-load'] == 'custom') {
                            if (!empty($check_include)) {
                                if (in_array($post_slug, $check_include)) {
                                    $style .= $data['item-code'];
                                }
                            } else {
                                $style .= $data['item-code'];
                            }
                        }
                    } elseif ($data['item-type'] == 'js') {
                        $check_js = 'true';
                        if ($data['item-load'] == 'all') {
                            if (!empty($check_post)) {
                                if (in_array($custom_post, $check_post)) {
                                    if (!in_array($post_slug, $check_exclude)) {
                                        $script .= $data['item-code'];
                                    }
                                } else {
                                    if (in_array($post_slug, $check_include)) {
                                        $script .= $data['item-code'];
                                    }
                                }
                            } else {
                                $script .= $data['item-code'];
                            }
                        }
                        if ($data['item-load'] == 'custom') {
                            if (!empty($check_include)) {
                                if (in_array($post_slug, $check_include)) {
                                    $script .= $data['item-code'];
                                }
                            } else {
                                $script .= $data['item-code'];
                            }
                        }
                    } else {
                        $check_tag = "true";
                        if ($data['item-load'] == 'all') {
                            if (!empty($check_post)) {
                                if (in_array($custom_post, $check_post)) {
                                    if (!in_array($post_slug, $check_exclude)) {
                                        $tag .= $data['item-code'];
                                    }
                                } else {
                                    if (in_array($post_slug, $check_include)) {
                                        $tag .= $data['item-code'];
                                    }
                                }
                            } else {
                                $tag .= $data['item-code'];
                            }
                        }
                        if ($data['item-load'] == 'custom') {
                            if (!empty($check_include)) {
                                if (in_array($post_slug, $check_include)) {
                                    $tag .= $data['item-code'];
                                }
                            } else {
                                $tag .= $data['item-code'];
                            }
                        }
                    }
                }
            }
            }
            $style .= "\n</style>\n<!-- End Maui Marketing Before Body End Tag Manager -->\n";
            $script .= "\n</script>\n<!-- End Maui Marketing Before Body End Tag Manager -->\n";
            if ($check_css == 'true') {
                echo $style;
            }
            if ($check_js == 'true') {
                echo $script;
            }
            if ($check_tag == 'true') {
                echo $tag . "\n<!-- End Maui Marketing Before Body End Tag Manager -->\n";
            }
        }

    } 

    new MM_Script_Manager();
}


