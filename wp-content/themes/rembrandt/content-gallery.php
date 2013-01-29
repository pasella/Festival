<?php if (have_posts()) : the_post();

?>
<section class=" grid_12">
		<?php rembrandt_breadcrumb(); ?>
	<article <?php post_class('post') ?>>
		<header>
			<?php 	the_title('<h1>', '</h1>');?>
			<?php if ( comments_open() && ! post_password_required() ) :
			?>
			<div class="post-comments">
				<?php 	comments_popup_link(__('0', 'rembrandt'), __('1', 'rembrandt'), __('%', 'rembrandt'));?>
			</div>
			<?php  endif;?>
			<?php 	rembrandt_posted_on();?>
		</header>
		<div class="entry">
			<?php 	the_content(__('Continue reading &rarr;', 'rembrandt'));?>
		</div>
		<footer>
			<?php 	wp_link_pages(array('before' => '<div class="page-link">' . __('Pages:', 'rembrandt'), 'after' => '</div>'));?>
			<?php    rembrandt_posted_footer();?>
		</footer>
	</article>
</section>
<div class="prefix_2 grid_8 suffix_2">
	<?php  	rembrandt_author_info();?>
	<?php comments_template('', true);?>
</div>
<?php  endif;?>