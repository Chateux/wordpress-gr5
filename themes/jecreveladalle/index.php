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

get_footer();

?>