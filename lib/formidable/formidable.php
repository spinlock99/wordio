<?php if (!class_exists('Formidable')) {
  class Formidable {
    public function text($header, $name, $value, $label='') {
      ob_start();
?>
<tr>
<th><?php echo $header; ?></th>
  <td>
  <input name="<?php echo $name; ?>" type="text" class="regular-text" value="<?php
      echo(isset($value) ? $value : '');?>"/>
    <label class="description" for="<?php echo $name; ?>">
      <?php echo $label; ?>
    </label>
  </td>
</tr>
<?php
      $text = ob_get_clean();
      return $text;
    }
  }
} ?>