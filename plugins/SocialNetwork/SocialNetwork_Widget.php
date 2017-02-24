<?php
/**
 * Plugin Name: SocialNetwork
 * Description: Widget affichant les réseuax sociaux
 * Version: 1.0
 * Author: Samuel ALVES DE AZEVEDO ANTUNES
 * Author URI:  https://github.com/NeverTwice
 */

class SocialNetwork_Widget extends WP_widget {

    public function SocialNetwork_Widget() {
        parent::__construct('SocialNetwork', 'Réseaux Sociaux', ["classname" => "social_network", 'description' => 'Nos Réseaux Sociaux']);
    }

    public function widget($args, $d)
    {
        echo $args['before_widget'];
        echo $args['before_title'] . "Suivez-vous!" . $args['after_title'];
        echo "
            <a target='blanck' href='".$d['facebook']."'>Facebook</a><br>
            <a target='blanck' href='".$d['twitter']."'>Twitter</a><br>
            <a target='blanck' href='".$d['youtube']."'>Youtube</a>
        ";
        echo $args['after_widget'];
    }

    public function update($new, $old)
    {
        // Save widget options
        return $new;
    }

    public function form($d)
    {
        echo "
        <p>
            <label for=". $this->get_field_name( 'facebook' ) .">Facebook :
            <input class='widefat' id='". $this->get_field_id( 'facebook' ) ."' name='". $this->get_field_name( 'facebook' ) ."' type='text' value='".  $d['facebook'] ."' />
            </label>
        </p>
        <p>
            <label for=". $this->get_field_name( 'twitter' ) .">Twitter :
            <input class='widefat' id='". $this->get_field_id( 'twitter' ) ."' name='". $this->get_field_name( 'twitter' ) ."' type='text' value='".  $d['twitter'] ."' />
            </label>
        </p>
        <p>
            <label for=". $this->get_field_name( 'youtube' ) .">Youtube :
            <input class='widefat' id='". $this->get_field_id( 'youtube' ) ."' name='". $this->get_field_name( 'youtube' ) ."' type='text' value='".  $d['youtube'] ."' />
            </label>
        </p>";
    }
}

function SocialNetwork_Widget_Init()
{
    register_widget("SocialNetwork_Widget");
}

add_action("widgets_init", "SocialNetwork_Widget_Init");