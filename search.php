<?php get_header(); ?>

<div class="container">
<?php if ( have_posts() ) : ?>
  <h1>Search results: <?php the_search_query(); ?></h1>
<?php while ( have_posts() ) : the_post(); ?>
  <p><a href="<?php the_permalink() ?>"><?php the_title() ?></a></p>
<?php endwhile; else : echo '<p>No search results found. Please try your search again.</p>'; ?>

<?php endif; ?>
</div>

<?php get_footer(); ?>
