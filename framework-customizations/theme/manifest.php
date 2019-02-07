<?php if (!defined('FW')) die('Forbidden');

$manifest = array();

/**
 * An unique id to identify your theme
 * For e.g. this is used to store Theme Settings in wp_option 'fw_theme_settings_options:{theme_id}'
 */
$manifest['id'] = get_option( 'stylesheet' );

/**
 * Specify extensions that you customized, that will look good and work well with your theme.
 * After plugin activation, the user will be redirected to a page to install these extensions.
 */
$manifest['supported_extensions'] = array(
'page-builder' => array(),
'breadcrumbs' => array(),
'sidebars' => array(),
'megamenu' => array(),
);

$manifest['requirements'] = array(
    'wordpress' => array(
        'min_version' => '4.5.2',
        /*'max_version' => '4.99.9'*/
    ),
    'framework' => array(
        'min_version' => '2.5.5',
        /*'max_version' => '1.99.9'*/
    ),
    'extensions' => array(
        /*'extension_name' => array(),*/
        /*'extension_name' => array(
            'min_version' => '1.0.0',
            'max_version' => '2.99.9'
        ),*/
    )
);