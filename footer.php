    <?php if ( get_field('options_cta_title', option) && get_field('options_cta_description', option) && get_field('options_cta_link_1', option) && get_field('options_cta_link_1_name', option) && get_field('options_cta_link_2', option) && get_field('options_cta_link_2_name', option) ): ?>
      <aside class="cta">
        <div class="cta-content">
          <h4><?php the_field('options_cta_title', option); ?></h4>
          <p><?php the_field('options_cta_description', option); ?></p>
          <div class="button-group">
            <a href="mailto:<?php the_field('options_cta_link_1', option); ?>" rel="bookmark" class="button"><?php the_field('options_cta_link_1_name', option); ?></a>
            <a href="mailto:<?php the_field('options_cta_link_2', option); ?>" rel="bookmark" class="button"><?php the_field('options_cta_link_2_name', option); ?></a>
          </div>
        </div>
      </aside>
    <?php endif; ?>
    <footer role="contentinfo" class="footer">
      <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?> – <?php bloginfo('description'); ?>.</p>
    </footer>
    <?php wp_footer(); ?>
  </body>
</html>
