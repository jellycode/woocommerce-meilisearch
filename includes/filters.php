<?php

/**
 * Lamapress - A Wordpress Theme Boilerplate.
 *
 * @author   Lama Lama <hello@lamalama.nl>
 */

/**
 * [algolia_post_index_name description].
 * @param  [type] $defaultName [description]
 * @return [type]              [description]
 */
function algolia_post_index_name($defaultName)
{
    global $table_prefix;

    return $table_prefix.$defaultName;
}
add_filter('algolia_index_name', 'algolia_post_index_name');

/**
 * [algolia_post_to_record description].
 * @param  WP_Post $post [description]
 * @return [type]        [description]
 */
function algolia_product_to_record(WP_Post $post)
{
    $product = new WC_Product($post->ID);

    // Visibility
    $productVisibility = $product->get_catalog_visibility();
    if ($productVisibility !== 'visible') {
        return false;
    }

    // Tags
    $tags = array_map(function (WP_Term $term) {
        return $term->name;
    }, wp_get_post_terms($post->ID, 'post_tag'));

    // Images
    $firstImageId = intval($product->get_image_id());
    $images = $product->get_gallery_image_ids();
    $extraImage = false;

    foreach ($images as $image) {
        if (intval($image) !== intval($firstImageId)) {
            $extraImage = $image;
            break;
        }
    }

    $imageID = get_post_thumbnail_id($post->ID);

    // WPML
    $wpml = apply_filters('wpml_post_language_details', null, $post->ID);

    // B2B
    // Wholesale visibility is based on the general wholesale role
    $haveWholesalePrice = get_post_meta($post->ID, 'wholesale_customer_have_wholesale_price', true);
    $b2b = ($haveWholesalePrice === 'yes')
        ? true
        : false;

    // B2C
    // When no specific wholesale roles are assigned (all) the product is visible for all (B2B & B2C) customers
    $wholesaleVisibility = get_post_meta($post->ID, 'wwpp_product_wholesale_visibility_filter', true);
    $b2c = ($wholesaleVisibility === 'all')
        ? true
        : false;

    return [
        'objectID' => implode('#', [$post->post_type, $post->ID]),
        'wpml' => ['language_code' => isset($wpml['language_code']) ? $wpml['language_code'] : ''],
        'title' => $post->post_title,
        'price' => $product->get_price(),
        'price_html' => $product->get_price_html(),
        'permalink' => $product->get_permalink(),
        'id' => $post->ID,
        'categories' => get_the_terms($post->ID, 'product_cat'),
        'tags' => get_the_terms($post->ID, 'product_tag'),
        'images' => [
            [
                'src' => wp_get_attachment_image_src($imageID, 'large')[0],
                'alt' => get_post_meta($imageID, '_wp_attachment_image_alt', true)
            ],
            [
                'src' => wp_get_attachment_image_src($extraImage, 'large')[0]
            ]
        ],
        'stock_quantity' => $product->get_stock_quantity(),
        'stock_status' => $product->get_stock_status(),
        'meta_data' => [
            'wholesale_customer_wholesale_price' => get_post_meta($post->ID, 'wholesale_customer_wholesale_price', true),
            'wholesale_customer_wholesale_minimum_order_quantity' => get_post_meta($post->ID, 'wholesale_customer_wholesale_minimum_order_quantity', true),
            'wholesale_customer_wholesale_order_quantity_step' => get_post_meta($post->ID, 'wholesale_customer_wholesale_order_quantity_step', true),
            'wholesale_customer_plus_wholesale_price' => get_post_meta($post->ID, 'wholesale_customer_plus_wholesale_price', true),
            'wholesale_customer_plus_wholesale_minimum_order_quantity' => get_post_meta($post->ID, 'wholesale_customer_plus_wholesale_minimum_order_quantity', true),
            'wholesale_customer_plus_wholesale_order_quantity_step' => get_post_meta($post->ID, 'wholesale_customer_plus_wholesale_order_quantity_step', true),
            'price_us' => (float) get_post_meta($post->ID, '_north-america_price', true),
        ],
        'wwpp_product_wholesale_visibility_filter' => $wholesaleVisibility,
        'b2b' => $b2b,
        'b2c' => $b2c
    ];
}
add_filter('product_to_record', 'algolia_product_to_record');
