<?php
/**
 * baSeek functions and definitions
 *
 * @package baSeek
 */

if ( ! isset( $content_width ) ) {
	$content_width = 1200;
}

if ( ! isset( $content_width ) ) {
	$sidebar_w = 8;
}

/*-----------------------------------------------------------------------------------*/
/*  enable svg images in media uploader
/*-----------------------------------------------------------------------------------*/
function cc_mime_types( $mimes ){
$mimes['svg'] = 'image/svg+xml';
return $mimes;
}
add_filter( 'upload_mimes', 'cc_mime_types' );

/*-----------------------------------------------------------------------------------*/
/*  display svg images on media uploader and feature images
/*-----------------------------------------------------------------------------------*/
function custom_admin_head() {

  $css = 'td.media-icon img[src$=".svg"] { width: 100% !important; height: auto !important; }';

  echo '<style>'.$css.'</style>';
}
add_action('admin_head', 'custom_admin_head');

if ( ! function_exists( 'baseek_setup' ) ) :
function baseek_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on baSeek, use a find and replace
	 * to change 'baseek' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'baseek', get_template_directory() . '/languages' );

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
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 770, 433, array( 'center', 'center') ); // 16:9

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'baseek' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	/*add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );*/

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'baseek_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // baseek_setup
add_action( 'after_setup_theme', 'baseek_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function baseek_widgets_init() {

	register_sidebar( array(
		'name' => __( 'Sidebar', 'baseek' ),
		'id' => 'sidebar-main',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h1 class="widget-title">',
		'after_title' => '</h1>',
	) );

	/*register_sidebar( array(
		'name' => __( 'Header Right', 'baseek' ),
		'id' => 'header-right',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h1 class="widget-title">',
		'after_title' => '</h1>',
	) );*/

	/*register_sidebar( array(
		'name' => __( 'Home Before Content', 'baseek' ),
		'id' => 'before-content',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h1 class="widget-title">',
		'after_title' => '</h1>',
	) );*/

	/* homepage can have up to 4 columns with main widgets */
	/*register_sidebars(
		4,
		array(
			'name' => __( 'Home Widget %d', 'baseek' ),
			'id' => 'home-widget',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h1 class="widget-title">',
			'after_title' => '</h1>',
		)
	);

	register_sidebar( array(
		'name' => __( 'Home After Content', 'baseek' ),
		'id' => 'after-content',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h1 class="widget-title">',
		'after_title' => '</h1>',
	) );*/

	register_sidebars(
		4,
		array(
			'name' => __( 'Footer Widget %d', 'baseek' ),
			'id' => 'footer-widget',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h1 class="widget-title">',
			'after_title' => '</h1>',
		)
	);

	register_sidebar( array(
		'name' => __( 'Bottom', 'baseek' ),
		'id' => 'bottom',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h1 class="widget-title">',
		'after_title' => '</h1>',
	) );

}
add_action( 'widgets_init', 'baseek_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function baseek_scripts() {
	wp_enqueue_style( 'baseek-style', get_stylesheet_uri() );

	wp_enqueue_script( 'baseek-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'bootstrap-scripts', get_template_directory_uri() . '/js/bootstrap.min.js', array( 'jquery' ), '20121031', true );

	wp_enqueue_script( 'scripts', get_template_directory_uri() . '/js/scripts.js', array( 'jquery' ), '20121121', true );

	wp_enqueue_script( 'baseek-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'baseek_scripts' );

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

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

/**
 * Load Bootstrap Menu Walker.
 */
require get_template_directory() . '/inc/wp_bootstrap_navwalker.php';

/**
 * Load WooCommerce integration.
 */
require get_template_directory() . '/inc/woocommerce.php';

/**
 * Grid functions
 */
function o(){
	return get_option("baseek"); //get options specified via customizer plugin
}

function get_grid_w(){
	return 24; // 24, 16 or 12-column grid
}

function grid_w(){
	print "col-md-".get_grid_w() ;
}

function content_w(){
	if ( get_theme_mod( 'sidebar_position' ) == "hidden" ) {
		// sidebar hidden
		echo "col-md-".(get_grid_w());
	} elseif ( get_theme_mod( 'sidebar_position' ) == "left" ) {
		// sidebar on the left
		echo "col-md-".(get_grid_w() - get_theme_mod( 'sidebar_w' )." col-md-push-".get_theme_mod( 'sidebar_w' ));
	} else {
		// sidebar on the right
		echo "col-md-".(get_grid_w() - get_theme_mod( 'sidebar_w' ));
	}
}

function sidebar_w(){
	if ( get_theme_mod( 'sidebar_position' ) == "left" ) {
		// sidebar on the left
		echo "col-md-".get_theme_mod( 'sidebar_w' )." col-md-pull-".(get_grid_w() - get_theme_mod( 'sidebar_w' ));
	} else {
		// sidebar on the right
		echo "col-md-".get_theme_mod( 'sidebar_w' );
	}
}

function header_widget_w(){
	echo "col-md-".get_theme_mod( 'header_widget_w' );
}

function header_w(){
	if( is_active_sidebar( 'header-right' ) ) {
		echo "col-md-".( get_grid_w() - get_theme_mod( 'header_widget_w' ) );
	} else {
		echo "col-md-".get_grid_w();
	}
}

// has a certain page in ID
function is_tree($pid) {  // $pid = The ID of the page we're looking for pages underneath
	global $post;         // load details about this page
	if(is_page()&&($post->post_parent==$pid||is_page($pid)||get_topmost_parent($post->ID)==$pid)) return true;
	else return false;  // we're elsewhere
}

function get_topmost_parent($post_id){
  $parent_id = get_post($post_id)->post_parent;
  if($parent_id == 0){
    return $post_id;
  }else{
    return get_topmost_parent($parent_id);
  }
}

// Gravity forms - enable hide labels dropdown
add_filter( 'gform_enable_field_label_visibility_settings', '__return_true' );

// Extend Editor's permissions
function add_grav_forms(){
    $role = get_role('editor');
    $role->add_cap('gform_full_access');

		$role->add_cap('list_users');
		$role->add_cap('create_users');
		$role->add_cap('delete_users');
}
add_action('admin_init','add_grav_forms');

/*
 * Allow Editors to add any users except Administrators
 */
class JPB_User_Caps {

  // Add our filters
  function JPB_User_Caps(){
    add_filter( 'editable_roles', array(&$this, 'editable_roles'));
    add_filter( 'map_meta_cap', array(&$this, 'map_meta_cap'),10,4);
  }

  // Remove 'Administrator' from the list of roles if the current user is not an admin
  function editable_roles( $roles ){
    if( isset( $roles['administrator'] ) && !current_user_can('administrator') ){
      unset( $roles['administrator']);
    }
    return $roles;
  }

  // If someone is trying to edit or delete and admin and that user isn't an admin, don't allow it
  function map_meta_cap( $caps, $cap, $user_id, $args ){

    switch( $cap ){
        case 'edit_user':
        case 'remove_user':
        case 'promote_user':
            if( isset($args[0]) && $args[0] == $user_id )
                break;
            elseif( !isset($args[0]) )
                $caps[] = 'do_not_allow';
            $other = new WP_User( absint($args[0]) );
            if( $other->has_cap( 'administrator' ) ){
                if(!current_user_can('administrator')){
                    $caps[] = 'do_not_allow';
                }
            }
            break;
        case 'delete_user':
        case 'delete_users':
            if( !isset($args[0]) )
                break;
            $other = new WP_User( absint($args[0]) );
            if( $other->has_cap( 'administrator' ) ){
                if(!current_user_can('administrator')){
                    $caps[] = 'do_not_allow';
                }
            }
            break;
        default:
            break;
    }
    return $caps;
  }

}

$jpb_user_caps = new JPB_User_Caps();
