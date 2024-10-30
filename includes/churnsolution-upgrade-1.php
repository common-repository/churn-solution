<?php

if ( ! defined( 'ABSPATH' ) ) exit;

function churnsolution_upgrade_1(){
    global $wpdb;

    
    churnsolution_db_delta();

    return 1;
}