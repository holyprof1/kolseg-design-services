<?php get_header(); ?>
<main>
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <?php if (kolseg_get_seed_config_by_slug(kolseg_get_content_slug())) : ?>
      <?php kolseg_render_page_content(); ?>
    <?php elseif (trim((string) get_the_content())) : ?>
      <?php the_content(); ?>
    <?php else : ?>
      <section class="hero hero-home hero-home-clean">
        <div class="hero-media">
          <img src="<?php echo esc_url(kolseg_get_theme_image('kolseg_hero_bg', 'live-studio-main.jpg')); ?>" alt="KOLSEG live studio setup">
        </div>
        <div class="hero-overlay"></div>
        <div class="container hero-clean-grid">
          <div class="hero-clean-copy reveal">
            <p class="eyebrow">Making Imagination A Statement</p>
            <h1><?php echo esc_html(get_theme_mod('kolseg_hero_title', 'Full-service design, media, sound, lighting, fabrication, interiors, and event production.')); ?></h1>
            <p class="hero-text"><?php echo esc_html(get_theme_mod('kolseg_hero_text', 'KOLSEG creates stages, backdrops, pavilions, studio content, sound systems, lighting experiences, interiors, and launch-ready environments with the technical ability to deliver the spectacular.')); ?></p>
            <div class="hero-actions">
              <a class="button button-primary" href="<?php echo esc_url(kolseg_get_page_url_by_slug('services')); ?>">See Popular Categories</a>
              <a class="button button-secondary" href="<?php echo esc_url(kolseg_get_page_url_by_slug('services')); ?>">View All Services</a>
            </div>
          </div>
          <div class="hero-clean-stack reveal">
            <a class="hero-stack-card large" href="<?php echo esc_url(kolseg_get_page_url_by_slug('portfolio')); ?>">
              <img src="<?php echo esc_url(kolseg_get_theme_image('kolseg_hero_main_card', 'crawl-live-studio-stage.jpg')); ?>" alt="KOLSEG live studio stage">
              <div class="hero-stack-overlay"><strong>Main Studio</strong><span>Live sessions, recordings, rehearsals, and intimate events.</span></div>
            </a>
            <a class="hero-stack-card" href="<?php echo esc_url(kolseg_get_page_url_by_slug('service-photography-videography')); ?>">
              <img src="<?php echo esc_url(kolseg_get_theme_image('kolseg_hero_photo_card', 'kolseg-visual-coverage.jpg')); ?>" alt="KOLSEG media production">
              <div class="hero-stack-overlay"><strong>Photography / Videography</strong><span>Studio content, visual coverage, and production-led storytelling.</span></div>
            </a>
            <a class="hero-stack-card" href="<?php echo esc_url(kolseg_get_page_url_by_slug('service-lighting')); ?>">
              <img src="<?php echo esc_url(kolseg_get_theme_image('kolseg_hero_light_card', 'kolseg-lighting-rig.jpg')); ?>" alt="KOLSEG lighting service">
              <div class="hero-stack-overlay"><strong>Lighting</strong><span>Concert mood, venue drama, and technical control.</span></div>
            </a>
          </div>
        </div>
      </section>

      <section class="info-strip">
        <div class="container info-strip-grid reveal">
          <article class="info-chip"><span>Experience</span><strong>Over a decade of design, production, and event execution.</strong></article>
          <article class="info-chip"><span>Coverage</span><strong>Media, sound, lighting, interior work, stage sets, fabrication, agency, and renting.</strong></article>
          <article class="info-chip"><span>Strength</span><strong>Concept, technical delivery, and physical execution under one workflow.</strong></article>
          <article class="info-chip"><span>Base</span><strong>Sango-Ota, Ogun State, serving projects across Nigeria and beyond.</strong></article>
        </div>
      </section>
    <?php endif; ?>
  <?php endwhile; else : ?>
    <?php
    $fallback_content = kolseg_get_seed_source_content('home');
    if (!empty($fallback_content)) :
    ?>
      <?php echo $fallback_content; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
    <?php endif; ?>
  <?php endif; ?>
</main>
<?php get_footer(); ?>
