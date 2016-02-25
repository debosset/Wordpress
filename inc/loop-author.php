<?php
   if(isset($_GET['author_name'])) :
   $curauth = get_userdatabylogin($author_name);
   else :
   $curauth = get_userdata(intval($author));
   endif;
   ?>
<div class="listes-archives">
   <div class="container">
      <div class="row">
         <div class="col-sm-12">
            <article>
               <div class="archive-thumbail">
					<?php
						$finaluser = 'user_'.$curauth->ID;
						$thumbboutique = get_field('thumbail', $finaluser );
						$image = wp_get_attachment_image_src($thumbboutique, 'slider-home');
					?>
					<img class="img-responsive" alt="" src="<?php echo $image[0]; ?>" />
               </div>
               <div class="archive-description">
                  <h1><?php echo $curauth->nickname; ?></h1>
                  <p><?php echo $curauth->user_description; ?></p>
               </div>
            </article>
         </div>
         <div class="col-sm-12">
		 <h2>Les offres</h2>
			<div class="row">
            <?php  query_posts(array (
               'post_type' => 'offre',
               'author' => $curauth->ID,
               ));
               ?>
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <div class="col-sm-6 col-md-4">
               <article>
                  <div class="archive-thumbail">
                     <?php 
                        the_post_thumbnail('archive-miniature', 
                        array( 'class' => 'img-responsive')); 
                        ?>
                  </div>
                  <div class="archive-description">
                     <h1><?php the_title(); ?></h1>
                     <?php if ( 'offre' == get_post_type() ){?>
                     <h2>De la <?php the_author_posts_link(); ?></h2>
                     <?php } ?>
                     <?php the_excerpt(); ?>
                     <a class="suite" href="<?php the_permalink(); ?>">Lire la suite</a>
                  </div>
               </article>
            </div>
            <?php endwhile; else: ?>
            <p><?php _e('Aucune offre pour cette boutique'); ?></p>
            <?php endif; ?>
         </div>
         <!-- End Loop -->
      </div>
   </div>
</div>
</div>
