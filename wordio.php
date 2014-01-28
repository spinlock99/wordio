<?php
/*
 * Plugin Name: Wordio
 * Plugin URI: https://atomicbroadcast.net/
 * Description: A simple plugin that lets anyone send you a text.
 * Author: Andrew Dixon
 * Author URI: https://atomicbroadcast.net/
 * Version: 0.2
 */

// Constants and Globals
if (!defined('WORDIO_BASE_URL')) {
  define('WORDIO_BASE_URL', plugin_dir_url(__FILE__));
}
if (!defined('WORDIO_BASE_DIR')) {
  define('WORDIO_BASE_DIR', dirname(__FILE__));
}

require_once(WORDIO_BASE_DIR . '/app/models/debug.php');
require_once(WORDIO_BASE_DIR . '/lib/formidable/formidable.php');

// Instantiate Controllers
if (is_admin()) {
  require_once(WORDIO_BASE_DIR . '/admin/controllers/settings_controller.php');
  $settingsController = new SettingsController;
} else {
  require_once(WORDIO_BASE_DIR . '/app/controllers/wordio_shortcodes_controller.php');
  $shortcodeController = new WordioShortcodesController;
  require_once(WORDIO_BASE_DIR . '/lib/twilio-php-master/Services/Twilio.php');
}
?>
