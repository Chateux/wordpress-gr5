<?php
/* Enqueue Styles and Scripts */
function my_scripts_styles()
{
    wp_enqueue_style('main_style', get_stylesheet_uri());
    wp_enqueue_script('jquery', get_template_directory_uri() . '/js/jquery-3.1.1.min.js');
    wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/js/bootstrap/bootstrap.min.js');
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
    add_image_size('banner', 1240, 150, TRUE);
}

/* Custom menu (onglet) */
include_once 'utils/custom_post_type.php';

/* Custom widget - Nouvelles recettes */
add_action('widgets_init', 'theme_register_widgets');

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
// RECEIPES
add_action('admin_init', 'receipes_init_meta');
add_action('save_post', 'receipes_save_meta');

function receipes_init_meta()
{
    add_meta_box('Recettes_4', 'Préparation de la recette', 'receipes_render_metabox', 'Recettes');
}

function receipes_render_metabox()
{
    global $post;
    $value = get_post_meta($post->ID, 'receipes', TRUE);
    ?>
    <div class="meta-box-item-title">
        La préparation de la recette
    </div>
    <div class="meta-box-item-content">
        <textarea name="receipes" id="" cols="100" rows="10"><?php echo $value; ?></textarea>
    </div>
    <?php
}
function receipes_save_meta($post_id)
{
    $valuePost = $_POST['receipes'];
    $meta = 'receipes';
    if (!isset($_POST[$meta])) {
        return FALSE;
    }
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return FALSE;
    }
    if (get_post_meta($post_id, 'receipes')) {
        update_post_meta($post_id, 'receipes', $valuePost);
    } else if ($valuePost === '') {
        delete_post_meta($post_id, 'receipes');
    } else {
        add_post_meta($post_id, 'receipes', $valuePost);
    }
}


// INGREDIENT
add_action('admin_init', 'ingredient_init_meta');
add_action('save_post', 'ingredient_save_meta');

function ingredient_init_meta()
{
    add_meta_box('Recettes_3', 'Ingrédient', 'ingredient_render_metabox', 'Recettes');
}

function ingredient_render_metabox()
{
    global $post;
    $value = get_post_meta($post->ID, 'ingredient', TRUE);
    ?>
    <div class="meta-box-item-title">
        Les ingrédients de la recette
    </div>
    <div class="meta-box-item-content">
        <textarea name="ingredient" id="" cols="100" rows="10"><?php echo $value; ?></textarea>
    </div>
    <?php
}
function ingredient_save_meta($post_id)
{
    $valuePost = $_POST['ingredient'];
    $meta = 'ingredient';
    if (!isset($_POST[$meta])) {
        return FALSE;
    }
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return FALSE;
    }
    if (get_post_meta($post_id, 'ingredient')) {
        update_post_meta($post_id, 'ingredient', $valuePost);
    } else if ($valuePost === '') {
        delete_post_meta($post_id, 'ingredient');
    } else {
        add_post_meta($post_id, 'ingredient', $valuePost);
    }
}


/// RATE
add_action('admin_init', 'rate_init_meta');
add_action('save_post', 'rate_save_meta');

function rate_init_meta()
{
    add_meta_box('Recettes', 'Niveau de difficulté d\'une recette', 'rate_render_metabox', 'Recettes');
}

function rate_render_metabox()
{
    global $post;
    $value = get_post_meta($post->ID, 'rate_level', TRUE);
    ?>

    <div class="meta-box-item-title">
        Niveau de difficulté
    </div>
    <div class="meta-box-item-content">
        <select name="rate_level" id="">
            <option <?php echo ($value == "0") ? "selected='selected'" : ""; ?> value="0">0</option>
            <option <?php echo ($value == "1") ? "selected='selected'" : ""; ?> value="1">1</option>
            <option <?php echo ($value == "2") ? "selected='selected'" : ""; ?> value="2">2</option>
            <option <?php echo ($value == "3") ? "selected='selected'" : ""; ?> value="3">3</option>
            <option <?php echo ($value == "4") ? "selected='selected'" : ""; ?> value="4">4</option>
            <option <?php echo ($value == "5") ? "selected='selected'" : ""; ?> value="5">5</option>
        </select>
    </div>

    <?php
}

function rate_save_meta($post_id)
{
    $valuePost = $_POST['rate_level'];
    $meta = 'rate_level';
    if (!isset($_POST[$meta])) {
        return FALSE;
    }
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return FALSE;
    }
    if (get_post_meta($post_id, 'rate_level')) {
        update_post_meta($post_id, 'rate_level', $valuePost);
    } else if ($valuePost === '') {
        delete_post_meta($post_id, 'rate_level');
    } else {
        add_post_meta($post_id, 'rate_level', $valuePost);
    }

}


/// TIME_TO_DO


add_action('admin_init', 'time_init_meta');
add_action('save_post', 'time_save_meta');

function time_init_meta()
{
    add_meta_box('Recettes_2', 'Temps moyens', 'time_render_metabox', 'Recettes');
}

function time_render_metabox()
{
    global $post;
    $value = get_post_meta($post->ID, 'time_todo', TRUE);
    ?>

    <div class="meta-box-item-title-2">
        Temps pour cette recette (Temps suivit de (min,heures,secondes)) <br>
        <i>Exemple : 15 min</i>
    </div>
    <div class="meta-box-item-content-2">
        <input type="text" name="time_todo" value="<?php echo $value; ?>">
    </div>

    <?php
}

function time_save_meta($post_id)
{
    $valuePost = $_POST['time_todo'];
    $meta = 'time_todo';
    if (!isset($_POST[$meta])) {
        return FALSE;
    }
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return FALSE;
    }
    if (get_post_meta($post_id, 'time_todo')) {
        update_post_meta($post_id, 'time_todo', $valuePost);
    } else if ($valuePost === '') {
        delete_post_meta($post_id, 'time_todo');
    } else {
        add_post_meta($post_id, 'time_todo', $valuePost);
    }
}








////////////////////////////// VIDEOS

add_action('admin_init', 'videos_init_meta');
add_action('save_post', 'videos_save_meta');

function videos_init_meta()
{
    add_meta_box('Video', 'URL de la vidéo', 'videos_render_metabox', 'Videos');
}

function videos_render_metabox()
{
    global $post;
    $value = get_post_meta($post->ID, 'videos_link', TRUE);
    ?>

    <div class="meta-box-item-title-2">
        Lien de la vidéo<br>
        <i>Youtube</i>
    </div>
    <div class="meta-box-item-content-2">
        <input type="text" name="videos_link" value="<?php echo $value; ?>" style="width:500px">
    </div>

    <?php
}

function videos_save_meta($post_id)
{
    $valuePost = $_POST['videos_link'];
    $meta = 'videos_link';
    if (!isset($_POST[$meta])) {
        return FALSE;
    }
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return FALSE;
    }
    if (get_post_meta($post_id, 'videos_link')) {
        update_post_meta($post_id, 'videos_link', $valuePost);
    } else if ($valuePost === '') {
        delete_post_meta($post_id, 'videos_link');
    } else {
        add_post_meta($post_id, 'videos_link', $valuePost);
    }
}

