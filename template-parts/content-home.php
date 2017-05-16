<article>

  <?php if ( get_field('home_hero_title') && get_field('home_hero_description') && get_field('home_hero_link') && get_field('home_hero_link_name') || has_post_thumbnail() ) : ?>
    <header class="hero">
      <div class="hero-content">
        <h2><?php the_field('home_hero_title'); ?></h2>
        <p><?php the_field('home_hero_description') ?></p>
        <a href="<?php the_field('home_hero_link'); ?>" rel="bookmark" class="button"><?php the_field('home_hero_link_name'); ?></a>
      </div>
      <?php if ( has_post_thumbnail() ): ?>
        <div class="hero-image">
          <?php the_post_thumbnail('large'); ?>
        </div>
      <?php endif; ?>
    </header>
  <?php endif; ?>

  <?php
    // TODO: featured product categories
  ?>

  <?php if ( have_rows('home_sections') ): ?>
    <?php while ( have_rows('home_sections') ) : the_row(); ?>
      <section class="section">
        <?php if ( get_sub_field('home_section_title') && get_sub_field('home_section_description') && get_sub_field('home_section_link') && get_sub_field('home_section_link_name') ): ?>
          <div class="section-content">
            <h3><?php the_sub_field('home_section_title'); ?></h3>
            <p><?php the_sub_field('home_section_description'); ?></p>
            <a href="<?php the_sub_field('home_section_link'); ?>" rel="bookmark" class="button"><?php the_sub_field('home_section_link_name'); ?></a>
          </div>
        <?php endif; ?>
        <?php if ( get_sub_field('home_section_image') ): ?>
          <div class="section-image">
            <?php echo wp_get_attachment_image(get_sub_field('home_section_image'), 'medium', false, array()); ?>
          </div>
        <?php endif; ?>
      </section>
    <?php endwhile; ?>
  <?php endif; ?>

  <?php get_template_part('template-parts/content', 'partners'); ?>

</article>
