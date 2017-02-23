<?php

get_header();

echo "<h2> Widgets Zone</h2>";

get_sidebar( 'right' );
$loop = new WP_Query( array( 'post_type' => 'Evenement', 'posts_per_page' => 10 ) );
while ( $loop->have_posts() ) : $loop->the_post();
    the_title();
    echo '<div>';
    the_content();
    echo '</div>';
endwhile;
get_footer();

?>