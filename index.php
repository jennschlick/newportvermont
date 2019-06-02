<?php get_header(); ?>

<?php if ( have_posts() ) : ?>
	<?php while ( have_posts() ) : the_post(); ?>?>

		<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
			<?php the_title();  ?>
		</a>

		<?php the_time('m/d/Y'); ?>

		<?php if( comments_open() ) : ?>
		<?php comments_popup_link( __( 'Comment', 'break' ), __( '1 Comment', 'break' ), __( '% Comments', 'break' ) ); ?>
		<?php endif; ?>

		<?php the_content( 'Continue...' ); ?>

		<?php wp_link_pages(); ?>
		<?php echo get_the_category_list(); ?>
		<?php echo get_the_tag_list( '| &nbsp;', '&nbsp;' ); ?>

	<?php endwhile; ?>

		<?php previous_posts_link( 'newer' ); ?>
		<?php next_posts_link( 'older' ); ?>

<?php else : ?>
	
		This post cannot be found.

<?php endif; ?>

<?php get_footer(); ?>
