<?php
/**
 * Theme functions and definitions.
 *
 * @link https://codex.wordpress.org/Functions_File_Explained
 *
 * @package unique_freelancer_portfolio
 */

if ( ! function_exists( 'unique_freelancer_portfolio_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function unique_freelancer_portfolio_setup() {
		/*
		 * Make theme available for translation.
		 */ 
		load_theme_textdomain( 'unique-freelancer-portfolio', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		// Let WordPress manage the document title.
		add_theme_support( 'title-tag' );

		// Enable support for Post Thumbnails on posts and pages.
		add_theme_support( 'post-thumbnails' );
		add_image_size( 'unique-freelancer-portfolio-thumb', 400, 300 );

		// Register nav menu locations.
		register_nav_menus( array(
			'primary-menu'  => esc_html__( 'Primary Menu', 'unique-freelancer-portfolio' ),
		) );

		/*
		* This theme styles the visual editor to resemble the theme style,
		* specifically font, colors, icons, and column width.
		*/
		$min = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
		add_editor_style( array( '/css/editor-style' . $min . '.css', unique_freelancer_portfolio_fonts_url() ) );

		/*
		 * Switch default core markup to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'unique_freelancer_portfolio_custom_background_args', array(
			'default-color' => 'f7fcfe',
		) ) );

		// Enable support for selective refresh of widgets in Customizer.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Enable support for custom logo.
		add_theme_support( 'custom-logo', array(
			'height'      => 100,
			'width'       => 200,
			'flex-height' => true,
		) );

		// Load default block styles.
		add_theme_support( 'wp-block-styles' );

		// Add support for responsive embeds.
		add_theme_support( 'responsive-embeds' );

		// Enable support for footer widgets.
		add_theme_support( 'footer-widgets', 4 );

		// woocommerce
		add_theme_support( 'woocommerce' );

		// Load Supports.
		require_once get_template_directory() . '/inc/support.php';

		// Add custom editor font sizes.
		add_theme_support(
			'editor-font-sizes',
			array(
				array(
					'name'      => __( 'Small', 'unique-freelancer-portfolio' ),
					'shortName' => __( 'S', 'unique-freelancer-portfolio' ),
					'size'      => 13,
					'slug'      => 'small',
				),
				array(
					'name'      => __( 'Normal', 'unique-freelancer-portfolio' ),
					'shortName' => __( 'M', 'unique-freelancer-portfolio' ),
					'size'      => 14,
					'slug'      => 'normal',
				),
				array(
					'name'      => __( 'Large', 'unique-freelancer-portfolio' ),
					'shortName' => __( 'L', 'unique-freelancer-portfolio' ),
					'size'      => 30,
					'slug'      => 'large',
				),
				array(
					'name'      => __( 'Huge', 'unique-freelancer-portfolio' ),
					'shortName' => __( 'XL', 'unique-freelancer-portfolio' ),
					'size'      => 36,
					'slug'      => 'huge',
				),
			)
		);

		// Editor color palette.
		add_theme_support(
			'editor-color-palette',
			array(
				array(
					'name'  => __( 'Black', 'unique-freelancer-portfolio' ),
					'slug'  => 'black',
					'color' => '#121212',
				),
				array(
					'name'  => __( 'White', 'unique-freelancer-portfolio' ),
					'slug'  => 'white',
					'color' => '#ffffff',
				),
				array(
					'name'  => __( 'Gray', 'unique-freelancer-portfolio' ),
					'slug'  => 'gray',
					'color' => '#727272',
				),
				array(
					'name'  => __( 'Blue', 'unique-freelancer-portfolio' ),
					'slug'  => 'blue',
					'color' => '#007BFF',
				),
				array(
					'name'  => __( 'Navy Blue', 'unique-freelancer-portfolio' ),
					'slug'  => 'navy-blue',
					'color' => '#007BFF',
				),
				array(
					'name'  => __( 'Light Blue', 'unique-freelancer-portfolio' ),
					'slug'  => 'light-blue',
					'color' => '#f7fcfe',
				),
				array(
					'name'  => __( 'Orange', 'unique-freelancer-portfolio' ),
					'slug'  => 'orange',
					'color' => '#121212',
				),
				array(
					'name'  => __( 'Green', 'unique-freelancer-portfolio' ),
					'slug'  => 'green',
					'color' => '#77a464',
				),
				array(
					'name'  => __( 'Red', 'unique-freelancer-portfolio' ),
					'slug'  => 'red',
					'color' => '#e4572e',
				),
				array(
					'name'  => __( 'Yellow', 'unique-freelancer-portfolio' ),
					'slug'  => 'yellow',
					'color' => '#f4a024',
				),
			)
		);
	}
endif;

add_action( 'after_setup_theme', 'unique_freelancer_portfolio_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function unique_freelancer_portfolio_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'unique_freelancer_portfolio_content_width', 771 );
}
add_action( 'after_setup_theme', 'unique_freelancer_portfolio_content_width', 0 );

/**
 * Register widget area.
 */
function unique_freelancer_portfolio_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Primary Sidebar', 'unique-freelancer-portfolio' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here to appear in your Primary Sidebar.', 'unique-freelancer-portfolio' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Secondary Sidebar', 'unique-freelancer-portfolio' ),
		'id'            => 'sidebar-2',
		'description'   => esc_html__( 'Add widgets here to appear in your Secondary Sidebar.', 'unique-freelancer-portfolio' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Secondary Sidebar 1', 'unique-freelancer-portfolio' ),
		'id'            => 'sidebar-3',
		'description'   => esc_html__( 'Add widgets here to appear in your Secondary Sidebar 1.', 'unique-freelancer-portfolio' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'unique_freelancer_portfolio_widgets_init' );

/**
 * Register custom fonts.
 */
function unique_freelancer_portfolio_fonts_url() {
	$font_family   = array(
		'Josefin+Sans:ital,wght@0,100..700;1,100..700&',
		'Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Bad Script',
		'Bebas Neue',
		'Fjalla One',
		'PT Sans:ital,wght@0,400;0,700;1,400;1,700',
		'PT Serif:ital,wght@0,400;0,700;1,400;1,700',
		'Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900',
		'Roboto Condensed:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700',
		'Alex Brush',
		'Overpass:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Playball',
		'Alegreya:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900',
		'Julius Sans One',
		'Arsenal:ital,wght@0,400;0,700;1,400;1,700',
		'Slabo 13px',
		'Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900',
		'Overpass Mono:wght@300;400;500;600;700',
		'Source Sans Pro:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700;1,900',
		'Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900',
		'Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Lora:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700',
		'Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700',
		'Cabin:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700',
		'Arimo:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700',
		'Playfair Display:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900',
		'Quicksand:wght@300..700',
		'Padauk:wght@400;700',
		'Mulish:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;0,1000;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900;1,1000',
		'Inconsolata:wght@200;300;400;500;600;700;800;900&family=Mulish:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;0,1000;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900;1,1000',
		'Bitter:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Mulish:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;0,1000;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900;1,1000',
		'Pacifico',
		'Indie Flower',
		'VT323',
		'Dosis:wght@200;300;400;500;600;700;800',
		'Frank Ruhl Libre:wght@300;400;500;700;900',
		'Fjalla One',
		'Figtree:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Oxygen:wght@300;400;700',
		'Arvo:ital,wght@0,400;0,700;1,400;1,700',
		'Noto Serif:ital,wght@0,400;0,700;1,400;1,700',
		'Lobster',
		'Crimson Text:ital,wght@0,400;0,600;0,700;1,400;1,600;1,700',
		'Yanone Kaffeesatz:wght@200;300;400;500;600;700',
		'Anton',
		'Libre Baskerville:ital,wght@0,400;0,700;1,400',
		'Bree Serif',
		'Gloria Hallelujah',
		'Abril Fatface',
		'Varela Round',
		'Vampiro One',
		'Shadows Into Light',
		'Cuprum:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700',
		'Rokkitt:wght@100;200;300;400;500;600;700;800;900',
		'Vollkorn:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900',
		'Francois One',
		'Orbitron:wght@400;500;600;700;800;900',
		'Patua One',
		'Acme',
		'Satisfy',
		'Josefin Slab:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700',
		'Quattrocento Sans:ital,wght@0,400;0,700;1,400;1,700',
		'Architects Daughter',
		'Russo One',
		'Monda:wght@400;700',
		'Righteous',
		'Lobster Two:ital,wght@0,400;0,700;1,400;1,700',
		'Hammersmith One',
		'Courgette',
		'Permanent Marke',
		'Cherry Swash:wght@400;700',
		'Cormorant Garamond:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700',
		'Poiret One',
		'BenchNine:wght@300;400;700',
		'Economica:ital,wght@0,400;0,700;1,400;1,700',
		'Handlee',
		'Cardo:ital,wght@0,400;0,700;1,400',
		'Alfa Slab One',
		'Averia Serif Libre:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700',
		'Cookie',
		'Chewy',
		'Great Vibes',
		'Coming Soon',
		'Philosopher:ital,wght@0,400;0,700;1,400;1,700',
		'Days One',
		'Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Shrikhand',
		'Tangerine:wght@400;700',
		'IM Fell English SC',
		'Boogaloo',
		'Bangers',
		'Fredoka One',
		'Volkhov:ital,wght@0,400;0,700;1,400;1,700',
		'Shadows Into Light Two',
		'Marck Script',
		'Sacramento',
		'Unica One',
		'Dancing Script:wght@400;500;600;700',
		'Exo 2:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Archivo:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Jost:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'DM Serif Display:ital@0;1',
		'Open Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800'
	);
	
	$query_args = array(
		'family'	=> rawurlencode(implode('|',$font_family)),
	);
	$font_url = add_query_arg($query_args,'//fonts.googleapis.com/css');
	return $font_url;
	$contents = wptt_get_webfont_url( esc_url_raw( $fonts_url ) );

}

/**
 * Enqueue scripts and styles.
 */
function unique_freelancer_portfolio_scripts() {

	$min = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';

	wp_enqueue_style( 'unique-freelancer-portfolio-font-awesome', get_template_directory_uri() . '/third-party/font-awesome/css/font-awesome' . $min . '.css', '', '4.7.0' );

	$unique_freelancer_portfolio_fonts_url = unique_freelancer_portfolio_fonts_url();
	if ( ! empty( $unique_freelancer_portfolio_fonts_url ) ) {
		wp_enqueue_style( 'unique-freelancer-portfolio-google-fonts', $unique_freelancer_portfolio_fonts_url, array(), null );
	}

	wp_enqueue_style( 'dashicons' );

	wp_enqueue_style('bootstrap-style', get_template_directory_uri().'/css/bootstrap.css');

	// Theme stylesheet.
	wp_enqueue_style( 'unique-freelancer-portfolio-style', get_stylesheet_uri(), null, date( 'Ymd-Gis', filemtime( get_template_directory() . '/style.css' ) ) );

	wp_enqueue_style( 'unique-freelancer-portfolio-style', get_stylesheet_uri() );
	wp_style_add_data( 'unique-freelancer-portfolio-style', 'rtl', 'replace' );

	require get_parent_theme_file_path( '/inc/color-palette/custom-color-control.php' );
	wp_add_inline_style( 'unique-freelancer-portfolio-style',$unique_freelancer_portfolio_color_palette_css );

	// Theme block stylesheet.
	wp_enqueue_style( 'unique-freelancer-portfolio-block-style', get_theme_file_uri( '/css/blocks.css' ), array( 'unique-freelancer-portfolio-style' ), '20211006' );
	
	wp_enqueue_script( 'unique-freelancer-portfolio-custom-js', get_template_directory_uri(). '/js/custom.js', array('jquery') ,'',true);
	
	wp_enqueue_script( 'jquery-superfish', get_theme_file_uri( '/js/jquery.superfish.js' ), array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script('bootstrap-js', get_template_directory_uri().'/js/bootstrap.js', array('jquery'), '', true);
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	wp_enqueue_style( 'unique-freelancer-portfolio-style', get_stylesheet_uri() );

	// body
	$unique_freelancer_portfolio_body_font_family = unique_freelancer_portfolio_get_option('unique_freelancer_portfolio_body_font_family');

	// H1
	$unique_freelancer_portfolio_h1_font_family = unique_freelancer_portfolio_get_option('unique_freelancer_portfolio_h1_font_family');
	$unique_freelancer_portfolio_h1_font_size   = unique_freelancer_portfolio_get_option('unique_freelancer_portfolio_h1_font_size');

	// H2
	$unique_freelancer_portfolio_h2_font_family = unique_freelancer_portfolio_get_option('unique_freelancer_portfolio_h2_font_family');
	$unique_freelancer_portfolio_h2_font_size   = unique_freelancer_portfolio_get_option('unique_freelancer_portfolio_h2_font_size');

	// H3
	$unique_freelancer_portfolio_h3_font_family = unique_freelancer_portfolio_get_option('unique_freelancer_portfolio_h3_font_family');
	$unique_freelancer_portfolio_h3_font_size   = unique_freelancer_portfolio_get_option('unique_freelancer_portfolio_h3_font_size');

	// H4
	$unique_freelancer_portfolio_h4_font_family = unique_freelancer_portfolio_get_option('unique_freelancer_portfolio_h4_font_family');
	$unique_freelancer_portfolio_h4_font_size   = unique_freelancer_portfolio_get_option('unique_freelancer_portfolio_h4_font_size');

	// H5
	$unique_freelancer_portfolio_h5_font_family = unique_freelancer_portfolio_get_option('unique_freelancer_portfolio_h5_font_family');
	$unique_freelancer_portfolio_h5_font_size   = unique_freelancer_portfolio_get_option('unique_freelancer_portfolio_h5_font_size');

	// H6
	$unique_freelancer_portfolio_h6_font_family = unique_freelancer_portfolio_get_option('unique_freelancer_portfolio_h6_font_family');
	$unique_freelancer_portfolio_h6_font_size   = unique_freelancer_portfolio_get_option('unique_freelancer_portfolio_h6_font_size');

	$unique_freelancer_portfolio_custom_css = '
		body{
		    font-family: '.esc_html($unique_freelancer_portfolio_body_font_family).';
		}

		h1{
		    font-family: '.esc_html($unique_freelancer_portfolio_h1_font_family).'!important;
		    font-size: '.esc_html($unique_freelancer_portfolio_h1_font_size).'px!important;
		}
		h2{
		    font-family: '.esc_html($unique_freelancer_portfolio_h2_font_family).'!important;
		    font-size: '.esc_html($unique_freelancer_portfolio_h2_font_size).'px!important;
		}
		h3{
		    font-family: '.esc_html($unique_freelancer_portfolio_h3_font_family).'!important;
		    font-size: '.esc_html($unique_freelancer_portfolio_h3_font_size).'px!important;
		}
		h4{
		    font-family: '.esc_html($unique_freelancer_portfolio_h4_font_family).'!important;
		    font-size: '.esc_html($unique_freelancer_portfolio_h4_font_size).'px!important;
		}
		h5{
		    font-family: '.esc_html($unique_freelancer_portfolio_h5_font_family).'!important;
		    font-size: '.esc_html($unique_freelancer_portfolio_h5_font_size).'px!important;
		}
		h6{
		    font-family: '.esc_html($unique_freelancer_portfolio_h6_font_family).'!important;
		    font-size: '.esc_html($unique_freelancer_portfolio_h6_font_size).'px!important;
		}
	';
	wp_add_inline_style('unique-freelancer-portfolio-style', $unique_freelancer_portfolio_custom_css);
}
add_action( 'wp_enqueue_scripts', 'unique_freelancer_portfolio_scripts' );

/*radio button sanitization*/
function unique_freelancer_portfolio_sanitize_choices( $input, $setting ) {
    global $wp_customize;
    $control = $wp_customize->get_control( $setting->id );
    if ( array_key_exists( $input, $control->choices ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}

/**
 * Enqueue styles for the block-based editor.
 *
 * @since Unique Freelancer Portfolio
 */
function unique_freelancer_portfolio_block_editor_styles() {
	// Theme block stylesheet.
	wp_enqueue_style( 'unique-freelancer-portfolio-editor-style', get_template_directory_uri() . '/css/editor-blocks.css', array(), '20101208' );

	$unique_freelancer_portfolio_fonts_url = unique_freelancer_portfolio_fonts_url();
	if ( ! empty( $unique_freelancer_portfolio_fonts_url ) ) {
		wp_enqueue_style( 'unique-freelancer-portfolio-google-fonts', $unique_freelancer_portfolio_fonts_url, array(), null );
	}
}
add_action( 'enqueue_block_editor_assets', 'unique_freelancer_portfolio_block_editor_styles' );

/**
 * Load init.
 */
require_once get_template_directory() . '/inc/init.php';

// Dashboard Admin Info
require get_template_directory() . '/inc/dashboard-admin-info.php';

/**
 *  Webfonts
 */

require_once get_template_directory() . '/inc/wptt-webfont-loader.php';

require_once get_template_directory() . '/inc/recommendations/tgm.php';

require_once get_template_directory() . '/inc/upsell/class-upgrade-pro.php';

require get_template_directory() . '/inc/getting-started/getting-started.php';

require get_template_directory() . '/inc/getting-started/plugin-activation.php';

define('UNIQUE_FREELANCER_PORTFOLIO_DOCUMENTATION',__('https://preview.mizanthemes.com/setup-guide/unique-freelancer-portfolio-free/','unique-freelancer-portfolio'));
define('UNIQUE_FREELANCER_PORTFOLIO_SUPPORT',__('https://wordpress.org/support/theme/unique-freelancer-portfolio/','unique-freelancer-portfolio'));
define('UNIQUE_FREELANCER_PORTFOLIO_REVIEW',__('https://wordpress.org/support/theme/unique-freelancer-portfolio/reviews/','unique-freelancer-portfolio'));
define('UNIQUE_FREELANCER_PORTFOLIO_BUY_NOW',__('https://www.mizanthemes.com/products/portfolio-wordpress-theme','unique-freelancer-portfolio'));
define('UNIQUE_FREELANCER_PORTFOLIO_LIVE_DEMO',__('https://preview.mizanthemes.com/unique-freelancer-portfolio/','unique-freelancer-portfolio'));
define('UNIQUE_FREELANCER_PORTFOLIO_PRO_DOC',__('https://preview.mizanthemes.com/setup-guide/unique-freelancer-portfolio-pro/','unique-freelancer-portfolio'));