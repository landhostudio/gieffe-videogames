<?php if ( get_previous_post_link() || get_next_post_link() ) : ?>
  <nav class="post-navigation">
    <h4 class="hidden"><?php esc_html_e('Post navigation', 'gieffe-videogames'); ?></h4>
    <ul>
      <?php if ( get_previous_post_link() ) : ?>
        <li><?php previous_post_link('%link', __('&laquo; Previous', 'gieffe-videogames')); ?></li>
      <?php endif; ?>
      <?php if ( get_next_post_link() ) : ?>
        <li><?php next_post_link('%link', __('Next &raquo;', 'gieffe-videogames')); ?></li>
      <?php endif; ?>
    </ul>
  </nav>
<?php endif; ?>
