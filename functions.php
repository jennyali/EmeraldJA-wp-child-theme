<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

if ( !function_exists( 'chld_thm_cfg_parent_css' ) ):
    function chld_thm_cfg_parent_css() {
        wp_enqueue_style( 'chld_thm_cfg_parent', trailingslashit( get_template_directory_uri() ) . 'style.css', array(  ) );
        wp_enqueue_script( 'child_theme_js', get_stylesheet_directory_uri() . '/js/child-theme.js', array( 'jquery' ), '1.0', true );
    }
endif;
add_action( 'wp_enqueue_scripts', 'chld_thm_cfg_parent_css', 10 );

// END ENQUEUE PARENT ACTION
//------- 	INC CUSTOM WIDGETS 	--------------//

include 'inc/widgets.php';

//------ CUSTOM IMAGE SIZE
include 'inc/image-sizes.php';

//-------  CUSTOM QUERY VARS -----------------//

function custom_query_vars_filter($vars) {
  $vars[] = 'topic';

  return $vars;
}
add_filter( 'query_vars', 'custom_query_vars_filter' );


//----------- AJAX CALLS -------------------//

function ajax_archive_portfolio() {

	$topic_term = $_POST[ 'topic_term' ];

	//+++	 IF STATEMENT TO EITHER DISPLAY ALL CATEGORIES OR ONE CATEGORY DEPENDING ON LINK's STRING NAME 	+++//

	if( $topic_term == 'All' ) {

		$args = array(
			'post_type' => 'portfolio_post',
			'orderby'   => 'post_id',
			'order'     => 'DESC',
		);

		$loop = new WP_QUERY( $args );

			if( $loop->have_posts() ) :
							
			while( $loop->have_posts() ) : $loop->the_post();
							
				get_template_part( 'template-parts/post/content', 'portfolio-section-panel' );

			endwhile; wp_reset_query();

			else : ?>

				<p>There are currently no portfolio post's to display.</p>

			<?php endif; wp_reset_query(); ?>

			<?php

		die();

	} else {

        $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

		$args = array(
			'post_type' => 'portfolio_post',
			'orderby'   => 'post_id',
			'order'     => 'DESC',
			'topics' => $topic_term,
            'posts_per_page' => 3,
            'paged'          => $paged,
            
		);

		$loop = new WP_QUERY( $args );

			if( $loop->have_posts() ) :
							
                while( $loop->have_posts() ) : $loop->the_post();
        
                    get_template_part( 'template-parts/post/content', 'portfolio-section-panel' );

                endwhile; wp_reset_query();

            ?>

                <div class="pagination-wrapper col-sm-12">

                    <div class="text-center">
                        <?php the_posts_pagination( array(
                                'mid_size'  => 2,
                                'prev_text' => __( '&#x000AB; Previous', 'textdomain' ),
                                'next_text' => __( 'Next &#x000BB;', 'textdomain' ),
                            ) ); 
                        ?>
                    </div><!-- .text-center -->
                                    
                </div><!-- .col -->

            <?php

			else : ?>

				<p>There are currently no portfolio post's to display.</p>

			<?php endif; wp_reset_query(); ?>

			<?php

		die();

	}
}


add_action( 'wp_ajax_ajax_archive_portfolio', 'ajax_archive_portfolio');
add_action( 'wp_ajax_nopriv_ajax_archive_portfolio', 'ajax_archive_portfolio');


//--------------- Advanced pagination with numbered links -------------------//
// for use with custom queries using WP_Query


function custom_pagination( $numpages = '', $pagerange = '', $paged = '' ) {

	if ( empty($pagerange) ) {
		$pagerange = 2;
	}

	global $paged;

	if( empty($paged) ) {
		$paged = 1;
	}

	if ( $numpages == '' ) {
		global $wp_query;

		$numpages = $wp_query->max_num_pages;

		if( !$numpages ) {
			$numpages = 1;
		}
	}

	// Args to enter in for the paginate_links function //

	$pagination_args = array(
		'base'            => get_pagenum_link(1) . '%_%',
		'format'          => 'page/%#%',
		'total'           => $numpages,
		'current'         => $paged,
		'show_all'        => False,
		'end_size'        => 1,
		'mid_size'        => $pagerange,
		'prev_next'       => True,
		'prev_text'       => __('&laquo;'),
		'next_text'       => __('&raquo;'),
		'type'            => 'plain',
		'add_args'        => false,
		'add_fragment'    => ''
	);

	$paginate_links = paginate_links( $pagination_args );

	// what is displayed on the frontend //

	if ( $paginate_links ) {
		echo "<nav class='custom-pagination pagination'>";
			//echo "<span class='page-numbers page-num'>Page " . $paged . " of " . $numpages . "</span> ";
			echo $paginate_links;
		echo "</nav>";
	}

}