<article <?php post_class() ?>>
	<a class="format_post grid_1 alpha" href="<?php echo get_post_format_link(get_post_format()) ?>" title="<?php _e('Quotes', 'rembrandt');?>" > <?php _e('Quotes', 'rembrandt');?></a>
	<header class="grid_7">
		<?php	the_content(__('Continue reading &rarr;', 'rembrandt'));?>
<?php rembrandt_post_quote();?>
		<?php if ( comments_open() && ! post_password_required() ) :
		?>
		<div class="post-comments">
			<?php	comments_popup_link(__('0', 'rembrandt'), __('1', 'rembrandt'), __('% ', 'rembrandt'));?>
		</div>
		<?php endif;?>

		<?php edit_post_link(__('Edit This', 'rembrandt'));?>
		<?php	//rembrandt_posted_on();?>
	</header><div class="clear"></div>
</article>