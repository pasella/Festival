
<article <?php post_class() ?>>
	<figure  class="gallery-thumb">
		<?php
if((function_exists('add_theme_support')) && ( has_post_thumbnail())) :
		?>
		<a class="gallery_max_width" href="<?php the_permalink();?>"><?php the_post_thumbnail('large');?></a>
		<?php	 else :
			$images = get_children( array( 'post_parent' => $post->ID, 'post_type' => 'attachment', 'post_mime_type' => 'image', 'orderby' => 'menu_order', 'order' => 'ASC', 'numberposts' => 999 ) );
			if ( $images ) :
			$total_images = count( $images );
			$image = array_shift( $images );
			$image_img_tag = wp_get_attachment_image( $image->ID, 'large' );
		?>
		<a href="<?php the_permalink();?>"><?php echo $image_img_tag;?></a>
		<?php  endif; ?>
		<?php  endif;?>
		<figcaption>
			<h2><span>
				<a href="<?php echo get_post_format_link('gallery');?>">
					<?php _e('Gallery &raquo;', 'rembrandt');?></a></span>
			 	<a href="<?php	the_permalink();?>" title="<?php	echo esc_attr(sprintf(__('Permanent Link to %s', 'rembrandt'), the_title_attribute('echo=0')));?>" rel="bookmark"><?php	the_title();?></a>
			</h2>
			<?php if ( comments_open() && ! post_password_required() ) :
			?>
			<div class="post-comments">
				<?php	comments_popup_link(__('0', 'rembrandt'), __('1 ', 'rembrandt'), __('%', 'rembrandt'));?>
			</div>
			<?php endif;?>
			<div class="clear"></div>
		</figcaption>
	</figure>
	<?php edit_post_link(__('Edit This', 'rembrandt'));?>
</article>

