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
  <h1>MeiliSearch</h1>
  <h2>Facets</h2>

  <?php
  $client = wcms_get_client();
  if ($client) :
    $index = wcms_get_index();
    $facetingAttributes = $index->getAttributesForFaceting();
    echo '<ul>';
    foreach ($facetingAttributes as $facetingAttribute) {
      echo '<li>'.$facetingAttribute.'</li>';
    }
    echo '</ul>';
    // $index->updateAttributesForFaceting(['pa_storage', 'pa_size', 'pa_flavours', 'pa_ingredients', 'pa_lifeproof', 'product_cat', 'product_tag']);
  ?>
  <?php endif; ?>

</div>
