<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function churnsolution_handle_upgrade(){

    global $wpdb;

    $churnsolution_db_version = get_option("churnsolution_db_version");

    //if we can't find the DB tables, reset db_version to 0
    $wpdb->hide_errors();
    $table_exists = $wpdb->query("SHOW TABLES LIKE '" . $wpdb->churnsolution_connection . "'");
    if(!$table_exists)
        $churnsolution_db_version = 0;

    //default options
    if(!$churnsolution_db_version) {
        require_once(CHURNSOLUTION_DIR . "/includes/churnsolution-upgrade-1.php");

        $churnsolution_db_version = churnsolution_upgrade_1();

        update_option("churnsolution_db_version", "1");
    }

    add_option( 'churnsolution_db_version', $churnsolution_db_version );

}

function churnsolution_db_delta(){
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');

    global $wpdb;
    $wpdb->hide_errors();
    $wpdb->churnsolution_connection = $wpdb->prefix . 'churnsolution_connection';

    $charset_collate = '';
    if ( $wpdb->has_cap( 'collation' ) ) {
        $charset_collate = $wpdb->get_charset_collate();
    }

    $sql = "CREATE TABLE `" . $wpdb->churnsolution_connection . "` (
		`id` int(11) unsigned NOT NULL AUTO_INCREMENT,
		`gateway` varchar(1024) NOT NULL,
		`api_key` varchar(1024) NOT NULL,
		`app_id` varchar(1024) NOT NULL,
		PRIMARY KEY  (`id`)
	) $charset_collate;";

    dbDelta($sql);

}