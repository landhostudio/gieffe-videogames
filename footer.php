    <?php if ( !is_page_template('template-pages/contact.php') ) : ?>
      <?php get_template_part('template-parts/content', 'cta'); ?>
    <?php endif; ?>
    <footer role="contentinfo" class="footer">
      <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?> – <?php bloginfo('description'); ?>.</p>
    </footer>
    <?php wp_footer(); ?>
  </body>
</html>
