<?php
/**
 * Theme basic setup.
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

// Set the content width based on the theme's design and stylesheet.
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

add_action( 'after_setup_theme', 'understrap_setup' );

if ( ! function_exists ( 'understrap_setup' ) ) {
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function understrap_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on understrap, use a find and replace
		 * to change 'understrap' to the name of your theme in all the template files
		 */
		load_theme_textdomain( 'understrap', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary' => __( 'Primary Menu', 'understrap' ),
			'secondary' => __( 'Secondary Navigation', 'understrap' ),
			'footer' => __( 'Footer Navigation', 'understrap' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		/*
		 * Adding Thumbnail basic support
		 */
		add_theme_support( 'post-thumbnails' );

		/*
		 * Adding support for Widget edit icons in customizer
		 */
		add_theme_support( 'customize-selective-refresh-widgets' );

		/*
		 * Enable support for Post Formats.
		 * See http://codex.wordpress.org/Post_Formats
		 */
		add_theme_support( 'post-formats', array(
			'aside',
			'image',
			'video',
			'quote',
			'link',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'understrap_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Set up the WordPress Theme logo feature.
		add_theme_support( 'custom-logo' );

		// Check and setup theme default settings.
		understrap_setup_theme_default_settings();
		
		//disable allow edit file
		define('DISALLOW_FILE_EDIT',true);
	  
		//Remove WP generator
		remove_action('wp_head', 'wp_generator');
		
		// duppor Format large
		add_theme_support( 'align-wide');
		
		//Color custom palette
		/*
		add_theme_support( 'editor-color-palette',
			array(
				array( 'name' => 'blue', 'slug'  => 'blue', 'color' => '#48ADD8' ),
				array( 'name' => 'pink', 'slug'  => 'pink', 'color' => '#FF2952' ),
				array( 'name' => 'green', 'slug'  => 'green', 'color' => '#83BD71' ),
				array( 'name' => 'yellow', 'slug'  => 'yellow', 'color' => '#FFC334' ),
				array( 'name' => 'red', 'slug'  => 'red', 'color' => '#B54D4D' ),
				array( 'name' => 'grey', 'slug'  => 'grey', 'color' => '#f8f8f8' ),
				array( 'name' => 'ui', 'slug'  => 'ui', 'color' => '#232634' ),
				array( 'name' => 'ui-dark', 'slug'  => 'ui-dark', 'color' => '#2F3344' ),
				array( 'name' => 'ui-light', 'slug'  => 'ui-light', 'color' => '#575D74' ),
			)
		);
		*/
		
		// Security
		
		/*Disable ping back scanner and complete xmlrpc class. */
		add_filter( 'wp_xmlrpc_server_class', '__return_false' );
		add_filter('xmlrpc_enabled', '__return_false');
		
		//show_admin_bar( false );
	

	}
}


add_filter( 'excerpt_more', 'understrap_custom_excerpt_more' );

if ( ! function_exists( 'understrap_custom_excerpt_more' ) ) {
	/**
	 * Removes the ... from the excerpt read more link
	 *
	 * @param string $more The excerpt.
	 *
	 * @return string
	 */
	function understrap_custom_excerpt_more( $more ) {
		if ( ! is_admin() ) {
			$more = '';
		}
		return $more;
	}
}

add_filter( 'wp_trim_excerpt', 'understrap_all_excerpts_get_more_link' );

if ( ! function_exists( 'understrap_all_excerpts_get_more_link' ) ) {
	/**
	 * Adds a custom read more link to all excerpts, manually or automatically generated
	 *
	 * @param string $post_excerpt Posts's excerpt.
	 *
	 * @return string
	 */
	function understrap_all_excerpts_get_more_link( $post_excerpt ) {
		if ( ! is_admin() ) {
			$post_excerpt = $post_excerpt . ' [...]<p><a class="btn btn-secondary understrap-read-more-link" href="' . esc_url( get_permalink( get_the_ID() ) ) . '">' . __( 'Read More...',
			'understrap' ) . '</a></p>';
		}
		return $post_excerpt;
	}
}

//Modify wordoress error
if ( ! function_exists( 'no_wordpress_errors' ) ) {
	function no_wordpress_errors(){
	  return __( 'Something is wrong','understrap' ).'!';
	}
}
//add_filter( 'login_errors', 'no_wordpress_errors' );

// Change footer text
if ( ! function_exists( 'remove_footer_admin' ) ) {
	function remove_footer_admin () {
	echo '';
	}
}
add_filter('admin_footer_text', 'remove_footer_admin');


// Hide wordpress Version
function wpb_remove_version() {
return '';
}
add_filter('the_generator', 'wpb_remove_version');

function fb_disable_feed() {
	wp_die( __('No feed available,please visit our <a href="'. get_bloginfo('url') .'">homepage</a>!') );
}
add_action('do_feed', 'fb_disable_feed', 1);
add_action('do_feed_rdf', 'fb_disable_feed', 1);
add_action('do_feed_rss', 'fb_disable_feed', 1);
#add_action('do_feed_rss2', 'fb_disable_feed', 1);
add_action('do_feed_atom', 'fb_disable_feed', 1);
add_action('do_feed_rss2_comments', 'fb_disable_feed', 1);
add_action('do_feed_atom_comments', 'fb_disable_feed', 1);

//remove xpingback header
function remove_x_pingback($headers) {
    unset($headers['X-Pingback']);
    return $headers;
}
add_filter('wp_headers', 'remove_x_pingback');

// remove wp version param from any enqueued scripts
function at_remove_wp_ver_css_js( $src ) {
    if ( strpos( $src, 'ver=' ) )
        $src = remove_query_arg( 'ver', $src );
    return $src;
}
//add_filter( 'style_loader_src', 'at_remove_wp_ver_css_js', 9999 );
//add_filter( 'script_loader_src', 'at_remove_wp_ver_css_js', 9999 );