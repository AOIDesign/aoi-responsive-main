<?php
/**
 * The Sidebar containing the secondary (right) widget areas.
 *
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package AOI_Responsive
 */
?>



<?php
	// A second sidebar for widgets, just because.
	if ( is_active_sidebar( 'secondary-widget-area' ) ) : ?>

		<div id="secondary" class="widget-area" role="complementary">
				<?php dynamic_sidebar( 'secondary-widget-area' ); ?>
		</div><!-- #secondary .widget-area -->

<?php endif; ?>
