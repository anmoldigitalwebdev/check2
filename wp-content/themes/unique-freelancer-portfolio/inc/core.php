<?php
/**
 * Core functions.
 *
 * @package unique_freelancer_portfolio
 */

if ( ! function_exists( 'unique_freelancer_portfolio_get_option' ) ) :

	/**
	 * Get theme option
	 *
	 * @since 1.0.0
	 *
	 * @param string $key Option key.
	 * @return mixed Option value.
	 */
	function unique_freelancer_portfolio_get_option( $key ) {

		$unique_freelancer_portfolio_default_options = unique_freelancer_portfolio_get_default_theme_options();

		if ( empty( $key ) ) {
			return;
		}

		$unique_freelancer_portfolio_theme_options = (array)get_theme_mod( 'theme_options' );
		$unique_freelancer_portfolio_theme_options = wp_parse_args( $unique_freelancer_portfolio_theme_options, $unique_freelancer_portfolio_default_options );

		$unique_freelancer_portfolio_value = null;

		if ( isset( $unique_freelancer_portfolio_theme_options[ $key ] ) ) {
			$unique_freelancer_portfolio_value = $unique_freelancer_portfolio_theme_options[ $key ];
		}

		return $unique_freelancer_portfolio_value;

	}

endif;

if ( ! function_exists( 'unique_freelancer_portfolio_get_options' ) ) :

	/**
	 * Get all theme options.
	 *
	 * @since 1.0.0
	 *
	 * @return array Theme options.
	 */
  function unique_freelancer_portfolio_get_options() {

    $unique_freelancer_portfolio_default_options = unique_freelancer_portfolio_get_default_theme_options();
    $unique_freelancer_portfolio_theme_options = (array)get_theme_mod( 'theme_options' );
    $unique_freelancer_portfolio_theme_options = wp_parse_args( $unique_freelancer_portfolio_theme_options, $unique_freelancer_portfolio_default_options );
    return $unique_freelancer_portfolio_theme_options;

  }

endif;

if( ! function_exists( 'unique_freelancer_portfolio_exclude_category_in_blog_page' ) ) :

  /**
   * Exclude category in blog page.
   *
   * @since 1.0
   */
  function unique_freelancer_portfolio_exclude_category_in_blog_page( $query ) {

    if( $query->is_home && $query->is_main_query()   ) {
      $unique_freelancer_portfolio_exclude_categories = unique_freelancer_portfolio_get_option( 'exclude_categories' );
      if ( ! empty( $unique_freelancer_portfolio_exclude_categories ) ) {
        $cats = explode( ',', $unique_freelancer_portfolio_exclude_categories );
        $cats = array_filter( $cats, 'is_numeric' );
        $unique_freelancer_portfolio_string_exclude = '';
        if ( ! empty( $cats ) ) {
          $unique_freelancer_portfolio_string_exclude = '-' . implode( ',-', $cats);
          $query->set( 'cat', $unique_freelancer_portfolio_string_exclude );
        }
      }
    }
    return $query;
  }

endif;

add_filter( 'pre_get_posts', 'unique_freelancer_portfolio_exclude_category_in_blog_page' );
