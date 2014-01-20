<?php class TwillioAdminController {

  public function register_settings() {
    register_setting('twilio_settings_group', 'twilio_settings');
  }

  public function menu_setup() {
    add_options_page(
      'Twilio Settings', // $page_title
      'Twilio Settings', // $menu_title
      'manage_options',   // $capability
      'twilio-settings', // $menu_slug
      array($this, 'render_options_page') //$function
    );
  }

  public function render_options_page() {
    $twilio_options = get_option('twilio_settings');
    include(WORDIO_BASE_DIR . '/admin/views/twilio/options_page.php');
  }
} ?>
