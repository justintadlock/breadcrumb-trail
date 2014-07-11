=== Breadcrumb Trail ===

Contributors: greenshady
Donate link: http://themehybrid.com/donate
Tags: navigation, menu, breadcrumb, breadcrumbs, microdata, schema
Requires at least: 3.6
Stable tag: 0.6.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.htm

A powerful script for adding breadcrumbs to your site that supports Schema.org HTML5-valid microdata.

== Description ==

Breadcrumb Trail is one of the most advanced and robust breadcrumb menu systems available for WordPress.  It started out as a small script for basic blogs but has grown into a system that can handle nearly any site's setup to show the most accurate breadcrumbs for each page.

### How it works ###

This plugin automatically detects your permalink setup and displays breadcrumbs based off that structure.  Nearly all sites have some sort of hierarchy.  Breadcrumb Trail recognizes that and builds a set of unique breadcrumbs for each page on your site.

This means that it can also detect custom post types and taxonomies right out of the box.  Whatever you throw at it, it's got a solution.

### Features ###

* 5+ years of development and user testing.
* Auto-detects the permalink structure of your site for the most accurate breadcrumbs.
* Hooks for plugin/theme developers to overwrite output.
* Coded with object-oriented programming (OOP) methods to allow developers to extend it for those highly-custom setups.

### Professional support ###

If you need professional plugin support from me, the plugin author, you can access the support forums at [Theme Hybrid](http://themehybrid.com/support), which is a professional WordPress help/support site where I handle support for all my plugins and themes for a community of 40,000+ users (and growing).

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

To see all methods and options, refer to the `readme.md` file included with the plugin download.

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

### Version 0.6.0+ ###

If upgrading to a version earlier than 0.6.0 to 0.6.0+, you should check the `readme.md` documentation on some of the argument changes if you've been adding custom arguments into the `breadcrumb_trail()` function.

== Changelog ==

### Version 0.6.1 ###

* Make sure `breadcrumb_trail()` can return the HTML.
* Add `rel="home"` to the home page link. This got removed at some point.
* Do network and site home links in bbPress.
* Slight fix to stop bbPress from putting double "Forums" in the breadcrumb trail.
* The `show_on_front` argument should only work if the front page is not paginated.
* Better handling of the text strings, particularly when displaying date/time.
* Updated `breadcrumb-trail.pot` file for better translating.

### Version 0.6.0 ###

* [Schema.org](http://schema.org) support.
* Completely overhauled the entire plugin, rewriting large swathes of code from the ground up.  This version takes an object-oriented approach.
* Blew every other breadcrumb menu script out of the water.

### Version 0.5.3 ###

#### Enhancements ####

* Use `post_type_archive_title()` on post type archives in the trail.
* Add support for taxonomies that have a `$rewrite->slug` that matches a string value for a custom post type's `has_archive` argument.
* Added support for an `archive_title` label for custom post types because we can't use the  `post_type_archive_title()` function on single posts views for the post type.
* Loads of pagination support on both archive-type pages and paged single posts.
* Added support for hierarchical custom post types (get parent posts).
* Added the `network` argument to allow multisite owners to run the trail all the way back to the main site.

#### Bug fixes ####

* Only check attachment trail if the attachment has a parent.
* Fixed the issue where the wrong post type archive link matches with a term archive page.

### Version 0.5.2 ###

* No friggin' clue. I think I actually skipped version numbers somehow. :)

### Version 0.5.1 ###

* Changed license from GPL 2-only to GPL 2+.
* Smarter handling of the `trail-begin` and `trail-end` classes.
* Added `container` argument for wrapping breadcrumbs in a custom HTML element.
* Changed `bbp_get_forum_parent()` to `bbp_get_forum_parent_id()`.

### Version 0.5.0 ###

* Use hardcoded strings for the textdomain, not a variable.
* Inline doc updates.
* Added bbPress support.
* Use `single_post_title()` instead of `get_the_title()` for post titles.

### Version 0.4.1 ###

* Use `get_queried_object()` and `get_queried_object_id()` instead of accessing `$wp_query` directly.
* Pass `$args` as second parameter in `breadcrumb_trail` hook.

### Version 0.4.0 ###

* New function: `breadcrumb_trail_get_items()`, which grabs a list of all the trail items.  This separates the items from the main `breadcrumb_trail()` function.
* New filter hook: `breadcrumb_trail_items`, which allows devs to filter just the items.
* New function: `breadcrumb_trail_map_rewrite_tags()`, which maps the permalink structure tags set under Permalink Settings in the admin to make for a much more accurate breadcrumb trail.
* New function: `breadcrumb_trail_textdomain()`, which can be filtered when integrating the plugin into a theme to match the theme's textdomain.
* Added functionality to handle WP 3.1 post type enhancements.

### Version 0.3.1 ###

* Smarter logic in certain areas.
* Removed localization for things that shouldn't be localized with time formats.
* `single_tax` set to `null` instead of `false`.
* Better escaping of element attributes.
* Use `$wp_query->get_queried_object()` and `$wp_query->get_queried_object_id()`.
* Add in initial support of WordPress 3.1's post type archives.
* Better formatting and organization of the output late in the function.
* Added `trail-before` and `trail-after` CSS classes if `$before` or `$after` is set.

### Version 0.3.1 ###

* Undefined index error fixes.
* Fixes for trying to get a property of a non-object.

### Version 0.3.0 ###

* Added more support for custom post types and taxonomies.
* Added more support for more complex hierarchies.
* The breadcrumb trail now recognizes more patterns with pages as part of the permalink structure of other objects.
* All post types can have any taxonomy as the leading part of the trail.
* Cleaned up the code.

### Version 0.2.1 ###

* Removed and/or added (depending on the case) the extra separator item on sub-categories and date-/time-based breadcrumbs.

### Version 0.2.0 ###

* The title of the "home" page (i.e. posts page) when not the front page is now properly recognized.
* Cleaned up the code and logic behind the plugin.

### Version 0.1.0 ###

* Launch of the new plugin.