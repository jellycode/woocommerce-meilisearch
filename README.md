# MeiliSearch for WooCommerce
[MeiliSearch](https://www.meilisearch.com/) for [WooCommerce](https://woocommerce.com/) is a WordPress plugin focussing on synchronising WooCommerce product data to MeiliSearch instances. Under the hood the plugin makes use of [MeiliSearch PHP](https://github.com/meilisearch/meilisearch-php)

⚠️ The plugin is currently in development and a first release is expected in November 2020.

## Product data
The following WooCommerce product data will be synced to the MeiliSearch instance:

* ID (int)
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

```
{
   "ID": 320,
   "attributes": [
      
   ],
   "categories": [
      {
         "term_id": 446,
         "name": "Animals",
         "slug": "animals",
         "term_group": 0,
         "term_taxonomy_id": 446,
         "taxonomy": "product_cat",
         "description": "",
         "parent": 0,
         "count": 198,
         "filter": "raw",
         "term_order": "0"
      }
   ],
   "featured": false,
   "images": [
      
   ],
   "name": "ACME",
   "on_sale": false,
   "parent_id": 0,
   "permalink": "https://woocommerce-meilisearch.lamalama.nl/product/acme/",
   "price": 9.3,
   "price_html": "<span class=\"woocommerce-Price-amount amount\"><bdi><span class=\"woocommerce-Price-currencySymbol\">&euro;</span>9,30</bdi></span>",
   "regular_price": 9.3,
   "sale_price": 0,
   "sku": "LL-001-01-01",
   "slug": "acme",
   "status": "publish",
   "stock_quantity": 48,
   "stock_status": "instock",
   "tags": [
      {
         "term_id": 243,
         "name": "ACME",
         "slug": "acme",
         "term_group": 0,
         "term_taxonomy_id": 243,
         "taxonomy": "product_tag",
         "description": "",
         "parent": 0,
         "count": 294,
         "filter": "raw",
         "term_order": "0"
      }
   ]
}
```

If you would like to see additional fields please submit an issue.

## Automatic synchronisation
Based on different WordPress / WooCommerce hooks a synchornisation process will run:

* ```save_post``` - when a post with post_type ```product``` is created or updated
* ```woocommerce_reduce_order_stock``` - when stock levels for a product are adjusted

## Manual synchronisation
The following options are available for the index.

* Re-index - Clear the index and synchronize all WooCommerce product data.
* Clear - Clear the index

If you would like to see additional synchronisation actions on different hooks please submit an issue.

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
