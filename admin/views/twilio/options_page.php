<div class="wrap">
  <h2>Twillio Settings</h2>
  <form method="post" action="options.php">
    <?php settings_fields('twilio_settings_group'); ?>
    <table class="form-table">
      <tr><th>Account SID</th><td>
      <input name="twilio_settings[account_sid]" type="text" class="regular-text" value="<?php
        echo(isset($twilio_options['account_sid']) ? $twilio_options['account_sid'] : '' );?>"/>
      </td></tr>
      <tr><th>Auth Token</th><td>
      <input name="twilio_settings[auth_token]" type="text" class="regular-text" value="<?php
        echo(isset($twilio_options['auth_token']) ? $twilio_options['auth_token'] : '');?>"/>
      </td></tr>
      <tr><th>From Number</th><td>
      <input name="twilio_settings[from_number]" type="text" class="regular-text" value="<?php
        echo(isset($twilio_options['from_number']) ? $twilio_options['from_number'] : '');?>"/>
      </td></tr>
      <tr><th>To Number</th><td>
      <input name="twilio_settings[to_number]" type="text" class="regular-text" value="<?php
        echo(isset($twilio_options['to_number']) ? $twilio_options['to_number'] : '');?>"/>
      </td></tr>
    </table>
    <?php submit_button(); ?>
  </form>
</div>
