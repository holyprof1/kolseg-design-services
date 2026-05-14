<?php get_header(); ?>
<main>
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <?php if (trim((string) get_the_content())) : ?>
      <?php kolseg_render_page_content(); ?>
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
  <?php endwhile; endif; ?>
</main>
<?php get_footer(); ?>
