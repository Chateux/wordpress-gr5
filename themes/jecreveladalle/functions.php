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
add_action('init', 'custom_post_type');

function custom_post_type()
{
    $labels = array(
        'name'                => ( 'Les recettes' ), // The name of my menu
        'singular_name'       => ( 'Les recettes' ),
        'all_items'           => ( 'Voir les recettes' ),
        'view_item'           => ( 'Voir les recettes' ),
        'add_new_item'        => ( 'Ajouter une recette' ),
        'add_new'             => ( 'Ajouter une recette' ),
        'edit_item'           => ( 'Editer une recette' ),
        'update_item'         => ( 'Mettre à jour' ),
        'search_items'        => ( 'Rechercher un projet' ),
        'not_found'           => ( 'Aucun résultat' ),
        'not_found_in_trash'  => ( 'Aucun résultat dans la corbeille' )
    );
    $args = array(
        'labels'              => $labels,
        'supports'            => array('title', 'thumbnail', 'editor', 'author', 'trackbacks' ), // Permet de définir les éléments à ajouter pour notre type de contenu.
        'taxonomies'          => array( 'category' ),
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_admin_bar'   => true, // Pour l'ajouter dans la barre d'admin en haut dans l'onglet "Créer"
        'menu_position'       => 2, // L'ordre d'affichage dans le menu à gauche
        'menu_icon'           => 'dashicons-welcome-write-blog', // Nom de l’icône
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page', // Permet de spécifier que l'utilisateur possède les mêmes droits qu'il a sur les pages
    );
    register_post_type('Recettes',$args);
}


/* Admin options */
/*
add_action('admin_menu', 'ReceipsThemeAdminMenu');

function ReceipsThemeAdminMenu()
{
    add_menu_page('Jecreveladalle', 'Receipes', 'posts', 'my-receipes-options');
}*/