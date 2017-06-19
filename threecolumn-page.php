<?php
/**
 * Template Name: Three column, left and right sidebar
 *
 * A custom page template with left and right sidebar.
 *
 * The "Template Name:" bit above allows this to be selectable
 * from a dropdown menu on the edit page screen.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package AOI_Responsive
 */

get_header(); ?>
<div id="main">
 	<div class="container three-column">
        <div class="row">
        	<div class="col-sm-12" id="mobile-top">
            </div>
        </div>
    	<div class="row">
			<div class="col-md-6 col-sm-push-3" id="content" role="main">

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

				<div id="post-<?php the_ID(); ?>">
					<div class="entry-content">
						<?php the_content(); ?>
                    <?php if ( function_exists('yoast_breadcrumb') ) {
  yoast_breadcrumb('<p id="breadcrumbs">','</p>');
} ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'twentyten' ), 'after' => '</div>' ) ); ?>
						<?php edit_post_link( __( 'Edit', 'twentyten' ), '<span class="edit-link">', '</span>' ); ?>
					</div><!-- .entry-content -->
				</div><!-- #post-## -->

				<?php comments_template( '', true ); ?>

<?php endwhile; ?>

            </div><!-- #content -->

            <div class="col-sm-12" id="mobile-middle">
            </div><!-- #mobile-middle -->

            <div class="col-sm-3 col-sm-pull-6" id="sidebar">
            <?php get_sidebar(); ?>
            </div><!-- #sidebar -->

            <div class="col-sm-3" id="sidebar">
            <?php get_sidebar(right); ?>
            </div><!-- #sidebar -->


        </div><!-- .row -->
        <div class="row">
        	<div class="col-sm-12" id="mobile-bottom">
            </div>
        </div>
	</div><!-- .container -->
</div><!-- #main -->
<?php get_footer(); ?>
