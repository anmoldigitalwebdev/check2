<?php 

function drweb_theme_custom_script(){

    wp_enqueue_script( 'cursor-js', get_stylesheet_directory_uri() . '/assets/js/cursor.js', array(), false, true );

}

add_action( 'wp_enqueue_scripts', 'drweb_theme_custom_script' );

// Add block patterns
require get_stylesheet_directory() . '/inc/block-patterns.php';

// Add Customizer
require get_stylesheet_directory() . '/inc/customizer.php';

// Upsell in the customizer

if ( class_exists( 'WP_Customize_Section' ) ) {
	class drweb_Upsell_Section extends WP_Customize_Section {
		public $type = 'drweb-upsell';
		public $button_text = '';
		public $url = '';
		public $background = '';
		public $text_color = '';
		protected function render() {
			$background = ! empty( $this->background ) ? esc_attr( $this->background ) : 'linear-gradient(90deg,rgb(0,0,0) 0%,rgb(0,0,0) 35%,rgb(0,0,0) 70%,rgb(0,0,0) 100%)
            ';
			$text_color       = ! empty( $this->text_color ) ? esc_attr( $this->text_color ) : '#fff';
			?>
			<li id="accordion-section-<?php echo esc_attr( $this->id ); ?>" class="drweb_upsell_section accordion-section control-section control-section-<?php echo esc_attr( $this->id ); ?> cannot-expand">
				<h3 class="accordion-section-title" style="border: 0; color:#fff; background:<?php echo esc_attr( $background ); ?>;">
					<?php echo esc_html( $this->title ); ?>
					<a href="<?php echo esc_url( $this->url ); ?>" class="button button-secondary alignright" target="_blank" style="margin-top: -4px;"><?php echo esc_html( $this->button_text ); ?></a>
				</h3>
			</li>
			<?php
		}
	}
}


// Add Get Started
require get_template_directory() . '/inc/get-started/get-started.php';


function drweb_notice() {
    $user_id = get_current_user_id();
    if ( !get_user_meta( $user_id, 'drweb_notice_dismissed' ) ) {
 
        ?>
        <div class="updated notice notice-success is-dismissible notice-get-started-class" data-notice="get-start" style="display: flex-inline;padding: 10px;">
        <h2 style="color: #FFC300"><?php echo esc_html('☆☆☆☆☆', 'drweb'); ?><br></h2>
            <p><?php echo esc_html('This is just a sample of what the Drweb Template can do, the Premium Version is waiting for you!', 'drweb'); ?></p>
            <a style="margin-top: 18px;" class="button button-primary" target="_blank"
               href="<?php echo esc_url('https://realtimethemes.com/theme-drweb'); ?>"><?php esc_html_e('See Premium Version', 'drweb') ?></a>
               <a href="?drweb-dismissed" style="margin-top: 18px;" class="button button-secondary"><?php echo esc_html('Dismiss', 'drweb'); ?></a>
        </div>
        <?php
        }
}
add_action( 'admin_notices', 'drweb_notice' );


/* Theme credit link */
define('drweb_BUY_NOW',__('https://realtimethemes.com/theme-drweb','drweb'));
define('drweb_PRO_DEMO',__('https://preview.realtimethemes.com/drweb/','drweb'));
define('drweb_REVIEW',__('https://realtimethemes.com/theme-drweb','drweb'));
define('drweb_SUPPORT',__('https://realtimethemes.com/','drweb'));


?>