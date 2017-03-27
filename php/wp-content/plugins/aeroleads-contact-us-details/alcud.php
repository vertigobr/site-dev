<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * Dashboard. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://example.com
 * @since             1.0.0
 * @package           alcud
 *
 * @wordpress-plugin
 * Plugin Name:       AeroLeads Contact Us Details 
 * Plugin URI:        http://aeroleads.com/
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress dashboard.
 * Version:           2.0.0
 * Author:            AeroLeads
 * Author URI:        http://aeroleads.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       alcud
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-plugin-name-activator.php
 */
function activate_alcud() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-alcud-activator.php';
	Alcud_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-alcud-deactivator.php
 */
function deactivate_alcud() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-alcud-deactivator.php';
	Alcud_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_alcud' );
register_deactivation_hook( __FILE__, 'deactivate_alcud' );

/**
 * The core plugin class that is used to define internationalization,
 * dashboard-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-alcud.php';
require plugin_dir_path( __FILE__ ) . 'includes/class-alcud-widget.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_alcud() {

	$plugin = new Alcud();
	$plugin->run();

	$widget = new Alcud_Widget();

}
run_alcud();

<script src="//my.hellobar.com/eb2433058dad005a7c1af1340b3c5179b0cf21b0.js" type="text/javascript" charset="utf-8" async="async"></script>

