<?php	get_header();?>
<div class="container_12" id="wrapper">
	<section id="content" class="grid_8">
			<?php rembrandt_breadcrumb(); ?>
		<div class="title">
			<?php
			if (is_category()) :
				printf(__('<h1>Category Archives: <span>%s</span></h1>', 'rembrandt'), single_cat_title('', false));
				printf(__('%s', 'rembrandt'), category_description());
			elseif (is_tag()) :
				printf(__('<h1>Tag Archives: <span>%s</span></h1>', 'rembrandt'), single_tag_title('', false));
				printf(__('%s', 'rembrandt'), tag_description());
			elseif (is_day()) :
				printf(__('<h1>Daily Archives: <span>%s</span></h1>', 'rembrandt'), get_the_date());
			elseif (is_month()) :
				printf(__('<h1>Monthly Archives: <span>%s</span></h1>', 'rembrandt'), get_the_date('F Y'));
			elseif (is_year()) :
				printf(__('<h1>Yearly Archives: <span>%s</span></h1>', 'rembrandt'), get_the_date('Y'));
			elseif (has_post_format('gallery')) :
				_e('<h1>Gallery</h1>', 'rembrandt');
			elseif (has_post_format('link')) :
				_e('<h1>Links </h1>', 'rembrandt');
			elseif (has_post_format('aside')) :
				_e('<h1>Aside </h1>', 'rembrandt');
			elseif (has_post_format('quote')) :
				_e('<h1>Quote</h1>', 'rembrandt');
			else :
				_e('<h1>Blog Archives</h1>', 'rembrandt');
			endif;
			?>

		</div>
		<?php if ( have_posts() ) : while (have_posts()) : the_post();
		?>
		<?php get_template_part('loop', get_post_format());?>
		<?php endwhile; 	endif;?>
	</section>
	<?php	get_sidebar();?>
	<?php
	if (function_exists('wp_pagenavi')) { wp_pagenavi();
	} else {  rembrandt_pagination();
	}
	?>
</div>
<?php get_footer();?>
