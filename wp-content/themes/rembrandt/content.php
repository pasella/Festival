<?php if (have_posts()) : the_post();
?>
<section id="content" class=" grid_8">
		<?php rembrandt_breadcrumb(); ?>
	<article <?php post_class('post') ?>>
		<?php	if ( has_post_format( get_post_format())) {
		?>
		<a class="format_post grid_1 alpha" href="<?php echo get_post_format_link(get_post_format()) ?>" title="<?php _e(get_post_format(), 'rembrandt');?>" > <?php   _e('Quote', 'rembrandt');?></a>
		<?php   }?>
		<header>
			<?php  	the_title('<h1>', '</h1>');?>
			<?php if ( comments_open() && ! post_password_required() ) :
			?>
			<div class="post-comments">
				<?php  	comments_popup_link(__('0', 'rembrandt'), __('1 ', 'rembrandt'), __('% ', 'rembrandt'));?>
			</div>
			<?php   endif;?>
			<?php  	rembrandt_posted_on();?>
		</header>
		<?php
		if ((function_exists('add_theme_support')) && ( has_post_thumbnail())) {
			the_post_thumbnail('rembrandt_single_post');
		}
		?>
		<div class="entry">		
			<?php  	the_content(__('Continue reading &rarr;', 'rembrandt'));?>
		</div>
		<footer>
			<?php  	wp_link_pages(array('before' => '<div class="page-link">' . __('Pages:', 'rembrandt'), 'after' => '</div>'));?>
			<?php   rembrandt_posted_footer();?>
			<?php  	rembrandt_author_info();?>
			<?php  	edit_post_link(__('Edit This', 'rembrandt'));?>
		</footer>
	</article>
	<?php comments_template('', true);?>
</section>
<?php  endif;
?>
<?php get_sidebar();
?>