<?php
/**
 * Plugin Name: BestRecipes
 * Plugin URI: bestRecipes.php
 * Description: Widget affichant les meilleures recettes
 * Version: 1.0
 * Author: Samuel ALVES DE AZEVEDO ANTUNES
 * Author URI:  https://github.com/NeverTwice
 */

class BestRecipes_Widget extends WP_widget {

    public function BestRecipes_Widget() {
        parent::__construct('BestRecipes', 'Meilleures Recettes', ["classname" => "best_recipes", 'description' => 'Les meilleures recettes.']);
    }

    public function widget($args, $d) {
        echo $args['before_widget'];
        echo $args['before_title'].$d['title'].$args['after_title'];
        //echo apply_filters('widget_title', $instances['title']);
        // @adrien - Ajout du template CSS ici
        echo $args['after_widget'];
    }

    public function update($new, $old) {
        // Save widget options
        return $new;
    }

    public function form($instances) {
        $title = isset($instances['title']) ? $instances['title'] : '';
        //$nb_recettes = isset($instances['nb_recettes']) ? $instances['nb_recettes'] : '';
        echo "
            <p>
                <label for=". $this->get_field_name( 'title' ) .">". _e( 'Title:' ) ."</label>
                <input class='widefat' id='". $this->get_field_id( 'title' ) ."' name='". $this->get_field_name( 'title' ) ."' type='text' value='".  $title ."' />
            </p>
        ";
    }
}

function BestRecipes_Widget_Init()
{
    register_widget("BestRecipes_Widget");
}

add_action("widgets_init", "BestRecipes_Widget_Init");