<?php
/**
 * cotodi functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package cotodi
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function cotodi_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on cotodi, use a find and replace
		* to change 'cotodi' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'cotodi', get_template_directory() . '/languages' );

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
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'cotodi' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'cotodi_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'cotodi_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function cotodi_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'cotodi_content_width', 640 );
}
add_action( 'after_setup_theme', 'cotodi_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function cotodi_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'cotodi' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'cotodi' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'cotodi_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function cotodi_scripts() {
	wp_enqueue_style( 'cotodi-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_enqueue_style( 'cotodi-main', get_template_directory_uri(). '/dist/main.css' );
	wp_enqueue_style('bootstrap-icons', 'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css');

	wp_style_add_data( 'cotodi-style', 'rtl', 'replace' );

	wp_enqueue_script( 'cotodi-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	
	wp_enqueue_script( 'bootstrap-popperjs', 'https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js', array('jquery') );
	wp_enqueue_script( 'bootstrap-script', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js', array('jquery') );
	wp_enqueue_script( 'cotodi-script', get_template_directory_uri() . '/js/scripts.js', array('jquery') );


	
	
	




	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'cotodi_scripts' );


/**
 * Custom fonts
 */
function enqueue_custom_fonts() {
	if(!is_admin()){

		wp_register_style('poppions', 'https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
		wp_register_style('nunito', 'https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&display=swap');
				
		wp_enqueue_style('poppins');
		wp_enqueue_style('nunito');
	}
}

add_action('wp_enqueue_scripts', 'enqueue_custom_fonts');


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}



/**
 * Show cart contents / total Ajax
 */
add_filter( 'woocommerce_add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment' );

function woocommerce_header_add_to_cart_fragment( $fragments ) {
	global $woocommerce;

	ob_start();

	?>
	<a class="cart-customlocation" href="<?php echo esc_url(wc_get_cart_url()); ?>" title="<?php _e('View your shopping cart', 'woothemes'); ?>"><?php echo sprintf(_n('%d item', '%d items', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count);?> – <?php echo $woocommerce->cart->get_cart_total(); ?></a>
	<?php
	$fragments['a.cart-customlocation'] = ob_get_clean();
	return $fragments;
}



/**
 * custom widget  footer one
 */


function custom_footer_widget_one() {
	$args = array (
		'id'          	=> 'footer-widget-col-one',
		'name'        	=> __('Footer Column One', 'text_domain'),
		'description' 	=> __('Column One', 'text_domain'),
		'before_title'  => '<h3 class="title">',
		'after_title'	=> '</h3>',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'	=> '</div>'

	);
	register_sidebar($args);
}

add_action('widgets_init', 'custom_footer_widget_one');



/**
 * custom widget  footer two
 */


function custom_footer_widget_two() {
	$args = array (
		'id'          	=> 'footer-widget-col-two',
		'name'        	=> __('Footer Column Two', 'text_domain'),
		'description' 	=> __('Column Two', 'text_domain'),
		'before_title'  => '<h3 class="title">',
		'after_title'	=> '</h3>',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'	=> '</div>'

	);
	register_sidebar($args);
}

add_action('widgets_init', 'custom_footer_widget_two');



/**
 * custom widget  footer three
 */


function custom_footer_widget_three() {
	$args = array (
		'id'          	=> 'footer-widget-col-three',
		'name'        	=> __('Footer Column Three', 'text_domain'),
		'description' 	=> __('Column Three', 'text_domain'),
		'before_title'  => '<h3 class="title">',
		'after_title'	=> '</h3>',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'	=> '</div>'

	);
	register_sidebar($args);
}

add_action('widgets_init', 'custom_footer_widget_three');






/**
 * woocommenrce theme support
 */


 add_theme_support('woocommerce');



 /**
 * woocommerce style management
 */

 //remove woocommerce styles
 function remove_woocommerce_styles($enqueue_styles) {
	unset($enqueue_styles['woocommerce-general']); // remove the gloss
	//unset($enqueue_styles['woocommerce-layout]); // Remove the layout
	//unset($enqueue_styles['woocommerce-smallscreen']); // Remove the smallscreen optimisation

	return $enqueue_styles;

 }
 add_filter('woocommerce_enqueue_styles', 'remove_woocommerce_styles');



  /**
 * woocommerce custom style
 */

 
 function wp_enqueue_woocommerce_style() {
	wp_register_style('mytheme-woocommerce', get_template_directory_uri().'/css/woocommerce/woocommerce.css');
	
	if(class_exists('woocommerce')) {
		wp_enqueue_style('mytheme-woocommerce');
	}
 }
 
 add_action('wp_enqueue_scripts', 'wp_enqueue_woocommerce_style');


//https://www.wp-hasty.com/tools/wordpress-custom-post-type-generator/
 // Register Custom Post Type Movie
function create_movie_cpt() {

	$labels = array(
		'name' => _x( 'Movies', 'Post Type General Name', 'cotodi' ),
		'singular_name' => _x( 'Movie', 'Post Type Singular Name', 'cotodi' ),
		'menu_name' => _x( 'Movies', 'Admin Menu text', 'cotodi' ),
		'name_admin_bar' => _x( 'Movie', 'Add New on Toolbar', 'cotodi' ),
		'archives' => __( 'Movie Archives', 'cotodi' ),
		'attributes' => __( 'Movie Attributes', 'cotodi' ),
		'parent_item_colon' => __( 'Parent Movie:', 'cotodi' ),
		'all_items' => __( 'All Movies', 'cotodi' ),
		'add_new_item' => __( 'Add New Movie', 'cotodi' ),
		'add_new' => __( 'Add New', 'cotodi' ),
		'new_item' => __( 'New Movie', 'cotodi' ),
		'edit_item' => __( 'Edit Movie', 'cotodi' ),
		'update_item' => __( 'Update Movie', 'cotodi' ),
		'view_item' => __( 'View Movie', 'cotodi' ),
		'view_items' => __( 'View Movies', 'cotodi' ),
		'search_items' => __( 'Search Movie', 'cotodi' ),
		'not_found' => __( 'Not found', 'cotodi' ),
		'not_found_in_trash' => __( 'Not found in Trash', 'cotodi' ),
		'featured_image' => __( 'Featured Image', 'cotodi' ),
		'set_featured_image' => __( 'Set featured image', 'cotodi' ),
		'remove_featured_image' => __( 'Remove featured image', 'cotodi' ),
		'use_featured_image' => __( 'Use as featured image', 'cotodi' ),
		'insert_into_item' => __( 'Insert into Movie', 'cotodi' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Movie', 'cotodi' ),
		'items_list' => __( 'Movies list', 'cotodi' ),
		'items_list_navigation' => __( 'Movies list navigation', 'cotodi' ),
		'filter_items_list' => __( 'Filter Movies list', 'cotodi' ),
	);
	$args = array(
		'label' => __( 'Movie', 'cotodi' ),
		'description' => __( 'The movies', 'cotodi' ),
		'labels' => $labels,
		'menu_icon' => 'dashicons-video-alt2
',
		'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'author', 'comments', 'trackbacks', 'page-attributes', 'custom-fields'),
		'taxonomies' => array(),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 5,
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => true,
		'can_export' => true,
		'has_archive' => true,
		'hierarchical' => false,
		'exclude_from_search' => false,
		'show_in_rest' => true,
		'publicly_queryable' => true,
		'capability_type' => 'post',
	);
	register_post_type( 'movie', $args );

}
add_action( 'init', 'create_movie_cpt', 0 );



// Register Taxonomy Genre for movies
function create_genre_taxonomy() {

	$labels = array(
		'name'              => _x( 'Genres', 'taxonomy general name', 'cotodi' ),
		'singular_name'     => _x( 'Genre', 'taxonomy singular name', 'cotodi' ),
		'search_items'      => __( 'Search Genres', 'cotodi' ),
		'all_items'         => __( 'All Genres', 'cotodi' ),
		'parent_item'       => __( 'Parent Genre', 'cotodi' ),
		'parent_item_colon' => __( 'Parent Genre:', 'cotodi' ),
		'edit_item'         => __( 'Edit Genre', 'cotodi' ),
		'update_item'       => __( 'Update Genre', 'cotodi' ),
		'add_new_item'      => __( 'Add New Genre', 'cotodi' ),
		'new_item_name'     => __( 'New Genre Name', 'cotodi' ),
		'menu_name'         => __( 'Genre', 'cotodi' ),
	);
	$args = array(
		'labels' => $labels,
		'description' => __( 'Movie Genre', 'cotodi' ),
		'hierarchical' => true,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'show_in_nav_menus' => true,
		'show_tagcloud' => true,
		'show_in_quick_edit' => true,
		'show_admin_column' => true,
		'show_in_rest' => true,
	);
	register_taxonomy( 'genre', array('movie'), $args );

}
add_action( 'init', 'create_genre_taxonomy' );



// Register Taxonomy Year
function create_year_taxonomy() {

	$labels = array(
		'name'              => _x( 'Years', 'taxonomy general name', 'cotodi' ),
		'singular_name'     => _x( 'Year', 'taxonomy singular name', 'cotodi' ),
		'search_items'      => __( 'Search Years', 'cotodi' ),
		'all_items'         => __( 'All Years', 'cotodi' ),
		'parent_item'       => __( 'Parent Year', 'cotodi' ),
		'parent_item_colon' => __( 'Parent Year:', 'cotodi' ),
		'edit_item'         => __( 'Edit Year', 'cotodi' ),
		'update_item'       => __( 'Update Year', 'cotodi' ),
		'add_new_item'      => __( 'Add New Year', 'cotodi' ),
		'new_item_name'     => __( 'New Year Name', 'cotodi' ),
		'menu_name'         => __( 'Year', 'cotodi' ),
	);
	$args = array(
		'labels' => $labels,
		'description' => __( 'Movie Release Year', 'cotodi' ),
		'hierarchical' => false,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'show_in_nav_menus' => true,
		'show_tagcloud' => true,
		'show_in_quick_edit' => true,
		'show_admin_column' => true,
		'show_in_rest' => true,
	);
	register_taxonomy( 'movie-year', array('movie'), $args );

}
add_action( 'init', 'create_year_taxonomy' );


// pagination
function cotodi_pagination(){
    $allowed_tags = [
        'span' => [
            'class' => [],
        ],
        'a' => [
            'class' => [],
            'href' => [],
        ]
    ];
    $args = [
        'before_page_number' => '<span class="btn border border-secondary mr-2 mb-2">',
        'after_page_number' => '</span>',
    ];

    printf('<nav class="cotodi-pagination clearfix">%s</nav>', wp_kses(paginate_links($args), $allowed_tags));


}

 
/**
 * Plugin Name: Simple WordPress Language Switcher
 * Version: 1.0.0.
 */

if ( ! defined( 'ABSPATH' ) ) { return; }

class SimpleWordPressLanguageSwitcher {
   
  public function __construct() {
		add_action( 'init', [ $this, 'set_locale' ] );
		add_action( 'pre_determine_locale',[ $this, 'get_locale' ] );
  }
  
  /**
   * Set the Locale in Cookie if it exists.
   */
  public function set_locale() {
     
  }


  /**
   * Get the Locale from cookie if it exists.
   */
  public function get_locale( $locale ) {
    

    return $locale;
  }

}

new SimpleWordPressLanguageSwitcher();