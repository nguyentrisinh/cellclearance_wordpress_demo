<?php
/**
 * Download Plugins and Themes from Dashboard - Core Class
 *
 * @version 1.3.0
 * @since   1.2.0
 * @author  Algoritmika Ltd.
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if ( ! class_exists( 'Alg_Download_Plugins_Core' ) ) :

class Alg_Download_Plugins_Core {

	/**
	 * Constructor.
	 *
	 * @version 1.2.0
	 * @since   1.2.0
	 */
	function __construct() {
		add_action( 'admin_init', array( $this, 'download_plugin' ) );
		add_action( 'admin_init', array( $this, 'download_theme' ) );
	}

	/**
	 * download_theme.
	 *
	 * @version 1.2.0
	 * @since   1.1.0
	 * @todo    extra validation
	 * @todo    check if `$_theme` is object?
	 */
	function download_theme() {
		// Validate
		if ( is_user_logged_in() && current_user_can( 'switch_themes' ) && isset( $_GET['alg_download_theme'] ) ) {
			if ( '' != ( $theme_name = sanitize_text_field( $_GET['alg_download_theme'] ) ) ) {
				// Validated successfully
				$theme_root = get_theme_root();
				if ( 'yes' === get_option( 'alg_download_plugins_dashboard_themes_append_version', 'no' ) ) {
					$_theme  = wp_get_theme( $theme_name, $theme_root );
					$version = $_theme->get( 'Version' );
				} else {
					$version = '';
				}
				$add_main_dir = ( 'yes' === get_option( 'alg_download_plugins_dashboard_themes_add_main_dir', 'yes' ) );
				$this->download_plugin_or_theme( $theme_root, $theme_name, $version, $add_main_dir );
			}
		}
	}

	/**
	 * download_plugin.
	 *
	 * @version 1.2.0
	 * @since   1.0.0
	 */
	function download_plugin() {
		// Validate
		if ( is_user_logged_in() && current_user_can( 'activate_plugins' ) && isset( $_GET['alg_download_plugin'] ) ) {
			if ( '' != ( $plugin_name = sanitize_text_field( $_GET['alg_download_plugin'] ) ) ) {
				if ( ! function_exists( 'get_plugins' ) ) {
					require_once ABSPATH . 'wp-admin/includes/plugin.php';
				}
				$all_plugins = get_plugins();
				foreach ( $all_plugins as $plugin_file => $plugin_data ) {
					$plugin_file = explode( '/', $plugin_file );
					if ( isset( $plugin_file[0] ) && $plugin_name === $plugin_file[0] ) {
						// Validated successfully
						$version      = ( 'yes' === get_option( 'alg_download_plugins_dashboard_plugins_append_version', 'no' ) ) ? $plugin_data['Version'] : '';
						$add_main_dir = ( 'yes' === get_option( 'alg_download_plugins_dashboard_plugins_add_main_dir', 'yes' ) );
						$this->download_plugin_or_theme( WP_PLUGIN_DIR, $plugin_name, $version, $add_main_dir );
						break;
					}
				}
			}
		}
	}

	/**
	 * download_plugin_or_theme.
	 *
	 * @version 1.3.0
	 * @since   1.1.0
	 */
	function download_plugin_or_theme( $plugin_or_theme_dir, $plugin_or_theme_name, $version, $add_main_dir ) {
		$zip_file_name        = $plugin_or_theme_name . ( '' != $version ? '.' : '' ) . $version . '.zip';
		$zip_file_path        = sys_get_temp_dir() . '/' . $zip_file_name;
		$plugin_or_theme_path = $plugin_or_theme_dir . '/' . $plugin_or_theme_name;
		$exclude_path         = ( $add_main_dir ? $plugin_or_theme_dir : $plugin_or_theme_path );
		$args                 = array( 'zip_file_path' => $zip_file_path, 'exclude_path' => $exclude_path );
		$files                = $this->get_files( $plugin_or_theme_path );
		if ( $this->create_zip( $args, $files ) ) {
			$this->send_file( $zip_file_name, $zip_file_path );
		} else {
			return false;
		}
	}

	/**
	 * get_files.
	 *
	 * @version 1.3.0
	 * @since   1.3.0
	 */
	function get_files( $plugin_or_theme_path ) {
		$files       = new RecursiveIteratorIterator( new RecursiveDirectoryIterator( $plugin_or_theme_path ), RecursiveIteratorIterator::LEAVES_ONLY );
		$files_paths = array();
		foreach ( $files as $name => $file ) {
			if ( ! $file->isDir() ) {
				$file_path = str_replace( '\\', '/', $file->getRealPath() );
				$files_paths[] = $file_path;
			}
		}
		return $files_paths;
	}

	/**
	 * create_zip.
	 *
	 * @version 1.3.0
	 * @since   1.3.0
	 * @todo    (maybe) add option to manually select first/main `$zip_library`
	 * @todo    (maybe) add fully autonomous PHP Zip library (e.g. https://github.com/alexcorvi/php-zip)
	 */
	function create_zip( $args, $files ) {
		$zip_library = ( class_exists( 'ZipArchive' ) ? 'ziparchive' : 'pclzip' );
		switch ( $zip_library ) {
			case 'pclzip':
				return $this->create_zip_pclzip( $args, $files );
			default: // 'ziparchive':
				return $this->create_zip_ziparchive( $args, $files );
		}
	}

	/**
	 * create_zip_ziparchive.
	 *
	 * @version 1.3.0
	 * @since   1.3.0
	 */
	function create_zip_ziparchive( $args, $files ) {
		$zip = new ZipArchive();
		if ( true !== $zip->open( $args['zip_file_path'], ZipArchive::CREATE | ZipArchive::OVERWRITE ) ) {
			return false;
		}
		$exclude_from_relative_path = strlen( $args['exclude_path'] ) + 1;
		foreach ( $files as $file_path ) {
			$zip->addFile( $file_path, substr( $file_path, $exclude_from_relative_path ) );
		}
		$zip->close();
		return true;
	}

	/**
	 * create_zip_pclzip.
	 *
	 * @version 1.3.0
	 * @since   1.3.0
	 * @see     http://www.phpconcept.net/pclzip
	 */
	function create_zip_pclzip( $args, $files ) {
		require_once( ABSPATH . 'wp-admin/includes/class-pclzip.php' );
		$zip = new PclZip( $args['zip_file_path'] );
		$zip->create( $files, PCLZIP_OPT_REMOVE_PATH, $args['exclude_path'] );
		return true;
	}

	/**
	 * send_file.
	 *
	 * @version 1.3.0
	 * @since   1.3.0
	 */
	function send_file( $zip_file_name, $zip_file_path ) {
		header( 'Content-Type: application/octet-stream' );
		header( 'Content-Disposition: attachment; filename=' . urlencode( $zip_file_name ) );
		header( 'Content-Type: application/octet-stream' );
		header( 'Content-Type: application/download' );
		header( 'Content-Description: File Transfer' );
		header( 'Content-Length: ' . filesize( $zip_file_path ) );
		flush();
		if ( false !== ( $fp = fopen( $zip_file_path, 'r' ) ) ) {
			while ( ! feof( $fp ) ) {
				echo fread( $fp, 65536 );
				flush();
			}
			fclose( $fp );
			unlink( $zip_file_path );
			die();
		} else {
			die( __( 'Unexpected error', 'download-plugins-dashboard' ) );
		}
	}

}

endif;

return new Alg_Download_Plugins_Core();
