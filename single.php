<?php get_header(); ?>

<?php if ( have_posts() ) : ?>
	<?php while ( have_posts() ) : the_post(); ?>

		<div class="container">
			<?php if ( is_singular( 'post' ) ) { ?>
			<div class="post-breadcrumb">
				<a href="<?php echo site_url(); ?>/category/latest-news/">News</a>
			</div>
			<?php } ?>
			<div class="post-full">
				<h1><?php the_title(); ?></h1>
				<p class="post-date"><?php the_date('F j, Y'); ?></p>
				<?php the_content(); ?>
				<?php if ( lsvr_pressville_has_document_attachments( get_the_ID() ) && ! post_password_required( get_the_ID() ) ) : ?>
					<?php lsvr_pressville_the_document_attachments( get_the_ID() ); ?>
				<?php endif;  ?>
			</div>
		</div>

	<?php endwhile; ?>

<?php else : ?>

	<h1>404 &mdash; Page not found</h1>

	<p>This page cannot be found. Try using the site search to find what you're looking for.</p>

<?php endif; ?>

<?php get_footer(); ?>
