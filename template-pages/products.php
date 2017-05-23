<?php
/**
 * Template Name: Products
 */
get_header(); ?>

<?php while (have_posts()): the_post(); ?>

	<section>

		<?php
			$args = array(
				'hide_empty' => 0,       // show categories that don’t contain any posts
				'parent' => 0,           // return top level taxonomies
				'taxonomy' => 'products' // default set to “category” so we need to cange to our custom taxonomy instead
			);
			$product_categories = get_categories( $args );
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

	</section>

<?php endwhile; ?>

<?php get_footer(); ?>
