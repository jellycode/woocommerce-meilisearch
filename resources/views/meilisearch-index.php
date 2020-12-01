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
  <h2>Index</h2>

  <?php
  if ($index = wcms_get_index()) :
    $stats = $index->stats();
    $documents = $index->getDocuments();
    $indexUid = $index->getUid();

    echo '<p>'.$indexUid.' ('.$stats['numberOfDocuments'].' products)</p>';

    echo '<a class="button" href="/wp-admin/admin.php?page=woocommerce-meilisearch-index&action=re-index&index='.$indexUid.'">Re-index</a>';

    echo '<a class="button" href="/wp-admin/admin.php?page=woocommerce-meilisearch-index&action=clear&index='.$indexUid.'">Clear index</a>'; ?> 

    <h2>Search</h2>
    <form action="" id="wcms__search-form">
      <input type="text" class="regular-text" id="wcms__search-terms" name="wcms_search" placeholder="Search while you type...">
      <div id="wcms__search-hits">
        <ul><li>There are no search results.</li></ul>
      </div>
    </form>
  <?php 
  else :
    echo 'Can\'t create the MeiliSearch Client. <a href="/wp-admin/admin.php?page=woocommerce-meilisearch-settings">Check the Server Settings.</a>';
  endif; ?>
</div>
