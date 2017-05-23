<article>
  
  <header class="hero">
    <div class="hero-content">
      <h2><?php the_title(); ?></h2>
      <?php get_template_part('template-parts/content', 'meta'); ?>
    </div>
    <?php if ( has_post_thumbnail() ): ?>
      <div class="hero-image">
        <?php the_post_thumbnail('large'); ?>
      </div>
    <?php endif; ?>
  </header>

  <div class="content">
    <?php the_content(); ?>
  </div>
  
  <?php get_template_part('template-parts/content', 'post-breadcrumbs'); ?>

</article>
