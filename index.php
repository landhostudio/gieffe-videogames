<?php get_header(); ?>

<?php if (have_posts()): ?>

  <article>

    <header class="hero">
      <div class="hero-content">

        <?php
          echo '<h2>';
          esc_html_e('News', 'gieffe-videogames');
          if ( is_category() ) {
            echo ': ';
            single_cat_title();
          } elseif ( is_tag() ) {
            echo ': ';
            single_tag_title();
          }
          echo '</h2>';
        ?>

        <?php if ( is_search() ) : ?>
          <p><?php printf( __('Search Results for: %s', 'gieffe-videogames'), get_search_query() ); ?></p>
        <?php elseif ( get_field('index_hero_description', get_option('page_for_posts')) ) : ?>
          <p><?php the_field('index_hero_description', get_option('page_for_posts')) ?></p>
        <?php endif; ?>

        <?php if ( !is_category() && !is_tag() && !is_search() ) : ?>
          <section class="hero-categories">
            <h3 class="hidden"><?php esc_html_e('News categories', 'gieffe-videogames'); ?></h3>
            <ul>
              <?php
                $categories = get_categories();
                foreach ($categories as $category) {
                  echo '<li><a href="' . get_category_link($category->term_id) . '" rel="bookmark">' . $category->name . '</a></li>';
                }
              ?>
            </ul>
          </section>
        <?php endif; ?>

      </div>
    </header>

    <div class="posts">
      <?php while ( have_posts() ) : the_post(); ?>
        <?php get_template_part('template-parts/content', 'preview'); ?>
      <?php endwhile; ?>
    </div>

    <?php if ( paginate_links() ) : ?>
      <nav class="pagination">
        <h4><?php esc_html_e('Pagination', 'gieffe-videogames'); ?></h4>
        <?php
          $options = array(
          	'prev_next'          => true,
          	'prev_text'          => __('« Previous', 'gieffe-videogames'),
          	'next_text'          => __('Next »', 'gieffe-videogames'),
          	'type'               => 'list'
          );
          echo paginate_links( $options );
        ?>
      </nav>
    <?php endif; ?>

  </article>

<?php else: ?>
  <?php get_template_part('template-parts/content', 'none'); ?>
<?php endif; ?>

<?php get_footer(); ?>
