=== Breadcrumb Trail ===
Contributors: greenshady
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=3687060
Tags: navigation, menu
Requires at least: 2.5
Tested up to: 2.7.1
Stable tag: 0.1

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

I mostly develop WordPress themes.  Many of my users had a real need for a functional breadcrumb menu without having to find and test a lot of other plugins.  So, I've been developing this script for nearly two years for my theme users.

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

Ealier versions were not documented well.

**Version 0.1**

* Launch of the new plugin.