<?php
/**
 * funciones para crear las paginas necesarias 
 */
function create_page_id( $slug, $option = '', $page_title = '', $page_content = '', $post_parent = 0 ) {
	global $wpdb;

	$page_data = array(
		'post_status'    => 'publish',
		'post_type'      => 'page',
		'post_author'    => 1,
		'post_name'      => $slug,
		'post_title'     => $page_title,
		'post_content'   => $page_content,
		'post_parent'    => $post_parent,
		'comment_status' => 'closed',
	);
	$page_id   = wp_insert_post( $page_data );

	if ( $option ) {
		update_option( $option, $page_id );
	}

	return $page_id;
}
function create_pages() {

	$pages = apply_filters(
		'nasa_create_pages',
		array(
			'Nasa landing astronautas'      => array(
				'name'    => _x( 'Nasa landing astronautas', 'Page slug', 'nasa' ),
				'title'   => _x( 'Nasa landing astronautas', 'Page title', 'nasa' ),
				'content' => '<!-- wp:shortcode -->[formulario-candidatos]<!-- /wp:shortcode -->',
			),
			'Nasa gracias'      => array(
				'name'    => _x( 'Nasa gracias', 'Page slug', 'nasa' ),
				'title'   => _x( 'Nasa gracias', 'Page title', 'nasa' ),
				'content' => '<!-- wp:shortcode -->[mensaje]<!-- /wp:shortcode -->',
			)
		)
	);

	foreach ( $pages as $key => $page ) {
		create_page_id( esc_sql( $page['name'] ), 'nasa_' . $key . '_page_id', $page['title'], $page['content']);
	}
}
?>