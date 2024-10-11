<?php
/**
 * The template for displaying archived woocommerce products
 *
 * @link https://docs.woocommerce.com/document/third-party-custom-theme-compatibility/
 * @package Bosa Photograph
 */
get_header(); 
?>
<div id="content" class="site-content">
	<div class="container">
		<section class="wrap-detail-page ">
			<?php if( bosa_photograph_wooCom_is_product_page() || bosa_photograph_wooCom_is_shop() ){
				if( ( bosa_photograph_wooCom_is_product_page() && !get_theme_mod( 'bosa_photograph_disable_single_product_title', true ) ) || ( bosa_photograph_wooCom_is_shop() && !get_theme_mod( 'bosa_photograph_disable_shop_page_title', false ) ) ){ ?>
					<h1 class="page-title">
						<?php woocommerce_page_title(); ?>
					</h1>
				<?php } ?>
			<?php }else{ ?>
				<h1 class="page-title">
					<?php woocommerce_page_title(); ?>
				</h1>
			<?php } ?>
				<?php
				if( !bosa_photograph_wooCom_is_product_page() ){
					if( get_theme_mod( 'bosa_photograph_breadcrumbs_controls', 'show_in_all_page_post' ) == 'disable_in_all_pages' || get_theme_mod( 'bosa_photograph_breadcrumbs_controls', 'show_in_all_page_post' ) == 'show_in_all_page_post' ){
						bosa_photograph_breadcrumb_wrap();
					}
				} ?>
				<div class="row">
					<?php
					$bosa_photograph_getSidebarClass = bosa_photograph_get_sidebar_class();
					$bosa_photograph_sidebarClass = 'col-12';
					if( !bosa_photograph_wooCom_is_product_page() ){
						$bosa_photograph_sidebarClass = $bosa_photograph_getSidebarClass[ 'sidebarClass' ];
						if( !get_theme_mod( 'bosa_photograph_disable_sidebar_woocommerce_shop', false ) ){
							bosa_photograph_woo_product_detail_left_sidebar( $bosa_photograph_getSidebarClass[ 'sidebarColumnClass' ] );
						}
					}	
					?>
					
					<div id="primary" class="content-area <?php echo esc_attr( $bosa_photograph_sidebarClass ); ?>">
						<main id="main" class="site-main post-detail-content woocommerce-products" role="main">
							<?php if ( have_posts() ) :
								woocommerce_content();
							endif;
							?>
						</main><!-- #main -->
					</div><!-- #primary -->
					<?php
					if( !bosa_photograph_wooCom_is_product_page() ){
						if( !get_theme_mod( 'bosa_photograph_disable_sidebar_woocommerce_shop', false ) ){
							bosa_photograph_woo_product_detail_right_sidebar( $bosa_photograph_getSidebarClass[ 'sidebarColumnClass' ] );
						}
					} ?>
				</div>
		</section>
	</div><!-- #container -->
</div><!-- #content -->
<?php
get_footer();
