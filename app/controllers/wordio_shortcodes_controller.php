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
    wp_enqueue_script('shortcodes', WORDIO_URL . '/app/assets/javascripts/shortcodes.js');
    wp_register_style('lightbox', WORDIO_URL . '/app/assets/stylesheets/lightbox.css');
    wp_enqueue_style('lightbox');
  }

  public function get($shortcode_attributes) {
    //show the form
    extract(shortcode_atts(array(
      'text_number' => '',
      'title'       => get_bloginfo('title'),
      'description' => get_bloginfo('description'),
    ), $shortcode_attributes));

    include(WORDIO_BASE_DIR . "/app/views/shortcodes/new.php");
  }

  public function post() {
    DebugModel::log('WordioShortcodesController::post');
    if (wp_verify_nonce($_POST['wordio_nonce'], 'wordio-nonce')) {
      DebugModel::email($_POST);
      $twilio_options = get_option('twilio_settings');
      $client = new Services_Twilio(
        $twilio_options['account_sid'],
        $twilio_options['auth_token']
      );

      try {
        $sms = $client->account->sms_messages->create(
          $twilio_options['from_number'],
          $twilio_options['to_number'],
          $_POST['wordio_text']
        );
      } catch (Services_Twilio_RestException $e) {
        $caught_exception = true;
        echo $e->getMessage();
        echo "</br><form><input type='button' onClick='history.go(0)' value='OK'></form>";
      }
      if (!$caught_exception) include(WORDIO_BASE_DIR . "/app/views/shortcodes/show.php");
    } else {
      wp_die("Nonce Not Recognized", "Wordio Nonce");
    }
  }
} ?>
