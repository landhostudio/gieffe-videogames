<?php get_header(); ?>

<?php while (have_posts()): the_post(); ?>

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

		<nav class="breadcrums">

		  <div class="breadcrums-back">
		    <a href="../" rel="prev"><?php esc_html_e( '&laquo; Back', 'gieffe-videogames' ); ?></a>
		  </div>

		  <div class="breadcrums-categories">
		    <a href="../" rel="prev"><?php esc_html_e( 'Products', 'gieffe-videogames' ); ?></a>
				
				<?php
					// TODO: qui ci deve stare loop di ogni taxonomy utilizzata nella pagina
				?>
		  </div>

		</nav>

	</article>

<?php endwhile; ?>

<?php get_footer(); ?>
