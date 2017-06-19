<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */

 get_header(); ?>
<div id="main">
 	<div class="container one-column">
        <div class="row">
        	<div class="col-sm-12" id="mobile-top">
            </div>
        </div>
    	<div class="row">
			<div class="col-sm-12" id="content" role="main">
                <h1>404 error. This page may have moved or is no longer available.</h1>
                <div class="error-404-message">
                    Please check the web address you entered or use the search below to find what you were looking for.
                    <div id="search-content">
                        <form role="search" method="get" class="search-form" action="/">
                            <input type="submit" class="search-submit" value="Search">
                            <label>
                                <span class="screen-reader-text">Search for:</span>
                                <input type="search" class="search-field" placeholder="Search for..." value="" name="s" title="Search for:">
                            </label>
                        </form>
                    </div><!-- #search-content -->
                </div><!-- .404-message -->

                <div class="related-posts">
                    <h2>Or were you looking for one of these pages?</h2>

                    <?php /* Transforming the URI into search terms */

                    $search_term = substr($_SERVER['REQUEST_URI'],1);

                    $search_term = urldecode(stripslashes($search_term));

                    $find = array ("'.html'", "'[-/_]'") ;

                    /* If you only want the last term of the URI, use the fol­low­ing instead:

                    $find = array (“’.html’”, “‘.+/’”, “‘[-/_]’”) ;  */

                    $replace = " " ;

                    $search_term = trim(preg_replace ( $find , $replace , $search_term ));

                    $search_term_q = preg_replace('/ /', '%20', $search_term);

                    ?>
                    <?php
                    // Set a custom length for excerpts
                    function get_the_widget_excerpt_404(){
                    $title = get_the_title();
                    $permalink = get_permalink($post->ID);
                    $excerpt = get_the_content();
                    $excerpt = preg_replace(" (\[.*?\])",'',$excerpt);
                    $excerpt = strip_shortcodes($excerpt);
                    $excerpt = strip_tags($excerpt);
                    $excerpt = substr($excerpt, 0, 150);
                    $excerpt = substr($excerpt, 0, strripos($excerpt, " "));
                    $excerpt = trim(preg_replace( '/\s+/', ' ', $excerpt));
                    $excerpt = '<span class="blog-excerpt">'.$excerpt.'</span> ... <div class="button-container"><a title="Link to read '.$title.'" class="read-more" href="'.$permalink.'">Read More</a></div>';
                    return $excerpt;
                    }
                    ?>

                    <?php /* Use the search terms to run a query */

                    query_posts('s='. $search_term_q );

                    /* check to see if there are posts */

                    if ( have_posts() ) :

                    ?>

                    <?php /* start the loop */  while ( have_posts() ) : the_post(); ?>

                    <div><a class="related-title" href="<?php the_permalink() ?>"><?php the_title() ?></a>

                    <?php echo get_the_widget_excerpt_404(); ?>


                    </div>

                    <?php /* end the loop */  endwhile; ?>

                    <?php else: echo 'Sorry, no related pages were found.';  endif; ?>

                </div><!-- .related-posts -->

            </div><!-- #content -->

            <div class="col-sm-12" id="mobile-middle">
            </div><!-- #mobile-middle -->

        </div><!-- .row -->
        <div class="row">
        	<div class="col-sm-12" id="mobile-bottom">
            </div>
        </div>
	</div><!-- .container -->
</div><!-- #main -->
<?php get_footer(); ?>
