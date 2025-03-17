<?php
/**
 * Events Post Types registrations.
 *
 * @package awc-boilerplate
 * @author Dapo Obembe
 * 
 * @since 1.0.0
 */

function events_post_types() {
	register_post_type(
		'event',
		array(
			'supports'     => array( 'title', 'editor', 'thumbnail' ),
			'public'       => true,
			'show_in_rest' => true,
			'menu_icon'    => 'dashicons-calendar',
			'has_archive'  => true,
			'has_category' => true,
			'taxonomies'   => array( 'post_tag' ),
			'labels'       => array(
				'name'          => 'Events',
				'add_new_item'  => 'Add New Event',
				'edit_item'     => 'Edit Event',
				'all_items'     => 'All Events',
				'singular_name' => 'Event',
			),

		)
	);
}
add_action( 'init', 'events_post_types' );
