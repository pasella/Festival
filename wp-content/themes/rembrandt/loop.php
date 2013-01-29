<article <?php post_class() ?>>
	<header>
		<h2><a href="<?php	the_permalink();?>" title="<?php	echo esc_attr(sprintf(__('Permanent Link to %s', 'rembrandt'), the_title_attribute('echo=0')));?>" rel="bookmark"><?php	the_title();?></a></h2>
		<?php if ( comments_open() && ! post_password_required() ) :
		?>
		<div class="post-comments">
			<?php	comments_popup_link(__('0', 'rembrandt'), __('1', 'rembrandt'), __('% ', 'rembrandt'));?>
		</div>
		<?php endif;?>
		<?php	rembrandt_posted_on();?>
	</header>
	<?php if ( is_archive() || is_search()) :
	?>
	<?php
	if((function_exists('add_theme_support')) && ( has_post_thumbnail())) {
		the_post_thumbnail('thumbnail');
	}
	?>
	<div class="entry">
		<?php the_excerpt();?>
	</div>
	<?php else :
		if((function_exists('add_theme_support')) && ( has_post_thumbnail())) {
		the_post_thumbnail('rembrandt_single_post');
		}
	?>
	<div class="entry">
		<?php  the_content(__('Continue reading &rarr;', 'rembrandt'));?>
	</div>
	<?php
	endif;
	?>

	<footer>
		<?php	wp_link_pages(array('before' => '<div class="page-link">' . __('Pages:', 'rembrandt'), 'after' => '</div>'));?>
		<?php
		rembrandt_posted_footer();
		?>
	</footer>
</article>
