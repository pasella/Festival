<article <?php post_class() ?>>
	<a class="format_post grid_1 alpha" href="<?php echo get_post_format_link(get_post_format()) ?>" title="<?php _e('Aside', 'rembrandt');?>" > <?php _e('Aside', 'rembrandt');?></a>
	<header class="grid_7 omega">
		<?php if ( is_archive() || is_search() ) :
		?>
		<?php	the_excerpt();?>
		<?php	else :?>
		<?php	the_content(__('Continue reading &rarr;', 'rembrandt'));?>
		<?php endif;?>

		<?php if ( comments_open() && ! post_password_required() ) :
		?>
		<div class="post-comments">
			<?php	comments_popup_link(__('0', 'rembrandt'), __('1', 'rembrandt'), __('% ', 'rembrandt'));?>
		</div>
		<?php endif;?>

		<?php edit_post_link(__('Edit This', 'rembrandt'));?>
		<?php	rembrandt_posted_on();?>
	</header><div class="clear"></div>
</article>