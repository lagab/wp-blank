<?php
/**
 * Custom functions used with UNYSON Framework
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Helper functions and classes with static methods for usage in theme
 */
 
if ( ! function_exists( 'fw_list_pages' ) ):
	/**
	 * get an array of all pages
	 */
	function fw_list_pages() {
		$pages = get_pages();
		$result = array();
		$result[0] = esc_html__('None', 'fw');
		foreach ( $pages as $page ) {
			$result[ $page->ID ] = $page->post_title;
		}
		return $result;
	}
endif;

if ( ! function_exists( 'fw_is_page_url_excluded' ) ) :
	/**
	 * Check if is page is from excluded pages
	 */
	function fw_is_page_url_excluded() {
		$exception_urls = array( 'wp-login.php', 'async-upload.php', '/plugins/', 'wp-admin/', 'upgrade.php', 'trackback/', 'feed/' );
		foreach ( $exception_urls as $url ){
			if ( strstr( $_SERVER['PHP_SELF'], $url) ) return true;
		}

		if ( strstr($_SERVER['QUERY_STRING'], 'feed=') ) return true;

		return false;
	}
endif;

if ( ! function_exists( '_fw_action_coming_soon_page' ) ) :
	/**
	 * Coming soon page
	 */
	function _fw_action_coming_soon_page() {
		global $coming_soon;
		$coming_soon = false;
		$enable_coming_soon = function_exists( 'fw_get_db_settings_option' ) ? fw_get_db_settings_option('enable_coming_soon') : array();
		if( isset($enable_coming_soon['selected']) && $enable_coming_soon['selected'] == 'yes' ){
			// if is enabled coming soon
			if( !is_user_logged_in() && $enable_coming_soon['yes']['coming_soon_page'] != '0' ){
				// if user is not logged in and coming soon page is selected
				if( fw_is_page_url_excluded() ){
					return;
				}
				$coming_soon = true;
				global $wp_query;
				$wp_query = new \WP_Query();
				$wp_query->query( 'page_id=' . $enable_coming_soon['yes']['coming_soon_page'] );
				$wp_query->the_post();
				rewind_posts();
				nocache_headers();
				header("HTTP/1.0 503 Service Unavailable");
				ob_start();
				include_once get_template_directory() . '/page-templates/blank.php';
				exit();
			}
		}
	}
endif;
add_action( 'send_headers', __NAMESPACE__ . '\\_fw_action_coming_soon_page', 12 );