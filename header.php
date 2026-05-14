<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?> data-page="<?php echo esc_attr(kolseg_get_page_key()); ?>">
<?php if (function_exists('wp_body_open')) : ?>
  <?php wp_body_open(); ?>
<?php endif; ?>
<?php $kolseg_custom_logo_id = get_theme_mod('custom_logo'); ?>
<div class="site-shell">
  <header class="site-header">
    <a class="brand" href="<?php echo esc_url(home_url('/')); ?>" aria-label="KOLSEG home">
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
    <button class="menu-toggle" type="button" aria-expanded="false" aria-label="Open navigation">
      <span></span>
      <span></span>
    </button>
    <nav class="site-nav">
      <?php kolseg_render_primary_navigation(); ?>
    </nav>
  </header>
