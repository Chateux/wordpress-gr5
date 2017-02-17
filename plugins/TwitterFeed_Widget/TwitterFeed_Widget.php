<?php

/**
 * Plugin Name: TwitterFeed_Widget
 * Description: Widget affichant les tweets
 * Version: 1.0
 * Author: Samuel ALVES DE AZEVEDO ANTUNES
 * Author URI:  https://github.com/NeverTwice
 */

class TwitterFeed_Widget extends WP_Widget
{
    /** Widget setup **/
    function TwitterFeed_Widget() {
        parent::WP_Widget(
            false, __( 'TwitterFeed', 'TastyChef' ),
            ['description' => __( 'TastyChef Tweets', 'TastyChef' )],
            ['width' => '400px']
        );
    }
    /** The back-end form **/
    function form( $instance ) {
        $defaults = array(
            'title'    => '',
            'limit'    => 5,
            'username' => 'bonsaished'
        );
        $values = wp_parse_args( $instance, $defaults );
        ?>
        <p>
            <label for='<?php echo $this->get_field_id( 'title' ); ?>'>
                <?php _e( 'Title:', 'mytextdomain' ); ?>
                <input class='widefat' id='<?php echo $this->get_field_id( 'title' ); ?>' name='<?php echo $this->get_field_name( 'title' ); ?>' type='text' value='<?php echo $values['title']; ?>' />
            </label>
        </p>

        <p>
            <label for='<?php echo $this->get_field_id( 'limit' ); ?>'>
                <?php _e( 'Tweets to show:', 'mytextdomain' ); ?>
                <input class='widefat' id='<?php echo $this->get_field_id( 'limit' ); ?>' name='<?php echo $this->get_field_name( 'limit' ); ?>' type='text' value='<?php echo $values['limit']; ?>' />
            </label>
        </p>

        <p>
            <label for='<?php echo $this->get_field_id( 'username' ); ?>'>
                <?php _e( 'Twitter user name:', 'mytextdomain' ); ?>
                <input class='widefat' id='<?php echo $this->get_field_id( 'username' ); ?>' name='<?php echo $this->get_field_name( 'username' ); ?>' type='text' value='<?php echo $values['username']; ?>' />
            </label>
        </p>
        <?php
    }
    /** Saving form data **/
    function update( $new_instance, $old_instance ) {
        return $new_instance;
    }
    /** The front-end display **/
    function widget( $args, $instance )
    {
        echo $args['before_widget'];
        echo $args['before_title'] . $instance['title'] . $args['after_title'];
        $tweets = getTweets($instance['username'], $instance['limit']);
        var_dump($tweets);

        foreach($tweets as $tweet){
            var_dump($tweet);
        }

        echo $args['after_widget'];

        /*
        $tweets = $this->get_tweets($args['widget_id'], $instance);
        if (!empty($tweets['tweets']) AND empty($tweets['tweets']->errors)) {

            echo $args['before_widget'];
            echo $args['before_title'] . $instance['title'] . $args['after_title'];


            $user = current($tweets['tweets']);
            $user = $user->user;

            echo '
                <div class="twitter-profile">
                <img src="' . $user->profile_image_url . '">
                <h1><a class="heading-text-color" href="http://twitter.com/' . $user->screen_name . '">' . $user->screen_name . '</a></h1>
                <div class="description content">' . $user->description . '</div>
                </div>  ';

            echo '<ul>';
            foreach ($tweets['tweets'] as $tweet) {
                if (is_object($tweet)) {
                    $tweet_text = htmlentities($tweet->text, ENT_QUOTES);
                    $tweet_text = preg_replace('/http://([a-z0-9_.-+&!#~/,]+)/i', 'http://$113', $tweet_text);

                    echo '
                        <li>
                          <span class="content">' . $tweet_text . '</span>
                          <div class="date">' . human_time_diff(strtotime($tweet->created_at)) . ' ago </div>
                        </li>';
                }
            }
            echo '</ul>';
            echo $args['after_widget'];*/
    }
}

function TwitterFeed_Widget_Init()
{
    register_widget('TwitterFeed_Widget');
}

add_action("widgets_init", "TwitterFeed_Widget_Init");