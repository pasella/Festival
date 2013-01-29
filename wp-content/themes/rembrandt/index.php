<?php get_header();?>
<div class="container_12" id="wrapper">
	<section id="content" class="grid_8">
		<?php rembrandt_breadcrumb(); ?>
		<?php if ( have_posts() ) : while (have_posts()) : the_post();
		?>
		<?php get_template_part('loop', get_post_format());?>
		<?php endwhile; endif;?>
	</section>
	<?php get_sidebar();?>
	<?php
	if (function_exists('wp_pagenavi')) { wp_pagenavi();
	} else { echo rembrandt_pagination();
	}
	?>
</div>
<?php get_footer();?>