<?php
/**
 * Template part for displaying portfolio custom post type posts
 *
 *
 * @package EmeraldJA
 */

// CUSTOM FIELDS

$port_image_one = get_field( 'port_image_one' );
$port_image_two = get_field( 'port_image_two' );
$port_image_three = get_field( 'port_image_three' );
$port_image_four = get_field( 'port_image_four' );

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <?php if ( is_singular() ) : ?>

    <!-- SINGLE PAGE CONTENT
    =======================================================================-->

    <!-- TITLE
    ======================================================================-->
    
    <div class="container">
        <div class="row single-portflio-post__title">
            <div class="col-sm-12 headline category-caption">

                <h2><?php the_title(); ?></h2>

            </div><!--.column .headline -->
        </div><!-- .row -->
    </div><!-- .container -->

    <!-- SLIDER
    ======================================================================-->

    <div class="slick-slider-wrapper">

        <div class="container-fluid">
            <div class="row single-portflio-post__slider">
                            
                <div class="single-portflio-post__slider-main center">
        
                        <img class="slick-slider__slide" src="<?php echo $port_image_one['url']; ?>" alt="green object">

                        <img class="slick-slider__slide" src="<?php echo $port_image_two['url']; ?>" alt="green object">

                        <img class="slick-slider__slide" src="<?php echo $port_image_three['url']; ?>" alt="green object">

                        <img class="slick-slider__slide"src="<?php echo $port_image_four['url']; ?>" alt="green object">

                </div><!-- .column -->

            </div><!-- .row -->
        </div><!-- .container-fluid -->

        <div class="container single-portflio-post__slider-nav hidden-xs hidden-sm">
            <div class="row single-portflio-post__slider">
                            
                <div class="single-portflio-post__slick-silder slider-nav">
        
                        <img class="slick-slider__slide" src="<?php echo $port_image_one['url']; ?>" alt="green object">

                        <img class="slick-slider__slide" src="<?php echo $port_image_two['url']; ?>" alt="green object">

                        <img class="slick-slider__slide" src="<?php echo $port_image_three['url']; ?>" alt="green object">

                        <img class="slick-slider__slide"src="<?php echo $port_image_four['url']; ?>" alt="green object">

                </div><!-- .column -->

            </div><!-- .row -->
        </div><!-- .container -->
        
    </div><!-- .slick-slider-wrapper -->
    
    <!-- POST CONTENT
    ======================================================================-->
    <div class="container container--padding">
        <div class="row single-portflio-post__content">

            <div class="col-md-4">

                <figure class="portfolio-item single-portflio-post__content__figure">
                    <img src="<?php the_post_thumbnail_url(); ?>" class="img-responsive hidden-xs hidden-sm">

                    <div class="portfolio-item__overlay portfolio-item__overlay--no-text">
                        <a href="single-portfolio-post.html">
                            <span class="icon-arrow-68 btn-custom-3 btn-custom-3--alt"></span>
                        </a>
                    </div><!-- .category-gallery__item__overlay -->

                </figure><!-- .portfolio-item -->

                <figcaption class="single-portflio-post__content__figcaption">
                    <h4>Project Details</h4>

                    <div class="blog-post__meta">
                        <p>Posted by <span class="text-color"><?php the_author(); ?></span> on <?php the_date(); ?></p>
                    </div><!-- .blog-post__meta -->

                    <ul class="list-unstyled">

                        <?php
                            $postwebtags = get_the_terms( get_the_ID() , 'web_tags' );
                            if ($postwebtags) {
                                foreach($postwebtags as $webtag) {
                                    echo '<div class="webtag">' . $webtag->name . '</div>'; 
                                }
                            }
                        ?>

                    </ul>
                </figcaption><!-- .single-portflio-post__content__figcaption -->

            </div><!-- .col -->

            <div class="col-md-8">
                <p class="single-porfolio-post__content__text">

                    <?php the_content(); ?>

                </p>
            </div><!-- .col -->   

        </div><!-- .row -->

    </div><!-- .container -->

    <?php else : ?>

     <!-- CATEGORY GALLERY ITEM CONTENT
    =======================================================================-->   

        <div class="category-gallery__item">

            <?php if( has_post_thumbnail() ) : ?>

                <img src="<?php echo get_the_post_thumbnail_url(); ?>" class="img-responsive">

            <?php else : ?>

                <img src="http://localhost/emeraldJA-wp/wp-content/uploads/2017/07/frog-1.png" class="img-responsive">

            <?php endif; ?>

            <div class="category-gallery__item__overlay">
                <a href="<?php echo esc_url( get_permalink() ) ?>">
                    <h4><?php the_title(); ?><span class="icon-arrow-68 btn-custom-3" ></span></h4>
                </a>
            </div><!-- .category-gallery__item__overlay -->

        </div><!-- .category-gallery__item -->
    
    <?php endif; ?>

</article><!-- #post-<?php the_ID(); ?> -->