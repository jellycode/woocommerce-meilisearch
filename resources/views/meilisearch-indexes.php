<?php
$client = new \MeiliSearch\Client('http://188.166.32.110:7700', 'KWzsqSuOT45Jj9Gnw0RF');
?>

<div class="wrap woocommerce">
  <h1>MeiliSearch</h1>
  <form method="post" id="mainform" action="" enctype="multipart/form-data">
    <h1 class="screen-reader-text">Indexes</h1>
  </form>

  <?php $indexes = $client->getAllIndexes(); ?>
  <h2><?php echo count($indexes).' indexes'; ?></h2>
  <?php 
  echo '<ul style="list-style: disc; padding-left: 20px;">';
  foreach ($indexes as $index) {
    $documents = $index->getDocuments();
    echo '<li>'.$index->getUid().' ('.count($documents).' documents)</li>';
    echo '<ul style="list-style: disc; padding-left: 20px;">';
    foreach ($documents as $document) {
      $documentPreview = $document;
      echo '<li>'.$document['ID'].' - '.$document['name'].'</li>';
    };
    echo '</ul>';
  } 
  echo '</ul>';

  echo '<h3>Document preview</h3>';
  echo '<ul style="list-style: disc; padding-left: 20px;">';
  foreach ($documentPreview as $key => $value) {
    if (! is_string($value)) $value = print_r($value, true);
    echo '<li>'.$key.' : '.$value.'</li>';
  }
  echo '</ul>';
  ?>
</div>
