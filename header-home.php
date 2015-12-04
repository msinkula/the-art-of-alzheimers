<!DOCTYPE html>
<html>
<head>
   <!-- header-home.php -->
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=2" />
   <title><?php get_my_title_tag(); ?></title>
   <meta name="description" content="<?php echo get_the_excerpt(); ?>" />
   <link rel="icon" type="image/png" href="<?php bloginfo('template_directory'); ?>/images/favicon.png">
   <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/flexslider.css" type="text/css">
   <link href='http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css' rel='stylesheet' type='text/css'>
   <link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
   <script src="<?php bloginfo('template_directory'); ?>/jquery.flexslider.js"></script>

   <?php wp_head(); ?>

</head>
<body <?php body_class( $class ); ?>>
  <div class="header">
    <div class="upper-container">
      <?php wp_nav_menu( array(
      'theme_location' => 'upper-menu',
      'container' => 'div',
      'container_id' => 'upper-navigation',
      'items_wrap' => '<ul id="upper-navigation-items" class="upper-nav">%3$s</ul>', ) ); ?>

    <a href="<?php echo get_option('home'); ?>" class="logo_a"><img src="<?php bloginfo('template_directory'); ?>/images/aoalogo.png" alt="logo" class="logo"></a>
  </div>
<div class="nav-container">
    <nav>
      <div class="email" id="asaphide">
        <a href="http://www.theartofalzheimers.net/wp/email/"> Sign-up for email list</a>
      </div>
      <?php wp_nav_menu( array(
      'theme_location' => 'main-menu',
      'container' => 'div',
      'container_id' => 'navigation',
      'items_wrap' => '<ul id="navigation-items" class="nav">%3$s</ul>', ) ); ?>

      <a href="https://co.clickandpledge.com/sp/d1/default.aspx?wid=109053" target="_blank" class="donate">Donate</a>
    </nav>
  </div>
  </div>
  <article class="home">
