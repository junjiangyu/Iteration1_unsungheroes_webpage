<?php

/*
  Plugin Name: Maui Marketing Scripts, Tags & CSS Manager
  Plugin URI: http://mauimarketing.com
  Description: Place scripts in the right place within your page or post. Add script or css directly into the header, body or footer of your WordPress website. No matter what theme you have running. Features include load control features so you can manage the page or page types that particular script appears on. Create as many unique placement and script combinations as needed. Get maximum control over the execution of scripts and css on each page of your site.
  Version: 2.3.0
  Author: Maui Marketing
  Author URI: http://mauimarketing.com/
  License: GPLv2 or later
  Text domain: mm_script_manager
 */ 

include dirname(__FILE__) . '/mm-script-manager-admin.php';

define('MM_Script_Child_Theme', get_stylesheet_directory());
define('MM_Script_Parent_Theme', get_template_directory());

if (!class_exists('MM_Script_Manager_Active')) {

    class MM_Script_Manager_Active {

        function __construct() {
            add_action('admin_notices', array($this, 'mm_script_manager_active_change_header_footer'));
            add_action('plugins_loaded', array($this, 'mm_script_manager_load_textdomain'));
            add_action('after_switch_theme', array($this, 'mm_script_manage_after_setup_theme'));
            register_deactivation_hook(__FILE__, array($this, 'mm_script_manager_deactivation_change_header_footer'));
            register_activation_hook(__FILE__, array($this, 'mm_script_manager_active_change_header_footer'));
        }

        function mm_script_manager_load_textdomain() {
            load_plugin_textdomain('mm_script_manager', false, plugin_basename(dirname(__FILE__)) . '/languages');
        }

        function mm_script_manage_after_setup_theme() {
            $plugin = plugin_basename(__FILE__);
            $path_header = $this->glob_recursive(get_stylesheet_directory() . "/*header*.php");
            if (!empty($path_header)) {

                foreach ($path_header as $key_h => $value_h) {
                    if ($wp_header = @file_get_contents($value_h)) {
                        if (!preg_match('/<body(.*)>/', $wp_header)) {
                            $path_header = $this->glob_recursive(MM_Script_Parent_Theme . "/*header*.php");
                        }
                    }
                }
            } else {
                $path_header = $this->glob_recursive(MM_Script_Parent_Theme . "/*header*.php");
            }
            $path_footer = $this->glob_recursive(MM_Script_Child_Theme . "/*footer*.php");
            if (!empty($path_footer)) {
                foreach ($path_footer as $key_f => $value_f) {
                    if ($wp_footer = @file_get_contents($value_f)) {
                        if (!preg_match('/<\/body>/', $wp_footer)) {
                            $path_footer = $this->glob_recursive(MM_Script_Parent_Theme . "/*footer*.php");
                        }
                    }
                }
            } else {
                $path_footer = $this->glob_recursive(MM_Script_Parent_Theme . "/*footer*.php");
            }

            if ($this->check_active_plguin($plugin)) {
                if (!empty($path_header)) {
                    foreach ($path_header as $key_h => $value_h) {
                        if ($wp_header = @file_get_contents($value_h)) {
                            $str_code = preg_match('/<body(.*)>/', $wp_header, $match);
                            $do_action = "\n<?php do_action('wp_mm_body_after_open_hook'); ?>";
                            if (!preg_match('/wp_mm_body_after_open_hook/', $wp_header)) {
                                $wp_header = str_replace($match[0], $match[0] . $do_action, $wp_header);
                                @file_put_contents($value_h, $wp_header);
                            }
                        }
                    }
                }
                if (!empty($path_footer)) {
                    foreach ($path_footer as $key_f => $value_f) {
                        if ($wp_footer = @file_get_contents($value_f)) {
                            $str_code = preg_match('/</body>/', $wp_footer, $match_f);
                            $do_action = "<?php do_action('wp_mm_body_prior_close_hook'); ?>\n";
                            if (!preg_match('/wp_mm_body_prior_close_hook/', $wp_footer)) {
                                $wp_footer = str_replace($match_f[0], $do_action . $match_f[0], $wp_footer);
                                @file_put_contents($value_f, $wp_footer);
                            }
                        }
                    }
                }
            } else {
                if (!empty($path_header)) {
                    foreach ($path_header as $key_h => $value_h) {
                        if ($wp_header = @file_get_contents($value_h)) {
                            $wp_header = str_replace("\n<?php do_action('wp_mm_body_after_open_hook'); ?>", "", $wp_header);
                            @file_put_contents($value_h, $wp_header);
                        }
                    }
                }
                if (!empty($path_footer)) {
                    foreach ($path_footer as $key_f => $value_f) {
                        if ($wp_footer = @file_get_contents($value_f)) {
                            $wp_footer = str_replace("<?php do_action('wp_mm_body_prior_close_hook'); ?>\n", "", $wp_footer);
                            @file_put_contents($value_f, $wp_footer);
                        }
                    }
                }
            }
        }

        function mm_script_manager_deactivation_change_header_footer() {
            $path_header = $this->glob_recursive(get_stylesheet_directory() . "/*header*.php");
            if (!empty($path_header)) {
                foreach ($path_header as $key_h => $value_h) {
                    if ($wp_header = @file_get_contents($value_h)) {
                        if (!preg_match('/<body(.*)>/', $wp_header)) {
                            $path_header = $this->glob_recursive(MM_Script_Parent_Theme . "/*header*.php");
                        }
                    }
                }
            } else {
                $path_header = $this->glob_recursive(MM_Script_Parent_Theme . "/*header*.php");
            }
            $path_footer = $this->glob_recursive(MM_Script_Child_Theme . "/*footer*.php");
            if (!empty($path_footer)) {
                foreach ($path_footer as $key_f => $value_f) {
                    if ($wp_footer = @file_get_contents($value_f)) {
                        if (!preg_match('/<\/body>/', $wp_footer)) {
                            $path_footer = $this->glob_recursive(MM_Script_Parent_Theme . "/*footer*.php");
                        }
                    }
                }
            } else {
                $path_footer = $this->glob_recursive(MM_Script_Parent_Theme . "/*footer*.php");
            }
            if (!empty($path_header)) {
                foreach ($path_header as $key_h => $value_h) {
                    if ($wp_header = @file_get_contents($value_h)) {
                        $wp_header = str_replace("\n<?php do_action('wp_mm_body_after_open_hook'); ?>", "", $wp_header);
                        if (!@file_put_contents($value_h, $wp_header)) {
                            return array("The function remove code in header.php", "error");
                        }
                    } else {
                        return array("The function remove code in header.php", "error");
                    }
                }
            }
            if (!empty($path_footer)) {
                foreach ($path_footer as $key_f => $value_f) {
                    if ($wp_footer = @file_get_contents($value_f)) {
                        $wp_footer = str_replace("<?php do_action('wp_mm_body_prior_close_hook'); ?>\n", "", $wp_footer);
                        if (!@file_put_contents($value_f, $wp_footer)) {
                            return array("The function remove code in footer.php", "error");
                        }
                    } else {
                        return array("The function remove code in footer.php", "error");
                    }
                }
            }
        }

        //search path file
        function glob_recursive($pattern, $flags = 0) {
            $files = glob($pattern, $flags);
            if (!empty($files)) {
                foreach (glob(dirname($pattern) . '/*', GLOB_ONLYDIR | GLOB_NOSORT) as $dir) {
                    if ($this->glob_recursive($dir . '/' . basename($pattern), $flags)) {
                        $files = array_merge($files, $this->glob_recursive($dir . '/' . basename($pattern), $flags));
                    }
                }
            }
            return $files;
        }

        function mm_script_manager_active_change_header_footer() {
            $path_header = $this->glob_recursive(get_stylesheet_directory() . "/*header*.php");
            if (!empty($path_header)) {
                foreach ($path_header as $key_h => $value_h) {
                    if ($wp_header = @file_get_contents($value_h)) {
                        if (!preg_match('/<body(.*)>/', $wp_header)) {
                            $path_header = $this->glob_recursive(MM_Script_Parent_Theme . "/*header*.php");
                        }
                    }
                }
            } else {
                $path_header = $this->glob_recursive(MM_Script_Parent_Theme . "/*header*.php");
            }
            $path_footer = $this->glob_recursive(MM_Script_Child_Theme . "/*footer*.php");
            if (!empty($path_footer)) {
                foreach ($path_footer as $key_f => $value_f) {
                    if ($wp_footer = @file_get_contents($value_f)) {
                        if (!preg_match('/<\/body>/', $wp_footer)) {
                            $path_footer = $this->glob_recursive(MM_Script_Parent_Theme . "/*footer*.php");
                        }
                    }
                }
            } else {
                $path_footer = $this->glob_recursive(MM_Script_Parent_Theme . "/*footer*.php");
            }
            $add_action_header_success = false;
            $add_action_footer_success = false;
            if (!empty($path_header)) {
                foreach ($path_header as $key_h => $value_h) {
                    if ($wp_header = @file_get_contents($value_h)) {
                        $str_code = preg_match('/<body(.*)>/', $wp_header, $match);
                        $do_action = "\n<?php do_action('wp_mm_body_after_open_hook'); ?>";
                        if (!preg_match('/wp_mm_body_after_open_hook/', $wp_header)) {
                            $wp_header = str_replace($match[0], $match[0] . $do_action, $wp_header);
                            if (@file_put_contents($value_h, $wp_header)) {
                                $add_action_header_success = true;
                            }
                        } else {
                            $add_action_header_success = true;
                        }
                    }
                }
            }
            if (!empty($path_footer)) {
                foreach ($path_footer as $key_f => $value_f) {
                    if ($wp_footer = @file_get_contents($value_f)) {
                        $str_code = preg_match('/<\/body>/', $wp_footer, $match_f);
                        $do_action = "<?php do_action('wp_mm_body_prior_close_hook'); ?>\n";
                        if (!preg_match('/wp_mm_body_prior_close_hook/', $wp_footer)) {
                            $wp_footer = str_replace($match_f[0], $do_action . $match_f[0], $wp_footer);
                            if (@file_put_contents($value_f, $wp_footer)) {
                                $add_action_footer_success = true;
                            }
                        } else {
                            $add_action_footer_success = true;
                        }
                    }
                }
            }
            if (!$add_action_header_success) {
                echo '<div id="message" class="error">';
                echo '<p>The plugin can not autoload code into the open Body tag, please copy and paste this code &lt;?php do_action("wp_mm_body_after_open_hook"); ?&gt; directly behind the open Body tag &lt;body&gt;.</p>';
                echo "</div>";
            }
            if (!$add_action_footer_success) {
                echo '<div id="message" class="error">';
                echo '<p>The plugin can not autoload code into the close Body tag, please copy and paste this code &lt;?php do_action("wp_mm_body_prior_close_hook"); ?&gt; directly ahead of the close Body tag &lt;/body&gt;.</p>';
                echo "</div>";
            }
        }

        function check_active_plguin($plugin) {
            return in_array($plugin, (array) get_option('active_plugins', array())) || is_plugin_active_for_network($plugin);
        }

    }

    new MM_Script_Manager_Active();
}