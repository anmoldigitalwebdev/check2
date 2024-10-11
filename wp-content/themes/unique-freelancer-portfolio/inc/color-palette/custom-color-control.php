<?php

  $unique_freelancer_portfolio_color_palette_css = '';

	// Global Color

	$unique_freelancer_portfolio_first_color = unique_freelancer_portfolio_get_option('unique_freelancer_portfolio_first_color');

	if($unique_freelancer_portfolio_first_color != false){
		$unique_freelancer_portfolio_color_palette_css .=':root {';
			$unique_freelancer_portfolio_color_palette_css .='--primary-color: '.esc_attr($unique_freelancer_portfolio_first_color).'!important;';
		$unique_freelancer_portfolio_color_palette_css .='}';
	}