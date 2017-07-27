<?php /* Template Name: Contact Page */ ?>

<?php
/**
 *
 *
 * 
 * @package EmeraldJA
 */

 // CUSTOM FIELDS


get_header(); ?>

<div class="container container--padding">
    <div class="row">

		<!-- PAGE CONTENT
		====================================================================-->
		<div id="primary" class="content-area col-sm-9">
			<main id="main" class="site-main">

            <!-- CONTACT FORM
            =======================================================================-->

                <?php get_template_part( 'template-parts/page/content' , 'contact-form' ); ?>




			</main><!-- #main -->
		</div><!-- #primary .col -->

        <!-- ASIDE
        ======================================================================-->
        <div class="col-sm-3">

            <?php get_sidebar(); ?>

        </div><!-- .col -->

	</div><!-- .row -->
</div><!-- .container -->

<?php
get_sidebar();
get_footer();