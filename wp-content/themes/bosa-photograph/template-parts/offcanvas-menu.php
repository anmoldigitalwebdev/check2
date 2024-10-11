<?php
/** 
* Template for Off canvas Menu
* @since Bosa Photograph 1.0.0
*/
?>
<div id="offcanvas-menu" class="offcanvas-menu-wrap">
	<div class="close-offcanvas-menu">
		<button class="fas fa-times"></button>
	</div>
	<div class="offcanvas-menu-inner">
		<div class="offcanvas-menu-content">
			<!-- header secondary menu -->
			<?php if( !get_theme_mod( 'bosa_photograph_disable_secondary_menu', false ) ){ ?>
				<?php if( get_theme_mod( 'bosa_photograph_header_layout', 'header_one' ) == 'header_three' ){ ?>
					<?php if( has_nav_menu( 'menu-3') ){ ?>
						<nav class="header-navigation d-lg-none">
							<?php
							wp_nav_menu( array(
								'theme_location' => 'menu-3',
								'menu_id'        => 'secondary-menu',
							) );
							?>
						</nav><!-- #site-navigation -->
					<?php } ?>
				<?php } ?>
			<?php } ?>
			<!-- header search field -->
			<?php if( !get_theme_mod( 'bosa_photograph_disable_search_icon', false ) && !get_theme_mod( 'bosa_photograph_disable_mobile_search_icon', false ) ) { ?>
				<div class="header-search-wrap d-lg-none">
			 		<?php get_search_form();  ?>
				</div>
			<?php } ?>
			<!-- header callback button -->
			<?php
			if ( !get_theme_mod( 'bosa_photograph_disable_header_button', false ) && !get_theme_mod( 'bosa_photograph_disable_mobile_header_buttons', false ) ){
				if( get_theme_mod( 'bosa_photograph_header_layout', 'header_one' ) == 'header_one' || get_theme_mod( 'bosa_photograph_header_layout', 'header_one' ) == 'header_fourteen' ){ 
					$bosa_photograph_header_btn_defaults = array(
						array(
							'header_btn_type' 			=> 'button-outline',
							'header_btn_bg_color'		=> '#0E262B',
							'header_btn_border_color'	=> '#1a1a1a',
							'header_btn_text_color'		=> '#1a1a1a',
							'header_btn_hover_color'	=> '#1CA1B9',
							'header_btn_text' 			=> '',
							'header_btn_link' 			=> '',
							'header_btn_target'			=> true,
							'header_btn_radius'			=> 0,
						),	
					);
				
					$bosa_photograph_header_buttons = get_theme_mod( 'bosa_photograph_header_button_repeater', $bosa_photograph_header_btn_defaults );
					$bosa_photograph_has_header_btn = false;
					if ( is_array( $bosa_photograph_header_buttons ) ){
						foreach( $bosa_photograph_header_buttons as $bosa_photograph_value ){
							if( !empty( $bosa_photograph_value['header_btn_text'] ) ){
								$bosa_photograph_has_header_btn = true;
								break;
							}
						}
					}
					if( $bosa_photograph_has_header_btn ){ ?>
						<div class="header-btn-wrap d-lg-none">
							<div class="header-btn">
								<?php	
									$bosa_photograph_i = 1;
					            	foreach( $bosa_photograph_header_buttons as $bosa_photograph_value ){
					            		if( !empty( $bosa_photograph_value['header_btn_text'] ) ){
					            			$bosa_photograph_link_target = '';
											if( $bosa_photograph_value['header_btn_target'] ){
												$bosa_photograph_link_target = '_blank';
											}else {
												$bosa_photograph_link_target = '';
											} ?>
											<a href="<?php echo esc_url( $bosa_photograph_value['header_btn_link'] ); ?>" target="<?php echo esc_attr( $bosa_photograph_link_target ); ?>" class="header-btn-<?php echo esc_attr( $bosa_photograph_i ).' '.esc_attr( $bosa_photograph_value['header_btn_type'] ); ?>">
												<?php echo esc_html( $bosa_photograph_value['header_btn_text'] ); ?>
											</a>
										<?php
					            		}
					            		$bosa_photograph_i++;
					            	}
					            ?>
					        </div>
		            	 </div>
		            <?php	 
		            }
		    	} 
		    	if( get_theme_mod( 'bosa_photograph_header_layout', 'header_one' ) == 'header_two' ){
					$bosa_photograph_transparent_header_btn_defaults = array(
						array(
							'transparent_header_btn_type' 				=> 'button-outline',
							'transparent_header_home_btn_bg_color'		=> '#0E262B',
							'transparent_header_home_btn_border_color'	=> '#ffffff',
							'transparent_header_home_btn_text_color'	=> '#ffffff',
							'transparent_header_btn_bg_color'			=> '#0E262B',
							'transparent_header_btn_border_color'		=> '#1a1a1a',
							'transparent_header_btn_text_color'			=> '#1a1a1a',
							'transparent_header_btn_hover_color'		=> '#1CA1B9',
							'transparent_header_btn_text' 				=> '',
							'transparent_header_btn_link' 				=> '',
							'transparent_header_btn_target'				=> true,
							'transparent_header_btn_radius'				=> 0,
						),	
					);
				
					$bosa_photograph_transparent_header_buttons = get_theme_mod( 'bosa_photograph_transparent_header_button_repeater', $bosa_photograph_transparent_header_btn_defaults );
					$bosa_photograph_has_header_btn = false;
					if ( is_array( $bosa_photograph_transparent_header_buttons ) ){
						foreach( $bosa_photograph_transparent_header_buttons as $bosa_photograph_value ){
							if( !empty( $bosa_photograph_value['transparent_header_btn_text'] ) ){
								$bosa_photograph_has_header_btn = true;
								break;
							}
						}
					}
					if( $bosa_photograph_has_header_btn ){ ?>
						<div class="header-btn-wrap d-lg-none">
							<div class="header-btn">
								<?php	
									$bosa_photograph_i = 1;
					            	foreach( $bosa_photograph_transparent_header_buttons as $bosa_photograph_value ){
					            		if( !empty( $bosa_photograph_value['transparent_header_btn_text'] ) ){
					            			$bosa_photograph_link_target = '';
											if( $bosa_photograph_value['transparent_header_btn_target'] ){
												$bosa_photograph_link_target = '_blank';
											}else {
												$bosa_photograph_link_target = '';
											} ?>
											<a href="<?php echo esc_url( $bosa_photograph_value['transparent_header_btn_link'] ); ?>" target="<?php echo esc_attr( $bosa_photograph_link_target ); ?>" class="header-btn-<?php echo esc_attr( $bosa_photograph_i ).' '.esc_attr( $bosa_photograph_value['transparent_header_btn_type'] ); ?>">
												<?php echo esc_html( $bosa_photograph_value['transparent_header_btn_text'] ); ?>
											</a>
										<?php
					            		}
					            		$bosa_photograph_i++;
					            	}
					            ?>
					        </div>
		            	 </div>
		            <?php	 
		            }
		   	 	}
		   	} ?>

		    <!-- header contact details -->
		    <?php if ( !get_theme_mod( 'bosa_photograph_disable_contact_detail', false ) && !get_theme_mod( 'bosa_photograph_disable_mobile_contact_details', false ) && ( get_theme_mod( 'bosa_photograph_contact_phone', '' )  || get_theme_mod( 'bosa_photograph_contact_email', '' )  || get_theme_mod( 'bosa_photograph_contact_address', '' ) ) ){ ?>
			    <?php if( get_theme_mod( 'bosa_photograph_header_layout', 'header_one' ) == 'header_one' || get_theme_mod( 'bosa_photograph_header_layout', 'header_one' ) == 'header_two' || get_theme_mod( 'bosa_photograph_header_layout', 'header_one' ) == 'header_fourteen' ){ ?>
					<div class="d-lg-none">
						<?php get_template_part( 'template-parts/header', 'contact' ); ?>
					</div>
				<?php } ?>
			<?php } ?>
			<?php if( !get_theme_mod( 'bosa_photograph_disable_header_social_links', false ) && !get_theme_mod( 'bosa_photograph_disable_mobile_social_icons_header', false ) && bosa_photograph_has_social() ){
				echo '<div class="social-profile d-lg-none">';
					bosa_photograph_social();
				echo '</div>'; 
			} ?>
			<!-- header social icons -->		
		</div>
		<!-- header sidebar -->
		<?php if( is_active_sidebar( 'menu-sidebar' ) ){ ?>
			<div class="header-sidebar">
				<?php dynamic_sidebar( 'menu-sidebar' ); ?>
			</div>
		<?php } ?>	
	</div>
</div>