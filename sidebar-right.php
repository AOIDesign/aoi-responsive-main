<?php
/**
 * The Sidebar containing the secondary (right) widget areas.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
?>

		

<?php
	// A second sidebar for widgets, just because.
	if ( is_active_sidebar( 'secondary-widget-area' ) ) : ?>

		<div id="secondary" class="widget-area" role="complementary">
				<?php dynamic_sidebar( 'secondary-widget-area' ); ?>
		</div><!-- #secondary .widget-area -->

<?php endif; ?>
