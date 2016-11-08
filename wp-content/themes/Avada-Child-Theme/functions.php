<?php

function theme_enqueue_styles() {
    wp_enqueue_style( 'avada-parent-stylesheet', get_template_directory_uri() . '/style.css' );
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );

function avada_lang_setup() {
	$lang = get_stylesheet_directory() . '/languages';
	load_child_theme_textdomain( 'Avada', $lang );
}
add_action( 'after_setup_theme', 'avada_lang_setup' );


/**
 * Register our sidebars and widgetized areas.
 *
 */
function arphabet_widgets_init() {

	register_sidebar( array(
		'name'          => 'Footer Second',
		'id'            => 'footer_second',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="rounded">',
		'after_title'   => '</h2>',
	) );

}
add_action( 'widgets_init', 'arphabet_widgets_init' );

function custom_post_after_title(){
	echo "<div class='blog-date'><a href='".get_the_permalink()."'>". get_the_date()."</a></div>"; 
}
// post / loop basic structure
add_action( 'fusion_blog_shortcode_loop_content', 'custom_post_after_title', 10, 3 );

function enable_more_buttons($buttons) {
	$buttons[] = 'fontselect';
	$buttons[] = 'fontsizeselect';
	$buttons[] = 'styleselect';
	$buttons[] = 'backcolor';
	$buttons[] = 'newdocument';
	$buttons[] = 'cut';
	$buttons[] = 'copy';
	$buttons[] = 'charmap';
	$buttons[] = 'hr';
	$buttons[] = 'visualaid';
	return $buttons;
}
add_filter('mce_buttons_3', 'enable_more_buttons');

add_filter( 'tiny_mce_before_init', 'myformatTinyMCE' );

function myformatTinyMCE( $in ) {
	$in['wordpress_adv_hidden'] = FALSE;
	return $in;
}