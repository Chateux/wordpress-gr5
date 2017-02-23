<?php get_header(); ?>

    <div id="container">
        <div id="content">

            <?php
            if (have_posts()) :
            ?>

                <h2>Resultat pour la recherche : <?php the_search_query(); ?></h2>

                <div class="recipes">

                    <?php if (have_posts()) : ?>
                        <?php while (have_posts()) : the_post(); ?>

                            <article class="thumbnail">

                                <div class="caption">
                                    <h2>
                                        <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
                                            <?php the_title(); ?>
                                        </a>
                                    </h2>
                                    <p><small><?php the_time( 'd-m-Y' ); ?> by <?php the_author_posts_link(); ?></small></p>
                                </div>

                            </article>

                        <?php endwhile; ?>
                    <?php endif; ?>

                </div>
                <?php
            else:

                echo "<p>Aucun résultat lors de la recherche</p>";

            endif;


            ?>
        </div><!-- #content -->
    </div><!-- #container -->


<?php get_footer(); ?>