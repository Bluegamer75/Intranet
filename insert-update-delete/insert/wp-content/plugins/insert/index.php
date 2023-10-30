<?php
/*
Plugin Name:insert
Author: gaizka
Version: 1.0
Description:insertar en base de datos
*/

add_shortcode("insert","insert");

function insert(){

wp_enqueue_script("jquery","https://code.jquery.com/jquery-3.7.1.min.js");

wp_enqueue_script("app", plugin_dir_url(__FILE__)."/app.js");

}
?>