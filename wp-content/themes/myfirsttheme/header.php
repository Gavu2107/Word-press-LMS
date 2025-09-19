<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<header id="site-header" role="banner">
  <div class="container">
    <div class="site-branding">
      <?php if (has_custom_logo()) : ?>
        <?php the_custom_logo(); ?>
      <?php else : ?>
        <h1 class="site-title">
          <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
            <?php bloginfo('name'); ?>
          </a>
        </h1>
        <p class="site-description"><?php bloginfo('description'); ?></p>
      <?php endif; ?>
    </div><!-- .site-branding -->

    <nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e('Main Menu', 'textdomain'); ?>">
      <?php
        wp_nav_menu([
          'theme_location' => 'main-menu',
          'menu_class'     => 'menu',
          'container'      => false,
          'fallback_cb'    => false
        ]);
      ?>
    </nav><!-- #site-navigation -->
  </div><!-- .container -->
</header>
