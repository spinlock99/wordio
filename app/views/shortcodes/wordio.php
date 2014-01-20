<h2>Wordio Shortcode</h2>

<form method="post">
  <textarea name="wordio_text" rows="5">
    Your Message Here.
  </textarea>
  <input type="hidden" name="wordio_nonce" value="<?php echo wp_create_nonce('wordio-nonce');?>"/>
  <p class="submit">
    <input type="submit" class="button-primary" value="Send Text"/>
  </p>
</form>
