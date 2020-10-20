<?php

/**
 * Plugin Name:   MeiliSearch for WooCommerce
 * Plugin URI:    https://lamalama.nl
 * Description:   MeiliSearch for WooCommerce is a WordPress plugin focussing on synchronising WooCommerce product data to MeiliSearch instances.
 * Version:       0.0.1
 * Author:        Lama Lama
 * Author URI:    https://lamalama.nl
 * License:       MIT
 * License URI:   http://opensource.org/licenses/MIT
 */

if (! defined('ABSPATH')) {
  exit; // Exit if accessed directly
}

/**
 * Import vendor
 */
if (file_exists(__DIR__.'/vendor/autoload.php')) {
    require_once __DIR__.'/vendor/autoload.php';
}
