<article <?php post_class() ?>>
	<a class="format_post grid_1 alpha" href="<?php echo get_post_format_link(get_post_format()) ?>" title="<?php _e('Links', 'rembrandt');?>" > <?php _e('Links', 'rembrandt');?></a>
	<header class="grid_7">
		<h2><a href="<?php	echo rembrandt_link_format();?>"  rel="bookmark"><?php	the_title();?></a></h2>
		<?php	the_excerpt();?>
		<?php if ( comments_open() && ! post_password_required() ) :
		?>
		<div class="post-comments">
			<?php	comments_popup_link(__('0', 'rembrandt'), __('1', 'rembrandt'), __('%', 'rembrandt'));?>
		</div>
		<?php endif;?>

		<?php	edit_post_link(__('Edit This', 'rembrandt'));?>
		<?php rembrandt_posted_on();?>
	</header><div class="clear"></div>
</article>