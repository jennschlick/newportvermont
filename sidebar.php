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
<?php
if ( $post->post_parent ) {
  $children = wp_list_pages( array(
    'title_li' => '',
    'child_of' => $post->post_parent,
    'echo'     => 0
  ) );
} else {
  $children = wp_list_pages( array(
    'title_li' => '',
    'child_of' => $post->ID,
    'echo'     => 0
  ) );
}
if ( $children ) : ?>
  <ul>
    <?php echo $children; ?>
  </ul>
<?php endif; ?>
