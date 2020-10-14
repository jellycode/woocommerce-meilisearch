<?php

class Plugin_Leenmenken
{
    public function bootstrap()
    {

    }
}

/**
 * Register a custom menu page.
 */
function wpdocs_register_my_custom_menu_page() {
    add_menu_page(
        __('Leen Menken', 'textdomain'),
        'Leen Menken',
        'manage_options',
        'woocommerce-leenmenken/resources/views/leenmenken-admin.php',
        '',
        plugins_url('woocommerce-leenmenken/resources/images/icon.png'),
        58
    );
}
add_action( 'admin_menu', 'wpdocs_register_my_custom_menu_page' );

/**
 * Carbon_Fields
 */

function dbi_load_carbon_fields() {
    \Carbon_Fields\Carbon_Fields::boot();
}
add_action( 'after_setup_theme', 'dbi_load_carbon_fields' );

use Carbon_Fields\Container;
use Carbon_Fields\Field;

function woo_lm_add_plugin_settings_page() {
    Container::make( 'theme_options', __( 'Leen Menken Settings' ) )
        ->set_page_parent( 'options-general.php' )
        ->add_fields( array(
            Field::make( 'text', 'woo_lm_main_client_number', 'Main Client number (NAV)' ),
            Field::make( 'text', 'woo_lm_delivery_window_code', 'Delivery window code' ),

        ) );
}
add_action( 'carbon_fields_register_fields', 'woo_lm_add_plugin_settings_page' );
