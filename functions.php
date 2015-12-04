<?php

/*
Theme Name: The Art of Alzheimers
Theme URI: http://hurricanelanterns.net/wp
Description: A theme for The Art of Alzheimers non-profit
Authors: Eric Weigle, Kaela Lavin, Christina Fernandez, Patrick Dodd & Mike Sinkula
Author URI:
Version: 1.0
Tags:
License:
License URI:
General comments (optional).
*/

//register menus
register_nav_menus(array(
  'main-menu' => __('Main Menu'),
  'upper-menu' => __('Upper Menu')
));

//Post Thumbnails
add_theme_support( 'post-thumbnails' );

//Post Excerpts
add_post_type_support( 'page', 'excerpt' );

// Create Custom Image Sizes
add_image_size( 'slider-home', 960, 720, true ); // 960 pixels wide by 720 pixels tall, hard crop mode

//get blog feed
function blog_page_feed() {

	$paged = get_query_var( 'paged', 1 );
	$args = array( 'posts_per_page' => 10, 'paged' => $paged );
	$the_query = new WP_Query( $args );

	// TAILOR PAGER BEHAVIOR TO NUMBER OF POSTS
	if( $the_query->found_posts <= 10 ){
		$pager_class = 'pager-div-collapse';
	}else{
		$pager_class = 'pager-div';
	}

	if ( $the_query->have_posts() ){

		while ( $the_query->have_posts() ){

			$the_query->the_post(); // START THE LOOP
			echo '<div class="blog-feed">';
			echo '<h2><a href="' . get_permalink() . '" class="blog-title">' . get_the_title() . '</a></h2>';
			echo '<p>Posted on ' . get_the_time('F j, Y') . '</p>';
			echo get_the_post_thumbnail();
			echo the_content("Continue reading " . get_the_title());
			echo '<p>Posted in ';
			the_category(', ');
			echo'</p>';
			echo '<hr>';
			echo '</div>';
		}
		echo '<div class="' . $pager_class . '">';
		echo '<h4 class="forward-paging-link">' . get_next_posts_link( 'More Blog Posts &raquo;', $the_query->max_num_pages ) . '</h4>';
		echo '<h4 class="backward-paging-link">' . get_previous_posts_link( '&laquo; Previous Blog Posts' ) . '</h4>';
		echo '</div>';
		wp_reset_postdata(); //reset
	}//END THE LOOP
}

//get gallery artist feed
function gallery_page_feed() {

	$page_id = get_page_by_title( 'gallery' ); //find the id of the gallery page
	$paged = get_query_var('paged', 1);
	$args = array( 'posts_per_page' => 10, 'paged' => $paged, 'post_type' => 'page', 'post_parent' => $page_id->ID ); //see if the post is a page and if the parent is gallery

    $the_query = new WP_Query( $args );

    if( $the_query->found_posts <= 10 ){
    	$pager_class = 'pager-div-collapse';
    }else{
    	$pager_class = 'pager-div';
    }

    if ( is_page( $page_id->ID ) && $the_query->have_posts() ){ //run the loop with these parameters

    	echo '<div class="'.$pager_class.'">';
        /*echo '<h4 class="forward-paging-link">' . get_next_posts_link( 'More Artists &raquo;', $the_query->max_num_pages ) . '</h4>';*/
		/*echo '<h4 class="backward-paging-link">' . get_previous_posts_link( '&laquo; Previous Artists' ) . '</h4>';*/
		echo '</div>';

        // The Loop
        while ( $the_query->have_posts() ) {
            $the_query->the_post();
            echo '<div class="gallery-entry">';
            
            echo '<h2><a href="' . get_permalink() . '" class="artist-name">' . get_the_title() . '</a></h2>';
			echo '<a href="' . get_permalink() . '">' . get_the_post_thumbnail($post->ID, 'thumbnail') . '</a>';
            echo '<p>' . get_the_excerpt() . '</p>';
            echo '<a class="gallery-entry-read-more" href="' . get_permalink() . '">Read More</a>';
            echo '</div>';
        }
        echo '<div class="'.$pager_class.'">';
        echo '<h4 class="forward-paging-link">' . get_next_posts_link( 'More Artists &raquo;', $the_query->max_num_pages ) . '</h4>';
		echo '<h4 class="backward-paging-link">' . get_previous_posts_link( '&laquo; Previous Artists' ) . '</h4>';
		echo '</div>';
        wp_reset_postdata(); //reset

    }else{
    	//run the regular loop
        if (have_posts() ) : while ( have_posts() ) : the_post();
		echo '<div class="artist-image">' . get_the_post_thumbnail($post->ID, 'medium') . '</div>';
        the_content('');
        endwhile; endif;

    }
}

function about_cta() {
	$args = array( 'post_type' => 'page', 'pagename' => 'about' ); //see if the post is a page and if the parent is gallery

    $the_query = new WP_Query( $args );

    if ( is_page('home') && $the_query->have_posts() ){ //run the loop with these parameters
        // The Loop
        while ( $the_query->have_posts() ) {
            $the_query->the_post();
            echo '<p class="about-text">' . get_the_excerpt() . '</p>';
            echo '<a class="gallery-entry-read-more" href="' . get_permalink() . '">Read More</a>';
        }
        wp_reset_postdata(); //reset

    }
}

function add_flexslider() { // display attachment images as a flexslider gallery on single posting

    global $post; // don't forget to make this a global variable inside your function

    $attachments = get_children(array('post_parent' => $post->ID, 'order' => 'ASC', 'orderby' => 'menu_order', 'post_type' => 'attachment', 'post_mime_type' => 'image', ));

    if ($attachments) { // if there are images attached to posting, start the flexslider markup

        echo '<div class="flexslider" id="flex-gallery">';
        echo '<ul class="slides">';

        foreach ( $attachments as $attachment_id => $attachment ) { // create the list items for images with captions

            echo '<li>';
            echo wp_get_attachment_image($attachment_id, 'large');
			echo '<p>';
			echo get_post_field('post_title', $attachment->ID);
			echo '</p>';
            echo '</li>';

        }

        echo '</ul>';
        echo '</div>';

    } // end see if images

} // end add flexslider

function add_flexslider_home() { // display attachment images as a flexslider gallery on single posting

    global $post; // don't forget to make this a global variable inside your function

    $attachments = get_children(array('post_parent' => $post->ID, 'order' => 'ASC', 'orderby' => 'menu_order', 'post_type' => 'attachment', 'post_mime_type' => 'image', ));

    if ($attachments) { // if there are images attached to posting, start the flexslider markup

        echo '<div class="flexslider">';
        echo '<ul class="slides" id="">';

        foreach ( $attachments as $attachment_id => $attachment ) { // create the list items for images with captions

            echo '<li>';
            echo wp_get_attachment_image($attachment_id, 'slider-home');
            echo '</li>';

        }

        echo '</ul>';
        echo '<div class="flexslider-controls">';
        echo  '<ol class="flex-control-nav">';
        foreach ( $attachments as $attachment_id => $attachment ) { //grab wp metadata from media gallery for Artist and Title
          $alt = get_post_meta($attachment->ID, '_wp_attachment_image_alt', true);
  	      $caption = $attachment->post_excerpt;

          echo '<li><p class="title_piece">'. $alt .'</p><p class="artist">' . $caption . '</p></li>';

        }
        echo  '</ol>';
        echo  '</div>';
        echo '</div>';

    } // end see if images

} // end add flexslider

// Get My Title Tag
function get_my_title_tag() {
	
	global $post;
	
	if ( is_front_page() ) {  // for the site’s Front Page
	
		bloginfo('description'); // retrieve the site tagline
	
	} 
	
	elseif ( is_page() || is_single() ) { // for your site’s Pages or Postings
	
		the_title(); // retrieve the page or posting title 
	
	} 
	
	else { // for everything else
		
		bloginfo('description'); // retrieve the site tagline
		
	}
	
	if ( $post->post_parent ) { // for your site’s Parent Pages
	
		echo ' | '; // separator with spaces
		echo get_the_title($post->post_parent);  // retrieve the parent page title
		
	}
	echo ' | '; // separator with spaces
	bloginfo('name'); // retrieve the site name
	echo ' | '; // separator with spaces
	echo 'Seattle, WA.'; // write in the location
	
}
//