<?php get_header( 'home' ); ?>
<div class="content-container">
  <?php add_flexslider_home(); ?>
  <div class="cta-area">
    <div class="cta">
      <h2>Latest News</h2>
      <hr>
      <ul>
      <?php

        $args = array( 'numberposts' => '3', 'category_name' => 'news' );
        $posts = get_posts($args);
        if ($posts) {
          foreach($posts as $post) {
            setup_postdata($post);
      ?>
            <li>
            <p><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></p>
            <p><small>Posted on <?php the_time('F j, Y') ?></small></p>
          </li>
        <?php
          }
        }
        ?>
      </ul>
    </div>
    <div class="cta">
      <h2>About</h2>
      <hr>
      <?php about_cta(); ?>
    </div>
    <div class="cta">
      <h2>Latest Postings</h2>
      <hr>
      <ul>

        <?php
          $args = array( 'numberposts' => '3', 'category_name' => 'blog' );
          $posts = get_posts($args);
          if ($posts) {
            foreach($posts as $post) {
              setup_postdata($post);
        ?>
              <li>
              <p><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></p>
              <p><small>Posted on <?php the_time('F j, Y') ?></small></p>
            </li>
          <?php
            }
          }
          ?>

      </ul>
    </div>
  </div>
</div>
<?php get_footer( 'home' ); ?>
