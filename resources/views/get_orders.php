<?php

/*
|--------------------------------------------------------------------------
| Get orders and create WP table & Collies
|
| Check if date is selected in get parameter
| Define arrays needed
|--------------------------------------------------------------------------
*/

$get = $_GET;
if (isset($get) && isset($get['selected-delivery-date'])) {
  $deliveryDate = $get['selected-delivery-date'];
} else {
  $datetime = new DateTime();
  $deliveryDate = $datetime->modify('+1 day')->format('Y-m-d');
  if (substr($deliveryDate,0,1) === "0") $deliveryDate = substr($deliveryDate,1); // Remove if day starts with a zero
}

$Collies = [];

/*
|--------------------------------------------------------------------------
| WP_Query to get Orders for delivery tomorrow
|--------------------------------------------------------------------------
*/

$loop = new WP_Query( array(
    'post_type'         => 'shop_order',
    'post_status'       => 'wc-completed',
    'posts_per_page'    => -1,
    'meta_query' => array(
      array(
        'key'     => 'Delivery Date',
        'value'   => $deliveryDate,
        'compare' => '=',
      )
    )
) );

if ( $loop->have_posts() ):
  while ( $loop->have_posts() ) : $loop->the_post();

    $postID = get_the_ID();
    $order = wc_get_order( $postID );
    $order_data = $order->get_data();
    $order_meta_data = $order->get_meta_data();
    $deliveryDate = $order_meta_data[1]->get_data()['value'];

    $order_data = addRequiredOrderData($order_data, $deliveryDate);
    $Collies = calculateNrOfCollies($order, $order_data, $Collies);

  endwhile; wp_reset_postdata();

  $tableArray = createTableArray($Collies, $deliveryDate);
endif;

/*
|--------------------------------------------------------------------------
| Set encodedCollies
|--------------------------------------------------------------------------
*/

$encodedCollies = json_encode($Collies);

/*
|--------------------------------------------------------------------------
| addRequiredOrderData
|--------------------------------------------------------------------------
*/

function addRequiredOrderData($order_data, $deliveryDate) {
  $fullName = $order_data['billing']['first_name'].' '.$order_data['billing']['last_name'];

  $order_data['nav_number'] = carbon_get_theme_option( 'woo_lm_main_client_number' );
  $order_data['delivery_window'] = carbon_get_theme_option( 'woo_lm_delivery_window_code' );

  // Check if order is company
  if ($order_data['billing']['company'] !== '') {
    $order_data['customer_name'] = $order_data['billing']['company'];
    $order_data['to_the_attention_of'] = $fullName;
  } else {
    $order_data['customer_name'] = $fullName;
  }

  $order_data['fixed_phone'] = '';
  $order_data['delivery_date'] = str_replace('-','',$deliveryDate);
  $order_data['articlenumber'] = '';

  return $order_data;
}

/*
|--------------------------------------------------------------------------
| calculateNrOfCollies
|--------------------------------------------------------------------------
*/

function calculateNrOfCollies($order, $order_data, $Collies) {
  // Calculates fresh/frozen totals
  $freshAttrID = 31;
  $frozenAttrID = 30;
  $totalFreshAmount = 0;
  $totalFrozemAmount = 0;

  $items = $order->get_items();
  foreach ($items as $item) {
    $product = wc_get_product($item->get_product_id());
    $item_quantity  = $item->get_quantity();

    if (isset($product->attributes) && isset($product->attributes['pa_cooling'])) {

      if (in_array($freshAttrID, $product->attributes['pa_cooling']['options'])) {
        $totalFreshAmount += (int)$product->price * $item_quantity;
      }

      if (in_array($frozenAttrID, $product->attributes['pa_cooling']['options'])) {
        $totalFrozemAmount += (int)$product->price * $item_quantity;
      }

    } else {
      $totalFreshAmount += (int)$product->price * $item_quantity;
    }
  }

  return setCollieRow($totalFreshAmount, $totalFrozemAmount, $Collies, $order_data);
}

/*
|--------------------------------------------------------------------------
| setCollieRow
|--------------------------------------------------------------------------
*/

function setCollieRow($totalFreshAmount, $totalFrozemAmount, $Collies, $order_data) {
  // Calculate amount of Callies for each coolingtype
  $lineNr = 1;
  // amountOfFreshCollies
  if ($totalFreshAmount !== 0) {
    $amountOfFreshCollies = ceil($totalFreshAmount / 200);
    for ($i=0; $i < $amountOfFreshCollies; $i++) {
      $order_data['article_description'] = 301;
      $order_data['line_number'] = $lineNr;
      $order_data['barcode'] = $order_data['nav_number'] . $order_data['id'] . $lineNr;
      $lineNr++;

      $Collies[] = $order_data;
    }
  }

  //amountOfFrozenCollies
  if ($totalFrozemAmount !== 0) {
    $amountOfFrozenCollies = ceil($totalFrozemAmount / 200);
    for ($i=0; $i < $amountOfFrozenCollies; $i++) {
      $order_data['article_description'] = 300;
      $order_data['line_number'] = $lineNr;
      $order_data['barcode'] = $order_data['nav_number'] . $order_data['id'] . $lineNr;
      $lineNr++;

      $Collies[] = $order_data;
    }
  }

  return $Collies;
}

/*
|--------------------------------------------------------------------------
| createTableArray
|--------------------------------------------------------------------------
*/

function createTableArray($Collies, $deliveryDate) {
  $tableArray = [];

  foreach ($Collies as $collie) {

    $tableRow[] = [
      $collie['nav_number'],
      $collie['id'],
      $collie['customer_id'],
      $deliveryDate,
      $collie['customer_id'],
      $collie['customer_name'],
      $collie['to_the_attention_of'],
      $collie['billing']['first_name'],
      $collie['billing']['last_name'],
      $collie['billing']['email'],
      $collie['billing']['phone'],
      $collie['billing']['address_1'],
      $collie['billing']['address_2'],
      '-',
      $collie['billing']['postcode'],
      $collie['billing']['city'],
      $collie['billing']['country'],
      $collie['billing']['fixed_phone'],
      $collie['delivery_window'],
      '-',
      '-',
      $collie['customer_note'],
      $collie['line_number'],
      $collie['articlenumber'],
      $collie['article_description'],
      $collie['barcode']
    ];

  }

  return $tableRow;
}
