<?php
/**
 * Plugin Name: Breadcrumb Trail
 * Plugin URI:  https://themehybrid.com/plugins/breadcrumb-trail
 * Description: A smart breadcrumb menu plugin embedded with <a href="http://schema.org">Schema.org</a> microdata that can handle variations in site structure more accurately than any other breadcrumb plugin for WordPress. Insert into your theme with the <code>breadcrumb_trail()</code> template tag.
 * Version:     1.1.0
 * Author:      Justin Tadlock
 * Author URI:  https://themehybrid.com
 * Text Domain: breadcrumb-trail
 * Domain Path: /lang
 */

# Extra check in case the script is being loaded by a theme.
if ( ! function_exists( 'breadcrumb_trail' ) )
	require_once( 'inc/breadcrumbs.php' );

# Plugin setup callback.
add_action( 'plugins_loaded', 'breadcrumb_trail_setup' );

# Check theme support. */
add_action( 'after_setup_theme', 'breadcrumb_trail_theme_setup', 12 );

/**
 * Plugin setup. For now, it just loads the translation.
 *
 * @since  1.1.0
 * @access public
 * @return void
 */
function breadcrumb_trail_setup() {

	load_plugin_textdomain( 'breadcrumb-trail', false, trailingslashit( dirname( plugin_basename( __FILE__ ) ) ) . 'lang' );
}

/**
 * Checks if the theme supports the Breadcrumb Trail script.  If it doesn't, we'll hook some styles
 * into the header.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function breadcrumb_trail_theme_setup() {

	if ( ! current_theme_supports( 'breadcrumb-trail' ) )
		add_action( 'wp_head', 'breadcrumb_trail_print_styles' );
}

/**
 * Prints CSS styles in the header for themes that don't support Breadcrumb Trail.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function breadcrumb_trail_print_styles() {

	$style = '
		.breadcrumbs .trail-browse,
		.breadcrumbs .trail-items,
		.breadcrumbs .trail-items li {
			display:     inline-block;
			margin:      0;
			padding:     0;
			border:      none;
			background:  transparent;
			text-indent: 0;
		}

		.breadcrumbs .trail-browse {
			font-size:   inherit;
			font-style:  inherit;
			font-weight: inherit;
			color:       inherit;
		}

		.breadcrumbs .trail-items {
			list-style: none;
		}

			.trail-items li::after {
				content: "\002F";
				padding: 0 0.5em;
			}

			.trail-items li:last-of-type::after {
				display: none;
			}';

	$style = apply_filters( 'breadcrumb_trail_inline_style', trim( str_replace( array( "\r", "\n", "\t", "  " ), '', $style ) ) );

	if ( $style )
		echo "\n" . '<style type="text/css" id="breadcrumb-trail-css">' . $style . '</style>' . "\n";
}
