<?php get_header(); ?>

<?php if ( have_posts() ) : ?>
	<?php while ( have_posts() ) : the_post(); ?>

		<?php the_title(); ?>
		<?php the_time('m.d.Y'); ?>
		<?php the_author(); ?>
		<?php the_content(); ?>
		<?php wp_link_pages(); ?>
		<?php echo get_the_category_list(); ?>
		<?php echo get_the_tag_list( '| &nbsp;', '&nbsp;' ); ?></div>

	<?php endwhile; ?>

	<?php if ( comments_open() || '0' != get_comments_number() ) comments_template( '', true ); ?>

<?php else : ?>

	This post cannot be found.
	
<?php endif; ?>

<?php get_footer(); ?>
