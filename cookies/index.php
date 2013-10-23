<?php
/*
Plugin Name: Cookies warning
Plugin URI: http://www.conejo.me/
Description: Show a warning message about the cookie usage (Cookie law)
Version: 0.0.1
Author: _CONEJO
Author URI: http://www.conejo.me/
Plugin update URI: cookies
*/


osc_register_script('jquery-cookie', osc_plugin_url(__FILE__) . 'jquery.cookie.js', array('jquery'));
osc_register_script('jquery-cookiecuttr', osc_plugin_url(__FILE__) . 'jquery.cookiecuttr.js', array('jquery', 'jquery-cookie'));
osc_enqueue_style('cookiecuttr-style', osc_plugin_url(__FILE__) . 'cookiecuttr.css');
osc_enqueue_script('jquery-cookiecuttr');

    function cookie_load() { ?>
        <script type="text/javascript" >
        $(document).ready(function () {
            $.cookieCuttr();
        });
        </script>
    <?php
    }

    function cookie_menu() {
        osc_admin_menu_plugins('Cookies settings', osc_route_admin_url('cookie-conf'), 'cookie-conf');
    }

    function cookie_install() {
        osc_set_preference('analytics_msg', 'We use cookies, just to track visits to our website, we store no personal details.', 'cookie', 'STRING');
        osc_set_preference('non_analytics_msg', 'We use cookies on this website, you can <a href="%s" title="read about our cookies">read about them here</a>. To use the website as intended please...', 'cookie', 'STRING');
        osc_set_preference('analytics_id', '', 'cookie', 'STRING');
        osc_set_preference('domain', '', 'cookie', 'STRING');
        osc_set_preference('accept', 1, 'cookie', 'BOOLEAN');
        osc_set_preference('decline', 1, 'cookie', 'BOOLEAN');
        osc_set_preference('reset', 0, 'cookie', 'BOOLEAN');
    }


    osc_add_route('cookie-conf', 'cookie/conf', 'cookie/conf', osc_plugin_folder(__FILE__).'admin/conf.php');

    osc_register_plugin(osc_plugin_path(__FILE__), 'cookie_install');
    if(OC_ADMIN!=1) {
        osc_add_hook('header', 'cookie_load', 10);
    }
    osc_add_hook('admin_menu_init', 'cookie_menu');

?>