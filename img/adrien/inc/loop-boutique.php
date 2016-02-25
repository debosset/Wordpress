<div class="listes-archives">
	  <div class="container">
			<div class="row">
				<!-- Start Loop -->
				
				<?php
				// Get all users order by amount of posts
				$allUsers = get_users('orderby=post_count&order=DESC');
				
				
				$users = array();
				
				// Remove subscribers
				foreach($allUsers as $currentUser)
				{
					if(!in_array( 'administrator', $currentUser->roles ) )
					{
						$users[] = $currentUser;
					}
				}
				
				foreach($users as $user)
				{
				?>
		
			
		
			
				
				
				<div class="col-sm-4">
					<article>
						<div class="archive-thumbail">
							
							<?php
							
							$finaluser = 'user_'.$user->ID;
							$thumbboutique = get_field('thumbail', $finaluser );
							$image = wp_get_attachment_image_src($thumbboutique, 'archive-miniature');
							?>
							<img class="img-responsive" alt="" src="<?php echo $image[0]; ?>" />
						</div>
						<div class="archive-description">
							<h1><?php echo $user->display_name; ?></h1>
							<h2></h2>
							<p><?php echo get_user_meta($user->ID, 'description', true); ?></p>
						</div>
					</article>
				</div>
				
				
				
				
				
				<?php
				}
				?>
				<!-- End Loop -->
		
			</div>
		</div>
</div>