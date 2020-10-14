<?php

/**
 * Plugin Name:   MeiliSearch for WooCommerce
 * Plugin URI:    https://docs.lamalama.nl/woocommerce-meilisearch
 * Description:   MeiliSearch for WooCommerce
 * Version:       1.0.0
 * Author:        Lama Lama
 * Author URI:    https://lamalama.nl
 * License:       MIT
 * License URI:   http://opensource.org/licenses/MIT
 */

/**
 * Prevent direct access
 */
if (! defined('WPINC')) {
    die;
}

/**
 * Import vendor
 */
if (file_exists(__DIR__.'/vendor/autoload.php')) {
    require_once __DIR__.'/vendor/autoload.php';
}

/**
 * register_my_style
 */
function register_my_style()
{
    wp_register_style('woocommerce-meilisearch-style', plugins_url('/css/style.css', __FILE__ ));
    wp_enqueue_style('woocommerce-meilisearch-style');
}

add_action('admin_init', 'register_my_style');

/**
 * The core plugin class
 */
require plugin_dir_path(__FILE__).'includes/class-plugin-meilisearch.php';

/**
 * llWcmsBootstrap.
 * @return void
 */
function llWcmsBootstrap()
{
    $plugin = new WooCommerceMeiliSearch();
    $plugin->bootstrap();
}

llWcmsBootstrap();

