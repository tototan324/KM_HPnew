<?php
/**
 * Kobe Marukan Theme functions and definitions
 */

function marukan_setup() {
    // Add theme support
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));

    // Register menus
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'marukan'),
    ));
}
add_action('after_setup_theme', 'marukan_setup');

function marukan_scripts() {
    /**
     * Load Tailwind CSS
     * Note: Using Play CDN for this demonstration.
     * For production, you should compile Tailwind CSS and enqueue it using wp_enqueue_style.
     */
    wp_enqueue_script('marukan-tailwind', 'https://cdn.tailwindcss.com', array(), null, false);

    // Load Main Stylesheet
    wp_enqueue_style('marukan-style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'marukan_scripts');

/**
 * Add Customizer settings
 */
function marukan_customize_register($wp_customize) {
    // Section: Company Info
    $wp_customize->add_section('marukan_info', array(
        'title' => __('Company Information', 'marukan'),
        'priority' => 30,
    ));

    // Setting: Message Title
    $wp_customize->add_setting('marukan_message_title', array(
        'default' => '代表者メッセージ',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('marukan_message_title', array(
        'label' => __('Message Title', 'marukan'),
        'section' => 'marukan_info',
        'type' => 'text',
    ));

    // Setting: Message Content
    $wp_customize->add_setting('marukan_message_content', array(
        'default' => '卸売業からスタートし、現在は自社工場での製造も手掛けています。食のニーズが変化する中、私たちは常に新しい価値を提供し続けます。',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('marukan_message_content', array(
        'label' => __('Message Content', 'marukan'),
        'section' => 'marukan_info',
        'type' => 'textarea',
    ));

    // Setting: Philosophy
    $wp_customize->add_setting('marukan_philosophy', array(
        'default' => '私たちは食を通じて、美味しさと幸せを創造し、人々の明るい食生活に貢献します。',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('marukan_philosophy', array(
        'label' => __('Philosophy', 'marukan'),
        'section' => 'marukan_info',
        'type' => 'textarea',
    ));

    // Setting: Company Name
    $wp_customize->add_setting('marukan_company_name', array(
        'default' => '株式会社神戸まるかん',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('marukan_company_name', array(
        'label' => __('Company Name', 'marukan'),
        'section' => 'marukan_info',
        'type' => 'text',
    ));

    // Setting: Address
    $wp_customize->add_setting('marukan_address', array(
        'default' => '〒658-0023 兵庫県神戸市東灘区深江浜町5番地の1',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('marukan_address', array(
        'label' => __('Address', 'marukan'),
        'section' => 'marukan_info',
        'type' => 'textarea',
    ));

    // Setting: Primary Color
    $wp_customize->add_setting('marukan_primary_color', array(
        'default' => '#004098',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'marukan_primary_color', array(
        'label' => __('Primary Color', 'marukan'),
        'section' => 'marukan_info',
    )));

    // Section: Analytics
    $wp_customize->add_section('marukan_analytics', array(
        'title' => __('Analytics', 'marukan'),
        'priority' => 100,
    ));
    $wp_customize->add_setting('ga_tracking_id', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('ga_tracking_id', array(
        'label' => __('Google Analytics Tracking ID', 'marukan'),
        'section' => 'marukan_analytics',
        'type' => 'text',
    ));
}
add_action('customize_register', 'marukan_customize_register');

/**
 * Register Custom Post Type: Products
 */
function marukan_register_post_types() {
    $labels = array(
        'name' => _x('Products', 'Post Type General Name', 'marukan'),
        'singular_name' => _x('Product', 'Post Type Singular Name', 'marukan'),
        'menu_name' => __('Products', 'marukan'),
        'all_items' => __('All Products', 'marukan'),
    );
    $args = array(
        'label' => __('Product', 'marukan'),
        'labels' => $labels,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
        'taxonomies' => array('product_category'),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-cart',
        'has_archive' => true,
        'show_in_rest' => true,
    );
    register_post_type('product', $args);

    // Register Taxonomy: Product Categories
    register_taxonomy('product_category', array('product'), array(
        'hierarchical' => true,
        'labels' => array(
            'name' => __('Product Categories', 'marukan'),
            'singular_name' => __('Product Category', 'marukan'),
        ),
        'show_ui' => true,
        'show_in_rest' => true,
        'show_admin_column' => true,
    ));
}
add_action('init', 'marukan_register_post_types');

/**
 * Handle Contact Form Submission
 */
function marukan_handle_contact_form() {
    if (isset($_POST['action']) && $_POST['action'] == 'contact_form') {
        // Check nonce
        if (!isset($_POST['contact_form_nonce_field']) || !wp_verify_nonce($_POST['contact_form_nonce_field'], 'contact_form_nonce')) {
            wp_die('Security check failed');
        }

        // Check honeypot
        if (!empty($_POST['honeypot'])) {
            wp_die('Spam detected');
        }

        // Process form (send email, etc.)
        $name = sanitize_text_field($_POST['your-name']);
        $email = sanitize_email($_POST['your-email']);
        $message = sanitize_textarea_field($_POST['your-message']);

        // In a real scenario, use wp_mail()
        // wp_mail(get_option('admin_email'), 'Contact Form Submission', "From: $name <$email>\n\n$message");

        // Redirect back with success message
        wp_redirect(home_url('/?contact-success=1#contact'));
        exit;
    }
}
add_action('admin_post_contact_form', 'marukan_handle_contact_form');
add_action('admin_post_nopriv_contact_form', 'marukan_handle_contact_form');
