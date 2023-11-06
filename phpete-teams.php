<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://phpete.com
 * @since             0.1
 * @package           Phpete_Teams
 *
 * @wordpress-plugin
 * Plugin Name:       phpete - teams
 * Plugin URI:        https://phpete.com
 * Description:       a simple plugin that lets you add showcase your wonderful colleagues / team members on wordpress
 * Version:           0.3
 * Author:            phpete
 * Author URI:        https://phpete.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       phpete-teams
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 0.1 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'PHPETE_TEAMS_VERSION', '0.3' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-phpete-teams-activator.php
 */
function activate_phpete_teams() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-phpete-teams-activator.php';
	Phpete_Teams_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-phpete-teams-deactivator.php
 */
function deactivate_phpete_teams() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-phpete-teams-deactivator.php';
	Phpete_Teams_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_phpete_teams' );
register_deactivation_hook( __FILE__, 'deactivate_phpete_teams' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-phpete-teams.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    0.1
 */
function run_phpete_teams() {

	$plugin = new Phpete_Teams();
	$plugin->run();

}
run_phpete_teams();
