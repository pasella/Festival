<?php
/**
 * Template Name: Sidebar Template
**/
?>

<?php get_header();?>
<div class="container_12" id="wrapper">
	<section class="grid_8">
		<?php if (have_posts())  : the_post();
		?>
		<article <?php post_class('post') ?>>
			<header>
				<?php
				if((function_exists('add_theme_support')) && ( has_post_thumbnail())) {
					the_post_thumbnail('rembrandt_single_post');
				}
				?>
				<?php if ( is_front_page() ) {
				?>
				<?php the_title('<h2>', '</h2>');?>
				<?php } else {?>
				<?php the_title('<h1>', '</h1>');?>
				<?php }?>
			</header>
			<?php the_content(__('(more...)', 'rembrandt'));?>
			<?php wp_link_pages(array('before' => '<div class="page-link">' . __('Pages:', 'rembrandt'), 'after' => '</div>'));?>
			<?php edit_post_link(__('Edit This','rembrandt')); ?>
		</article>
		<?php comments_template();?>
		<?php   endif;?>
	</section>
	<?php get_sidebar();?>
	<div class="clear"></div>
</div>
<?php get_footer();?>
