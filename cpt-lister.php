<?php
/*
Plugin Name: Custom Post Type Lister - CPT Lister
Description: This amazing plugin gives you the possibility to list posts from Custom Post Type. :)
Version: 1.0
Author: GeroNikolov
Author URI: http://blogy.co?GeroNikolov
License: GPLv2
*/

class cpt_lister {
	public function cpt_list_this( $atts, $content = "" ) {

		$valid_wrappers = array('h1','h2','h3','h4','h4','h6','li','span','div');

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
				'cptl_content_class' => 'cptl_content',
				'cptl_content_wrapper' => 'h1'
				), $atts 
			)
		);

		if ( strpos( $post_status, "," ) ) { $post_status = explode(",", $post_status); }

		if ( !empty( $type ) ) {

			if ( empty( $cptl_content_wrapper ) || !in_array($cptl_content_wrapper, $valid_wrappers) ) {
				$cptl_content_wrapper = 'h1';
			}

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
				if ($cptl_content_wrapper === 'li') {
					echo "<ul>";
				}
				while ( $listing_query->have_posts() ) : $listing_query->the_post(); ?>

				<<?php echo $cptl_content_wrapper ?> class="<?php echo $cptl_title_class ?>">

			    <?php // Posts TITLES //
			    if ( $titles_as_links == 1 ) :
			    ?>

		        <a href="<?php the_permalink() ?>" class="<?php echo $cptl_title_link_class; ?>" >
		    	    <?php the_title(); ?>
		        </a>

			    <?php else : ?>

				<?php the_title(); ?>

			    <?php endif; ?>
			    </<?php echo $cptl_content_wrapper ?>>

			    <?php // Posts CONTENT //
			    if ( $show_post_content == 1 ) :
			    ?>

				<p class="<?php echo $cptl_content_class; ?>"><?php the_content(); ?></p>

				<?php endif; ?>

		    	<?php
			 	endwhile;

			 	if ($cptl_content_wrapper === 'li') {
					echo "</ul>";
				}
			}
			wp_reset_query();

		} else {

			die( "<h1 style='display: block; text-align: left; font-weight: bold; font-size: 3.5rem;'>Choose your post type!</h1>" );

		}

	}
}
add_shortcode( 'cpt_show', array( 'cpt_lister', 'cpt_list_this') );
?>