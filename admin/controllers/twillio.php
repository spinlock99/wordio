<?php class TwillioAdminController {

  public function register_settings() {
    register_setting('twillio_settings_group', 'twillio_settings');
  }

  public function menu_setup() {
    add_options_page(
      'Twillio Settings', // $page_title
      'Twillio Settings', // $menu_title
      'manage_options',   // $capability
      'twillio-settings', // $menu_slug
      array($this, 'render_options_page') //$function
    );
  }

  public function render_options_page() {
    include(WORDIO_BASE_DIR . '/admin/views/twillio/options_page.php');
  }
} ?>
