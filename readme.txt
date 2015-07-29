=== Breadcrumb Trail ===

Contributors: greenshady
Donate link: http://themehybrid.com/donate
Tags: navigation, menu, breadcrumb, breadcrumbs, microdata, schema
Requires at least: 4.2
Stable tag: 1.0.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.htm

A powerful script for adding breadcrumbs to your site that supports Schema.org HTML5-valid microdata.

== Description ==

Breadcrumb Trail is one of the most advanced and robust breadcrumb menu systems available for WordPress.  It started out as a small script for basic blogs but has grown into a system that can handle nearly any site's setup to show the most accurate breadcrumbs for each page.

### How it works ###

This plugin automatically detects your permalink setup and displays breadcrumbs based off that structure.  Nearly all sites have some sort of hierarchy.  Breadcrumb Trail recognizes that and builds a set of unique breadcrumbs for each page on your site.

This means that it can also detect custom post types and taxonomies right out of the box.  Whatever you throw at it, it's got a solution.

### Features ###

* 7+ years of development and user testing.
* Auto-detects the permalink structure of your site for the most accurate breadcrumbs.
* Hooks for plugin/theme developers to overwrite output.
* Coded with object-oriented programming (OOP) methods to allow developers to extend it for those highly-custom setups.

### Professional support ###

If you need professional plugin support from me, the plugin author, you can access the support forums at [Theme Hybrid](http://themehybrid.com), which is a professional WordPress help/support site where I handle support for all my plugins and themes for a community of 60,000+ users (and growing).

== Installation ==

1. Upload `breadcrumb-trail` to the `/wp-content/plugins/` directory.
2. Activate the plugin through the 'Plugins' menu in WordPress.
3. Add the `breadcrumb_trail()` template tag to your theme.

More detailed instructions are included in the plugin's `readme.md` file.

== Frequently Asked Questions ==

### Why was this plugin created? ###

Many of my theme users had a real need for a functional breadcrumb menu without having to find and test a lot of other plugins.  Therefore, I created a breadcrumbs script for those users.  Eventually, I decided to package it as a plugin and share it with others.

The plugin is still mostly packaged with themes and is currently being used on millions of WordPress sites.

### What's a breadcrumb menu? ###

Basically, it's a navigational tool.  On many sites, you'll see something that looks like this:

	You are here: Home > Page > Sub-page > Sub-sub-page

This plugin allows you to easily add this type of menu your site.

### How do I add it to my theme? ###

There are several methods, but in general, you would add the following line of code to your theme.  Generally, this goes somewhere near the bottom of your theme's `header.php` template.  However, you can add it anywhere you want in your theme, and it should work.

	<?php if ( function_exists( 'breadcrumb_trail' ) ) breadcrumb_trail(); ?>

To see all methods and options, refer to the `readme.md` file included with the plugin download.  You can also [view the readme online](https://github.com/justintadlock/breadcrumb-trail/blob/master/readme.md).

### How do I disable the plugin styles? ###

You can disable the plugin styles by adding this to your theme's `functions.php` file:

	add_action( 'after_setup_theme', 'bct_theme_setup' );

	function bct_theme_setup() {
		add_theme_support( 'breadcrumb-trail' );
	}

Note that the breadcrumbs will be completely unstyled at this point.  You'll need to add style rules to your theme's `style.css` file.

### Do breadcrumbs show in Google search results? ###

Yes, breadcrumbs *can* show in Google search results.  The breadcrumbs are coded in a way that all of the major search engines should be able to recognize them.  It is marked up with the appropriate Schema.org properties to make it easier for search engines and other systems to understand.

With that said, it's still left up to the search provider to actually show the breadcrumbs.  Generally, they do show them.

Don't expect to see breadcrumbs in your search results on the first day either.  It may take a bit, depending on how often your Web site is crawled.

### What is Schema.org? Microdata? ###

[Microdata](http://en.wikipedia.org/wiki/Microdata_(HTML)) is a way to nest metadata into your Web site's pages.  It allows things like search engines and browsers to provide a more useful experience for users.  Microdata provides a way for you to describe the "meaning" (i.e., semantics) of specific items on your site by using a standardized vocabulary.

[Schema.org](http://schema.org) is a microdata vocabulary.  It is a collaboration by Bing, Google, Yahoo!, and Yandex for creating a set of standardized conventions for using microdata on the Web.  With these standards in place, we can make our Web sites' data more understandable to search engines and browsers while providing a richer experience for users.

### Does this help with SEO? ###

Well, it doesn't hurt.  The way I see it, the more meaningful information you provide to search engines, the more likely you are to rank up.  Properly-coded breadcrumbs are just one tool in a gigantic toolbox for building a search-engine optimized site.

### The breadcrumbs display the wrong data! ###

This is rare, especially if you put the code in your header template.  However, it can happen on occasion when your theme or another plugin messes with some of WordPress' global variables but doesn't set things back properly after doing whatever it is they're doing.

There's not really much I can do to correct that within the Breadcrumb Trail plugin.  The only thing I could do is help you fix the theme/plugin causing the issue.  If this happens, you'll need to drop by my [support forums](http://themehybrid.com/support) to get help.

== Screenshots ==

1. Breadcrumbs in Google search results.
2. Date-based permalink structure in breadcrumbs.
3. Custom post type + taxonomy (portfolio).
4. Image attachment of a blog post.

== Upgrade Notice ==

### Version 1.0.0+ ###

If upgrading to a version earlier than 1.0.0, your custom styles may need to be adjusted.  The HTML markup has changed to a better HTML5 structure.

== Changelog ==

Please see the `changelog.md` file included with the plugin file.  Or, you can view the [online change log](https://github.com/justintadlock/breadcrumb-trail/blob/master/readme.md).







