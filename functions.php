<?php

/**
 * trivoo-free functions and definitions
 *
 * @package trivoo-free
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( !isset( $content_width ) ) {
	$content_width = 870;
	/* pixels */
}

if ( !function_exists( 'trivoo_free_setup' ) ):

	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function trivoo_free_setup() {

		/*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on trivoo-free, use a find and replace
         * to change 'trivoo-free' to the name of your theme in all the template files
        */
		if ( !load_theme_textdomain( 'trivoo-free', get_stylesheet_directory() . '/languages' ) ) {
			load_theme_textdomain( 'trivoo-free', get_template_directory() . '/languages' );
		}

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
		add_image_size( 'blog-grid', 540, 420, true );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array( 'primary' => __( 'Primary Menu', 'trivoo-free' ), ) );

		/*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
        */
		add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', ) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'trivoo_free_custom_background_args', array( 'default-color' => 'ffffff', 'default-image' => '', ) ) );

		// Allows theme developers to link a custom stylesheet file to the TinyMCE visual editor
		add_editor_style( 'custom-editor-style.css' );
	}

endif;

// trivoo_free_setup
add_action( 'after_setup_theme', 'trivoo_free_setup' );

if ( !function_exists( 'trivoo_free_widgets_init' ) ):

	/**
	 * Register widget area.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
	 */
	function trivoo_free_widgets_init() {

		//register Main sidebar widgets
		register_sidebar( array( 'name' => __( 'Sidebar', 'trivoo-free' ), 'id' => 'sidebar-1', 'description' => '', 'before_widget' => '<aside id="%1$s" class="widget %2$s sidebar-widget clearfix">', 'after_widget' => '</aside>', 'before_title' => '<h3 class="widget-title">', 'after_title' => '</h3>', ) );

		$cols = trivoo_get_mod( 'layout_footer_widgets' );

		switch ( $cols ) {
		case 1:
			$span = 12;
			break;

		case 2:
			$span = 6;
			break;

		case 3:
			$span = 4;
			break;

		case 4:
			$span = 3;
			break;
		}

		//Register Footer WIdgets
		register_sidebar( array( 'name' => __( 'Footer Widget', 'trivoo-framework' ), 'id' => __( 'footer-widget', 'trivoo-framework' ), 'before_widget' => '<article class="col-md-' . $span . ' %2$s" id="%1$s">', 'after_widget' => "</article>\n", 'before_title' => '<h1>', 'after_title' => "</h1>\n" ) );
	}

endif;

add_action( 'widgets_init', 'trivoo_free_widgets_init' );

if ( !function_exists( 'trivoo_free_scripts' ) ):

	/**
	 * Enqueue scripts and styles.
	 */
	function trivoo_free_scripts() {

		// Enqueue required styles
		wp_enqueue_style( 'trivoo-bootstrap', get_template_directory_uri() . '/assets/plugins/bootstrap/css/bootstrap.min.css' );
		wp_enqueue_style( 'smartmenus', get_template_directory_uri() . '/assets/plugins/smartmenus/addons/bootstrap/jquery.smartmenus.bootstrap.css' );
		wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/plugins/font-awesome/css/font-awesome.min.css' );
		wp_enqueue_style( 'animate-css', get_template_directory_uri() . '/assets/plugins/animate/animate.css' );
		wp_enqueue_style( 'slit-slider', get_template_directory_uri() . '/assets/plugins/FullscreenSlitSlider/css/style.css' );
		wp_enqueue_style( 'trivoo-main', get_template_directory_uri() . '/assets/css/trivoo.css' );
		wp_enqueue_style( 'trivoo-free-style', get_stylesheet_uri() );

		// Enqueue required scripts
		wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/assets/plugins/modernizr/modernizr.custom.js' );
		wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/plugins/bootstrap/js/bootstrap.js', array( 'jquery', 'masonry' ) );
		wp_enqueue_script( 'wow', get_template_directory_uri() . '/assets/plugins/wow/wow.js' );
		wp_enqueue_script( 'ba-cond', get_template_directory_uri() . '/assets/plugins/FullscreenSlitSlider/js/jquery.ba-cond.min.js', array( 'jquery' ) );
		wp_enqueue_script( 'slit-slider', get_template_directory_uri() . '/assets/plugins/FullscreenSlitSlider/js/jquery.slitslider.js' );
		wp_enqueue_script( 'colorbox', get_template_directory_uri() . '/assets/plugins/colorbox/jquery.colorbox-min.js', array( 'jquery' ) );
		wp_enqueue_script( 'smartmenus', get_template_directory_uri() . '/assets/plugins/smartmenus/jquery.smartmenus.min.js' );
		wp_enqueue_script( 'bs-smartmenus', get_template_directory_uri() . '/assets/plugins/smartmenus/addons/bootstrap/jquery.smartmenus.bootstrap.js' );
		wp_enqueue_script( 'smartmenus-keyboard', get_template_directory_uri() . '/assets/plugins/smartmenus/addons/keyboard/jquery.smartmenus.keyboard.js' );
		wp_enqueue_script( 'trivoo-js', get_template_directory_uri() . '/assets/js/trivoo.js' );

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

	}

endif;

add_action( 'wp_enqueue_scripts', 'trivoo_free_scripts' );

if ( !function_exists( 'trivoo_admin_scripts' ) ):

	/**
	 * Enqueue Admin scripts and styles.
	 */
	function trivoo_admin_scripts() {

		// Enqueue required styles
		wp_enqueue_style( 'wp-color-picker' );
		wp_enqueue_style( 'admin-panel', get_template_directory_uri() . '/custom-editor-style.css' );
		wp_enqueue_style( 'admin-panel-css', get_template_directory_uri() . '/assets/css/admin.css' );

		// Enqueue required scripts
		wp_enqueue_script( 'trivoo_custom_js', get_template_directory_uri() . '/assets/js/admin.js' );

	}

endif;

add_action( 'admin_enqueue_scripts', 'trivoo_admin_scripts' );

if ( !class_exists( 'Trivoo_Main_Menu' ) ):

	/**
	 * Trivoo_Main_Menu extends from Walker_Nav_Menu
	 * Provides custom walker functions to add/edit additional markup for the theme menu
	 */
	class Trivoo_Main_Menu extends Walker_Nav_Menu
	{

		function display_element( $element, &$children_elements, $max_depth, $depth = 0, $args, &$output ) {
			$id_field = $this->db_fields['id'];

			if ( is_object( $args[0] ) ) {
				$args[0]->has_children = !empty( $children_elements[$element->$id_field] );
			}

			return parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
		}

		function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {

			if ( $args->has_children ) {
				$item->classes[] = 'dropdown';
			}

			parent::start_el( $output, $item, $depth, $args, $id );
		}

		// add classes to ul sub-menus
		function start_lvl( &$output, $depth = 0, $args = array() ) {

			// depth dependent classes
			$indent = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' );

			$output.= "\n" . $indent . '<ul class="dropdown-menu">' . "\n";
		}
	}

endif;

if ( !function_exists( 'trivoo_wp_page_menu' ) ):

	/**
	 * Display or retrieve list of pages with optional home link.
	 *
	 * This function is copied from WP wp_page_menu function to add an extra class as
	 * the default WP function has no inbuilt way to achive this without using hacks
	 *
	 * @return string html menu
	 */
	function trivoo_wp_page_menu( $args = array() ) {
		$defaults = array( 'sort_column' => 'menu_order, post_title', 'menu_class' => 'menu', 'echo' => true, 'link_before' => '', 'link_after' => '' );
		$args = wp_parse_args( $args, $defaults );

		/**
		 * Filter the arguments used to generate a page-based menu.
		 *
		 * @since 2.7.0
		 *
		 * @see wp_page_menu()
		 *
		 * @param array   $args An array of page menu arguments.
		 */
		$args = apply_filters( 'wp_page_menu_args', $args );

		$menu = '';

		$list_args = $args;

		// Show Home in the menu
		if ( !empty( $args['show_home'] ) ) {
			if ( true === $args['show_home'] || '1' === $args['show_home'] || 1 === $args['show_home'] ) $text = __( 'Home', 'Trivoo' );
			else $text = $args['show_home'];
			$class = '';
			if ( is_front_page() && !is_paged() ) $class = 'class="current_page_item"';
			$menu.= '<li ' . $class . '><a href="' . home_url( '/' ) . '">' . $args['link_before'] . $text . $args['link_after'] . '</a></li>';

			// If the front page is a page, add it to the exclude list
			if ( get_option( 'show_on_front' ) == 'page' ) {
				if ( !empty( $list_args['exclude'] ) ) {
					$list_args['exclude'].= ',';
				}
				else {
					$list_args['exclude'] = '';
				}
				$list_args['exclude'].= get_option( 'page_on_front' );
			}
		}

		$list_args['echo'] = false;
		$list_args['title_li'] = '';
		$menu.= str_replace( array( "\r", "\n", "\t" ), '', wp_list_pages( $list_args ) );

		if ( $menu ) $menu = '<ul class="nav navbar-nav">' . $menu . '</ul>';

		$menu = '<div class="' . esc_attr( $args['menu_class'] ) . '">' . $menu . "</div>\n";

		/**
		 * Filter the HTML output of a page-based menu.
		 *
		 * @since 2.7.0
		 *
		 * @see wp_page_menu()
		 *
		 * @param string  $menu The HTML output.
		 * @param array   $args An array of arguments.
		 */
		$menu = apply_filters( 'wp_page_menu', $menu, $args );
		if ( $args['echo'] ) echo $menu;
		else return $menu;
	}
endif;


/**
 * Admin includes
 */
if ( is_admin() )  :

	/**
	 * Editor Custom Functions
	 */
	require get_template_directory() . '/inc/editor/editor.php';

	/**
	 * Page Builder
	 */
	require get_template_directory() . '/inc/pagebuilder/builder.php';

endif;

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
require get_template_directory() . '/inc/customizer/bootstrap.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';


if ( !function_exists( 'trivoo_search_menu_icon' ) ):

	/**
	 * Adds Seach Icon to the Primary Menu if the option is set in Theme Options
	 *
	 * @return string html menu
	 */
	function trivoo_search_menu_icon( $items, $args ) {

		if ( trivoo_get_mod( 'layout_header_search' ) && $args->theme_location === 'primary' ) {
			$items.= '<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children dropdown" id="menu-item-search">
                    <a href="#"><i class="fa fa-search"></i></a>
                    <ul class="dropdown-menu">
                    <li>
                    <form class="search" action="' . get_home_url() . '" method="get">
                        <div class="arrow-up"></div>
                        <input name="s" type="text" placeholder="' . __( 'Search', 'Trivoo' ) . '...">
                    </form>
                    </li>
                    </ul>
                </li>';
		}

		return $items;
	}

endif;

add_filter( 'wp_nav_menu_items', 'trivoo_search_menu_icon', 10, 2 );

?>