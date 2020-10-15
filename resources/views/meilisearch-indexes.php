<?php
$client = new \MeiliSearch\Client('http://188.166.32.110:7700', 'KWzsqSuOT45Jj9Gnw0RF');
?>

<div class="wrap woocommerce">
  <h1>MeiliSearch</h1>
  <form method="post" id="mainform" action="" enctype="multipart/form-data">
    <nav class="nav-tab-wrapper" style="margin: 1.5em 0 1em;">
      <a href="http://petnat.test/wp-admin/admin.php?page=woocommerce-meilisearch&amp;tab=indexes" class="nav-tab nav-tab-active">
        Indexes
      </a>
      <a href="http://petnat.test/wp-admin/admin.php?page=woocommerce-meilisearch&amp;tab=settings" class="nav-tab">
        Settings
      </a>
    </nav>
    <h1 class="screen-reader-text">Indexes</h1>
  </form>

  <?php $indexes = $client->getAllIndexes(); ?>
  <h2><?php echo count($indexes).' indexes'; ?></h2>
  <?php 
  echo '<ul style="list-style: disc; padding-left: 20px;">';
  foreach ($indexes as $index) {
    $documents = $index->getDocuments(['limit' => 20]);
    echo '<li>'.$index->getUid().' ('.count($documents).' documents)</li>';
    echo '<ul style="list-style: disc; padding-left: 20px;">';
    foreach ($documents as $document) {
      echo '<li>'.$document['ID'].' - '.$document['post_title'].'</li>';
    };
    echo '</ul>';
  } 
  echo '</ul>';
  ?>
</div>
