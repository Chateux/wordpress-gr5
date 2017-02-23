<?php get_header(); ?>

<div class="recipes">

    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>

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
    <?php endif; ?>

</div>

<?php get_footer(); ?>
