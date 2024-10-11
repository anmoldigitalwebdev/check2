<?php
/**
 * Weight Loss Trainer functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Weight Loss Trainer
 */

include get_theme_file_path( 'vendor/wptrt/autoload/src/Weight_Loss_Trainer_Loader.php' );

$Weight_Loss_Trainer_Loader = new \WPTRT\Autoload\Weight_Loss_Trainer_Loader();

$Weight_Loss_Trainer_Loader->weight_loss_trainer_add( 'WPTRT\\Customize\\Section', get_theme_file_path( 'vendor/wptrt/customize-section-button/src' ) );

$Weight_Loss_Trainer_Loader->weight_loss_trainer_register();

if ( ! function_exists( 'weight_loss_trainer_setup' ) ) :

	function weight_loss_trainer_setup() {

		/*
		 * Enable support for Post Formats.
		 *
		 * See: https://codex.wordpress.org/Post_Formats
		*/
		add_theme_support( 'post-formats', array('image','video','gallery','audio',) );

		load_theme_textdomain( 'weight-loss-trainer', get_template_directory() . '/languages' );
		add_theme_support( 'woocommerce' );
		add_theme_support( "responsive-embeds" );
		add_theme_support( "align-wide" );
		add_theme_support( "wp-block-styles" );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
        add_image_size('weight-loss-trainer-featured-header-image', 2000, 660, true);

        register_nav_menus( array(
            'primary' => esc_html__( 'Primary','weight-loss-trainer' ),
	        'footer'=> esc_html__( 'Footer Menu','weight-loss-trainer' ),
        ) );

		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		add_theme_support( 'custom-background', apply_filters( 'weight_loss_trainer_custom_background_args', array(
			'default-color' => 'f7ebe5',
			'default-image' => '',
		) ) );

		add_theme_support( 'customize-selective-refresh-widgets' );

		add_theme_support( 'custom-logo', array(
			'height'      => 50,
			'width'       => 50,
			'flex-width'  => true,
		) );

		add_editor_style( array( '/editor-style.css' ) );
		add_action('wp_ajax_weight_loss_trainer_dismissable_notice', 'weight_loss_trainer_dismissable_notice');
	}
endif;
add_action( 'after_setup_theme', 'weight_loss_trainer_setup' );


function weight_loss_trainer_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'weight_loss_trainer_content_width', 1170 );
}
add_action( 'after_setup_theme', 'weight_loss_trainer_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function weight_loss_trainer_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'weight-loss-trainer' ),
		'id'            => 'sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'weight-loss-trainer' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 1', 'weight-loss-trainer' ),
		'id'            => 'weight-loss-trainer-footer1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5 class="footer-column-widget-title">',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 2', 'weight-loss-trainer' ),
		'id'            => 'weight-loss-trainer-footer2',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5 class="footer-column-widget-title">',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 3', 'weight-loss-trainer' ),
		'id'            => 'weight-loss-trainer-footer3',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5 class="footer-column-widget-title">',
		'after_title'   => '</h5>',
	) );
}
add_action( 'widgets_init', 'weight_loss_trainer_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function weight_loss_trainer_scripts() {

	require_once get_theme_file_path( 'inc/wptt-webfont-loader.php' );

	wp_enqueue_style(
		'source-sans-3',
		wptt_get_webfont_url( 'https://fonts.googleapis.com/css2?family=Source+Sans+3:ital,wght@0,200..900;1,200..900&display=swap" rel="stylesheet"' ),
		array(),
		'1.0'
	);

	wp_enqueue_style(
		'almarai',
		wptt_get_webfont_url( 'https://fonts.googleapis.com/css2?family=Almarai:wght@300;400;700;800&display=swap" rel="stylesheet"' ),
		array(),
		'1.0'
	);

	wp_enqueue_style(
		'gloock',
		wptt_get_webfont_url( 'https://fonts.googleapis.com/css2?family=Gloock&display=swap" rel="stylesheet"' ),
		array(),
		'1.0'
	);

	wp_enqueue_style( 'weight-loss-trainer-block-editor-style', get_theme_file_uri('/assets/css/block-editor-style.css') );

	// load bootstrap css
    wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/assets/css/bootstrap.css');

    wp_enqueue_style( 'owl.carousel-css', get_template_directory_uri() . '/assets/css/owl.carousel.css');

	wp_enqueue_style( 'weight-loss-trainer-style', get_stylesheet_uri() );
	require get_parent_theme_file_path( '/custom-option.php' );
	wp_add_inline_style( 'weight-loss-trainer-style',$weight_loss_trainer_theme_css );

	// fontawesome
	wp_enqueue_style( 'fontawesome-style', get_template_directory_uri() .'/assets/css/fontawesome/css/all.css' );

    wp_enqueue_script('weight-loss-trainer-theme-js', get_template_directory_uri() . '/assets/js/theme-script.js', array('jquery'), '', true );

    wp_enqueue_script('owl.carousel-js', get_template_directory_uri() . '/assets/js/owl.carousel.js', array('jquery'), '', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'weight_loss_trainer_scripts' );

/**
 * Enqueue Preloader.
 */
function weight_loss_trainer_preloader() {

  $weight_loss_trainer_theme_color_css = '';
  $weight_loss_trainer_preloader_bg_color = get_theme_mod('weight_loss_trainer_preloader_bg_color');
  $weight_loss_trainer_preloader_dot_1_color = get_theme_mod('weight_loss_trainer_preloader_dot_1_color');
  $weight_loss_trainer_preloader_dot_2_color = get_theme_mod('weight_loss_trainer_preloader_dot_2_color');

	if(get_theme_mod('weight_loss_trainer_preloader_bg_color') == '') {
		$weight_loss_trainer_preloader_bg_color = '#F3C5B8';
	}
	if(get_theme_mod('weight_loss_trainer_preloader_dot_1_color') == '') {
		$weight_loss_trainer_preloader_dot_1_color = '#ffffff';
	}
	if(get_theme_mod('weight_loss_trainer_preloader_dot_2_color') == '') {
		$weight_loss_trainer_preloader_dot_2_color = '#000000';
	}
	$weight_loss_trainer_theme_color_css = '
		.loading{
			background-color: '.esc_attr($weight_loss_trainer_preloader_bg_color).';
		 }
		 @keyframes loading {
		  0%,
		  100% {
		  	transform: translatey(-2.5rem);
		    background-color: '.esc_attr($weight_loss_trainer_preloader_dot_1_color).';
		  }
		  50% {
		  	transform: translatey(2.5rem);
		    background-color: '.esc_attr($weight_loss_trainer_preloader_dot_2_color).';
		  }
		}
	';
    wp_add_inline_style( 'weight-loss-trainer-style',$weight_loss_trainer_theme_color_css );

}
add_action( 'wp_enqueue_scripts', 'weight_loss_trainer_preloader' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Meta Feild
 */
require get_stylesheet_directory() . '/inc/feature-meta.php';


function weight_loss_trainer_sanitize_select( $input, $setting ){
    $input = sanitize_key($input);
    $choices = $setting->manager->get_control( $setting->id )->choices;
    return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}

/*dropdown page sanitization*/
function weight_loss_trainer_sanitize_dropdown_pages( $page_id, $setting ) {
	$page_id = absint( $page_id );
	return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
}

function weight_loss_trainer_sanitize_checkbox( $input ) {
  // Boolean check
  return ( ( isset( $input ) && true == $input ) ? true : false );
}

/*radio button sanitization*/
function weight_loss_trainer_sanitize_choices( $input, $setting ) {
    global $wp_customize;
    $control = $wp_customize->get_control( $setting->id );
    if ( array_key_exists( $input, $control->choices ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}

function weight_loss_trainer_sanitize_number_absint( $number, $setting ) {
	// Ensure $number is an absolute integer (whole number, zero or greater).
	$number = absint( $number );

	// If the input is an absolute integer, return it; otherwise, return the default
	return ( $number ? $number : $setting->default );
}

function weight_loss_trainer_sanitize_number_range( $number, $setting ) {
	
	// Ensure input is an absolute integer.
	$number = absint( $number );
	
	// Get the input attributes associated with the setting.
	$atts = $setting->manager->get_control( $setting->id )->input_attrs;
	
	// Get minimum number in the range.
	$min = ( isset( $atts['min'] ) ? $atts['min'] : $number );
	
	// Get maximum number in the range.
	$max = ( isset( $atts['max'] ) ? $atts['max'] : $number );
	
	// Get step.
	$step = ( isset( $atts['step'] ) ? $atts['step'] : 1 );
	
	// If the number is within the valid range, return it; otherwise, return the default
	return ( $min <= $number && $number <= $max && is_int( $number / $step ) ? $number : $setting->default );
}

// Change number or products per row to 3
add_filter('loop_shop_columns', 'weight_loss_trainer_loop_columns');
if (!function_exists('weight_loss_trainer_loop_columns')) {
	function weight_loss_trainer_loop_columns() {
		$weight_loss_trainer_columns = get_theme_mod( 'weight_loss_trainer_products_per_row', 3 );
		return $weight_loss_trainer_columns; // 3 products per row
	}
}

function weight_loss_trainer_remove_customize_register() {
    global $wp_customize;

    $wp_customize->remove_setting( 'pro_version_footer' );
    $wp_customize->remove_control( 'pro_version_footer' );

}
add_action( 'customize_register', 'weight_loss_trainer_remove_customize_register', 11 );

/**
 * Get CSS
 */

function weight_loss_trainer_getpage_css($hook) {
	wp_register_script( 'admin-notice-script', get_template_directory_uri() . '/inc/admin/js/admin-notice-script.js', array( 'jquery' ) );
   	wp_localize_script('admin-notice-script','weight_loss_trainer',
		array('admin_ajax'	=>	admin_url('admin-ajax.php'),'wpnonce'  =>	wp_create_nonce('weight_loss_trainer_dismissed_notice_nonce')
		)
	);
	wp_enqueue_script('admin-notice-script');

    wp_localize_script( 'admin-notice-script', 'weight_loss_trainer_ajax_object',
        array( 'ajax_url' => admin_url( 'admin-ajax.php' ) )
    );
	if ( 'appearance_page_weight-loss-trainer-info' != $hook ) {
		return;
	}
	wp_enqueue_style( 'weight-loss-trainer-demo-style', get_template_directory_uri() . '/assets/css/demo.css' );
}
add_action( 'admin_enqueue_scripts', 'weight_loss_trainer_getpage_css' );

if ( ! defined( 'WEIGHT_LOSS_TRAINER_CONTACT_SUPPORT' ) ) {
define('WEIGHT_LOSS_TRAINER_CONTACT_SUPPORT',__('https://wordpress.org/support/theme/weight-loss-trainer/','weight-loss-trainer'));
}
if ( ! defined( 'WEIGHT_LOSS_TRAINER_REVIEW' ) ) {
define('WEIGHT_LOSS_TRAINER_REVIEW',__('https://wordpress.org/support/theme/weight-loss-trainer/reviews/','weight-loss-trainer'));
}
if ( ! defined( 'WEIGHT_LOSS_TRAINER_LIVE_DEMO' ) ) {
define('WEIGHT_LOSS_TRAINER_LIVE_DEMO',__('https://demo.themagnifico.net/weight-loss-trainer/','weight-loss-trainer'));
}
if ( ! defined( 'WEIGHT_LOSS_TRAINER_GET_PREMIUM_PRO' ) ) {
define('WEIGHT_LOSS_TRAINER_GET_PREMIUM_PRO',__('https://www.themagnifico.net/products/fitness-trainer-wordpress-theme','weight-loss-trainer'));
}
if ( ! defined( 'WEIGHT_LOSS_TRAINER_PRO_DOC' ) ) {
define('WEIGHT_LOSS_TRAINER_PRO_DOC',__('https://demo.themagnifico.net/eard/wathiqa/weight-loss-trainer-pro-doc/','weight-loss-trainer'));
}
if ( ! defined( 'WEIGHT_LOSS_TRAINER_PRO_FREE_DOC' ) ) {
define('WEIGHT_LOSS_TRAINER_PRO_FREE_DOC',__('https://demo.themagnifico.net/eard/wathiqa/weight-loss-trainer-free-doc/','weight-loss-trainer'));
}

add_action('admin_menu', 'weight_loss_trainer_themepage');
function weight_loss_trainer_themepage(){

	$weight_loss_trainer_theme_test = wp_get_theme();

	$weight_loss_trainer_theme_info = add_theme_page( __('Theme Options','weight-loss-trainer'), __(' Theme Options','weight-loss-trainer'), 'manage_options', 'weight-loss-trainer-info.php', 'weight_loss_trainer_info_page' );
}

function weight_loss_trainer_info_page() {
	$weight_loss_trainer_theme_user = wp_get_current_user();
	$weight_loss_trainer_theme = wp_get_theme();
	?>
	<div class="wrap about-wrap weight-loss-trainer-add-css">
		<div>
			<h1>
				<?php esc_html_e('Welcome To ','weight-loss-trainer'); ?><?php echo esc_html( $weight_loss_trainer_theme ); ?>
			</h1>
			<div class="feature-section three-col">
				<div class="col">
					<div class="widgets-holder-wrap">
						<h3><?php esc_html_e("Contact Support", "weight-loss-trainer"); ?></h3>
						<p><?php esc_html_e("Thank you for trying Weight Loss Trainer , feel free to contact us for any support regarding our theme.", "weight-loss-trainer"); ?></p>
						<p><a target="_blank" href="<?php echo esc_url( WEIGHT_LOSS_TRAINER_CONTACT_SUPPORT ); ?>" class="button button-primary get">
							<?php esc_html_e("Contact Support", "weight-loss-trainer"); ?>
						</a></p>
					</div>
				</div>
				<div class="col">
					<div class="widgets-holder-wrap">
						<h3><?php esc_html_e("Checkout Premium", "weight-loss-trainer"); ?></h3>
						<p><?php esc_html_e("Our premium theme comes with extended features like demo content import , responsive layouts etc.", "weight-loss-trainer"); ?></p>
						<p><a target="_blank" href="<?php echo esc_url( WEIGHT_LOSS_TRAINER_GET_PREMIUM_PRO ); ?>" class="button button-primary get prem">
							<?php esc_html_e("Get Premium", "weight-loss-trainer"); ?>
						</a></p>
					</div>
				</div>
				<div class="col">
					<div class="widgets-holder-wrap">
						<h3><?php esc_html_e("Review", "weight-loss-trainer"); ?></h3>
						<p><?php esc_html_e("If You love Weight Loss Trainer theme then we would appreciate your review about our theme.", "weight-loss-trainer"); ?></p>
						<p><a target="_blank" href="<?php echo esc_url( WEIGHT_LOSS_TRAINER_REVIEW ); ?>" class="button button-primary get">
							<?php esc_html_e("Review", "weight-loss-trainer"); ?>
						</a></p>
					</div>
				</div>

				<div class="col">
					<div class="widgets-holder-wrap">
						<h3><?php esc_html_e("Free Documentation", "weight-loss-trainer"); ?></h3>
						<p><?php esc_html_e("Our guide is available if you require any help configuring and setting up the theme. Easy and quick way to setup the theme.", "weight-loss-trainer"); ?></p>
						<p><a target="_blank" href="<?php echo esc_url( WEIGHT_LOSS_TRAINER_PRO_FREE_DOC ); ?>" class="button button-primary get">
							<?php esc_html_e("Free Documentation", "weight-loss-trainer"); ?>
						</a></p>
					</div>
				</div>
			</div>
		</div>
		<hr>

		<h2><?php esc_html_e("Free Vs Premium","weight-loss-trainer"); ?></h2>
		<div class="weight-loss-trainer-button-container">
			<a target="_blank" href="<?php echo esc_url( WEIGHT_LOSS_TRAINER_PRO_DOC ); ?>" class="button button-primary get">
				<?php esc_html_e("Checkout Documentation", "weight-loss-trainer"); ?>
			</a>
			<a target="_blank" href="<?php echo esc_url( WEIGHT_LOSS_TRAINER_LIVE_DEMO ); ?>" class="button button-primary get">
				<?php esc_html_e("View Theme Demo", "weight-loss-trainer"); ?>
			</a>
		</div>


		<table class="wp-list-table widefat">
			<thead class="table-book">
				<tr>
					<th><strong><?php esc_html_e("Theme Feature", "weight-loss-trainer"); ?></strong></th>
					<th><strong><?php esc_html_e("Basic Version", "weight-loss-trainer"); ?></strong></th>
					<th><strong><?php esc_html_e("Premium Version", "weight-loss-trainer"); ?></strong></th>
				</tr>
			</thead>

			<tbody>
				<tr>
					<td><?php esc_html_e("Header Background Color", "weight-loss-trainer"); ?></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Custom Navigation Logo Or Text", "weight-loss-trainer"); ?></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Hide Logo Text", "weight-loss-trainer"); ?></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>

				<tr>
					<td><?php esc_html_e("Premium Support", "weight-loss-trainer"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Fully SEO Optimized", "weight-loss-trainer"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Recent Posts Widget", "weight-loss-trainer"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>

				<tr>
					<td><?php esc_html_e("Easy Google Fonts", "weight-loss-trainer"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Pagespeed Plugin", "weight-loss-trainer"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Only Show Header Image On Front Page", "weight-loss-trainer"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Show Header Everywhere", "weight-loss-trainer"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Custom Text On Header Image", "weight-loss-trainer"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Full Width (Hide Sidebar)", "weight-loss-trainer"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Only Show Upper Widgets On Front Page", "weight-loss-trainer"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Replace Copyright Text", "weight-loss-trainer"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Customize Upper Widgets Colors", "weight-loss-trainer"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Customize Navigation Color", "weight-loss-trainer"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Customize Post/Page Color", "weight-loss-trainer"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Customize Blog Feed Color", "weight-loss-trainer"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Customize Footer Color", "weight-loss-trainer"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Customize Sidebar Color", "weight-loss-trainer"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Customize Background Color", "weight-loss-trainer"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Importable Demo Content	", "weight-loss-trainer"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
			</tbody>
		</table>
		<div class="weight-loss-trainer-button-container">
			<a target="_blank" href="<?php echo esc_url( WEIGHT_LOSS_TRAINER_GET_PREMIUM_PRO ); ?>" class="button button-primary get prem">
				<?php esc_html_e("Go Premium", "weight-loss-trainer"); ?>
			</a>
		</div>
	</div>
	<?php
}

//Admin Notice For Getstart
function weight_loss_trainer_ajax_notice_handler() {
	if (!wp_verify_nonce($_POST['wpnonce'], 'weight_loss_trainer_dismissed_notice_nonce')) {
		exit;
	}
    if ( isset( $_POST['type'] ) ) {
        $type = sanitize_text_field( wp_unslash( $_POST['type'] ) );
        update_option( 'dismissed-' . $type, TRUE );
    }
}
add_action( 'wp_ajax_weight_loss_trainer_dismissed_notice_handler', 'weight_loss_trainer_ajax_notice_handler' );

function weight_loss_trainer_deprecated_hook_admin_notice() {

    $weight_loss_trainer_dismissed = get_user_meta(get_current_user_id(), 'weight_loss_trainer_dismissable_notice', true);
    if ( !$weight_loss_trainer_dismissed) { ?>
        <div class="updated notice notice-success is-dismissible notice-get-started-class" data-notice="get_started" style="background: #f7f9f9; padding: 20px 10px; display: flex;">
	    	<div class="tm-admin-image">
	    		<img style="width: 100%;max-width: 320px;line-height: 40px;display: inline-block;vertical-align: top;border: 2px solid #ddd;border-radius: 4px;" src="<?php echo esc_url(get_stylesheet_directory_uri()) .'/screenshot.png'; ?>" />
	    	</div>
	    	<div class="tm-admin-content" style="padding-left: 30px; align-self: center">
	    		<h2 style="font-weight: 600;line-height: 1.3; margin: 0px;"><?php esc_html_e('Thank You For Choosing ', 'weight-loss-trainer'); ?><?php echo wp_get_theme(); ?><h2>
	    		<p style="color: #3c434a; font-weight: 400; margin-bottom: 30px;"><?php _e('Get Started With Theme By Clicking On Getting Started.', 'weight-loss-trainer'); ?><p>
	        	<a class="admin-notice-btn button button-primary button-hero" href="<?php echo esc_url( admin_url( 'themes.php?page=weight-loss-trainer-info.php' )); ?>"><?php esc_html_e( 'Get started', 'weight-loss-trainer' ) ?></a>
	        	<a class="admin-notice-btn button button-primary button-hero" target="_blank" href="<?php echo esc_url( WEIGHT_LOSS_TRAINER_PRO_FREE_DOC ); ?>"><?php esc_html_e( 'Documentation', 'weight-loss-trainer' ) ?></a>
	        	<span style="padding-top: 15px; display: inline-block; padding-left: 8px;">
	        	<span class="dashicons dashicons-admin-links"></span>
	        	<a class="admin-notice-btn"	 target="_blank" href="<?php echo esc_url( WEIGHT_LOSS_TRAINER_LIVE_DEMO ); ?>"><?php esc_html_e( 'View Demo', 'weight-loss-trainer' ) ?></a>
	        	</span>
	    	</div>
        </div>
    <?php }
}

add_action( 'admin_notices', 'weight_loss_trainer_deprecated_hook_admin_notice' );

function weight_loss_trainer_switch_theme() {
    delete_user_meta(get_current_user_id(), 'weight_loss_trainer_dismissable_notice');
}
add_action('after_switch_theme', 'weight_loss_trainer_switch_theme');
function weight_loss_trainer_dismissable_notice() {
    update_user_meta(get_current_user_id(), 'weight_loss_trainer_dismissable_notice', true);
    die();
}
