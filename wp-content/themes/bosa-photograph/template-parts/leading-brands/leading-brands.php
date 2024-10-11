<?php
$bosa_photograph_leadingbrandoneID = get_theme_mod( 'bosa_photograph_brands_image_one', '' );
$bosa_photograph_leadingbrandcategoryone = get_theme_mod( 'bosa_photograph_brand_category_one', '' );

$bosa_photograph_leadingbrandtwoID = get_theme_mod( 'bosa_photograph_brands_image_two','');
$bosa_photograph_leadingbrandcategorytwo = get_theme_mod( 'bosa_photograph_brand_category_two', '' );

$bosa_photograph_leadingbrandthreeID = get_theme_mod( 'bosa_photograph_brands_image_three', '' );
$bosa_photograph_leadingbrandcategorythree = get_theme_mod( 'bosa_photograph_brand_category_three', '' );

$bosa_photograph_leadingbrandfourID = get_theme_mod( 'bosa_photograph_brands_image_four', '' );
$bosa_photograph_leadingbrandcategoryfour = get_theme_mod( 'bosa_photograph_brand_category_four', '' );

$bosa_photograph_leadingbrandfiveID = get_theme_mod( 'bosa_photograph_brands_image_five', '' );
$bosa_photograph_leadingbrandcategoryfive = get_theme_mod( 'bosa_photograph_brand_category_five', '' );

$bosa_photograph_leadingbrandsixID = get_theme_mod( 'bosa_photograph_brands_image_six', '' );
$bosa_photograph_leadingbrandcategorysix = get_theme_mod( 'bosa_photograph_brand_category_six', '' );


$bosa_photograph_leading_brand_array = array();
$bosa_photograph_has_brands = false;
if( !empty( $bosa_photograph_leadingbrandoneID ) || !empty( $bosa_photograph_leadingbrandcategoryone ) ){
	$bosa_photograph_leading_brand_one  = wp_get_attachment_image_src( $bosa_photograph_leadingbrandoneID ,'bosa-photograph-420-300');
 	if ( is_array(  $bosa_photograph_leading_brand_one ) ){
 		$bosa_photograph_has_brands = true;
   	 	$bosa_photograph_leading_brands_one = $bosa_photograph_leading_brand_one[0];
   	 	$bosa_photograph_leading_brand_array['image_one'] ['ID'] = $bosa_photograph_leading_brands_one;	 	
  	}
  	if ( !empty($bosa_photograph_leadingbrandcategoryone) ){
 		$bosa_photograph_has_brands = true;
   	 	$bosa_photograph_leading_brand_array['image_one']['category'] = $bosa_photograph_leadingbrandcategoryone;	
  	}
}
if( !empty( $bosa_photograph_leadingbrandtwoID ) || !empty( $bosa_photograph_leadingbrandcategorytwo ) ){
	$bosa_photograph_leading_brand_two = wp_get_attachment_image_src( $bosa_photograph_leadingbrandtwoID,'bosa-photograph-420-300');
	if ( is_array(  $bosa_photograph_leading_brand_two ) ){
		$bosa_photograph_has_brands = true;	
        $bosa_photograph_leading_brands_two = $bosa_photograph_leading_brand_two[0];
        $bosa_photograph_leading_brand_array['image_two'] ['ID']= $bosa_photograph_leading_brands_two; 
	}
	if ( !empty($bosa_photograph_leadingbrandcategorytwo) ){
		$bosa_photograph_has_brands = true;
	 	$bosa_photograph_leading_brand_array['image_two']['category'] = $bosa_photograph_leadingbrandcategorytwo;	
  	}
}
if( !empty( $bosa_photograph_leadingbrandthreeID ) || !empty( $bosa_photograph_leadingbrandcategorythree ) ){	
	$bosa_photograph_leading_brand_three = wp_get_attachment_image_src( $bosa_photograph_leadingbrandthreeID,'bosa-photograph-420-300');
	if ( is_array(  $bosa_photograph_leading_brand_three ) ){
		$bosa_photograph_has_brands = true;
      	$bosa_photograph_leading_brands_three = $bosa_photograph_leading_brand_three[0];
      	$bosa_photograph_leading_brand_array['image_three'] ['ID']= $bosa_photograph_leading_brands_three;		
  	}
  	if ( !empty($bosa_photograph_leadingbrandcategorythree) ){
		$bosa_photograph_has_brands = true;
	 	$bosa_photograph_leading_brand_array['image_three'] ['category'] = $bosa_photograph_leadingbrandcategorythree;	
  	}
}
if( !empty( $bosa_photograph_leadingbrandfourID ) || !empty( $bosa_photograph_leadingbrandcategoryfour ) ){	
	$bosa_photograph_leading_brand_four = wp_get_attachment_image_src( $bosa_photograph_leadingbrandfourID,'bosa-photograph-420-300');
	if ( is_array(  $bosa_photograph_leading_brand_four ) ){
		$bosa_photograph_has_brands = true;
      	$bosa_photograph_leading_brands_four = $bosa_photograph_leading_brand_four[0];
      	$bosa_photograph_leading_brand_array['image_four'] ['ID'] = $bosa_photograph_leading_brands_four;	
  	}
  	if ( !empty($bosa_photograph_leadingbrandcategoryfour) ){
		$bosa_photograph_has_brands = true;
	 	$bosa_photograph_leading_brand_array['image_four'] ['category'] = $bosa_photograph_leadingbrandcategoryfour;	
  	}
}
if( !empty( $bosa_photograph_leadingbrandfiveID ) || !empty( $bosa_photograph_leadingbrandcategoryfive ) ){	
	$bosa_photograph_leading_brand_five = wp_get_attachment_image_src( $bosa_photograph_leadingbrandfiveID,'bosa-photograph-420-300');
	if ( is_array(  $bosa_photograph_leading_brand_five ) ){
		$bosa_photograph_has_brands = true;
      	$bosa_photograph_leading_brands_five = $bosa_photograph_leading_brand_five[0];
      	$bosa_photograph_leading_brand_array['image_five'] ['ID'] = $bosa_photograph_leading_brands_five;	
  	}
  	if ( !empty($bosa_photograph_leadingbrandcategoryfive) ){
		$bosa_photograph_has_brands = true;
	 	$bosa_photograph_leading_brand_array['image_five'] ['category'] = $bosa_photograph_leadingbrandcategoryfive;	
  	}
}
if( !empty( $bosa_photograph_leadingbrandsixID ) || !empty( $bosa_photograph_leadingbrandcategorysix ) ){	
	$bosa_photograph_leading_brand_six = wp_get_attachment_image_src( $bosa_photograph_leadingbrandsixID,'bosa-photograph-420-300');
	if ( is_array(  $bosa_photograph_leading_brand_six ) ){
		$bosa_photograph_has_brands = true;
      	$bosa_photograph_leading_brands_six = $bosa_photograph_leading_brand_six[0];
      	$bosa_photograph_leading_brand_array['image_six'] ['ID'] = $bosa_photograph_leading_brands_six;	
  	}
  	if ( !empty($bosa_photograph_leadingbrandcategorysix) ){
		$bosa_photograph_has_brands = true;
	 	$bosa_photograph_leading_brand_array['image_six'] ['category'] = $bosa_photograph_leadingbrandcategorysix;	
  	}
}

$bosa_photograph_product_cat = bosa_photograph_get_post_categories();

if( !get_theme_mod( 'bosa_photograph_disable_leading_brands_section', true ) && ( $bosa_photograph_has_brands || get_theme_mod('bosa_photograph_leading_brands_title') || get_theme_mod('bosa_photograph_leading_brands_sub_title') ) ){ ?>
	<section class="section-leading-area">
		<?php if( get_theme_mod('bosa_photograph_leading_brands_title') || get_theme_mod('bosa_photograph_leading_brands_sub_title') ){ ?>
			<div class="section-title-wrap col-lg-6 col-md-8 offset-lg-3 offset-md-2">
				<h2 class="brand-section-title">	
					<?php echo esc_html( get_theme_mod('bosa_photograph_leading_brands_title') ); ?>
				</h2>
				<p>
					<?php echo esc_html( get_theme_mod('bosa_photograph_leading_brands_sub_title') ); ?>
				</p>
			</div>
		<?php } ?>
		<div class="content-wrap">
			<?php foreach( $bosa_photograph_leading_brand_array as $bosa_photograph_each_leadingbrand ){ ?>
				<article class="leading-items">
					<?php if ( isset( $bosa_photograph_each_leadingbrand['ID'] )  && !empty( $bosa_photograph_each_leadingbrand['ID'] ) ){ 
							$bosa_photograph_cat_url = '';
							if( isset( $bosa_photograph_each_leadingbrand['category'] ) && !empty( $bosa_photograph_each_leadingbrand['category'] ) ) {
								$bosa_photograph_cat_url = $bosa_photograph_each_leadingbrand['category'];
							}
						?>
						<figure class= "featured-image">
							<a href="<?php echo esc_url( get_category_link( $bosa_photograph_cat_url ) ); ?>">
								<img src="<?php echo esc_url( $bosa_photograph_each_leadingbrand['ID'] ); ?>">
							</a>	
						</figure>
					<?php } ?>
					<?php if ( isset( $bosa_photograph_each_leadingbrand['category'] ) && !empty( $bosa_photograph_each_leadingbrand['category'] ) ){ ?>
						<h5 class="entry-title">
							<a href="<?php echo esc_url( get_category_link( $bosa_photograph_each_leadingbrand ['category'] ) ); ?>">
								<?php echo esc_html($bosa_photograph_product_cat[$bosa_photograph_each_leadingbrand['category'] ] ); ?>
							</a>	
						</h5>
					<?php } ?>
				</article>	
			<?php } ?>
		</div>
	</section>
<?php } 

