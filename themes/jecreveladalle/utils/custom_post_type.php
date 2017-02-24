<?php
add_action('init', 'custom_post_type');

function custom_post_type()
{
    $labelsReceips = array(
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
    $argsReceips = array(
        'labels'              => $labelsReceips,
        'supports'            => array('title', 'thumbnail', 'post-formats' ), // Permet de définir les éléments à ajouter pour notre type de contenu.
        'taxonomies'          => array( 'category' ),
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_admin_bar'   => true, // Pour l'ajouter dans la barre d'admin en haut dans l'onglet "Créer"
        'menu_position'       => 6, // L'ordre d'affichage dans le menu à gauche
        'menu_icon'           => 'dashicons-welcome-write-blog', // Nom de l’icône
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page', // Permet de spécifier que l'utilisateur possède les mêmes droits qu'il a sur les pages
    );
    register_post_type('Recettes',$argsReceips);

    $labelsEvent = array(
        'name'                => ( 'Les evenements' ), // The name of my menu
        'singular_name'       => ( 'Les evenements' ),
        'all_items'           => ( 'Voir les evenements' ),
        'view_item'           => ( 'Voir les evenements' ),
        'add_new_item'        => ( 'Ajouter un event' ),
        'add_new'             => ( 'Ajouter un event' ),
        'edit_item'           => ( 'Editer un evenement' ),
        'update_item'         => ( 'Mettre à jour' ),
        'search_items'        => ( 'Rechercher un projet' ),
        'not_found'           => ( 'Aucun résultat' ),
        'not_found_in_trash'  => ( 'Aucun résultat dans la corbeille' )
    );
    $argsEvent = array(
        'labels'              => $labelsEvent,
        'supports'            => array('title', 'thumbnail', 'editor', 'author', 'post-formats' ), // Permet de définir les éléments à ajouter pour notre type de contenu.
        'taxonomies'          => array( 'category' ),
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_admin_bar'   => true, // Pour l'ajouter dans la barre d'admin en haut dans l'onglet "Créer"
        'menu_position'       => 4, // L'ordre d'affichage dans le menu à gauche
        'menu_icon'           => 'dashicons-admin-users', // Nom de l’icône
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page', // Permet de spécifier que l'utilisateur possède les mêmes droits qu'il a sur les pages
    );
    register_post_type('Evenement',$argsEvent);

    $labelsVideos = array(
        'name'                => ( 'Les vidéos' ), // The name of my menu
        'singular_name'       => ( 'Les vidéos' ),
        'all_items'           => ( 'Voir les vidéos' ),
        'view_item'           => ( 'Voir les vidéos' ),
        'add_new_item'        => ( 'Ajouter une vidéo' ),
        'add_new'             => ( 'Ajouter une vidéo' ),
        'edit_item'           => ( 'Editer une vidéo' ),
        'update_item'         => ( 'Mettre à jour' ),
        'search_items'        => ( 'Rechercher un projet' ),
        'not_found'           => ( 'Aucun résultat' ),
        'not_found_in_trash'  => ( 'Aucun résultat dans la corbeille' )
    );
    $argsVideos = array(
        'labels'              => $labelsVideos,
        'supports'            => array('title', 'thumbnail'), // Permet de définir les éléments à ajouter pour notre type de contenu.
        'taxonomies'          => array( 'category' ),
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_admin_bar'   => true, // Pour l'ajouter dans la barre d'admin en haut dans l'onglet "Créer"
        'menu_position'       => 5, // L'ordre d'affichage dans le menu à gauche
        'menu_icon'           => 'dashicons-video-alt3', // Nom de l’icône
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page', // Permet de spécifier que l'utilisateur possède les mêmes droits qu'il a sur les pages
    );

    register_post_type('Videos',$argsVideos);
}