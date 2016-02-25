<div class="listes-archives">
	  <div class="container">
			<div class="row">
				<!-- If post type offre -->
				<?php if ( 'offre' == get_post_type() ){
					$currentID = array(get_the_ID());
					$today = date('Ymd');
					query_posts(array (
						'post_type' => 'offre',
						'post__in' => $currentID,
						'meta_query' => array(
							array(
								'key'		=> 'start_date',
								'compare'	=> '<=',
								'value'		=> $today,
							),
							array(
								'key'		=> 'end_date',
								'compare'	=> '>=',
								'value'		=> $today,
							),
						
						)
					)); 
				}  
				?>
				<?php if (have_posts()) : ?> 
				<?php while (have_posts()) : the_post(); ?>
				<div class="col-sm-12">
					<article>
						<div class="archive-thumbail">
							<?php 
							the_post_thumbnail('slider-homee',
							array( 'class' => 'img-responsive')); 
							?>
						</div>
						<div class="archive-description">
							<h1><?php the_title(); ?></h1>
							<?php if ( 'offre' == get_post_type() ){?><h2>De la <?php the_author_posts_link(); ?></h2><?php } ?>
							<p><?php the_content(); ?></p>
							
						</div>
					</article>
				</div>
				<?php endwhile; ?>
				<?php endif; ?>
				
				<!-- End Loop -->
		
			</div>
		</div>
</div>