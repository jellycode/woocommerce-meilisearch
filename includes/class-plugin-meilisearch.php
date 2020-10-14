<?php

class WooCommerceMeiliSearch
{
    public function bootstrap()
    {

    }
}

/**
 * llWcmsAddAdminMenuPage.
 */
function llWcmsAddAdminMenuPage() {
    add_menu_page(
        __('MeiliSearch', 'textdomain'),
        'MeiliSearch',
        'manage_options',
        'woocommerce-leenmenken/resources/views/leenmenken-admin.php',
        '',
        plugins_url('woocommerce-leenmenken/resources/images/icon.png'),
        58
    );
}
add_action('admin_menu', 'llWcmsAddAdminMenuPage');
