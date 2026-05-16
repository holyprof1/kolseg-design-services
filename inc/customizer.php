<?php
function kolseg_customize_register($wp_customize) {
    $wp_customize->add_section(
        'kolseg_home',
        array(
            'title' => __('Homepage Settings', 'kolseg-design-services'),
            'priority' => 30,
        )
    );

    $settings = array(
        'kolseg_hero_title' => 'Full-service design, media, sound, lighting, fabrication, interiors, and event production.',
        'kolseg_hero_text' => 'KOLSEG creates stages, backdrops, pavilions, studio content, sound systems, lighting experiences, interiors, and launch-ready environments with the technical ability to deliver the spectacular.',
        'kolseg_phone' => '08054859669',
        'kolseg_whatsapp' => '08025264488',
        'kolseg_meta_description' => 'KOLSEG delivers photography, videography, sound, lighting, stage fabrication, interiors, and event production from Ogun State for brands, events, and commercial spaces.',
        'kolseg_business_address' => 'Sango-Ota',
        'kolseg_business_city' => 'Sango-Ota',
        'kolseg_business_region' => 'Ogun State',
        'kolseg_business_country' => 'NG',
        'kolseg_instagram_url' => '',
        'kolseg_facebook_url' => '',
        'kolseg_youtube_url' => '',
    );

    foreach ($settings as $key => $default) {
        $sanitize_callback = 'sanitize_text_field';
        if ('kolseg_hero_text' === $key || 'kolseg_meta_description' === $key) {
            $sanitize_callback = 'sanitize_textarea_field';
        }
        if (in_array($key, array('kolseg_instagram_url', 'kolseg_facebook_url', 'kolseg_youtube_url'), true)) {
            $sanitize_callback = 'esc_url_raw';
        }

        $wp_customize->add_setting(
            $key,
            array(
                'default' => $default,
                'sanitize_callback' => $sanitize_callback,
            )
        );
    }

    $wp_customize->add_control('kolseg_hero_title', array('label' => __('Hero Title', 'kolseg-design-services'), 'section' => 'kolseg_home', 'type' => 'text'));
    $wp_customize->add_control('kolseg_hero_text', array('label' => __('Hero Text', 'kolseg-design-services'), 'section' => 'kolseg_home', 'type' => 'textarea'));
    $wp_customize->add_control('kolseg_phone', array('label' => __('Phone Number', 'kolseg-design-services'), 'section' => 'kolseg_home', 'type' => 'text'));
    $wp_customize->add_control('kolseg_whatsapp', array('label' => __('WhatsApp Number', 'kolseg-design-services'), 'section' => 'kolseg_home', 'type' => 'text'));
    $wp_customize->add_control('kolseg_meta_description', array('label' => __('Default SEO Description', 'kolseg-design-services'), 'section' => 'kolseg_home', 'type' => 'textarea'));
    $wp_customize->add_control('kolseg_business_address', array('label' => __('Business Street/Area', 'kolseg-design-services'), 'section' => 'kolseg_home', 'type' => 'text'));
    $wp_customize->add_control('kolseg_business_city', array('label' => __('Business City', 'kolseg-design-services'), 'section' => 'kolseg_home', 'type' => 'text'));
    $wp_customize->add_control('kolseg_business_region', array('label' => __('Business State/Region', 'kolseg-design-services'), 'section' => 'kolseg_home', 'type' => 'text'));
    $wp_customize->add_control('kolseg_business_country', array('label' => __('Business Country Code', 'kolseg-design-services'), 'section' => 'kolseg_home', 'type' => 'text'));
    $wp_customize->add_control('kolseg_instagram_url', array('label' => __('Instagram URL', 'kolseg-design-services'), 'section' => 'kolseg_home', 'type' => 'url'));
    $wp_customize->add_control('kolseg_facebook_url', array('label' => __('Facebook URL', 'kolseg-design-services'), 'section' => 'kolseg_home', 'type' => 'url'));
    $wp_customize->add_control('kolseg_youtube_url', array('label' => __('YouTube URL', 'kolseg-design-services'), 'section' => 'kolseg_home', 'type' => 'url'));

    $images = array(
        'kolseg_hero_bg' => array('label' => __('Hero Background', 'kolseg-design-services'), 'fallback' => 'live-studio-main.jpg'),
        'kolseg_hero_main_card' => array('label' => __('Hero Main Studio Image', 'kolseg-design-services'), 'fallback' => 'live-studio-stage.jpg'),
        'kolseg_hero_photo_card' => array('label' => __('Hero Media Image', 'kolseg-design-services'), 'fallback' => 'kolseg-visual-coverage.jpg'),
        'kolseg_hero_light_card' => array('label' => __('Hero Lighting Image', 'kolseg-design-services'), 'fallback' => 'kolseg-lighting-rig.jpg'),
    );

    foreach ($images as $setting => $args) {
        $wp_customize->add_setting($setting, array('sanitize_callback' => 'esc_url_raw'));
        $wp_customize->add_control(
            new WP_Customize_Image_Control(
                $wp_customize,
                $setting,
                array(
                    'label' => $args['label'],
                    'section' => 'kolseg_home',
                    'settings' => $setting,
                )
            )
        );
    }
}
add_action('customize_register', 'kolseg_customize_register');
