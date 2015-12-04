<!doctype html>
<html>
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=2" />
   <title><?php bloginfo('Description'); ?> | <?php bloginfo('name'); ?></title>
   <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/flexslider.css" type="text/css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
   <script src="<?php bloginfo('template_directory'); ?>/jquery.flexslider.js"></script>
   <link href='http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css' rel='stylesheet' type='text/css'>
   <link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>">
   <!--[if ltIE9]>
     <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
   <![endif]-->
</head>
<body>
  <div class="header">

      <?php wp_nav_menu( array(
      'theme_location' => 'upper-menu',
      'container' => 'div',
      'container_id' => 'upper-navigation',
      'items_wrap' => '<ul id="upper-navigation-items" class="upper-nav">%3$s</ul>', ) ); ?>

    <a href="<?php echo get_option('home'); ?>" class="logo_a"><img src="<?php bloginfo('template_directory'); ?>/images/aoalogo.png" alt="logo" class="logo" /></a>

    <nav>
      <form class="email">
        <label>Subscribe:</label> <input type="text" placeholder="janesmith@example.com">
        <button type="submit">sign-up</button>
      </form>
      <?php wp_nav_menu( array(
      'theme_location' => 'main-menu',
      'container' => 'div',
      'container_id' => 'navigation',
      'items_wrap' => '<ul id="navigation-items" class="nav">%3$s</ul>', ) ); ?>

    <a href="https://co.clickandpledge.com/sp/d1/default.aspx?wid=109053" target="_blank" class="donate">Donate</a>
    </nav>
  </div>
