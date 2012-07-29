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

function mvied_example_autoloader($class) {
	$filename = str_replace('_', DIRECTORY_SEPARATOR, $class) . '.php';
	@include dirname(__FILE__) . DIRECTORY_SEPARATOR . 'lib' . DIRECTORY_SEPARATOR . $filename;
}
spl_autoload_register('mvied_example_autoloader');

if ( function_exists('get_bloginfo') && ! defined('WP_UNINSTALL_PLUGIN') ) {
	$mvied_example = new MviedExample;
	$mvied_example->setSlug('mvied-example');
	$mvied_example->setVersion('1.0.0');
	$mvied_example->setPluginUrl(plugins_url('', __FILE__));
	$mvied_example->setDirectory(dirname(__FILE__));
	$mvied_example->setModuleDirectory(dirname(__FILE__) . '/lib/MviedExample/Module/');

	// Load Modules
	$mvied_example->loadModules();

	// Initialize Plugin
	$mvied_example->init();

	// Register activation hook. Must be called outside of a class.
	register_activation_hook(__FILE__, array($mvied_example, 'install'));
}