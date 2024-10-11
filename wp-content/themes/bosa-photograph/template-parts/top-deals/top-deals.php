<?php
$bosa_photograph_topdealone = get_theme_mod('bosa_photograph_top_deal_one','');
$bosa_photograph_topdealoneID = get_theme_mod('bosa_photograph_top_deals_image_one','');

$bosa_photograph_topdealtwo = get_theme_mod('bosa_photograph_top_deal_two','');
$bosa_photograph_topdealtwoID = get_theme_mod('bosa_photograph_top_deals_image_two','');

$bosa_photograph_topdealthree = get_theme_mod('bosa_photograph_top_deal_three','');
$bosa_photograph_topdealthreeID = get_theme_mod('bosa_photograph_top_deals_image_three','');

$bosa_photograph_topdealfour = get_theme_mod('bosa_photograph_top_deal_four','');
$bosa_photograph_topdealfourID = get_theme_mod('bosa_photograph_top_deals_image_four','');

$bosa_photograph_topdealfive = get_theme_mod('bosa_photograph_top_deal_five','');
$bosa_photograph_topdealfiveID = get_theme_mod('bosa_photograph_top_deals_image_five','');


$bosa_photograph_topdeal_array = array();
$bosa_photograph_has_topdeal = false;
if( !empty( $bosa_photograph_topdealoneID ) || !empty($bosa_photograph_topdealone) ){
	$bosa_photograph_top_deal_one  = wp_get_attachment_image_src( $bosa_photograph_topdealoneID,'bosa-photograph-590-310' );
 	if ( is_array(  $bosa_photograph_top_deal_one ) ){
 		$bosa_photograph_has_topdeal = true;
   	 	$bosa_photograph_top_deals_one = $bosa_photograph_top_deal_one[0];
   	 	$bosa_photograph_topdeal_array['image_one']['ID'] = $bosa_photograph_top_deals_one;
  	}
  	if ( !empty($bosa_photograph_topdealone) ){
 		$bosa_photograph_has_topdeal = true;
   	 	$bosa_photograph_topdeal_array['image_one']['category'] =  $bosa_photograph_topdealone;	
  	}
}
if( !empty( $bosa_photograph_topdealtwoID ) || !empty($bosa_photograph_topdealtwo) ){
	$bosa_photograph_top_deal_two = wp_get_attachment_image_src( $bosa_photograph_topdealtwoID,'bosa-photograph-590-310' );
	if ( is_array(  $bosa_photograph_top_deal_two ) ){
		$bosa_photograph_has_topdeal = true;	
        $bosa_photograph_top_deals_two = $bosa_photograph_top_deal_two[0];
        $bosa_photograph_topdeal_array['image_two']['ID'] = $bosa_photograph_top_deals_two;	
  	}
  	if ( !empty($bosa_photograph_topdealtwo) ){
 		$bosa_photograph_has_topdeal = true;
   	 	$bosa_photograph_topdeal_array['image_two']['category'] =  $bosa_photograph_topdealtwo;	
  	}
}
if( !empty( $bosa_photograph_topdealthreeID ) || !empty($bosa_photograph_topdealthree) ){
	$bosa_photograph_top_deal_three = wp_get_attachment_image_src( $bosa_photograph_topdealthreeID,'bosa-photograph-590-310' );
	if ( is_array(  $bosa_photograph_top_deal_three ) ){
		$bosa_photograph_has_topdeal = true;	
        $bosa_photograph_top_deals_three = $bosa_photograph_top_deal_three[0];
        $bosa_photograph_topdeal_array['image_three']['ID'] = $bosa_photograph_top_deals_three;		
  	}
  	if ( !empty($bosa_photograph_topdealthree) ){
 		$bosa_photograph_has_topdeal = true;
   	 	$bosa_photograph_topdeal_array['image_three']['category'] =  $bosa_photograph_topdealthree;	
  	}
}

if( !empty( $bosa_photograph_topdealfourID ) || !empty($bosa_photograph_topdealfour) ){	
	$bosa_photograph_top_deal_four = wp_get_attachment_image_src( $bosa_photograph_topdealfourID,'bosa-photograph-590-310' );
	if ( is_array(  $bosa_photograph_top_deal_four ) ){
		$bosa_photograph_has_topdeal = true;
      	$bosa_photograph_top_deals_four = $bosa_photograph_top_deal_four[0];
      	$bosa_photograph_topdeal_array['image_four']['ID'] = $bosa_photograph_top_deals_four;		
  	}
  	if ( !empty($bosa_photograph_topdealfour) ){
 		$bosa_photograph_has_topdeal = true;
   	 	$bosa_photograph_topdeal_array['image_four']['category'] =  $bosa_photograph_topdealfour;	
  	}
}

if( !empty( $bosa_photograph_topdealfiveID ) || !empty($bosa_photograph_topdealfive) ){	
	$bosa_photograph_top_deal_five = wp_get_attachment_image_src( $bosa_photograph_topdealfiveID,'bosa-photograph-590-310' );
	if ( is_array(  $bosa_photograph_top_deal_five ) ){
		$bosa_photograph_has_topdeal = true;
      	$bosa_photograph_top_deals_five = $bosa_photograph_top_deal_five[0];
      	$bosa_photograph_topdeal_array['image_five']['ID'] = $bosa_photograph_top_deals_five;	
  	}
  	if ( !empty($bosa_photograph_topdealfive) ){
 		$bosa_photograph_has_topdeal = true;
   	 	$bosa_photograph_topdeal_array['image_five']['category'] =  $bosa_photograph_topdealfive;	
  	}
}

if( !get_theme_mod( 'bosa_photograph_disable_top_deals_section', true ) && $bosa_photograph_has_topdeal ){ ?>
	<section class="section-top-deal-area">
		<div class="content-wrap">
			<?php foreach( $bosa_photograph_topdeal_array as $bosa_photograph_each_topdeal ){ ?>
				<article class="deal-content-wrap">
					<?php if ( isset( $bosa_photograph_each_topdeal['ID'] ) && !empty( $bosa_photograph_each_topdeal['ID'] ) ){ ?>
						<figure class= "featured-image">
							<img src="<?php echo esc_url( $bosa_photograph_each_topdeal['ID'] ); ?>">
						</figure>
					<?php } ?>
					<?php if ( isset( $bosa_photograph_each_topdeal['category'] ) && !empty( $bosa_photograph_each_topdeal['category'] ) ){ ?>
						<h5 class="entry-title">
							<a href="<?php echo esc_url( get_category_link( $bosa_photograph_each_topdeal ['category'] ) ); ?>">
									<?php echo esc_html(get_cat_name( $bosa_photograph_each_topdeal ['category'] ) ); ?>
								<i class="fas fa-arrow-right right-arrow"></i>
							</a>	
						</h5>
					<?php } ?>
				</article>
			<?php } ?>
		</div>
	</section>
<?php } 
