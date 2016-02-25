<div class="listes-archives">
	  <div class="container">
			<div class="row">
				<!-- Start Loop -->
				<?php if (have_posts()) : ?> 
				<?php while (have_posts()) : the_post(); ?>
				<div class="col-sm-4">
					<article>
						<div class="archive-thumbail">
							<?php 
							the_post_thumbnail('archive-miniature', 
							array( 'class' => 'img-responsive')); 
							?>
						</div>
						<div class="archive-description">
							<h1><?php the_title(); ?></h1>
							<?php if ( 'offre' == get_post_type() ){?><h2>De la <?php the_author_posts_link(); ?></h2><?php } ?>
							<?php the_excerpt(); ?>
							<a class="suite" href="<?php the_permalink(); ?>">Lire la suite</a>
						</div>
					</article>
				</div>
				<?php endwhile; ?>
				<?php endif; ?>
				<!-- End Loop -->
		
			</div>
		</div>
</div>