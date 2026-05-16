<?php
if (!defined('ABSPATH')) {
    exit;
}

function kolseg_get_seed_page_map() {
    return array(
        'home' => array(
            'title' => 'Home',
            'source' => 'index.html',
            'nav_group' => 'home',
            'is_front_page' => true,
        ),
        'services' => array(
            'title' => 'Services',
            'source' => 'services.html',
            'nav_group' => 'services',
        ),
        'portfolio' => array(
            'title' => 'Portfolio',
            'source' => 'portfolio.html',
            'nav_group' => 'portfolio',
        ),
        'about' => array(
            'title' => 'About',
            'source' => 'about.html',
            'nav_group' => 'about',
        ),
        'contact' => array(
            'title' => 'Contact',
            'source' => 'contact.html',
            'nav_group' => 'contact',
        ),
        'top-projects' => array(
            'title' => 'Top Projects',
            'source' => 'top-projects.html',
            'nav_group' => 'top-projects',
        ),
        'service-photography-videography' => array(
            'title' => 'Photography / Videography',
            'source' => 'service-photography-videography.html',
            'nav_group' => 'services',
        ),
        'service-podcast' => array(
            'title' => 'Podcast',
            'source' => 'service-podcast.html',
            'nav_group' => 'services',
        ),
        'service-agency' => array(
            'title' => 'Agency',
            'source' => 'service-agency.html',
            'nav_group' => 'services',
        ),
        'service-sound-pa' => array(
            'title' => 'Sound / PA',
            'source' => 'service-sound-pa.html',
            'nav_group' => 'services',
        ),
        'service-design-space' => array(
            'title' => 'Design / Interior / Fabrication',
            'source' => 'service-design-space.html',
            'nav_group' => 'services',
        ),
        'service-lighting' => array(
            'title' => 'Electrical & Lighting',
            'source' => 'service-lighting.html',
            'nav_group' => 'services',
        ),
        'service-music-audio' => array(
            'title' => 'Music Recording / Audio Production',
            'source' => 'service-music-audio.html',
            'nav_group' => 'services',
        ),
        'service-event-support' => array(
            'title' => 'Event & Entertainment Services',
            'source' => 'service-event-support.html',
            'nav_group' => 'services',
        ),
        'service-contracts-renting' => array(
            'title' => 'Contracts / Renting',
            'source' => 'service-contracts-renting.html',
            'nav_group' => 'services',
        ),
    );
}

function kolseg_get_seed_config_by_slug($slug) {
    $page_map = kolseg_get_seed_page_map();
    if (isset($page_map[$slug])) {
        return $page_map[$slug];
    }

    return null;
}

function kolseg_get_service_nav_items() {
    return array(
        'service-photography-videography' => 'Photography / Videography',
        'service-podcast' => 'Podcast',
        'service-sound-pa' => 'Sound / PA',
        'service-lighting' => 'Electrical & Lighting',
        'service-design-space' => 'Design / Interior / Fabrication',
        'service-contracts-renting' => 'Contracts / Renting',
    );
}

function kolseg_get_page_url_by_slug($slug) {
    if ('home' === $slug) {
        return home_url('/');
    }

    $page = get_page_by_path($slug, OBJECT, 'page');
    if ($page instanceof WP_Post && 'publish' === $page->post_status) {
        return get_permalink($page);
    }

    return home_url('/' . trim($slug, '/') . '/');
}

function kolseg_get_page_title_by_slug($slug, $fallback) {
    $page = get_page_by_path($slug, OBJECT, 'page');
    if ($page instanceof WP_Post && 'publish' === $page->post_status) {
        return get_the_title($page);
    }

    return $fallback;
}

function kolseg_existing_page_needs_seed_refresh($page, $force_replace) {
    if (!($page instanceof WP_Post)) {
        return false;
    }

    if ($force_replace) {
        return true;
    }

    if ('publish' !== $page->post_status) {
        return true;
    }

    $content = (string) $page->post_content;
    if (empty(trim($content))) {
        return true;
    }

    if (function_exists('kolseg_seeded_content_is_malformed') && kolseg_seeded_content_is_malformed($content)) {
        return true;
    }

    $existing_signature = get_post_meta($page->ID, '_kolseg_seed_signature', true);
    if (!empty($existing_signature) && md5($content) === $existing_signature) {
        return true;
    }

    return false;
}

function kolseg_render_primary_navigation() {
    $page_key = kolseg_get_page_key();
    $service_page_url = kolseg_get_page_url_by_slug('services');
    ?>
    <a class="<?php echo 'home' === $page_key ? 'is-active' : ''; ?>" href="<?php echo esc_url(home_url('/')); ?>">Home</a>
    <div class="nav-dropdown <?php echo 'services' === $page_key ? 'is-open' : ''; ?>">
      <a href="<?php echo esc_url($service_page_url); ?>" class="nav-dropdown-link <?php echo 'services' === $page_key ? 'is-active' : ''; ?>">Services</a>
      <div class="nav-dropdown-panel">
        <div class="nav-dropdown-intro">
          <p class="eyebrow">Full Service</p>
          <h3>Creative services, production, build, and technical support in one brand.</h3>
          <p>Photography, sound, lighting, stage fabrication, interiors, studio sessions, contracts, and event delivery under one workflow.</p>
          <a class="text-link" href="<?php echo esc_url($service_page_url); ?>">Open all services</a>
        </div>
        <div class="nav-dropdown-rail">
          <a class="nav-dropdown-card" href="<?php echo esc_url(kolseg_get_page_url_by_slug('service-photography-videography')); ?>">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/hero-live-studio.jpg'); ?>" alt="KOLSEG media and studio">
            <span><strong>Media</strong><em>Studio content, videography, production support, visual coverage</em></span>
          </a>
          <a class="nav-dropdown-card" href="<?php echo esc_url(kolseg_get_page_url_by_slug('service-music-audio')); ?>">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/audio-production.jpg'); ?>" alt="KOLSEG audio and production">
            <span><strong>Production</strong><em>Sound, PA, recording, rehearsal, mixing and mastering</em></span>
          </a>
          <a class="nav-dropdown-card" href="<?php echo esc_url(kolseg_get_page_url_by_slug('service-design-space')); ?>">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/stage-fabrication.jpg'); ?>" alt="KOLSEG design and fabrication">
            <span><strong>Build &amp; Space</strong><em>Interiors, stage sets, fabrication, lighting, installations</em></span>
          </a>
        </div>
        <div class="nav-dropdown-list">
          <?php foreach (kolseg_get_service_nav_items() as $slug => $label) : ?>
            <a href="<?php echo esc_url(kolseg_get_page_url_by_slug($slug)); ?>"><?php echo esc_html($label); ?></a>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
    <a class="<?php echo 'portfolio' === $page_key || 'top-projects' === $page_key ? 'is-active' : ''; ?>" href="<?php echo esc_url(kolseg_get_page_url_by_slug('portfolio')); ?>"><?php echo esc_html(kolseg_get_page_title_by_slug('portfolio', 'Portfolio')); ?></a>
    <a class="<?php echo 'about' === $page_key ? 'is-active' : ''; ?>" href="<?php echo esc_url(kolseg_get_page_url_by_slug('about')); ?>"><?php echo esc_html(kolseg_get_page_title_by_slug('about', 'About')); ?></a>
    <a class="nav-cta <?php echo 'contact' === $page_key ? 'is-active' : ''; ?>" href="<?php echo esc_url(kolseg_get_page_url_by_slug('contact')); ?>"><?php echo esc_html(kolseg_get_page_title_by_slug('contact', 'Contact')); ?></a>
    <?php
}

function kolseg_import_source_pages($force_replace = false) {
    $page_map = kolseg_get_seed_page_map();
    $front_page_id = 0;

    foreach ($page_map as $slug => $config) {
        $source_path = trailingslashit(get_template_directory()) . 'source-html/' . $config['source'];
        if (!file_exists($source_path)) {
            continue;
        }

        $source_html = file_get_contents($source_path);
        if (false === $source_html) {
            continue;
        }

        $content = kolseg_extract_main_content($source_html);
        if (empty($content)) {
            continue;
        }

        $content = kolseg_transform_imported_html($content);
        $content = kolseg_wrap_seeded_content($content);
        $content_signature = md5($content);
        $excerpt = kolseg_extract_meta_description($source_html);
        $existing_page = get_page_by_path($slug, OBJECT, 'page');
        $page_args = array(
            'post_type' => 'page',
            'post_status' => 'publish',
            'post_title' => $config['title'],
            'post_name' => $slug,
            'post_excerpt' => $excerpt,
        );

        if ($existing_page instanceof WP_Post) {
            $should_seed = kolseg_existing_page_needs_seed_refresh($existing_page, $force_replace);

            if ($should_seed) {
                $page_args['ID'] = $existing_page->ID;
                $page_args['post_content'] = $content;
                wp_update_post($page_args);
                update_post_meta($existing_page->ID, '_kolseg_seeded_page', '1');
                update_post_meta($existing_page->ID, '_kolseg_seed_signature', $content_signature);
            } else {
                wp_update_post(
                    array(
                        'ID' => $existing_page->ID,
                        'post_status' => 'publish',
                        'post_title' => $config['title'],
                        'post_excerpt' => $excerpt,
                    )
                );
            }

            if (!empty($config['is_front_page'])) {
                $front_page_id = $existing_page->ID;
            }

            continue;
        }

        $page_args['post_content'] = $content;
        $page_id = wp_insert_post($page_args);
        if (is_wp_error($page_id) || empty($page_id)) {
            continue;
        }

        update_post_meta($page_id, '_kolseg_seeded_page', '1');
        update_post_meta($page_id, '_kolseg_seed_signature', $content_signature);

        if (!empty($config['is_front_page'])) {
            $front_page_id = $page_id;
        }
    }

    if (!empty($front_page_id)) {
        update_option('show_on_front', 'page');
        update_option('page_on_front', $front_page_id);
    }
}

function kolseg_extract_main_content($html) {
    if (!preg_match('/<main\b[^>]*>(.*)<\/main>/isU', $html, $matches)) {
        return '';
    }

    return trim($matches[1]);
}

function kolseg_extract_meta_description($html) {
    if (!preg_match('/<meta\s+name="description"\s+content="([^"]*)"/i', $html, $matches)) {
        return '';
    }

    return sanitize_text_field(html_entity_decode($matches[1], ENT_QUOTES, 'UTF-8'));
}

function kolseg_transform_imported_html($content) {
    $page_map = kolseg_get_seed_page_map();
    $theme_assets_url = trailingslashit(get_template_directory_uri()) . 'assets/';
    $allowed_html = wp_kses_allowed_html('post');

    $allowed_html['iframe'] = array(
        'class' => true,
        'title' => true,
        'aria-label' => true,
        'loading' => true,
        'src' => true,
        'width' => true,
        'height' => true,
        'allow' => true,
        'allowfullscreen' => true,
        'referrerpolicy' => true,
    );
    $allowed_html['form'] = array(
        'class' => true,
        'action' => true,
        'method' => true,
    );
    $allowed_html['input'] = array(
        'type' => true,
        'name' => true,
        'placeholder' => true,
        'value' => true,
    );
    $allowed_html['select'] = array(
        'name' => true,
    );
    $allowed_html['option'] = array(
        'selected' => true,
        'value' => true,
    );
    $allowed_html['textarea'] = array(
        'name' => true,
        'rows' => true,
        'placeholder' => true,
    );
    $allowed_html['button'] = array(
        'class' => true,
        'type' => true,
        'disabled' => true,
        'data-filter' => true,
        'aria-label' => true,
    );
    $allowed_html['a']['data-video-provider'] = true;
    $allowed_html['a']['data-video-id'] = true;
    $allowed_html['a']['aria-label'] = true;
    $allowed_html['article']['data-category'] = true;

    $content = str_replace('src="assets/', 'src="' . esc_url($theme_assets_url), $content);
    $content = str_replace("src='assets/", "src='" . esc_url($theme_assets_url), $content);
    $content = str_replace('href="assets/', 'href="' . esc_url($theme_assets_url), $content);
    $content = str_replace("href='assets/", "href='" . esc_url($theme_assets_url), $content);

    foreach ($page_map as $slug => $config) {
        $page_url = kolseg_get_page_url_by_slug($slug);
        $page_file = $config['source'];

        $content = str_replace('href="' . $page_file . '#', 'href="' . esc_url(trailingslashit($page_url)) . '#', $content);
        $content = str_replace("href='" . $page_file . '#', "href='" . esc_url(trailingslashit($page_url)) . '#', $content);
        $content = str_replace('href="' . $page_file . '"', 'href="' . esc_url($page_url) . '"', $content);
        $content = str_replace("href='" . $page_file . "'", "href='" . esc_url($page_url) . "'", $content);
    }

    return wp_kses($content, $allowed_html);
}

function kolseg_wrap_seeded_content($content) {
    return "<!-- wp:html -->\n" . $content . "\n<!-- /wp:html -->";
}

function kolseg_get_seed_source_content($slug) {
    $config = kolseg_get_seed_config_by_slug($slug);
    if (empty($config) || empty($config['source'])) {
        return '';
    }

    $source_path = trailingslashit(get_template_directory()) . 'source-html/' . $config['source'];
    if (!file_exists($source_path)) {
        return '';
    }

    $source_html = file_get_contents($source_path);
    if (false === $source_html) {
        return '';
    }

    $content = kolseg_extract_main_content($source_html);
    if (empty($content)) {
        return '';
    }

    return kolseg_transform_imported_html($content);
}

function kolseg_set_front_page_by_slug($slug = 'home') {
    $page = get_page_by_path($slug, OBJECT, 'page');
    if (!($page instanceof WP_Post)) {
        return false;
    }

    update_option('show_on_front', 'page');
    update_option('page_on_front', $page->ID);

    return true;
}

function kolseg_register_setup_page() {
    add_theme_page(
        __('Kolseg Setup', 'kolseg-design-services'),
        __('Kolseg Setup', 'kolseg-design-services'),
        'manage_options',
        'kolseg-setup',
        'kolseg_render_setup_page'
    );
}
add_action('admin_menu', 'kolseg_register_setup_page');

function kolseg_handle_setup_actions() {
    if (!is_admin() || !current_user_can('manage_options')) {
        return;
    }

    if (!isset($_GET['page']) || 'kolseg-setup' !== $_GET['page']) {
        return;
    }

    if (!isset($_GET['kolseg_action'])) {
        return;
    }

    check_admin_referer('kolseg_setup_action');

    $action = sanitize_key(wp_unslash($_GET['kolseg_action']));
    $redirect_url = remove_query_arg(array('_wpnonce', 'kolseg_action', 'kolseg_notice'));

    if ('seed-pages' === $action) {
        kolseg_import_source_pages(false);
        kolseg_set_front_page_by_slug('home');
        wp_safe_redirect(add_query_arg('kolseg_notice', 'seeded', $redirect_url));
        exit;
    }

    if ('force-reseed' === $action) {
        kolseg_import_source_pages(true);
        kolseg_set_front_page_by_slug('home');
        wp_safe_redirect(add_query_arg('kolseg_notice', 'reseeded', $redirect_url));
        exit;
    }

    if ('set-front-page' === $action) {
        kolseg_set_front_page_by_slug('home');
        wp_safe_redirect(add_query_arg('kolseg_notice', 'front-page-set', $redirect_url));
        exit;
    }
}
add_action('admin_init', 'kolseg_handle_setup_actions');

function kolseg_render_setup_page() {
    $home_page = get_page_by_path('home', OBJECT, 'page');
    $front_page_id = (int) get_option('page_on_front');
    $is_front_page_set = $home_page instanceof WP_Post && $front_page_id === (int) $home_page->ID;
    $setup_url = admin_url('themes.php?page=kolseg-setup');
    $action_url = wp_nonce_url($setup_url, 'kolseg_setup_action');
    ?>
    <div class="wrap">
      <h1><?php esc_html_e('Kolseg Setup', 'kolseg-design-services'); ?></h1>
      <?php if (isset($_GET['kolseg_notice'])) : ?>
        <div class="notice notice-success is-dismissible">
          <p>
            <?php
            $notice = sanitize_key(wp_unslash($_GET['kolseg_notice']));
            if ('seeded' === $notice) {
                esc_html_e('Kolseg pages were created or refreshed where safe, and Home was set as the front page.', 'kolseg-design-services');
            } elseif ('reseeded' === $notice) {
                esc_html_e('Kolseg pages were force-refreshed from the bundled HTML files, and Home was set as the front page.', 'kolseg-design-services');
            } elseif ('front-page-set' === $notice) {
                esc_html_e('Home is now set as the front page.', 'kolseg-design-services');
            }
            ?>
          </p>
        </div>
      <?php endif; ?>
      <p><?php esc_html_e('Use these tools after uploading the theme if WordPress is still showing old page builder content or missing the seeded Kolseg pages.', 'kolseg-design-services'); ?></p>
      <p>
        <?php if ($is_front_page_set) : ?>
          <strong><?php esc_html_e('Front page status:', 'kolseg-design-services'); ?></strong>
          <?php esc_html_e('Home is correctly set as the front page.', 'kolseg-design-services'); ?>
        <?php else : ?>
          <strong><?php esc_html_e('Front page status:', 'kolseg-design-services'); ?></strong>
          <?php esc_html_e('Home is not currently set as the front page.', 'kolseg-design-services'); ?>
        <?php endif; ?>
      </p>
      <p>
        <a class="button button-primary" href="<?php echo esc_url(add_query_arg('kolseg_action', 'seed-pages', $action_url)); ?>">
          <?php esc_html_e('Create / Sync Kolseg Pages', 'kolseg-design-services'); ?>
        </a>
        <a class="button" href="<?php echo esc_url(add_query_arg('kolseg_action', 'set-front-page', $action_url)); ?>">
          <?php esc_html_e('Set Home As Front Page', 'kolseg-design-services'); ?>
        </a>
        <a class="button button-secondary" href="<?php echo esc_url(add_query_arg('kolseg_action', 'force-reseed', $action_url)); ?>">
          <?php esc_html_e('Force Refresh Seeded Pages', 'kolseg-design-services'); ?>
        </a>
      </p>
      <p><?php esc_html_e('Force Refresh will replace the content of existing Kolseg seeded pages with the bundled HTML version. Use it when the site is still showing old homepage content from a previous builder setup.', 'kolseg-design-services'); ?></p>
    </div>
    <?php
}
