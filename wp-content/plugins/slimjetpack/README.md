=== Slim version of Jetpack by WordPress.com ===

Contributors: automattic, apeatling, beaulebens, hugobaeta, Joen, mdawaffe, andy, designsimply, hew, westi, eoigal, tmoorewp, matt, pento, cfinke, daniloercoli, chellycat, gibrown, jblz, jshreve, barry, alternatekev, azaozz, ethitter, johnjamesjacoby, lancewillett, martinremy, nickmomrik, stephdau, yoavf, matveb
Tags: views, tweets, twitter, widget, gravatar, hovercards, profile, equations, latex, math, maths, youtube, shortcode, archives, audio, blip, bliptv, dailymotion, digg, flickr, googlevideo, google, googlemaps, kyte, kytetv, livevideo, redlasso, rockyou, rss, scribd, slide, slideshare, soundcloud, vimeo, shortlinks, wp.me, mosaic, gallery, slideshow
Requires at least: 3.3
Tested up to: 3.5
Stable tag: 2.2

Supercharge your WordPress site with powerful features even you're not WordPress.com users :)
I don't have a wordpress plugin publisher account yet so this plugin will be located here temporarily.
I believe the functions I touched won't cause security issues, but use at your own risk!

== Description ==

[Jetpack](http://jetpack.me/) is an awesome plugin bundle provided by the Automattic but it requires WordPress.com account
even for those modules previously work as independent plugins. The marketing banners are very obtrusive too.

I smashed the bundle to remove the annoying parts and keep the awesomeness. Slim Jetpack will track the updates of Jetpack modules,
but is definitely INCOMPATIBLE with its original version because a lot of API functions had been mocked or removed.

All credit goes to original developers!   But please report the slim-version bugs at https://github.com/HowardMei/slimjetpack/issues

If you need the wordpress.com stats, subscription and push notification services etc., please deactivate Slim Jetpack
and use the original Jetpack instead.

==Modules Included==
Carousel
Sharing
Spelling and Grammar
Gravatar Hovercards
Contact Form
Tiled Galleries
Shortcode Embeds
Custom CSS
Mobile Theme
Beautiful Math
Extra Sidebar Widgets
Infinite Scroll

==Modules Removed==
WordPress.com Stats
Publicize
WP.me shortlinks
Notifications
Jetpack Comments
Subscriptions
Post by Email
VaultPress
Photon
JSON API
Mobile Push Notifications
Enhanced Distribution
Holiday Snow (You may put it back if you like.)

== Installation ==

1. Install Slim Jetpack either via the WordPress.org plugin directory (temporarily unavailable), or by uploading the files to your server
2. Go to Settings-->Slim Jetpack and activate the modules you need. Configure them if the 'configure' buttons appear.
   Click 'toggle' to show the 'deactivate' button and the infinite-scroll module is only for twenty-xxx series themes,
   you may extend it to support your own themes.
3. That's it.  You're ready to go!

== Frequently Asked Questions ==
How many files are touched? Use a comparing tool to find out. But as I remember, the list is:
Modified: jetpack.php(->slimjetpack.php), modules/module-info.php and _inc/jetpack.js
Removed: files and folders of all removed modules
Not all abandoned blocks are removed from jetpack.php which may cause problems but if it works,
just ignore them :-)
If you don't like certain modules, just delete them :-)
If you need a new module from Jetpack future releases, copy the files into Slim Jetpack and try.
It should work without problem :)

== Weight-loss Diary ==
= 2.2.2 =
* Added Jetpack check before activation
* Removed wp.me shortlinks module

== Original changelog ==
= 2.2.2 =
* Enhancement: Mobile Theme: Add controls for custom CSS.
* Enhancement: Sharing: Add Pocket to the available services.
* Bug Fix: Custom CSS: Update the method for generating content width setting.
* Bug Fix: JSON API: Security updates.
* Bug Fix: Likes: Add settings for email notifications and misc style updates.
* Bug Fix: Notifications: Add the post types to sync after init.
* Bug Fix: Publicize: RTL styling.
* Bug Fix: Shortcodes: security fixes and function prefixing.
* Bug Fix: Widgets: Update wording on the Top Posts widget for clarity.
* Bug Fix: Jetpack Post Images security fixes.
