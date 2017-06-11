<?php get_header(); ?>

<?php if (have_posts()): ?>

  <article>

    <header class="hero">
      <div class="hero-content">

        <?php
          echo '<h2>';
          if ( is_home() ) {
            esc_html_e( 'News', 'gieffe-videogames' );
          } elseif ( is_category() ) {
            single_cat_title();
          } elseif ( is_tag() ) {
            single_tag_title();
          }
          echo '</h2>';
        ?>

        <?php if ( is_home() && get_field('index_hero_description', get_option('page_for_posts')) ) : ?>
          <p><?php the_field('index_hero_description', get_option('page_for_posts')) ?></p>
        <?php elseif ( is_search() ) : ?>
          <p><?php printf( __('Search Results for: %s', 'gieffe-videogames'), get_search_query() ); ?></p>
        <?php elseif ( category_description() ) : ?>
          <?php echo category_description(); ?>
        <?php elseif ( tag_description() ) : ?>
          <?php echo tag_description(); ?>
        <?php endif; ?>

        <?php if ( is_home() ) : ?>
          <nav class="hero-categories">
            <h3 class="hidden"><?php esc_html_e('News categories', 'gieffe-videogames'); ?></h3>
            <ul>
              <?php
                $categories = get_categories();
                foreach ($categories as $category) {
                  echo '<li><a href="' . get_category_link($category->term_id) . '" rel="bookmark">' . $category->name . '</a></li>';
                }
              ?>
            </ul>
          </nav>
        <?php endif; ?>

      </div>
    </header>

    <?php hm_get_template_part( 'template-parts/content-pagination', [ 'position' => 'top' ] ); ?>

    <div class="posts">
      <?php while ( have_posts() ) : the_post(); ?>
        <?php get_template_part('template-parts/content', 'preview'); ?>
      <?php endwhile; ?>
    </div>

    <?php hm_get_template_part( 'template-parts/content-pagination', [ 'position' => 'bottom' ] ); ?>

  </article>

<?php else: ?>
  <?php get_template_part('template-parts/content', 'none'); ?>
<?php endif; ?>

<strong>index.php</strong>

<?php get_footer(); ?>
