<?php get_header(); ?>
<main>
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <?php if (trim((string) get_the_content())) : ?>
      <?php the_content(); ?>
    <?php else : ?>
      <section class="page-hero">
        <div class="container page-hero-inner reveal">
          <p class="eyebrow">Contact Us</p>
          <h1><?php the_title(); ?></h1>
          <p><?php the_excerpt(); ?></p>
        </div>
      </section>
      <section class="section">
        <div class="container contact-layout">
          <div class="contact-card reveal"><?php the_content(); ?></div>
          <div class="contact-side">
            <div class="contact-card reveal">
              <p class="eyebrow">Direct Details</p>
              <h2>Call, WhatsApp, email, or follow.</h2>
              <div class="contact-info">
                <p><strong>Phone</strong><span><?php echo esc_html(get_theme_mod('kolseg_phone', '08054859669')); ?></span></p>
                <p><strong>WhatsApp</strong><span><?php echo esc_html(get_theme_mod('kolseg_whatsapp', '08025264488')); ?></span></p>
                <p><strong>Email</strong><span><?php echo esc_html(get_bloginfo('admin_email')); ?></span></p>
              </div>
            </div>
          </div>
        </div>
      </section>
    <?php endif; ?>
  <?php endwhile; endif; ?>
</main>
<?php get_footer(); ?>
