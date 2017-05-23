<?php if ( paginate_links() ) : ?>
  <nav class="pagination<?php echo ( $template_args['position'] === 'top' ) ? ' pagination--top' : ' pagination--bottom' ?>">
    <h4 class="hidden"><?php esc_html_e('Pagination', 'gieffe-videogames'); ?></h4>
    <div class="pagination-items">
      <?php
        $options = array(
          'prev_next'    => true,
          'prev_text'    => __('« Previous', 'gieffe-videogames'),
          'next_text'    => __('Next »', 'gieffe-videogames'),
          'type'         => 'plain'
        );
        echo paginate_links( $options );
      ?>
    </div>
  </nav>
<?php endif; ?>
