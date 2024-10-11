<?php
/**
 * Template part for displaying related posts in single.php
 *
 * @since Bosa Photograph 1.0.0
 */

?>

<?php
	$bosa_photograph_post_ids[] = get_the_ID();
	$bosa_photograph_posts_count = get_theme_mod( 'bosa_photograph_related_posts_count', 4 );
	$bosa_photograph_args = bosa_photograph_get_related_posts( array( 'category', 'post_tag' ), $bosa_photograph_posts_count, true  );
	$bosa_photograph_query = new WP_Query( apply_filters( 'bosa_photograph_related_posts_args', $bosa_photograph_args ) );
	if( $bosa_photograph_query->have_posts() ) {
		while ( $bosa_photograph_query->have_posts() ){
			$bosa_photograph_query->the_post();
			array_push( $bosa_photograph_post_ids, get_the_ID() );		
			?>
			<div class="col-12 col-md-6 col-lg-3">
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<?php if ( has_post_thumbnail() ) : ?>
				        <figure class="featured-image">
				            <a href="<?php the_permalink(); ?>">
				                <?php 
				                $bosa_photograph_render_related_post_image_size = get_theme_mod( 'bosa_photograph_render_related_post_image_size', 'bosa-photograph-420-300' );
				                bosa_photograph_image_size( $bosa_photograph_render_related_post_image_size ); ?>
				            </a>
				        </figure>
				   <?php endif; ?>
				    <div class="entry-content">
						<header class="entry-header">
							<?php
								the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
							?>
						</header><!-- .entry-header -->
					</div><!-- .entry-content -->
				</article><!-- #post-->
			</div>
		<?php
		}
		wp_reset_postdata();
	}
	else {
		echo '<div class="col-12">';
		echo '<p class="not-found">';
		esc_html_e( 'No Related Post', 'bosa-photograph' );
		echo '</p>';
		echo '</div>';
	}

