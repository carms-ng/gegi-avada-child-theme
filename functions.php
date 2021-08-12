<?php

// Function to wire the stylesheet is updated as per
// https://theme-fusion.com/forums/topic/styling-in-child-themes-style-css-file-not-working/
function theme_enqueue_styles() {
  wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', [] );
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles', 20 );

function avada_lang_setup() {
	$lang = get_stylesheet_directory() . '/languages';
	load_child_theme_textdomain( 'Avada', $lang );
}
add_action( 'after_setup_theme', 'avada_lang_setup' );

// Register Custom Post Type - school board
function school_board_post_type() {

	$labels = array(
		'name'                  => _x( 'School Boards', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'School Board', 'Post Type Singular Name', 'text_domain' ),
	);
	$args = array(
		'labels'                => $labels,
    'hierarchical'          => true,
		'menu_icon'             => 'dashicons-clipboard',
		'public'                => true,
    'has_archive'           => false,
    'supports'              => array('title'),
    'publicly_queryable'    => false,
	);
	register_post_type( 'school-board', $args );
}

add_action( 'init', 'school_board_post_type', 0 );

// Register Custom Post Type - Organization
function organization_post_type() {
	$labels = array(
		'name'                  => _x( 'Organizations', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Organization', 'Post Type Singular Name', 'text_domain' ),
	);
	$args = array(
		'labels'                => $labels,
    'hierarchical'          => true,
    'taxonomies'            => array('category'),
		'menu_icon'             => 'dashicons-heart',
		'public'                => true,
    'has_archive'           => false,
    'supports'              => array('title'),
    'publicly_queryable'    => false,
	);
	register_post_type( 'organizations', $args );
}

add_action( 'init', 'organization_post_type', 0 );
