<div class="wrap">
  <h2>Twillio Settings</h2>
  <form method="post" action="options.php">
    <?php settings_fields('wordio_settings_group'); ?>
    <table class="form-table">
      <tr><th>Account SID</th><td>
      <input name="wordio_settings[account_sid]" type="text" class="regular-text" value="<?php
        echo(isset($wordio_options['account_sid']) ? $wordio_options['account_sid'] : '' );?>"/>
      </td></tr>
      <tr><th>Auth Token</th><td>
      <input name="wordio_settings[auth_token]" type="text" class="regular-text" value="<?php
        echo(isset($wordio_options['auth_token']) ? $wordio_options['auth_token'] : '');?>"/>
      </td></tr>
      <tr><th>From Number</th><td>
      <input name="wordio_settings[from_number]" type="text" class="regular-text" value="<?php
        echo(isset($wordio_options['from_number']) ? $wordio_options['from_number'] : '');?>"/>
      </td></tr>
      <tr><th>To Number</th><td>
      <input name="wordio_settings[to_number]" type="text" class="regular-text" value="<?php
        echo(isset($wordio_options['to_number']) ? $wordio_options['to_number'] : '');?>"/>
      </td></tr>
    </table>
    <p class="submit">
      <input type="submit" class="button-primary" value="Save Options"/>
    </p>
  </form>
</div>
