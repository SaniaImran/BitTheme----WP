<?php

// WordPress function stubs for static analysis and non-WP editor environments.
// In a normal WordPress runtime, core functions already exist and these stubs are skipped.
// Summary
// stubs.php = dummy WordPress functions
// Use = editor help + autocomplete + error avoid
// Production me use ❌ nahi hoti

if (!function_exists('add_action')) {
    function add_action($hook, $function_to_add, $priority = 10, $accepted_args = 1) {}
}

if (!function_exists('add_theme_support')) {
    function add_theme_support($feature, $options = null) {}
}

if (!function_exists('wp_enqueue_style')) {
    function wp_enqueue_style($handle, $src = null, $deps = array(), $ver = false, $media = 'all') {}
}

if (!function_exists('get_stylesheet_uri')) {
    function get_stylesheet_uri()
    {
        return '';
    }
}

if (!function_exists('sanitize_text_field')) {
    function sanitize_text_field($str)
    {
        return is_scalar($str) ? trim(filter_var($str, FILTER_SANITIZE_STRING)) : $str;
    }
}

if (!function_exists('sanitize_email')) {
    function sanitize_email($email)
    {
        return is_scalar($email) ? filter_var($email, FILTER_SANITIZE_EMAIL) : $email;
    }
}

if (!function_exists('language_attributes')) {
    function language_attributes()
    {
        echo '';
    }
}

if (!function_exists('bloginfo')) {
    function bloginfo($show = '')
    {
        echo '';
    }
}

if (!function_exists('wp_head')) {
    function wp_head() {}
}

if (!function_exists('body_class')) {
    function body_class($class = '')
    {
        echo '';
    }
}

if (!function_exists('get_theme_mod')) {
    function get_theme_mod($name, $default = '')
    {
        return $default;
    }
}

if (!function_exists('esc_attr')) {
    function esc_attr($text)
    {
        return is_scalar($text) ? htmlspecialchars((string) $text, ENT_QUOTES, 'UTF-8') : $text;
    }
}

if (!function_exists('esc_html')) {
    function esc_html($text)
    {
        return is_scalar($text) ? htmlentities((string) $text, ENT_QUOTES, 'UTF-8') : $text;
    }
}

if (!function_exists('wp_footer')) {
    function wp_footer() {}
}

if (!function_exists('get_header')) {
    function get_header($name = null) {}
}

if (!function_exists('get_footer')) {
    function get_footer($name = null) {}
}
