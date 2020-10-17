<?php
if (isset($_GET['action']) && $_GET['action'] === 're-index') {
  llWcmsReIndex($_GET['index']);
}
$client = new \MeiliSearch\Client('http://188.166.32.110:7700', 'KWzsqSuOT45Jj9Gnw0RF');
?>

<div class="wrap woocommerce">
  <h1>MeiliSearch</h1>
  <form method="post" id="mainform" action="" enctype="multipart/form-data">
    <h1 class="screen-reader-text">Indexes</h1>
  </form>

  <!-- <h2>Keys</h2>
  <?php $keys = $client->getKeys(); var_dump($keys); ?> -->

  <?php $indexes = $client->getAllIndexes(); ?>
  <h2><?php echo count($indexes).' indexes'; ?></h2>
  <?php 
  echo '<ul style="list-style: disc; padding-left: 20px;">';
  if ($indexes) {
    foreach ($indexes as $index) {
      $stats = $index->stats();
      // $searchableAttributes = $index->getSearchableAttributes();
      // var_dump($searchableAttributes);
      // $attributesForFaceting = $index->getAttributesForFaceting();
      // var_dump($attributesForFaceting);
      // $index->updateAttributesForFaceting([
      //   'stock_status',
      // ]);
      $documents = $index->getDocuments();
      echo '<li>'.$index->getUid().' ('.$stats['numberOfDocuments'].' products)</li>';
      echo '<a class="button" href="/wp-admin/admin.php?page=woocommerce-meilisearch/resources/views/meilisearch-indexes.php&action=re-index&index='.$index->getUid().'">Re-index '.$index->getUid().'</a>';

      echo '<a class="button" href="/wp-admin/admin.php?page=woocommerce-meilisearch/resources/views/meilisearch-indexes.php&action=clear&index='.$index->getUid().'">Clear '.$index->getUid().'</a>';
    } 
  }
  echo '</ul>';
  ?> 

  <h2>Search</h2>
  <form action="" id="wcms__search-form">
    <input type="text" class="regular-text" id="wcms__search-terms" name="wcms_search" placeholder="Search while you type...">
    <div id="wcms__search-hits">
      <ul><li>There are no search results.</li></ul>
    </div>
  </form>
</div>
