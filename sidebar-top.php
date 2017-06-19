<?php
/**
 * The Top widget areas.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
?>

<?php
	/* The top widget area is triggered if any of the areas
	 * have widgets. So let's check that first.
	 *
	 * If none of the sidebars have widgets, then let's bail early.
	 */
	if (   ! is_active_sidebar( 'left-top-widget-area'  )
		&& ! is_active_sidebar( 'center-top-widget-area' )
		&& ! is_active_sidebar( 'right-top-widget-area'  )
	)
		return;
	// If we get this far, we have widgets. Let do this.
?>

			<div id="top-widget-area" role="complementary">

<?php if ( is_active_sidebar( 'left-top-widget-area' ) ) : ?>
					<div id="top-left" class="widget-area">
	                <div class="container">
	                <div class="row">
						<?php dynamic_sidebar( 'left-top-widget-area' ); ?>
					</div>
                    </div>
    				</div>
<?php endif; ?>
				
<?php if ( is_active_sidebar( 'center-top-widget-area' ) ) : ?>
				<div id="top-center" class="widget-area">
                <div class="container">
                <div class="row">
						<?php dynamic_sidebar( 'center-top-widget-area' ); ?>
                </div>
                </div>
				</div><!-- #top-center .widget-area -->
<?php endif; ?>

<?php if ( is_active_sidebar( 'right-top-widget-area' ) ) : ?>
				<div id="top-right" class="widget-area">
                <div class="container">
                <div class="row">
						<?php dynamic_sidebar( 'right-top-widget-area' ); ?>
                </div>
                </div>
				</div><!-- #top-right .widget-area -->
<?php endif; ?>
			</div><!-- #top-widget-area -->

