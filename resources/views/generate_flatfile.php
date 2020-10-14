<?php

/*
|--------------------------------------------------------------------------
| Generate Leenmenken_Flatfile
|--------------------------------------------------------------------------
*/

$post = $_POST;

if (isset($post['encoded_collies'])) {
  $encodedCollies = json_decode($post['encoded_collies']);

  $ColliArray = [];
  foreach ($encodedCollies as $encodedColli) {
    $newlineClass = new Plugin_Leenmenken_Flatfile();
    $ColliArray[] = $newlineClass->formatline($encodedColli);
  }

  createTextfile($ColliArray);
}

/*
|--------------------------------------------------------------------------
| function createTextfile()
|--------------------------------------------------------------------------
*/

function createTextfile($ColliArray) {
    header("Content-type: text/plain");
    header("Content-Disposition: attachment; filename=leen-menken-orders.txt");

    $text = "";
    foreach ($ColliArray as $row) {
        $text .= implode("|", $row) . "\n";
    }

    return print $text;
}

/*
|--------------------------------------------------------------------------
| class Plugin_Leenmenken_Flatfile
|--------------------------------------------------------------------------
*/

class Plugin_Leenmenken_Flatfile
{
    public function formatLine($orderLine)
    {
        return [
            'NAV number' => isset($orderLine->nav_number) ? $orderLine->nav_number : '',
            'ordernumber' => isset($orderLine->id) ? $orderLine->id : '',
            'Customer reference' => isset($orderLine->customer_id) ? $orderLine->customer_id : '',
            'Delivery date' => isset($orderLine->delivery_date) ? $orderLine->delivery_date : '',
            'Customer number' => isset($orderLine->customer_id) ? $orderLine->customer_id : '',
            'Customer name' => isset($orderLine->customer_name) ? $orderLine->customer_name : '',
            'To the attention of:' => isset($orderLine->to_the_attention_of) ? $orderLine->to_the_attention_of : '',
            '8' => '',
            '9' => '',
            '10' => '',
            '11' => '',
            '12' => '',
            '13' => '',
            '14' => '',
            '15' => '',
            '16' => '',
            '17' => '',
            '18' => '',
            '19' => '',
            '20' => '',
            '21' => '',
            '22' => '',
            '23' => '',
            '24' => '',
            '25' => '',
            '26' => '',
            '27' => '',
            '28' => '',
            '29' => '',
            '30' => '',
            'First name' => isset($orderLine->billing->first_name) ? $orderLine->billing->first_name : '',
            'Last name' => isset($orderLine->billing->last_name) ? $orderLine->billing->last_name : '',
            'e-mail' => isset($orderLine->billing->email) ? $orderLine->billing->email : '',
            'telephone' => isset($orderLine->billing->phone) ? $orderLine->billing->phone : '',
            '35' => '',
            '36' => '',
            '37' => '',
            '38' => '',
            '39' => '',
            '40' => '',
            '41' => '',
            '42' => '',
            '43' => '',
            '44' => '',
            '45' => '',
            '46' => '',
            '47' => '',
            '48' => '',
            '49' => '',
            '50' => '',
            'adress' => isset($orderLine->billing->address_1) ? $orderLine->billing->address_1 : '',
            'House number' => isset($orderLine->billing->address_2) ? $orderLine->billing->address_2 : '',
            'House number suffix' => isset($orderLine->xxx) ? $orderLine->xxx : '',
            'postal code' => isset($orderLine->billing->postcode) ? $orderLine->billing->postcode : '',
            'Place' => isset($orderLine->billing->city) ? $orderLine->billing->city : '',
            'Country' => isset($orderLine->billing->country) ? $orderLine->billing->country : '',
            'Fixed telephone number' => isset($orderLine->fixed_phone) ? $orderLine->fixed_phone : '',
            '58' => '',
            '59' => '',
            '60' => '',
            '61' => '',
            '62' => '',
            '63' => '',
            '64' => '',
            '65' => '',
            '66' => '',
            '67' => '',
            '68' => '',
            '69' => '',
            '70' => '',
            'Delivery window' => isset($orderLine->delivery_window) ? $orderLine->delivery_window : '',
            'from' => isset($orderLine->xxx) ? $orderLine->xxx : '',
            'until ' => isset($orderLine->xxx) ? $orderLine->xxx : '',
            'Delivery instructions' => isset($orderLine->customer_note) ? $orderLine->customer_note : '',
            '75' => '',
            '76' => '',
            '77' => '',
            '78' => '',
            '79' => '',
            '80' => '',
            '81' => '',
            '82' => '',
            '83' => '',
            '84' => '',
            '85' => '',
            '86' => '',
            '87' => '',
            '88' => '',
            '89' => '',
            '90' => '',
            'line number' => isset($orderLine->line_number) ? $orderLine->line_number : '',
            'articlenumber' => isset($orderLine->articlenumber) ? $orderLine->articlenumber : '',
            'article description' => isset($orderLine->article_description) ? $orderLine->article_description : '',
            'number ' => '1',
            '95' => '',
            '96' => '',
            'barcode' => isset($orderLine->barcode) ? $orderLine->barcode : '',
            '98' => '',
            '99' => '',
            '100' => '',
            '101' => '',
            '102' => '',
            '103' => '',
            '104' => '',
            '105' => '',
            '106' => '',
            '107' => '',
            '108' => '',
            '109' => '',
            '110' => '',
            '111' => '',
            '112' => '',
            '113' => '',
            '114' => '',
            '115' => '',
            '116' => '',
            '117' => '',
            '118' => '',
            '119' => '',
            '120' => '',
        ];
    }
}
