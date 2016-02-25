<?php 
/* Loop Slider home */
   query_posts(array( 
       'post_type' => 'evenement',
       'showposts' => 5 
   ) );  
   if ( have_posts() ) {?>
		<div id="evenement" class="carousel slide" data-ride="carousel">
		<ol class="carousel-indicators">
			<?php 
				//We want to start with 0 so $counter will be -1
				$counter = -1;
				while (have_posts()) : the_post(); $counter++ 
				?>
			<li data-target="#evenement" data-slide-to="<?php echo $counter; ?>"<?php if( $wp_query->current_post == 0 && !is_paged() ) { ?> class="active"<?php } else { ?><?php } ?>></li>
			<?php endwhile; ?>
		</ol>
		<div class="carousel-inner">
			<?php 
				//We want to start with 0 so $counter will be -1
				$counter = -1;
				while (have_posts()) : the_post(); $counter++ 
				?>
			<div class="item <?php if( $wp_query->current_post == 0 && !is_paged() ) { ?> active<?php } else { ?><?php } ?>">
				<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'slider-home' ); ?></a>
				<div class="carousel-caption" data-animation="animated fadeInDown">
					<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
				</div>
			</div>
			<?php endwhile; ?>
		</div>
		<a class="left carousel-control" href="#evenement" data-slide="prev">
		<span class="glyphicon glyphicon-chevron-left"></span>
		</a>
		<a class="right carousel-control" href="#evenement" data-slide="next">
		<span class="glyphicon glyphicon-chevron-right"></span>
		</a>
		</div>
<?php } ?>