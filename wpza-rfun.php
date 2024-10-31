<?php
/*
Plugin Name: Random File Upload Names
Plugin URI: https://wpza.net/encrypting-file-upload-names-in-wordpress-automatically/
Description: WPZA Random File Upload Names provides your website randomised file names when you upload files into WordPress.
Version: 1.0.0
Author: WPZA
Author URI: https://www.wpza.net/
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/
defined( 'ABSPATH' ) or die();

if( ! class_exists( 'wpza_rfun' ) ) {
	final class wpza_rfun {
		public function __construct() {
			$this->wpza_rfun__define_constants();
			$this->wpza_rfun__includes();
		}

		private function wpza_rfun__define_constants() {
			define( 'wpza_rfun__directory', __DIR__ );
			define( 'wpza_rfun__full_name', 'Random File Upload Names' );
		}

		private function wpza_rfun__includes() {
			$dir = scandir( wpza_rfun__directory . '/includes' );
			if( $dir ) {
				foreach( $dir as $module ) {
					$path = wpza_rfun__directory . '/includes';
					if( $path && substr( $module, 0, 1 ) !== '.' ) {
						$file = '/' . $module;
						if( is_readable( $path . $file ) ) {
							include_once( $path . $file );
						}
					}
				}
			}
		}
	}
}

new wpza_rfun();