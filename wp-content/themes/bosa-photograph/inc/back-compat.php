<?php
/**
 * Bosa Photograph back compat functionality
 *
 * Prevents Bosa Photograph from running on WordPress versions prior to 5.0,
 * since this theme is not meant to be backward compatible beyond that and
 * relies on many newer functions and markup changes introduced in 5.0.
 *
 * @since Bosa Photograph 1.0.0
 */

/**
 * Prevent switching to Bosa Photograph on old versions of WordPress.
 *
 * Switches to the default theme.
 *
 * @since Bosa Photograph 1.0.0
 */
function bosa_photograph_switch_theme() {
	switch_theme( WP_DEFAULT_THEME );
	unset( $_GET['activated'] );
	add_action( 'admin_notices', 'bosa_photograph_upgrade_notice' );
}
add_action( 'after_switch_theme', 'bosa_photograph_switch_theme' );

/**
 * Adds a message for unsuccessful theme switch.
 *
 * Prints an update nag after an unsuccessful attempt to switch to
 * Bosa Photograph on WordPress versions prior to 5.0.
 *
 * @since Bosa Photograph 1.0.0
 * @global string $wp_version WordPress version.
 */
function bosa_photograph_upgrade_notice() {
	/* translators: %s - WordPress version*/
	$message = sprintf( esc_html__( 'Bosa Photograph requires at least WordPress version 5.0. You are running version %s. Please upgrade and try again.', 'bosa-photograph' ),  $GLOBALS['wp_version'] ) ;
	printf( '<div class="error"><p>%s</p></div>', $message ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
}

/**
 * Prevents the Customizer from being loaded on WordPress versions prior to 5.0.
 *
 * @since Bosa Photograph 1.0.0
 *
 * @global string $wp_version WordPress version.
 */
function bosa_photograph_customize() {
	/* translators: %s - WordPress version*/
	wp_die( sprintf( esc_html__( 'Bosa Photograph requires at least WordPress version 5.0. You are running version %s. Please upgrade and try again.', 'bosa-photograph' ), esc_html($GLOBALS['wp_version'] ) ), '', array(
		'back_link' => true,
	) );
}
add_action( 'load-customize.php', 'bosa_photograph_customize' );

/**
 * Prevents the Theme Preview from being loaded on WordPress versions prior to 5.0.
 *
 * @since Bosa Photograph 1.0.0
 * @global string $wp_version WordPress version.
 */
function bosa_photograph_preview() {
	if ( isset( $_GET['preview'] ) ) {
		/* translators: %s - WordPress version*/
		wp_die( sprintf( esc_html__( 'Bosa Photograph requires at least WordPress version 5.0. You are running version %s. Please upgrade and try again.', 'bosa-photograph' ), esc_html( $GLOBALS['wp_version'] ) ) );
	}
}
add_action( 'template_redirect', 'bosa_photograph_preview' );
