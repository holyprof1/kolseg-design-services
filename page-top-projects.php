<?php get_header(); ?>
<main>
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <?php if (trim((string) get_the_content())) : ?>
      <?php the_content(); ?>
    <?php else : ?>
      <section class="page-hero">
        <div class="container page-hero-inner reveal">
          <p class="eyebrow">Top Projects</p>
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
  <?php endwhile; endif; ?>
</main>
<?php get_footer(); ?>
