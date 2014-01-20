<?php class WordioShortcodesController {
  public function __construct() {
    add_shortcode('wordio', array($this, 'route'));
  }

  public function route($shortcode_attributes, $content=null) {
    switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
      return($this->get($shortcode_attributes));
    case 'POST':
      return($this->post());
    default:
      wp_die("{$_SERVER['REQUEST_METHOD']} not supported by Wordio", "Wordio Route");
    }
  }

  public function get($shortcode_attributes) {
    //show the form
    extract(shortcode_atts(array(
      'text_number' => '',
      'title'       => get_bloginfo('title'),
      'description' => get_bloginfo('description'),
    ), $shortcode_attributes));

    include("{WORDIO_BASE_DIR}/app/views/shortcodes/wordio.php");
  }

  public function post() {
    //process the form
  }
} ?>
