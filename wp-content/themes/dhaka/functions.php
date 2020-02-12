<?php
/**
 * Dhaka functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Dhaka
 */

if ( ! function_exists( 'dhaka_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function dhaka_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Dhaka, use a find and replace
	 * to change 'dhaka' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'dhaka', get_template_directory() . '/languages' );

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
		'primary' => esc_html__( 'Primary', 'dhaka' ),
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
	add_theme_support( 'custom-background', apply_filters( 'dhaka_custom_background_args', array(
		'default-color' => 'fafafd',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif;
add_action( 'after_setup_theme', 'dhaka_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function dhaka_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'dhaka_content_width', 640 );
}
add_action( 'after_setup_theme', 'dhaka_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function dhaka_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'dhaka' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'dhaka' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	//Footer widget areas
	for ($i=1; $i<=3; $i++) {
		register_sidebar( array(
			'name'          => __( 'Footer ', 'dhaka' ) . $i,
			'id'            => 'footer-widget-' . $i,
			'description'   => esc_html__( 'Add widgets here to appear in Footer ', 'dhaka' ) .$i,
			'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="footer-widget-title">',
			'after_title'   => '</h4>',
		) );
	}
}
add_action( 'widgets_init', 'dhaka_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function dhaka_scripts() {
	if ( get_theme_mod('body_font_name') !='' ) {
		wp_enqueue_style( 'dhaka-body-fonts', '//fonts.googleapis.com/css?family=' . esc_attr(get_theme_mod('body_font_name')) );
	} else {
		wp_enqueue_style( 'dhaka-body-fonts', '//fonts.googleapis.com/css?family=Noto+Sans');
	}
	if ( get_theme_mod('heading_font_name') !='' ) {
		wp_enqueue_style( 'dhaka-heading-fonts', '//fonts.googleapis.com/css?family=' . esc_attr(get_theme_mod('heading_font_name')) );
	} else {
		wp_enqueue_style( 'dhaka-heading-fonts', '//fonts.googleapis.com/css?family=Noto+Sans');
	}
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css', array(), '4.7.0' );
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), '3.3.7' );
	wp_enqueue_style( 'camera', get_template_directory_uri() . '/assets/css/camera.css', array(), '1.3.4' );
	wp_enqueue_style( 'dhaka-style', get_stylesheet_uri() );
	wp_enqueue_style( 'dhaka-mobile', get_template_directory_uri() . '/assets/css/mobile.css', array(), '1.0.0' );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), '3.3.7', true );
	wp_enqueue_script( 'mobile-customized', get_template_directory_uri() . '/assets/js/jquery.mobile.customized.min.js', array('jquery'), '1.4.5', true );
	wp_enqueue_script( 'easing', get_template_directory_uri() . '/assets/js/jquery.easing.1.3.js', array('jquery'), '1.3', true );
	wp_enqueue_script( 'camera', get_template_directory_uri() . '/assets/js/camera.min.js', array('jquery'), '1.3.4', true );
	wp_enqueue_script( 'isotope', get_template_directory_uri() . '/assets/js/isotope.pkgd.min.js', array('jquery'), '3.0.4', true );
	wp_enqueue_script( 'navigation', get_template_directory_uri() . '/assets/js/navigation.js', array('jquery'), '20151215', true );
	wp_enqueue_script( 'dhaka-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array('jquery'), '20151215', true );
	wp_enqueue_script( 'dhaka-script', get_template_directory_uri() . '/assets/js/script.js', array('jquery'), '1.0.0', true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'dhaka_scripts' );

/**
 * Custom Logo
 */
function dhaka_custom_logo() {
	$defaults = array(
		'width'       => 125,
		'height'      => 31,
		'flex-width'  => true,
		'flex-height' => true,
	);
	add_theme_support( 'custom-logo', $defaults );
}
add_action( 'after_setup_theme', 'dhaka_custom_logo' );

/**
 * woocommerce support
 */
add_action( 'after_setup_theme', 'dhaka_woocommerce_support' );
function dhaka_woocommerce_support() {
	add_theme_support( 'woocommerce' );
}

/**
 * Registers an editor stylesheet for the theme.
 */
function dhaka_theme_add_editor_styles() {
	add_editor_style( 'custom-editor-style.css' );
}
add_action( 'admin_init', 'dhaka_theme_add_editor_styles' );

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

/**
 * Load WP Bootstrap Nav Walker file.
 */
if ( ! class_exists( 'wp_bootstrap_navwalker' )) {
	require get_template_directory() . '/inc/wp_bootstrap_navwalker.php';
}

/**
 * Load Site Origin Bundle Hooks.
 */
if ( class_exists( 'SiteOrigin_Widget' ) ) {
	require get_template_directory() . '/inc/so-widgets/so-widgets.php';
}

/**
 * Typography
 */
require get_template_directory() . '/inc/typography.php';

/**
 * Theme Functions
 */
require get_template_directory() . '/inc/theme-functions.php';

/**
 * Theme Info
 */
require get_template_directory() . '/inc/theme-info.php';

/**
 * The excerpt length
 */
function dhaka_excerpt_length( $blog_excerpt ) {
	$excerpt = get_theme_mod('blog_excerpt', '60');
	return $excerpt;
}
add_filter( 'excerpt_length', 'dhaka_excerpt_length', 999 );
/**
 * Shop & Single Product Page (Removed Sidebar)
 */
function dhaka_remove_sidebar_product_pages() {
	if ( class_exists( 'WooCommerce' )) {
		remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
	}
}
add_action( 'wp', 'dhaka_remove_sidebar_product_pages' );
/**
 * WooCommerce Hook
 */
require get_template_directory() . '/inc/woo.php';

/**
 * Load TGM Plugin activation.
 */
require get_template_directory() . '/inc/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'dhaka_active_plugins' );
function dhaka_active_plugins() {
	$plugins = array(
		array(
			'name'      => 'Contact Form 7',
			'slug'      => 'contact-form-7',
			'required'  => false,
		),
		array(
			'name'      => 'WooCommerce',
			'slug'      => 'woocommerce',
			'required'  => false,
		),
		array(
			'name'      => 'Page Builder by SiteOrigin',
			'slug'      => 'siteorigin-panels',
			'required'  => false,
		),
		array(
			'name'      => 'Widgets Bundle by SiteOrigin',
			'slug'      => 'so-widgets-bundle',
			'required'  => false,
		)
	);
	tgmpa( $plugins );
}