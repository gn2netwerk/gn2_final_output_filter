<?php
/*
Plugin Name:  gn2 Shutdown Filter
Plugin URI:   https://github.com/gn2netwerk/gn2_shutdown_filter
Description:  Provides the custom filter "gn2_shutdown"
Version:      1.0.0
Author:       gn2
Author URI:   https://www.gn2.de/
Update URI:   https://raw.githubusercontent.com/gn2netwerk/gn2_shutdown_filter/master/info.json
*/

defined('ABSPATH') || exit;

require 'vendor/autoload.php';

// enable updates
// hook name: update_plugins_ + host of Update URI
add_filter('update_plugins_raw.githubusercontent.com', function ($update, $plugin_data) {
    $res = wp_remote_get($plugin_data['UpdateURI'], ['sslverify' => false]);
    try {
        $json = json_decode($res['body']);
    } catch (Exception $ex) {
        return false;
    }

    return $json;
}, 10, 3);

ob_start();
add_action('shutdown', function () {
    $html = '';
    // alles an output einsammeln
    $levels = ob_get_level();
    for ($i = 0; $i < $levels; $i++) {
        $html .= ob_get_clean();
    }
    // filter registrieren
    echo apply_filters('gn2_shutdown', $html);
}, 0);
