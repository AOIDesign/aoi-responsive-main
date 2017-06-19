<?php
/**
 * Template Name: Video Library Page
 *
 * A custom page template for video library pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package AOI_Responsive
 */
 get_header(); ?>
<div id="main">
 	<div class="container">
        <div class="row">
        	<div class="col-sm-12" id="mobile-top">
            </div>
        </div>
    	<div class="row">
        <div class="content-background">
			<div class="col-sm-12" id="content" role="main">

            <div class="col-sm-4" id="sidebar">
            <?php get_sidebar(); ?>
            </div><!-- #sidebar -->

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

                <div id="post-<?php the_ID(); ?>">


                    <div class="entry-content">
                    <?php if ( function_exists('yoast_breadcrumb') ) {
  yoast_breadcrumb('<p id="breadcrumbs">','</p>');
} ?>
                        <?php the_content(); ?>
                        <?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'twentyten' ), 'after' => '</div>' ) ); ?>
                        <?php edit_post_link( __( 'Edit', 'twentyten' ), '<span class="edit-link">', '</span>' ); ?>
                        <?php comments_template( '', true ); ?>

<?php endwhile; ?>
                        <div class="video-feed">
						<?php
						$videoCategories = get_post_meta( get_the_ID(), 'video_categories', true);

						?>
						<?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; ?>
						<?php $video_query = new WP_Query('cat='.$videoCategories.'&posts_per_page=6&paged=' . $paged ); ?>
                        <?php if ($video_query->have_posts()) : ?>
                        <?php while ($video_query->have_posts()) : $video_query->the_post(); ?>

                        <?php $video_thumbnail = get_the_post_thumbnail($video_query->ID, 'large', array ('alt' =>  get_the_title())); ?>

                          <a class="video-thumb" href="<?php the_permalink() ?>" rel="bookmark" title="Link to watch the video, <?php the_title_attribute(); ?>">
                            <?php echo '<div>'.$video_thumbnail.'</div>'; ?><span class="video-title"><?php the_title_attribute(); ?></span>
                            </a>
                        <?php endwhile; ?>
                        <div class="clear"></div>
                        <div id="nav-below" class="navigation">
                            <div class="nav-previous"><?php next_posts_link( 'Previous', $video_query->max_num_pages ); ?></div>
                            <div class="nav-next"><?php previous_posts_link( 'Next', $video_query->max_num_pages ); ?></div>
                        </div><!-- #nav-below -->
                        <?php else : ?>
                        <h2 class="center">Not Found</h2>
                        <p class="center">Sorry, but you are looking for something that isn't here.</p>
                        <?php endif; ?>
                        </div><!-- .video-feed -->

                    </div><!-- .entry-content -->
                </div><!-- #post-## -->


            </div><!-- #content -->

            <div class="col-sm-12" id="mobile-middle-form">
            </div><!-- #mobile-middle -->

            <div class="col-sm-12" id="mobile-middle">
            </div><!-- #mobile-middle -->
   			</div><!-- .content-background -->
        </div><!-- .row -->
        <div class="row">
        	<div class="col-sm-12" id="mobile-bottom">
            </div>
        </div>
	</div><!-- .container -->
</div><!-- #main -->
<?php get_footer(); ?>
