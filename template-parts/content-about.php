<article>

  <header class="hero">

    <?php
      $images = get_field( 'about_carousel' );
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

    <?php if ( get_field('about_hero_title') && get_field('about_hero_description') ) : ?>
      <div class="hero-content">
        <h2><?php the_field('about_hero_title'); ?></h2>
        <p><?php the_field('about_hero_description') ?></p>
      </div>
    <?php endif; ?>

  </header>

  <div class="content">
    <?php the_content(); ?>
  </div>

  <?php if ( have_rows('about_team') ): ?>

    <section class="team">

      <h3 class="hidden"><?php esc_html_e('Team', 'gieffe-videogames'); ?></h3>

      <?php while ( have_rows('about_team') ) : the_row(); ?>
        <article class="team-item">

          <?php if ( get_sub_field('about_team_image') ): ?>
            <div class="team-item-image">
              <?php echo wp_get_attachment_image(get_sub_field('about_team_image'), 'thumbnail', false, array()); ?>
            </div>
          <?php endif; ?>
          
          <?php if ( get_sub_field('about_team_name') && get_sub_field('about_team_role') ): ?>
            <div class="team-item-content">
              <h4><?php the_sub_field('about_team_name'); ?></h4>
              <p><?php the_sub_field('about_team_role'); ?></p>
            </div>
          <?php endif; ?>

        </article>
      <?php endwhile; ?>

    </section>

  <?php endif; ?>

  <?php get_template_part('template-parts/content', 'partners'); ?>

</article>
