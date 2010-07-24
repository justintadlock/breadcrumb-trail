<?php
/**
 * Plugin Name: Breadcrumb Trail
 * Plugin URI: http://justintadlock.com/archives/2009/04/05/breadcrumb-trail-wordpress-plugin
 * Description: A WordPress plugin that gives you the <code>breadcrumb_trail()</code> template tag to use anywhere in your theme to show a breadcrumb menu.
 * Version: 0.1
 * Author: Justin Tadlock
 * Author URI: http://justintadlock.com
 *
 * A script for showing a breadcrumb menu within template files.
 * Use the template tag breadcrumb_trail() to get it to display.
 * Two filter hooks are available for developers to change the
 * output: breadcrumb_trail_args and breadcrumb_trail.
 *
 * @copyright 2008 - 2009
 * @version 0.1
 * @author Justin Tadlock
 * @link http://justintadlock.com/archives/2009/04/05/breadcrumb-trail-wordpress-plugin
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 * @package BreadcrumbTrail
 */

/**
 * Yes, we're localizing the plugin.  This partly makes sure non-English
 * users can use it too.  To translate into your language use the
 * en_EN.po file as as guide.  Poedit is a good tool to for translating.
 * @link http://poedit.net
 *
 * @since 0.1
 */
load_plugin_textdomain( 'breadcrumb_trail' );

/**
 * Shows a breadcrumb for all types of pages
 * Themes and plugins can filter $args or input directly
 * Allow filtering of only the $args using get_the_breadcrumb_args
 *
 * Check for page templates in use: archives.php, authors.php, categories.php, tags.php
 * This is to set the breadcrumb for archives: date.php, author.php, category.php, tag.php
 * If in use, add the first page found using it as part of the breadcrumb for archives
 *
 * @since 0.1
 * @param array mixed arguments for the menu
 * @return string Output of the breadcrumb menu
 */
function breadcrumb_trail( $args = array() ) {
	global $post;

// Set up the default arguments for the breadcrumb
	$defaults = array(
		'separator' => '/',
		'before' => '<span class="breadcrumb-title">' . __('Browse:', 'breadcrumb_trail') . '</span>',
		'after' => false,
		'front_page' => true,
		'show_home' => __('Home', 'breadcrumb_trail'),
		'format' => 'flat', // Implement later
		'echo' => true,
	);

// Apply filters to the arguments
	$args = apply_filters( 'breadcrumb_trail_args', $args );

// Parse the arguments and extract them for easy variable naming
	$args = wp_parse_args( $args, $defaults );
	extract( $args );

// Put spaces around the separator
	$separator = ' ' . $separator . ' ';

// If it is the front page
// Return no value
	if ( is_front_page() && !$front_page )
		return;

	if ( ( is_home() && is_front_page() ) && ( !$front_page ) )
		return;

// Begin the breadcrumb
	$breadcrumb = '<div class="breadcrumb breadcrumbs"><div class="breadcrumb-trail">';
	$breadcrumb .= $before;
	if ( $show_home ) :
		$breadcrumb .= ' <a href="' . get_bloginfo( 'url' ) . '" title="' . get_bloginfo( 'name' ) . '" rel="home" class="trail-begin">' . $show_home . '</a>';
		if ( !is_home() && !is_front_page() )
			$breadcrumb .=  $separator;
	endif;

// Pages
	if ( is_page() && !is_front_page() ) :
		$parents = array();
		$parent_id = $post->post_parent;
		while ( $parent_id ) :
			$page = get_page( $parent_id );
			if ( $params["link_none"] )
				$parents[]  = get_the_title( $page->ID );
			else
				$parents[]  = '<a href="' . get_permalink( $page->ID ) . '" title="' . get_the_title( $page->ID ) . '">' . get_the_title( $page->ID ) . '</a> ' . $separator;
			$parent_id  = $page->post_parent;
		endwhile;
		$parents = array_reverse( $parents );
		$breadcrumb .= join( ' ', $parents );
		$breadcrumb .= '<span class="trail-end">' . get_the_title() . '</span>';

// If home or front page
	elseif ( is_front_page() && $front_page ) :
		$breadcrumb = '<div class="breadcrumb breadcrumbs"><div class="breadcrumb-trail">' . $before . ' ' . $show_home;

// If attachment
	elseif ( is_attachment() ) :
		$breadcrumb .= '<a href="' . get_permalink( $post->post_parent ) . '" title="' . get_the_title( $post->post_parent ) . '">' . get_the_title( $post->post_parent ) . '</a>';
		$breadcrumb .= $separator;
		$breadcrumb .= '<span class="trail-end">' . get_the_title() . '</span>';

// Single posts
	elseif ( is_single() ) :
		$categories = get_the_category( ', ' );
		if ( $categories ) :
			foreach ( $categories as $cat ) :
				$cats[] = '<a href="' . get_category_link( $cat->term_id ) . '" title="' . $cat->name . '">' . $cat->name . '</a>';
			endforeach;
			$breadcrumb .= join( ', ', $cats );
			$breadcrumb .= $separator;
		endif;
		$breadcrumb .= '<span class="trail-end">' . single_post_title( false, false ) . '</span>';

// Categories
	elseif ( is_category() ) :
		$pages = get_pages( array(
			'title_li' => '',
			'meta_key' => '_wp_page_template',
			'meta_value' => 'categories.php',
			'echo' => 0
		) );
		if ( $pages && $pages[0]->ID !== get_option( 'page_on_front') )
			$breadcrumb .= '<a href="' . get_page_link( $pages[0]->ID ) . '" title="' . $pages[0]->post_title . '">' . $pages[0]->post_title . '</a>' . $separator;
	// Category parents
		$cat = intval( get_query_var( 'cat' ) );
		$parent = &get_category( $cat );
		if ( is_wp_error( $parent ) )
			$parents = false;
		if ( $parent->parent && ( $parent->parent != $parent->term_id ) )
			$parents = get_category_parents( $parent->parent, true, $separator, false );

		if ( $parents ) $breadcrumb .= $parents;
		$breadcrumb .= '<span class="trail-end">' . single_cat_title( false, false ) . '</span>';

// Tags
	elseif ( is_tag() ) :
		$pages = get_pages( array(
			'title_li' => '',
			'meta_key' => '_wp_page_template',
			'meta_value' => 'tags.php',
			'echo' => 0
		) );
		if ( $pages && $pages[0]->ID !== get_option( 'page_on_front' ) )
			$breadcrumb .= '<a href="' . get_page_link( $pages[0]->ID ) . '" title="' . $pages[0]->post_title . '">' . $pages[0]->post_title . '</a>' . $separator;
		$breadcrumb .= '<span class="trail-end">' . single_tag_title( false, false ) . '</span>';

// Authors
	elseif ( is_author() ) :
		$pages = get_pages( array(
			'title_li' => '',
			'meta_key' => '_wp_page_template',
			'meta_value' => 'authors.php',
			'echo' => 0
		) );
		if ( $pages && $pages[0]->ID !== get_option( 'page_on_front' ) )
			$breadcrumb .= '<a href="' . get_page_link( $pages[0]->ID ) . '" title="' . $pages[0]->post_title . '">' . $pages[0]->post_title . '</a>' . $separator;
		$breadcrumb .= '<span class="trail-end">' . wp_title( false, false, false ) . '</span>';

// Search
	elseif ( is_search() ) :
		$breadcrumb .= '<span class="trail-end">';
		$breadcrumb .= sprintf( __('Search results for &quot;%1$s&quot;', 'breadcrumb_trail'), attribute_escape( get_search_query() ) );
		$breadcrumb .= '</span>';

	elseif ( is_date() ) :
		$pages = get_pages( array(
			'title_li' => '',
			'meta_key' => '_wp_page_template',
			'meta_value' => 'archives.php',
			'echo' => 0
		) );
		if ( $pages && $pages[0]->ID !== get_option( 'page_on_front' ) )
			$breadcrumb .= '<a href="' . get_page_link( $pages[0]->ID ) . '" title="' . $pages[0]->post_title . '">' . $pages[0]->post_title . '</a>' . $separator;

	// Day
		if ( is_day() ) :
			$breadcrumb .= '<a href="' . get_year_link( get_the_time( __('Y', 'breadcrumb_trail') ) ) . '" title="' . get_the_time( __('Y', 'breadcrumb_trail') ) . '">' . get_the_time( __('Y', 'breadcrumb_trail') ) . '</a>' . $separator;
			$breadcrumb .= '<a href="' . get_month_link( get_the_time( __('Y', 'breadcrumb_trail') ), get_the_time( __('m', 'breadcrumb_trail') ) ) . '" title="' . get_the_time( __('F', 'breadcrumb_trail') ) . '">' . get_the_time( __('F', 'breadcrumb_trail') ) . '</a>' . $separator;
			$breadcrumb .= '<span class="trail-end">' . get_the_time( __('j', 'breadcrumb_trail') ) . '</span>';

	// Week
		elseif ( get_query_var( 'w' ) ) :
			$breadcrumb .= '<a href="' . get_year_link( get_the_time( __('Y', 'breadcrumb_trail') ) ) . '" title="' . get_the_time( __('Y', 'breadcrumb_trail') ) . '">' . get_the_time( __('Y', 'breadcrumb_trail') ) . '</a>' . $separator;
			$breadcrumb .= '<span class="trail-end">' . sprintf( __('Week %1$s', 'hybrid' ), get_the_time( __('W', 'breadcrumb_trail') ) ) . '</span>';

	// Month
		elseif ( is_month() ) :
			$breadcrumb .= '<a href="' . get_year_link( get_the_time( __('Y', 'breadcrumb_trail') ) ) . '" title="' . get_the_time( __('Y', 'breadcrumb_trail') ) . '">' . get_the_time( __('Y', 'breadcrumb_trail') ) . '</a>' . $separator;
			$breadcrumb .= '<span class="trail-end">' . get_the_time( __('F', 'breadcrumb_trail') ) . '</span>';

	// Year
		elseif ( is_year() ) :
			$breadcrumb .= '<span class="trail-end">' . get_the_time( __('Y', 'breadcrumb_trail') ) . '</span>';

		endif;

// 404
	elseif ( is_404() ) :
		$breadcrumb .= '<span class="trail-end">' . __('404 Not Found', 'breadcrumb_trail') . '</span>';

	endif;

// End the breadcrumb
	$breadcrumb .= $after . '</div></div>';

// Output the breadcrumb
	if ( $echo )
		echo apply_filters( 'breadcrumb_trail', $breadcrumb );
	else
		return apply_filters( 'breadcrumb_trail', $breadcrumb );
}

?>