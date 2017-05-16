<article>

  <?php if ( get_field('gaming_hall_hero_title') && get_field('gaming_hall_hero_description') || has_post_thumbnail() ) : ?>
    <header class="hero">
      <div class="hero-content">
        <h2><?php the_field('gaming_hall_hero_title'); ?></h2>
        <p><?php the_field('gaming_hall_hero_description') ?></p>
      </div>
      <?php if ( has_post_thumbnail() ): ?>
        <div class="hero-image">
          <?php the_post_thumbnail('large'); ?>
        </div>
      <?php endif; ?>
    </header>
  <?php endif; ?>

  <?php if ( have_rows('gaming_hall_map') ) : ?>
    <div class="map">
      <div class="map-canvas">
        <?php
          while ( have_rows('gaming_hall_map') ) : the_row();
          $location = get_sub_field('gaming_hall_location');
        ?>
          <div class="map-canvas-location" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>">
            <h3><?php the_sub_field('gaming_hall_location_name'); ?></h3>
            <?php the_sub_field('gaming_hall_location_description'); ?>
          </div>
        <?php endwhile; ?>
      </div>
    </div>
  <?php endif; ?>

  <?php if ( have_rows('gaming_hall_map') ) : ?>
    <div class="locations">
      <?php while ( have_rows('gaming_hall_map') ) : the_row(); ?>
        <article class="locations-item">
          <h3><?php the_sub_field('gaming_hall_location_name'); ?></h3>
          <?php the_sub_field('gaming_hall_location_description'); ?>
        </article>
      <?php endwhile; ?>
    </div>
  <?php endif; ?>

</article>
