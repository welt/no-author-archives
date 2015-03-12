<?php
/*
Plugin Name: RW No author archives
Plugin URI:
Description: Requests for author archives get sent to 404.
Version: 1.0
Author: welt
Author URI: github.com/welt
License:
*/

// Restrictions
defined('ABSPATH') or die("&iexcl;Vous ne pouvez pas accéder directement à ce truc l&agrave;!");

if ( ! class_exists( 'rw_no_author_archives' ) ) :

	class rw_no_author_archives {
		function __construct() {
			add_action( 'plugins_loaded', array( $this, 'author_to_404' ) );
		}
		function author_to_404 () {
			if ( preg_match( '#/\?author=[0-9]+$#', filter_var(urldecode($_SERVER['REQUEST_URI']), FILTER_SANITIZE_URL) ) ) {
				status_header( 404 );
				die( '404 &#8212; File not found.' );
			}
		}
	}
	new rw_no_author_archives;

endif;

?>
