<?php
$bosa_photograph_page_one 	= get_theme_mod( 'bosa_photograph_reviews_page_one', '' );
$bosa_photograph_page_two 	= get_theme_mod( 'bosa_photograph_reviews_page_two', '' );
$bosa_photograph_page_three = get_theme_mod( 'bosa_photograph_reviews_page_three', '' );

$bosa_photograph_page_array = array();
$bosa_photograph_has_page = false;
if( !empty( $bosa_photograph_page_one ) ){
	$bosa_photograph_has_page = true;
	$bosa_photograph_page_array['page_one'] = array(
		'ID' => $bosa_photograph_page_one,
	);
}
if( !empty( $bosa_photograph_page_two ) ){
	$bosa_photograph_has_page = true;
	$bosa_photograph_page_array['page_two'] = array(
		'ID' => $bosa_photograph_page_two,
	);
}
if( !empty( $bosa_photograph_page_three ) ){
	$bosa_photograph_has_page = true;
	$bosa_photograph_page_array['page_three'] = array(
		'ID' => $bosa_photograph_page_three,
	);
}

if( !get_theme_mod( 'bosa_photograph_disable_reviews_section', true ) && $bosa_photograph_has_page ){ ?>
	<section class="section-reviews-area ">
			<div class="row justify-content-center">
				<?php foreach( $bosa_photograph_page_array as $bosa_photograph_each_page ){ ?>
					<div class="col-sm-6 col-lg-4">
						<article class="reviews-item">
							<figure class= "featured-image">
								<?php echo get_the_post_thumbnail( $bosa_photograph_each_page[ 'ID' ], 'bosa-photograph-420-300' ); ?>
							</figure>
							<div class="author-content">
								<h5 class="reviews-content">	
									<?php 
									$bosa_photograph_excerpt = get_the_excerpt( $bosa_photograph_each_page[ 'ID' ] );
									$bosa_photograph_result  = wp_trim_words( $bosa_photograph_excerpt, 20, '' );
									echo esc_html( $bosa_photograph_result );
									?>
								</h5>
								<h3 class="entry-title">
									<a href="<?php echo esc_url( get_permalink( $bosa_photograph_each_page[ 'ID' ] ) ); ?>">
										<?php echo esc_html( get_the_title( $bosa_photograph_each_page[ 'ID' ] ) ); ?>
									</a>
								</h3>	
							</div>
						</article>
					</div>
				<?php } ?>
			</div>
	</section>
<?php } 