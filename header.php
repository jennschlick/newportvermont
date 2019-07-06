<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-141813865-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'UA-141813865-1');
</script>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php bloginfo('name'); ?> | <?php is_front_page() ? bloginfo('description') : wp_title(''); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php wp_head(); ?>
</head>
<body <?php body_class();?>>

<div class="sitesearch">
  <?php get_search_form(); ?>
</div>
<header id="header">
  <div class="logo">
    <a href="<?php echo site_url(); ?>">
      <img src="<?php echo get_template_directory_uri(); ?>/img/newport-vermont.png" alt="Newport Vermont">
    </a>
  </div>
  <div class="menu-toggle">
    <a href="#main-menu">Menu</a>
  </div>
  <?php wp_nav_menu( array( 'theme_location' => 'main', 'container' => 'nav', 'container_id' => 'main-menu' ) ); ?>
</header>
