<?php class WordioShortcodesController {
  public function __construct() {
    add_shortcode('wordio', array($this, 'route'));
    add_action('wp_enqueue_scripts', array($this, 'load_scripts'));
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

  public function load_scripts() {
    wp_enqueue_script('jquery');
    wp_enqueue_script('jquery-ui');
    wp_enqueue_script('jquery-ui-dialog');
    wp_enqueue_script('shortcodes', WORDIO_BASE_URL . '/app/assets/javascripts/shortcodes.js');
    wp_register_style('shortcodes', WORDIO_BASE_URL . '/app/assets/stylesheets/shortcodes.css');
    wp_enqueue_style('shortcodes');
  }

  public function get($shortcode_attributes) {
    extract(shortcode_atts(array(
      'text_number' => '',
      'title'       => get_bloginfo('title'),
      'description' => get_bloginfo('description'),
    ), $shortcode_attributes));

    include(WORDIO_BASE_DIR . "/app/views/shortcodes/new.php");
  }

  public function post() {
    Debug::log('WordioShortcodesController::post');
    if (wp_verify_nonce($_POST['wordio_nonce'], 'wordio-nonce')) {
      Debug::email($_POST);
      $twilio_settings = get_option('twilio_settings');
      $client = new Services_Twilio(
        $twilio_settings['account_sid'],
        $twilio_settings['auth_token']
      );

      try {
        $sms = $client->account->sms_messages->create(
          $twilio_settings['from_number'],
          $twilio_settings['to_number'],
          $_POST['wordio_text']
        );
      } catch (Services_Twilio_RestException $e) {
        $caught_exception = true;
        echo $e->getMessage();
        echo "</br><form><input type='button' onClick='history.go(0)' value='OK'></form>";
      }
      if (!isset($caught_exception)) include(WORDIO_BASE_DIR . "/app/views/shortcodes/show.php");
    } else {
      wp_die("Nonce Not Recognized", "Wordio Nonce");
    }
  }
} ?>
