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
			<div class="hero-image">
				<?php
					$term_id = $term->term_id;
					$image_id = get_term_meta( $term_id, 'image', true );
					echo wp_get_attachment_image( $image_id, 'thumbnail', false, array() );
				?>
			</div>
			<div class="hero-content">
				<h2><?php echo $term->name; ?></h2>
				<p><?php echo $term->description; ?></p>
			</div>
		</header>

		<nav class="breadcrums">

		  <div class="breadcrums-back">
		    <a href="../" rel="prev"><?php esc_html_e( '&laquo; Back', 'gieffe-videogames' ); ?></a>
		  </div>

		  <div class="breadcrums-categories">
		    <a href="../" rel="prev"><?php esc_html_e( 'Products', 'gieffe-videogames' ); ?></a>

				<div class="test">
					<?php
						// TODO: paginatizione numerica
						echo paginate_links();
					?>
				</div>

				<a href="<?php echo get_term_link( $term->slug, 'products' ); ?>" rel="category"><?php echo $term->name; ?></a>

		  </div>

		</nav>

		<?php
			$args = array(
				'posts_per_page' => 1, // remember posts per page should be less or more that what's set in general settings
				// 'paged'          => $paged,
				'paged'          => get_query_var('paged'),
				'orderby'        => 'menu_order',
				'order'          => 'ASC',
				'pagination'     => true,
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
		?>

			<div class="pagination-test">
				<?php
						$big = 999999; // need an unlikely integer
						echo paginate_links( array(
							'prev_next' => true,
							'prev_text' => __('« Previous', 'gieffe-videogames'),
		          'next_text' => __('Next »', 'gieffe-videogames'),
							'type'      => 'plain',
			        'base'      => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
			        'format'    => '?paged=%#%',
			        
			        'total'     => $products->max_num_pages
			    ) );
				?>
				<hr>
				<?php
	        $options = array(
	          'prev_next' => true,
	          'prev_text' => __('« Previous', 'gieffe-videogames'),
	          'next_text' => __('Next »', 'gieffe-videogames'),
	          'type'      => 'plain'
	        );
	        echo paginate_links( $options );
	      ?>
			</div>
		
			<?php while ( $products->have_posts() ) : $products->the_post(); ?>
				<article>
				  <a rel="bookmark" href="<?php the_permalink(); ?>">
				    <?php the_post_thumbnail('medium'); ?>
				    <h3><?php the_title(); ?></h3>
				  </a>
				</article>
			<?php endwhile; ?>

			<div class="test-2">
				<?php previous_post_link('%link', __('&laquo; Previous', 'gieffe-videogames')); ?>
				<?php next_post_link('%link', __('Next &raquo;', 'gieffe-videogames')); ?>
			</div>

		<?php
			endif;
			wp_reset_query();
		?>

		<nav class="breadcrums">

		  <div class="breadcrums-back">
		    <a href="../" rel="prev"><?php esc_html_e( '&laquo; Back', 'gieffe-videogames' ); ?></a>
		  </div>

		  <div class="breadcrums-categories">
		    <a href="../" rel="prev"><?php esc_html_e( 'Products', 'gieffe-videogames' ); ?></a>
				<a href="<?php echo get_term_link( $term->slug, 'products' ); ?>" rel="category"><?php echo $term->name; ?></a>
		  </div>

		</nav>

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

<strong>taxonomy-products.php</strong>

<?php get_footer(); ?>
