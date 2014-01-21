<?php if (!class_exists('Formidable')) {
  class Formidable {
    public function text($header, $name, $value, $label='') {
      ob_start();
      include 'views/text.php';
      return ob_get_clean();
    }
  }
} ?>
