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
    
    // Owl Carousel CDN
    wp_enqueue_style('owl-carousel-css', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css');
    wp_enqueue_style('owl-carousel-theme', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css');
    wp_enqueue_script('owl-carousel-js', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js', array('jquery'), null, true);
    
    // Custom Theme JS
    wp_enqueue_script('bittheme-script', get_template_directory_uri() . '/assets/js/theme.js', array('jquery', 'owl-carousel-js'), null, true);
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
            --heading-color: <?php echo esc_html(get_theme_mod('heading_color', '#000')); ?>;
            --body-text-color: <?php echo esc_html(get_theme_mod('body_text_color', '#333')); ?>;

            /* HEADER */
            --header-bg-color: <?php echo esc_html(get_theme_mod('header_bg_color', '#ffffff')); ?>;

            /* FOOTER */
            --footer-bg-color: <?php echo esc_html(get_theme_mod('footer_bg_color', '#000')); ?>;
            --footer-link-color: <?php echo esc_html(get_theme_mod('footer_link_color', '#cccccc')); ?>;
            --footer-link-hover-color: <?php echo esc_html(get_theme_mod('footer_link_hover_color', '#ffffff')); ?>;
            --footer-font-size: <?php echo esc_html(get_theme_mod('footer_font_size', 14)); ?>px;

            /* BUTTONS */
            --primary-button-bg: <?php echo esc_html(get_theme_mod('primary_button_bg', '#000000')); ?>;
            --primary-button-text-color: <?php echo esc_html(get_theme_mod('primary_button_text_color', '#ffffff')); ?>;
            --primary-button-hover-bg: <?php echo esc_html(get_theme_mod('primary_button_hover_bg', '#333333')); ?>;
            --primary-button-hover-text-color: <?php echo esc_html(get_theme_mod('primary_button_hover_text_color', '#ffffff')); ?>;
            --primary-button-padding: <?php echo esc_html(get_theme_mod('primary_button_padding', '10px 20px')); ?>;

            --secondary-button-bg: <?php echo esc_html(get_theme_mod('secondary_button_bg', '#ffffff')); ?>;
            --secondary-button-text-color: <?php echo esc_html(get_theme_mod('secondary_button_text_color', '#000000')); ?>;
            --secondary-button-hover-bg: <?php echo esc_html(get_theme_mod('secondary_button_hover_bg', '#f1f1f1')); ?>;
            --secondary-button-hover-text-color: <?php echo esc_html(get_theme_mod('secondary_button_hover_text_color', '#000000')); ?>;
            --secondary-button-padding: <?php echo esc_html(get_theme_mod('secondary_button_padding', '10px 20px')); ?>;

            --button-border-radius: <?php echo esc_html(get_theme_mod('button_border_radius', 4)); ?>px;

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

    // Global Heading Color
    $wp_customize->add_setting('heading_color', array(
        'default' => '#fff',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'heading_color',
            array(
                'label' => 'Heading Color',
                'section' => 'bittheme_global_section',
            )
        )
    );
    // Global Body Text Color
    $wp_customize->add_setting('body_text_color', array(
        'default' => '#333',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'body_text_color',
            array(
                'label' => 'Body Text Color',
                'section' => 'bittheme_global_section',
            )
        )
    );



    /* ================= BUTTON STYLES ================= */
    $wp_customize->add_setting('primary_button_bg', array(
        'default' => '#000000',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'primary_button_bg',
            array(
                'label' => 'Primary Button Background',
                'section' => 'bittheme_global_section',
            )
        )
    );

    $wp_customize->add_setting('primary_button_text_color', array(
        'default' => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'primary_button_text_color',
            array(
                'label' => 'Primary Button Text Color',
                'section' => 'bittheme_global_section',
            )
        )
    );

    $wp_customize->add_setting('primary_button_hover_bg', array(
        'default' => '#333333',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'primary_button_hover_bg',
            array(
                'label' => 'Primary Button Hover Background',
                'section' => 'bittheme_global_section',
            )
        )
    );

    $wp_customize->add_setting('primary_button_hover_text_color', array(
        'default' => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'primary_button_hover_text_color',
            array(
                'label' => 'Primary Button Hover Text Color',
                'section' => 'bittheme_global_section',
            )
        )
    );

    $wp_customize->add_setting('primary_button_padding', array(
        'default' => '10px 20px',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('primary_button_padding', array(
        'label' => 'Primary Button Padding',
        'section' => 'bittheme_global_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('secondary_button_bg', array(
        'default' => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'secondary_button_bg',
            array(
                'label' => 'Secondary Button Background',
                'section' => 'bittheme_global_section',
            )
        )
    );

    $wp_customize->add_setting('secondary_button_text_color', array(
        'default' => '#000000',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'secondary_button_text_color',
            array(
                'label' => 'Secondary Button Text Color',
                'section' => 'bittheme_global_section',
            )
        )
    );

    $wp_customize->add_setting('secondary_button_hover_bg', array(
        'default' => '#f1f1f1',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'secondary_button_hover_bg',
            array(
                'label' => 'Secondary Button Hover Background',
                'section' => 'bittheme_global_section',
            )
        )
    );

    $wp_customize->add_setting('secondary_button_hover_text_color', array(
        'default' => '#000000',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'secondary_button_hover_text_color',
            array(
                'label' => 'Secondary Button Hover Text Color',
                'section' => 'bittheme_global_section',
            )
        )
    );

    $wp_customize->add_setting('secondary_button_padding', array(
        'default' => '10px 20px',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('secondary_button_padding', array(
        'label' => 'Secondary Button Padding',
        'section' => 'bittheme_global_section',
        'type' => 'text',
    ));

    // Button Border Radius
    $wp_customize->add_setting('button_border_radius', array(
        'default' => 4,
        'sanitize_callback' => 'absint',
    ));
    $wp_customize->add_control('button_border_radius', array(
        'label' => 'Button Border Radius (px)',
        'section' => 'bittheme_global_section',
        'type' => 'number',
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

function bittheme_menus()
{
    register_nav_menus(array(
        'primary-menu' => __('Primary Menu', 'bittheme'),
        'footer-menu-1' => __('Footer Menu 1', 'bittheme'),
        'footer-menu-2' => __('Footer Menu 2', 'bittheme'),
    ));
}
add_action('after_setup_theme', 'bittheme_menus');




/* =========================
   SLIDER
========================= */
function bytetheme_slider_cpt()
{

    register_post_type('bytetheme_slider', array(
        'labels' => array(
            'name' => 'Sliders',
            'singular_name' => 'Slider',
            'add_new' => 'Add Slider',
            'add_new_item' => 'Add New Slider',
            'search_items' => 'Search Sliders',
            'edit_item' => 'Edit Slider',
            'not_found' => 'No Slider Found',
            'not_found_in_trash' => 'No Slider Found in Trash',
        ),
        'public' => true,
        'menu_icon' => 'dashicons-images-alt2',
        'supports' => array('title'),
        'show_in_rest' => true,
    ));
}
add_action('init', 'bytetheme_slider_cpt');


/* =========================
   SLIDER META BOX
========================= */
function bytetheme_slider_meta_box()
{
    add_meta_box(
        'bytetheme_slider_meta',
        'Slider Slides',
        'bytetheme_slider_fields_html',
        'bytetheme_slider',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'bytetheme_slider_meta_box');

function bytetheme_slider_admin_assets($hook)
{
    global $post;

    if ($post && $post->post_type === 'bytetheme_slider') {
        wp_enqueue_media();
        wp_enqueue_style('bittheme-admin-styles', get_template_directory_uri() . '/assets/css/admin.css', array(), null);
    }
}
add_action('admin_enqueue_scripts', 'bytetheme_slider_admin_assets');

function bytetheme_save_slider_meta($post_id)
{
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (
        !isset($_POST['bytetheme_slider_nonce']) ||
        !wp_verify_nonce($_POST['bytetheme_slider_nonce'], 'bytetheme_slider_nonce_action')
    ) {
        return;
    }

    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    if (isset($_POST['slides']) && is_array($_POST['slides'])) {
        $clean = [];

        foreach ($_POST['slides'] as $slide) {
            $clean[] = [
                'image'     => esc_url_raw($slide['image'] ?? ''),
                'heading'   => sanitize_text_field($slide['heading'] ?? ''),
                'text'      => sanitize_textarea_field($slide['text'] ?? ''),
                'btn1_text' => sanitize_text_field($slide['btn1_text'] ?? ''),
                'btn1_link' => esc_url_raw($slide['btn1_link'] ?? ''),
                'btn2_text' => sanitize_text_field($slide['btn2_text'] ?? ''),
                'btn2_link' => esc_url_raw($slide['btn2_link'] ?? ''),
            ];
        }

        update_post_meta($post_id, 'slider_slides', $clean);
    } else {
        delete_post_meta($post_id, 'slider_slides');
    }
}
add_action('save_post', 'bytetheme_save_slider_meta');

function bytetheme_slider_fields_html($post)
{
    wp_nonce_field('bytetheme_slider_nonce_action', 'bytetheme_slider_nonce');

    $slides = get_post_meta($post->ID, 'slider_slides', true);
    if (!is_array($slides) || empty($slides)) {
        $slides = [[
            'image' => '',
            'heading' => '',
            'text' => '',
            'btn1_text' => '',
            'btn1_link' => '',
            'btn2_text' => '',
            'btn2_link' => '',
        ]];
    }
?>

    <div id="bytetheme-slider-repeater">
        <?php foreach ($slides as $index => $slide): ?>
            <div class="bytetheme-slider-slide" data-index="<?php echo esc_attr($index); ?>">
                <h4 class="slide-number">Slide <?php echo $index + 1; ?></h4>

                <p>
                    <label>Image URL</label><br>
                    <input type="text" class="bytetheme-slide-image" name="slides[<?php echo esc_attr($index); ?>][image]" value="<?php echo esc_attr($slide['image'] ?? ''); ?>" />
                    <button type="button" class="button upload-slide-image">Upload</button>
                </p>

                <p>
                    <label>Heading</label><br>
                    <input type="text" name="slides[<?php echo esc_attr($index); ?>][heading]" value="<?php echo esc_attr($slide['heading'] ?? ''); ?>" />
                </p>

                <p>
                    <label>Text</label><br>
                    <textarea name="slides[<?php echo esc_attr($index); ?>][text]"><?php echo esc_textarea($slide['text'] ?? ''); ?></textarea>
                </p>

                <p>
                    <label>Button 1 Text</label><br>
                    <input type="text" name="slides[<?php echo esc_attr($index); ?>][btn1_text]" value="<?php echo esc_attr($slide['btn1_text'] ?? ''); ?>" />
                </p>

                <p>
                    <label>Button 1 Link</label><br>
                    <input type="text" name="slides[<?php echo esc_attr($index); ?>][btn1_link]" value="<?php echo esc_attr($slide['btn1_link'] ?? ''); ?>" />
                </p>

                <p>
                    <label>Button 2 Text</label><br>
                    <input type="text" name="slides[<?php echo esc_attr($index); ?>][btn2_text]" value="<?php echo esc_attr($slide['btn2_text'] ?? ''); ?>" />
                </p>

                <p>
                    <label>Button 2 Link</label><br>
                    <input type="text" name="slides[<?php echo esc_attr($index); ?>][btn2_link]" value="<?php echo esc_attr($slide['btn2_link'] ?? ''); ?>" />
                </p>

                <button type="button" class="button remove-slide">Remove Slide</button>
            </div>
        <?php endforeach; ?>
    </div>

    <p>
        <button type="button" class="button add-slide">Add Slide</button>
    </p>

    <script type="text/html" id="bytetheme-slider-template">
        <div class="bytetheme-slider-slide" data-index="{{index}}">
            <h4 class="slide-number">Slide {{number}}</h4>

            <p>
                <label>Image URL</label><br>
                <input type="text" class="bytetheme-slide-image" name="slides[{{index}}][image]" value="" />
                <button type="button" class="button upload-slide-image">Upload</button>
            </p>

            <p>
                <label>Heading</label><br>
                <input type="text" name="slides[{{index}}][heading]" value="" />
            </p>

            <p>
                <label>Text</label><br>
                <textarea name="slides[{{index}}][text]"></textarea>
            </p>

            <p>
                <label>Button 1 Text</label><br>
                <input type="text" name="slides[{{index}}][btn1_text]" value="" />
            </p>

            <p>
                <label>Button 1 Link</label><br>
                <input type="text" name="slides[{{index}}][btn1_link]" value="" />
            </p>

            <p>
                <label>Button 2 Text</label><br>
                <input type="text" name="slides[{{index}}][btn2_text]" value="" />
            </p>

            <p>
                <label>Button 2 Link</label><br>
                <input type="text" name="slides[{{index}}][btn2_link]" value="" />
            </p>

            <button type="button" class="button remove-slide">Remove Slide</button>
        </div>
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var container = document.getElementById('bytetheme-slider-repeater');
            var template = document.getElementById('bytetheme-slider-template').innerHTML;
            var addButton = document.querySelector('.add-slide');

            function updateSlideNumbers() {
                var slides = container.querySelectorAll('.bytetheme-slider-slide');
                slides.forEach(function(slide, index) {
                    slide.dataset.index = index;
                    slide.querySelector('.slide-number').textContent = 'Slide ' + (index + 1);
                    slide.querySelectorAll('[name]').forEach(function(field) {
                        field.name = field.name.replace(/slides\[\d+\]/, 'slides[' + index + ']');
                    });
                });
            }

            function createSlide(index) {
                return template.replace(/{{index}}/g, index).replace(/{{number}}/g, index + 1);
            }

            addButton.addEventListener('click', function() {
                var index = container.querySelectorAll('.bytetheme-slider-slide').length;
                container.insertAdjacentHTML('beforeend', createSlide(index));
            });

            container.addEventListener('click', function(event) {
                if (event.target.matches('.remove-slide')) {
                    event.preventDefault();
                    var slide = event.target.closest('.bytetheme-slider-slide');
                    if (slide) {
                        slide.remove();
                        updateSlideNumbers();
                    }
                }

                if (event.target.matches('.upload-slide-image')) {
                    event.preventDefault();
                    var closestSlide = event.target.closest('.bytetheme-slider-slide');
                    var imageField = closestSlide.querySelector('.bytetheme-slide-image');

                    if (typeof wp !== 'undefined' && wp.media) {
                        var frame = wp.media({
                            title: 'Select Slide Image',
                            button: {
                                text: 'Use Image'
                            },
                            multiple: false
                        });

                        frame.on('select', function() {
                            var attachment = frame.state().get('selection').first().toJSON();
                            imageField.value = attachment.url;
                        });

                        frame.open();
                    }
                }
            });
        });
    </script>

<?php
}

function bytetheme_slider_shortcode($atts)
{
    $atts = shortcode_atts(['id' => 0], $atts);
    $slides = get_post_meta($atts['id'], 'slider_slides', true);

    if (empty($slides) || !is_array($slides)) {
        return '';
    }

    $slide_count = count($slides);
    $use_carousel = $slide_count > 2;

    ob_start();
?>
    <div class="bytetheme-slider-shortcode<?php echo $use_carousel ? ' owl-carousel' : ''; ?>" data-carousel="<?php echo $use_carousel ? 'true' : 'false'; ?>">
        <?php foreach ($slides as $slide): ?>
            <div class="bytetheme-slider-item" style="background-image:url('<?php echo esc_url($slide['image']); ?>');"> 
                <div class="bytetheme-slider-content">
                    <?php if (!empty($slide['heading'])): ?>
                        <h2><?php echo esc_html($slide['heading']); ?></h2>
                    <?php endif; ?>

                    <?php if (!empty($slide['text'])): ?>
                        <p><?php echo esc_html($slide['text']); ?></p>
                    <?php endif; ?>

                    <div class="bytetheme-slider-buttons wp-block-button">
                        <?php if (!empty($slide['btn1_text'])): ?>
                            <a href="<?php echo esc_url($slide['btn1_link']); ?>" class="bytetheme-slider-button primary wp-block-button__link">
                                <?php echo esc_html($slide['btn1_text']); ?>
                            </a>
                        <?php endif; ?>

                        <?php if (!empty($slide['btn2_text'])): ?>
                            <a href="<?php echo esc_url($slide['btn2_link']); ?>" class="bytetheme-slider-button secondary wp-block-button__link">
                                <?php echo esc_html($slide['btn2_text']); ?>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php
    return ob_get_clean();
}
add_shortcode('bytetheme_slider', 'bytetheme_slider_shortcode');

// Add shortcode column to admin list
function bytetheme_slider_admin_columns($columns)
{
    $new_columns = [];

    foreach ($columns as $key => $label) {
        $new_columns[$key] = $label;

        if ($key === 'title') {
            $new_columns['slider_shortcode'] = 'Shortcode';
        }
    }

    return $new_columns;
}
add_filter('manage_edit-bytetheme_slider_columns', 'bytetheme_slider_admin_columns');

function bytetheme_slider_admin_column_content($column, $post_id)
{
    if ($column !== 'slider_shortcode') {
        return;
    }

    echo '<input type="text" readonly class="bytetheme-slider-shortcode-input" value="[bytetheme_slider id=' . absint($post_id) . ']" />';
}
add_action('manage_bytetheme_slider_posts_custom_column', 'bytetheme_slider_admin_column_content', 10, 2);


/* =========================
   Svg Upload Support
========================= */

function bittheme_allow_svg_uploads($mimes)
{
    $mimes['svg']  = 'image/svg+xml';
    $mimes['svgz'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'bittheme_allow_svg_uploads');

function bittheme_fix_svg_mime_type($data, $file, $filename, $mimes)
{
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    if ('svg' === strtolower($ext) || 'svgz' === strtolower($ext)) {
        $data['ext']  = $ext;
        $data['type'] = 'image/svg+xml';
    }

    return $data;
}
add_filter('wp_check_filetype_and_ext', 'bittheme_fix_svg_mime_type', 10, 4);



/* =========================
   Custom Blocks
========================= */

function bittheme_register_blocks() {

    register_block_type(
        get_template_directory() . '/blocks/message-block'
    );

}

add_action('init', 'bittheme_register_blocks');



/* =========================
   END OF FUNCTIONS FILE
========================= */
?>