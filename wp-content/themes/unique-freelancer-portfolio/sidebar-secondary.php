<?php
/**
 * The Secondary Sidebar.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package unique_freelancer_portfolio
 */

?>
<?php $unique_freelancer_portfolio_default_sidebar = apply_filters( 'unique_freelancer_portfolio_filter_default_sidebar_id', 'sidebar-2', 'secondary' ); ?>
<div id="sidebar-secondary" class="widget-area sidebar" role="complementary">
	<?php if ( is_active_sidebar( $unique_freelancer_portfolio_default_sidebar ) ) : ?>
		<?php dynamic_sidebar( $unique_freelancer_portfolio_default_sidebar ); ?>
	<?php else : ?>
		<?php
			do_action( 'unique_freelancer_portfolio_action_default_sidebar', $unique_freelancer_portfolio_default_sidebar, 'secondary' );
		?>
	<?php endif ?>
</div>

<?php $unique_freelancer_portfolio_default_sidebar1 = apply_filters( 'unique_freelancer_portfolio_filter_default_sidebar_id1', 'sidebar-3', 'secondary' ); ?>
<div id="sidebar-secondary1" class="widget-area sidebar" role="complementary">
	<?php if ( is_active_sidebar( $unique_freelancer_portfolio_default_sidebar1 ) ) : ?>
		<?php dynamic_sidebar( $unique_freelancer_portfolio_default_sidebar1 ); ?>
	<?php else : ?>
		<?php
			do_action( 'unique_freelancer_portfolio_action_default_sidebar1', $unique_freelancer_portfolio_default_sidebar1, 'secondary' );
		?>
	<?php endif ?>
</div>