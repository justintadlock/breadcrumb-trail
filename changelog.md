# Change Log

## [1.0.0] - 2015-07-07

## [0.6.1]

* Make sure `breadcrumb_trail()` can return the HTML.
* Add `rel="home"` to the home page link. This got removed at some point.
* Do network and site home links in bbPress.
* Slight fix to stop bbPress from putting double "Forums" in the breadcrumb trail.
* The `show_on_front` argument should only work if the front page is not paginated.
* Better handling of the text strings, particularly when displaying date/time.
* Updated `breadcrumb-trail.pot` file for better translating.

## [0.6.0]

* [Schema.org](http://schema.org) support.
* Completely overhauled the entire plugin, rewriting large swathes of code from the ground up.  This version takes an object-oriented approach.
* Blew every other breadcrumb menu script out of the water.

## [0.5.3]

### Added

* Use `post_type_archive_title()` on post type archives in the trail.
* Add support for taxonomies that have a `$rewrite->slug` that matches a string value for a custom post type's `has_archive` argument.
* Added support for an `archive_title` label for custom post types because we can't use the  `post_type_archive_title()` function on single posts views for the post type.
* Loads of pagination support on both archive-type pages and paged single posts.
* Added support for hierarchical custom post types (get parent posts).
* Added the `network` argument to allow multisite owners to run the trail all the way back to the main site.

### Fixed

* Only check attachment trail if the attachment has a parent.
* Fixed the issue where the wrong post type archive link matches with a term archive page.

## [0.5.2]

* No friggin' clue. I think I actually skipped version numbers somehow. :)

## [0.5.1]

* Changed license from GPL 2-only to GPL 2+.
* Smarter handling of the `trail-begin` and `trail-end` classes.
* Added `container` argument for wrapping breadcrumbs in a custom HTML element.
* Changed `bbp_get_forum_parent()` to `bbp_get_forum_parent_id()`.

## [0.5.0]

* Use hardcoded strings for the textdomain, not a variable.
* Inline doc updates.
* Added bbPress support.
* Use `single_post_title()` instead of `get_the_title()` for post titles.

## [0.4.1]

* Use `get_queried_object()` and `get_queried_object_id()` instead of accessing `$wp_query` directly.
* Pass `$args` as second parameter in `breadcrumb_trail` hook.

## [0.4.0]

* New function: `breadcrumb_trail_get_items()`, which grabs a list of all the trail items.  This separates the items from the main `breadcrumb_trail()` function.
* New filter hook: `breadcrumb_trail_items`, which allows devs to filter just the items.
* New function: `breadcrumb_trail_map_rewrite_tags()`, which maps the permalink structure tags set under Permalink Settings in the admin to make for a much more accurate breadcrumb trail.
* New function: `breadcrumb_trail_textdomain()`, which can be filtered when integrating the plugin into a theme to match the theme's textdomain.
* Added functionality to handle WP 3.1 post type enhancements.

## [0.3.2]

* Smarter logic in certain areas.
* Removed localization for things that shouldn't be localized with time formats.
* `single_tax` set to `null` instead of `false`.
* Better escaping of element attributes.
* Use `$wp_query->get_queried_object()` and `$wp_query->get_queried_object_id()`.
* Add in initial support of WordPress 3.1's post type archives.
* Better formatting and organization of the output late in the function.
* Added `trail-before` and `trail-after` CSS classes if `$before` or `$after` is set.

## [0.3.1]

* Undefined index error fixes.
* Fixes for trying to get a property of a non-object.

## [0.3.0]

* Added more support for custom post types and taxonomies.
* Added more support for more complex hierarchies.
* The breadcrumb trail now recognizes more patterns with pages as part of the permalink structure of other objects.
* All post types can have any taxonomy as the leading part of the trail.
* Cleaned up the code.

## [0.2.1]

* Removed and/or added (depending on the case) the extra separator item on sub-categories and date-/time-based breadcrumbs.

## [0.2.0]

* The title of the "home" page (i.e. posts page) when not the front page is now properly recognized.
* Cleaned up the code and logic behind the plugin.

## [0.1.0]

* Launch of the new plugin.