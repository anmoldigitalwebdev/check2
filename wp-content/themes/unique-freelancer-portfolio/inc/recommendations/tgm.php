<?php

require get_template_directory() . '/inc/recommendations/class-tgm-plugin-activation.php';

/**
 * Recommended plugins.
 */
function unique_freelancer_portfolio_register_recommended_plugins() {
	$plugins = array(
		array(
			'name'             => __( 'Mizan Demo Importor', 'unique-freelancer-portfolio' ),
			'slug'             => 'mizan-demo-importer',
			'required'         => false,
			'force_activation' => false,
		),
		array(
			'name'             => __( 'ElementsKit Lite', 'unique-freelancer-portfolio' ),
			'slug'             => 'elementskit-lite',
			'required'         => false,
			'force_activation' => false,
		),
		array(
			'name'             => __( 'Element Pack Lite', 'unique-freelancer-portfolio' ),
			'slug'             => 'bdthemes-element-pack-lite',
			'required'         => false,
			'force_activation' => false,
		),
		array(
			'name'             => __( 'Elementor', 'unique-freelancer-portfolio' ),
			'slug'             => 'elementor',
			'required'         => false,
			'force_activation' => false,
		)
	);
	$config = array();
	unique_freelancer_portfolio_tgmpa( $plugins, $config );
}
add_action( 'tgmpa_register', 'unique_freelancer_portfolio_register_recommended_plugins' );