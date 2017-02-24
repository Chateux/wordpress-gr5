<?php

get_header();

$loop = new WP_Query( array( 'post_type' => 'Recettes', 'posts_per_page' => 10 ) );

?>

    <div class="background"></div>

    <div class="container">
        <div class="row">
        <h2>What to Cook This Week</h2>
        <p>Recettes et suggestions pour la semaine.</p>

        <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

        <div class="col-md-4 col-sm-6">
            <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
            <div class="thumbnail">

                <div class="img">
                    <?php the_post_thumbnail(); ?>
                </div>

                <div class="caption">
                    <h3>
                        <?php the_title(); ?>
                    </h3>
                    <div class="pannel-footer">
                        <i class="fa fa-clock-o" aria-hidden="true"></i> Il y a
                        <?php
                        echo human_time_diff( get_comment_time('Y-m-d'), date( 'Y-m-d', current_time( 'timestamp', 0 ) ) );
                        ?>

                        <i class="fa fa-user-circle" aria-hidden="true"></i>
                        <?php
                        the_author();
                        ?>
                    </div>
                </div>
            </div>
            </a>
        </div>

        <?php endwhile; ?>

    </div>
    </div>
<?php

get_footer();

?>