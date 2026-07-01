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

// Enqueue homepage slider script
function dk_homepage_scripts() {
    if (is_front_page()) {
        wp_add_inline_script('astra-child-style', '');
        wp_enqueue_script(
            'dk-slider',
            get_stylesheet_directory_uri() . '/assets/slider.js',
            array(),
            '1.0.0',
            true
        );
    }
}
add_action('wp_enqueue_scripts', 'dk_homepage_scripts');

// Add the Logo Bar at the very top of the site (above Astra's navbar)
add_action( 'astra_header_before', 'dk_add_logo_bar' );
function dk_add_logo_bar() {
    // If you only want the logo bar on the homepage, uncomment the line below:
    // if ( ! is_front_page() ) return;
    ?>
    <!-- LOGO BAR -->
    <div class="dk-logo-bar">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="dk-logo-link">
            <?php
            $custom_logo_id = get_theme_mod( 'custom_logo' );
            if ( $custom_logo_id ) {
                echo wp_get_attachment_image( $custom_logo_id, 'full', false, array( 'class' => 'dk-logo-img' ) );
            } else {
                ?>
                <div class="dk-logo-text-wrap">
                    <div class="dk-logo-main">Daam Koto?</div>
                    <div class="dk-logo-bn">দাম কত?</div>
                </div>
            <?php } ?>
        </a>
    </div>
    <?php
}