<?php
/*
Plugin Name: eAngel.me Proofreading Your Wordpress Content
Plugin URI: 
Description: 24/7 Professional proofreading service for your wordpress content.
Version: 1.2.0
Author: eAngel.me
Author URI: http://eangel.me/
*/

define('EANGEL_PLUGIN_DIR', WP_PLUGIN_DIR . '/' . plugin_basename(dirname(__FILE__)));

// Globals


$eangel_options = get_option('eangel_settings');

require_once EANGEL_PLUGIN_DIR.'/lib/views.php';
require_once EANGEL_PLUGIN_DIR.'/lib/callbacks.php';
require_once EANGEL_PLUGIN_DIR.'/lib/ajax.php';
require_once EANGEL_PLUGIN_DIR.'/lib/utility.php';

//function eangel_add_content($content){
//
//	return $content.' add conent';
//}

//add_filter('the_content', 'eangel_add_content');

/*
 * Register admin menu and header components
 */
add_action('admin_menu', 'eangel_create_menu');

add_action('admin_init', 'eangel_register_settings');


// Register the side bar for posts and page
add_action('admin_menu', 'eangel_register_sidebar_controls');

// Bind ajax command
add_action('wp_ajax_eangel_send', 'eangel_send');


// Controls what happens when we activate the plugin
register_deactivation_hook( __FILE__, 'eangel_deactivate');
register_activation_hook( __FILE__, 'eangel_activate');