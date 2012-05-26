<?php 
/**
 * Mvied Example
 *
 * @author Mike Ems
 * @package MviedExample
 *
 */

class MviedExample extends Mvied_Plugin {

	/**
	 * Plugin Settings
	 * 
	 * setting_name => default_value
	 *
	 * @var array
	 */
	protected $_settings = array(
		'example_setting' => 'default_value'
	);

	/**
	 * Initialize
	 *
	 * @param none
	 * @return void
	 */
	public function init() {
		// Any core plugin functionality goes here
		parent::init();
	}

	/**
	 * Install
	 * 
	 * @param none
	 * @return void
	 */
	public function install() {
		// Add settings to WordPress options
		foreach ( $this->getSettings() as $option => $value ) {
			if ( get_option($option) === false ) {
				add_option($option, $value);
			}
		}
		
		// Any logic that needs to be run when the plugin is activated goes here
	}

}