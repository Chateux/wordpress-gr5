<?php
/* Enqueue Styles and Scripts */
function my_scripts_styles() {
    wp_enqueue_style('boostrap-css', get_template_directory_uri().'/css/bootstrap.min.css');
    wp_enqueue_style('main_style', get_stylesheet_uri());
    wp_enqueue_script('bootstrap-js', get_template_directory_uri().'/js/bootstrap.min.js');
}

add_action('wp_enqueue_scripts', 'my_scripts_styles');

/* Navigation */
function my_menus() {
    register_nav_menu('main_menu', 'Menu Principal');
    register_nav_menu('footer_menu', 'Menu Pied de page');
}

add_action('init', 'my_menus');

/* Widget zones */

function my_sidebars() {
    register_sidebar([
                        'id'          => 'sidebar-1' , 
                        'description' => 'S\'affiche sur toutes les pages', 
                        'name'        => 'Barre latérale'
                    ]);
}

add_action('widgets_init', 'my_sidebars');

/* En-tête */ 
add_theme_support('custom-header');

/* Image à la une */
add_theme_support('post-thumbnails');

/* Font personnalisé */
add_theme_support('custom-background');

/* Custom thumbnail size */
add_action('after_setup_theme', 'wpdocs_theme_setup');

function wpdocs_theme_setup() {
    add_image_size('banner', 1240, 150, true);
}

/* Custom menu (onglet) */
add_action('init', 'custom_post_type');

function custom_post_type() {
    register_post_type('Events',
        [   
            'labels' => [
                'name' => __('Events'),
                'singular_name' => __('Event')
                ],
            'public' => true
        ]);
}