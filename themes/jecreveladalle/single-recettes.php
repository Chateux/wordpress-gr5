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
							<div class="short-desc row">
								<div class="col-md-4">
									<i class="fa fa-clock-o" aria-hidden="true"></i>
									Cooking time :
									<strong>15 min</strong>
								</div>
								<div class="col-md-4 txt-center">
									<i class="fa fa-clock-o" aria-hidden="true"></i>
									Difficulté :
									<strong>1/5 ~ Easy</strong>
								</div>
								<div class="col-md-4 txt-right">
									<i class="fa fa-star" aria-hidden="true"></i>
									<i class="fa fa-star" aria-hidden="true"></i>
									<i class="fa fa-star" aria-hidden="true"></i>
									<i class="fa fa-star-o" aria-hidden="true"></i>
									<i class="fa fa-star-o" aria-hidden="true"></i>
								</div>
							</div>
							<div class="desc">
								<?php the_content(); ?>
							</div>
						</div>
					</article>

				<?php endwhile; ?>
			<?php endif; ?>
		</div>
	</div>
</div>

<?php get_footer(); ?>

