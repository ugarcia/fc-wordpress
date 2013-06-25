<?php
/*
 * Functions file
 * Includes all necesary files
 * PLEASE DO NOT EDIT THIS FILE IN ANY WAY
 *
 * @package mantra
 */

// Variable for theme version
define ("MANTRA_VERSION","2.0.4.1");

require_once(dirname(__FILE__) . "/admin/main.php"); // Load necessary admin files

//Loading include fiels
require_once(dirname(__FILE__) . "/includes/theme-setup.php"); //Setup and init theme
require_once(dirname(__FILE__) . "/includes/theme-styles.php"); //Register and enqeue css styles and scripts
require_once(dirname(__FILE__) . "/includes/theme-loop.php"); //Loop related fiels
require_once(dirname(__FILE__) . "/includes/theme-seo.php"); //SEO related fiels
require_once(dirname(__FILE__) . "/includes/theme-frontpage.php"); //Frontpage generation
require_once(dirname(__FILE__) . "/includes/theme-comments.php"); //Theme comment functions
require_once(dirname(__FILE__) . "/includes/theme-shortcodes.php"); //Theme shortcodes
require_once(dirname(__FILE__) . "/includes/theme-functions.php"); //Theme misc functions
require_once(dirname(__FILE__) . "/includes/theme-hooks.php"); //Theme hooks

?>