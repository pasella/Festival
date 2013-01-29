<?php
/**
 * Template Name: Archives Template
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
				<?php the_title('<h2 class="title">', '</h2>');?>
				<?php } else {?>
				<?php the_title('<h1 class="title">', '</h1>');?>
				<?php }?>
			</header>
			<ul  class="widget_archive">
				<?php query_posts('posts_per_page=-1');  if ( have_posts() ) : while ( have_posts() ) : the_post();
				?>
				<li>
					<a href="<?php the_permalink() ?>"><?php the_title();?>- <em> <?php the_time( get_option('date_format'))
					?></em></a>
				</li>
				<?php endwhile; endif;?>
			</ul>
		</article>
		<?php comments_template();?>
		<?php endif;?>
	</section>
	<?php get_sidebar();?>
	<div class="clear"></div>
</div>
<?php get_footer();?>
