<?php

get_header();
echo "<h2> Widgets Zone</h2>";
get_sidebar( 'right' );

$loop = new WP_Query( array( 'post_type' => 'post', 'posts_per_page' => 10 ) );
while ( $loop->have_posts() ) : $loop->the_post();
    the_title();
    echo "J'ai ".$post->likes."!";
    echo "<a href='add_vote.php?id=".$post->ID."'> Liker cette recette</a>";
    echo '<div>';
    the_content();
    echo '</div>';
endwhile;
get_footer();

?>