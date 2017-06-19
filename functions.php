<?php
/**
 * AOI Responsive functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package AOI_Responsive
 */

if ( ! function_exists( 'aoi_responsive_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function aoi_responsive_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on AOI Responsive, use a find and replace
	 * to change 'aoi-responsive-main' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'aoi-responsive-main', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'menu-1' => esc_html__( 'Primary', 'aoi-responsive-main' ),
		'footerlinks' => esc_html__( 'Footer', 'aoi-responsive-main' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'aoi_responsive_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif;
add_action( 'after_setup_theme', 'aoi_responsive_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function aoi_responsive_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'aoi_responsive_content_width', 640 );
}
add_action( 'after_setup_theme', 'aoi_responsive_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function aoi_responsive_widgets_init() {

	register_sidebar( array(
		'name'          => esc_html__( 'Primary Sidebar', 'aoi-responsive-main' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'aoi-responsive-main' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );




}
add_action( 'widgets_init', 'aoi_responsive_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function aoi_responsive_scripts() {
	wp_enqueue_style( 'aoi-responsive-main-bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css');

	wp_enqueue_style( 'aoi-responsive-main-robo-font', 'https://fonts.googleapis.com/css?family=Roboto');

	wp_enqueue_style( 'aoi-responsive-main-style', get_stylesheet_uri() );

	wp_enqueue_script( 'aoi-responsive-main-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	wp_enqueue_script( 'aoi-responsive-main-font-awesome', 'https://use.fontawesome.com/e92e84fcd5.js', array(), '20151215', true );

wp_enqueue_script( 'aoi-responsive-main-jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js', array(), '20151215', true );

	wp_enqueue_script( 'aoi-responsive-main-bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'aoi_responsive_scripts' );

/*****************************************************************
 This function inserts the custom fields 'sitemap-hyperlink-text'
 and 'sitemap-hyperlink-title' into the sitemap template.
*****************************************************************/
class AOI_Sitemap_Walker extends Walker {
	var $tree_type = 'page';
	var $db_fields = array ('parent' => 'post_parent', 'id' => 'ID');
	function start_lvl(&$output, $depth) {
		$indent = str_repeat("\t", $depth);
		$output .= "\n$indent<ul>\n";
	}
	function end_lvl(&$output, $depth) {
		$indent = str_repeat("\t", $depth);
		$output .= "$indent</ul>\n";
	}
	function start_el(&$output, $page, $depth, $args, $current_page) {
		if ( $depth ) $indent = str_repeat("\t", $depth);
		else $indent = '';
		extract($args, EXTR_SKIP);
		$aoi_text = get_post_meta($page->ID,'sitemap-hyperlink-text',1);
		$aoi_title = get_post_meta($page->ID,'sitemap-hyperlink-title',1);
		if($aoi_text==''){
			$aoi_get_page = get_page($page->ID);
			$aoi_text = $aoi_get_page->post_title;
		}
		if($aoi_title==''){
			$aoi_get_page = get_page($page->ID);
			$aoi_title = "Link to ".$aoi_get_page->post_title;
		}
		$output .= $indent.'<li><a href="'.get_page_link($page->ID).'" title="'.$aoi_title.'">'.$aoi_text.'</a>';
	}
	function end_el(&$output, $page, $depth) {
		$output .= "</li>\n";
	}
}

function aoi_sitemap($args = '') {
  $defaults = array('depth' => 0, 'show_date' => '', 'date_format' => get_option('date_format'),
    'child_of' => 0, 'exclude' => '', 'title_li' => __('Pages'), 'echo' => 1, 'authors' => '',
    'sort_column' => 'menu_order, post_title', 'link_before' => '', 'link_after' => '');
  $r = wp_parse_args( $args, $defaults );
  $walker = new AOI_Sitemap_Walker;
  $args = array(get_pages($r), 0, $r, 0);
  print call_user_func_array(array(&$walker, 'walk'), $args);
}




function aoi_sitemap_children($parent, $sort = 'menu_order'){
	$args=array('child_of' => $parent);
	$pages = get_pages($args);

	if($pages){
	  $pageids = array();
	  foreach($pages as $page){
		$pageids[]= $page->ID;
	  }

	  $args=array(
		'title_li' => '',
		'include' =>  $parent . ',' . implode(",", $pageids),
		'sort_column' => $sort
	  );
	  aoi_sitemap($args);
	} // End if($pages)
}


	function aoi_responsive_posted_on() {
	    printf( __( '<span class="%1$s">Posted on</span> %2$s <span class="meta-sep">by</span> %3$s', 'aoi-responsive-main' ),
	        'meta-prep meta-prep-author',
	        sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><span class="entry-date">%3$s</span></a>',
	            get_permalink(),
	            esc_attr( get_the_time() ),
	            get_the_date()
	 ),
	        sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s">%3$s</a></span>',
	            get_author_posts_url( get_the_author_meta( 'ID' ) ),
	            sprintf( esc_attr__( 'View all posts by %s', 'aoi-responsive-main' ), get_the_author() ),
	            get_the_author()
	 )
	 );
	}
// is_tree support

	function is_tree($pid) {
    global $post;
    if ( ! is_page() )
            return false;
    if ( is_page( $pid ) )
            return true;
    $anc = get_post_ancestors( $post );
    if ( in_array( $pid, $anc ) )
            return true;
    return false;
}

function body_begin() {
do_action('after_body_open_tag');
}

function custom_content_after_body_open_tag() {

    ?>

		<div class="hidden">
  	<span class="vcard p-author author author_name"><span class="fn"><?php the_author(); ?></span></span>
  	<span class="post-date updated"><?php the_date(); ?></span>
  	</div>

    <?php

}

/**
 * Filter the "read more" excerpt string link to the post.
 *
 * @param string $more "Read more" excerpt string.
 * @return string (Maybe) modified "read more" excerpt string.
 */
function wpdocs_excerpt_more( $more ) {
    return sprintf( '...<br /><br /><a class="read-more" href="%1$s">%2$s</a>',
        get_permalink( get_the_ID() ),
        __( 'Read More', 'textdomain' )
    );
}
add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );

/**
 * Filter the except length to 20 words.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
function wpdocs_custom_excerpt_length( $length ) {
    return 100;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

add_filter( 'gform_enable_field_label_visibility_settings', '__return_true' );
