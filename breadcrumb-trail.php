<?php
/**
 * Plugin Name: Breadcrumb Trail
 * Plugin URI: http://justintadlock.com/archives/2009/04/05/breadcrumb-trail-wordpress-plugin
 * Description: A WordPress plugin that gives you the <code>breadcrumb_trail()</code> template tag to use anywhere in your theme to show a breadcrumb menu.
 * Version: 0.6.0
 * Author: Justin Tadlock
 * Author URI: http://justintadlock.com
 */

/* Extra check in case the script is being loaded by a theme. */
if ( !function_exists( 'breadcrumb_trail' ) )
	require_once( 'inc/breadcrumbs.php' );

/* Load translation files. Note: Remove this line if packaging with a theme. */
load_plugin_textdomain( 'breadcrumb-trail', false, 'breadcrumb-trail/languages' );
