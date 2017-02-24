<?php
/**
 * Plugin Name: BestRecipes
 * Description: Widget affichant les meilleures recettes
 * Version: 1.0
 * Author: Samuel ALVES DE AZEVEDO ANTUNES
 * Author URI:  https://github.com/NeverTwice
 */

class BestRecipes_Widget extends WP_widget {

    public function BestRecipes_Widget() {
        parent::__construct('BestRecipes', 'Meilleures Recettes', ["classname" => "best_recipes", 'description' => 'Les meilleures recettes.']);
    }

    public function widget($args, $d)
    {
        echo $args['before_widget'];
        echo $args['before_title'] . $d['nb_recipes'] . ' ' . $d['title'] . $args['after_title'];

        global $wpdb;
        $posts = $wpdb->get_results("SELECT guid,post_title,likes FROM {$wpdb->prefix}posts WHERE post_type = 'recettes' AND post_parent = 0 AND ping_status = 'closed' AND post_status = 'publish' ORDER BY likes DESC LIMIT ".$d['nb_recipes']." ") ;

        if ($posts) {
            echo '<ol>';
                foreach ($posts as $post) {

                    $post->post_title;
                    echo '<li><a href="' . $post->guid . '">' . $post->post_title . '</a></li>';
                }
            echo '</ol>';
        }
        echo $args['after_widget'];
    }

    public function update($new, $old) {
        // Save widget options
        return $new;
    }

    public function form($d) {
        $default = [
            'title' => '',
            'nb_recipes' => 5
        ];
        $d = wp_parse_args($d, $default);
        echo "
            <p>
                <label for=". $this->get_field_name( 'title' ) .">". _e( 'Title:' ) ."</label>
                <input class='widefat' id='". $this->get_field_id( 'title' ) ."' name='". $this->get_field_name( 'title' ) ."' type='text' value='".  $d['title'] ."' />
            </p>
            <p>
                <label for=". $this->get_field_name( 'nb_recipes' ) .">". _e( 'Nombre de Recettes:' ) ."</label>
                <input class='widefat' id='". $this->get_field_id( 'nb_recipes' ) ."' name='". $this->get_field_name( 'nb_recipes' ) ."' type='text' value='".  $d['nb_recipes'] ."' size='10' />
            </p>
        ";
    }
}

function BestRecipes_Widget_Init()
{
    register_widget("BestRecipes_Widget");
}

add_action("widgets_init", "BestRecipes_Widget_Init");