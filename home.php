<?php get_header(); ?>
  <div class="content-container">
    <div class="content">
      <h1><?php wp_title(''); ?></h1>
      <hr>

      <?php blog_page_feed(); ?>

    </div>
    
<?php get_sidebar(); ?>
</div><!--end content-container-->
<?php get_footer(); ?>
