<?php
	# -- Template Name: Page home
	/* You MUST change the name of the file to be page-home.php in order for this to work (and then it will automatically)
	*You can use this if the home page is drastically different from the other pages- edit at will
	*/
	get_header(); ?>

<div id="main">

		<div class="container">
			<div id="content" role="main">

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>


					<div class="entry-content">
						<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'twentyten' ), 'after' => '</div>' ) ); ?>
						<?php edit_post_link( __( 'Edit', 'twentyten' ), '<span class="edit-link">', '</span>' ); ?>
					</div><!-- .entry-content -->
				</div><!-- #post-## -->

				<?php comments_template( '', true ); ?>

<?php endwhile; ?>

			</div><!-- #content -->
		</div><!-- #container -->
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
