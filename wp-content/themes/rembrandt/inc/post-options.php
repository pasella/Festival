<?php
/*
 * Plugin Name: Post Options API Example
 * Description: This plugin demonstrates the usage of the Post Options API
 * Author: Konstantin Kovshenin
 * Version 1.0.1
 * License: GPLv2
 */

// We'll do everything inside init.
add_action( 'init', 'post_options_api_example' );

// Let's test out the above
function post_options_api_example() {
	
	// Include the Post Options API Library bundled with this plugin
	require( dirname( __FILE__ ) . '/post-options-api.1.0.1.php' );

	// Initialize the Post Options API and Fields
	$post_options = get_post_options_api( '1.0.1' );
	$post_fields = get_post_options_api_fields( '1.0.1' );	
	
	// Register two sections and add them both to the 'post' post type
	$post_options->register_post_options_section( 'post-f', __( 'Post Format options', 'rembrandt' ),1 );
	$post_options->register_post_options_section( 'page-o', __( 'Page options', 'rembrandt' ),1 );
	$post_options->add_section_to_post_type( 'post-f', 'post' );
	$post_options->add_section_to_post_type( 'page-o', 'page' );
	
	// The showing off section

/*    Page slideshow  */
	
	$post_options->register_post_option( array( 
		'id' => 'slide-page',
		'title' => __( 'Featured', 'rembrandt' ),
		'section' => 'page-o',
		'callback' => $post_fields->checkbox( array(
			'label' => __( 'This is a featured post', 'rembrandt' ),
			'description' => __( 'Check this to feature the post in the highlights section on the homepage.', 'rembrandt' )
		) )
	) );
	
	/*    Post Format - Link  */
	$post_options->register_post_option( array( 
		'id' => 'pf-link',
		'title' => __( 'Post format - Link', 'rembrandt' ),
		'section' => 'post-f',
		'callback' => $post_fields->text( array(
			'description' => __( 'Paste link', 'rembrandt' )
		) )
	) );
/*    Post Format - Quote Author  */
	$post_options->register_post_option( array( 
		'id' => 'pf-quote-title',
		'title' => __( 'Post format - Quote - Author', 'rembrandt' ),
		'section' => 'post-f',
		'callback' => $post_fields->text( array(
			'description' => __( 'If you choose the format of the post - quotation - and you want to add the author you must write his name.', 'rembrandt' )
		) )
	) );
/*    Post Format - Quote link  */		
	$post_options->register_post_option( array( 
		'id' => 'pf-quote',
		'title' => __( 'Post format - Quote - Link', 'rembrandt' ),
		'section' => 'post-f',
		'callback' => $post_fields->text( array(
			'description' => __( 'Past the link into the source of quotation. The author of the quotation will be the link to the source, to make the link available fill in \"the Author quotation\" field.', 'rembrandt' )
		) )
	) );
	
}

/*----------*/
/*    Post Format - Link  */
/*----------*/
	if(!function_exists('rembrandt_link_format')) {	
		function rembrandt_link_format() {
global $post;
$post_options = get_post_options_api( '1.0.1' );
$link = $post_options->get_post_option( $post->ID, 'pf-link' );	
if ( ! empty($link) ) : 
	    return esc_url_raw($link);
elseif(preg_match('/<a\s[^>]*?href=[\'"](.+?)[\'"]/is', get_the_content(), $matches)):
		return esc_url_raw($matches[1]);
else :
		return esc_url_raw(get_permalink());
endif;
	}
	}
/*----------*/
/*    Post Format - Quote  */
/*----------*/
	if(!function_exists('rembrandt_post_quote')) {
function rembrandt_post_quote() {
global $post;
$post_options = get_post_options_api( '1.0.1' );
$quote = $post_options->get_post_option( $post->ID, 'pf-quote' );
$quoteauthor = $post_options->get_post_option( $post->ID, 'pf-quote-title' );

if ( ! empty( $quoteauthor) && empty( $quote) ) 
echo '<h2><cite>'.$quoteauthor.'</cite></h2>';	

elseif ( ! empty( $quoteauthor) && ! empty( $quote) )  
echo '<h2><cite><a href="'.$quote.'" title="'.esc_attr(sprintf(__('%s', 'rembrandt'), the_title_attribute('echo=0'))).'" rel="bookmark">'.$quoteauthor.'</a></cite></h2>';
}
	}
?>