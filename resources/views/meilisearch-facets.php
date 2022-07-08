<?php
if (isset($_GET['action'])) {
  if ($_GET['action'] === 're-index') {
    wcms_re_index($_GET['index']);
  } elseif ($_GET['action'] === 'clear') {
    wcms_clear_index($_GET['index']);
  }
}
?>

<div class="wrap">
  <h1>MeiliSearch for WooCommerce</h1>
  <h2>Facets</h2>

  <form action="options.php" method="post">
    <?php settings_fields('wcms_facets'); ?>
    <?php $wcms_facets = get_option('wcms_facets'); ?>

    <?php
    $checked = (isset($wcms_facets) && is_array($wcms_facets) && in_array('product_cat', $wcms_facets)) ? 'checked' : '';

    echo '<div class="row">';
    echo '<input type="checkbox" name="wcms_facets[]" value="product_cat" '.$checked.'>';
    echo 'Product Category';
    echo '</div>';
    ?>

    <?php
    $checked = (isset($wcms_facets) && is_array($wcms_facets) && in_array('product_tag', $wcms_facets)) ? 'checked' : '';

    echo '<div class="row">';
    echo '<input type="checkbox" name="wcms_facets[]" value="product_tag" '.$checked.'>';
    echo 'Product Tag';
    echo '</div>';
    ?>

    <?php
    foreach(wc_get_attribute_taxonomies() as $attribute) {
      $checked = (isset($wcms_facets) && is_array($wcms_facets) && in_array('pa_'.$attribute->attribute_name, $wcms_facets)) ? 'checked' : '';

      echo '<div class="row">';
      echo '<input type="checkbox" name="wcms_facets[]" value="pa_'.$attribute->attribute_name.'" '.$checked.'>';
      echo 'Product Attribute - '.$attribute->attribute_label;
      echo '</div>';
    }
    ?>
    <br>
    <input name="submit" class="button button-primary" type="submit" value="<?php esc_attr_e('Save'); ?>" />
  </form>
</div>
