<?php get_header(); ?>

<div class="background" style="background-image:url('<?php the_post_thumbnail_url() ?>');"></div>

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
									<strong><?php if( get_post_meta( $post->ID, 'time_todo', true ) ) {
                                            echo get_post_meta( $post->ID, 'time_todo', true ) ;
                                        }
                                        ?></strong>
								</div>
								<div class="col-md-4 txt-center">
									<i class="fa fa-thermometer-half" aria-hidden="true"></i>
									Difficulté :
                                    <?php
                                    ?>
									<strong><?php if( get_post_meta( $post->ID, 'rate_level', true ) ) {
                                                    echo get_post_meta( $post->ID, 'rate_level', true ) ;
                                                 }
                                             ?>/5
                                    </strong>
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
                                <?php if( get_post_meta( $post->ID, 'receipes', true ) ) {
                                        echo nl2br(get_post_meta( $post->ID, 'receipes', true )) ;
                                    }
                                    ?>
                                <hr>
                                <?php if( get_post_meta( $post->ID, 'ingredient', true ) ) {
                                    echo nl2br(get_post_meta( $post->ID, 'ingredient', true )) ;
                                }
                                ?>
							</div>
						</div>
					</article>


				<?php endwhile; ?>
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

                <hr><br><br><br><br><br>
			<?php endif; ?>
		</div>

		<div class="col-md-3 twitter-feed">
			<?php get_sidebar( 'right' ); ?>
		</div>
	</div>
</div>

<?php get_footer(); ?>

