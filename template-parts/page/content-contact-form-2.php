<?php

/*
        CONTACT FORM   
*/

//# CUSTOM FIELDS UI
$contact_form_title         = get_field( 'contact_form_title' );
$contact_form_text         = get_field( 'contact_form_text' );
$contact_form_7_shortcode   = get_field( 'contact_form_7_shortcode' );

//====================================================================================//
?>

<section id="home_contact-form" class="contact-form-section form-custom-4">

    <!-- FORM SECTION HEADER
    ====================================================================-->        

    <div class="headline">

        <h4><?php echo $contact_form_title; ?></h4>

        <p><?php echo $contact_form_text; ?></p>

    </div><!-- .headline -->

    <!-- FORM FEILDS/INPUTS
    ====================================================================-->   

    <div class="row">
        <div class="col-sm-10 col-lg-8">

            <div class="contact-form__container">

                <?php echo $contact_form_7_shortcode; ?>

            <div><!-- .contact-form__container -->

        </div><!-- .col -->
    </div><!-- .row -->

</section><!-- #home_contact-form -->