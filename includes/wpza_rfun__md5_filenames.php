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

/* Change File Upload Names */
if( ! function_exists( 'wpza_rfun__rename_uploaded_filename' ) ) {
	function wpza_rfun__rename_uploaded_filename( $filename ) {
		$ext = empty( pathinfo( $filename )['extension'] ) ? '' : '.' . pathinfo( $filename )['extension'];
		return substr( md5( $filename ), 0, 8 ) . $ext;
	}
	add_filter( 'sanitize_file_name', 'wpza_rfun__rename_uploaded_filename', 10 );
}