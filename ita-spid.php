<?php
/**
 * @package ITA SPID
 * @author WordPress Italian Community
 * @version 1.0 first release
 */
/*
Plugin Name: ITA SPID
Plugin URI: https://github.com/Community-italiana-WordPress/ita-spid
Description: TBD
Author: wolly TBD
Version: 1.0
Author URI: https://it.wordpress.org
Text Domain: ita-spid
Domain Path: /languages
*/
/*
	Copyright 2013  Paolo Valenti aka Wolly  (email : wolly66@gmail.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/
define ( 'ITASPID_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
define ( 'ITASPID_PLUGIN_DIR', plugin_dir_url( __FILE__ ) );
define ( 'ITASPID_PLUGIN_SLUG', basename( dirname( __FILE__ ) ) );
define ( 'ITASPID_PLUGIN_VERSION', '1.0' );
define ( 'ITASPID_PLUGIN_VERSION_NAME', 'ita_speed_version' );


/**
 * Ita_Speed class.
 */
class Ita_Speed {

	/**
	 * __construct function.
	 *
	 * @access public
	 * @return void
	 */
	public function __construct() {

		//check for plugin update
		add_action( 'init', array( $this, 'update_check' ) );
		add_action( 'plugins_loaded', array( $this, 'init' ) );

	}

	/**
	 * update_check function.
	 *
	 * @access public
	 * @return void
	 */
	public function update_check() {
		// Do checks only in backend
		if ( is_admin() ) {

			if ( version_compare( get_site_option( ITASPID_PLUGIN_VERSION_NAME ), ITASPID_PLUGIN_VERSION ) != 0  ) {

				$this->do_update();

	   		}

		} //end if only in the admin
	}

	/**
	 * do_update function.
	 *
	 * @access public
	 *
	 */
	public function do_update(){

	   update_option( ITASPID_PLUGIN_VERSION_NAME , ITASPID_PLUGIN_VERSION );

	}


	/**
	 * init function.
	 *
	 * Do stuff on plugins loaded
	 * @access private
	 * @return void
	 */
	private function init(){
		//do stuff on plugins loaded

	}


}// chiudo la classe

//instantiate class
$ita_spid = new Ita_Spid();