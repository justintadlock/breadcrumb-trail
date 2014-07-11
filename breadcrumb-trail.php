<?php
/**
 * Plugin Name: Breadcrumb Trail
 * Plugin URI:  http://themehybrid.com/plugins/breadcrumb-trail
 * Description: A smart breadcrumb menu plugin embedded with <a href="http://schema.org">Schema.org</a> microdata that can handle variations in site structure more accurately than any other breadcrumb plugin for WordPress. Insert into your theme with the <code>breadcrumb_trail()</code> template tag.
 * Version:     0.6.1
 * Author:      Justin Tadlock
 * Author URI:  http://justintadlock.com
 * Text Domain: breadcrumb-trail
 * Domain Path: /languages
 */

/* Extra check in case the script is being loaded by a theme. */
if ( !function_exists( 'breadcrumb_trail' ) )
	require_once( 'inc/breadcrumbs.php' );

/* Load translation files. Note: Remove this line if packaging with a theme. */
load_plugin_textdomain( 'breadcrumb-trail', false, 'breadcrumb-trail/languages' );
