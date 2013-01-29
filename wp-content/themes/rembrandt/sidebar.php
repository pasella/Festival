<aside id="sidebar" class="grid_4">
	<?php	if ( is_active_sidebar( 'sidebar-widget-area-top' ) ) {
	?>
	<ul class="widget full">
		<?php dynamic_sidebar('sidebar-widget-area-top');?>
	</ul>
	<?php } else {?>
	<div class="widget full">
		<?php get_search_form();?>
	</div>
	<?php }?>

	<?php	if ( is_active_sidebar( 'sidebar-widget-area-full' ) ) {
	?>
	
	<ul class="widget full">
		<?php dynamic_sidebar('sidebar-widget-area-full');?>
	</ul>
	<?php } else {?>
	<ul class="widget full">
		<li>
			<h3><?php _e('Categories', 'rembrandt');?></h3>
			<ul class="widget_categories">
				<?php wp_list_categories('title_li=&show_last_update=1&use_desc_for_title=1');?>
			</ul>
		</li>
		<li><div class="clear"></div></li>
	</ul>
	<?php }?>

	<?php	if ( is_active_sidebar( 'sidebar-widget-area-bottom' ) ) {
	?>
	<ul class="widget">
		<?php dynamic_sidebar('sidebar-widget-area-bottom');?>
	</ul>
	<?php } else {?>
	<ul class="widget">
		<li>
			<h3><?php _e('Tags', 'rembrandt');?></h3>
			<div class="widget_tags">
				<?php wp_tag_cloud('smallest=8&largest=22');?>
			</div>
		</li>
	</ul>
	<?php }?>
</aside>