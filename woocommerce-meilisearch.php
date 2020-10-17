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

if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly
}

/**
 * Import vendor
 */
if (file_exists(__DIR__.'/vendor/autoload.php')) {
    require_once __DIR__.'/vendor/autoload.php';
}

/**
 * llWcmsRegisterStyles
 */
function llWcmsRegisterStyles()
{
    wp_register_style('woocommerce-meilisearch', plugins_url('/css/style.css', __FILE__ ));
    wp_enqueue_style('woocommerce-meilisearch');
}

add_action('admin_init', 'llWcmsRegisterStyles');

/**
 * llWcmsRegisterScripts
 */
function llWcmsRegisterScripts()
{
    wp_register_script('woocommerce-meilisearch', plugins_url('/js/woocommerce-meilisearch.js', __FILE__ ));
    wp_enqueue_script('woocommerce-meilisearch');
    wp_enqueue_script('meilisearch', 'https://cdn.jsdelivr.net/npm/meilisearch@latest/dist/bundles/meilisearch.umd.js');
}

add_action('admin_init', 'llWcmsRegisterScripts');

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

