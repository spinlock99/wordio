<?php
// Don't redeclare the Class if it already exists.
if (!class_exists( 'Debug' )) {
  class Debug{
    public function log($message) {
      if (WP_DEBUG_LOG === true) {
        if (is_array($message) || is_object($message)) {
          error_log(print_r($message, true));
        } else {
          error_log($message);
        }
      }
    }

    public function email($message) {
      if (is_array($message) || is_object($message)) {
        $body = print_r($message, true);
      } else {
        $body = $message;
      }
      $to     = get_bloginfo('admin_email', 'raw');
      $subject = get_bloginfo('name', 'display') + " - Debug Message";

      wp_mail($to, $subject, $body);
    }
  }
}
?>
