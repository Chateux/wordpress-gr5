<?php get_header(); ?>
<?php
if (have_posts()) :
    ?>

    <h2>Resultat pour la recherche : <?php the_search_query(); ?></h2>

    <div class="recipes container">
        <div class="content">
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>

                    <article>
                        <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
                            <div class="thumbnail">

                                <div class="img">
                                    <?php the_post_thumbnail(); ?>
                                </div>

                                <div class="caption">
                                    <h3>
                                        <?php the_title(); ?>
                                    </h3>
                                </div>
                            </div>
                        </a>
                    </article>

                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
    <?php
else:

    echo "<p>Aucun résultat lors de la recherche</p>";

endif;


?>


<?php get_footer(); ?>