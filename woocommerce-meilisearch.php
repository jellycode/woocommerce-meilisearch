<?php

/**
 * Plugin Name:   MeiliSearch for WooCommerce
 * Plugin URI:    https://jellycode.com
 * Description:   MeiliSearch for WooCommerce is a WordPress plugin focussing on synchronising WooCommerce product data to MeiliSearch instances.
 * Version:       1.0.5
 * Author:        Jellycode
 * Author URI:    https://jellycode.com
 * License:       MIT
 * License URI:   http://opensource.org/licenses/MIT
 */

defined('ABSPATH') || exit;

/**
 * Import vendor
 */
if (file_exists(__DIR__ . '/vendor/autoload.php')) {
	require_once __DIR__ . '/vendor/autoload.php';
}

/**
 * wcms_register_styles.
 */
function wcms_register_styles()
{
	wp_register_style('woocommerce-meilisearch', plugins_url('/css/woocommerce-meilisearch.css', __FILE__));
	wp_enqueue_style('woocommerce-meilisearch');
}

add_action('admin_init', 'wcms_register_styles');

/**
 * wcms_register_scripts.
 */
function wcms_register_scripts()
{
	wp_register_script('woocommerce-meilisearch', plugins_url('/js/woocommerce-meilisearch.js', __FILE__));

	wp_enqueue_script('woocommerce-meilisearch');
	wp_enqueue_script('meilisearch', 'https://cdn.jsdelivr.net/npm/meilisearch@latest/dist/bundles/meilisearch.umd.js');
}
add_action('admin_init', 'wcms_register_scripts');
add_action('wp_enqueue_scripts', 'wcms_register_scripts');

/**
 * wcms_add_plugin_page_settings_link.
 *
 * @return  array
 */
function wcms_add_plugin_page_settings_link($links)
{
	$wcmsLinks[] = '<a href="' . admin_url('admin.php?page=woocommerce-meilisearch-settings') . '">' . __('Settings') . '</a>';
	$wcmsLinks[] = '<a href="' . admin_url('admin.php?page=woocommerce-meilisearch-index') . '">' . __('Index') . '</a>';
	$wcmsLinks[] = $links['deactivate'];

	return $wcmsLinks;
}
add_filter('plugin_action_links_' . plugin_basename(__FILE__), 'wcms_add_plugin_page_settings_link');

/**
 * wcms_admin_footer_js.
 */
function wcms_admin_footer_js()
{
	$options = get_option('wcms_plugin_options');

	$client = wcms_get_client();

	if (!$client) {
		return;
	}

	$keys = [];

	try {

		$keys = $client->getKeys();
	} catch (Exception $e) {
		ray($e);
	}


	if (!isset($options['hostname']) || !isset($options['port']) || !isset($keys['public'])) {
		return;
	}

	echo '<script>var wcms = {"hostname": "' . $options['hostname'] . '", "port": "' . $options['port'] . '", "public_key": "' . $keys['public'] . '", "index": "wcms_products", }</script>';
}
add_action('admin_print_footer_scripts', 'wcms_admin_footer_js');
add_action('print_footer_scripts', 'wcms_admin_footer_js');

/**
 * Plugin files
 */
require plugin_dir_path(__FILE__) . 'includes/wcms-plugin.php';
require plugin_dir_path(__FILE__) . 'includes/wcms-shortcode.php';
