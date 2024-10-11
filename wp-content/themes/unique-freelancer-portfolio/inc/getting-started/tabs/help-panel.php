<?php
/**
 * Help Panel.
 *
 */
?>
<!-- Help file panel -->
<div id="help-panel" class="panel-left">
    <div class="panel-aside">
        <h4><?php esc_html_e( 'Theme Customizer', 'unique-freelancer-portfolio' ); ?></h4>
        <p><?php esc_html_e( 'To begin customizing your website, start by clicking "Customize"', 'unique-freelancer-portfolio' ); ?></p>
        <a class="button button-primary" href="<?php echo esc_url( admin_url('customize.php') ); ?>" title="<?php esc_attr_e( 'Visit the Demo', 'unique-freelancer-portfolio' ); ?>" target="_blank">
            <?php esc_html_e( 'Customizing', 'unique-freelancer-portfolio' ); ?>
        </a>
    </div><!-- .panel-aside -->

    <div class="panel-aside">
        <h4><?php esc_html_e( 'Documentation', 'unique-freelancer-portfolio' ); ?></h4>
        <p><?php esc_html_e( 'Explore the comprehensive guide and instructions for this WordPress Theme. Begin your journey with assurance.', 'unique-freelancer-portfolio' ); ?></p>
        <a class="button button-primary" href="<?php echo esc_url( UNIQUE_FREELANCER_PORTFOLIO_DOCUMENTATION ); ?>" title="<?php esc_attr_e( 'Visit the doc', 'unique-freelancer-portfolio' ); ?>" target="_blank">
            <?php esc_html_e( 'Documentation', 'unique-freelancer-portfolio' ); ?>
        </a>
    </div><!-- .panel-aside -->

    <div class="panel-aside">
        <h4><?php esc_html_e( 'Support Ticket', 'unique-freelancer-portfolio' ); ?></h4>
        <p><?php esc_html_e( 'Our dedicated team is well prepared to help you out in case of queries and doubts regarding our theme', 'unique-freelancer-portfolio' ); ?></p>
        <a class="button button-primary" href="<?php echo esc_url( UNIQUE_FREELANCER_PORTFOLIO_SUPPORT ); ?>" title="<?php esc_attr_e( 'Visit the Support', 'unique-freelancer-portfolio' ); ?>" target="_blank">
            <?php esc_html_e( 'Contact Support', 'unique-freelancer-portfolio' ); ?>
        </a>
    </div><!-- .panel-aside -->

    <div class="panel-aside">
        <h4><?php esc_html_e( 'Reviews & Testimonials', 'unique-freelancer-portfolio' ); ?></h4>
        <p><?php esc_html_e( 'All the features and aspects of this WordPress Theme are phenomenal. I\'d recommend this theme to all.', 'unique-freelancer-portfolio' ); ?></p>
        <a class="button button-primary" href="<?php echo esc_url( UNIQUE_FREELANCER_PORTFOLIO_REVIEW ); ?>" title="<?php esc_attr_e( 'Visit the Demo', 'unique-freelancer-portfolio' ); ?>" target="_blank">
            <?php esc_html_e( 'Review', 'unique-freelancer-portfolio' ); ?>
        </a>
    </div><!-- .panel-aside -->
</div>