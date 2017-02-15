<?php

get_header();

echo "<h2> Widgets Zone</h2>";

get_sidebar( 'right' );



/*
if (have_posts()) {
    while (have_posts()) {
        the_post();
        the_title();
        the_content();
    }

} else {
    echo "Aucun articles ...";
}
*/

get_footer();

?>