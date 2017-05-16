<article>

  <?php if ( get_field('vr_hero_title') && get_field('vr_hero_description') || has_post_thumbnail() ) : ?>
    <header class="hero">
      <div class="hero-content">
        <h2><?php the_field('vr_hero_title'); ?></h2>
        <p><?php the_field('vr_hero_description') ?></p>
      </div>
      <?php if ( has_post_thumbnail() ): ?>
        <div class="hero-image">
          <?php the_post_thumbnail('large'); ?>
        </div>
      <?php endif; ?>
    </header>
  <?php endif; ?>

  <?php if ( have_rows('vr_sections') ): ?>
    <?php while ( have_rows('vr_sections') ) : the_row(); ?>
      <section class="section">
        <?php if ( get_sub_field('vr_section_title') && get_sub_field('vr_section_description') ): ?>
          <div class="section-content">
            <h3><?php the_sub_field('vr_section_title'); ?></h3>
            <p><?php the_sub_field('vr_section_description'); ?></p>
          </div>
        <?php endif; ?>
        <?php if ( get_sub_field('vr_section_image') ): ?>
          <div class="section-image">
            <?php echo wp_get_attachment_image(get_sub_field('vr_section_image'), 'medium', false, array()); ?>
          </div>
        <?php endif; ?>
      </section>
    <?php endwhile; ?>
  <?php endif; ?>

  <?php
    // TODO: featured Virtual Reality products
  ?>

</article>
