<?php
if ( !defined( 'ABSPATH' ) ) exit;

/**
 * CNRS Web Kit back compat functionality
 *
 * Prevents CNRS Web Kit from running on WordPress versions prior to 4.4,
 * since this theme is not meant to be backward compatible beyond that and
 * relies on many newer functions and markup changes introduced in 4.4.
 *
 * @package Atos
 * @subpackage CNRS_Web_Kit
 * @since CNRS Web Kit 0.3
 */

/**
 * Prevent switching to CNRS Web Kit on old versions of WordPress.
 *
 * Switches to the default theme.
 *
 * @since CNRS Web Kit 0.3
 */
function cnrswebkit_switch_theme() {
	switch_theme( WP_DEFAULT_THEME, WP_DEFAULT_THEME );

	unset( $_GET['activated'] );

	add_action( 'admin_notices', 'cnrswebkit_upgrade_notice' );
}
add_action( 'after_switch_theme', 'cnrswebkit_switch_theme' );

/**
 * Adds a message for unsuccessful theme switch.
 *
 * Prints an update nag after an unsuccessful attempt to switch to
 * CNRS Web Kit on WordPress versions prior to 4.4.
 *
 * @since CNRS Web Kit 0.3
 *
 * @global string $wp_version WordPress version.
 */
function cnrswebkit_upgrade_notice() {
	/* Translators: %s is the Wordpress current version */ 
    $message = sprintf( __( 'CNRS Web Kit requires at least WordPress version 4.4. You are running version %s. Please upgrade Wordpress and try again.', 'cnrswebkit' ), $GLOBALS['wp_version'] );
	printf( '<div class="error"><p>%s</p></div>', $message );
}

/**
 * Prevents the Customizer from being loaded on WordPress versions prior to 4.4.
 *
 * @since CNRS Web Kit 0.3
 *
 * @global string $wp_version WordPress version.
 */
function cnrswebkit_customize() {
	wp_die( sprintf( __( 'CNRS Web Kit requires at least WordPress version 4.4. You are running version %s. Please upgrade Wordpress and try again.', 'cnrswebkit' ), $GLOBALS['wp_version'] ), '', array(
		'back_link' => true,
	) );
}
add_action( 'load-customize.php', 'cnrswebkit_customize' );

/**
 * Prevents the Theme Preview from being loaded on WordPress versions prior to 4.4.
 *
 * @since CNRS Web Kit 0.3
 *
 * @global string $wp_version WordPress version.
 */
function cnrswebkit_preview() {
	if ( isset( $_GET['preview'] ) ) {
		wp_die( sprintf( __( 'CNRS Web Kit requires at least WordPress version 4.4. You are running version %s. Please upgrade Wordpress and try again.', 'cnrswebkit' ), $GLOBALS['wp_version'] ) );
	}
}
add_action( 'template_redirect', 'cnrswebkit_preview' );
