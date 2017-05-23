<nav class="breadcrums">

  <?php
    $news_link = get_permalink( get_option( 'page_for_posts' ) );
  ?>

  <div class="breadcrums-back">
    <a href="<?php echo $news_link; ?>" rel="prev"><?php esc_html_e( '&laquo; Back', 'gieffe-videogames' ); ?></a>
  </div>

  <div class="breadcrums-categories">
    <a href="<?php echo $news_link; ?>" rel="prev"><?php esc_html_e( 'News', 'gieffe-videogames' ); ?></a>
    <?php the_category( ', ' ); ?>
  </div>

</nav>
