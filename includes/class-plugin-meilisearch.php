<?php

use MeiliSearch\Client;

class WooCommerceMeiliSearch
{
    public function bootstrap()
    {

    }
}

/**
 * llWcmsAddAdminMenuPage.
 *
 * @return  void
 */
function llWcmsAddAdminMenuPage() {
    add_menu_page(
        __('MeiliSearch', 'meilisearch-woocommerce'),
        __('MeiliSearch', 'meilisearch-woocommerce'),
        'manage_options',
        'woocommerce-meilisearch/resources/views/meilisearch-indexes.php',
        '',
        'data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMzYwIiBoZWlnaHQ9IjM2MCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48cmVjdCB4PSIxMDcuMzMzIiB5PSIuMTUiIHdpZHRoPSIyNzQuMzE1IiBoZWlnaHQ9IjI3NC4zMTUiIHJ4PSI5OC44MzMiIHRyYW5zZm9ybT0icm90YXRlKDIzIDEwNy4zMzMgLjE1KSIgZmlsbD0idXJsKCNwYWludDBfbGluZWFyKSIvPjxwYXRoIGZpbGwtcnVsZT0iZXZlbm9kZCIgY2xpcC1ydWxlPSJldmVub2RkIiBkPSJNNjEuMzMgMjMwLjE5OWMtMTUuMTA4LTM1LjU5MS0yMi42NjEtNTMuMzg2LTIzLjEyMi02OS44N2E4Ny4yODIgODcuMjgyIDAgMDEyNi4xODEtNjQuOGMxMS43ODMtMTEuNTM5IDI5LjU3OC0xOS4wOTIgNjUuMTY4LTM0LjIgMzUuNTktMTUuMTA3IDUzLjM4Ni0yMi42NiA2OS44Ny0yMy4xMjFhODcuMjgzIDg3LjI4MyAwIDAxNjQuODAxIDI2LjE4MWMxMS41MzggMTEuNzgzIDE5LjA5MSAyOS41NzggMzQuMTk4IDY1LjE2OCAxNS4xMDggMzUuNTkgMjIuNjYxIDUzLjM4NiAyMy4xMjIgNjkuODdhODcuMjg3IDg3LjI4NyAwIDAxLTI2LjE4MSA2NC44MDFjLTExLjc4MyAxMS41MzgtMjkuNTc4IDE5LjA5MS02NS4xNjggMzQuMTk4LTM1LjU5MSAxNS4xMDgtNTMuMzg2IDIyLjY2MS02OS44NyAyMy4xMjJhODcuMjg2IDg3LjI4NiAwIDAxLTY0LjgtMjYuMTgxYy0xMS41MzktMTEuNzgzLTE5LjA5Mi0yOS41NzgtMzQuMi02NS4xNjh6IiBmaWxsPSJ1cmwoI3BhaW50MV9saW5lYXIpIi8+PHBhdGggZmlsbC1ydWxlPSJldmVub2RkIiBjbGlwLXJ1bGU9ImV2ZW5vZGQiIGQ9Ik0yMTkuNTY4IDEzMC43NDhjMjIuNzk1IDAgMzkuNjk1IDE2LjcwMyAzOS42OTUgNDMuODIxdjU0LjQzMmgtMzIuMDMxdi00OS4zMjNjMC0xMy41NTktNi40ODUtMjAuMDQ0LTE3LjA5Ni0yMC4wNDQtNC45MTMgMC05LjgyNSAyLjE2Mi0xNC41NDEgNy44Ni4xOTYgMi4zNTguMzkzIDQuNzE2LjM5MyA3LjA3NXY1NC40MzJoLTMxLjgzNHYtNDkuMzIzYzAtMTMuNTU5LTYuNjgyLTIwLjA0NC0xNy4wOTctMjAuMDQ0LTQuOTEyIDAtOS42MjggMi4zNTgtMTQuMzQ1IDguNDV2NjAuOTE3aC0zMS44MzR2LTk1LjMwNmgzMS44MzR2NS42OTljNi40ODUtNS41MDIgMTMuMTY2LTguNjQ2IDIzLjc3OC04LjY0NiAxMS45ODcgMCAyMi4yMDUgNC41MTkgMjkuMjc5IDEyLjc3MiAxMC4wMjItOC44NDIgMTkuNjUxLTEyLjc3MiAzMy43OTktMTIuNzcyeiIgZmlsbD0iI2ZmZiIvPjxkZWZzPjxsaW5lYXJHcmFkaWVudCBpZD0icGFpbnQwX2xpbmVhciIgeDE9Ii0xMy42MjUiIHkxPSIxMjkuMjA4IiB4Mj0iMjQ0LjQ5IiB5Mj0iNDAzLjUyMiIgZ3JhZGllbnRVbml0cz0idXNlclNwYWNlT25Vc2UiPjxzdG9wIHN0b3AtY29sb3I9IiNFNDEzNTkiLz48c3RvcCBvZmZzZXQ9IjEiIHN0b3AtY29sb3I9IiNGMjNDNzkiLz48L2xpbmVhckdyYWRpZW50PjxsaW5lYXJHcmFkaWVudCBpZD0icGFpbnQxX2xpbmVhciIgeDE9IjExLjAwOSIgeTE9IjExMS42NSIgeDI9IjExMS42NSIgeTI9IjM0OC43NDciIGdyYWRpZW50VW5pdHM9InVzZXJTcGFjZU9uVXNlIj48c3RvcCBzdG9wLWNvbG9yPSIjMjQyMjJGIi8+PHN0b3Agb2Zmc2V0PSIxIiBzdG9wLWNvbG9yPSIjMkIyOTM3Ii8+PC9saW5lYXJHcmFkaWVudD48L2RlZnM+PC9zdmc+',
        58
    );

    add_submenu_page(
        'woocommerce-meilisearch/resources/views/meilisearch-indexes.php',
        __('Indexes', 'meilisearch-woocommerce'),
        __('Indexes', 'meilisearch-woocommerce'),
        'manage_options',
        'woocommerce-meilisearch/resources/views/meilisearch-indexes.php',
        ''
    );

    add_submenu_page(
        'woocommerce-meilisearch/resources/views/meilisearch-indexes.php',
        __('Settings', 'meilisearch-woocommerce'),
        __('Settings', 'meilisearch-woocommerce'),
        'manage_options',
        'woocommerce-meilisearch/resources/views/meilisearch-settings.php',
        ''
    );
}
add_action('admin_menu', 'llWcmsAddAdminMenuPage');

/**
 * llWcmsGetClient
 * 
 * @return \MeiliSearch\Client
 */
function llWcmsGetClient()
{
    return new Client('http://188.166.32.110:7700', 'KWzsqSuOT45Jj9Gnw0RF');
}

/**
 * llWcmsEmptyIndex.
 * 
 * @param  string $name
 * @return bool      
 */
function llWcmsEmptyIndex(string $name): bool
{
    $client = llWcmsGetClient();
    $client->getIndex($name)->deleteAllDocuments();

    return true;
}

/**
 * llWcmsUpdatePost.
 * 
 * @param  [type]  $id     
 * @param  WP_Post $post   
 * @param  [type]  $update 
 * @return [type]          
 */
function llWcmsUpdatePost($id, WP_Post $post, $update)
{
    if (get_post_type() !== 'product' || wp_is_post_revision($id) || wp_is_post_autosave($id)) {
        return $post;
    }

    $product = new WC_Product($post->ID);

    $document = [
        'ID' => $product->get_ID(),
        'attributes' => $product->get_attributes(),
        'categories' => get_the_terms($product->get_ID(), 'product_cat'),
        'featured' => $product->get_featured(),
        'images' => [],
        'name' => $product->get_title(),
        'on_sale' => $product->is_on_sale(),
        'parent_id' => $product->get_parent_id(),
        'permalink' => $product->get_permalink(),
        'price' => (float) $product->get_price(),
        'price_html' => $product->get_price_html(),
        'regular_price' => (float) $product->get_regular_price(),
        'sale_price' => (float) $product->get_sale_price(),
        'sku' => $product->get_sku(),
        'slug' => $product->get_slug(),
        'status' => $product->get_status(),
        'stock_quantity' => $product->get_stock_quantity(),
        'stock_status' => $product->get_stock_status(),
        'tags' => wp_get_object_terms($product->get_ID(), 'product_tag'),
    ];

    $client = llWcmsGetClient();
    $index = $client->getIndex('wcms_products');

    $result = $index->addDocuments([
        $document
    ]);

    if ('trash' == $post->post_status) {
        $index->deleteDocument($document['ID']);
    }

    return $post;
}
add_action('save_post', 'llWcmsUpdatePost', 10, 3);

/**
 * llWcmsUpdatePostStock
 * @param  [type] $order_id 
 * @return [type]           
 */
function llWcmsUpdatePostStock($order_id)
{
    return $order_id;
}
add_action('woocommerce_reduce_order_stock', 'llWcmsUpdatePostStock');

/**
 * llWcmsReIndex
 * @param  string $index 
 * @return void        
 */
function llWcmsReIndex($index)
{
    $client = llWcmsGetClient();
    $client->getIndex($index)->deleteAllDocuments();

    $paged = 1;
    $count = 0;
    do {
        $posts = new WP_Query([
            'posts_per_page' => 10,
            'paged' => $paged,
            'post_type' => 'product',
            'post_status' => 'publish',
            'suppress_filters' => true,
        ]);

        if (! $posts->have_posts()) {
            break;
        }

        $documents = [];
        foreach ($posts->posts as $post) {
            $product = new WC_Product($post->ID);

            $document = [
                'ID' => $product->get_ID(),
                'attributes' => $product->get_attributes(),
                'categories' => get_the_terms($product->get_ID(), 'product_cat'),
                'featured' => $product->get_featured(),
                'images' => [],
                'name' => $product->get_title(),
                'on_sale' => $product->is_on_sale(),
                'parent_id' => $product->get_parent_id(),
                'permalink' => $product->get_permalink(),
                'price' => (float) $product->get_price(),
                'price_html' => $product->get_price_html(),
                'regular_price' => (float) $product->get_regular_price(),
                'sale_price' => (float) $product->get_sale_price(),
                'sku' => $product->get_sku(),
                'slug' => $product->get_slug(),
                'status' => $product->get_status(),
                'stock_quantity' => $product->get_stock_quantity(),
                'stock_status' => $product->get_stock_status(),
                'tags' => wp_get_object_terms($product->get_ID(), 'product_tag'),
            ];

            $documents[] = $document;
            $count++;
        }

        $result = $client->getIndex($index)->addDocuments($documents);

        $paged++;
    } while (true);
}
