<?php
/*
Plugin Name: My Plugin
Plugin URI: https://example.com
Description: My Plugin
Version: 0.1.0
Author: Me
Author URI: http://myplugin.example.com
Text Domain: myplugin
Domain Path: /languages
 */
add_action( 'init', 'myplugin_do_thing' );
function myplugin_do_thing() {
	if(! isset( $_GET['wpsdt'] ) ):
		return;
	endif;

	$args = array(
		'posts_per_page' => 5,
		'post_type' => 'any',
		'post_status' => 'publish',
		'orderby' => 'date',
		'order' => 'DESC',
	);

	$query = new WP_Query( $args );

	echo "<pre>";
	var_dump( $query );
	echo "</pre>";
	die;
}
