<div class="wrap">
  <h2>Twilio Settings</h2>
  <form method="post" action="options.php">
    <?php settings_fields('twilio_settings_group'); ?>
    <table class="form-table">
      <?php echo
        Formidable::text(
          "Account SID",
          "twilio_settings[account_sid]",
          $twilio_settings['account_sid']
        );
      ?>
      <tr>
        <th>Auth Token</th>
        <td>
          <input name="twilio_settings[auth_token]" type="text" class="regular-text" value="<?php
            echo(isset($twilio_settings['auth_token']) ? $twilio_settings['auth_token'] : '');?>"/>
        </td>
      </tr>
      <tr>
        <th>From Number</th>
        <td>
          <input name="twilio_settings[from_number]" type="text" class="regular-text" value="<?php
            echo(isset($twilio_settings['from_number']) ? $twilio_settings['from_number'] : '');?>"/>
          <label class="description" for="twilio_settings[from_number]">
            The Twilio number that the texts will be sent from.
          </label>
        </td>
      </tr>
      <tr>
        <th>To Number</th>
        <td>
          <input name="twilio_settings[to_number]" type="text" class="regular-text" value="<?php
            echo(isset($twilio_settings['to_number']) ? $twilio_settings['to_number'] : '');?>"/>
          <label class="description" for="twilio_settings[to_number]">
            The number for the text enabled device that texts will be sent to.
          </label>
        </td>
      </tr>
    </table>
    <?php submit_button(); ?>
  </form>
</div>
