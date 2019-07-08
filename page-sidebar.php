<?php /* Template Name: Sidebar */ ?>

<?php get_header(); ?>

<?php if ( have_posts() ) : ?>
	<?php while ( have_posts() ) : the_post(); ?>

		<?php if ( has_post_thumbnail() ) : ?>
		<div class="hero hero-page"<?php if ( has_post_thumbnail() ) : ?> style="background-image:url(<?php the_post_thumbnail_url('full'); ?>);"<?php endif; ?>>
			<?php if ( get_field('hero_title_line1') || get_field('hero_title_line2') || get_field('hero_text') ) : ?>
				<div class="hero-content">
					<?php if ( get_field('hero_title_line1') ) : ?>
						<div class="hero-title-line1">
							<?php the_field('hero_title_line1'); ?>
						</div>
					<?php endif; ?>
					<?php if ( get_field('hero_title_line2') ) : ?>
						<div class="hero-title-line2">
							<?php the_field('hero_title_line2'); ?>
						</div>
					<?php endif; ?>
				</div>
			<?php endif; ?>
		</div>
		<?php endif; ?>

		<div class="container">
			<div class="sidebar">
				<?php get_sidebar(); ?>
			</div>
			<div class="main">
				<h1><?php the_title(); ?></h1>
				<?php the_content(); ?>
				<?php if ( is_active_sidebar('content')) { ?>
					<?php dynamic_sidebar('content'); ?>
				<?php } ?>
				<?php if( have_rows('bottom_box') ):
					while( have_rows('bottom_box') ): the_row(); ?>
						<?php if (get_sub_field('bottom_box_title') || get_sub_field('bottom_box_content')) : ?>
							<div class="bottom-box">
							<?php if ( get_sub_field('bottom_box_title') ) : ?>
								<div class="bottom-box-title">
									<?php the_sub_field('bottom_box_title'); ?>
								</div>
							<?php endif; ?>
							<?php if ( get_sub_field('bottom_box_content') ) : ?>
								<div class="bottom-box-content">
									<?php the_sub_field('bottom_box_content'); ?>
								</div>
							<?php endif; ?>
							</div>
						<?php endif; ?>
					<?php endwhile; ?>
				<?php endif; ?>
			</div>
		</div>

	<?php endwhile; ?>

<?php else : ?>

	<h1>404 &mdash; Page not found</h1>

	<p>This page cannot be found. Try using the site search to find what you're looking for.</p>

<?php endif; ?>

<?php get_footer(); ?>
