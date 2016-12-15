<?php

function my_script_styles()
{
    wp_enqueue_styles('bootstrap-css', get_template_directory_uri().'/statics/css/bootstrap.min.css');
    wp_enqueue_styles('main_style', get_stylesheet_uri());
    wp_enqueue_styles('bootstrap-js', get_template_directory_uri().'/statics/js/bootstrap.min.js');
}

add_action('wp_enqueue_scripts', 'my_scripts_styles');

/* Navigation */
function my_menus()
{
    register_nav_menu('main_menu', 'Menu principal');
    register_nav_menu('footer_menu', 'Menu de pied de page');
}

add_action('init', 'my_menus');

function mySidebars()
{
    register_siderbar([
        'name' => 'Barre latérale',
        'description' => 'Cette colonne s\'affiche sur toutes les pages',
        'id' => 'sidebar-1'
    ]);
}

add_action('widgets_init', 'mySidebars');