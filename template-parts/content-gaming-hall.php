<article>

  <header class="hero">

    <?php
      $images = get_field( 'gaming_hall_carousel' );
      if ( $images ) :
    ?>
      <div class="hero-carousel">
        <ul>
          <?php
            foreach ( $images as $image ) :
            $image = $image[ID];
          ?>
            <li>
              <?php echo wp_get_attachment_image( $image, 'large', false, array() ); ?>
            </li>
          <?php endforeach; ?>
        </ul>
      </div>
    <?php elseif ( has_post_thumbnail() ): ?>
      <div class="hero-image">
        <?php the_post_thumbnail( 'large' ); ?>
      </div>
    <?php endif; ?>

    <?php if ( get_field('gaming_hall_hero_title') && get_field('gaming_hall_hero_description') ) : ?>
      <div class="hero-content">
        <h2><?php the_field('gaming_hall_hero_title'); ?></h2>
        <p><?php the_field('gaming_hall_hero_description') ?></p>
      </div>
    <?php endif; ?>

  </header>

  <?php if ( have_rows('gaming_hall_locations') ) : ?>
    <div class="locations">
      <?php while ( have_rows('gaming_hall_locations') ) : the_row(); ?>
        <article class="locations-item">

          <?php if ( get_sub_field( 'gaming_hall_location_image' ) ): ?>
            <div class="location-image">
              <?php echo wp_get_attachment_image(get_sub_field('gaming_hall_location_image'), 'medium', false, array()); ?>
            </div>
          <?php endif; ?>

          <?php if ( get_sub_field( 'gaming_hall_location_name' ) && get_sub_field( 'gaming_hall_location_description' ) ): ?>
            <div class="location-content">
              <h3><?php the_sub_field('gaming_hall_location_name'); ?></h3>
              <?php the_sub_field('gaming_hall_location_description'); ?>
            </div>
          <?php endif; ?>

        </article>
      <?php endwhile; ?>
    </div>
  <?php endif; ?>

</article>
