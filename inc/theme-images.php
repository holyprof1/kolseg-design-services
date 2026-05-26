<?php
if (!defined('ABSPATH')) {
    exit;
}

function kolseg_get_theme_image_catalog() {
    return array(
        'kolseg_navigation_images' => array(
            'title' => __('Navigation Preview Images', 'kolseg-design-services'),
            'priority' => 31,
            'images' => array(
                'kolseg_nav_media_image' => array(
                    'label' => __('Services Menu Media Preview', 'kolseg-design-services'),
                    'fallback' => 'drive-extended/photo-hanna-main.jpg',
                ),
                'kolseg_nav_production_image' => array(
                    'label' => __('Services Menu Production Preview', 'kolseg-design-services'),
                    'fallback' => 'drive-extended/audio-session-2.jpg',
                ),
                'kolseg_nav_build_image' => array(
                    'label' => __('Services Menu Build Preview', 'kolseg-design-services'),
                    'fallback' => 'stage-fabrication-wide.jpg',
                ),
            ),
        ),
        'kolseg_home_images' => array(
            'title' => __('Homepage Images', 'kolseg-design-services'),
            'priority' => 32,
            'images' => array(
                'kolseg_hero_bg' => array(
                    'label' => __('Hero Background', 'kolseg-design-services'),
                    'fallback' => 'live-studio-main.jpg',
                ),
                'kolseg_hero_main_card' => array(
                    'label' => __('Hero Main Feature', 'kolseg-design-services'),
                    'fallback' => 'live-studio-stage.jpg',
                ),
                'kolseg_hero_photo_card' => array(
                    'label' => __('Hero Media Card', 'kolseg-design-services'),
                    'fallback' => 'hero-live-studio.jpg',
                ),
                'kolseg_hero_light_card' => array(
                    'label' => __('Hero Lighting Card', 'kolseg-design-services'),
                    'fallback' => 'lighting-stage.jpg',
                ),
                'kolseg_home_photo_portrait_image' => array(
                    'label' => __('Homepage Portrait Feature', 'kolseg-design-services'),
                    'fallback' => 'drive-extended/photo-hanna-main.jpg',
                ),
                'kolseg_home_photo_editorial_image' => array(
                    'label' => __('Homepage Editorial Feature', 'kolseg-design-services'),
                    'fallback' => 'drive-extended/photo-hanna-alt.jpg',
                ),
                'kolseg_home_video_vimeo_image' => array(
                    'label' => __('Homepage Featured Video Card 1', 'kolseg-design-services'),
                    'fallback' => 'drive-extended/photo-retouched-fashion.jpg',
                ),
                'kolseg_home_video_youtube_image' => array(
                    'label' => __('Homepage Featured Video Card 2', 'kolseg-design-services'),
                    'fallback' => 'event-lighting.jpg',
                ),
                'kolseg_home_projects_showcase_image' => array(
                    'label' => __('Homepage Project Showcase 1', 'kolseg-design-services'),
                    'fallback' => 'drive-extended/event-aso-3.jpg',
                ),
                'kolseg_home_projects_showcase_alt_image' => array(
                    'label' => __('Homepage Project Showcase 2', 'kolseg-design-services'),
                    'fallback' => 'drive-extended/event-aso-5.jpg',
                ),
                'kolseg_home_projects_showcase_detail_image' => array(
                    'label' => __('Homepage Project Showcase 3', 'kolseg-design-services'),
                    'fallback' => 'drive-extended/lighting-show-a.jpg',
                ),
            ),
        ),
        'kolseg_service_images' => array(
            'title' => __('Service & Portfolio Images', 'kolseg-design-services'),
            'priority' => 33,
            'images' => array(
                'kolseg_media_primary_image' => array(
                    'label' => __('Photography Primary', 'kolseg-design-services'),
                    'fallback' => 'services-drive/service-photo-main.jpg',
                ),
                'kolseg_media_secondary_image' => array(
                    'label' => __('Photography Secondary', 'kolseg-design-services'),
                    'fallback' => 'services-drive/service-photo-alt-1.jpg',
                ),
                'kolseg_media_detail_image' => array(
                    'label' => __('Photography Detail', 'kolseg-design-services'),
                    'fallback' => 'services-drive/service-photo-alt-2.jpg',
                ),
                'kolseg_media_cover_image' => array(
                    'label' => __('Photography Cover', 'kolseg-design-services'),
                    'fallback' => 'services-drive/service-photo-cover.jpg',
                ),
                'kolseg_photo_gallery_campaign_image' => array(
                    'label' => __('Photography Campaign Detail', 'kolseg-design-services'),
                    'fallback' => 'drive-extended/photo-bimbo-3.jpg',
                ),
                'kolseg_photo_gallery_editorial_image' => array(
                    'label' => __('Photography Editorial Detail', 'kolseg-design-services'),
                    'fallback' => 'services-drive/service-agency-main.jpg',
                ),
                'kolseg_photo_gallery_brand_image' => array(
                    'label' => __('Photography Brand Detail', 'kolseg-design-services'),
                    'fallback' => 'drive-extended/photo-retouched-fashion.jpg',
                ),
                'kolseg_podcast_primary_image' => array(
                    'label' => __('Podcast Primary', 'kolseg-design-services'),
                    'fallback' => 'services-drive/service-podcast-main.jpg',
                ),
                'kolseg_podcast_secondary_image' => array(
                    'label' => __('Podcast Secondary', 'kolseg-design-services'),
                    'fallback' => 'services-drive/service-podcast-alt-1.jpg',
                ),
                'kolseg_podcast_gallery_set_image' => array(
                    'label' => __('Podcast Studio Detail', 'kolseg-design-services'),
                    'fallback' => 'drive-extended/podcast-setup-6.jpg',
                ),
                'kolseg_podcast_gallery_stage_image' => array(
                    'label' => __('Podcast Set Detail', 'kolseg-design-services'),
                    'fallback' => 'services-drive/service-podcast-alt-2.jpg',
                ),
                'kolseg_agency_primary_image' => array(
                    'label' => __('Agency / Brand Primary', 'kolseg-design-services'),
                    'fallback' => 'services-drive/service-brand-building.jpg',
                ),
                'kolseg_agency_gallery_portrait_image' => array(
                    'label' => __('Agency Portrait Detail', 'kolseg-design-services'),
                    'fallback' => 'drive-extended/photo-hanna-main.jpg',
                ),
                'kolseg_agency_gallery_rollout_image' => array(
                    'label' => __('Agency Rollout Detail', 'kolseg-design-services'),
                    'fallback' => 'drive-extended/event-aso-5.jpg',
                ),
                'kolseg_sound_primary_image' => array(
                    'label' => __('Sound / PA Primary', 'kolseg-design-services'),
                    'fallback' => 'services-drive/service-sound-main.jpg',
                ),
                'kolseg_sound_secondary_image' => array(
                    'label' => __('Sound / PA Secondary', 'kolseg-design-services'),
                    'fallback' => 'services-drive/service-sound-alt-2.jpg',
                ),
                'kolseg_sound_gallery_session_image' => array(
                    'label' => __('Sound Session Detail', 'kolseg-design-services'),
                    'fallback' => 'drive-extended/audio-session-2.jpg',
                ),
                'kolseg_sound_gallery_console_image' => array(
                    'label' => __('Sound Console Detail', 'kolseg-design-services'),
                    'fallback' => 'services-drive/service-sound-alt-1.jpg',
                ),
                'kolseg_lighting_primary_image' => array(
                    'label' => __('Lighting Primary', 'kolseg-design-services'),
                    'fallback' => 'services-drive/service-lighting-main.jpg',
                ),
                'kolseg_lighting_secondary_image' => array(
                    'label' => __('Lighting Secondary', 'kolseg-design-services'),
                    'fallback' => 'services-drive/service-lighting-alt-1.jpg',
                ),
                'kolseg_lighting_gallery_stage_image' => array(
                    'label' => __('Lighting Stage Detail', 'kolseg-design-services'),
                    'fallback' => 'services-drive/service-lighting-alt-2.jpg',
                ),
                'kolseg_lighting_gallery_nightlife_image' => array(
                    'label' => __('Lighting Nightlife Detail', 'kolseg-design-services'),
                    'fallback' => 'drive-extended/design-escape-lagos.jpg',
                ),
                'kolseg_audio_primary_image' => array(
                    'label' => __('Audio Production Primary', 'kolseg-design-services'),
                    'fallback' => 'services-drive/service-audio-main.jpg',
                ),
                'kolseg_audio_secondary_image' => array(
                    'label' => __('Audio Production Secondary', 'kolseg-design-services'),
                    'fallback' => 'services-drive/service-audio-alt-1.jpg',
                ),
                'kolseg_audio_gallery_room_image' => array(
                    'label' => __('Audio Room Detail', 'kolseg-design-services'),
                    'fallback' => 'drive-extended/audio-session-2.jpg',
                ),
                'kolseg_audio_gallery_content_image' => array(
                    'label' => __('Audio For Content Detail', 'kolseg-design-services'),
                    'fallback' => 'services-drive/service-audio-alt-2.jpg',
                ),
                'kolseg_audio_gallery_performance_image' => array(
                    'label' => __('Audio Performance Detail', 'kolseg-design-services'),
                    'fallback' => 'live-studio-stage.jpg',
                ),
                'kolseg_design_primary_image' => array(
                    'label' => __('Design / Fabrication Primary', 'kolseg-design-services'),
                    'fallback' => 'services-drive/service-design-main.jpg',
                ),
                'kolseg_design_secondary_image' => array(
                    'label' => __('Design / Fabrication Secondary', 'kolseg-design-services'),
                    'fallback' => 'services-drive/service-design-alt-1.jpg',
                ),
                'kolseg_design_detail_image' => array(
                    'label' => __('Design / Fabrication Detail', 'kolseg-design-services'),
                    'fallback' => 'services-drive/service-design-alt-2.jpg',
                ),
                'kolseg_design_gallery_interior_image' => array(
                    'label' => __('Design Interior Detail', 'kolseg-design-services'),
                    'fallback' => 'drive-extended/interior-cf83.jpg',
                ),
                'kolseg_design_gallery_finish_image' => array(
                    'label' => __('Design Finish Detail', 'kolseg-design-services'),
                    'fallback' => 'services-drive/service-events-alt-2.jpg',
                ),
                'kolseg_events_primary_image' => array(
                    'label' => __('Events Primary', 'kolseg-design-services'),
                    'fallback' => 'services-drive/service-events-main.jpg',
                ),
                'kolseg_events_secondary_image' => array(
                    'label' => __('Events Secondary', 'kolseg-design-services'),
                    'fallback' => 'services-drive/service-events-alt-1.jpg',
                ),
                'kolseg_events_detail_image' => array(
                    'label' => __('Events Detail', 'kolseg-design-services'),
                    'fallback' => 'services-drive/service-events-alt-2.jpg',
                ),
                'kolseg_events_gallery_rollout_image' => array(
                    'label' => __('Events Rollout Detail', 'kolseg-design-services'),
                    'fallback' => 'drive-extended/event-aso-3.jpg',
                ),
                'kolseg_events_gallery_nightlife_image' => array(
                    'label' => __('Events Nightlife Detail', 'kolseg-design-services'),
                    'fallback' => 'drive-extended/design-escape-lagos.jpg',
                ),
                'kolseg_contracts_primary_image' => array(
                    'label' => __('Contracts / Rentals Primary', 'kolseg-design-services'),
                    'fallback' => 'services-drive/service-contracts-main.jpg',
                ),
                'kolseg_contracts_gallery_rental_image' => array(
                    'label' => __('Contracts Rental Detail', 'kolseg-design-services'),
                    'fallback' => 'services-drive/service-renting-main.jpg',
                ),
                'kolseg_contracts_gallery_facility_image' => array(
                    'label' => __('Contracts Facility Detail', 'kolseg-design-services'),
                    'fallback' => 'live-studio-main.jpg',
                ),
                'kolseg_technical_primary_image' => array(
                    'label' => __('Technical Support Primary', 'kolseg-design-services'),
                    'fallback' => 'services-drive/service-sound-alt-1.jpg',
                ),
                'kolseg_portfolio_video_vimeo_image' => array(
                    'label' => __('Portfolio Media Promo 1', 'kolseg-design-services'),
                    'fallback' => 'drive-extended/photo-bimbo-3.jpg',
                ),
                'kolseg_portfolio_video_youtube_image' => array(
                    'label' => __('Portfolio Media Promo 2', 'kolseg-design-services'),
                    'fallback' => 'drive-extended/event-aso-5.jpg',
                ),
            ),
        ),
        'kolseg_brand_images' => array(
            'title' => __('Brand Story Images', 'kolseg-design-services'),
            'priority' => 34,
            'images' => array(
                'kolseg_about_story_image' => array(
                    'label' => __('About Story Image', 'kolseg-design-services'),
                    'fallback' => 'services-drive/service-events-alt-2.jpg',
                ),
                'kolseg_contact_cta_image' => array(
                    'label' => __('Contact CTA Background', 'kolseg-design-services'),
                    'fallback' => 'services-drive/service-photo-cover.jpg',
                ),
                'kolseg_about_video_vimeo_image' => array(
                    'label' => __('About Media Card 1', 'kolseg-design-services'),
                    'fallback' => 'drive-extended/photo-hanna-alt.jpg',
                ),
                'kolseg_about_video_youtube_image' => array(
                    'label' => __('About Media Card 2', 'kolseg-design-services'),
                    'fallback' => 'drive-extended/event-aso-3.jpg',
                ),
                'kolseg_contact_support_image' => array(
                    'label' => __('Contact Support Image', 'kolseg-design-services'),
                    'fallback' => 'drive-extended/photo-hanna-main.jpg',
                ),
                'kolseg_contact_support_secondary_image' => array(
                    'label' => __('Contact Support Secondary Image', 'kolseg-design-services'),
                    'fallback' => 'drive-extended/podcast-setup-6.jpg',
                ),
                'kolseg_top_projects_hero_image' => array(
                    'label' => __('Top Projects Hero Image', 'kolseg-design-services'),
                    'fallback' => 'drive-extended/event-aso-5.jpg',
                ),
                'kolseg_top_projects_showcase_primary' => array(
                    'label' => __('Top Projects Showcase 1', 'kolseg-design-services'),
                    'fallback' => 'drive-extended/event-aso-3.jpg',
                ),
                'kolseg_top_projects_showcase_secondary' => array(
                    'label' => __('Top Projects Showcase 2', 'kolseg-design-services'),
                    'fallback' => 'drive-extended/audio-session-2.jpg',
                ),
                'kolseg_top_projects_showcase_tertiary' => array(
                    'label' => __('Top Projects Showcase 3', 'kolseg-design-services'),
                    'fallback' => 'drive-extended/photo-hanna-alt.jpg',
                ),
            ),
        ),
    );
}

function kolseg_get_theme_image_setting_map() {
    static $settings = null;

    if (null !== $settings) {
        return $settings;
    }

    $settings = array();
    foreach (kolseg_get_theme_image_catalog() as $group) {
        if (empty($group['images']) || !is_array($group['images'])) {
            continue;
        }

        foreach ($group['images'] as $setting => $image) {
            $settings[$setting] = $image;
        }
    }

    return $settings;
}

function kolseg_get_theme_image_meta($setting) {
    $settings = kolseg_get_theme_image_setting_map();
    if (!isset($settings[$setting])) {
        return array();
    }

    return $settings[$setting];
}

function kolseg_get_theme_image_fallback($setting, $fallback = '') {
    $meta = kolseg_get_theme_image_meta($setting);
    $fallback_path = !empty($fallback) ? $fallback : (!empty($meta['fallback']) ? $meta['fallback'] : '');

    if (empty($fallback_path)) {
        return '';
    }

    return trailingslashit(get_template_directory_uri()) . 'assets/images/' . ltrim($fallback_path, '/');
}

function kolseg_replace_theme_image_tokens($content) {
    return preg_replace_callback(
        '/\{\{kolseg_image:([a-z0-9_\-]+)(?:\|([^}]+))?\}\}/i',
        static function ($matches) {
            $setting = sanitize_key($matches[1]);
            $fallback = isset($matches[2]) ? sanitize_text_field(trim($matches[2])) : '';

            return esc_url(kolseg_get_theme_image($setting, $fallback));
        },
        $content
    );
}
