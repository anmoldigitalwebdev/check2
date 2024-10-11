<?php

    $weight_loss_trainer_theme_css= "";

    /*--------------------------- Scroll to top positions -------------------*/

    $weight_loss_trainer_scroll_position = get_theme_mod( 'weight_loss_trainer_scroll_top_position','Right');
    if($weight_loss_trainer_scroll_position == 'Right'){
        $weight_loss_trainer_theme_css .='#button{';
            $weight_loss_trainer_theme_css .='right: 20px;';
        $weight_loss_trainer_theme_css .='}';
    }else if($weight_loss_trainer_scroll_position == 'Left'){
        $weight_loss_trainer_theme_css .='#button{';
            $weight_loss_trainer_theme_css .='left: 20px;';
        $weight_loss_trainer_theme_css .='}';
    }else if($weight_loss_trainer_scroll_position == 'Center'){
        $weight_loss_trainer_theme_css .='#button{';
            $weight_loss_trainer_theme_css .='right: 50%;left: 50%;';
        $weight_loss_trainer_theme_css .='}';
    }

    /*---------------- Single post Settings ------------------*/

    $weight_loss_trainer_single_post_navigation_show_hide = get_theme_mod('weight_loss_trainer_single_post_navigation_show_hide',true);
    if($weight_loss_trainer_single_post_navigation_show_hide != true){
        $weight_loss_trainer_theme_css .='.nav-links{';
            $weight_loss_trainer_theme_css .='display: none;';
        $weight_loss_trainer_theme_css .='}';
    }

    /*--------------------------- Copyright Background Color -------------------*/

    $weight_loss_trainer_copyright_background_color = get_theme_mod('weight_loss_trainer_copyright_background_color');
    if($weight_loss_trainer_copyright_background_color != false){
        $weight_loss_trainer_theme_css .='.footer_info{';
            $weight_loss_trainer_theme_css .='background-color: '.esc_attr($weight_loss_trainer_copyright_background_color).' !important;';
        $weight_loss_trainer_theme_css .='}';
    }

    /*--------------------------- Site Title And Tagline Color -------------------*/

    $weight_loss_trainer_logo_title_color = get_theme_mod('weight_loss_trainer_logo_title_color');
    if($weight_loss_trainer_logo_title_color != false){
        $weight_loss_trainer_theme_css .='p.site-title a, .navbar-brand a{';
            $weight_loss_trainer_theme_css .='color: '.esc_attr($weight_loss_trainer_logo_title_color).' !important;';
        $weight_loss_trainer_theme_css .='}';
    }

    $weight_loss_trainer_logo_tagline_color = get_theme_mod('weight_loss_trainer_logo_tagline_color');
    if($weight_loss_trainer_logo_tagline_color != false){
        $weight_loss_trainer_theme_css .='.logo p.site-description, .navbar-brand p{';
            $weight_loss_trainer_theme_css .='color: '.esc_attr($weight_loss_trainer_logo_tagline_color).'  !important;';
        $weight_loss_trainer_theme_css .='}';
    }

    /*--------------------------- Single Post Page Image Box Shadow -------------------*/

    $weight_loss_trainer_single_post_page_image_box_shadow = get_theme_mod('weight_loss_trainer_single_post_page_image_box_shadow',0);
    if($weight_loss_trainer_single_post_page_image_box_shadow != false){
        $weight_loss_trainer_theme_css .='.single-post .entry-header img{';
            $weight_loss_trainer_theme_css .='box-shadow: '.esc_attr($weight_loss_trainer_single_post_page_image_box_shadow).'px '.esc_attr($weight_loss_trainer_single_post_page_image_box_shadow).'px '.esc_attr($weight_loss_trainer_single_post_page_image_box_shadow).'px #cccccc;';
        $weight_loss_trainer_theme_css .='}';
    }

     /*--------------------------- Single Post Page Image Border Radius -------------------*/

    $weight_loss_trainer_single_post_page_image_border_radius = get_theme_mod('weight_loss_trainer_single_post_page_image_border_radius', 0);
    if($weight_loss_trainer_single_post_page_image_border_radius != false){
        $weight_loss_trainer_theme_css .='.single-post .entry-header img{';
            $weight_loss_trainer_theme_css .='border-radius: '.esc_attr($weight_loss_trainer_single_post_page_image_border_radius).'px;';
        $weight_loss_trainer_theme_css .='}';
    }

    /*--------------------------- Footer background image -------------------*/

    $weight_loss_trainer_footer_bg_image = get_theme_mod('weight_loss_trainer_footer_bg_image');
    if($weight_loss_trainer_footer_bg_image != false){
        $weight_loss_trainer_theme_css .='#colophon{';
            $weight_loss_trainer_theme_css .='background: url('.esc_attr($weight_loss_trainer_footer_bg_image).')!important;';
        $weight_loss_trainer_theme_css .='}';
    }

    /*--------------------------- Footer Background Image Position -------------------*/

    $weight_loss_trainer_footer_bg_image_position = get_theme_mod( 'weight_loss_trainer_footer_bg_image_position','scroll');
    if($weight_loss_trainer_footer_bg_image_position == 'fixed'){
        $weight_loss_trainer_theme_css .='#colophon{';
            $weight_loss_trainer_theme_css .='background-attachment: fixed !important; background-position: center !important;';
        $weight_loss_trainer_theme_css .='}';
    }elseif ($weight_loss_trainer_footer_bg_image_position == 'scroll'){
        $weight_loss_trainer_theme_css .='#colophon{';
            $weight_loss_trainer_theme_css .='background-attachment: scroll !important; background-position: center !important;';
        $weight_loss_trainer_theme_css .='}';
    }

    /*--------------------------- Footer Widget Heading Alignment -------------------*/

    $weight_loss_trainer_footer_widget_heading_alignment = get_theme_mod( 'weight_loss_trainer_footer_widget_heading_alignment','Left');
    if($weight_loss_trainer_footer_widget_heading_alignment == 'Left'){
        $weight_loss_trainer_theme_css .='#colophon h5, h5.footer-column-widget-title{';
        $weight_loss_trainer_theme_css .='text-align: left;';
        $weight_loss_trainer_theme_css .='}';
    }else if($weight_loss_trainer_footer_widget_heading_alignment == 'Center'){
        $weight_loss_trainer_theme_css .='#colophon h5, h5.footer-column-widget-title{';
            $weight_loss_trainer_theme_css .='text-align: center;';
        $weight_loss_trainer_theme_css .='}';
    }else if($weight_loss_trainer_footer_widget_heading_alignment == 'Right'){
        $weight_loss_trainer_theme_css .='#colophon h5, h5.footer-column-widget-title{';
            $weight_loss_trainer_theme_css .='text-align: right;';
        $weight_loss_trainer_theme_css .='}';
    }

    /*--------------------------- Footer Widget Content Alignment -------------------*/

    $weight_loss_trainer_footer_widget_content_alignment = get_theme_mod( 'weight_loss_trainer_footer_widget_content_alignment','Left');
    if($weight_loss_trainer_footer_widget_content_alignment == 'Left'){
        $weight_loss_trainer_theme_css .='#colophon ul, #colophon p, .tagcloud, .widget{';
        $weight_loss_trainer_theme_css .='text-align: left;';
        $weight_loss_trainer_theme_css .='}';
    }else if($weight_loss_trainer_footer_widget_content_alignment == 'Center'){
        $weight_loss_trainer_theme_css .='#colophon ul, #colophon p, .tagcloud, .widget{';
            $weight_loss_trainer_theme_css .='text-align: center;';
        $weight_loss_trainer_theme_css .='}';
    }else if($weight_loss_trainer_footer_widget_content_alignment == 'Right'){
        $weight_loss_trainer_theme_css .='#colophon ul, #colophon p, .tagcloud, .widget{';
            $weight_loss_trainer_theme_css .='text-align: right;';
        $weight_loss_trainer_theme_css .='}';
    }

    /*--------------------------- Copyright Content Alignment -------------------*/

    $weight_loss_trainer_copyright_content_alignment = get_theme_mod( 'weight_loss_trainer_copyright_content_alignment','Right');
    if($weight_loss_trainer_copyright_content_alignment == 'Left'){
        $weight_loss_trainer_theme_css .='.footer-menu-left{';
        $weight_loss_trainer_theme_css .='text-align: left;';
        $weight_loss_trainer_theme_css .='}';
    }else if($weight_loss_trainer_copyright_content_alignment == 'Center'){
        $weight_loss_trainer_theme_css .='.footer-menu-left{';
            $weight_loss_trainer_theme_css .='text-align: center;';
        $weight_loss_trainer_theme_css .='}';
    }else if($weight_loss_trainer_copyright_content_alignment == 'Right'){
        $weight_loss_trainer_theme_css .='.footer-menu-left{';
            $weight_loss_trainer_theme_css .='text-align: right;';
        $weight_loss_trainer_theme_css .='}';
    }

    /*---------------------------Width Layout -------------------*/

    $weight_loss_trainer_width_option = get_theme_mod( 'weight_loss_trainer_width_option','Full Width');
    if($weight_loss_trainer_width_option == 'Boxed Width'){
        $weight_loss_trainer_theme_css .='body{';
            $weight_loss_trainer_theme_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
        $weight_loss_trainer_theme_css .='}';
        $weight_loss_trainer_theme_css .='.scrollup i{';
            $weight_loss_trainer_theme_css .='right: 100px;';
        $weight_loss_trainer_theme_css .='}';
        $weight_loss_trainer_theme_css .='.page-template-custom-home-page .home-page-header{';
            $weight_loss_trainer_theme_css .='padding: 0px 40px 0 10px;';
        $weight_loss_trainer_theme_css .='}';
    }else if($weight_loss_trainer_width_option == 'Wide Width'){
        $weight_loss_trainer_theme_css .='body{';
            $weight_loss_trainer_theme_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
        $weight_loss_trainer_theme_css .='}';
        $weight_loss_trainer_theme_css .='.scrollup i{';
            $weight_loss_trainer_theme_css .='right: 30px;';
        $weight_loss_trainer_theme_css .='}';
    }else if($weight_loss_trainer_width_option == 'Full Width'){
        $weight_loss_trainer_theme_css .='body{';
            $weight_loss_trainer_theme_css .='max-width: 100%;';
        $weight_loss_trainer_theme_css .='}';
    }

    /*------------------ Nav Menus -------------------*/

    $weight_loss_trainer_nav_menu = get_theme_mod( 'weight_loss_trainer_nav_menu_text_transform','Uppercase');
    if($weight_loss_trainer_nav_menu == 'Capitalize'){
        $weight_loss_trainer_theme_css .='.main-navigation .menu > li > a{';
            $weight_loss_trainer_theme_css .='text-transform:Capitalize;';
        $weight_loss_trainer_theme_css .='}';
    }
    if($weight_loss_trainer_nav_menu == 'Lowercase'){
        $weight_loss_trainer_theme_css .='.main-navigation .menu > li > a{';
            $weight_loss_trainer_theme_css .='text-transform:Lowercase;';
        $weight_loss_trainer_theme_css .='}';
    }
    if($weight_loss_trainer_nav_menu == 'Uppercase'){
        $weight_loss_trainer_theme_css .='.main-navigation .menu > li > a{';
            $weight_loss_trainer_theme_css .='text-transform:Uppercase;';
        $weight_loss_trainer_theme_css .='}';
    }

    /*-------------------- Global First Color -------------------*/

    $weight_loss_trainer_global_color = get_theme_mod('weight_loss_trainer_global_color');

    if($weight_loss_trainer_global_color != false){
        $weight_loss_trainer_theme_css .='#button, .top-info, span.head-btn a, .slider-inner-box h2, #top-slider .slide-btn a, .featured h3.main-heading, .feature-img ul.post-categories li, .main-navigation .sub-menu > li > a:hover, .main-navigation .sub-menu > li > a:focus, .main-navigation .sub-menu, .page-content input.search-submit.btn.btn-primary, .sidebar input[type="submit"], .sidebar button[type="submit"], a.btn-text, span.onsale, .pro-button a, .woocommerce:where(body:not(.woocommerce-block-theme-has-button-styles)) button.button.alt.disabled, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce input.button.alt,.woocommerce a.added_to_cart, .woocommerce ul.products li.product .onsale, .woocommerce span.onsale, .woocommerce .woocommerce-ordering select, .woocommerce-account .woocommerce-MyAccount-navigation ul li, .post-navigation .nav-previous a:hover, .post-navigation .nav-next a:hover, .posts-navigation .nav-previous a:hover, .posts-navigation .nav-next a:hover, .navigation.pagination .nav-links a.current, .navigation.pagination .nav-links a:hover, .navigation.pagination .nav-links span.current, .navigation.pagination .nav-links span:hover, .comment-respond input#submit, #colophon, .sidebar h5, .sidebar .tagcloud a:hover, p.wp-block-tag-cloud a:hover{';
            $weight_loss_trainer_theme_css .='background-color: '.esc_attr($weight_loss_trainer_global_color).';';
        $weight_loss_trainer_theme_css .='}';
    }

    if($weight_loss_trainer_global_color != false){
        $weight_loss_trainer_theme_css .='.main-navigation .menu > li > a:hover, #site-navigation .menu ul li a:hover, .article-box h3 a, p.price, .woocommerce ul.products li.product .price, .woocommerce div.product p.price, .woocommerce div.product span.price, .woocommerce-message::before, .woocommerce-info::before, .widget a:hover, .widget a:focus, .sidebar ul li a:hover{';
            $weight_loss_trainer_theme_css .='color: '.esc_attr($weight_loss_trainer_global_color).';';
        $weight_loss_trainer_theme_css .='}';
    }

    if($weight_loss_trainer_global_color != false){
        $weight_loss_trainer_theme_css .='.postcat-name{';
            $weight_loss_trainer_theme_css .='color: '.esc_attr($weight_loss_trainer_global_color).' !important;';
        $weight_loss_trainer_theme_css .='}';
    }

    if($weight_loss_trainer_global_color != false){
        $weight_loss_trainer_theme_css .='.page-content input.search-submit.btn.btn-primary, .post-navigation .nav-previous a:hover, .post-navigation .nav-next a:hover, .posts-navigation .nav-previous a:hover, .posts-navigation .nav-next a:hover, .navigation.pagination .nav-links a.current, .navigation.pagination .nav-links a:hover, .navigation.pagination .nav-links span.current, .navigation.pagination .nav-links span:hover{';
            $weight_loss_trainer_theme_css .='border-color: '.esc_attr($weight_loss_trainer_global_color).';';
        $weight_loss_trainer_theme_css .='}';
    }

    if($weight_loss_trainer_global_color != false){
        $weight_loss_trainer_theme_css .='.woocommerce-message, .woocommerce-info{';
            $weight_loss_trainer_theme_css .='border-top-color: '.esc_attr($weight_loss_trainer_global_color).';';
        $weight_loss_trainer_theme_css .='}';
    }

    $weight_loss_trainer_theme_css .='@media screen and (max-width:1000px) {';
        if($weight_loss_trainer_global_color != false){
            $weight_loss_trainer_theme_css .='.toggle-nav i, .sidenav .closebtn{
            background: '.esc_attr($weight_loss_trainer_global_color).';
            }';
        }
    $weight_loss_trainer_theme_css .='}';

    /*-------------------- Heading typography -------------------*/

    $weight_loss_trainer_heading_color = get_theme_mod('weight_loss_trainer_heading_color');
    $weight_loss_trainer_heading_font_family = get_theme_mod('weight_loss_trainer_heading_font_family');
    $weight_loss_trainer_heading_font_size = get_theme_mod('weight_loss_trainer_heading_font_size');
    if($weight_loss_trainer_heading_color != false || $weight_loss_trainer_heading_font_family != false || $weight_loss_trainer_heading_font_size != false){
        $weight_loss_trainer_theme_css .='h1, h2, h3, h4, h5, h6, .navbar-brand h1.site-title, h2.entry-title, h1.entry-title, h2.page-title, #latest_post h2, h2.woocommerce-loop-product__title, #colophon h5, .sidebar h5, .article-box h3.entry-title, .slider-inner-box h1 a, .slider-inner-box h2, #top-slider .slider-inner-box h3, .featured h3.main-heading, .service-sec h3.main-heading, .ser-content h4 a, .featured h4.main-heading, .ser-content h6.heading{';
            $weight_loss_trainer_theme_css .='color: '.esc_attr($weight_loss_trainer_heading_color).'!important; 
            font-family: '.esc_attr($weight_loss_trainer_heading_font_family).'!important;
            font-size: '.esc_attr($weight_loss_trainer_heading_font_size).'px !important;';
        $weight_loss_trainer_theme_css .='}';
    }

    $weight_loss_trainer_paragraph_color = get_theme_mod('weight_loss_trainer_paragraph_color');
    $weight_loss_trainer_paragraph_font_family = get_theme_mod('weight_loss_trainer_paragraph_font_family');
    $weight_loss_trainer_paragraph_font_size = get_theme_mod('weight_loss_trainer_paragraph_font_size');
    if($weight_loss_trainer_paragraph_color != false || $weight_loss_trainer_paragraph_font_family != false || $weight_loss_trainer_paragraph_font_size != false){
        $weight_loss_trainer_theme_css .='p, p.site-title, span, .article-box p, ul, li{';
            $weight_loss_trainer_theme_css .='color: '.esc_attr($weight_loss_trainer_paragraph_color).'!important; 
            font-family: '.esc_attr($weight_loss_trainer_paragraph_font_family).'!important;
            font-size: '.esc_attr($weight_loss_trainer_paragraph_font_size).'px !important;';
        $weight_loss_trainer_theme_css .='}';
    }