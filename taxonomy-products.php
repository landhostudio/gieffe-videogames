<?php get_header(); ?>

<section>

	<?php
		$slug = get_query_var( 'term' );
		$term = get_term_by( 'slug', $slug, 'products' );
		$term_id = $term->term_id;
		$args = array(
			'hide_empty' => 0,         // show categories that don’t contain any posts
			'parent'     => $term_id,  // return current level taxonomies
			'taxonomy'   => 'products' // default set to “category” so we need to cange to our custom taxonomy instead
		);
		$product_categories = get_categories( $args );
		if ( !$product_categories ) :
	?>

		<?php
			// If there are no subcategories show products! --------------------------
		?>

		<header class="hero">
			<div class="hero-content">
				<?php
					// TODO: insert term image
				?>
				<h2><?php echo $term->name; ?></h2>
				<?php
					// TODO: insert term description
				?>
			</div>
		</header>

		<?php
			$args = array(
				'posts_per_page' => 2, // remember posts per page should be less or more that what's set in general settings
				'paged'          => $paged,
				'orderby'        => 'menu_order',
				'order'          => 'ASC',
				'tax_query'      => array(
					array(
						'taxonomy'   => 'products',
						'field'      => 'slug',
						'terms'      => $slug
					)
				)
			);
			$products = new WP_Query( $args );
			if ( have_posts() ) :
			while ( $products->have_posts() ) : $products->the_post();
		?>

			<article>
			  <a rel="bookmark" href="<?php the_permalink(); ?>">
			    <?php the_post_thumbnail('medium'); ?>
			    <h3><?php the_title(); ?></h3>
			  </a>
			</article>
			
		<?php
			endwhile;
			endif;
			wp_reset_query();
		?>

	<?php else : ?>

		<?php
			// If there are subcategories show them! ---------------------------------
		?>

		<header class="hero">
			<div class="hero-content">
				<?php
					// TODO: insert term image
				?>
				<h2><?php echo $term->name; ?></h2>
				<?php
					// TODO: insert term description
				?>
			</div>
		</header>

		<?php
			foreach ( $product_categories as $product_category ) :
			$product_category_url = get_term_link( $product_category->slug, 'products' );
			$taxonomy_id = $product_category->term_id;
			$image_id = get_term_meta( $taxonomy_id, 'image', true );
		?>
			<article>
				<a href="<?php echo $product_category_url; ?>">
					<?php echo wp_get_attachment_image( $image_id, 'thumbnail', false, array() ); ?>
					<h3><?php echo $product_category->name; ?></h3>
				</a>
			</article>
		<?php endforeach; ?>

	<?php endif; ?>

</section>

<?php get_footer(); ?>
