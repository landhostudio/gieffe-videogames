<article>

  <header class="hero">

    <?php
      $images = get_field( 'contact_carousel' );
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

    <?php if ( get_field( 'contact_hero_title' ) && get_field( 'contact_hero_description' ) ) : ?>
      <div class="hero-content">
        <h2><?php the_field( 'contact_hero_title' ); ?></h2>
        <p><?php the_field( 'contact_hero_description' ) ?></p>
      </div>
    <?php endif; ?>

  </header>

  <?php
    $location = get_field( 'contact_map' );
    if ( !empty( $location ) ) :
  ?>
    <div class="map">
      <div class="map-canvas">
        <div class="map-location" data-lat="<?php echo $location[ 'lat' ]; ?>" data-lng="<?php echo $location[ 'lng' ]; ?>"></div>
      </div>
    </div>
  <?php endif; ?>

  <div class="content">
    <?php the_content(); ?>
  </div>

</article>
