<?php

/**
 * oyanova functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package oyanova
 */

if (! defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function oyanova_setup()
{
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on oyanova, use a find and replace
		* to change 'oyanova' to the name of your theme in all the template files.
		*/
	load_theme_textdomain('oyanova', get_template_directory() . '/languages');

	// Add default posts and comments RSS feed links to head.
	add_theme_support('automatic-feed-links');

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support('title-tag');

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support('post-thumbnails');

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'header-menu-left' => esc_html__('Header Menu Left', 'oyanova'),
			'header-menu-right' => esc_html__('Header Menu Right', 'oyanova'),
			'header-mobile-menu' => esc_html__('Header Mobile Menu', 'oyanova'),
			'footer-menu' => esc_html__('Footer Menu', 'oyanova'),
			'footer-policies-menu' => esc_html__('Footer - Policies Menu', 'oyanova')
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
			'oyanova_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support('customize-selective-refresh-widgets');

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
add_action('after_setup_theme', 'oyanova_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function oyanova_content_width()
{
	$GLOBALS['content_width'] = apply_filters('oyanova_content_width', 640);
}
add_action('after_setup_theme', 'oyanova_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function oyanova_widgets_init()
{
	register_sidebar(
		array(
			'name'          => esc_html__('Sidebar', 'oyanova'),
			'id'            => 'sidebar-1',
			'description'   => esc_html__('Add widgets here.', 'oyanova'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action('widgets_init', 'oyanova_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function oyanova_scripts()
{

	wp_enqueue_style('oyanova-bootstrap-min-css', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), '20151215');
	wp_enqueue_style('oyanova-animate-min-css', get_template_directory_uri() . '/assets/css/animate.min.css', array(), '20151215');
	wp_enqueue_style('oyanova-aos-css', get_template_directory_uri() . '/assets/css/aos.css', array(), '20151215');
	wp_enqueue_style('oyanova-font-awesome-style-css', get_template_directory_uri() . '/assets/css/font-awesome-style.css', array(), '20151215');
	// wp_enqueue_style('oyanova-slick-min-css', get_template_directory_uri() . '/assets/css/slick-min.css', array(), '20151215');
	wp_enqueue_style('oyanova-custom-style', get_template_directory_uri() . '/assets/css/custom-style.css', array('oyanova-style'), time());
	wp_enqueue_style('oyanova-custom-woo', get_template_directory_uri() . '/assets/css/custom-woo.css', array('oyanova-style'), time());
	wp_enqueue_style('oyanova-custom-style-2', get_template_directory_uri() . '/assets/css/custom-style-2.css', array('oyanova-style'), time());
	if (is_front_page()) {
		wp_enqueue_style('oyanova-select2-min-css', get_template_directory_uri() . '/assets/css/select2.min.css', array(), '20151215');
	}

	wp_enqueue_style('oyanova-style', get_stylesheet_uri(), array(), _S_VERSION);
	wp_enqueue_script('jquery');
	wp_style_add_data('oyanova-style', 'rtl', 'replace');

	if (is_front_page()) {
		wp_enqueue_script('oyanova-select2-min-js', get_template_directory_uri() . '/assets/js/select2.min.js', array(), '20151215', true);
	}
	
	if (is_page('events')) {
		wp_enqueue_style(
			'swiper-css',
			'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css',
			array(),
			null
		);
		wp_enqueue_script(
			'swiper-js',
			'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js',
			array(),
			null,
			true
		);
	}

	wp_enqueue_script('oyanova-bootstrap-bundle-min-js', get_template_directory_uri() . '/assets/js/bootstrap.bundle.min.js', array(), '20151215', true);
	wp_enqueue_script('oyanova-font-awesome-min-js', get_template_directory_uri() . '/assets/js/font-awesome-min.js', array(), '20151215', true);
	// wp_enqueue_script('oyanova-slick-min-js', get_template_directory_uri() . '/assets/js/slick.min.js', array(), '20151215', true);
	wp_enqueue_script('oyanova-simplebar-js', get_template_directory_uri() . '/assets/js/simplebar.js', array(), '20151215', true);
	wp_enqueue_script('oyanova-aos-js', get_template_directory_uri() . '/assets/js/aos.js', array(), '20151215', true);
	wp_enqueue_script('oyanova-wow-min-js', get_template_directory_uri() . '/assets/js/wow.min.js', array(), '20151215', true);
	wp_enqueue_script('oyanova-custom-js', get_template_directory_uri() . '/assets/js/custom.js', array(), '20151215', true);
	wp_localize_script('oyanova-custom-js', 'custom_call', ['ajaxurl' => admin_url('admin-ajax.php'), 'homeurl' => home_url()]);
	wp_enqueue_script('oyanova-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'oyanova_scripts');

/**
 * Implement the Custom functions.
 */
require get_template_directory() . '/inc/custom-functions.php';

/**
 * Modify woocommerce related hooks and filters
 */
require get_template_directory() . '/inc/ctm-woo-functions.php';

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
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}


// Filter the output of logo to fix Googles Error about itemprop logo
add_filter('get_custom_logo', 'change_html_custom_logo');
function change_html_custom_logo()
{
	$custom_logo_id = get_theme_mod('custom_logo');
	$site_name = get_bloginfo('name');
	$html = sprintf(
		'<a href="%1$s" class="custom-logo-link" rel="home" title="' . $site_name . '">%2$s</a>',
		esc_url(home_url('/')),
		wp_get_attachment_image($custom_logo_id, 'full', false, array(
			'class'    => 'custom-logo',
			"data-no-lazy" => "1",
			'alt'  => $site_name . " Site Logo",
		))
	);
	return $html;
}

// Add a meta box to the post edit screen
function add_featured_article_meta_box()
{
	add_meta_box(
		'featured_article_meta_box', // ID
		'Featured Article',          // Title
		'render_featured_article_meta_box', // Callback
		'media-press',                   // Post type
		'side',                   // Context
		'default'                 // Priority
	);
}
add_action('add_meta_boxes', 'add_featured_article_meta_box');

// Render the meta box content
function render_featured_article_meta_box($post)
{
	// Add a nonce field so we can check for it later.
	wp_nonce_field('save_featured_article_meta_box', 'featured_article_meta_box_nonce');

	// Use get_post_meta to retrieve an existing value from the database.
	$value = get_post_meta($post->ID, 'featured_article', true);

	// Display the meta box form
	echo '<label for="featured_article">';
	echo '<input type="checkbox" id="featured_article" name="featured_article" value="1" ' . checked($value, 1, false) . ' />';
	echo ' Mark as featured article';
	echo '</label>';
}

// Save the meta box data
function save_featured_article_meta_box($post_id)
{
	// Check if our nonce is set.
	if (!isset($_POST['featured_article_meta_box_nonce'])) {
		return $post_id;
	}

	$nonce = $_POST['featured_article_meta_box_nonce'];

	// Verify that the nonce is valid.
	if (!wp_verify_nonce($nonce, 'save_featured_article_meta_box')) {
		return $post_id;
	}

	// If this is an autosave, our form has not been submitted, so we don't want to do anything.
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		return $post_id;
	}

	// Check the user's permissions.
	if ('post' == $_POST['post_type']) {
		if (!current_user_can('edit_post', $post_id)) {
			return $post_id;
		}
	}

	// Update the meta field in the database.
	$featured = isset($_POST['featured_article']) ? 1 : 0;
	update_post_meta($post_id, 'featured_article', $featured);
}
add_action('save_post', 'save_featured_article_meta_box');

//Common Call Out Box HTML Structure (ACF Settings in Global Settings)
function call_out_box()
{
	$box_title      = get_sub_field("box_title");
	$box_link       = get_sub_field("box_link");
	$box_content    = get_sub_field("box_content");
	if (!empty($box_title) || !empty($box_content) || !empty($box_link)) { ?>
		<div class="feature-box gradient-border feature-popup-box" data-aos="zoom-in" data-aos-duration="800">
			<div class="feature-text-wp" data-simplebar>
				<?php
				if (!empty($box_title)) { ?>
					<div class="feature-title">
						<h6><?php echo esc_html($box_title); ?></h6>
					</div>
				<?php
				}
				if (!empty($box_content)) { ?>
					<div class="feature-text">
						<?php echo wp_kses_post($box_content); ?>
					</div>
				<?php
				} ?>
			</div>
			<div class="feature-link">
				<?php
				if (!empty($box_link)) { ?>
					<a href="<?php echo esc_attr($box_link['url']); ?>" title="<?php echo esc_attr($box_link['title'] . ", " . $box_title); ?>" target="<?php echo esc_attr($box_link['target']); ?>">
						<?php echo esc_html($box_link['title']); ?>
					</a>
				<?php
				} ?>
				<button type="button" class="close-feature-box"><i class="fas fa-times"></i></button>
			</div>
		</div>
<?php
	}
}