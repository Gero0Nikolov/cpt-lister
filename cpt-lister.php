<?php
/*
Plugin Name: Custom Post Type Lister - CPT Lister
Description: This amazing plugin gives you the possibility to list posts from Custom Post Type. :)
Version: 1.0
Author: GeroN.
Author URI: http://blogy.co?GeroNikolov
License: GPLv2
*/

class cpt_lister {
	public function cpt_list_this( $atts, $content = "" ) {

		extract( 
			shortcode_atts( 
				array( 
				'type' => '', 
				'post_status' => 'publish',
				'order' => 'ASC',
				'order_by' => 'publish_date',
				'posts_per_page' => -1,
				'titles_as_links' => 1,
				'show_post_content' => 1,
				'cptl_title_link_class' => 'cptl_title_link',
				'cptl_title_class' => 'cptl_title',
				'cptl_content_class' => 'cptl_class'
				), $atts 
			)
		);

		if ( strpos( $post_status, "," ) ) { $post_status = explode(",", $post_status); }

		if ( !empty( $type ) ) {

			$args = array(
			  'post_type' => $type,
			  'post_status' => $post_status,
			  'order_by' => $order_by,
			  'order' => $order,
			  'posts_per_page' => $posts_per_page
			  );

			$listing_query = null;
			$listing_query = new WP_Query( $args );
			if ( $listing_query->have_posts() ) {
				while ( $listing_query->have_posts() ) : $listing_query->the_post(); ?>
			    
			    <?php // Posts TITLES //
			    if ( $titles_as_links == 1 ) : 
			    ?>

			    <a href="<?php the_permalink() ?>" class="<?php echo $cptl_title_link_class; ?>" >
			    	<h1 class="<?php echo $cptl_title_class ?>"><?php the_title(); ?></h1>
			    </a>

			    <?php else : ?>

			    <h1 class="<?php echo $cptl_title_class ?>"><?php the_title(); ?></h1>

			    <?php endif; ?>

			    <?php // Posts CONTENT //
			    if ( $show_post_content == 1 ) :
			    ?>

				<p class="<?php echo $cptl_content_class; ?>"><?php the_content(); ?></p>

				<?php endif; ?>

		    	<?php
			 	endwhile;
			}
			wp_reset_query();

		} else {

			die( "<h1 style='display: block; text-align: left; font-weight: bold; font-size: 3.5rem;'>Choose your post type!</h1>" );

		}

	}
}
add_shortcode( 'cpt_show', array( 'cpt_lister', 'cpt_list_this') );
?>