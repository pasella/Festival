<?php /**
 * Template Name: Slideshow
 *  */
wp_enqueue_script('rembrandt-slide');
?>
<?php get_header();?>

	<div class="container_12" id="wrapper"> 
		<script type="text/javascript">
jQuery(document).ready(function($){
// Set starting slide to 1
var startSlide = 1;
// Initialize Slides
$('#slides').slides({
preload: true,
preloadImage: '<?php echo get_template_directory_uri();?>/images/loading.gif',
	generatePagination: true,
	//play: 5000,
	pause: 2500,
	hoverPause: true,
	effect: 'fade',
	// Get the starting slide
	start: startSlide,
	animationComplete: function(current) {
		// Set the slide number as a hash
		window.location.hash = '#' + current;
	}
	});
	});
		</script>
		<div id="container" class="grid_12 " >
			<div id="example">
				<div  id="slides">
					<div class="slides_container">
						<?php
						global $post;
                        $post_options = get_post_options_api( '1.0.1' );

						$sticky = get_option('sticky_posts');
						$args = array(
						'meta_key' => 'slide-page',
						'post_type' => array( 'post', 'page' ),
						'p=' . $sticky, 'ignore_sticky_posts' => 0);
						$args_not = array('posts_per_page' => 4);
						if($sticky || empty($slide)) :
							query_posts($args);
						else :
							query_posts($args_not);
						endif;
						?>
						<?php   if (have_posts()) : while (have_posts()) : the_post();
						?>
						<div class="slide">
							<?php if ( (function_exists( 'add_theme_support' ))  && ( has_post_thumbnail() )):
the_post_thumbnail('rembrandt_slide');
							?>
							<div class="captionslide">
								<h2><a href="<?php	the_permalink();?>" title="<?php	echo esc_attr(sprintf(__('Permanent Link to %s', 'matisse'), the_title_attribute('echo=0')));?>" rel="bookmark"><?php	the_title();?></a></h2>
								<?php the_excerpt();?>
							</div>
							<?php else :?>
							<div class="slide-no-image">
								<h2><a href="<?php	the_permalink();?>" title="<?php	echo esc_attr(sprintf(__('Permanent Link to %s', 'matisse'), the_title_attribute('echo=0')));?>" rel="bookmark"><?php	the_title();?></a></h2>
								<?php the_excerpt();?>
							</div>
							<?php endif;?>
						</div>
						<?php endwhile; endif; wp_reset_query();?>
					</div>
					<a href="#" class="prev">Prev</a>
					<a href="#" class="next">Next</a>
				</div>
			</div>
		</div>
	
	

	<section class=" grid_12">
		<?php if (have_posts()) : while (have_posts()) : the_post();

		?>
		<article <?php post_class('post slide_page') ?>>
			<header>
				<?php the_title('<h1 class="title">', '</h1>');?>
			</header>
							<?php
				if((function_exists('add_theme_support')) && ( has_post_thumbnail())) {
					the_post_thumbnail('rembrandt_slide');
				}
				?>
			<?php	the_content(__('(more...)', 'rembrandt'));?>
		</article>
		<?php endwhile;  endif;?>
	</section>
	<div class="clear"></div>
</div>
<?php get_footer();?>
