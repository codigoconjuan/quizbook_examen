<?php
if(! defined('ABSPATH')) exit;



function quizbook_examen_post_type() {
	$labels = array(
		'name'               => _x( 'Examenes', 'post type general name', '' ),
		'singular_name'      => _x( 'Examen', 'post type singular name', '' ),
		'menu_name'          => _x( 'Examenes', 'admin menu', '' ),
		'name_admin_bar'     => _x( 'Examen', 'add new on admin bar', '' ),
		'add_new'            => _x( 'Agregar Nuevo', 'book', '' ),
		'add_new_item'       => __( 'Agregar New Examen', '' ),
		'new_item'           => __( 'Nuevo Examen', '' ),
		'edit_item'          => __( 'Editar Examen', '' ),
		'view_item'          => __( 'Ver Examen', '' ),
		'all_items'          => __( 'Todos Examenes', '' ),
		'search_items'       => __( 'Buscar Examenes', '' ),
		'parent_item_colon'  => __( 'Padre Examenes:', '' ),
		'not_found'          => __( 'No hay examenes aún.', '' ),
		'not_found_in_trash' => __( 'No hay examenes en el basurero.', '' )
	);

	$args = array(
		'labels'             => $labels,
        'description'        => __( 'Añade la posibilidad de crear examenes a tus Quizes', '' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'examenes' ),
		'capability_type'    => array('examen', 'examenes'),
        'menu_position'      => 7,
        'menu_icon'          => 'dashicons-welcome-write-blog',
		'has_archive'        => true,
		'hierarchical'       => false,
        'supports'           => array( 'title' ),
        'map_meta_cap'       => true,
	);

	register_post_type( 'examenes', $args );
}

add_action( 'init', 'quizbook_examen_post_type' );

/**
 * Flush rewrite rules on activation.
 */
function quizbook_examenes_rewrite_flush() {
	quizbook_examen_post_type();
	flush_rewrite_rules();
}
   