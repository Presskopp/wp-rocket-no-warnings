<?php

/**
 * Plugin Name: WP Rocket | No Warnings
 * Description: Stops WP Rocket from showing warnings if advanced-cache.php and / or .htaccess aren't writable.
 * Plugin URI:  https://github.com/Presskopp/wp-rocket-no-warnings
 * Author:      WP Rocket Support Team
 * Author URI:  http://wp-rocket.me/
 * License:     GNU General Public License v2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 */

/** 
 * @author 		Christian Herrmann
 */

namespace WP_Rocket\Helpers\cache\no_warnings;

/* no direct call */
defined( 'ABSPATH' ) or die('You are about to be shot to the moon!');


function rocket_no_warnings() {

	/* Avoid warning about AdvancedCache.php not being writable by not (re)creating the file at all */
	add_filter( 'rocket_generate_advanced_cache_file', '__return_false' );
	
	/* Avoid warning about .htaccess not being writable */	
	remove_action( 'admin_notices', 'rocket_warning_htaccess_permissions' );
	
};

add_action( 'init', __NAMESPACE__ . '\rocket_no_warnings' );
	

