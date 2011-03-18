=== Breadcrumb Trail ===
Contributors: greenshady
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=3687060
Tags: navigation, menu, breadcrumb, breadcrumbs
Requires at least: 3.1
Tested up to: 3.1
Stable tag: 0.4

An easy-to-use template tag for showing a breadcrumb menu on your site.

== Description ==

*Breadcrumb Trail* is a plugin that was designed to make it easy to add a breadcrumb menu anywhere you want in your theme.

How is it any better than any other breadcrumb plugin?  Well, it's probably not, to be perfectly honest.  This is just a script I've been building upon for nearly a couple of years that I usually include with my WordPress themes.  I figured I'd package it as a plugin for others to use as well.

It gives you a new template tag called `breadcrumb_trail()` that you can place anywhere in your template files.

== Installation ==

1. Upload `breadcrumb-trail` to the `/wp-content/plugins/` directory.
1. Activate the plugin through the 'Plugins' menu in WordPress.
1. Add the appropriate code to your template files as outlined in the `readme.html` file.

More detailed instructions are included in the plugin's `readme.html` file.  It is important to read through that file to properly understand all of the options and how the plugin works.

== Frequently Asked Questions ==

= Why was this plugin created? =

I mostly develop WordPress themes.  Many of my users had a real need for a functional breadcrumb menu without having to find and test a lot of other plugins.  So, I've been developing this script for several years for my theme users.

I finally thought it was time to release it publicly so others could enjoy the benefits of this plugin just as my theme users have been.

= What's a breadcrumb menu? =

Basically, it's a navigational tool.  On many sites, you'll see something that looks like this:

`You are here > Home > Archives > Sub-page`

This plugin allows you to easily add this to your site.

= How do I add it to my theme? =

There are several methods, but in general, you would use this call:

`
<?php if ( function_exists( 'breadcrumb_trail' ) ) breadcrumb_trail(); ?>
`

To see all methods and options, refer to the `readme.html` file included with the plugin download.

== Screenshots ==

There are no screenshots for this plugin.

== Changelog ==

**Version 0.4.0**

* New function: `breadcrumb_trail_get_items()`, which grabs a list of all the trail items.  This separates the items from the main `breadcrumb_trail()` function.
* New filter hook: `breadcrumb_trail_items`, which allows devs to filter just the items.
* New function: `breadcrumb_trail_map_rewrite_tags()`, which maps the permalink structure tags set under Permalink Settings in the admin to make for a much more accurate breadcrumb trail.
* New function: `breadcrumb_trail_textdomain()`, which can be filtered when integrating the plugin into a theme to match the theme's textdomain.
* Added functionality to handle WP 3.1 post type enhancements.

**Version 0.3.1**

* Smarter logic in certain areas.
* Removed localization for things that shouldn't be localized with time formats.
* `single_tax` set to `null` instead of `false`.
* Better escaping of element attributes.
* Use `$wp_query->get_queried_object()` and `$wp_query->get_queried_object_id()`.
* Add in initial support of WordPress 3.1's post type archives.
* Better formatting and organization of the output late in the function.
* Added `trail-before` and `trail-after` CSS classes if `$before` or `$after` is set.

**Version 0.3.1**

* Undefined index error fixes.
* Fixes for trying to get a property of a non-object.

**Version 0.3**

* Added more support for custom post types and taxonomies.
* Added more support for more complex hierarchies.
* The breadcrumb trail now recognizes more patterns with pages as part of the permalink structure of other objects.
* All post types can have any taxonomy as the leading part of the trail.
* Cleaned up the code.

** Version 0.2.1 **

* Removed and/or added (depending on the case) the extra separator item on sub-categories and date-/time-based breadcrumbs.

** Version 0.2 **

* The title of the "home" page (i.e. posts page) when not the front page is now properly recognized.
* Cleaned up the code and logic behind the plugin.

**Version 0.1**

* Launch of the new plugin.