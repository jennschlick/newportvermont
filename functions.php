<?php

/*-----------------------------------------------------------------------------------*/
/* Add RSS feed support
/*-----------------------------------------------------------------------------------*/
add_theme_support( 'automatic-feed-links' );

/*-----------------------------------------------------------------------------------*/
/* Add post thumbnail/featured image support
/*-----------------------------------------------------------------------------------*/
add_theme_support( 'post-thumbnails' );

/*-----------------------------------------------------------------------------------*/
/* Register menus
/*-----------------------------------------------------------------------------------*/
register_nav_menus(
	array(
		'primary'	=>	__( 'Primary Menu', 'newport' ),
	)
);

/*-----------------------------------------------------------------------------------*/
/* Register sidebar
/*-----------------------------------------------------------------------------------*/
function newport_register_sidebars() {
	register_sidebar(array(
		'id' => 'sidebar',
		'name' => 'Sidebar',
		'description' => '',
		'before_widget' => '<div>',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
		'empty_title'=> '',
	));
}
add_action( 'widgets_init', 'newport_register_sidebars' );

/*-----------------------------------------------------------------------------------*/
/* Enqueue scripts and styles
/*-----------------------------------------------------------------------------------*/

function newport_scripts()  {
	wp_enqueue_style('style.css', get_stylesheet_directory_uri() . 'css/styles.css');
	wp_enqueue_script( 'naked', get_template_directory_uri() . '/js/scripts.js', array(), newport_VERSION, true );
}
add_action( 'wp_enqueue_scripts', 'newport_scripts' );
