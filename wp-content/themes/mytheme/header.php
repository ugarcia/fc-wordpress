<?php
/**
 * The Header
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package Cryout Creations
 * @subpackage mantra
 * @since mantra 0.5
 */
 ?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php bloginfo( 'charset' ); ?>" />
<?php  	cryout_seo_hook(); ?>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php
 	cryout_header_hook();
	wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<!-- Google Tag Manager -->
<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-TNWP34"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        '//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-TNWP34');</script>
<!-- End Google Tag Manager -->

<?php cryout_body_hook(); ?>

<div id="wrapper" class="hfeed">

<?php cryout_wrapper_hook(); ?>

<header id="header">

		<div id="masthead">

			<div id="branding" role="banner" >

				<?php cryout_branding_hook();?>
				<div style="clear:both;"></div>

			</div><!-- #branding -->

			<nav id="access" class="jssafe" role="navigation">

				<?php cryout_access_hook();?>

			</nav><!-- #access -->

		</div><!-- #masthead -->

	<div style="clear:both;"> </div>

</header><!-- #header -->
<div id="main">
	<div  id="forbottom" >
		<?php cryout_forbottom_hook(); ?>

		<div style="clear:both;"> </div>
		
		<?php cryout_breadcrumbs_hook();?>
							