<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Weight Loss Trainer
 */
$weight_loss_trainer_post_page_title =  get_theme_mod( 'weight_loss_trainer_post_page_title', 1 );
$weight_loss_trainer_post_page_meta =  get_theme_mod( 'weight_loss_trainer_post_page_meta', 1 );
$weight_loss_trainer_post_page_content =  get_theme_mod( 'weight_loss_trainer_post_page_content', 1 );
?>

  <div class="col-lg-6 col-md-6 col-sm-6">
    <article id="post-<?php the_ID(); ?>" <?php post_class('article-box'); ?>>
      <?php
        if ( ! is_single() ) {
          // If not a single post, highlight the gallery.
          if ( get_post_gallery() ) {
            echo '<div class="entry-gallery">';
              echo ( get_post_gallery() );
            echo '</div>';
          };
        };
      ?>
      <div class="serv-cont">
        <?php if ($weight_loss_trainer_post_page_meta == 1 ) {?>
          <div class="meta-info-box my-2">
            <span class="entry-author"><?php esc_html_e('BY','weight-loss-trainer'); ?> <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?></a></span>
            <span class="ms-2"><?php echo esc_html(get_the_date()); ?></span>
          </div>
        <?php }?>
        <div class="post-summery">
          <?php if ($weight_loss_trainer_post_page_title == 1 ) {?>
            <?php the_title('<h3 class="entry-title pb-3"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>');?>
          <?php }?>
          <?php if ($weight_loss_trainer_post_page_content == 1 ) {?>
            <p><?php echo wp_trim_words( get_the_content(), 30 ); ?></p>
          <?php }?>
          <a href="<?php the_permalink(); ?>" class="btn-text"><?php esc_html_e('Read More','weight-loss-trainer'); ?></a>
        </div>
      </div>
    </article>
  </div>