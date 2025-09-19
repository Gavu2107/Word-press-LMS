
<?php
/*
Plugin Name: My Custom Plugin
Plugin URI: https://example.com
Description: A custom plugin to add specific functionality.
Version: 1.0
Author: G P
Author URI: https://example.com
License: GPL2
*/
 

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

/* -------------------
   SHORTCODE
------------------- */
function my_custom_hello_world() {
    $custom_text = get_option('my_custom_text', 'Hello World from my plugin!');
    return "<p>{$custom_text}</p>";
}
add_shortcode('hello_world', 'my_custom_hello_world');

/* -------------------
   ADMIN PANEL
------------------- */
add_action('admin_menu', 'my_custom_plugin_menu');

function my_custom_plugin_menu() {
    add_menu_page(
        'My Custom Plugin',       // Page title
        'My Plugin',              // Menu title
        'manage_options',         // Capability
        'my-custom-plugin',       // Menu slug
        'my_custom_plugin_page',  // Callback
        'dashicons-admin-generic', // Icon
        20                        // Position
    );
}

function my_custom_plugin_page() {
    ?>
    <div class="wrap">
        <h1>My Custom Plugin Panel</h1>
        <form method="post" action="options.php">
            <?php
            settings_fields('my_custom_plugin_options');
            do_settings_sections('my-custom-plugin');
            submit_button();
            ?>
        </form>
    </div>
    <?php
}

add_action('admin_init', 'my_custom_plugin_settings');
function my_custom_plugin_settings() {
    register_setting('my_custom_plugin_options', 'my_custom_text');

    add_settings_section(
        'my_custom_plugin_section',
        'Settings',
        function(){ echo 'Configure your plugin text here.'; },
        'my-custom-plugin'
    );

    add_settings_field(
        'my_custom_text',
        'Custom Text',
        function(){
            $value = get_option('my_custom_text', '');
            echo '<input type="text" name="my_custom_text" value="'.esc_attr($value).'" />';
        },
        'my-custom-plugin',
        'my_custom_plugin_section'
    );
}
