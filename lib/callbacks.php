<?php

/**
 * Create menu entry in the "Settings" section
 *
 * @return void
 */

function eangel_create_menu() {
	add_submenu_page('options-general.php', 'eAngel.me Settings', 'eAngel (Proofreading)', 'manage_options', 'eangel-settings-config', 'eangel_settings_page'   );       
}

function eangel_register_settings(){
    register_setting('eangel_settings_group', 'eangel_settings');
}

function eangel_register_sidebar_controls() {
        // id, title, callback, post_type, context, priority, callback_args
	add_meta_box('eangel_toolbox_id', 'eAngel (Proofreading)', 'eangel_toolbox_builder', 'post', 'side', 'high');
        add_meta_box('eangel_toolbox_id', 'eAngel (Proofreading)', 'eangel_toolbox_builder', 'page', 'side', 'high');
	
}

function eangel_deactivate (){
    delete_option('eangel_settings');
}

function eangel_activate (){
    $adminemail = get_option( 'admin_email' );
    $options = array("email" => $adminemail);
    add_option('eangel_settings', $options);
    
}


?>