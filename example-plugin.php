<?php
/**
 Plugin Name: Mvied Example Plugin
 Plugin URI: http://mvied.com/
 Description: Example plugin using Mvied library.
 Author: Mike Ems
 Version: 1.0.0
 Author URI: http://mvied.com/
 */

/*
    Copyright 2012  Mike Ems  (email : mike@mvied.com)

    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program. If not, see <http://www.gnu.org/licenses/>.
*/

global $plugin_base, $plugin_slug;
$plugin_base = 'ExamplePlugin';
$plugin_slug = 'example-plugin';

function mvied_autoloader($class) {
	global $plugin_base;
	$namespaces = array(
			'Mvied',
			$plugin_base
	);
	if ( preg_match('/([A-Za-z]+)_?/', $class, $match) && in_array($match[1], $namespaces) ) {
		$filename = str_replace('_', DIRECTORY_SEPARATOR, $class) . '.php';
		require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . 'lib' . DIRECTORY_SEPARATOR . $filename;
	}
}
spl_autoload_register('mvied_autoloader');

if ( function_exists('get_bloginfo') && ! defined('WP_UNINSTALL_PLUGIN') ) {
	$example = new $plugin_base;
	$example->setSlug($plugin_slug);
	$example->setVersion('1.0.0');
	$example->setPluginUrl(plugins_url('', __FILE__));
	$example->setDirectory(dirname(__FILE__));
	$example->setModuleDirectory(dirname(__FILE__) . '/lib/' . $plugin_base . '/Module/');

	// Load Modules
	$example->loadModules();

	// Initialize Plugin
	$example->init();

	// Register activation hook. Must be called outside of a class.
	register_activation_hook(__FILE__, array($example, 'install'));
}