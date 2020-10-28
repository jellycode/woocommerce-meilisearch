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
  <h2>Index</h2>

  <?php
  $client = wcms_get_client();
  if ($client) :
    $index = wcms_get_index();
    $stats = $index->stats();
    $documents = $index->getDocuments();

    echo '<li>'.$index->getUid().' ('.$stats['numberOfDocuments'].' products)</li>';
    echo '<a class="button" href="/wp-admin/admin.php?page=woocommerce-meilisearch-indexes&action=re-index&index='.$index->getUid().'">Re-index '.$index->getUid().'</a>';

    echo '<a class="button" href="/wp-admin/admin.php?page=woocommerce-meilisearch-indexes&action=clear&index='.$index->getUid().'">Clear '.$index->getUid().'</a>'; ?> 

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
