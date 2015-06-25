<?php
/*
  Plugin Name: JSON API Portfolio
  Plugin URI: https://github.com/ugarcia/fc-cms1.git
  Description: Extends the JSON API for REST portfolio data.
  Version: 0.0.1
  Author: Frontcoder
  Author URI: http://frontcoder.com/
  License: GPLv3
 */

define('JSON_API_PORFOLIO_VERSION', '0.0.1');
define('JSON_API_PORFOLIO_HOME', dirname(__FILE__));

include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

if (!is_plugin_active('json-api/json-api.php')) {
    return add_action('admin_notices', function() {
        echo '<div id="message" class="error fade"><p style="line-height: 150%">';
        _e('<strong>JSON API Portfolio</strong></a> requires the JSON API plugin to be activated. Please <a href="wordpress.org/plugins/json-api/‎">install / activate JSON API</a> first.', 'json-api-user');
        echo '</p></div>';
    });
}

add_filter('json_api_controllers', function($aControllers) {
    $aControllers[] = 'Portfolio';
    return $aControllers;
});

add_filter('json_api_portfolio_controller_path', function() {
    return dirname(__FILE__) . '/controllers/portfolio.php';
});

// FIXME: WTF???
load_plugin_textdomain('json-api-portfolio', false, basename(dirname(__FILE__)) . '/languages');

// FIXME: WTF???
//function json_api_auth_checkAuthCookie($sDefaultPath) {
//    global $json_api;
//    if ($json_api->query->cookie) {
//      $user_id = wp_validate_auth_cookie($json_api->query->cookie, 'logged_in');
//      if ($user_id) {
//        $user = get_userdata($user_id);
//        wp_set_current_user($user->ID, $user->user_login);
//      }
//    }
//}
//add_action('init', 'json_api_auth_checkAuthCookie', 100);