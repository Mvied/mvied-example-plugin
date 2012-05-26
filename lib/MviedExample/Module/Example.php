<?php
/**
 * Example Module
 * 
 * @author Mike Ems
 * @package MviedExample
 *
 */

require_once('Mvied/Module.php');
require_once('Mvied/Module/Interface.php');

class MviedExample_Module_Example extends Mvied_Module implements Mvied_Module_Interface {

	/**
	 * Initialize Module
	 *
	 * @param none
	 * @return void
	 */
	public function init() {
		// Regular plugin code here
	}

}