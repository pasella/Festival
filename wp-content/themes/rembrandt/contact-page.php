<?php
/**
 * Template Name: Contact 
**/
?>

<?php get_header();?>
<div class="container_12">
	<section id="content" class="grid_8">
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
		<?php endif;?>
	</section>
<?php $contact=get_post_meta($post->ID, "contact", true);
if (is_page() && $contact!=null) { ?>
<aside id="sidebar" class="grid_4">
	<ul class="widget">
		<li>
<?php echo do_shortcode($contact); ?>
		</li>
	</ul>
</aside>
<?php } ?>	


</div>
<?php $maps=get_post_meta($post->ID, "maps", true);
if (is_page() && $maps!=null) { ?>
	<div class="container_12">
	<section id="maps" class="grid_8">
<?php echo $maps; ?>
		</section>
	</div>
<?php } ?>


<?php get_footer();?>
