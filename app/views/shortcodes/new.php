<div class="dialog app" title="<h1><?php echo $title; ?></h1><h2><?php echo $description; ?></h2>">
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
        <button id='submit' class='blue submit'>
          <span>Send</span>
        </button>
      </footer>
    </form>
  </div>
</div>
