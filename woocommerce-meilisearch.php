<?php

/**
 * Plugin Name:   Leen Menken for WooCommerce
 * Plugin URI:    https://docs.lamalama.nl/leenmenken
 * Description:   Leen Menken Foodservice Logistics Standard ASCII B2B Interface order pick
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
function register_my_style() {
    wp_register_style('woocommerce-leenmenken-style', plugins_url('/css/style.css',__FILE__ ));
    wp_enqueue_style('woocommerce-leenmenken-style');
}

add_action( 'admin_init','register_my_style');

/**
 * The core plugin class
 */
require plugin_dir_path(__FILE__).'includes/class-plugin-leenmenken.php';
// require plugin_dir_path(__FILE__).'includes/create-orderline.php';

/**
 * bootstrap_plugin_leenmenken
 * @return void
 */
function bootstrap_plugin_leenmenken()
{
    $plugin = new Plugin_Leenmenken();
    $plugin->bootstrap();
}

bootstrap_plugin_leenmenken();

