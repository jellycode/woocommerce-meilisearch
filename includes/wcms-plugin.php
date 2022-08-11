<?php

/**
 * wcms_add_admin_menu_pages.
 *
 * @return  void
 */
function wcms_add_admin_menu_pages()
{
	add_menu_page(
		__('MeiliSearch', 'meilisearch-woocommerce'),
		__('MeiliSearch', 'meilisearch-woocommerce'),
		'manage_options',
		'woocommerce-meilisearch-index',
		'wcms_views_index',
		'data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMzYwIiBoZWlnaHQ9IjM2MCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48cmVjdCB4PSIxMDcuMzMzIiB5PSIuMTUiIHdpZHRoPSIyNzQuMzE1IiBoZWlnaHQ9IjI3NC4zMTUiIHJ4PSI5OC44MzMiIHRyYW5zZm9ybT0icm90YXRlKDIzIDEwNy4zMzMgLjE1KSIgZmlsbD0idXJsKCNwYWludDBfbGluZWFyKSIvPjxwYXRoIGZpbGwtcnVsZT0iZXZlbm9kZCIgY2xpcC1ydWxlPSJldmVub2RkIiBkPSJNNjEuMzMgMjMwLjE5OWMtMTUuMTA4LTM1LjU5MS0yMi42NjEtNTMuMzg2LTIzLjEyMi02OS44N2E4Ny4yODIgODcuMjgyIDAgMDEyNi4xODEtNjQuOGMxMS43ODMtMTEuNTM5IDI5LjU3OC0xOS4wOTIgNjUuMTY4LTM0LjIgMzUuNTktMTUuMTA3IDUzLjM4Ni0yMi42NiA2OS44Ny0yMy4xMjFhODcuMjgzIDg3LjI4MyAwIDAxNjQuODAxIDI2LjE4MWMxMS41MzggMTEuNzgzIDE5LjA5MSAyOS41NzggMzQuMTk4IDY1LjE2OCAxNS4xMDggMzUuNTkgMjIuNjYxIDUzLjM4NiAyMy4xMjIgNjkuODdhODcuMjg3IDg3LjI4NyAwIDAxLTI2LjE4MSA2NC44MDFjLTExLjc4MyAxMS41MzgtMjkuNTc4IDE5LjA5MS02NS4xNjggMzQuMTk4LTM1LjU5MSAxNS4xMDgtNTMuMzg2IDIyLjY2MS02OS44NyAyMy4xMjJhODcuMjg2IDg3LjI4NiAwIDAxLTY0LjgtMjYuMTgxYy0xMS41MzktMTEuNzgzLTE5LjA5Mi0yOS41NzgtMzQuMi02NS4xNjh6IiBmaWxsPSJ1cmwoI3BhaW50MV9saW5lYXIpIi8+PHBhdGggZmlsbC1ydWxlPSJldmVub2RkIiBjbGlwLXJ1bGU9ImV2ZW5vZGQiIGQ9Ik0yMTkuNTY4IDEzMC43NDhjMjIuNzk1IDAgMzkuNjk1IDE2LjcwMyAzOS42OTUgNDMuODIxdjU0LjQzMmgtMzIuMDMxdi00OS4zMjNjMC0xMy41NTktNi40ODUtMjAuMDQ0LTE3LjA5Ni0yMC4wNDQtNC45MTMgMC05LjgyNSAyLjE2Mi0xNC41NDEgNy44Ni4xOTYgMi4zNTguMzkzIDQuNzE2LjM5MyA3LjA3NXY1NC40MzJoLTMxLjgzNHYtNDkuMzIzYzAtMTMuNTU5LTYuNjgyLTIwLjA0NC0xNy4wOTctMjAuMDQ0LTQuOTEyIDAtOS42MjggMi4zNTgtMTQuMzQ1IDguNDV2NjAuOTE3aC0zMS44MzR2LTk1LjMwNmgzMS44MzR2NS42OTljNi40ODUtNS41MDIgMTMuMTY2LTguNjQ2IDIzLjc3OC04LjY0NiAxMS45ODcgMCAyMi4yMDUgNC41MTkgMjkuMjc5IDEyLjc3MiAxMC4wMjItOC44NDIgMTkuNjUxLTEyLjc3MiAzMy43OTktMTIuNzcyeiIgZmlsbD0iI2ZmZiIvPjxkZWZzPjxsaW5lYXJHcmFkaWVudCBpZD0icGFpbnQwX2xpbmVhciIgeDE9Ii0xMy42MjUiIHkxPSIxMjkuMjA4IiB4Mj0iMjQ0LjQ5IiB5Mj0iNDAzLjUyMiIgZ3JhZGllbnRVbml0cz0idXNlclNwYWNlT25Vc2UiPjxzdG9wIHN0b3AtY29sb3I9IiNFNDEzNTkiLz48c3RvcCBvZmZzZXQ9IjEiIHN0b3AtY29sb3I9IiNGMjNDNzkiLz48L2xpbmVhckdyYWRpZW50PjxsaW5lYXJHcmFkaWVudCBpZD0icGFpbnQxX2xpbmVhciIgeDE9IjExLjAwOSIgeTE9IjExMS42NSIgeDI9IjExMS42NSIgeTI9IjM0OC43NDciIGdyYWRpZW50VW5pdHM9InVzZXJTcGFjZU9uVXNlIj48c3RvcCBzdG9wLWNvbG9yPSIjMjQyMjJGIi8+PHN0b3Agb2Zmc2V0PSIxIiBzdG9wLWNvbG9yPSIjMkIyOTM3Ii8+PC9saW5lYXJHcmFkaWVudD48L2RlZnM+PC9zdmc+',
		58
	);

	add_submenu_page(
		'woocommerce-meilisearch-index',
		__('Index', 'meilisearch-woocommerce'),
		__('Index', 'meilisearch-woocommerce'),
		'manage_options',
		'woocommerce-meilisearch-index',
		'wcms_views_index'
	);

	add_submenu_page(
		'woocommerce-meilisearch-index',
		__('Facets', 'meilisearch-woocommerce'),
		__('Facets', 'meilisearch-woocommerce'),
		'manage_options',
		'woocommerce-meilisearch-facets',
		'wcms_views_facets'
	);

	add_submenu_page(
		'woocommerce-meilisearch-index',
		__('Settings', 'meilisearch-woocommerce'),
		__('Settings', 'meilisearch-woocommerce'),
		'manage_options',
		'woocommerce-meilisearch-settings',
		'wcms_views_settings'
	);
}
add_action('admin_menu', 'wcms_add_admin_menu_pages');

/**
 * wcms_views_index.
 */
function wcms_views_index()
{
	$pluginDirPath = plugin_dir_path(__FILE__);

	include($pluginDirPath . '../resources/views/meilisearch-index.php');
}

/**
 * wcms_views_facets.
 */
function wcms_views_facets()
{
	$pluginDirPath = plugin_dir_path(__FILE__);

	include($pluginDirPath . '../resources/views/meilisearch-facets.php');
}

/**
 * wcms_views_settings.
 */
function wcms_views_settings()
{
	$pluginDirPath = plugin_dir_path(__FILE__);

	include($pluginDirPath . '../resources/views/meilisearch-settings.php');
}

/**
 * wcms_register_settings.
 * 
 * @return void
 */
function wcms_register_settings()
{
	register_setting('wcms_plugin_options', 'wcms_plugin_options', 'wcms_plugin_options_validate');
	register_setting('wcms_facets', 'wcms_facets', 'wcms_facets_validate');

	add_settings_section('server_settings', 'Server Settings', 'wcms_plugin_section_text', 'wcms_plugin');

	add_settings_field('wcms_plugin_setting_hostname', 'Hostname', 'wcms_plugin_setting_hostname', 'wcms_plugin', 'server_settings');
	add_settings_field('wcms_plugin_setting_port', 'Port', 'wcms_plugin_setting_port', 'wcms_plugin', 'server_settings');
	add_settings_field('wcms_plugin_setting_master_key', 'Master Key', 'wcms_plugin_setting_master_key', 'wcms_plugin', 'server_settings');
}
add_action('admin_init', 'wcms_register_settings');

/**
 * wcms_plugin_section_text.
 * 
 * @return string
 */
function wcms_plugin_section_text(): string
{
	return '';
}

/**
 * wcms_plugin_setting_hostname.
 * 
 * @return void
 */
function wcms_plugin_setting_hostname()
{
	$hostname_value = '';
	$options = get_option('wcms_plugin_options');
	if ($options) {
		$hostname_value = esc_attr($options['hostname']);
	}
	echo '<input class="regular-text" id="wcms_plugin_setting_hostname" name="wcms_plugin_options[hostname]" type="text" value="' . $hostname_value . '" />';
}

/**
 * wcms_plugin_setting_port.
 * 
 * @return void
 */
function wcms_plugin_setting_port()
{

	$port_value = '';
	$options = get_option('wcms_plugin_options');
	if ($options) {
		$port_value = esc_attr($options['port']);
	}
	echo '<input class="regular-text" id="wcms_plugin_setting_port" name="wcms_plugin_options[port]" type="text" value="' . $port_value . '" />';
}

/**
 * wcms_plugin_setting_master_key.
 * 
 * @return void
 */
function wcms_plugin_setting_master_key()
{
	$master_key_value = '';
	$options = get_option('wcms_plugin_options');
	if ($options) {
		$master_key_value = esc_attr($options['master_key']);
	}
	$input = '<input type="text" class="regular-text" id="wcms_plugin_setting_master_key" name="wcms_plugin_options[master_key]" value="' . $master_key_value . '" />';
	echo $input;
}

/**
 * wcms_facets_update.
 * 
 * @return void
 */
function wcms_facets_update($option, $old_value, $value)
{
	if ($option === 'wcms_facets') {
		$index = wcms_get_index();

		if (!$index) {
			return;
		}

		if (is_array($value)) {
			$index->updateAttributesForFaceting($value);
		} else {
			$index->resetAttributesForFaceting();
		}
	}
}
add_action('updated_option', 'wcms_facets_update', 10, 3);

/**
 * wcms_get_client.
 * 
 * @return \MeiliSearch\Client
 */
function wcms_get_client()
{
	$options = get_option('wcms_plugin_options');

	if (!isset($options['hostname']) || !isset($options['master_key'])) {
		return false;
	}

	if (empty($options['hostname']) || empty($options['master_key'])) {
		return false;
	}

	return new \MeiliSearch\Client($options['hostname'] . ':' . $options['port'], $options['master_key']);
}


/**
 * wcms_get_index.
 * 
 * @param \MeiliSearch\Client $client
 * @return index
 */
function wcms_get_index()
{
	$client = wcms_get_client();

	if (!$client) {
		return false;
	}
	$index = $client->createIndex('wcms_products'); // If your index does not exist
	$index = $client->getIndex('wcms_products');    // If you already created your index

	return $index;
}

/**
 * wcms_clear_index.
 * 
 * @param  string $name
 * @return bool      
 */
function wcms_clear_index(string $name): bool
{
	$client = wcms_get_client();
	$client->getIndex($name)->deleteAllDocuments();

	return true;
}

/**
 * wcms_update_post.
 * 
 * @param  [type]  $id     
 * @param  WP_Post $post   
 * @param  [type]  $update 
 * @return [type]          
 */
function wcms_update_post($id, WP_Post $post, $update)
{
	if (get_post_type() !== 'product' || wp_is_post_revision($id) || wp_is_post_autosave($id)) {
		return $post;
	}

	$document = apply_filters('wcms_document_from_post', $post);

	if (!$document) {
		return $post;
	}

	$client = wcms_get_client();
	if (!$client) {
		return $post;
	}

	$index = $client->getIndex('wcms_products');
	$result = $index->addDocuments([
		$document
	]);

	if ('publish' !== $post->post_status) {
		$index->deleteDocument($document['ID']);
	}

	return $post;
}
add_action('save_post', 'wcms_update_post', 10, 3);

/**
 * wcms_update_post_meta.
 * 
 * @param  [type] $meta_id     
 * @param  [type] $object_id   
 * @param  [type] $meta_key    
 * @param  [type] $meta_value 
 * @return [type]                      
 */
function wcms_update_post_meta($meta_id, $object_id, $meta_key, $meta_value)
{
	// $indexedMetaKeys = ['seo_description', 'seo_title'];

	// if (in_array($meta_key, $indexedMetaKeys)) {
	//     $index = $algolia->initIndex(
	//         apply_filters('algolia_index_name', 'post')
	//     );

	//     $index->partialUpdateObject([
	//         'objectID' => 'post#'.$object_id,
	//         $meta_key => $meta_value,
	//     ]);
	// }
}
add_action('update_post_meta', 'wcms_update_post_meta', 10, 4);

/**
 * wcms_update_post_stock
 * @param  [type] $order_id 
 * @return [type]           
 */
function wcms_update_post_stock($order_id)
{
	$order = wc_get_order($order_id);

	return $order_id;
}
add_action('woocommerce_reduce_order_stock', 'wcms_update_post_stock');

/**
 * wcms_re_index
 * @param  string $index 
 * @return void        
 */
function wcms_re_index($index)
{
	//do_action('wcms_document_from_post', array());
	$client = wcms_get_client();
	$client->getIndex($index)->deleteAllDocuments();

	$paged = 1;

	do {
		$posts = new WP_Query([
			'posts_per_page' => 10,
			'paged' => $paged,
			'post_type' => 'product',
			'post_status' => 'publish',
			'suppress_filters' => true,
		]);

		if (!$posts->have_posts()) {
			break;
		}

		$documents = [];
		foreach ($posts->posts as $post) {
			$document = apply_filters('wcms_document_from_post', $post);
			if (!$document) {
				continue;
			}

			$documents[] = $document;
		}

		$result = $client->getIndex($index)->addDocuments($documents);

		$paged++;
	} while (true);


	apply_filters('wcms_filterable_attributes', $client, $index);
}

function wcms_document_from_post($post)
{
	return true;
}
function wcms_filterable_attributes($client, $index)
{
	return true;
}

add_filter('wcms_document_from_post', 'wcms_document_from_post', 10);
add_filter('wcms_filterable_attributes', 'wcms_filterable_attributes', 10, 2);
