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

## Support ##

I run a WordPress community called [Theme Hybrid](http://themehybrid.com), which is where I fully support all of my WordPress plugins, themes, and other projects.  You can sign up for an account to get plugin support for a small yearly fee.

I know.  I know.  You might not want to pay for support, but just consider it a donation to the project.  To continue making cool, GPL-licensed plugins/themes and having the time to support them, I must pay the bills.

## Copyright and License ##

Breadcrumb Trail is licensed under the [GNU GPL](http://www.gnu.org/licenses/old-licenses/gpl-2.0.html), version 2 or later.

2008&thinsp;&ndash;&thinsp;2013 &copy; [Justin Tadlock](http://justintadlock.com).