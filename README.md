# MeiliSearch for WooCommerce
MeiliSearch for WooCommerce is a WordPress plugin focussing on synchronising WooCommerce product data to MeiliSearch instances.
The plugin is currently in development and a first release is expected in November 2020.

## Product data
The following WooCommerce product data will be synced to the MeiliSearch instance:

* ID: 19837 (int)
* attributes (array)
* categories (array)
* featured (bool)
* images (array)
* name (string)
* on_sale (bool)
* parent_id (int)
* permalink (string)
* price (float)
* price_html (float)
* regular_price (float)
* sale_price (float)
* sku (string)
* slug (string)
* status (string)
* stock_quantity (int)
* stock_status (string)
* tags (array)
* TBD

If you would like to see additional fields please submit a issue.

## Automatic synchronisation
Based on different WordPress / WooCommerce hooks a synchornisation process will run:

* ```save_post``` - when a post with post_type ```product``` is created or updated
* ```woocommerce_reduce_order_stock``` - when stock levels for a product are adjusted

## Manual synchronisation
The following options are available for the index.

* Re-index - Clear the index and synchronize all WooCommerce product data.
* Clear - Clear the index

If you would like to see additional synchronisation actions on different hooks please submit a issue.

## MeiliSearch instances
The plugin will support the use of a single or multiple MeiliSearch instances:

* Single instances mode
* Multiple instance mode

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Credits

- [Lama Lama](https://github.com/lamalamaNL)
- [Mark de Vries](https://github.com/lamalamaMark)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
