<?php
if (!defined('ABSPATH')) {
    exit;
}

require_once get_template_directory() . '/inc/customizer.php';
require_once get_template_directory() . '/inc/default-pages.php';

function kolseg_theme_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support(
        'custom-logo',
        array(
            'height'      => 120,
            'width'       => 120,
            'flex-height' => true,
            'flex-width'  => true,
        )
    );
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script'));
    add_theme_support('responsive-embeds');
    add_theme_support('editor-styles');
    add_editor_style('assets/css/editor.css');
    add_post_type_support('page', 'excerpt');
    register_nav_menus(
        array(
            'primary' => __('Primary Menu', 'kolseg-design-services'),
        )
    );
}
add_action('after_setup_theme', 'kolseg_theme_setup');

function kolseg_enqueue_assets() {
    wp_enqueue_style(
        'kolseg-fonts',
        'https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@500;600;700;800&family=Manrope:wght@400;500;600;700;800&family=Playfair+Display:wght@600;700&display=swap',
        array(),
        null
    );
    wp_enqueue_style(
        'kolseg-main',
        get_template_directory_uri() . '/assets/css/styles.css',
        array('kolseg-fonts'),
        kolseg_get_asset_version('/assets/css/styles.css')
    );
    wp_enqueue_script(
        'kolseg-main',
        get_template_directory_uri() . '/assets/js/main.js',
        array(),
        kolseg_get_asset_version('/assets/js/main.js'),
        true
    );
}
add_action('wp_enqueue_scripts', 'kolseg_enqueue_assets');

function kolseg_get_asset_version($relative_path) {
    $path = get_template_directory() . $relative_path;
    if (file_exists($path)) {
        return filemtime($path);
    }

    $theme = wp_get_theme();
    return $theme->get('Version');
}

function kolseg_get_page_key() {
    if (is_front_page()) {
        return 'home';
    }

    $post = get_queried_object();
    if (!($post instanceof WP_Post)) {
        return '';
    }

    if (0 === strpos($post->post_name, 'service-')) {
        return 'services';
    }

    return $post->post_name;
}

function kolseg_is_seeded_page($post_id = 0) {
    $post_id = $post_id ? (int) $post_id : get_the_ID();
    if (empty($post_id)) {
        return false;
    }

    return '1' === get_post_meta($post_id, '_kolseg_seeded_page', true);
}

function kolseg_render_page_content() {
    $content_slug = kolseg_get_content_slug();
    $seed_config = kolseg_get_seed_config_by_slug($content_slug);

    if (empty($seed_config)) {
        the_content();
        return;
    }

    $raw_content = (string) get_post_field('post_content', get_the_ID());
    if (empty(trim($raw_content)) || kolseg_seeded_content_is_malformed($raw_content)) {
        $fallback_content = kolseg_get_seed_source_content($content_slug);
        if (!empty($fallback_content)) {
            echo $fallback_content; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
            return;
        }
    }

    $autop_priority = has_filter('the_content', 'wpautop');
    if (false !== $autop_priority) {
        remove_filter('the_content', 'wpautop', $autop_priority);
    }

    the_content();

    if (false !== $autop_priority) {
        add_filter('the_content', 'wpautop', $autop_priority);
    }
}

function kolseg_get_content_slug() {
    if (is_front_page()) {
        return 'home';
    }

    $post = get_queried_object();
    if ($post instanceof WP_Post) {
        return $post->post_name;
    }

    return '';
}

function kolseg_seeded_content_is_malformed($content) {
    if (empty($content)) {
        return false;
    }

    $patterns = array(
        '/<br\s*\/?>\s*<\/a>/i',
        '/<a[^>]+>\s*<br\s*\/?>/i',
        '/<\/p>\s*<div class="(?:hero-stack-overlay|category-card-copy|photo-overlay|gallery-overlay|showcase-overlay)/i',
        '/<p>\s*<a class="(?:hero-stack-card|category-card|photo-card|video-card|nav-dropdown-card)/i',
        '/<p>\s*<div class="(?:container|hero-clean-copy|hero-clean-stack|category-card-copy|photo-overlay|gallery-overlay)/i',
    );

    foreach ($patterns as $pattern) {
        if (preg_match($pattern, $content)) {
            return true;
        }
    }

    return false;
}

function kolseg_get_theme_image($setting, $fallback) {
    $image = get_theme_mod($setting);
    if (!empty($image)) {
        return $image;
    }
    return get_template_directory_uri() . '/assets/images/' . $fallback;
}

function kolseg_primary_menu_fallback() {
    echo '<a href="' . esc_url(home_url('/')) . '">Home</a>';
    echo '<a href="' . esc_url(home_url('/services/')) . '">Services</a>';
    echo '<a href="' . esc_url(home_url('/portfolio/')) . '">Portfolio</a>';
    echo '<a href="' . esc_url(home_url('/about/')) . '">About</a>';
    echo '<a href="' . esc_url(home_url('/contact/')) . '" class="nav-cta">Contact</a>';
}

function kolseg_get_default_meta_description() {
    return get_theme_mod(
        'kolseg_meta_description',
        'KOLSEG delivers photography, videography, sound, lighting, stage fabrication, interiors, and event production from Ogun State for brands, events, and commercial spaces.'
    );
}

function kolseg_get_meta_description() {
    if (is_front_page()) {
        return kolseg_get_default_meta_description();
    }

    if (is_singular()) {
        $excerpt = trim(wp_strip_all_tags(get_the_excerpt()));
        if (!empty($excerpt)) {
            return $excerpt;
        }

        $content = trim(wp_strip_all_tags(get_the_content(null, false)));
        if (!empty($content)) {
            return wp_trim_words($content, 28, '...');
        }
    }

    $site_description = get_bloginfo('description');
    if (!empty($site_description)) {
        return $site_description;
    }

    return kolseg_get_default_meta_description();
}

function kolseg_get_share_image() {
    if (is_front_page()) {
        return kolseg_get_theme_image('kolseg_hero_bg', 'live-studio-main.jpg');
    }

    if (is_singular() && has_post_thumbnail()) {
        $image = get_the_post_thumbnail_url(get_the_ID(), 'full');
        if (!empty($image)) {
            return $image;
        }
    }

    return get_template_directory_uri() . '/assets/images/live-studio-main.jpg';
}

function kolseg_get_schema_logo() {
    $custom_logo_id = get_theme_mod('custom_logo');
    if (!empty($custom_logo_id)) {
        $custom_logo = wp_get_attachment_image_url($custom_logo_id, 'full');
        if (!empty($custom_logo)) {
            return $custom_logo;
        }
    }

    return get_template_directory_uri() . '/assets/images/kolseg-logo.png';
}

function kolseg_get_social_profiles() {
    $profiles = array(
        get_theme_mod('kolseg_instagram_url', ''),
        get_theme_mod('kolseg_facebook_url', ''),
        get_theme_mod('kolseg_youtube_url', ''),
    );

    return array_values(array_filter($profiles));
}

function kolseg_output_seo_meta() {
    $title = function_exists('wp_get_document_title') ? wp_get_document_title() : trim(wp_title('|', false, 'right')) . get_bloginfo('name');
    $description = kolseg_get_meta_description();
    $canonical = kolseg_get_canonical_url();
    $image = kolseg_get_share_image();
    $site_name = get_bloginfo('name');
    $schema = array(
        '@context'    => 'https://schema.org',
        '@type'       => 'LocalBusiness',
        'name'        => $site_name,
        'url'         => home_url('/'),
        'description' => kolseg_get_default_meta_description(),
        'image'       => $image,
        'logo'        => kolseg_get_schema_logo(),
        'telephone'   => get_theme_mod('kolseg_phone', '08054859669'),
        'email'       => get_bloginfo('admin_email'),
        'address'     => array(
            '@type'           => 'PostalAddress',
            'streetAddress'   => get_theme_mod('kolseg_business_address', 'Sango-Ota'),
            'addressLocality' => get_theme_mod('kolseg_business_city', 'Sango-Ota'),
            'addressRegion'   => get_theme_mod('kolseg_business_region', 'Ogun State'),
            'addressCountry'  => get_theme_mod('kolseg_business_country', 'NG'),
        ),
    );

    $same_as = kolseg_get_social_profiles();
    if (!empty($same_as)) {
        $schema['sameAs'] = $same_as;
    }

    ?>
    <meta name="description" content="<?php echo esc_attr($description); ?>">
    <link rel="canonical" href="<?php echo esc_url($canonical); ?>">
    <meta property="og:locale" content="en_NG">
    <meta property="og:type" content="<?php echo is_singular() ? 'article' : 'website'; ?>">
    <meta property="og:title" content="<?php echo esc_attr($title); ?>">
    <meta property="og:description" content="<?php echo esc_attr($description); ?>">
    <meta property="og:url" content="<?php echo esc_url($canonical); ?>">
    <meta property="og:site_name" content="<?php echo esc_attr($site_name); ?>">
    <meta property="og:image" content="<?php echo esc_url($image); ?>">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?php echo esc_attr($title); ?>">
    <meta name="twitter:description" content="<?php echo esc_attr($description); ?>">
    <meta name="twitter:image" content="<?php echo esc_url($image); ?>">
    <script type="application/ld+json"><?php echo wp_json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?></script>
    <?php
}
add_action('wp_head', 'kolseg_output_seo_meta', 1);

function kolseg_get_canonical_url() {
    if (is_singular()) {
        return get_permalink();
    }

    if (is_front_page()) {
        return home_url('/');
    }

    $request_uri = '/';
    if (isset($_SERVER['REQUEST_URI'])) {
        $request_uri = wp_unslash($_SERVER['REQUEST_URI']);
    }

    $request_path = strtok($request_uri, '?');
    if (empty($request_path)) {
        $request_path = '/';
    }

    return home_url($request_path);
}

function kolseg_seed_default_pages() {
    if (!function_exists('wp_insert_post')) {
        return;
    }

    kolseg_import_source_pages();
}
add_action('after_switch_theme', 'kolseg_seed_default_pages');
