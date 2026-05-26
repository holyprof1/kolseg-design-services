<?php get_header(); ?>
<main>
  <?php
  $kolseg_seed_slug = kolseg_get_content_slug();
  $kolseg_seed_config = kolseg_get_seed_config_by_slug($kolseg_seed_slug);
  if (empty($kolseg_seed_config)) {
      $kolseg_seed_slug = kolseg_normalize_seed_slug(kolseg_get_requested_slug());
      $kolseg_seed_config = kolseg_get_seed_config_by_slug($kolseg_seed_slug);
  }
  ?>
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <?php if ($kolseg_seed_config) : ?>
      <?php kolseg_render_page_content(); ?>
    <?php elseif (trim((string) get_the_content())) : ?>
      <?php the_content(); ?>
    <?php else : ?>
      <section class="page-hero">
        <div class="container page-hero-inner reveal">
          <p class="eyebrow"><?php echo esc_html(get_the_title()); ?></p>
          <h1><?php the_title(); ?></h1>
          <?php if (has_excerpt()) : ?>
            <p><?php echo esc_html(get_the_excerpt()); ?></p>
          <?php endif; ?>
        </div>
      </section>
      <section class="section">
        <div class="container">
          <article class="contact-card reveal">
            <?php the_content(); ?>
          </article>
        </div>
      </section>
    <?php endif; ?>
  <?php endwhile; else : ?>
    <?php
    $requested_slug = kolseg_normalize_seed_slug(kolseg_get_requested_slug());
    $fallback_content = kolseg_get_seed_source_content($requested_slug);
    if (!empty($fallback_content)) :
    ?>
      <?php echo $fallback_content; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
    <?php endif; ?>
  <?php endif; ?>
</main>
<?php get_footer(); ?>
