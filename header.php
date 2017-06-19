<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package AOI_Responsive
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<script src="https://use.fontawesome.com/49824ff6c5.js"></script>
<?php wp_head(); ?>

<script type="text/javascript">
jQuery(document).ready(function($){

	// Reposition elements on mobile browsers (replace #gform_widget-2 with the id(s) of the widgets you want appended to #mobile-top comma separated)
	if($(window).width()<=767){
		// List widgets to go to top here
		//$('#gform_widget-2').appendTo($('#mobile-top').css({'display':'block'}));
		// List widgets to go to the middle here
		$('#top-left .gform_widget,#sidebar').appendTo($('#mobile-middle').css({'display':'block'}));
		// List widgets to go to bottom here
		$('#top-center,#top-right').appendTo($('#mobile-bottom').css({'display':'block'}));
	}


	// Fixed nav after scroll past header
	if(($(window).width()>=767)&&($(window).height()>=750)){

		var nav = $('#navigation');

		var headerHeight = $('#header').height() - nav.height();

		$(window).scroll(function () {
			if ($(this).scrollTop() > headerHeight) {
				nav.addClass("f-nav");
				 $('#header').css({'margin-bottom': nav.height()});
			} else {
				nav.removeClass("f-nav");
				$('#header').css({'margin-bottom': 'inherit'});
			}
		});
	}

});
</script>
<?php $og_video_thumb = get_post_meta( get_the_ID(), 'youtube_id', true);

if ($og_video_thumb !== '') { ?>
<meta property="og:image" content="<?php echo 'http://img.youtube.com/vi/' . $og_video_thumb . '/hqdefault.jpg'; ?>" />

<meta property="og:video" content="<?php echo 'http://youtu.be/' . $og_video_thumb . ''?>" />
<meta property="og:video:type" content="application/x-shockwave-flash" />
<meta property="og:video:width" content="640" />
<meta property="og:video:height" content="360" />
<meta name="twitter:player" content="<?php echo get_post_meta( get_the_ID(), 'og_video', true) ?>" />
<?php } ?>


</head>

<body <?php body_class(); ?>>
<div id="page" class="site">

	<header id="masthead" class="site-header" role="banner">
		<div class="container">
	    <div class="row">
	        <div id="branding" class="col-md-6 clearfix">
	            <a href="<?php bloginfo('url'); ?>/" class="text-hide" title="Link to INSERT LAW FIRM NAME HERE Home">INSERT LAW FIRM NAME HERE</a>
	        </div><!-- #branding -->
	        <div id="tagline" class="col-md-3 col-md-push-3 clearfix">
	            <div class="cta-1">Free Consultation</div><!-- .cta-1 -->
	            <div class="cta-2">(555) 123-4567</div><!-- .cta-2 -->
	            <div class="cta-3">Se Habla Espa&ntilde;ol</div><!-- .cta-3 -->
	        </div><!-- #tagline -->
	    </div><!-- .row -->
	</div><!-- .container -->
<div class="navbar">
		<div class="container">
			<nav class="navbar-default" role="navigation">
			<div class="container-fluid">
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="" id="">

      <?php wp_nav_menu( array( 'theme_location' => 'menu-1', 'menu_id' => 'primary-menu' ) ); ?>

    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->

		</nav><!-- #site-navigation -->
	</div>
</div>
	</header><!-- #masthead -->

		<div id="content" class="site-content">
