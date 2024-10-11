<?php
/**
 * Displays top header
 *
 * @package Weight Loss Trainer
 */
?>

<div class="top-info text-end">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-4 align-self-center">
				<?php if ( get_theme_mod('weight_loss_trainer_topbar_text') != "" ) {?>
					<p class="tobar-text m-0"><?php echo esc_html(get_theme_mod('weight_loss_trainer_topbar_text')); ?></p> 
				<?php }?>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-8 align-self-center">
				<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-6 align-self-center">
						<?php if ( get_theme_mod('weight_loss_trainer_topbar_phone_text') != "" ) {?>
					        <div class=" text-center text-lg-end py-2">
					            <p class="location m-0"><?php esc_html_e('Call Us ','weight-loss-trainer'); ?><a href="tell:<?php echo esc_attr(get_theme_mod('weight_loss_trainer_topbar_phone_text')); ?>"><?php echo esc_html(get_theme_mod('weight_loss_trainer_topbar_phone_text')); ?></a></p>  
					        </div>
				        <?php }?>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 align-self-center">
						<?php if ( get_theme_mod('weight_loss_trainer_topbar_mail_text') != "" ) {?>
					        <div class=" text-center text-lg-end py-2">
					            <p class="location m-0"><a href="mailto:<?php echo esc_attr(get_theme_mod('weight_loss_trainer_topbar_mail_text')); ?>"><?php echo esc_html(get_theme_mod('weight_loss_trainer_topbar_mail_text')); ?></a></p>  
					        </div>
				        <?php }?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>