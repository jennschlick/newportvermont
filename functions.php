<?php

/*-----------------------------------------------------------------------------------*/
/* Add RSS feed support
/*-----------------------------------------------------------------------------------*/

add_theme_support( 'automatic-feed-links' );

/*-----------------------------------------------------------------------------------*/
/* Add post thumbnail/featured image support
/*-----------------------------------------------------------------------------------*/

if ( function_exists( 'add_theme_support' ) ) {
  add_theme_support( 'post-thumbnails' );
  add_image_size( 'homepage-thumbnail', 300, 300, true );
}

/*-----------------------------------------------------------------------------------*/
/* Add shortcode support in widgets
/*-----------------------------------------------------------------------------------*/

add_filter( 'widget_text', 'do_shortcode' );

/*-----------------------------------------------------------------------------------*/
/* Register menus
/*-----------------------------------------------------------------------------------*/

register_nav_menus(
	array(
		'main'	=>	__( 'Main Menu', 'newport' ),
		'homepage'	=>	__( 'Homepage Menu', 'newport' ),
		'footer'	=>	__( 'Footer Menu', 'newport' ),
	)
);

function prefix_nav_description( $item_output, $item, $depth, $args ) {
    if ( !empty( $item->description ) ) {
        $item_output = str_replace( $args->link_after . '</a>', '<span class="menu-item-description">' . $item->description . '</span>' . $args->link_after . '</a>', $item_output );
    }

    return $item_output;
}
add_filter( 'walker_nav_menu_start_el', 'prefix_nav_description', 10, 4 );

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

	register_sidebar(array(
		'id' => 'footer-top',
		'name' => 'Top Footer',
		'description' => '',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => '',
		'empty_title'=> '',
	));

	register_sidebar(array(
		'id' => 'footer-bottom',
		'name' => 'Bottom Footer',
		'description' => '',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => '',
		'empty_title'=> '',
	));
}
add_action( 'widgets_init', 'newport_register_sidebars' );

/*-----------------------------------------------------------------------------------*/
/* Enqueue scripts and styles
/*-----------------------------------------------------------------------------------*/

function newport_styles_scripts()  {
	wp_enqueue_style('styles', get_template_directory_uri() . '/css/styles.css');
  wp_enqueue_script('mmenu', get_template_directory_uri() . '/js/mmenu-light.js', array('jquery'), true);
  wp_enqueue_script('openweather', get_template_directory_uri() . '/js/openweather.js', array('jquery'), true);
	wp_enqueue_script('scripts', get_template_directory_uri() . '/js/scripts.js', array('jquery'), true);
}
add_action( 'wp_enqueue_scripts', 'newport_styles_scripts' );

function newport_remove_styles() {
  wp_dequeue_style('menu-image');
  // wp_dequeue_style('simcal-qtip');
  // wp_dequeue_style('simcal-default-calendar-grid');
  // wp_dequeue_style('simcal-default-calendar-list');
}
add_action( 'wp_print_styles', 'newport_remove_styles', 99 );

/*-----------------------------------------------------------------------------------*/
/* Custom shortcodes
/*-----------------------------------------------------------------------------------*/

// Site URL
// Usage: [url]
function newport_shortcode_url($atts, $content = null) {
 return get_bloginfo('url');
}
add_shortcode('url', 'newport_shortcode_url');

// Theme URL
// Usage: [theme]
function newport_shortcode_theme_url($atts, $content = null) {
 return get_bloginfo('template_url');
}
add_shortcode('theme', 'newport_shortcode_theme_url');

/*-----------------------------------------------------------------------------------*/
/* Customize the post excerpt
/*-----------------------------------------------------------------------------------*/

function newport_allowedtags() {
  return '<script>,<style>,<br>,<em>,<i>,<ul>,<ol>,<li>,<a>,<p>,<img>,<video>,<audio>';
}

if ( ! function_exists( 'newport_custom_wp_trim_excerpt' ) ) :
    function newport_custom_wp_trim_excerpt($wpse_excerpt) {
    global $post;
    $raw_excerpt = $wpse_excerpt;
    if ( '' == $wpse_excerpt ) {
    $wpse_excerpt = get_the_content('');
    $wpse_excerpt = strip_shortcodes( $wpse_excerpt );
    $wpse_excerpt = apply_filters('the_content', $wpse_excerpt);
    $wpse_excerpt = str_replace(']]>', ']]>', $wpse_excerpt);
    $wpse_excerpt = strip_tags($wpse_excerpt, newport_allowedtags());
    $excerpt_word_count = 10;
    $excerpt_length = apply_filters('excerpt_length', $excerpt_word_count);
    $tokens = array();
    $excerptOutput = '';
    $count = 0;
    preg_match_all('/(<[^>]+>|[^<>\s]+)\s*/u', $wpse_excerpt, $tokens);
    foreach ($tokens[0] as $token) {
      if ($count >= $excerpt_word_count && preg_match('/[\,\;\?\.\!]\s*$/uS', $token)) {
        $excerptOutput .= trim($token);
        break;
      }
      $count++;
      $excerptOutput .= $token;
    }
      $wpse_excerpt = trim(force_balance_tags($excerptOutput));
      $excerpt_end = ' <a href="'. esc_url( get_permalink() ) . '">' . sprintf(__( 'Read More', 'wpse' ), get_the_title()) . '</a>';
      $excerpt_more = apply_filters('excerpt_more', ' ' . $excerpt_end);
      $wpse_excerpt .= $excerpt_end;
      return $wpse_excerpt;
    }
      return apply_filters('newport_custom_wp_trim_excerpt', $wpse_excerpt, $raw_excerpt);
    }
endif;
remove_filter('get_the_excerpt', 'wp_trim_excerpt');
add_filter('get_the_excerpt', 'newport_custom_wp_trim_excerpt');

/*-----------------------------------------------------------------------------------*/
/* Advanced Custom Fields sync
/* Source: http://www.advancedcustomfields.com/resources/local-json
/*-----------------------------------------------------------------------------------*/

function newport_json_save_point( $path ) {
  $path = get_stylesheet_directory() . '/acf-json';
  return $path;
}
add_filter('acf/settings/save_json', 'newport_json_save_point');
