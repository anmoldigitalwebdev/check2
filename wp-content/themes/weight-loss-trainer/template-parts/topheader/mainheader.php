<?php
/**
 * Displays main header
 *
 * @package Weight Loss Trainer
 */
?>

<div class="main-header text-center text-md-start py-3">
    <div class="container">
        <div class="row nav-box">
            <div class="col-lg-5 col-md-4 col-sm-5 col-12 align-self-center header-box">
                <?php get_template_part('template-parts/navigation/nav'); ?>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-5 col-12 logo-box align-self-center">
                <div class="navbar-brand ">
                    <?php if ( has_custom_logo() ) : ?>
                        <div class="site-logo"><?php the_custom_logo(); ?></div>
                    <?php endif; ?>
                    <?php $weight_loss_trainer_blog_info = get_bloginfo( 'name' ); ?>
                        <?php if ( ! empty( $weight_loss_trainer_blog_info ) ) : ?>
                            <?php if ( is_front_page() && is_home() ) : ?>
                                <?php if( get_theme_mod('weight_loss_trainer_logo_title_text',true) != ''){ ?>
                                    <h1 class="site-title pt-2"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                                <?php } ?>
                            <?php else : ?>
                                <?php if( get_theme_mod('weight_loss_trainer_logo_title_text',true) != ''){ ?>
                                    <p class="site-title "><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                                <?php } ?>
                            <?php endif; ?>
                        <?php endif; ?>
                        <?php
                            $weight_loss_trainer_description = get_bloginfo( 'description', 'display' );
                            if ( $weight_loss_trainer_description || is_customize_preview() ) :
                        ?>
                        <?php if( get_theme_mod('weight_loss_trainer_theme_description',false) != ''){ ?>
                            <p class="site-description pb-2"><?php echo esc_html($weight_loss_trainer_description); ?></p>
                        <?php } ?>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-lg-5 col-md-5 col-sm-2 col-12 align-self-center text-lg-end text-md-end header-right">
                <?php if(class_exists('woocommerce')){ ?>
                    <div class="form-search">
                        <?php get_product_search_form(); ?>
                    </div>
                <?php }?>
                <?php if ( get_theme_mod('weight_loss_trainer_header_button_text') != "" || get_theme_mod('weight_loss_trainer_header_button_url') != ""  ) {?>
                    <span class="head-btn"><a href="<?php echo esc_url(get_theme_mod('weight_loss_trainer_header_button_url')); ?>"><?php echo esc_html(get_theme_mod('weight_loss_trainer_header_button_text')); ?><i class="fas fa-arrow-right"></i></a></span>
                <?php }?>
            </div>
        </div>
    </div>
</div>
