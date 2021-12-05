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
add_shortcode( 'myplugin_show_this_months_posts_by_author', 'myplugin_show_this_months_posts_by_author' );
function myplugin_show_this_months_posts_by_author() {
	if(! current_user_can( 'administrator' ) ):
		return;
	endif;

	$args = array(
		'posts_per_page' => -1,
		'post_type' => 'any',
		'post_status' => 'publish',
		'date_query' => array(
			'after' => array(
				'year' => date( 'Y' ),
				'month' => date( 'm' ),
				'day' => 1,
			),
		),
		'orderby' => 'date',
		'order' => 'DESC',
	);

	$query = new WP_Query( $args );

	ob_start();

	while( $query->have_posts() ):
		$query->the_post(); ?>

		<h2><?php the_title(); ?></h2>
		By <?php the_author(); ?> on <?php the_date(); ?>
	<?php
	endwhile;

	wp_reset_postdata();

	return ob_get_clean();
}
