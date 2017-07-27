<?php

/*
        HERO SLIDER SLIDE / CUSTOM POST TYPE
*/

//# CUSTOM FIELDS UI


//====================================================================================//
?>                 
                    
                    
<div class="masonry-layout__panel">
    <div class="portfolio-item masonry-layout__panel-content">

    <?php $post_image = get_the_post_thumbnail_url(); ?>

        <?php if( $post_image == false ): ?>

            <img src="http://localhost/wordpress/wp-content/uploads/2017/07/green-image-2.jpeg" class="img-responsive">
            
        <?php else: ?>

            <img src="<?php the_post_thumbnail_url(); ?>" class="img-responsive">

        <?php endif; ?>


        <div class="portfolio-item__overlay">
            <a href="<?php echo get_permalink(); ?>">
                <h4><?php the_title(); ?><span class="icon-arrow-68 btn-custom-3" ></span></h4>
            </a>
        </div><!-- .portfolio-item__overlay -->

    </div><!-- .masonry-layout__panel-content -->
</div><!-- .masonry-layout__panel -->