<?php get_header(); ?>

<div class="container">
	<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>

            <article class="recipe">
                <h1 class="title">
					<?php the_title(); ?>
                </h1>

                <div class="content">
					<?php the_content(); ?>
                </div>
            </article>

        <?php endwhile; ?>
	<?php endif; ?>
</div>

<?php get_footer(); ?>

