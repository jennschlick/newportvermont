<?php get_header();?>

<?php if (have_posts()): ?>
	<?php while (have_posts()): the_post();?>

				<?php if (has_post_thumbnail()): ?>
				<div class="hero hero-home"<?php if (has_post_thumbnail()): ?> style="background-image:url(<?php the_post_thumbnail_url('full');?>);"<?php endif;?>>
			<?php if (has_post_thumbnail()): ?><?php echo the_post_thumbnail('full'); ?><?php endif;?>
			<?php if (get_field('hero_title_line1') || get_field('hero_title_line2') || get_field('hero_text')): ?>
				<div class="hero-content">
					<?php if (get_field('hero_title_line1')): ?>
						<div class="hero-title-line1">
							<?php the_field('hero_title_line1');?>
						</div>
					<?php endif;?>
					<?php if (get_field('hero_title_line2')): ?>
						<div class="hero-title-line2">
							<?php the_field('hero_title_line2');?>
						</div>
					<?php endif;?>
					<?php if (get_field('hero_text')): ?>
						<div class="hero-text">
							<?php the_field('hero_text');?>
						</div>
					<?php endif;?>
				</div>
			<?php endif;?>
		</div>
		<?php endif;?>

		<?php if (get_field('home_intro_title') || get_field('home_intro_text')): ?>
		<div class="home-panel home-panel-intro">
			<?php if (get_field('home_intro_title')): ?>
				<h2><?php the_field('home_intro_title');?></h2>
			<?php endif;?>
			<?php if (get_field('home_intro_text')): ?>
				<div class="home-intro-text">
					<?php the_field('home_intro_text');?>
				</div>
			<?php endif;?>
			<?php wp_nav_menu(array('theme_location' => 'homepage'));?>
		</div>
		<?php endif;?>




		<div class="home-panel home-panel-events">
			<h2>Upcoming Events</h2>
			<?php echo do_shortcode('[calendar id="407"]'); ?>
		</div>
		<!-- put cal -->



		<div class="home-panel home-panel-history">
			<div class="home-history-section">
				<?php if (get_field('home_history_title')): ?>
					<h2><?php the_field('home_history_title');?></h2>
				<?php endif;?>
				<?php if (get_field('home_history_text')): ?>
					<?php the_field('home_history_text');?>
				<?php endif;?>
				<?php if (get_field('home_stat1_title') || get_field('home_stat2_title')): ?>
					<div class="home-history-stats">
						<?php if (get_field('home_stat1_title') || get_field('home_stat1_number')): ?>
						<div class="home-stat home-stat1">
							<?php if (get_field('home_stat1_title')): ?>
								<p class="home-stat-title"><?php the_field('home_stat1_title');?></p>
							<?php endif;?>
							<?php if (get_field('home_stat1_number')): ?>
								<p class="home-stat-number"><?php the_field('home_stat1_number');?></p>
							<?php endif;?>
						</div>
						<?php endif;?>
						<?php if (get_field('home_stat2_title') || get_field('home_stat2_number')): ?>
						<div class="home-stat home-stat2">
							<?php if (get_field('home_stat2_title')): ?>
								<p class="home-stat-title"><?php the_field('home_stat2_title');?></p>
							<?php endif;?>
							<?php if (get_field('home_stat2_number')): ?>
								<p class="home-stat-number"><?php the_field('home_stat2_number');?></p>
							<?php else: ?>
								<p class="home-stat-number"><a href="https://darksky.net/forecast/44.9361,-72.2049/us12/en" class="home-temp" target="_blank"></a></p>
							<?php endif;?>
						</div>
						<?php endif;?>
					</div>
				<?php endif;?>
			</div>
			<?php if (get_field('home_history_image')): ?>
				<div class="home-history-section">
					<img src="<?php the_field('home_history_image');?>" alt="">
				</div>
			<?php endif;?>
		</div>



				<div class="home-panel home-panel-news">
					<h2>Recent News</h2>
					<p><a href="<?php echo site_url(); ?>/category/latest-news/">See More</a></p>
					<ul>
						<?php
global $post;
$args = array('posts_per_page' => 3, 'post_status' => 'publish', 'category' => 7);
$homepagenews = get_posts($args);
foreach ($homepagenews as $post): setup_postdata($post);?>
									<li>
										<a href="<?php the_permalink();?>"><?php if (has_post_thumbnail()) {echo the_post_thumbnail('homepage-thumbnail');} else {echo '<img src="' . get_bloginfo('stylesheet_directory') . '/img/thumbnail-default.jpg" />';}?></a>
										<p><a href="<?php the_permalink();?>"><?php the_date('F j, Y');?></a></p>
										<p><a href="<?php the_permalink();?>"><?php the_title();?></a></p>
									</li>
								<?php endforeach;
wp_reset_postdata();?>
					</ul>
				</div>
<!-- put news here -->

		<?php if (get_field('home_photo1') || get_field('home_photo1')): ?>
		<div class="home-panel home-panel-photos">
			<?php if (get_field('home_photo1')): ?>
				<div>
					<img src="<?php the_field('home_photo1');?>" alt="">
				</div>
			<?php endif;?>
			<?php if (get_field('home_photo2')): ?>
				<div>
					<img src="<?php the_field('home_photo2');?>" alt="">
				</div>
			<?php endif;?>
		</div>
		<?php endif;?>

	<?php endwhile;?>

<?php else: ?>

	<h1>404 &mdash; Page not found</h1>

	<p>This page cannot be found. Try using the site search to find what you're looking for.</p>

<?php endif;?>

<?php get_footer();?>
