<!DOCTYPE html>
<html <?php	language_attributes();?>>
	<head>
		<meta charset="<?php	bloginfo('charset');?>" />
		<meta name="viewport" content="width=device-width" />
		<title><?php
		global $page, $paged;
		wp_title('|', true, 'right');
		bloginfo('name');

		$site_description = get_bloginfo('description', 'display');
		if ($site_description && (is_home() || is_front_page()))
			echo " | $site_description";

		if ($paged >= 2 || $page >= 2)
			echo ' | ' . sprintf(__('Page %s', 'rembrandt'), max($paged, $page));
	?></title>
		<link rel="profile" href="http://gmpg.org/xfn/11" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php	bloginfo('stylesheet_url');?>" />
		<link rel="pingback" href="<?php	bloginfo('pingback_url');?>" />
		<?php
			if (is_singular() && get_option('thread_comments'))
				wp_enqueue_script('comment-reply');
			wp_head();
		?>		
<?php 	wp_enqueue_script('rembrandt-ie'); ?>
</head>
	<body <?php	body_class();?>>
		<header id="header">
			<hgroup class="container_12">
				<?php	$rembrandt_heading_tag = (is_home() || is_front_page()) ? 'h1' : 'h2'; ?>
				<<?php	echo $rembrandt_heading_tag; ?>
				 class="grid_5 suffix_7"> <a href="<?php	echo site_url();?>"><?php	bloginfo('name');
				?></a></<?php	echo $rembrandt_heading_tag;?>>
<h3 class="grid_5 suffix_7"><?php	bloginfo('description');
				?></h3>
			</hgroup>
			<div class="clear"></div>
		</header>
		<nav  id="nav" >
			<div class="container_12">
				<?php wp_nav_menu(array('sort_column' => 'menu_order', 'Primary Navigation', 'theme_location' => 'primary', 'menu_class' => 'grid_12'));
				?>
			</div>
			<div class="clear"></div>
		</nav>
