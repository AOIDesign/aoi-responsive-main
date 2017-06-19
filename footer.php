<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package AOI_Responsive
 */

?>
		</div><!-- .container -->
	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="container">
					<div class="col-sm-12">
			<?php
									/* Sidebar in the footer- edit via widgets starting with First footer widget css ID #first (also has second, thrid and fourth)
									 */
									get_sidebar( 'footer' );
							?>
					</div>

					<div class="footer-connect col-sm-12">

							<div class="footer-call col-sm-6">
									<div class="footer-phone">
										<span class="pull-left glyphicon glyphicon-earphone" aria-hidden="true"></span>
											<div class="social-text">Call Today <a class="phone-number"  href="tel:5551234567">(555) 123-4567</a></div>
									</div>
							</div><!-- .footer-call -->

						<div class="social clearfix col-sm-6">


									<a title="Link to RSS Feed" href="#" target="_blank">
										<span class="fa-stack fa-lg">

										<i class="fa fa-rss"></i>
										</span>
									</a>
									<a title="Link to YouTube" href="http://www.youtube.com/" target="_blank">
										<span class="fa-stack fa-lg">

										<i class="fa fa-youtube"></i>
										</span>
									</a>
									<a title="Link to Linked In" href="http://www.linkedin.com/" target="_blank">
										<span class="fa-stack fa-lg">

										<i class="fa fa-linkedin"></i>
										</span>
									</a>
									<a title="Link to Twitter" href="https://twitter.com/" target="_blank">
										<span class="fa-stack fa-lg">

										<i class="fa fa-twitter"></i>
										</span>
									</a>
									<a title="Link to Google+" href="https://plus.google.com/" target="_blank">
										<span class="fa-stack fa-lg">

										<i class="fa fa-google-plus"></i>
										</span>
									</a>
									<a title="Link to Facebook" href="https://www.facebook.com/" target="_blank">
										<span class="fa-stack fa-lg">

										<i class="fa fa-facebook"></i>
										</span>
									</a>



							</div> <!-- .social -->

					</div><!-- .footer-connect -->

					<div class="links-locations col-sm-12">
						<div class="footer-address col-md-4">
							<img class="footer-logo" src="<?php bloginfo('stylesheet_directory');?>/images/logo-white.png" alt="INSERT LAW FIRM NAME HERE" width="260px" height="140px" />
							<address>
								123 Place Street<br>
								Suite 101<br>
								Austin, TX 78701<br>
									<a class="phone-number" href="tel:5551234567">(555) 123-4567</a><br><br />
									<a class="directions" href="https://www.google.com/maps/place/732+S+6th+St+%23200,+Las+Vegas,+NV+89101/@36.1609684,-115.1472176,17z/data=!3m1!4b1!4m5!3m4!1s0x80c8c39cdd0193c1:0x50b7a70315f6a7d1!8m2!3d36.1609684!4d-115.1450289?hl=en-US" target="_blank">Click here for directions</a>
							</address>


						</div><!-- .footer-address -->
						<div class="col-md-5">
							<div class="map">
							<?php echo do_shortcode( '[ubermenu-map address="austin, texas" zoom="13" width="300px" height="205px"]' ); ?>
							</div><!-- .map -->
						</div>

						<div class="footer-links col-md-3">
							<div class="reviews clear-fix">
									<a title="Link to view us on Yelp" href="http://www.yelp.com/biz/" target="_blank"><img src="<?php bloginfo('stylesheet_directory');?>/images/review-yelp.png" alt="Link to view us on Yelp" width="90" height="32"></a>
								<a title="Link to review us on Google" href="https://plus.google.com/" target="_blank"><img src="<?php bloginfo('stylesheet_directory');?>/images/review-google.png" alt="Link to review us on Google" width="90" height="32"></a>
							</div><!-- .reviews -->

					<?php
													wp_nav_menu( array(
															'theme_location'    => 'footerlinks',
															'depth'             => 1,
															'container'         => 'div'
													));
											?>
							</div> <!-- .footer-links -->



					</div><!-- .links-locations -->

					<div id="colophon" class="col-sm-12">



							<div class="copyright col-md-4">&copy; <?php
								$launchyear = 2011;
								if (date ("Y") > $launchyear) print $launchyear."&ndash;".date ("Y");
								else print date ("Y"); ?> INSERT LAW FIRM NAME HERE
							</div><!-- .copyright -->

							<div class="aoi-links col-md-8">
							<a href="http://www.attorneysonlineinc.com/marketing.html" title="Law Firm marketing by Attorneys Online, Inc." target="_blank">Law firm marketing</a> provided by <a href="http://www.attorneysonlineinc.com/" title="Link to Attorneys Online, Inc." target="_blank">Attorneys Online, Inc.</a>
							</div><!-- .aoi-links -->

					</div><!-- #colophon -->

	</div><!-- .container -->
</div><!-- #footer -->

<?php if(is_page("thank-you")) { ?>
<!-- Google Code for Thank You Conversion Page -->
<?php } ?>

<?php wp_footer(); ?>
<script type="text/javascript">
(function() {
	var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
	po.src = 'https://apis.google.com/js/plusone.js';
	var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
})();
</script>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
