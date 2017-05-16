<?php
/**
 * Template Name: Gaming Hall
 */
get_header(); ?>

<?php while (have_posts()): the_post(); ?>
	<?php get_template_part('template-parts/content', 'gaming-hall'); ?>
<?php endwhile; ?>

<?php get_footer(); ?>
