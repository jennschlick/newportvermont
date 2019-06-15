<footer class="footer">
  <div class="footer-top">
    <?php if ( is_active_sidebar( 'footer-top' ) ) : ?>
		    <?php dynamic_sidebar( 'footer-top' ); ?>
    <?php endif; ?>
  </div>
  <div class="footer-bottom">
    <?php if ( is_active_sidebar( 'footer-bottom' ) ) : ?>
		    <?php dynamic_sidebar( 'footer-bottom' ); ?>
    <?php endif; ?>
  </div>
</footer>

<?php wp_footer(); ?>

</body>
</html>
