<?php get_header(); ?>

<?php if ( have_posts() ) : ?>
	<?php while ( have_posts() ) : the_post(); ?>

		<?php the_title(); ?>
		<?php the_content(); ?>
		<?php wp_link_pages(); ?>

	<?php endwhile; ?>

<?php else : ?>

	This page cannot be found.
	
<?php endif; ?>

<?php get_footer(); ?>
