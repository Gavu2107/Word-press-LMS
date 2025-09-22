<footer class="site-footer">
  <div class="footer-container">
    <div class="footer-left">
      <p>&copy; <?php echo date('Y'); ?> 
        <a href="<?php echo esc_url(home_url('/')); ?>">
          <?php bloginfo('name'); ?>
        </a>. All rights reserved.
      </p>
    </div>

    <div class="footer-right">
      <nav class="footer-nav">
        <?php
          wp_nav_menu(array(
            'theme_location' => 'footer',
            'container'      => false,
            'menu_class'     => 'footer-menu',
            'fallback_cb'    => false,
          ));
        ?>
      </nav>
      <div class="footer-social">
        <a href="#" target="_blank" rel="noopener">Facebook</a> |
        <a href="#" target="_blank" rel="noopener">Twitter</a> |
    
      </div>
    </div>
  </div>
</footer> 

<?php wp_footer(); ?>
</body>
</html>
