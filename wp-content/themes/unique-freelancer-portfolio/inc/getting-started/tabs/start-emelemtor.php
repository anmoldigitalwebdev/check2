<?php
/**
 * Start Elementor.
 *
 */
?>
<!-- Start Elementor -->
<div id="start-panel" class="panel-left visible">
    <div id="unique-freelancer-portfolio-importer" class="tabcontent open">
        <?php if(!class_exists('Mizan_Importer_ThemeWhizzie')){
            $plugin_ins = Unique_Freelancer_Portfolio_Plugin_Activation_Mizan_Demo_Importor::get_instance();
            $unique_freelancer_portfolio_actions = $plugin_ins->recommended_actions;
            ?>
            <div class="unique-freelancer-portfolio-recommended-plugins ">
                <div class="unique-freelancer-portfolio-action-list">
                    <?php if ($unique_freelancer_portfolio_actions): foreach ($unique_freelancer_portfolio_actions as $key => $unique_freelancer_portfolio_actionValue): ?>
                            <div class="unique-freelancer-portfolio-action" id="<?php echo esc_attr($unique_freelancer_portfolio_actionValue['id']);?>">
                                <div class="action-inner plugin-activation-redirect">
                                    <h3 class="action-title"><?php echo esc_html($unique_freelancer_portfolio_actionValue['title']); ?></h3>
                                    <div class="action-desc"><?php echo esc_html($unique_freelancer_portfolio_actionValue['desc']); ?></div>
                                    <?php echo wp_kses_post($unique_freelancer_portfolio_actionValue['link']); ?>
                                </div>
                            </div>
                        <?php endforeach;
                    endif; ?>
                </div>
            </div>
        <?php }else{ ?>
            <div class="tab-outer-box">
                <h3><?php esc_html_e('Welcome to Mizan Themes', 'unique-freelancer-portfolio'); ?></h3>
                <p class="start-text"><?php esc_html_e('The demo will import after you click the Start Quickly button.', 'unique-freelancer-portfolio'); ?></p>
                <div class="info-link">
                    <a class="button button-primary" href="<?php echo esc_url( admin_url('admin.php?page=mizandemoimporter-wizard') ); ?>"><?php esc_html_e('Start Quickly', 'unique-freelancer-portfolio'); ?></a>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
