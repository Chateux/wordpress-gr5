<?php get_header(); ?>

<div class="container">
    <div class="row">
        <div class="col-md-9">
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                    <article class="recipe">
                        <h1 class="title">
                            <?php the_title(); ?>
                        </h1>

                        <div class="content">

                            <div class="desc">
                                <?php if( get_post_meta( $post->ID, 'videos_link', true ) ) {
                                    $addEmbed = explode('/watch?v=', get_post_meta( $post->ID, 'videos_link', true ));
                                    $finalAddEmbed = $addEmbed[0] . "/embed/" . $addEmbed[1];
                                ?>
                                    <iframe width="560" height="315" src="<?php echo $finalAddEmbed; ?>" frameborder="0" allowfullscreen></iframe>
                                    <?php
                                } else {
                                    echo "no videos found";
                                }
                                ?>
                            </div>
                        </div>
                    </article>


                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>

