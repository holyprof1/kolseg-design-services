<?php get_header(); ?>
<main>
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <?php if (kolseg_get_seed_config_by_slug(kolseg_get_content_slug())) : ?>
      <?php kolseg_render_page_content(); ?>
    <?php elseif (trim((string) get_the_content())) : ?>
      <?php the_content(); ?>
    <?php else : ?>
      <section class="page-hero">
        <div class="container page-hero-inner reveal">
          <p class="eyebrow">Services</p>
          <h1><?php the_title(); ?></h1>
          <p><?php the_excerpt(); ?></p>
        </div>
      </section>
      <section class="section">
        <div class="container">
          <article class="contact-card reveal"><?php the_content(); ?></article>
        </div>
      </section>
    <?php endif; ?>
  <?php endwhile; else : ?>
    <?php
    $requested_slug = kolseg_get_requested_slug();
    $fallback_content = kolseg_get_seed_source_content($requested_slug);
    if (!empty($fallback_content)) :
    ?>
      <?php echo $fallback_content; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
    <?php endif; ?>
  <?php endif; ?>
</main>
<?php get_footer(); ?>
