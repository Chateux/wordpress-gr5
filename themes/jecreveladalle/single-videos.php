<?php get_header(); ?>
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>

<div class="container video">
    <div class="row">
        <div class="col-md-9 content">

            <?php if( get_post_meta( $post->ID, 'videos_link', true ) ) {
                $addEmbed = explode('/watch?v=', get_post_meta( $post->ID, 'videos_link', true ));
                $finalAddEmbed = $addEmbed[0] . "/embed/" . $addEmbed[1];
            ?>
            <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="<?php echo $finalAddEmbed; ?>" frameborder="0" allowfullscreen></iframe>
            </div>
            <?php
            } else {
                echo "no videos found";
            }
            ?>
            <h2 class="title">
                <?php the_title(); ?>
            </h2>
            <div class="comments">
                <h3 class="title">
                    Ajouter un commentaire
                </h3>

                <div class="content">
                    <div class="desc">
                        <?php

                        comment_form();
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 twitter-feed">
            <?php get_sidebar( 'right' ); ?>
        </div>
    </div>
</div>
<?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>

