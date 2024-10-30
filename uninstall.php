<?php


// exit if uninstall/delete not called
if (!defined('ABSPATH') || !defined('WP_UNINSTALL_PLUGIN'))
    exit();

global $wpdb;

$tables = array(
    'churnsolution_connection'
);

foreach ($tables as $table) {
    $delete_table = $wpdb->prefix . $table;
    // setup sql query
    $sql = "DROP TABLE `$delete_table`";
    // run the query
    $wpdb->query($sql);
}

$sql = "DELETE FROM $wpdb->options WHERE option_name LIKE 'churnsolution_%'";
$wpdb->query($sql);
