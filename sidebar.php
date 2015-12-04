
<div class="right-sidebar">
  <div class="latest-postings-sidebar">
    <h2>Latest Postings</h2>
    <hr>


    <?php
      $args = array( 'numberposts' => '3', 'category_name' => 'blog' );
      $posts = get_posts($args);
      if ($posts) {
        foreach($posts as $post) {
        setup_postdata($post);
    ?>

    <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a>
    <p><small><?php the_time('F j, Y') ?></small></p></li>
    <p><small><?php the_excerpt(); ?></small></p>
      <?php
        }
      }
      ?>

  </div>
  <div class="blog-archives-sidebar">
    <h3>Blog Archives</h3>
    <?= wp_get_archives('type=yearly');?>
  </div>
</div>
