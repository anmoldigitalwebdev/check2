<?php
/**
 * Template part for displaying site info
 *
 * @package Bosa Photograph
 */

?>

<div class="site-info">
	<?php echo wp_kses_post( html_entity_decode( esc_html__( 'Copyright &copy; ' , 'bosa-photograph' ) ) );
		echo esc_html( date( 'Y' ) . ' ' . get_bloginfo( 'name' ) );
		echo esc_html__( '. Powered by', 'bosa-photograph' );
	?>
	<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'bosa-photograph' ) ); ?>" target="_blank">
		<?php
			printf( esc_html__( 'WordPress', 'bosa-photograph' ) );
		?>
	</a>
</div><!-- .site-info -->