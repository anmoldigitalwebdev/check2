<?php
/**
 * Template Name: Home Template
 */

get_header(); ?>

<main id="skip-content">
  <section id="top-slider" >
    <?php $weight_loss_trainer_slide_pages = array();
      for ( $weight_loss_trainer_count = 1; $weight_loss_trainer_count <= 3; $weight_loss_trainer_count++ ) {
        $weight_loss_trainer_mod = intval( get_theme_mod( 'weight_loss_trainer_top_slider_page' . $weight_loss_trainer_count ));
        if ( 'page-none-selected' != $weight_loss_trainer_mod ) {
          $weight_loss_trainer_slide_pages[] = $weight_loss_trainer_mod;
        }
      }
      if( !empty($weight_loss_trainer_slide_pages) ) :
        $weight_loss_trainer_args = array(
          'post_type' => 'page',
          'post__in' => $weight_loss_trainer_slide_pages,
          'orderby' => 'post__in'
        );
        $weight_loss_trainer_query = new WP_Query( $weight_loss_trainer_args );
        if ( $weight_loss_trainer_query->have_posts() ) :
          $i = 1;
    ?>
    <div class="owl-carousel" role="listbox">
      <?php  while ( $weight_loss_trainer_query->have_posts() ) : $weight_loss_trainer_query->the_post(); ?>
        <div class="slide-box">
          <div class="slider-image">
            <?php if(has_post_thumbnail()){
            the_post_thumbnail();
            } else{?>
            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/image/slider.png" alt="" />
          <?php } ?>
          </div>
          <div class="slider-inner-box">
            <?php if(get_theme_mod('weight_loss_trainer_slider_heading') != ''){ ?>
              <h2 class="slide-heading"><?php echo esc_html(get_theme_mod('weight_loss_trainer_slider_heading')); ?></h2>
            <?php }?>
            <h3 class="mt-4"><?php the_title(); ?></h3>
            <p class="content mt-3"><?php echo esc_html( wp_trim_words( get_the_content(),20 )); ?><p>
            <div class="slide-btn mt-4">
              <a href="<?php the_permalink(); ?>"><?php esc_html_e('LEARN MORE','weight-loss-trainer'); ?><i class="fas fa-arrow-right"></i></a>
            </div>
          </div>
        </div>
      <?php $i++; endwhile;
      wp_reset_postdata();?>
    </div>
    <?php else : ?>
      <div class="no-postfound"></div>
    <?php endif;
    endif;?>
  </section>

  <section class="featured py-5">
    <div class="container">
      <div class="ser-heading text-center mb-4">
        <?php if(get_theme_mod('weight_loss_trainer_services_heading') != ''){ ?>
          <h3 class="main-heading "><?php echo esc_html(get_theme_mod('weight_loss_trainer_services_heading')); ?></h3>
        <?php }?>
        <?php if(get_theme_mod('weight_loss_trainer_services_content') != ''){ ?>
          <h4 class="main-heading mt-3"><?php echo esc_html(get_theme_mod('weight_loss_trainer_services_content')); ?></h4>
        <?php }?>
      </div>
      <div class="row ">
        <?php
          $weight_loss_trainer_services_cat = get_theme_mod('weight_loss_trainer_services_sec_category','');
          if($weight_loss_trainer_services_cat){
            $weight_loss_trainer_page_query5 = new WP_Query(array( 'category_name' => esc_html($weight_loss_trainer_services_cat,'weight-loss-trainer'),'posts_per_page' => 5));
            $i=1;
            while( $weight_loss_trainer_page_query5->have_posts() ) : $weight_loss_trainer_page_query5->the_post(); ?>
              <?php if(get_theme_mod('weight_loss_trainer_services_icon'.$i,'fas fa-stethoscope')){ ?>
                <div class="col-lg-4 col-md-6 col-sm-6">
                  <div class="feature-box mb-4 m-0">
                    <div class="feature-img">
                      <?php if (has_post_thumbnail()) { ?><img src="<?php the_post_thumbnail_url('full'); ?>" /><?php } else { ?><div class="project-bg"></div> <?php } ?>
                      <span><?php the_category() ?></span>
                    </div>
                    <div class="ser-content">
                      <?php if( get_post_meta($post->ID, 'weight_loss_trainer_text_1', true) ) {?>
                        <h6 class="heading p-0"><?php echo esc_html(get_post_meta($post->ID,'weight_loss_trainer_text_1',true)); ?></h6>
                      <?php }?>
                      <h4 class="mt-2 mb-3 text-start"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                      <a class="ser-btn" href="<?php the_permalink(); ?>"><?php esc_html_e('SEE RECIPE','weight-loss-trainer'); ?></a>
                    </div>
                  </div>
                </div>
              <?php }?>
            <?php $i++; endwhile;
          wp_reset_postdata();
        } ?>
      </div>
    </div>
  </section>
  <section id="page-content">
    <div class="container">
      <div class="py-5">
        <?php
          if ( have_posts() ) :
            while ( have_posts() ) : the_post();
              the_content();
            endwhile;
          endif;
        ?>
      </div>
    </div>
  </section>
</main>

<?php get_footer(); ?>