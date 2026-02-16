<?php
/**
 * marukan-original Theme functions and definitions
 */

function marukan_original_setup() {
    // Add theme support
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));

    // Register menus
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'marukan-original'),
    ));
}
add_action('after_setup_theme', 'marukan_original_setup');

function marukan_original_scripts() {
    /**
     * Load Tailwind CSS
     * Note: Using Play CDN for this demonstration.
     * For production, you should compile Tailwind CSS and enqueue it using wp_enqueue_style.
     */
    wp_enqueue_script('marukan-original-tailwind', 'https://cdn.tailwindcss.com', array(), null, false);

    // Enqueue Swiper
    wp_enqueue_style('swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css', array(), '11.0.0');
    wp_enqueue_script('swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', array(), '11.0.0', true);

    // Load Main Stylesheet
    wp_enqueue_style('marukan-original-style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'marukan_original_scripts');

/**
 * Add Customizer settings
 */
function marukan_original_customize_register($wp_customize) {
    // Section: Company Info
    $wp_customize->add_section('marukan_original_info', array(
        'title' => __('Company Information', 'marukan-original'),
        'priority' => 30,
    ));

    // Setting: Message Title
    $wp_customize->add_setting('marukan_original_message_title', array(
        'default' => '代表者メッセージ',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('marukan_original_message_title', array(
        'label' => __('Message Title', 'marukan-original'),
        'section' => 'marukan_original_info',
        'type' => 'text',
    ));

    // Setting: Message Content
    $wp_customize->add_setting('marukan_original_message_content', array(
        'default' => '卸売業からスタートし、現在は自社工場での製造も手掛けています。食のニーズが変化する中、私たちは常に新しい価値を提供し続けます。',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('marukan_original_message_content', array(
        'label' => __('Message Content', 'marukan-original'),
        'section' => 'marukan_original_info',
        'type' => 'textarea',
    ));

    // Mission Description
    $wp_customize->add_setting('marukan_original_mission_desc', array(
        'default' => '私たちは単に食品を届けるだけでなく、その先にある顧客の成功を見据え、共に歩むパートナーであり続けます。',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('marukan_original_mission_desc', array(
        'label' => __('Mission Description', 'marukan-original'),
        'section' => 'marukan_original_info',
        'type' => 'textarea',
    ));

    // Mission
    $wp_customize->add_setting('marukan_original_mission', array(
        'default' => '美味しさと戦略をセットで届ける。顧客の繁盛を創る',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('marukan_original_mission', array(
        'label' => __('Mission', 'marukan-original'),
        'section' => 'marukan_original_info',
        'type' => 'textarea',
    ));

    // Vision
    $wp_customize->add_setting('marukan_original_vision', array(
        'default' => '「困ったら神戸まるかん」と一番に選ばれる、食のトータルソリューション・カンパニー。',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('marukan_original_vision', array(
        'label' => __('Vision', 'marukan-original'),
        'section' => 'marukan_original_info',
        'type' => 'textarea',
    ));

    // Value
    $wp_customize->add_setting('marukan_original_value', array(
        'default' => '納品をゴールとせず、顧客の売上アップをゴールとする達人集団',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('marukan_original_value', array(
        'label' => __('Value', 'marukan-original'),
        'section' => 'marukan_original_info',
        'type' => 'textarea',
    ));

    // Setting: Company Name
    $wp_customize->add_setting('marukan_original_company_name', array(
        'default' => '株式会社神戸まるかん',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('marukan_original_company_name', array(
        'label' => __('Company Name', 'marukan-original'),
        'section' => 'marukan_original_info',
        'type' => 'text',
    ));

    // Setting: Establish Date
    $wp_customize->add_setting('marukan_original_establish_date', array(
        'default' => '1977年（昭和52年）12月',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('marukan_original_establish_date', array(
        'label' => __('Establish Date', 'marukan-original'),
        'section' => 'marukan_original_info',
        'type' => 'text',
    ));

    // Setting: Capital
    $wp_customize->add_setting('marukan_original_capital', array(
        'default' => '3,000万円',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('marukan_original_capital', array(
        'label' => __('Capital', 'marukan-original'),
        'section' => 'marukan_original_info',
        'type' => 'text',
    ));

    // Setting: CEO
    $wp_customize->add_setting('marukan_original_ceo', array(
        'default' => '代表取締役社長　西谷 賢亮',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('marukan_original_ceo', array(
        'label' => __('CEO Name', 'marukan-original'),
        'section' => 'marukan_original_info',
        'type' => 'text',
    ));

    // Setting: Business Content
    $wp_customize->add_setting('marukan_original_business', array(
        'default' => "水産物卸売及び加工販売\n調理冷凍食品の製造販売\nスイーツの製造販売\n食品輸出入業務",
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('marukan_original_business', array(
        'label' => __('Business Content', 'marukan-original'),
        'section' => 'marukan_original_info',
        'type' => 'textarea',
    ));

    // Setting: Address
    $wp_customize->add_setting('marukan_original_address', array(
        'default' => '〒658-0023 兵庫県神戸市東灘区深江浜町5番地の1',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('marukan_original_address', array(
        'label' => __('Address', 'marukan-original'),
        'section' => 'marukan_original_info',
        'type' => 'textarea',
    ));

    // History Content (JSON or simple text for now)
    $wp_customize->add_setting('marukan_original_history', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('marukan_original_history', array(
        'label' => __('History (Year|Event per line)', 'marukan-original'),
        'section' => 'marukan_original_info',
        'type' => 'textarea',
        'description' => __('Enter one year and event per line, separated by | (e.g. 1977|Company established)', 'marukan-original'),
    ));

    // Setting: Primary Color
    $wp_customize->add_setting('marukan_original_primary_color', array(
        'default' => '#004098',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'marukan_original_primary_color', array(
        'label' => __('Primary Color', 'marukan-original'),
        'section' => 'marukan_original_info',
    )));

    // Section: Analytics & Integration
    $wp_customize->add_section('marukan_original_analytics', array(
        'title' => __('Analytics & Integration', 'marukan-original'),
        'priority' => 100,
    ));

    // Setting: Contact Form 7 ID
    $wp_customize->add_setting('marukan_original_cf7_id', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('marukan_original_cf7_id', array(
        'label' => __('Contact Form 7 ID (or full shortcode)', 'marukan-original'),
        'description' => __('Enter the numeric ID or the full shortcode [contact-form-7 id="..."]', 'marukan-original'),
        'section' => 'marukan_original_analytics',
        'type' => 'text',
    ));

    $wp_customize->add_setting('ga_tracking_id', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('ga_tracking_id', array(
        'label' => __('Google Analytics Tracking ID', 'marukan-original'),
        'section' => 'marukan_original_analytics',
        'type' => 'text',
    ));
}
add_action('customize_register', 'marukan_original_customize_register');

/**
 * Register Custom Post Type: Products
 */
function marukan_original_register_post_types() {
    // Products
    $product_labels = array(
        'name' => _x('商品案内', 'Post Type General Name', 'marukan-original'),
        'singular_name' => _x('商品', 'Post Type Singular Name', 'marukan-original'),
        'menu_name' => __('商品案内', 'marukan-original'),
        'all_items' => __('すべての商品', 'marukan-original'),
    );
    $product_args = array(
        'label' => __('商品', 'marukan-original'),
        'labels' => $product_labels,
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
    register_post_type('product', $product_args);

    // Product Categories
    register_taxonomy('product_category', array('product'), array(
        'hierarchical' => true,
        'labels' => array(
            'name' => __('商品カテゴリー', 'marukan-original'),
            'singular_name' => __('商品カテゴリー', 'marukan-original'),
        ),
        'show_ui' => true,
        'show_in_rest' => true,
        'show_admin_column' => true,
    ));

    // Case Studies (Success Stories)
    $case_labels = array(
        'name' => _x('導入事例', 'Post Type General Name', 'marukan-original'),
        'singular_name' => _x('導入事例', 'Post Type Singular Name', 'marukan-original'),
        'menu_name' => __('導入事例', 'marukan-original'),
    );
    $case_args = array(
        'label' => __('導入事例', 'marukan-original'),
        'labels' => $case_labels,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 6,
        'menu_icon' => 'dashicons-awards',
        'has_archive' => true,
        'show_in_rest' => true,
    );
    register_post_type('case_study', $case_args);

    // Members (Employees)
    $member_labels = array(
        'name' => _x('働く仲間', 'Post Type General Name', 'marukan-original'),
        'singular_name' => _x('メンバー', 'Post Type Singular Name', 'marukan-original'),
        'menu_name' => __('働く仲間', 'marukan-original'),
    );
    $member_args = array(
        'label' => __('メンバー', 'marukan-original'),
        'labels' => $member_labels,
        'supports' => array('title', 'thumbnail', 'excerpt'),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 7,
        'menu_icon' => 'dashicons-groups',
        'has_archive' => false,
        'show_in_rest' => true,
    );
    register_post_type('member', $member_args);

}
add_action('init', 'marukan_original_register_post_types');

/**
 * Flush rewrite rules on theme activation
 */
function marukan_original_flush_rewrite_rules() {
    marukan_original_register_post_types();
    flush_rewrite_rules();

    // Auto-create recruitment PAGES if they don't exist
    // Parent Recruit page
    $recruit_parent_id = 0;
    $recruit_parent = get_page_by_path('recruit', OBJECT, 'page');
    if (!$recruit_parent) {
        $recruit_parent_id = wp_insert_post(array(
            'post_title'  => '採用情報',
            'post_name'   => 'recruit',
            'post_status' => 'publish',
            'post_type'   => 'page',
            'meta_input'  => array('_wp_page_template' => 'page-recruit.php')
        ));
    } else {
        $recruit_parent_id = $recruit_parent->ID;
        update_post_meta($recruit_parent_id, '_wp_page_template', 'page-recruit.php');
    }

    $recruits = array(
        'new-graduate' => array('title' => '新卒採用', 'template' => 'page-new-graduate.php'),
        'career'       => array('title' => 'キャリア採用', 'template' => 'page-career.php'),
        'part-time'    => array('title' => '準社員・アルバイト採用', 'template' => 'page-part-time.php')
    );

    foreach ($recruits as $slug => $data) {
        $page = get_page_by_path('recruit/' . $slug, OBJECT, 'page');
        if (!$page) {
            wp_insert_post(array(
                'post_title'  => $data['title'],
                'post_name'   => $slug,
                'post_status' => 'publish',
                'post_type'   => 'page',
                'post_parent' => $recruit_parent_id,
                'meta_input'  => array('_wp_page_template' => $data['template'])
            ));
        } else {
            update_post_meta($page->ID, '_wp_page_template', $data['template']);
        }
    }

    // Other top-level pages
    $other_pages = array(
        'contact'        => array('title' => 'お問い合わせ', 'template' => 'page-contact.php'),
        'privacy-policy' => array('title' => 'プライバシーポリシー', 'template' => 'page-privacy-policy.php')
    );
    foreach ($other_pages as $slug => $data) {
        $page = get_page_by_path($slug, OBJECT, 'page');
        if (!$page) {
            wp_insert_post(array(
                'post_title'  => $data['title'],
                'post_name'   => $slug,
                'post_status' => 'publish',
                'post_type'   => 'page',
                'meta_input'  => array('_wp_page_template' => $data['template'])
            ));
        } else {
            update_post_meta($page->ID, '_wp_page_template', $data['template']);
        }
    }
}
add_action('after_switch_theme', 'marukan_original_flush_rewrite_rules');

// Also run on init once if a special flag is set or just check existence
function marukan_original_ensure_pages() {
    if (isset($_GET['setup_marukan_pages'])) {
        marukan_original_flush_rewrite_rules();
        echo "Pages setup complete.";
        exit;
    }
}
add_action('init', 'marukan_original_ensure_pages');

/**
 * Helper to get permalink by slug
 */
function marukan_get_permalink_by_slug($slug, $post_type = 'page') {
    $page = get_page_by_path($slug, OBJECT, $post_type);
    if ($page) {
        return get_permalink($page->ID);
    }
    return home_url('/' . $slug . '/'); // Fallback
}

/**
 * Plugin Recommendations and Integration
 * Recommended Plugins:
 * - Contact Form 7 (Best practice for flexible, free forms)
 * - Honeypot for Contact Form 7 (Spam protection without CAPTCHA)
 */
function marukan_original_plugin_notice() {
    if (is_admin() && current_user_can('install_plugins')) {
        if (!defined('WPCF7_VERSION')) {
            echo '<div class="notice notice-info is-dismissible">
                <p><strong>marukan-originalテーマ:</strong> 問い合わせフォームを有効にするには「Contact Form 7」プラグインのインストールを推奨します。</p>
            </div>';
        }
        if (!defined('WPCF7H_VERSION') && defined('WPCF7_VERSION')) {
            echo '<div class="notice notice-info is-dismissible">
                <p><strong>marukan-originalテーマ:</strong> スパム対策（ハニーポット機能）を有効にするには「Honeypot for Contact Form 7」プラグインのインストールを推奨します。</p>
            </div>';
        }
    }
}
add_action('admin_notices', 'marukan_original_plugin_notice');

/**
 * Custom Walkers for Tailwind CSS Navigation
 */
class Marukan_Original_Tailwind_Walker extends Walker_Nav_Menu {
    function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $is_contact = in_array('menu-contact', $classes) || strpos($item->url, '#contact') !== false;

        $class_names = $is_contact
            ? 'bg-marukanBlue text-white px-6 py-2 rounded-full text-sm font-bold hover:bg-blue-800 transition'
            : 'text-sm font-bold hover:text-marukanBlue transition';

        $output .= '<a href="' . esc_url($item->url) . '" class="' . esc_attr($class_names) . '">';
        $output .= $item->title;
        $output .= '</a>';
    }
}

class Marukan_Original_Tailwind_Mobile_Walker extends Walker_Nav_Menu {
    function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $is_contact = in_array('menu-contact', $classes) || strpos($item->url, '#contact') !== false;

        $class_names = $is_contact
            ? 'bg-marukanBlue text-white px-6 py-4 rounded-xl text-center font-bold mobile-link'
            : 'text-lg font-bold py-2 border-b border-gray-50 mobile-link';

        $output .= '<a href="' . esc_url($item->url) . '" class="' . esc_attr($class_names) . '">';
        $output .= $item->title;
        $output .= '</a>';
    }
}
