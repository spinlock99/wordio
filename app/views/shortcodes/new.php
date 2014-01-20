<div class="dialog app">
  <div class="panel">
    <form method="post">
      <article>
        <textarea name="wordio_text" rows="5" placeholder="Your Message Here."></textarea>
        <input
          type  = "hidden"
          name  = "wordio_nonce"
          value = "<?php echo wp_create_nonce('wordio-nonce');?>"
        />
      </article>
      <footer>
        <p class="submit">
          <input type="submit" class="button-primary" value="Send Text"/>
        </p>
      </footer>
    </form>
  </div>
</div>
