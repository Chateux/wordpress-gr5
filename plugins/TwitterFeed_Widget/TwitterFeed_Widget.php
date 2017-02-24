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
    function TwitterFeed_Widget()
    {
        parent::WP_Widget(
            false, __('TwitterFeed', 'TastyChef'),
            ['description' => __('TastyChef Tweets', 'TastyChef')],
            ['width' => '400px']
        );
    }

    /** The back-end form **/
    function form($instance)
    {
        $defaults = array(
            'title' => 'Notre Actu Twitter',
            'limit' => 5,
            'username' => 'tasty_chef'
        );
        $values = wp_parse_args($instance, $defaults);
        ?>
        <p>
            <label for='<?php echo $this->get_field_id('title'); ?>'>
                <?php _e('Title:', 'mytextdomain'); ?>
                <input class='widefat' id='<?php echo $this->get_field_id('title'); ?>'
                       name='<?php echo $this->get_field_name('title'); ?>' type='text'
                       value='<?php echo $values['title']; ?>'/>
            </label>
        </p>

        <p>
            <label for='<?php echo $this->get_field_id('limit'); ?>'>
                <?php _e('Tweets to show:', 'mytextdomain'); ?>
                <input class='widefat' id='<?php echo $this->get_field_id('limit'); ?>'
                       name='<?php echo $this->get_field_name('limit'); ?>' type='text'
                       value='<?php echo $values['limit']; ?>'/>
            </label>
        </p>

        <p>
            <label for='<?php echo $this->get_field_id('username'); ?>'>
                <?php _e('Twitter user name:', 'mytextdomain'); ?>
                <input class='widefat' id='<?php echo $this->get_field_id('username'); ?>'
                       name='<?php echo $this->get_field_name('username'); ?>' type='text'
                       value='<?php echo $values['username']; ?>'/>
            </label>
        </p>
        <?php
    }

    /** Saving form data **/
    function update($new_instance, $old_instance)
    {
        return $new_instance;
    }

    /** The front-end display **/
    function widget($args, $instance)
    {
        echo $args['before_widget'];
        echo $args['before_title'] . $instance['title'] . $args['after_title'];
        $tweets = getTweets($instance['username'], $instance['limit']);
        if(is_array($tweets)){
            // to use with intents
            echo '<script type="text/javascript" src="//platform.twitter.com/widgets.js"></script>';

            foreach($tweets as $tweet){
                if($tweet['text']){
                    $the_tweet = $tweet['text'];
                    // i. User_mentions must link to the mentioned user's profile.
                    if(is_array($tweet['entities']['user_mentions'])){
                        foreach($tweet['entities']['user_mentions'] as $key => $user_mention){
                            $the_tweet = preg_replace(
                                '/@'.$user_mention['screen_name'].'/i',
                                '<a href="http://www.twitter.com/'.$user_mention['screen_name'].'" target="_blank">@'.$user_mention['screen_name'].'</a>',
                                $the_tweet);
                        }
                    }

                    // ii. Hashtags must link to a twitter.com search with the hashtag as the query.
                    if(is_array($tweet['entities']['hashtags'])){
                        foreach($tweet['entities']['hashtags'] as $key => $hashtag){
                            $the_tweet = preg_replace(
                                '/#'.$hashtag['text'].'/i',
                                '<a href="https://twitter.com/search?q=%23'.$hashtag['text'].'&src=hash" target="_blank">#'.$hashtag['text'].'</a>',
                                $the_tweet);
                        }
                    }

                    // iii. Links in Tweet text must be displayed using the display_url
                    //      field in the URL entities API response, and link to the original t.co url field.
                    if(is_array($tweet['entities']['urls'])){
                        foreach($tweet['entities']['urls'] as $key => $link){
                            $the_tweet = preg_replace(
                                '`'.$link['url'].'`',
                                '<a href="'.$link['url'].'" target="_blank">'.$link['url'].'</a>',
                                $the_tweet);
                        }
                    }

                    // TWEET CONTENT
                    echo $the_tweet;

                    // 3. Tweet Actions
                    //    Reply, Retweet, and Favorite action icons must always be visible for the user to interact with the Tweet. These actions must be implemented using Web Intents or with the authenticated Twitter API.
                    //    No other social or 3rd party actions similar to Follow, Reply, Retweet and Favorite may be attached to a Tweet.
                    echo '
                        <div class="twitter_intents">
                            <p>
                            <a href="https://twitter.com/YOURUSERNAME/status/'.$tweet['id_str'].'" target="_blank">
                                '.date('H:i - d M y',strtotime($tweet['created_at']. '- 8 hours')).'
                            </a>
                            <a class="reply" href="https://twitter.com/intent/tweet?in_reply_to='.$tweet['id_str'].'"><img style="margin-left : 15px" width="17" src="wp-content/themes/jecreveladalle/img/reply.png"></a>
                            <a class="retweet" href="https://twitter.com/intent/retweet?tweet_id='.$tweet['id_str'].'"><img style="margin-left : 15px" width="17" src="wp-content/themes/jecreveladalle/img/retweet.png"></a>
                            <a class="favorite" href="https://twitter.com/intent/favorite?tweet_id='.$tweet['id_str'].'"><img style="margin-left : 15px" width="17" src="wp-content/themes/jecreveladalle/img/like.png"></a></p>
                        </div>';


                    // 4. Tweet Timestamp
                    //    The Tweet timestamp must always be visible and include the time and date. e.g., “3:00 PM - 31 May 12”.
                    // 5. Tweet Permalink
                    //    The Tweet timestamp must always be linked to the Tweet permalink.
                    echo '
                        <p class="timestamp">
                        
                        </p>';// -8 GMT for Pacific Standard Time
                } else {
                    echo '
                        <br /><br />
                        <a href="http://twitter.com/YOURUSERNAME" target="_blank">Cliquez ici pour suivre l\'actualité de YOURUSERNAME\</a>';
                }
            }
        }
        echo $args['after_widget'];
    }
}



function TwitterFeed_Widget_Init()
{
    register_widget('TwitterFeed_Widget');
}

add_action("widgets_init", "TwitterFeed_Widget_Init");