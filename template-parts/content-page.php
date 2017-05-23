<article>

  <header class="hero">

    <?php if ( has_post_thumbnail() ): ?>
      <div class="hero-image">
        <?php the_post_thumbnail( 'large' ); ?>
      </div>
    <?php endif; ?>

    <div class="hero-content">
      <h2><?php the_title(); ?></h2>
    </div>

  </header>

  <div class="content">
    <?php the_content(); ?>
  </div>

</article>
