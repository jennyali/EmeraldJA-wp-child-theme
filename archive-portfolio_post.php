<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package EmeraldJA
 */

get_header(); ?>

<div class="container container--padding">
	<div class="row">

		<div id="primary" class="content-area col-sm-12">
			<main id="main" class="site-main">

			<?php
				// get the URL query vars.
				$topic = get_query_var('topic', FALSE);

				if( ($topic) ) {
					$tax_query[] = array(
						array(
							'taxonomy'  => 'topics',
							'field'     => 'slug',
							'terms'     => $topic,
						),
					);
				}

				$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;

				$args = array(
					'post_type' => 'portfolio_post',
					'posts_per_page' => 9,
					'paged' => $paged,
					'tax_query' => $tax_query,
				);

				$custom_query = new WP_Query( $args );


			if ( $custom_query->have_posts() ) : ?>


                <!-- HEADLINE
                ====================================================================-->   
				<header class="page-header">

					<h1><span class="text-color">Portfolio</span></h1>

				</header><!-- .page-header -->


				<!-- NAVIGATION
                ====================================================================-->  
				<nav class="archive-nav-wrapper"> 

                	<?php get_template_part( 'template-parts/navigation/navigation', 'portfolio-section-menu' ); ?>
				
				</nav>


                <!-- CONTENT
                ====================================================================-->

				<section id="archive-portfolio-post-content" class="archive-content masonry-layout">

					<?php
					/* Start the Loop */
					while ( $custom_query->have_posts() ) : $custom_query->the_post(); ?>

						<div class="masonry-layout__panel">
						
							<?php get_template_part( 'template-parts/post/content', 'portfolio' ); ?>

						</div><!-- .col -->

					<?php endwhile; wp_reset_query();?>

				</section><!-- .archive-content -->

				<!-- PAGINATION
                ============================================================================-->

                <div class="pagination-wrapper col-sm-12">

					<div class="text-center">

						<?php
							if ( function_exists(custom_pagination) ) {

								custom_pagination( $custom_query->max_num_pages, "", $paged );
							
							}	
						?>

					</div><!-- .text-center -->
                            
                </div><!-- .col -->

			<?php else :

				get_template_part( 'template-parts/content', 'none' );

			endif; wp_reset_query(); ?>

			</main><!-- #main -->
		</div><!-- #primary .col -->

	</div><!-- .row -->
</div><!-- .container -->


<?php
get_footer();