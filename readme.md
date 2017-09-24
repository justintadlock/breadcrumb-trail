# Breadcrumb Trail

A powerful script for adding breadcrumbs to your site that supports Schema.org, HTML5-valid microdata.

Breadcrumb Trail is one of the most advanced and robust breadcrumb menu systems available for WordPress.  It started out as a small script for basic blogs but has grown into a system that can handle nearly any site's setup to show the most accurate breadcrumbs for each page.

## Usage

This script won't work automatically because there's no way for me to know where it should show within your theme.  You'll have to add it manually in your template files.  You can add it pretty much anywhere you want, but I usually recommend near the bottom of your theme's `header.php` template.

The basic code you need is:

```
<?php breadcrumb_trail(); ?>
```

Actually, you should always wrap it in a `functions_exists()` check too like so:

```
<?php if ( function_exists( 'breadcrumb_trail' ) ) breadcrumb_trail(); ?>
```

That's all you need to do to add breadcrumbs to your site.  Of course, you can customize that a bit.

### Parameters

The `breadcrumb_trail()` function accepts a single parameter of `$args`, which is an array of arguments for deciding how your breadcrumbs should behave.  The default arguments are the following.

```
$defaults = array(
	'container'       => 'nav',
	'before'          => '',
	'after'           => '',
	'browse_tag'      => 'h2',
	'list_tag'        => 'ul',
	'item_tag'        => 'li',
	'show_on_front'   => true,
	'network'         => false,
	'show_title'      => true,
	'show_browse'     => true,
	'labels' => array(
		'browse'              => esc_html__( 'Browse:',                               'breadcrumb-trail' ),
		'aria_label'          => esc_attr_x( 'Breadcrumbs', 'breadcrumbs aria label', 'breadcrumb-trail' ),
		'home'                => esc_html__( 'Home',                                  'breadcrumb-trail' ),
		'error_404'           => esc_html__( '404 Not Found',                         'breadcrumb-trail' ),
		'archives'            => esc_html__( 'Archives',                              'breadcrumb-trail' ),
		// Translators: %s is the search query.
		'search'              => esc_html__( 'Search results for: %s',                'breadcrumb-trail' ),
		// Translators: %s is the page number.
		'paged'               => esc_html__( 'Page %s',                               'breadcrumb-trail' ),
		// Translators: %s is the page number.
		'paged_comments'      => esc_html__( 'Comment Page %s',                       'breadcrumb-trail' ),
		// Translators: Minute archive title. %s is the minute time format.
		'archive_minute'      => esc_html__( 'Minute %s',                             'breadcrumb-trail' ),
		// Translators: Weekly archive title. %s is the week date format.
		'archive_week'        => esc_html__( 'Week %s',                               'breadcrumb-trail' ),

		// "%s" is replaced with the translated date/time format.
		'archive_minute_hour' => '%s',
		'archive_hour'        => '%s',
		'archive_day'         => '%s',
		'archive_month'       => '%s',
		'archive_year'        => '%s',
	),
	'post_taxonomy' => array(
		// 'post'  => 'post_tag', // 'post' post type and 'post_tag' taxonomy
		// 'book'  => 'genre',    // 'book' post type and 'genre' taxonomy
	),
	'echo'            => true
);
```

### Hooks

* `breadcrumb_trail_object` - Filter the `Breadcrumb_Trail` object used for the trail.
* `breadcrumb_trail_args` - Filter hook on the array of arguments passed in.
* `breadcrumb_trail_labels` - Filter hook on the text labels.
* `breadcrumb_trail_post_taxonomy` - Filter hook on the taxonomy to use with specific post types.
* `breadcrumb_trail_items` - Filter hook on the array of items before being output.
* `breadcrumb_trail` - Filter hook on the HTML output of the breadcrumb trail.
* `breadcrumb_trail_inline_style` - Filter hook on the CSS output in the document head.

### Extending `Breadcrumb_Trail`

You can extend the `Breadcrumb_Trail` class with a custom class if needed.  When creating a sub-class, you'll need to filter `breadcrumb_trail_object` to tell the plugin to use your class.  Always return an object on this filter.

#### Available properties

* `$items` - Array of trail items.
* `$args` - The parsed arguments passed in.
* `$labels` - The parsed text labels.
* `$post_taxonomy` - The parsed post taxonomy array.

#### Available methods

* `trail()` - Outputs/returns the final HTML.
* `add_items()` - Method for filling the `$items` array.

Others are available, but those are the two you would actually put into real-world use.

## Support

I run a WordPress community called [Theme Hybrid](https://themehybrid.com), which is where I fully support all of my WordPress plugins, themes, and other projects.  You can sign up for an account to get plugin support for a small yearly fee.

I know.  I know.  You might not want to pay for support, but just consider it a donation to the project.  To continue making cool, GPL-licensed plugins/themes and having the time to support them, I must pay the bills.

## Copyright and License

Breadcrumb Trail is licensed under the [GNU GPL](http://www.gnu.org/licenses/old-licenses/gpl-2.0.html), version 2 or later.

2008&thinsp;&ndash;&thinsp;2017 &copy; [Justin Tadlock](http://justintadlock.com).
