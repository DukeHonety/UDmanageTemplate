<?php
 /*
   Plugin Name: User data management plugin
   description: You can manage user data from database.
   Version: 1.0.0
   Author: Duke Honesty
 */

// Create a new table
function udmanage_table(){
	global $wpdb;

	$charset_collate = $wpdb->get_charset_collate();
	$tablename = $wpdb->prefix."udmanage";
	$sql = "CREATE TABLE $tablename (
	  id mediumint(11) NOT NULL AUTO_INCREMENT,
	  user_name varchar(80) NOT NULL,
	  user_mail varchar(80) NOT NULL,
	  amazon_id varchar(80) NOT NULL,
	  modify_date datetime NOT NULL,
	  PRIMARY KEY  (id)
	) $charset_collate;";

	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
	dbDelta( $sql );
}
register_activation_hook( __FILE__, 'udmanage_table' );

// Add menu
function udmanage_menu() {

    add_menu_page("User Data Manage", "User Data Manage","manage_options", "myplugin", "displayList",plugins_url('/udmanage/img/icon.png'));
    add_submenu_page("myplugin","User Data", "User Data","manage_options", "allusers", "displayList");
    add_submenu_page("myplugin","Add new Data", "Add new Data","manage_options", "addnewdata", "addEntry");
   	
}

add_action("admin_menu", "udmanage_menu");

function displayList(){
	include "displaylist.php";
}

function addEntry(){
	include "addentry.php";
}