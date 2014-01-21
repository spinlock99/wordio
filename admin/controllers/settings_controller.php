<?php class SettingsController {
  public function __construct() {
    add_action('admin_init', array($this, 'register_settings'));
    add_action('admin_menu', array($this, 'menu_setup'));
  }

  public function register_settings() {
    register_setting('twilio_settings_group', 'twilio_settings');
  }

  public function menu_setup() {
    add_options_page(
      'Twilio Settings', // $page_title
      'Twilio Settings', // $menu_title
      'manage_options',   // $capability
      'twilio-settings', // $menu_slug
      array($this, 'render_settings_page') //$function
    );
  }

  public function render_settings_page() {
    $twilio_settings = get_option('twilio_settings');
    include(WORDIO_BASE_DIR . '/admin/views/settings/twilio.php');
  }
} ?>
