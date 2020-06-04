=== Municipal Boundaries ===
Contributors: yiannisdesp4
Tags: cyprus,municipalities,map,boundaries,googlemap
Requires at least: 4.7
Tested up to: 5.4
Stable tag: 5.4
Requires PHP: 5.4
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Renders current Cyprus Municipal Boundaries on a Google Map. Dataset is based on an optimised set of KML data from OpenDataCy and all related data are provided AS-IS.

== Description ==

*Municipal Boundaries* is a simple plugin that can render current Cyprus Municipal Boundaries on a Google Map. The Dataset is provided as-is and is based on an optimised set of KML data from [OpenDataCy](https://www.data.gov.cy/dataset/διοικητικά-όρια-ενοριών-διοικητικός-χάρτης).  
 
Languages supported: Greek, English  
  
Plugin requires a Google Maps Api key. In case Google Maps Api is already loaded into your theme or from another plugin, do not provide the Api key in Plugin Settings.  
  
Once plugin is configured, you may place "[municipal-boundaries-map]" shortcode in your editor or file.

== Frequently Asked Questions ==

= How does it work? =

By placing the shortcode `[municipal-boundaries-map]` in your content editor or in your templates by using `<?= do_shortcode('[municipal-boundaries-map]') ?>`.

= How can I customize design? =

You can overwrite the CSS rules for .mmap-wrap, .map-container & .map-legend classes.

= Is the basic UI provided responsive? =

Yes.

== Screenshots ==

1. Basic demo UI.

== Changelog ==

= 1.0 =
* Initial release.