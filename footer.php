<?php $kolseg_custom_logo_id = get_theme_mod('custom_logo'); ?>
  <footer class="site-footer">
    <div class="container footer-inner">
      <div>
        <a class="brand footer-brand" href="<?php echo esc_url(home_url('/')); ?>" aria-label="KOLSEG home">
          <span class="brand-logo">
            <?php if (!empty($kolseg_custom_logo_id)) : ?>
              <?php echo wp_get_attachment_image($kolseg_custom_logo_id, 'full', false, array('alt' => get_bloginfo('name') . ' logo')); ?>
            <?php else : ?>
              <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/kolseg-logo.png'); ?>" alt="KOLSEG logo">
            <?php endif; ?>
          </span>
          <span class="brand-text">
            <strong><?php bloginfo('name'); ?></strong>
            <small><?php bloginfo('description'); ?></small>
          </span>
        </a>
        <p class="footer-copy"><?php echo esc_html(get_theme_mod('kolseg_business_address', get_bloginfo('description'))); ?></p>
      </div>
      <div class="footer-links">
        <a href="<?php echo esc_url(kolseg_get_page_url_by_slug('services')); ?>"><?php echo esc_html(kolseg_get_page_title_by_slug('services', 'Services')); ?></a>
        <a href="<?php echo esc_url(kolseg_get_page_url_by_slug('portfolio')); ?>"><?php echo esc_html(kolseg_get_page_title_by_slug('portfolio', 'Portfolio')); ?></a>
        <a href="<?php echo esc_url(kolseg_get_page_url_by_slug('contact')); ?>"><?php echo esc_html(kolseg_get_page_title_by_slug('contact', 'Contact')); ?></a>
      </div>
    </div>
  </footer>
</div>
<?php wp_footer(); ?>
</body>
</html>
