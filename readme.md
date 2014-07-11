# Breadcrumb Trail #

A powerful script for adding breadcrumbs to your site that supports Schema.org, HTML5-valid microdata.

Breadcrumb Trail is one of the most advanced and robust breadcrumb menu systems available for WordPress.  It started out as a small script for basic blogs but has grown into a system that can handle nearly any site's setup to show the most accurate breadcrumbs for each page.

## Usage ##

This script won't work automatically because there's no way for me to know where it should show within your theme.  You'll have to add it manually in your template files.  You can add it pretty much anywhere you want, but I usually recommend near the bottom of your theme's `header.php` template.

The basic code you need is:

	<?php breadcrumb_trail(); ?>

Actually, you should always wrap it in a `functions_exists()` check too like so:

	<?php if ( function_exists( 'breadcrumb_trail' ) ) breadcrumb_trail(); ?>

That's all you need to do to add breadcrumbs to your site.  Of course, you can customize that a bit.

### Parameters ###

The `breadcrumb_trail()` function accepts a single parameter of `$args`, which is an array of arguments for deciding how your breadcrumbs should behave.  The default arguments are the following.

	$defaults = array(
			'container'       => 'div',   // container element
			'separator'       => '&#47;', // separator between items
			'before'          => '',      // HTML to output before
			'after'           => '',      // HTML to output after
			'show_on_front'   => true,    // whether to show on front
			'network'         => false,   // whether to create trail back to main site (multisite)
			'show_title'      => true,    // whether to show the current page title
			'show_browse'     => true,    // whether to show the "browse" text
			'echo'            => true,    // whether to echo or return the breadcrumbs

			/* Post taxonomy (examples follow). */
			'post_taxonomy' => array(
				// 'post'  => 'post_tag', // 'post' post type and 'post_tag' taxonomy
				// 'book'  => 'genre',    // 'book' post type and 'genre' taxonomy
			),

			/* Labels for text used (see Breadcrumb_Trail::default_labels). */
			'labels' => array(
				'browse'              => __( 'Browse:',                             'breadcrumb-trail' ),
				'home'                => __( 'Home',                                'breadcrumb-trail' ),
				'error_404'           => __( '404 Not Found',                       'breadcrumb-trail' ),
				'archives'            => __( 'Archives',                            'breadcrumb-trail' ),
				/* Translators: %s is the search query. The HTML entities are opening and closing curly quotes. */
				'search'              => __( 'Search results for &#8220;%s&#8221;', 'breadcrumb-trail' ),
				/* Translators: %s is the page number. */
				'paged'               => __( 'Page %s',                             'breadcrumb-trail' ),
				/* Translators: Minute archive title. %s is the minute time format. */
				'archive_minute'      => __( 'Minute %s',                           'breadcrumb-trail' ),
				/* Translators: Weekly archive title. %s is the week date format. */
				'archive_week'        => __( 'Week %s',                             'breadcrumb-trail' ),
	
				/* "%s" is replaced with the translated date/time format. */
				'archive_minute_hour' => '%s',
				'archive_hour'        => '%s',
				'archive_day'         => '%s',
				'archive_month'       => '%s',
				'archive_year'        => '%s',
			)
	);

### Hooks ###

* `breadcrumb_trail_args` - Filter hook on the array of arguments passed in.
* `breadcrumb_trail_items` - Filter hook on the array of items before being output.
* `breadcrumb_trail_get_bbpress_items` - Filter hook on the array of items when using bbPress.
* `breadcrumb_trail` - Filter hook on the HTML output of the breadcrumb trail.

### Extending `Breadcrumb_Trail` ###

You can extend the `Breadcrumb_Trail` class with a custom class if needed.  See the `bbPress_Breadcrumb_Trail` class as an example.

#### Available properties ####

* `$items` - Array of trail items.
* `$args` - The parsed arguments passed in.

#### Available methods #####

* `trail()` - Outputs/returns the final HTML.
* `do_trail_items()` - Method for filling the `$items` array.

Others are available, but those are the two you would actually put into real-world use.

## Changelog ##

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

## Support ##

I run a WordPress community called [Theme Hybrid](http://themehybrid.com), which is where I fully support all of my WordPress plugins, themes, and other projects.  You can sign up for an account to get plugin support for a small yearly fee.

I know.  I know.  You might not want to pay for support, but just consider it a donation to the project.  To continue making cool, GPL-licensed plugins/themes and having the time to support them, I must pay the bills.

## Copyright and License ##

Breadcrumb Trail is licensed under the [GNU GPL](http://www.gnu.org/licenses/old-licenses/gpl-2.0.html), version 2 or later.

2008&thinsp;&ndash;&thinsp;2013 &copy; [Justin Tadlock](http://justintadlock.com).