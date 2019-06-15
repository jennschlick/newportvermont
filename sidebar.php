<?php if ( get_field('sidebar_menu') ) : ?>
  <?php
   if($post->post_parent) {
    $parent_title = get_the_title($post->post_parent);
    $parent_url = get_permalink($post->post_parent);
    echo '<p><a href="';
    echo $parent_url;
    echo '">';
    echo $parent_title;
    echo '</a>:</p>';
   }
   else {
    echo '<p><a href="';
    echo get_permalink($post->ID);
    echo '">';
    echo get_the_title($post->ID);
    echo '</a>:</p>';
   }
  ?>
  <?php $shortcode = get_post_meta($post->ID,'sidebar_menu', true);
  echo do_shortcode($shortcode); ?>
<?php endif; ?>
