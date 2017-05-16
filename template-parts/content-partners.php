<?php if ( have_rows('options_partners', option) ): ?>
  <?php while ( have_rows('options_partners', option) ) : the_row(); ?>
    <section class="partners">
      <h3><?php esc_html_e('Partners', 'gieffe-videogames'); ?></h3>
      <ul>
        <?php if ( get_sub_field('options_partner_link', option) && get_sub_field('options_partner_title', option) && get_sub_field('options_partner_image', option) ): ?>
          <li>
            <a href="<?php the_sub_field('options_partner_link', option); ?>" rel="nofollow" target="_blank" class="partners-link">
              <span class="hidden"><?php the_sub_field('options_partner_title', option); ?></span>
              <img src="<?php the_sub_field('options_partner_image', option); ?>" alt="">
            </a>
          </li>
        <?php endif; ?>
      </ul>
    </section>
  <?php endwhile; ?>
<?php endif; ?>
