<?php
/*
 * Plugin Name: Wordio
 * Plugin URI: https://atomicbroadcast.net/
 * Description: A simple plugin that lets anyone send you a text.
 * Author: Andrew Dixon
 * Author URI: https://atomicbroadcast.net/
 * Version: 0.1
 */

// Constants and Globals
if (!defined('WORDIO_BASE_URL')) {
  define('WORDIO_BASE_URL', plugin_dir_url(__FILE__));
}
if (!defined('WORDIO_BASE_DIR')) {
  define('WORDIO_BASE_DIR', dirname(__FILE__));
}
// Instantiate Controllers
if (is_admin()) {
  require_once(WORDIO_BASE_DIR . '/admin/controllers/twillio.php');
  $twillioAdminController = new TwillioAdminController;
  add_action('admin_init', array($twillioAdminController, 'register_settings'));
  add_action('admin_menu', array($twillioAdminController, 'menu_setup'));
} else {
  require_once(WORDIO_BASE_DIR . '/app/controllers/wordio_shortcodes_controller.php');
  $shortcodeController = new WordioShortcodesController;
}
?>
