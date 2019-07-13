<?php get_header(); ?>

<div class="container">

<?php if ( have_posts() ) : ?>
	<?php while ( have_posts() ) : the_post(); ?>

		<div class="post-preview">
			<p class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title();  ?></a></p>
			<p class="post-date"><a href="<?php the_permalink(); ?>"><?php the_date('F j, Y'); ?></a></p>
			<?php if ( lsvr_pressville_has_document_attachments( get_the_ID() ) && ! post_password_required( get_the_ID() ) ) : ?>
				<?php lsvr_pressville_the_document_attachments( get_the_ID() ); ?>
			<?php endif;  ?>
			<?php the_excerpt(); ?>
		</div>

	<?php endwhile; ?>

		<div class="post-navigation">
			<?php next_posts_link( '← Older' ); ?>
			<?php previous_posts_link( 'Newer →' ); ?>
		</div>

<?php else : ?>

	<h1>404 &mdash; Page not found</h1>

	<p>This page cannot be found. Try using the site search to find what you're looking for.</p>

<?php endif; ?>

</div>

<?php get_footer(); ?>
