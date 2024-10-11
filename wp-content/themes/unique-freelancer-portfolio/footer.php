<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package unique_freelancer_portfolio
 */

	/**
	 * Hook - unique_freelancer_portfolio_action_after_content.
	 *
	 * @hooked unique_freelancer_portfolio_content_end - 10
	 */
	do_action( 'unique_freelancer_portfolio_action_after_content' );
?>

	<?php
	/**
	 * Hook - unique_freelancer_portfolio_action_before_footer.
	 *
	 * @hooked unique_freelancer_portfolio_add_footer_bottom_widget_area - 5
	 * @hooked unique_freelancer_portfolio_footer_start - 10
	 */
	do_action( 'unique_freelancer_portfolio_action_before_footer' );
	?>
    <?php
	  /**
	   * Hook - unique_freelancer_portfolio_action_footer.
	   *
	   * @hooked unique_freelancer_portfolio_footer_copyright - 10
	   */
	  do_action( 'unique_freelancer_portfolio_action_footer' );
	?>
	<?php
	/**
	 * Hook - unique_freelancer_portfolio_action_after_footer.
	 *
	 * @hooked unique_freelancer_portfolio_footer_end - 10
	 */
	do_action( 'unique_freelancer_portfolio_action_after_footer' );
	?>

<?php
	/**
	 * Hook - unique_freelancer_portfolio_action_after.
	 *
	 * @hooked unique_freelancer_portfolio_page_end - 10
	 * @hooked unique_freelancer_portfolio_footer_goto_top - 20
	 */
	do_action( 'unique_freelancer_portfolio_action_after' );
?>

<?php wp_footer(); ?>
</body>
</html>
