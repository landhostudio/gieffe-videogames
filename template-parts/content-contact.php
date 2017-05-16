<article>

  <?php if ( get_field('contact_hero_title') && get_field('contact_hero_description') || has_post_thumbnail() ) : ?>
    <header class="hero">
      <div class="hero-content">
        <h2><?php the_field('contact_hero_title'); ?></h2>
        <p><?php the_field('contact_hero_description') ?></p>
      </div>
      <?php if ( has_post_thumbnail() ): ?>
        <div class="hero-image">
          <?php the_post_thumbnail('large'); ?>
        </div>
      <?php endif; ?>
    </header>
  <?php endif; ?>

  <?php
    // TODO: contact form
  ?>

  <div class="content">
    <?php the_content(); ?>
  </div>

</article>
