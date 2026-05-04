<?php

require_once __DIR__ . '/wp-stubs.php';

/* =========================
   THEME SETUP
========================= */
function bittheme_setup()
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo', array(
        'height' => 80,
        'width'  => 200,
        'flex-height' => true,
        'flex-width'  => true,
    ));
}
add_action('after_setup_theme', 'bittheme_setup');


/* =========================
   ENQUEUE STYLES
========================= */
function bittheme_scripts()
{
    wp_enqueue_style('bittheme-style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'bittheme_scripts');


/* =========================
   CSS VARIABLES
========================= */
function bittheme_dynamic_css_variables()
{
?>
    <style>
        :root {

            /* GLOBAL */
            --announcement-text-color: <?php echo esc_html(get_theme_mod('announcement_text_color', '#fff')); ?>;
            --global-link-color: <?php echo esc_html(get_theme_mod('global_link_color', '#cccccc')); ?>;
            --global-link-hover-color: <?php echo esc_html(get_theme_mod('global_link_hover_color', '#b8b6b6cc')); ?>;
            --global-tagline-color: <?php echo esc_html(get_theme_mod('tagline_color', '#696969')); ?>;
            --menu-font-size: <?php echo esc_html(get_theme_mod('menu_font_size', 16)); ?>px;
            --global-font-family: <?php echo esc_html(get_theme_mod('global_font_family', 'Arial, sans-serif')); ?>;

            /* HEADER */
            --header-bg-color: <?php echo esc_html(get_theme_mod('header_bg_color', '#ffffff')); ?>;

            /* FOOTER */
            --footer-bg-color: <?php echo esc_html(get_theme_mod('footer_bg_color', '#000')); ?>;
            --footer-link-color: <?php echo esc_html(get_theme_mod('footer_link_color', '#cccccc')); ?>;
            --footer-link-hover-color: <?php echo esc_html(get_theme_mod('footer_link_hover_color', '#ffffff')); ?>;
            --footer-font-size: <?php echo esc_html(get_theme_mod('footer_font_size', 14)); ?>px;

            /* LOGO */
            --logo-width: <?php echo esc_html(get_theme_mod('logo_width', 120)); ?>px;
        }
    </style>
<?php
}
add_action('wp_head', 'bittheme_dynamic_css_variables');


/* =========================
   CUSTOMIZER
========================= */
function bittheme_customizer($wp_customize)
{

    /* ================= GLOBAL ================= */
    $wp_customize->add_section('bittheme_global_section', array(
        'title' => 'Global',
        'priority' => 20,
    ));

    // Global Link Color
    $wp_customize->add_setting('announcement_text_color', array(
        'default' => '#fff',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'announcement_text_color',
            array(
                'label' => 'Announcement Bar Text Color',
                'section' => 'bittheme_global_section',
            )
        )
    );

    // Global Link Color
    $wp_customize->add_setting('global_link_color', array(
        'default' => '#cccccc',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'global_link_color',
            array(
                'label' => 'Link Color',
                'section' => 'bittheme_global_section',
            )
        )
    );

    // Global Link Hover Color
    $wp_customize->add_setting('global_link_hover_color', array(
        'default' => '#b8b6b6cc',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'global_link_hover_color',
            array(
                'label' => 'Link Hover Color',
                'section' => 'bittheme_global_section',
            )
        )
    );

    // Tagline Color
    $wp_customize->add_setting('tagline_color', array(
        'default' => '#f21e4e',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'tagline_color',
            array(
                'label' => 'Tagline Color',
                'section' => 'bittheme_global_section',
            )
        )
    );

    // Global Font Size
    $wp_customize->add_setting('menu_font_size', array(
        'default' => 16,
        'sanitize_callback' => 'absint',
    ));

    $wp_customize->add_control('menu_font_size', array(
        'label' => 'Menu Font Size (px)',
        'section' => 'bittheme_global_section',
        'type' => 'number',
    ));

    // Global Font Family
    $wp_customize->add_setting('global_font_family', array(
        'default' => 'Arial, sans-serif',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('global_font_family', array(
        'label' => 'Font Family',
        'section' => 'bittheme_global_section',
        'type' => 'text',
    ));


    /* ================= HEADER ================= */
    $wp_customize->add_section('bittheme_header_section', array(
        'title' => 'Header Settings',
        'priority' => 30,
    ));

    // Header Layout
    $wp_customize->add_setting('header_layout', array(
        'default' => 'left',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('header_layout', array(
        'label' => 'Header Layout',
        'section' => 'bittheme_header_section',
        'type' => 'select',
        'choices' => array(
            'left' => 'Logo Left, Menu Right',
            'center_below' => 'Logo Center, Menu Below',
            'center_left' => 'Logo Center, Menu Left',
            'center_right' => 'Logo Center, Menu Right',
            'right' => 'Logo Right, Menu Left',
        ),
    ));

    // Logo Width
    $wp_customize->add_setting('logo_width', array(
        'default' => 120,
        'sanitize_callback' => 'absint',
    ));

    $wp_customize->add_control('logo_width', array(
        'label' => 'Logo Width',
        'section' => 'bittheme_header_section',
        'type' => 'range',
        'input_attrs' => array(
            'min' => 50,
            'max' => 300,
        ),
    ));

    // Header Background
    $wp_customize->add_setting('header_bg_color', array(
        'default' => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'header_bg_color',
            array(
                'label' => 'Header Background',
                'section' => 'bittheme_header_section',
            )
        )
    );

    // Sticky Header
    $wp_customize->add_setting('header_sticky', array(
        'default' => false,
        'sanitize_callback' => 'wp_validate_boolean',
    ));

    $wp_customize->add_control('header_sticky', array(
        'label' => 'Enable Sticky Header',
        'section' => 'bittheme_header_section',
        'type' => 'checkbox',
    ));

    // Announcement
    $wp_customize->add_setting('announcement_text', array(
        'default' => 'Welcome to bitTheme!',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('announcement_text', array(
        'label' => 'Announcement Text',
        'section' => 'bittheme_header_section',
        'type' => 'text',
    ));

    // Email
    $wp_customize->add_setting('header_email', array(
        'sanitize_callback' => 'sanitize_email',
    ));

    $wp_customize->add_control('header_email', array(
        'label' => 'Email',
        'section' => 'bittheme_header_section',
        'type' => 'email',
    ));

    // Phone
    $wp_customize->add_setting('header_phone', array(
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('header_phone', array(
        'label' => 'Phone',
        'section' => 'bittheme_header_section',
        'type' => 'text',
    ));

    /* ================= FOOTER ================= */
    $wp_customize->add_section('bittheme_footer_section', array(
        'title' => 'Footer',
        'priority' => 40,
    ));

    /* FOOTER TEXT */
    $wp_customize->add_setting('footer_text', array(
        'default' => '© 2026 bitTheme. All rights reserved.',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('footer_text', array(
        'label' => 'Footer Copyright',
        'section' => 'bittheme_footer_section',
        'type' => 'text',
    ));

    /* FOOTER BG COLOR */
    $wp_customize->add_setting('footer_bg_color', array(
        'default' => '#111111',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'footer_bg_color',
            array(
                'label' => 'Footer Background',
                'section' => 'bittheme_footer_section',
            )
        )
    );
    $wp_customize->add_setting('footer_link_color', array(
    'default' => '#cccccc',
    'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'footer_link_color',
            array(
                'label' => 'Footer Text Color',
                'section' => 'bittheme_footer_section',
            )
        )
    );
    $wp_customize->add_setting('footer_link_hover_color', array(
    'default' => '#ffffff',
    'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'footer_link_hover_color',
            array(
                'label' => 'Footer Hover Color',
                'section' => 'bittheme_footer_section',
            )
        )
    );
    $wp_customize->add_setting('footer_font_size', array(
        'default' => 14,
        'sanitize_callback' => 'absint',
    ));

    $wp_customize->add_control('footer_font_size', array(
        'label' => 'Footer Font Size',
        'section' => 'bittheme_footer_section',
        'type' => 'number',
    ));

    /* FOOTER MENUS SELECTION */
    $menus = get_terms('nav_menu', array('hide_empty' => false));
    $menu_choices = array('' => '- Select Menu -');
    
    if (!empty($menus)) {
        foreach ($menus as $menu) {
            $menu_choices[$menu->term_id] = $menu->name;
        }
    }

    // Show Footer Menus
    $wp_customize->add_setting('footer_menus_enable', array(
        'default' => true,
        'sanitize_callback' => 'wp_validate_boolean',
    ));

    $wp_customize->add_control('footer_menus_enable', array(
        'label' => 'Show Footer Menus',
        'section' => 'bittheme_footer_section',
        'type' => 'checkbox',
    ));

    // Footer Menu 1 Selection
    $wp_customize->add_setting('footer_menu_1_select', array(
        'default' => '',
        'sanitize_callback' => 'absint',
    ));

    $wp_customize->add_control('footer_menu_1_select', array(
        'label' => 'Footer Menu 1',
        'section' => 'bittheme_footer_section',
        'type' => 'select',
        'choices' => $menu_choices,
    ));

    // Footer Menu 2 Selection
    $wp_customize->add_setting('footer_menu_2_select', array(
        'default' => '',
        'sanitize_callback' => 'absint',
    ));

    $wp_customize->add_control('footer_menu_2_select', array(
        'label' => 'Footer Menu 2',
        'section' => 'bittheme_footer_section',
        'type' => 'select',
        'choices' => $menu_choices,
    ));

    // Footer Menu 3 Selection
    $wp_customize->add_setting('footer_menu_3_select', array(
        'default' => '',
        'sanitize_callback' => 'absint',
    ));

    $wp_customize->add_control('footer_menu_3_select', array(
        'label' => 'Footer Menu 3',
        'section' => 'bittheme_footer_section',
        'type' => 'select',
        'choices' => $menu_choices,
    ));

    // Footer Menu 4 Selection
    $wp_customize->add_setting('footer_menu_4_select', array(
        'default' => '',
        'sanitize_callback' => 'absint',
    ));

    $wp_customize->add_control('footer_menu_4_select', array(
        'label' => 'Footer Menu 4',
        'section' => 'bittheme_footer_section',
        'type' => 'select',
        'choices' => $menu_choices,
    ));
}
add_action('customize_register', 'bittheme_customizer');


/* =========================
   NAV MENU & FOOTER MENUS
========================= */

function bittheme_menus() {
    register_nav_menus(array(
        'primary-menu' => __('Primary Menu', 'bittheme'),
        'footer-menu-1' => __('Footer Menu 1', 'bittheme'),
        'footer-menu-2' => __('Footer Menu 2', 'bittheme'),
    ));
}
add_action('after_setup_theme', 'bittheme_menus');
?>