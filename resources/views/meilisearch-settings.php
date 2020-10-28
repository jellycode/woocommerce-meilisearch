<div class="wrap">
  <h1>MeiliSearch</h1>
  <form action="options.php" method="post">
      <?php 
      settings_fields('wcms_plugin_options');
      do_settings_sections('wcms_plugin'); ?>
      <input name="submit" class="button button-primary" type="submit" value="<?php esc_attr_e('Save'); ?>" />
  </form>
</div>
