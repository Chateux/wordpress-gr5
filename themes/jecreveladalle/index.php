<?php

get_header();

if (have_posts()) {
    while (have_posts()) {
        the_post();
        the_title();
        the_content();
    }
} else {
    echo "Aucun articles ...";
}
$loop = new WP_Query( array( 'post_type' => 'Evenement', 'posts_per_page' => 10 ) );
while ( $loop->have_posts() ) : $loop->the_post();
    the_title();
    echo '<div>';
    the_content();
    echo '</div>';
endwhile;
get_footer();

?>