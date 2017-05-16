<article class="posts-item">
  <a rel="bookmark" href="<?php the_permalink(); ?>">
    <?php the_post_thumbnail('medium'); ?>
    <h3><?php the_title(); ?></h3>
    <?php the_excerpt(); ?>
    <?php get_template_part('template-parts/content', 'meta'); ?>
  </a>
</article>
