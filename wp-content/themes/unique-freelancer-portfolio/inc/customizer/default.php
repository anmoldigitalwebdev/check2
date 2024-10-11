<?php
/**
 * Default theme options.
 *
 * @package unique_freelancer_portfolio
 */

if ( ! function_exists( 'unique_freelancer_portfolio_get_default_theme_options' ) ) :

	/**
	 * Get default theme options.
	 *
	 * @since 1.0.0
	 *
	 * @return array Default theme options.
	 */
	function unique_freelancer_portfolio_get_default_theme_options() {

		$defaults = array();

		// Typography
		$defaults['unique_freelancer_portfolio_body_font_family']         = '';
		$defaults['unique_freelancer_portfolio_h1_font_family']          	= '';
		$defaults['unique_freelancer_portfolio_h1_font_size']         	= '';
		$defaults['unique_freelancer_portfolio_h2_font_family']          	= '';
		$defaults['unique_freelancer_portfolio_h2_font_size']         	= '';
		$defaults['unique_freelancer_portfolio_h3_font_family']          	= '';
		$defaults['unique_freelancer_portfolio_h3_font_size']         	= '';
		$defaults['unique_freelancer_portfolio_h4_font_family']          	= '';
		$defaults['unique_freelancer_portfolio_h4_font_size']         	= '';
		$defaults['unique_freelancer_portfolio_h5_font_family']          	= '';
		$defaults['unique_freelancer_portfolio_h5_font_size']         	= '';
		$defaults['unique_freelancer_portfolio_h6_font_family']          	= '';
		$defaults['unique_freelancer_portfolio_h6_font_size']         	= '';

		// Global Color
		$defaults['unique_freelancer_portfolio_first_color']        = '#6F41C2';

		//General Option
        $defaults['unique_freelancer_portfolio_show_scroll_to_top']          = true;
        $defaults['unique_freelancer_portfolio_show_preloader_setting']      = false;
        $defaults['unique_freelancer_portfolio_show_data_sticky_setting']    = false;

        //Post Option
        $defaults['unique_freelancer_portfolio_show_post_date_setting']         		 = true;
        $defaults['unique_freelancer_portfolio_show_post_heading_setting']      		 = true;
        $defaults['unique_freelancer_portfolio_show_post_content_setting']       		 = true;
        $defaults['unique_freelancer_portfolio_show_post_admin_setting']         		 = true;
        $defaults['unique_freelancer_portfolio_show_post_categories_setting']    		 = true;
        $defaults['unique_freelancer_portfolio_show_post_comments_setting']    	 	 = true;
        $defaults['unique_freelancer_portfolio_show_post_featured_image_setting']   	 = true;
        $defaults['unique_freelancer_portfolio_show_post_tags_setting']    			 = true;

		// Header.
		$defaults['unique_freelancer_portfolio_show_title']            = true;
		$defaults['unique_freelancer_portfolio_show_tagline']          = false;

		// Layout.
		$defaults['unique_freelancer_portfolio_global_layout']           = 'right-sidebar';
		$defaults['unique_freelancer_portfolio_archive_layout']          = 'excerpt';
		$defaults['unique_freelancer_portfolio_archive_image']           = 'large';
		$defaults['unique_freelancer_portfolio_archive_image_alignment'] = 'center';
		$defaults['unique_freelancer_portfolio_single_image']            = 'large';

		// Home Page.
		$defaults['unique_freelancer_portfolio_home_content_status'] = true;
		
		// Footer.
		$defaults['unique_freelancer_portfolio_copyright_text']        = esc_html__( 'Copyright &copy; All rights reserved.', 'unique-freelancer-portfolio' );
		
		// Pass through filter.
		$defaults = apply_filters( 'unique_freelancer_portfolio_filter_default_theme_options', $defaults );
		return $defaults;
	}

endif;