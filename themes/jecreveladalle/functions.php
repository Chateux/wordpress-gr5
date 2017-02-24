<?php
/* Enqueue Styles and Scripts */
function my_scripts_styles()
{
    wp_enqueue_style('boostrap-css', get_template_directory_uri() . '/css/bootstrap.min.css');
    wp_enqueue_style('main_style', get_stylesheet_uri());
    wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js');
}

add_action('wp_enqueue_scripts', 'my_scripts_styles');

/* Navigation */
function my_menus()
{
    register_nav_menu('main_menu', 'Menu Principal');
    register_nav_menu('footer_menu', 'Menu Pied de page');
}

add_action('init', 'my_menus');

/* Widget zones */

function my_sidebars()
{
    register_sidebar([
        'id' => 'sidebar-1',
        'description' => 'S\'affiche sur toutes les pages',
        'name' => 'Barre latérale'
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

function wpdocs_theme_setup()
{
    add_image_size('banner', 1240, 150, true);
}

/* Custom menu (onglet) */
include_once 'utils/custom_post_type.php';

/* Custom widget - Nouvelles recettes */
add_action('widgets_init', 'theme_register_widgets');

/* Change title of video */
function wpb_change_title_text( $title ){
    $screen = get_current_screen();
    if  ( 'videos' == $screen->post_type ) {
        $title = 'Entrez l\'url de la vidéo ici';
    }
    return $title;
}

add_filter( 'enter_title_here', 'wpb_change_title_text' );

function theme_register_widgets()
{
    //register_widget('BestRecipes');
}

/* Admin options */
/*
add_action('admin_menu', 'ReceipsThemeAdminMenu');

function ReceipsThemeAdminMenu()
{
    add_menu_page('Jecreveladalle', 'Receipes', 'posts', 'my-receipes-options');
}*/