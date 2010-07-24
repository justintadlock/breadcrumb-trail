<?php
/**
 * Plugin Name: Breadcrumb Trail
 * Plugin URI: http://justintadlock.com/archives/2009/04/05/breadcrumb-trail-wordpress-plugin
 * Description: A WordPress plugin that gives you the <code>breadcrumb_trail()</code> template tag to use anywhere in your theme to show a breadcrumb menu.
 * Version: 0.2
 * Author: Justin Tadlock
 * Author URI: http://justintadlock.com
 *
 * A script for showing a breadcrumb menu within template files.
 * Use the template tag breadcrumb_trail() to get it to display.
 * Two filter hooks are available for developers to change the
 * output: breadcrumb_trail_args and breadcrumb_trail.
 *
 * @copyright 2008 - 2009
 * @version 0.2
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
load_plugin_textdomain( 'breadcrumb-trail', false, 'breadcrumb-trail' );

/**
 * Shows a breadcrumb for all types of pages.  Themes and 
 * plugins can filter $args or input directly.  Allow filtering of 
 * only the $args using get_the_breadcrumb_args.
 *
 * @since 0.1
 * @param array $args Mixed arguments for the menu.
 * @return string Output of the breadcrumb menu.
 */
function breadcrumb_trail( $args = array() ) {
	global $wp_query;

	/* Get the textdomain. */
	$textdomain = 'breadcrumb-trail';

	/* Set up the default arguments for the breadcrumb. */
	$defaults = array(
		'separator' => '/',
		'before' => '<span class="breadcrumb-title">' . __( 'Browse:', $textdomain ) . '</span>',
		'after' => false,
		'front_page' => true,
		'show_home' => __( 'Home', $textdomain ),
		'single_tax' => 'category',
		'format' => 'flat', // Implement later
		'echo' => true
	);

	/* Apply filters to the arguments. */
	$args = apply_filters( 'breadcrumb_trail_args', $args );

	/* Parse the arguments and extract them for easy variable naming. */
	extract( wp_parse_args( $args, $defaults ) );

	if ( $separator )
		$separator = '<span class="sep">' . $separator . '</span>';

	if ( is_front_page() && !$front_page )
		return apply_filters( 'breadcrumb_trail', false );

	if ( $show_home && is_front_page() )
		$trail['trail_end'] = "{$show_home}";
	elseif ( $show_home )
		$trail[] = '<a href="' . get_bloginfo( 'url' ) . '" title="' . get_bloginfo( 'name' ) . '" rel="home" class="trail-begin">' . $show_home . '</a>';

	if ( is_home() && !is_front_page() ) {
		$home_page = get_page( $wp_query->get_queried_object_id() );

			$parent_id = $home_page->post_parent;
			while ( $parent_id ) {
				$page = get_page( $parent_id );
				$parents[]  = '<a href="' . get_permalink( $page->ID ) . '" title="' . get_the_title( $page->ID ) . '">' . get_the_title( $page->ID ) . '</a>';
				$parent_id  = $page->post_parent;
			}
			if ( $parents ) {
				$parents = array_reverse( $parents );
				foreach ( $parents as $parent )
					$trail[] = $parent;
			}
		$trail['trail_end'] = get_the_title( $home_page->ID );
	}

	elseif ( is_singular() ) {

		if ( is_page() ) {
			$parent_id = $wp_query->post->post_parent;
			while ( $parent_id ) {
				$page = get_page( $parent_id );
				$parents[]  = '<a href="' . get_permalink( $page->ID ) . '" title="' . get_the_title( $page->ID ) . '">' . get_the_title( $page->ID ) . '</a>';
				$parent_id  = $page->post_parent;
			}
			if ( $parents ) {
				$parents = array_reverse( $parents );
				foreach ( $parents as $parent )
					$trail[] = $parent;
			}
		}
		elseif ( is_attachment() ) {
			$trail[] = '<a href="' . get_permalink( $wp_query->post->post_parent ) . '" title="' . get_the_title( $wp_query->post->post_parent ) . '">' . get_the_title( $wp_query->post->post_parent ) . '</a>';
		}

		elseif ( is_single() ) {
			if ( $single_tax && $terms = get_the_term_list( $wp_query->post->ID, $single_tax, '', ', ', '' ) )
				$trail[] = $terms;
		}

		$trail['trail_end'] = get_the_title();
	}

	elseif ( is_archive() ) {

		if ( is_tax() || is_category() || is_tag() ) {
			$term = $wp_query->get_queried_object();

			if ( is_category() && $term->parent ) {
				$parents = get_category_parents( $term->parent, true, $separator, false );
				if ( $parents )
					$trail[] = $parents;
			}

			$trail['trail_end'] = $term->name;
		}

		elseif ( is_author() )
			$trail['trail_end'] = get_the_author_meta( 'display_name', get_query_var( 'author' ) );

		elseif ( is_time() ) {

			if ( get_query_var( 'minute' ) && get_query_var( 'hour' ) )
				$trail['trail_end'] = get_the_time( __( 'g:i a', $textdomain ) );

			elseif ( get_query_var( 'minute' ) )
				$trail['trail_end'] = sprintf( __( 'Minute %1$s', $textdomain ), get_the_time( __( 'i', $textdomain ) ) );

			elseif ( get_query_var( 'hour' ) )
				$trail['trail_end'] = get_the_time( __( 'g a', $textdomain ) );
		}

		elseif ( is_date() ) {

			if ( is_day() ) {
				$trail[] = '<a href="' . get_year_link( get_the_time( __( 'Y', $textdomain ) ) ) . '" title="' . get_the_time( __( 'Y', $textdomain ) ) . '">' . get_the_time( __( 'Y', $textdomain ) ) . '</a>' . $separator;
				$trail[] = '<a href="' . get_month_link( get_the_time( __( 'Y', $textdomain ) ), get_the_time( __( 'm', $textdomain ) ) ) . '" title="' . get_the_time( __( 'F', $textdomain ) ) . '">' . get_the_time( __( 'F', $textdomain ) ) . '</a>' . $separator;
				$trail['trail_end'] = get_the_time( __( 'j', $textdomain ) );
			}

			elseif ( get_query_var( 'w' ) ) {
				$trail[] = '<a href="' . get_year_link( get_the_time( __( 'Y', $textdomain ) ) ) . '" title="' . get_the_time( __( 'Y', $textdomain ) ) . '">' . get_the_time( __( 'Y', $textdomain ) ) . '</a>' . $separator;
				$trail['trail_end'] = sprintf( __( 'Week %1$s', 'hybrid' ), get_the_time( __( 'W', $textdomain ) ) );
			}

			elseif ( is_month() ) {
				$trail[] = '<a href="' . get_year_link( get_the_time( __( 'Y', $textdomain ) ) ) . '" title="' . get_the_time( __( 'Y', $textdomain ) ) . '">' . get_the_time( __( 'Y', $textdomain ) ) . '</a>' . $separator;
				$trail['trail_end'] = get_the_time( __( 'F', $textdomain ) );
			}

			elseif ( is_year() ) {
				$trail['trail_end'] = get_the_time( __( 'Y', $textdomain ) );
			}
		}
	}

	elseif ( is_search() )
		$trail['trail_end'] = sprintf( __( 'Search results for &quot;%1$s&quot;', $textdomain ), esc_attr( get_search_query() ) );

	elseif ( is_404() )
		$trail['trail_end'] = __( '404 Not Found', $textdomain );

	/* Connect the breadcrumb trail. */
	$breadcrumb = '<div class="breadcrumb breadcrumbs"><div class="breadcrumb-trail">';
	$breadcrumb .= " {$before} ";
	if ( is_array( $trail ) )
		$breadcrumb .= join( " {$separator} ", $trail );
	$breadcrumb .= '</div></div>';

	$breadcrumb = apply_filters( 'breadcrumb_trail', $breadcrumb );

	/* Output the breadcrumb. */
	if ( $echo )
		echo $breadcrumb;
	else
		return $breadcrumb;
}

?>