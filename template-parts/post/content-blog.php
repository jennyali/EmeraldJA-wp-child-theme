<?php
/**
 * Template part for displaying blog posts.
 *
 *
 * @package EmeraldJA
 */

?>

<?php if( is_singular() ) : 

	/* 
		FOR single.php page
	*/ 
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'single-blog-post' ); ?>>

		<?php 
		
			$post_cat = get_the_category();

			foreach( $post_cat as $cat ) {

				$post_cat_id = $cat->cat_ID;
				$cat_link = get_category_link( $post_cat_id ); 

				echo '<a href="' . $cat_link . '" class="btn btn-default btn-custom-4">' . $cat->name . '</a>';
			}
			
		?>



        <?php the_title( '<h2>', '</h2>'); ?>

		<div class="blog-post__meta">
             <p>by <span class="text-color"><?php the_author(); ?></span><?php the_time(); ?></p>
              <span class="icon-baloon"></span>
              <p><?php comments_number(); ?></p>
		</div><!-- .blog-post__meta -->

        <?php the_content(); ?>

        <ul class="nav navbar-nav">
            <li><a href="#"><span class="icon-facebook"></span></a></li>
            <li><a href="#"><span class="icon-google-plus"></span></a></li>
            <li><a href="#"><span class="icon-share-alt"></span></a></li>
        </ul><!-- .navbar-right -->

</article><!-- .single-blog-post -->


<?php else : 

	/* 
		FOR home.php page
	*/ 

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'blog-post' ); ?>>

	<figure class="blog-post__thumbnail">

        <?php if( has_post_thumbnail() ) : ?>
            
            <?php the_post_thumbnail( 'full', [ 'class' => 'img-responsive' ] ); ?>
		
        <?php endif; ?>

		<div class="blog-post__categories">

			<?php 
			
				$post_cat = get_the_category();

				foreach( $post_cat as $cat ) {

					$post_cat_id = $cat->cat_ID;
					$cat_link = get_category_link( $post_cat_id ); 

					echo '<a href="' . $cat_link . '" class="btn btn-default btn-custom-4">' . $cat->name . '</a>';
				}
				
			?>

		</div><!-- .blog-post__categories -->

    </figure><!-- .blog-post__thumbnail -->

	<header class="blog-post__header" >

        <a href="<?php echo get_permalink(); ?>">

            <?php the_title( '<h4>', '</h4>'); ?>

        </a>
        

	</header><!-- .blog-post__header -->

	<div class="blog-post__content">
	    
        <span class="hidden-xs">
                                    
           <?php the_excerpt(); ?>
										
        </span>

	</div><!-- .blog-post__content -->

	<div class="blog-post__btn-row">

		<div class="blog-post__meta">
             <p>by <span class="text-color"><?php the_author(); ?></span><?php the_time(); ?></p>
              <span class="icon-baloon"></span>
              <p><?php comments_number(); ?></p>
		</div><!-- .blog-post__meta -->

        <a href="<?php echo get_permalink(); ?>" class="btn btn-default btn-custom-4">Read More</a>

    </div><!-- .blog-post__content__btn-row -->

    <?php if ( is_super_admin() ) : ?>

    <?php //+++ If user is super admin then the post can be edited +++// ?>
		
        <footer class="entry-footer">
			<?php
				edit_post_link(
					sprintf(
						wp_kses(
							/* translators: %s: Name of current post. Only visible to screen readers */
							__( 'Edit <span class="screen-reader-text">%s</span>', 'emerald_ja' ),
							array(
								'span' => array(
									'class' => array(),
								),
							)
						),
						get_the_title()
					),
					'<span class="edit-link">',
					'</span>'
				);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>

</article><!-- .blog-post -->

<?php endif; ?>