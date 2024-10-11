<?php
/**
 * Weight Loss Trainer Theme Customizer
 *
 * @link: https://developer.wordpress.org/themes/customize-api/customizer-objects/
 *
 * @package Weight Loss Trainer
 */

if ( ! defined( 'WEIGHT_LOSS_TRAINER_URL' ) ) {
    define( 'WEIGHT_LOSS_TRAINER_URL', esc_url( 'https://www.themagnifico.net/products/fitness-trainer-wordpress-theme', 'weight-loss-trainer') );
}
if ( ! defined( 'WEIGHT_LOSS_TRAINER_TEXT' ) ) {
    define( 'WEIGHT_LOSS_TRAINER_TEXT', __( 'Weight Loss Trainer Pro','weight-loss-trainer' ));
}
if ( ! defined( 'WEIGHT_LOSS_TRAINER_BUY_TEXT' ) ) {
    define( 'WEIGHT_LOSS_TRAINER_BUY_TEXT', __( 'Buy Weight Loss Trainer Pro','weight-loss-trainer' ));
}

use WPTRT\Customize\Section\Weight_Loss_Trainer_Button;

add_action( 'customize_register', function( $manager ) {

    $manager->register_section_type( Weight_Loss_Trainer_Button::class );

    $manager->add_section(
        new Weight_Loss_Trainer_Button( $manager, 'weight_loss_trainer_pro', [
            'title'       => esc_html( WEIGHT_LOSS_TRAINER_TEXT,'weight-loss-trainer' ),
            'priority'    => 0,
            'button_text' => __( 'GET PREMIUM', 'weight-loss-trainer' ),
            'button_url'  => esc_url( WEIGHT_LOSS_TRAINER_URL )
        ] )
    );

} );

// Load the JS and CSS.
add_action( 'customize_controls_enqueue_scripts', function() {

    $version = wp_get_theme()->get( 'Version' );

    wp_enqueue_script(
        'weight-loss-trainer-customize-section-button',
        get_theme_file_uri( 'vendor/wptrt/customize-section-button/public/js/customize-controls.js' ),
        [ 'customize-controls' ],
        $version,
        true
    );

    wp_enqueue_style(
        'weight-loss-trainer-customize-section-button',
        get_theme_file_uri( 'vendor/wptrt/customize-section-button/public/css/customize-controls.css' ),
        [ 'customize-controls' ],
        $version
    );

} );

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function weight_loss_trainer_customize_register($wp_customize){

    // Pro Version
    class Weight_Loss_Trainer_Customize_Pro_Version extends WP_Customize_Control {
        public $type = 'pro_options';

        public function render_content() {
            echo '<span>' . esc_html('For More','weight-loss-trainer') . ' <strong>' . esc_html($this->label) . '</strong>?</span>';
            echo '<a href="'. esc_url($this->description) .'" target="_blank">';
                echo '<span class="dashicons dashicons-info"></span>';
                echo '<strong> '. esc_html( WEIGHT_LOSS_TRAINER_BUY_TEXT) .'<strong></a>';
            echo '</a>';
        }
    }

    // Custom Controls
    function Weight_Loss_Trainer_sanitize_custom_control( $input ) {
        return $input;
    }

    $wp_customize->get_setting('blogname')->transport = 'postMessage';
    $wp_customize->get_setting('blogdescription')->transport = 'postMessage';

    $wp_customize->add_setting('weight_loss_trainer_logo_title_text', array(
        'default' => true,
        'sanitize_callback' => 'weight_loss_trainer_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'weight_loss_trainer_logo_title_text',array(
        'label'          => __( 'Enable Disable Title', 'weight-loss-trainer' ),
        'section'        => 'title_tagline',
        'settings'       => 'weight_loss_trainer_logo_title_text',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('weight_loss_trainer_theme_description', array(
        'default' => false,
        'sanitize_callback' => 'weight_loss_trainer_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'weight_loss_trainer_theme_description',array(
        'label'          => __( 'Enable Disable Tagline', 'weight-loss-trainer' ),
        'section'        => 'title_tagline',
        'settings'       => 'weight_loss_trainer_theme_description',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('weight_loss_trainer_logo_title_color', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'weight_loss_trainer_logo_title_color', array(
        'label'    => __('Site Title Color', 'weight-loss-trainer'),
        'section'  => 'title_tagline'
    )));

    $wp_customize->add_setting('weight_loss_trainer_logo_tagline_color', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'weight_loss_trainer_logo_tagline_color', array(
        'label'    => __('Site Tagline Color', 'weight-loss-trainer'),
        'section'  => 'title_tagline'
    )));

    // Global Color Settings
     $wp_customize->add_section('weight_loss_trainer_global_color_settings',array(
        'title' => esc_html__('Global Settings','weight-loss-trainer'),
        'priority'   => 28,
    ));

     $wp_customize->add_setting( 'weight_loss_trainer_global_color', array(
        'default' => '#F3C5B8',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'weight_loss_trainer_global_color', array(
        'description' => __('Change the global color of the theme in one click.', 'weight-loss-trainer'),
        'section' => 'weight_loss_trainer_global_color_settings',
        'settings' => 'weight_loss_trainer_global_color',
    )));

    //Typography option
    $weight_loss_trainer_font_array = array(
        ''                       => 'No Fonts',
        'Abril Fatface'          => 'Abril Fatface',
        'Acme'                   => 'Acme',
        'Anton'                  => 'Anton',
        'Architects Daughter'    => 'Architects Daughter',
        'Arimo'                  => 'Arimo',
        'Arsenal'                => 'Arsenal',
        'Arvo'                   => 'Arvo',
        'Alegreya'               => 'Alegreya',
        'Alfa Slab One'          => 'Alfa Slab One',
        'Averia Serif Libre'     => 'Averia Serif Libre',
        'Bangers'                => 'Bangers',
        'Boogaloo'               => 'Boogaloo',
        'Bad Script'             => 'Bad Script',
        'Bitter'                 => 'Bitter',
        'Bree Serif'             => 'Bree Serif',
        'BenchNine'              => 'BenchNine',
        'Cabin'                  => 'Cabin',
        'Cardo'                  => 'Cardo',
        'Courgette'              => 'Courgette',
        'Cherry Swash'           => 'Cherry Swash',
        'Cormorant Garamond'     => 'Cormorant Garamond',
        'Crimson Text'           => 'Crimson Text',
        'Cuprum'                 => 'Cuprum',
        'Cookie'                 => 'Cookie',
        'Chewy'                  => 'Chewy',
        'Days One'               => 'Days One',
        'Dosis'                  => 'Dosis',
        'Droid Sans'             => 'Droid Sans',
        'Economica'              => 'Economica',
        'Fredoka One'            => 'Fredoka One',
        'Fjalla One'             => 'Fjalla One',
        'Francois One'           => 'Francois One',
        'Frank Ruhl Libre'       => 'Frank Ruhl Libre',
        'Gloria Hallelujah'      => 'Gloria Hallelujah',
        'Great Vibes'            => 'Great Vibes',
        'Handlee'                => 'Handlee',
        'Hammersmith One'        => 'Hammersmith One',
        'Inconsolata'            => 'Inconsolata',
        'Indie Flower'           => 'Indie Flower',
        'IM Fell English SC'     => 'IM Fell English SC',
        'Julius Sans One'        => 'Julius Sans One',
        'Josefin Slab'           => 'Josefin Slab',
        'Josefin Sans'           => 'Josefin Sans',
        'Kanit'                  => 'Kanit',
        'Lobster'                => 'Lobster',
        'Lato'                   => 'Lato',
        'Lora'                   => 'Lora',
        'Libre Baskerville'      => 'Libre Baskerville',
        'Lobster Two'            => 'Lobster Two',
        'Merriweather'           => 'Merriweather',
        'Monda'                  => 'Monda',
        'Montserrat'             => 'Montserrat',
        'Muli'                   => 'Muli',
        'Marck Script'           => 'Marck Script',
        'Noto Serif'             => 'Noto Serif',
        'Open Sans'              => 'Open Sans',
        'Overpass'               => 'Overpass',
        'Overpass Mono'          => 'Overpass Mono',
        'Oxygen'                 => 'Oxygen',
        'Orbitron'               => 'Orbitron',
        'Patua One'              => 'Patua One',
        'Pacifico'               => 'Pacifico',
        'Padauk'                 => 'Padauk',
        'Playball'               => 'Playball',
        'Playfair Display'       => 'Playfair Display',
        'PT Sans'                => 'PT Sans',
        'Philosopher'            => 'Philosopher',
        'Permanent Marker'       => 'Permanent Marker',
        'Poiret One'             => 'Poiret One',
        'Quicksand'              => 'Quicksand',
        'Quattrocento Sans'      => 'Quattrocento Sans',
        'Raleway'                => 'Raleway',
        'Rubik'                  => 'Rubik',
        'Roboto'                 => 'Roboto',
        'Rokkitt'                => 'Rokkitt',
        'Russo One'              => 'Russo One',
        'Righteous'              => 'Righteous',
        'Slabo'                  => 'Slabo',
        'Source Sans Pro'        => 'Source Sans Pro',
        'Shadows Into Light Two' => 'Shadows Into Light Two',
        'Shadows Into Light'     => 'Shadows Into Light',
        'Sacramento'             => 'Sacramento',
        'Shrikhand'              => 'Shrikhand',
        'Tangerine'              => 'Tangerine',
        'Ubuntu'                 => 'Ubuntu',
        'VT323'                  => 'VT323',
        'Varela Round'           => 'Varela Round',
        'Vampiro One'            => 'Vampiro One',
        'Vollkorn'               => 'Vollkorn',
        'Volkhov'                => 'Volkhov',
        'Yanone Kaffeesatz'      => 'Yanone Kaffeesatz'
    );

    // Heading Typography
    $wp_customize->add_setting( 'weight_loss_trainer_heading_color', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'weight_loss_trainer_heading_color', array(
        'label' => __('Heading Color', 'weight-loss-trainer'),
        'section' => 'weight_loss_trainer_global_color_settings',
        'settings' => 'weight_loss_trainer_heading_color',
    )));

    $wp_customize->add_setting('weight_loss_trainer_heading_font_family', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'weight_loss_trainer_sanitize_choices',
    ));
    $wp_customize->add_control( 'weight_loss_trainer_heading_font_family', array(
        'section' => 'weight_loss_trainer_global_color_settings',
        'label'   => __('Heading Fonts', 'weight-loss-trainer'),
        'type'    => 'select',
        'choices' => $weight_loss_trainer_font_array,
    ));

    $wp_customize->add_setting('weight_loss_trainer_heading_font_size',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('weight_loss_trainer_heading_font_size',array(
        'label' => esc_html__('Heading Font Size','weight-loss-trainer'),
        'section' => 'weight_loss_trainer_global_color_settings',
        'setting' => 'weight_loss_trainer_heading_font_size',
        'type'  => 'text'
    ));

    // Paragraph Typography
    $wp_customize->add_setting( 'weight_loss_trainer_paragraph_color', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'weight_loss_trainer_paragraph_color', array(
        'label' => __('Paragraph Color', 'weight-loss-trainer'),
        'section' => 'weight_loss_trainer_global_color_settings',
        'settings' => 'weight_loss_trainer_paragraph_color',
    )));

    $wp_customize->add_setting('weight_loss_trainer_paragraph_font_family', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'weight_loss_trainer_sanitize_choices',
    ));
    $wp_customize->add_control( 'weight_loss_trainer_paragraph_font_family', array(
        'section' => 'weight_loss_trainer_global_color_settings',
        'label'   => __('Paragraph Fonts', 'weight-loss-trainer'),
        'type'    => 'select',
        'choices' => $weight_loss_trainer_font_array,
    ));

    $wp_customize->add_setting('weight_loss_trainer_paragraph_font_size',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('weight_loss_trainer_paragraph_font_size',array(
        'label' => esc_html__('Paragraph Font Size','weight-loss-trainer'),
        'section' => 'weight_loss_trainer_global_color_settings',
        'setting' => 'weight_loss_trainer_paragraph_font_size',
        'type'  => 'text'
    ));

    // General Settings
     $wp_customize->add_section('weight_loss_trainer_general_settings',array(
        'title' => esc_html__('General Settings','weight-loss-trainer'),
        'priority'   => 30,
    ));

     $wp_customize->add_setting('weight_loss_trainer_width_option',array(
        'default' => 'Full Width',
        'transport' => 'refresh',
        'sanitize_callback' => 'weight_loss_trainer_sanitize_choices'
    ));
    $wp_customize->add_control('weight_loss_trainer_width_option',array(
        'type' => 'select',
        'section' => 'weight_loss_trainer_general_settings',
        'choices' => array(
            'Full Width' => __('Full Width','weight-loss-trainer'),
            'Wide Width' => __('Wide Width','weight-loss-trainer'),
            'Boxed Width' => __('Boxed Width','weight-loss-trainer')
        ),
    ) );

    $wp_customize->add_setting('weight_loss_trainer_nav_menu_text_transform',array(
        'default'=> 'Uppercase',
        'sanitize_callback' => 'weight_loss_trainer_sanitize_choices'
    ));
    $wp_customize->add_control('weight_loss_trainer_nav_menu_text_transform',array(
        'type' => 'radio',
        'choices' => array(
            'Uppercase' => __('Uppercase','weight-loss-trainer'),
            'Capitalize' => __('Capitalize','weight-loss-trainer'),
            'Lowercase' => __('Lowercase','weight-loss-trainer'),
        ),
        'section'=> 'weight_loss_trainer_general_settings',
    ));

    $wp_customize->add_setting('weight_loss_trainer_preloader_hide', array(
        'default' => 0,
        'sanitize_callback' => 'weight_loss_trainer_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'weight_loss_trainer_preloader_hide',array(
        'label'          => __( 'Show Theme Preloader', 'weight-loss-trainer' ),
        'section'        => 'weight_loss_trainer_general_settings',
        'settings'       => 'weight_loss_trainer_preloader_hide',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting( 'weight_loss_trainer_preloader_bg_color', array(
        'default' => '#F3C5B8',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'weight_loss_trainer_preloader_bg_color', array(
        'label' => esc_html__('Preloader Background Color','weight-loss-trainer'),
        'section' => 'weight_loss_trainer_general_settings',
        'settings' => 'weight_loss_trainer_preloader_bg_color'
    )));

    $wp_customize->add_setting( 'weight_loss_trainer_preloader_dot_1_color', array(
        'default' => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'weight_loss_trainer_preloader_dot_1_color', array(
        'label' => esc_html__('Preloader First Dot Color','weight-loss-trainer'),
        'section' => 'weight_loss_trainer_general_settings',
        'settings' => 'weight_loss_trainer_preloader_dot_1_color'
    )));

    $wp_customize->add_setting( 'weight_loss_trainer_preloader_dot_2_color', array(
        'default' => '#000000',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'weight_loss_trainer_preloader_dot_2_color', array(
        'label' => esc_html__('Preloader Second Dot Color','weight-loss-trainer'),
        'section' => 'weight_loss_trainer_general_settings',
        'settings' => 'weight_loss_trainer_preloader_dot_2_color'
    )));

    $wp_customize->add_setting('weight_loss_trainer_scroll_hide', array(
        'default' => false,
        'sanitize_callback' => 'weight_loss_trainer_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'weight_loss_trainer_scroll_hide',array(
        'label'          => __( 'Show Theme Scroll To Top', 'weight-loss-trainer' ),
        'section'        => 'weight_loss_trainer_general_settings',
        'settings'       => 'weight_loss_trainer_scroll_hide',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('weight_loss_trainer_scroll_top_position',array(
        'default' => 'Right',
        'sanitize_callback' => 'weight_loss_trainer_sanitize_choices'
    ));
    $wp_customize->add_control('weight_loss_trainer_scroll_top_position',array(
        'type' => 'radio',
        'section' => 'weight_loss_trainer_general_settings',
        'choices' => array(
            'Right' => __('Right','weight-loss-trainer'),
            'Left' => __('Left','weight-loss-trainer'),
            'Center' => __('Center','weight-loss-trainer')
        ),
    ) );

    // Product Columns
    $wp_customize->add_setting( 'weight_loss_trainer_products_per_row' , array(
       'default'           => '3',
       'transport'         => 'refresh',
       'sanitize_callback' => 'weight_loss_trainer_sanitize_select',
    ) );

    $wp_customize->add_control('weight_loss_trainer_products_per_row', array(
       'label' => __( 'Product per row', 'weight-loss-trainer' ),
       'section'  => 'weight_loss_trainer_general_settings',
       'type'     => 'select',
       'choices'  => array(
           '2' => '2',
           '3' => '3',
           '4' => '4',
       ),
    ) );

    //Top Header
    $wp_customize->add_section('weight_loss_trainer_top_header',array(
        'title' => esc_html__('Top Header Option','weight-loss-trainer')
    ));

    $wp_customize->add_setting('weight_loss_trainer_topbar_text',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('weight_loss_trainer_topbar_text',array(
        'label' => esc_html__('Topbar Text','weight-loss-trainer'),
        'section' => 'weight_loss_trainer_top_header',
        'setting' => 'weight_loss_trainer_topbar_text',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('weight_loss_trainer_topbar_phone_text',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('weight_loss_trainer_topbar_phone_text',array(
        'label' => esc_html__('Phone Number','weight-loss-trainer'),
        'section' => 'weight_loss_trainer_top_header',
        'setting' => 'weight_loss_trainer_topbar_phone_text',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('weight_loss_trainer_topbar_mail_text',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('weight_loss_trainer_topbar_mail_text',array(
        'label' => esc_html__('Mail Id','weight-loss-trainer'),
        'section' => 'weight_loss_trainer_top_header',
        'setting' => 'weight_loss_trainer_topbar_mail_text',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('weight_loss_trainer_header_button_text',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('weight_loss_trainer_header_button_text',array(
        'label' => esc_html__('Header Button','weight-loss-trainer'),
        'section' => 'weight_loss_trainer_top_header',
        'setting' => 'weight_loss_trainer_header_button_text',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('weight_loss_trainer_header_button_url',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('weight_loss_trainer_header_button_url',array(
        'label' => esc_html__('Header Button Url','weight-loss-trainer'),
        'section' => 'weight_loss_trainer_top_header',
        'setting' => 'weight_loss_trainer_header_button_url',
        'type'  => 'text'
    ));

    //Slider
    $wp_customize->add_section('weight_loss_trainer_top_slider',array(
        'title' => esc_html__('Slider Settings','weight-loss-trainer'),
    ));

    $wp_customize->add_setting('weight_loss_trainer_slider_heading',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('weight_loss_trainer_slider_heading',array(
        'label' => esc_html__('Slider Heading','weight-loss-trainer'),
        'section' => 'weight_loss_trainer_top_slider',
        'setting' => 'weight_loss_trainer_slider_heading',
        'type'  => 'text'
    ));

    for ( $weight_loss_trainer_count = 1; $weight_loss_trainer_count <= 3; $weight_loss_trainer_count++ ) {

        $wp_customize->add_setting( 'weight_loss_trainer_top_slider_page' . $weight_loss_trainer_count, array(
            'default'           => '',
            'sanitize_callback' => 'weight_loss_trainer_sanitize_dropdown_pages'
        ) );
        $wp_customize->add_control( 'weight_loss_trainer_top_slider_page' . $weight_loss_trainer_count, array(
            'label'    => __( 'Select Slide Page', 'weight-loss-trainer' ),
            'description' => __('Slider image size (1400 x 550)','weight-loss-trainer'),
            'section'  => 'weight_loss_trainer_top_slider',
            'type'     => 'dropdown-pages'
        ) );
    }

    // Popular Recipes
    $wp_customize->add_section('weight_loss_trainer_services_section',array(
        'title' => esc_html__('Popular Recipes Option','weight-loss-trainer'),
    ));

    $wp_customize->add_setting('weight_loss_trainer_services_heading',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('weight_loss_trainer_services_heading',array(
        'label' => esc_html__('Popular Short Heading','weight-loss-trainer'),
        'section' => 'weight_loss_trainer_services_section',
        'setting' => 'weight_loss_trainer_services_heading',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('weight_loss_trainer_services_content',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('weight_loss_trainer_services_content',array(
        'label' => esc_html__('Popular Heading','weight-loss-trainer'),
        'section' => 'weight_loss_trainer_services_section',
        'setting' => 'weight_loss_trainer_services_content',
        'type'  => 'text'
    ));

    $categories = get_categories();
    $cat_post = array();
    $cat_post[]= 'select';
    $i = 0;
    foreach($categories as $category){
        if($i==0){
            $default = $category->slug;
            $i++;
        }
        $cat_post[$category->slug] = $category->name;
    }

    $wp_customize->add_setting('weight_loss_trainer_services_sec_category',array(
        'default'   => 'select',
        'sanitize_callback' => 'weight_loss_trainer_sanitize_select',
    ));
    $wp_customize->add_control('weight_loss_trainer_services_sec_category',array(
        'type'    => 'select',
        'choices' => $cat_post,
        'label' => __('Select Category to display Popular Recipes','weight-loss-trainer'),
        'section' => 'weight_loss_trainer_services_section',
    ));

    // Post Settings
     $wp_customize->add_section('weight_loss_trainer_post_settings',array(
        'title' => esc_html__('Post Settings','weight-loss-trainer'),
        'priority'   =>40,
    ));

    $wp_customize->add_setting('weight_loss_trainer_post_page_title',array(
        'sanitize_callback' => 'weight_loss_trainer_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('weight_loss_trainer_post_page_title',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Post Page Title', 'weight-loss-trainer'),
        'section'     => 'weight_loss_trainer_post_settings',
        'description' => esc_html__('Check this box to enable title on post page.', 'weight-loss-trainer'),
    ));

    $wp_customize->add_setting('weight_loss_trainer_post_page_meta',array(
        'sanitize_callback' => 'weight_loss_trainer_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('weight_loss_trainer_post_page_meta',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Post Page Meta', 'weight-loss-trainer'),
        'section'     => 'weight_loss_trainer_post_settings',
        'description' => esc_html__('Check this box to enable meta on post page.', 'weight-loss-trainer'),
    ));

    $wp_customize->add_setting('weight_loss_trainer_post_page_thumb',array(
        'sanitize_callback' => 'weight_loss_trainer_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('weight_loss_trainer_post_page_thumb',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Post Page Thumbnail', 'weight-loss-trainer'),
        'section'     => 'weight_loss_trainer_post_settings',
        'description' => esc_html__('Check this box to enable thumbnail on post page.', 'weight-loss-trainer'),
    ));

    $wp_customize->add_setting('weight_loss_trainer_post_page_content',array(
        'sanitize_callback' => 'weight_loss_trainer_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('weight_loss_trainer_post_page_content',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Post Page Content', 'weight-loss-trainer'),
        'section'     => 'weight_loss_trainer_post_settings',
        'description' => esc_html__('Check this box to enable content on post page.', 'weight-loss-trainer'),
    ));

    $wp_customize->add_setting( 'weight_loss_trainer_single_post_page_image_border_radius', array(
        'default'              => '0',
        'transport'            => 'refresh',
        'sanitize_callback'    => 'weight_loss_trainer_sanitize_number_range'
    ) );
    $wp_customize->add_control( 'weight_loss_trainer_single_post_page_image_border_radius', array(
        'label'       => esc_html__( 'Single Post Page Image Border Radius','weight-loss-trainer' ),
        'section'     => 'weight_loss_trainer_post_settings',
        'type'        => 'range',
        'input_attrs' => array(
            'step'             => 1,
            'min'              => 1,
            'max'              => 50,
        ),
    ) );

    $wp_customize->add_setting( 'weight_loss_trainer_single_post_page_image_box_shadow', array(
        'default'              => '0',
        'transport'            => 'refresh',
        'sanitize_callback'    => 'weight_loss_trainer_sanitize_number_range'
    ) );
    $wp_customize->add_control( 'weight_loss_trainer_single_post_page_image_box_shadow', array(
        'label'       => esc_html__( 'Single Post Page Image Box Shadow','weight-loss-trainer' ),
        'section'     => 'weight_loss_trainer_post_settings',
        'type'        => 'range',
        'input_attrs' => array(
            'step'             => 1,
            'min'              => 1,
            'max'              => 50,
        ),
    ) );

    $wp_customize->add_setting('weight_loss_trainer_single_post_page_content',array(
        'sanitize_callback' => 'weight_loss_trainer_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('weight_loss_trainer_single_post_page_content',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Single Post Page Content', 'weight-loss-trainer'),
        'section'     => 'weight_loss_trainer_post_settings',
        'description' => esc_html__('Check this box to enable content on single post page.', 'weight-loss-trainer'),
    ));

    $wp_customize->add_setting('weight_loss_trainer_single_post_navigation_show_hide',array(
        'default' => true,
        'sanitize_callback' => 'weight_loss_trainer_sanitize_checkbox'
    ));
    $wp_customize->add_control('weight_loss_trainer_single_post_navigation_show_hide',array(
        'type' => 'checkbox',
        'label' => __('Show / Hide Post Navigation','weight-loss-trainer'),
        'section' => 'weight_loss_trainer_post_settings',
    ));
    
    // Footer
    $wp_customize->add_section('weight_loss_trainer_site_footer_section', array(
        'title' => esc_html__('Footer', 'weight-loss-trainer'),
    ));

    $wp_customize->add_setting('weight_loss_trainer_footer_bg_image',array(
        'default'   => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'weight_loss_trainer_footer_bg_image',array(
        'label' => __('Footer Background Image','weight-loss-trainer'),
        'section' => 'weight_loss_trainer_site_footer_section',
        'priority' => 1,
    )));

    $wp_customize->add_setting('weight_loss_trainer_footer_bg_image_position',array(
        'default'=> 'scroll',
        'sanitize_callback' => 'weight_loss_trainer_sanitize_choices'
    ));
    $wp_customize->add_control('weight_loss_trainer_footer_bg_image_position',array(
        'type' => 'select',
        'label' => __('Footer Background Image Position','weight-loss-trainer'),
        'choices' => array(
            'fixed' => __('fixed','weight-loss-trainer'),
            'scroll' => __('scroll','weight-loss-trainer'),
        ),
        'section'=> 'weight_loss_trainer_site_footer_section',
    ));

    $wp_customize->add_setting('weight_loss_trainer_footer_widget_heading_alignment',array(
        'default' => 'Left',
        'transport' => 'refresh',
        'sanitize_callback' => 'weight_loss_trainer_sanitize_choices'
    ));
    $wp_customize->add_control('weight_loss_trainer_footer_widget_heading_alignment',array(
        'type' => 'select',
        'label' => __('Footer Widget Heading Alignment','weight-loss-trainer'),
        'section' => 'weight_loss_trainer_site_footer_section',
        'choices' => array(
            'Left' => __('Left','weight-loss-trainer'),
            'Center' => __('Center','weight-loss-trainer'),
            'Right' => __('Right','weight-loss-trainer')
        ),
    ) );

    $wp_customize->add_setting('weight_loss_trainer_footer_widget_content_alignment',array(
        'default' => 'Left',
        'transport' => 'refresh',
        'sanitize_callback' => 'weight_loss_trainer_sanitize_choices'
    ));
    $wp_customize->add_control('weight_loss_trainer_footer_widget_content_alignment',array(
        'type' => 'select',
        'label' => __('Footer Widget Content Alignment','weight-loss-trainer'),
        'section' => 'weight_loss_trainer_site_footer_section',
        'choices' => array(
            'Left' => __('Left','weight-loss-trainer'),
            'Center' => __('Center','weight-loss-trainer'),
            'Right' => __('Right','weight-loss-trainer')
        ),
    ) );

    $wp_customize->add_setting('weight_loss_trainer_show_hide_copyright',array(
        'default' => true,
        'sanitize_callback' => 'weight_loss_trainer_sanitize_checkbox'
    ));
    $wp_customize->add_control('weight_loss_trainer_show_hide_copyright',array(
        'type' => 'checkbox',
        'label' => __('Show / Hide Copyright','weight-loss-trainer'),
        'section' => 'weight_loss_trainer_site_footer_section',
    ));

    $wp_customize->add_setting('weight_loss_trainer_copyright_background_color', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'weight_loss_trainer_copyright_background_color', array(
        'label'    => __('Copyright Background Color', 'weight-loss-trainer'),
        'section'  => 'weight_loss_trainer_site_footer_section',
    )));

    $wp_customize->add_setting('weight_loss_trainer_footer_text_setting', array(
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('weight_loss_trainer_footer_text_setting', array(
        'label' => __('Replace the footer text', 'weight-loss-trainer'),
        'section' => 'weight_loss_trainer_site_footer_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('weight_loss_trainer_copyright_content_alignment',array(
        'default' => 'Right',
        'transport' => 'refresh',
        'sanitize_callback' => 'weight_loss_trainer_sanitize_choices'
    ));
    $wp_customize->add_control('weight_loss_trainer_copyright_content_alignment',array(
        'type' => 'select',
        'label' => __('Copyright Content Alignment','weight-loss-trainer'),
        'section' => 'weight_loss_trainer_site_footer_section',
        'choices' => array(
            'Left' => __('Left','weight-loss-trainer'),
            'Center' => __('Center','weight-loss-trainer'),
            'Right' => __('Right','weight-loss-trainer')
        ),
    ) );

    // Pro Version
    $wp_customize->add_setting( 'pro_version_footer', array(
        'sanitize_callback' => 'Weight_Loss_Trainer_sanitize_custom_control'
    ));
    $wp_customize->add_control( new Weight_Loss_Trainer_Customize_Pro_Version ( $wp_customize,'pro_version_footer', array(
        'section'     => 'weight_loss_trainer_site_footer_section',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'weight-loss-trainer' ),
        'description' => esc_url( WEIGHT_LOSS_TRAINER_URL ),
        'priority'    => 100
    )));
}
add_action('customize_register', 'weight_loss_trainer_customize_register');

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function weight_loss_trainer_customize_partial_blogname(){
    bloginfo('name');
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function weight_loss_trainer_customize_partial_blogdescription(){
    bloginfo('description');
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function weight_loss_trainer_customize_preview_js(){
    wp_enqueue_script('weight-loss-trainer-customizer', esc_url(get_template_directory_uri()) . '/assets/js/customizer.js', array('customize-preview'), '20151215', true);
}
add_action('customize_preview_init', 'weight_loss_trainer_customize_preview_js');

/*
** Load dynamic logic for the customizer controls area.
*/
function weight_loss_trainer_panels_js() {
    wp_enqueue_style( 'weight-loss-trainer-customizer-layout-css', get_theme_file_uri( '/assets/css/customizer-layout.css' ) );
    wp_enqueue_script( 'weight-loss-trainer-customize-layout', get_theme_file_uri( '/assets/js/customize-layout.js' ), array(), '1.2', true );
}
add_action( 'customize_controls_enqueue_scripts', 'weight_loss_trainer_panels_js' );