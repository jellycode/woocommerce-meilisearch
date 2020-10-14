<?php

/*
|--------------------------------------------------------------------------
| selected_delivery_day
|--------------------------------------------------------------------------
*/

$post = $_POST;

if (isset($post['selected_delivery_day'])) {
  $date = $post['selected_delivery_day'];

  $referer = $_SERVER['HTTP_REFERER'];
  header("Location: $referer&selected-delivery-date=$date");
}
