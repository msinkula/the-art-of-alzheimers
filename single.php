<?php get_header(); ?>
<div class="content-container">
	<div class="content">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		    <h2 class="post-title"><?php the_title(); ?></h2>
		    <small>Posted on <?php the_time('F jS, Y'); ?> in <?php the_category(', '); ?></small>
		    <?php the_content(''); ?>
		<?php endwhile; endif; ?>
	</div>
	<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>