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

    include(WORDIO_BASE_DIR . "/app/views/shortcodes/new.php");
  }

  public function post() {
    DebugModel::debug('WordioShortcodesController::post');
    if (wp_verify_nonce($_POST['wordio_nonce'], 'wordio-nonce')) {
      DebugModel::debug($_POST);
      $account_sid = "AC8ff3fc76a39bb33c21fe2682c6c444fd";
      $auth_token = "ce10db18423c8f5cb2649aaba560835b";
      $client = new Services_Twilio($account_sid, $auth_token);

      $sms = $client->account->sms_messages->create(
        "510-984-3435", // From this number
        "510-847-6279", // To this number
        "Test message Sucka!"
      );

      include(WORDIO_BASE_DIR . "/app/views/shortcodes/show.php");
    } else {
      wp_die("Nonce Not Recognized", "Wordio Nonce");
    }
  }
} ?>
