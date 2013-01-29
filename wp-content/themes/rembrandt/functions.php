<?php
/*********************/
require_once ( get_template_directory() . '/inc/widgets.php' );
require_once ( get_template_directory() . '/inc/post-options.php' );
/*********************/
if ( ! isset( $content_width ) )
		$content_width = 620;
/*********************/
add_action( 'after_setup_theme', 'rembrandt_setup' );

if ( ! function_exists( 'rembrandt_setup' ) ):
	function rembrandt_setup() {
/*********************/
load_theme_textdomain( 'rembrandt', get_template_directory() . '/languages' );
/*********************/	
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 620, 250, true );
		add_image_size('rembrandt_single_post', 620, 250, true);
		set_post_thumbnail_size( 500, 340, true );
		add_image_size('rembrandt_slide', 500, 340, true);
		add_theme_support( 'post-formats', array( 'aside', 'gallery','link','quote') );
		add_theme_support( 'automatic-feed-links' );
/*********************/
		add_editor_style();
/*********************/	
        function rembrandt_excerpt_length($length) {
	    return 85;
        }
        add_filter('excerpt_length', 'rembrandt_excerpt_length');
/*********************/
		register_nav_menu('primary', __( 'Primary Navigation','rembrandt' ));	
/*********************/
		function rembrandt_menu_args( $args ) {
		$args['show_home'] = true;
		return $args;
		}
		add_filter( 'wp_page_menu_args', 'rembrandt_menu_args' );
/********************Default gallery style*/
		add_filter('use_default_gallery_style', '__return_false');
/*********************/
		add_custom_background();
/********************Widgets*/
function rembrandt_widgets_init() {
	    register_sidebar( array(
		'name' => __( 'Sidebar Widget Area', 'rembrandt'),
		'id' => 'sidebar-widget-area-top',
		'description' => __( 'The sidebar widget area, top', 'rembrandt' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
		) );
		
		register_sidebar( array(
		'name' => __( 'Sidebar Widget Area', 'rembrandt'),
		'id' => 'sidebar-widget-area-full',
		'description' => __( 'The sidebar widget area, full width', 'rembrandt' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
		) );		
				
		register_sidebar( array(
		'name' => __( 'Sidebar Widget Area', 'rembrandt'),
		'id' => 'sidebar-widget-area-bottom',
		'description' => __( 'The sidebar widget area, bottom', 'rembrandt' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
		) );

		register_sidebar( array(
		'name' => __( 'Footer Widget Area', 'rembrandt' ),
		'id' => 'first-footer-widget-area',
		'description' => __( 'The first footer widget area', 'rembrandt' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
		) );

		register_sidebar( array(
		'name' => __( 'Footer Widget Area', 'rembrandt' ),
		'id' => 'second-footer-widget-area',
		'description' => __( 'The second footer widget area', 'rembrandt' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
		) );

		}
add_action( 'widgets_init', 'rembrandt_widgets_init' );
/*********************/
function rembrandt_print() {
	if (!is_admin()) {
		wp_register_style('print', get_template_directory_uri() . '/print.css', '', '1.0', 'print');
		wp_enqueue_style('print');
	}
}

add_action('wp_print_styles', 'rembrandt_print');
/*********************/
function rembrandt_ie() {
	        global $is_IE;
			if (! is_admin() || $is_IE){
			wp_register_script('rembrandt-ie', get_template_directory_uri() .'/js/html5.js', array('jquery'));
			wp_enqueue_script('rembrandt-ie');		
			}
			}
add_action('init', 'rembrandt_ie');
/*********************/
function rembrandt_slide() {
			if ( ! is_admin() ){
			wp_enqueue_script('jquery');
			wp_register_script('rembrandt-slide', get_template_directory_uri() .'/js/slides.min.jquery.js', array('jquery'));
			}
			}
add_action('init', 'rembrandt_slide');
/*********************/
function rembrandt_fancybox_js() {
	if (!is_admin()) {
		wp_enqueue_script('jquery');
		wp_register_script('fancybox', get_template_directory_uri() . '/js/jquery.fancybox-1.3.4.pack.js', array('jquery'));
		wp_enqueue_script('fancybox');
	}
}
add_action('init', 'rembrandt_fancybox_js');
/*********************/
function rembrandt_fancybox() {
		if (!is_admin()) {
			wp_enqueue_script('fancybox');
			$id = get_the_ID();
			echo '
	<script type="text/javascript">jQuery(document).ready(function($){
		$(".gallery-icon a[href$=\'.jpg\'], .gallery-icon a[href$=\'.jpeg\'], .gallery-icon a[href$=\'.gif\'], .gallery-icon a[href$=\'.png\']").attr("rel", \'gallery_' . esc_attr($id) . '\').fancybox({\'transitionIn\' : \'none\',
		\'transitionOut\' : \'none\', \'titlePosition\' 	: \'over\', \'titleFormat\'		: function(title, currentArray, currentIndex, currentOpts) {
		return \'<span id="fancybox-title-over">' . __('Image', 'rembrandt') . ' \' + (currentIndex + 1) + \' / \' + currentArray.length + (title.length ? \' &nbsp; \' + title : \'\') + \'</span>\';
		}});
		$(".wp-caption a[href$=\'.jpg\'], .wp-caption a[href$=\'.jpeg\'] .wp-caption a[href$=\'.gif\'] .wp-caption a[href$=\'.png\']").fancybox({\'transitionIn\' : \'elastic\',
		\'transitionOut\' : \'elastic\'});});</script>
	';
		}
	}
add_action('wp_head', 'rembrandt_fancybox');
/*********************/
function rembrandt_recent_comments_style() {
	global $wp_widget_factory;
	remove_action('wp_head', array($wp_widget_factory -> widgets['WP_Widget_Recent_Comments'], 'recent_comments_style'));
}
add_action('widgets_init', 'rembrandt_recent_comments_style');
/*********************/
function rembrandt_excerpt_more($more) {
	return '&hellip;' . ' <a class="more" href="' . get_permalink() . '">' . __('Continue reading &rarr;', 'rembrandt') . '</a>';
}

add_filter('excerpt_more', 'rembrandt_excerpt_more');
/*********************/
if (!function_exists('rembrandt_posted_on')) :
	function rembrandt_posted_on() {
		if (is_single()) {
			$format_text = __('<p>Posted on %4$s by <span class="author vcard"><a class="url fn n" href="%5$s" title="%6$s" rel="author">%7$s </a></span></p>', 'rembrandt');
		} else {
			$format_text = __('<p>Posted on <a href="%1$s" title="%2$s" rel="bookmark"> <time datetime="%3$s" pubdate> %4$s </time></a> by <span class="author vcard"><a class="url fn n" href="%5$s" title="%6$s" rel="author">%7$s </a></span></p>', 'rembrandt');
		}
		printf($format_text, esc_url(get_permalink()), esc_attr(get_the_time()), esc_attr(get_the_date('c')), esc_html(get_the_date()), esc_url(get_author_posts_url(get_the_author_meta('ID'))), sprintf(esc_attr__('View all posts by %s', 'rembrandt'), get_the_author()), esc_html(get_the_author()));
	}

endif;
/*********************/
if (!function_exists('rembrandt_posted_footer')) :
	function rembrandt_posted_footer() {
		$tag = get_the_tag_list('', __(', ', 'rembrandt'));
		$categories = get_the_category_list(__(', ', 'rembrandt'));
		if ('' != $tag) {
			$utility_text = __('Categories: %1$s,  Tags: %2$s ', 'rembrandt');
		} elseif('' != $categories) {
			$utility_text = __('Categories: %1$s ', 'rembrandt');
		} else {
			$utility_text = __('Author: %3$s', 'rembrandt');
		}
		printf($utility_text, $categories, $tag, get_the_author());
	}

endif;
/*********************/
function rembrandt_author_info(){
	if ( get_the_author_meta( 'description' ) ) :
	?>
	<div id="author-info" class=" vcard">
		<?php	echo get_avatar(get_the_author_meta('user_email'));
		?>
		<h2 class="fn url"><?php the_author_link();
		?></h2>
		<p>
			<?php	the_author_meta('description');
			?>
			<br />
			<a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID')));?>" rel="author"> <?php printf(__('View all posts by %s &rarr;', 'rembrandt'), get_the_author());
			?></a>
		</p>
	</div>
	<?php
endif;
}
	
/*********************/
function rembrandt_breadcrumb(){
if (function_exists('yoast_breadcrumb')) {
	yoast_breadcrumb('<p id="breadcrumbs">', '</p>');
	} else {
	if ( is_home() || is_front_page() ) :
	echo __('<p id="breadcrumbs">Home</p>', 'rembrandt');

	elseif ( is_single() ):
	printf(__('
	<p id="breadcrumbs"><a href="%1$s" title="Home">Home </a> &raquo; %2$s</p>', 'rembrandt'),
	site_url(), get_the_category_list(__(', ', 'rembrandt')));

	elseif ( is_tag() ):
	printf(__('<p id="breadcrumbs"><a href="%1$s" title="Home">Home </a> &raquo; %2$s</p>', 'rembrandt'),
	site_url(), single_tag_title("", false));

	elseif ( is_category() ):
	printf(__('<p id="breadcrumbs"><a href="%1$s" title="Home">Home </a> &raquo; %2$s</p>', 'rembrandt'),
	site_url(), single_cat_title("", false));

	else :
	printf(__('<p id="breadcrumbs"><a href="%1$s" title="Home">Home </a></p>', 'rembrandt'),
	site_url());
	endif;
	}
}
/*********************/
	if ( ! defined( 'HEADER_IMAGE' ) )
		define( 'HEADER_IMAGE', '%s/images/header.jpg' );
/*********************/
	define( 'HEADER_IMAGE_WIDTH', apply_filters( 'sketchbook_header_image_width', 960 ) );
	define( 'HEADER_IMAGE_HEIGHT', apply_filters( 'sketchbook_header_image_height', 150 ) );
/*********************/
	set_post_thumbnail_size( HEADER_IMAGE_WIDTH, HEADER_IMAGE_HEIGHT, true );
/*********************/
	if ( ! defined( 'NO_HEADER_TEXT' ) )
		define( 'NO_HEADER_TEXT', true );
/*********************/
function header_style() {
	if (get_header_image()){
    ?><style type="text/css">#header hgroup{ 
    	background: url(<?php header_image();?>) no-repeat;
        width: <?php echo HEADER_IMAGE_WIDTH;?>px;
        height: <?php echo HEADER_IMAGE_HEIGHT;?>px;  }	
    	</style><?php
	}}
	/*********************/
	add_custom_image_header( 'header_style', 'header_style' );
	/*********************/
register_default_headers(array('rembrandt2' => array('url' => '%s/images/headers/rembrandt2.jpg', 'thumbnail_url' => '%s/images/headers/rembrandt2-thumbnail.jpg', 'description' => __('Rembrandt 2', 'rembrandt'), ), ));
register_default_headers(array('rembrandt3' => array('url' => '%s/images/headers/rembrandt3.jpg', 'thumbnail_url' => '%s/images/headers/rembrandt3-thumbnail.jpg', 'description' => __('Rembrandt 3', 'rembrandt'), ), ));
}
endif;
/*********************/
	// end rembrandt_setup
/********************Paginations*/	
if ( ! function_exists('rembrandt_pagination') ) {
	function rembrandt_pagination() {
	global $wp_query, $wp_rewrite;
	$wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;

	$pagination = array(
	'base' => @add_query_arg('paged','%#%'),
	'format' => '',
	'total' => $wp_query->max_num_pages,
	'current' => $current,
	'prev_text'    => __('&laquo; Previous', 'rembrandt'),
    'next_text'    => __('Next &raquo;', 'rembrandt'),
	'show_all' => false,
	'mid_size' => 4,
	'end_size'     => 2,
	'type' => 'plain'
	);

	if( $wp_rewrite->using_permalinks() )
	$pagination['base'] = user_trailingslashit( trailingslashit( remove_query_arg( 's', get_pagenum_link( 1 ) ) ) . 'page/%#%/', 'paged' );

	if( !empty($wp_query->query_vars['s']) )
	$pagination['add_args'] = array( 's' => get_query_var( 's' ) );

	echo '
	<div class="wp-pagenavi">
		' .paginate_links($pagination).'
	</div>
	' ;
	}
}
/*********************/
add_filter('wp_nav_menu_args', 'rembrandt_nav_menu_args');
function rembrandt_nav_menu_args($args = '') {
	$args['container'] = false;
	return $args;
}
/*********************/
function rembrandt_change_mce_buttons($initArray) {
	//$initArray['theme_advanced_blockformats'] = 'p,h2,h3,h4,h5,h6,address,pre,code,';
	$initArray['theme_advanced_buttons3'] = 'sub,sup';
	$initArray['theme_advanced_buttons3_add_before'] = 'styleselect';
	$initArray['theme_advanced_styles'] = 'Float Left=alignleft,Float Right=alignright,List style: Tick=s_tick,List style: Arrow=s_arrow,Frame: Alert=s_alert,Frame: Warning=s_warning,Frame: Info=s_info,Frame: Border=s_border,Frame: Border dotted=s_border_dotted,Frame: Border top/bottom=s_border_top_bottom,Buttons=s_button,Buttons: alignleft=s_button_left,Buttons: alignright=s_button_right,Buttons: Full width=s_button_full,Width 1/3=s_width_1_3,Width 1/2=s_width_1_2,Width 2/3=s_width_2_3,Background color: Black=s_b_black,Background color: Grey=s_b_grey';
	return $initArray;
}
add_filter('tiny_mce_before_init', 'rembrandt_change_mce_buttons');
/*********************/
if (!function_exists('rembrandt_footer_classes')) :
	function rembrandt_footer_classes($existing_classes) {
		if (is_active_sidebar('first-footer-widget-area') || is_active_sidebar('second-footer-widget-area'))
			$classes[] = 'footer-widget';
		else
			$classes[] = 'footer-no-widget';
		return array_merge($existing_classes, $classes);
	}

	add_filter('body_class', 'rembrandt_footer_classes');
endif;
/*********************/
	if ( ! function_exists( 'custom_comments' ) ) :
	function custom_comments( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
	case '' :
?>
	<li <?php	comment_class();?> id="li-comment-<?php	comment_ID();?>">
		<article id="comment-<?php	comment_ID();?>">
		<footer  class="comment-author vcard">
			<?php	echo get_avatar($comment, 60);?>
				<div class="comment-meta commentmetadata"><a href="<?php	echo esc_url(get_comment_link($comment -> comment_ID));?>">
			<?php		
					printf(__('%1$s at %2$s', 'rembrandt'), get_comment_date(), get_comment_time());
				?></a><?php	edit_comment_link(__('(Edit)', 'rembrandt'), ' ');?><br />
		
			<?php	printf(__('%s <span class="says">says:</span>', 'rembrandt'), sprintf('<cite class="fn">%s</cite>', get_comment_author_link()));?>
	<div class="reply">
			<?php	comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth'])));?>
		</div>
	</div>		
		<!-- .comment-author .vcard -->
		<?php if ( $comment->comment_approved == '0' ) : ?>
			<em><?php	_e('Your comment is awaiting moderation.', 'rembrandt');?></em>
			<br />
		<?php	endif;?>

</footer>
<div class="comment-body"><?php	comment_text();?></div>
</article>
<?php
	break;
	case 'pingback'  :
	case 'trackback' :
?>
	<li <?php	comment_class();?>>
		<p><?php	_e('Pingback:', 'rembrandt');?> <?php	comment_author_link();?><?php	edit_comment_link(__('(Edit)', 'rembrandt'), ' ');?></p>
<?php
    break;
    endswitch;
    }
    endif;
/*********************/
?>