<?php
// Enqueue parent and child theme styles
function astra_child_enqueue_styles() {
    wp_enqueue_style(
        'astra-parent-style',
        get_template_directory_uri() . '/style.css'
    );
    wp_enqueue_style(
        'astra-child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array('astra-parent-style'),
        '1.0.0'
    );
    // Google Fonts
    wp_enqueue_style(
        'dk-fonts',
        'https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;1,400&family=DM+Sans:wght@300;400;500;600&display=swap',
        array(),
        null
    );
}
add_action('wp_enqueue_scripts', 'astra_child_enqueue_styles');

// Remove Astra page title on front page
add_filter('astra_the_title', function($title) {
    if (is_front_page()) return '';
    return $title;
});

// Remove Astra breadcrumbs on shop
add_filter('astra_breadcrumbs_enabled', function($enabled) {
    if (is_shop() || is_front_page()) return false;
    return $enabled;
});

// Remove Astra footer credits
add_filter('astra_footer_credits', function() {
    return '';
});

// Remove WordPress generator meta tag
remove_action('wp_head', 'wp_generator');