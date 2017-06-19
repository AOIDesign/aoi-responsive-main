<?php
		/**
	 * Template Name: Sitemap
	 *
	 * A custom page template for Full width no side bar pages.
	 *
	 * @link https://codex.wordpress.org/Template_Hierarchy
	 *
	 * @package AOI_Responsive
	 */

	get_header();
?>
<div id="main">
 	<div class="container">
        <div class="row">
        	<div class="col-sm-12" id="mobile-top">
            </div>
        </div>
    	<div class="row">
			<div class="col-sm-12" id="content" role="main">

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<div class="post" id="post-<?php the_ID(); ?>">
  <div class="entry">
                    <?php if ( function_exists('yoast_breadcrumb') ) {
  yoast_breadcrumb('<p id="breadcrumbs">','</p>');
} ?>
    <?php
		the_content('<p class="serif">Read the rest of this page &raquo;</p>');
		wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number'));
	?>
	<ul>
	<?php aoi_sitemap(''); # if newsletter exclude newsletters and everything after. if not then exclude sitemap & thank you  ?>
					<!--<li><a title="Link to Newsletters" href="/newsletters">Newsletters</a>
						<ul>
						<?php /* $postslist = get_posts('numberposts=-1&cat=3'); # change cat # to whatever category id wp assigned
						foreach ($postslist as $post) :
						setup_postdata($post); ?>
							<li><a title="Link to <?php the_title(); ?>" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
						<?php endforeach; ?>
						</ul>
					</li>
                    <li><a title="Link to BLOG" href="/blog">BLOG</a>
						<ul>
						<?php  $postslist = get_posts('numberposts=-1&cat=-3'); # change cat # to whatever category id wp assigned
						foreach ($postslist as $post) :
						setup_postdata($post); ?>
							<li><a title="Link to <?php the_title(); ?>" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
						<?php endforeach; */ ?>
						</ul>
					</li>-->
       <?php # aoi_sitemap('include='); # include everything after the newsletters except sitemap and thankyou  ?>
	</ul>
  </div>
</div>
<?php endwhile; endif; ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>
<?php endwhile; endif; ?>

            </div><!-- #content -->
        </div><!-- .row -->
        <div class="row">
        	<div class="col-sm-12" id="mobile-bottom">
            </div>
        </div>
	</div><!-- .container -->
</div><!-- #main -->
<?php get_footer(); ?>
