<?php
/**
 * Template Name: Newsletters
 *
 * The template for displaying Newslwetters Main Page. You must also go to single.php and delete the code for the blog post share toolbar and retweet social media stuff
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package AOI_Responsive
 */
if (have_posts()) { get_header(); ?>
<div id="main">
 	<div class="container">
        <div class="row">
        	<div class="col-sm-12" id="mobile-top">
            </div>
        </div>
    	<div class="row">
			<div class="col-md-8 col-sm-push-4" id="content" role="main">
                    <?php if ( function_exists('yoast_breadcrumb') ) {
  yoast_breadcrumb('<p id="breadcrumbs">','</p>');
} ?>
		<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
		<h1><?php wp_title(''); ?></h1>
		<?php
		$rand_posts = get_posts('numberposts=4&orderby=rand&category=1');
		foreach( $rand_posts as $post ) :
		setup_postdata($post);?>
		<div>
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><h3><?php the_title(); ?></h3></a>
            <div class="entry-meta">
   				<?php twentyten_posted_on(); ?>
    		</div><!-- .entry-meta -->
			<?php the_excerpt(); ?>
		</div>
		<?php endforeach; ?>
		<?php endwhile; ?>
            </div><!-- #content -->
            <div class="col-sm-4 col-sm-pull-8" id="sidebar">
            <?php get_sidebar(); ?>
            </div><!-- #sidebar -->


        </div><!-- .row -->
        <div class="row">
        	<div class="col-sm-12" id="mobile-bottom">
            </div>
        </div>
	</div><!-- .container -->
</div><!-- #main -->
<?php get_footer();} else  {
header ('HTTP/1.1 301 Moved Permanantly');
header ('Location:http://www.'.DOMAIN.'/'); } ?>
