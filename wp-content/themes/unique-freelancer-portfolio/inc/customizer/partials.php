<?php
/**
 * Customizer partials.
 *
 * @package unique_freelancer_portfolio
 */

/**
 * Render the site title for the selective refresh partial.
 *
 * @since 1.0.0
 *
 * @return void
 */
function unique_freelancer_portfolio_customize_partial_blogname() {

	bloginfo( 'name' );

}

/**
 * Render the site title for the selective refresh partial.
 *
 * @since 1.0.0
 *
 * @return void
 */
function unique_freelancer_portfolio_customize_partial_blogdescription() {

	bloginfo( 'description' );

}

/**
 * Partial for copyright text.
 *
 * @since 1.0.0
 *
 * @return void
 */
function unique_freelancer_portfolio_render_partial_copyright_text() {

	$unique_freelancer_portfolio_copyright_text = unique_freelancer_portfolio_get_option( 'unique_freelancer_portfolio_copyright_text' );
	$unique_freelancer_portfolio_copyright_text = apply_filters( 'unique_freelancer_portfolio_filter_copyright_text', $unique_freelancer_portfolio_copyright_text );
	if ( ! empty( $unique_freelancer_portfolio_copyright_text ) ) {
		$unique_freelancer_portfolio_copyright_text = wp_kses_data( $unique_freelancer_portfolio_copyright_text );
	}
	echo $unique_freelancer_portfolio_copyright_text;

}
