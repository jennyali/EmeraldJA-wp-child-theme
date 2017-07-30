<?php
/**
 * The header for my theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @package EmeraldJA
 */

?><!doctype html>
<html <?php language_attributes(); ?>>
<head>

	<title><?php wp_title( '|', true, 'right'); ?></title>
	
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<!-- Stop IE turning number strings into phone links -->
    <meta name="format-detection" content="telephone=no">
	
	<!-- Normalize -->
	<link href="../node_modules/normalize.css" rel="text/html" type="text/css">
	
	<!-- Font Icons -->
    <link href="https://file.myfontastic.com/ncjQH3qL3iqtxPyrLNBQDo/icons.css" rel="stylesheet">
	<!-- Google fonts -->
    
    <!-- HTML5 shiv and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<div id="page" class="site">

	<!-- HEADING
	======================================================================-->
		<header class="site-header navbar-custom-1" data-spy="affix" data-offset-top="197">
			
			<?php get_template_part( 'template-parts/navigation/navigation' , 'header-menu-alt'); ?>
		
		</header><!-- .site-header -->

		<?php if( !is_front_page() ) : ?>

		<section class="breadcrumbs-section container-fluid">
			<div class="breadcrumb container">
				<?php
					if ( function_exists('yoast_breadcrumb') ) {
					yoast_breadcrumb('
						<p id="breadcrumbs">','</p>
					');
					}
				?>
			</div><!-- .breadcrumb .container -->
		</section><!-- .breadcrumbs-section -->

		<?php endif; ?>

		<div id="content" class="site-content">
		
		<?php //echo get_current_template(); ?>
