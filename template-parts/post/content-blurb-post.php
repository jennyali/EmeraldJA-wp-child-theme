<?php

/*
        BLURB POST / CUSTOM POST TYPE
*/

//# CUSTOM FIELDS UI

$blurb_image    = get_field( 'blurb_image' );
$blurb_title    = get_field( 'blurb_title' );
$blurb_text     = get_field( 'blurb_text' );
//====================================================================================//
?>

<article class="col-sm-4 feature">

    <div class="blurb__content">

        <img src="<?php echo $blurb_image['url']; ?>" alt="<?php echo $blurb_image['alt']; ?>">

        <h4><?php echo $blurb_title; ?></h4>

        <p><?php echo $blurb_text; ?></p>

    </div><!-- .blurb__content -->

</article><!-- .col -->