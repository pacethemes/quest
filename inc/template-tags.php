<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package trivoo-free
 */

if ( ! function_exists( 'the_posts_navigation' ) ) :
	/**
	 * Display navigation to next/previous set of posts when applicable.
	 *
	 * @todo Remove this function when WordPress 4.3 is released.
	 */
	function the_posts_navigation() {
		// Don't print empty markup if there's only one page.
		if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
			return;
		}
?>
	<nav class="navigation posts-navigation" role="navigation">
		<h2 class="screen-reader-text"><?php _e( 'Posts navigation', 'trivoo-free' ); ?></h2>
		<div class="nav-links">

			<?php if ( get_next_posts_link() ) : ?>
			<div class="nav-previous"><?php next_posts_link( __( 'Older posts', 'trivoo-free' ) ); ?></div>
			<?php endif; ?>

			<?php if ( get_previous_posts_link() ) : ?>
			<div class="nav-next"><?php previous_posts_link( __( 'Newer posts', 'trivoo-free' ) ); ?></div>
			<?php endif; ?>

		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
	}
endif;

if ( ! function_exists( 'the_post_navigation' ) ) :
	/**
	 * Display navigation to next/previous post when applicable.
	 *
	 * @todo Remove this function when WordPress 4.3 is released.
	 */
	function the_post_navigation() {
		// Don't print empty markup if there's nowhere to navigate.
		$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
		$next     = get_adjacent_post( false, '', false );

		if ( ! $next && ! $previous ) {
			return;
		}
?>
	<nav class="navigation post-navigation" role="navigation">
		<h2 class="screen-reader-text"><?php _e( 'Post navigation', 'trivoo-free' ); ?></h2>
		<div class="nav-links">
			<?php
		previous_post_link( '<div class="nav-previous">%link</div>', '%title' );
		next_post_link( '<div class="nav-next">%link</div>', '%title' );
?>
		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
	}
endif;

if ( ! function_exists( 'trivoo_free_post_meta' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time, author & comments.
	 */
	function trivoo_free_post_meta() {
		echo '<time class="post-date"><i class="fa fa-clock-o"></i>' . get_the_time( get_option( 'date_format' ) ) . '</time>';

		echo '<span class="seperator">/</span><i class="fa fa-comments"></i>&nbsp;';

		echo comments_popup_link(
			__( 'No Comments', 'trivoo-framework' ),
			__( '1 Comment', 'trivoo-framework' ),
			__( '% Comments', 'trivoo-framework' ) );

	}
endif;


if ( ! function_exists( 'trivoo_free_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time and author.
	 */
	function trivoo_free_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			_x( 'Posted on %s', 'post date', 'trivoo-free' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		$byline = sprintf(
			_x( 'by %s', 'post author', 'trivoo-free' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>';

	}
endif;

if ( ! function_exists( 'trivoo_post_read_more' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function trivoo_post_read_more() {

		echo ' <div class="read-more"><a href="'. get_permalink( get_the_ID() ) . '">'.__( 'Read More', 'trivoo-framework' ).' <i class="fa fa-angle-double-right "></i></a></div>';

	}
endif;

if ( ! function_exists( 'the_archive_title' ) ) :
	/**
	 * Shim for `the_archive_title()`.
	 *
	 * Display the archive title based on the queried object.
	 *
	 * @todo Remove this function when WordPress 4.3 is released.
	 *
	 * @param string  $before Optional. Content to prepend to the title. Default empty.
	 * @param string  $after  Optional. Content to append to the title. Default empty.
	 */
	function the_archive_title( $before = '', $after = '' ) {
		if ( is_category() ) {
			$title = sprintf( __( 'Category: %s', 'trivoo-free' ), single_cat_title( '', false ) );
		} elseif ( is_tag() ) {
			$title = sprintf( __( 'Tag: %s', 'trivoo-free' ), single_tag_title( '', false ) );
		} elseif ( is_author() ) {
			$title = sprintf( __( 'Author: %s', 'trivoo-free' ), '<span class="vcard">' . get_the_author() . '</span>' );
		} elseif ( is_year() ) {
			$title = sprintf( __( 'Year: %s', 'trivoo-free' ), get_the_date( _x( 'Y', 'yearly archives date format', 'trivoo-free' ) ) );
		} elseif ( is_month() ) {
			$title = sprintf( __( 'Month: %s', 'trivoo-free' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'trivoo-free' ) ) );
		} elseif ( is_day() ) {
			$title = sprintf( __( 'Day: %s', 'trivoo-free' ), get_the_date( _x( 'F j, Y', 'daily archives date format', 'trivoo-free' ) ) );
		} elseif ( is_tax( 'post_format' ) ) {
			if ( is_tax( 'post_format', 'post-format-aside' ) ) {
				$title = _x( 'Asides', 'post format archive title', 'trivoo-free' );
			} elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) {
				$title = _x( 'Galleries', 'post format archive title', 'trivoo-free' );
			} elseif ( is_tax( 'post_format', 'post-format-image' ) ) {
				$title = _x( 'Images', 'post format archive title', 'trivoo-free' );
			} elseif ( is_tax( 'post_format', 'post-format-video' ) ) {
				$title = _x( 'Videos', 'post format archive title', 'trivoo-free' );
			} elseif ( is_tax( 'post_format', 'post-format-quote' ) ) {
				$title = _x( 'Quotes', 'post format archive title', 'trivoo-free' );
			} elseif ( is_tax( 'post_format', 'post-format-link' ) ) {
				$title = _x( 'Links', 'post format archive title', 'trivoo-free' );
			} elseif ( is_tax( 'post_format', 'post-format-status' ) ) {
				$title = _x( 'Statuses', 'post format archive title', 'trivoo-free' );
			} elseif ( is_tax( 'post_format', 'post-format-audio' ) ) {
				$title = _x( 'Audio', 'post format archive title', 'trivoo-free' );
			} elseif ( is_tax( 'post_format', 'post-format-chat' ) ) {
				$title = _x( 'Chats', 'post format archive title', 'trivoo-free' );
			}
		} elseif ( is_post_type_archive() ) {
			$title = sprintf( __( 'Archives: %s', 'trivoo-free' ), post_type_archive_title( '', false ) );
		} elseif ( is_tax() ) {
			$tax = get_taxonomy( get_queried_object()->taxonomy );
			/* translators: 1: Taxonomy singular name, 2: Current taxonomy term */
			$title = sprintf( __( '%1$s: %2$s', 'trivoo-free' ), $tax->labels->singular_name, single_term_title( '', false ) );
		} else {
			$title = __( 'Archives', 'trivoo-free' );
		}

		/**
		 * Filter the archive title.
		 *
		 * @param string  $title Archive title to be displayed.
		 */
		$title = apply_filters( 'get_the_archive_title', $title );

		if ( ! empty( $title ) ) {
			echo $before . $title . $after;
		}
	}
endif;

if ( ! function_exists( 'the_archive_description' ) ) :
	/**
	 * Shim for `the_archive_description()`.
	 *
	 * Display category, tag, or term description.
	 *
	 * @todo Remove this function when WordPress 4.3 is released.
	 *
	 * @param string  $before Optional. Content to prepend to the description. Default empty.
	 * @param string  $after  Optional. Content to append to the description. Default empty.
	 */
	function the_archive_description( $before = '', $after = '' ) {
		$description = apply_filters( 'get_the_archive_description', term_description() );

		if ( ! empty( $description ) ) {
			/**
			 * Filter the archive description.
			 *
			 * @see term_description()
			 *
			 * @param string  $description Archive description to be displayed.
			 */
			echo $before . $description . $after;
		}
	}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function trivoo_free_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'trivoo_free_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
				'fields'     => 'ids',
				'hide_empty' => 1,

				// We only need to know if there is more than one category.
				'number'     => 2,
			) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'trivoo_free_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so trivoo_free_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so trivoo_free_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in trivoo_free_categorized_blog.
 */
function trivoo_free_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'trivoo_free_categories' );
}
add_action( 'edit_category', 'trivoo_free_category_transient_flusher' );
add_action( 'save_post',     'trivoo_free_category_transient_flusher' );


if ( ! function_exists( 'trivoo_post_taxonomy' ) ) :
	/**
	 * Shim for `trivoo_post_taxonomy()`.
	 *
	 * Display category, tag, or term description.
	 */
	function trivoo_post_taxonomy( $view ) {
		$show_categories = get_theme_mod( 'layout_'.$view.'_meta-cats', trivoo_get_default( 'layout_'.$view.'_meta-cats' ) );
		$show_tags = get_theme_mod( 'layout_'.$view.'_meta-tags', trivoo_get_default( 'layout_'.$view.'_meta-tags' ) );
		$category_list   = get_the_category_list();
		$tag_list        = get_the_tag_list( '<ul class="post-tags"><li>', "</li>\n<li>", '</li></ul>' ); // Replicates category output
		$taxonomy_output = '';

		// Categories
		if ( $show_categories && $category_list ) :
			$taxonomy_output .= '%1$s';
		endif;

		// Tags
		if ( $show_tags && $tag_list ) :
			$taxonomy_output .= '%2$s';
		endif;

		// Output
		printf(
			$taxonomy_output,
			$category_list,
			$tag_list
		);
	}
endif;


if ( ! function_exists( 'trivoo_post_single_navigation' ) ) :
	/**
	 * Shim for `the_archive_description()`.
	 *
	 * Display category, tag, or term description.
	 */
	function trivoo_post_single_navigation() {
		global $post;
?>
    <div class="pagination post-pagination row">
        <div class="previous col-md-6 col-sm-6"><?php previous_post_link( '%link',  '<i class="fa fa-chevron-left"></i><div class="text">'.__( 'Previous Article', 'trivoo-framework' ).'</div> <h4>%title</h4>' ); ?></div>
        <div class="next col-md-6 col-sm-6"><?php next_post_link( '%link',  '<i class="fa fa-chevron-right"></i><div class="text">'.__( 'Next Article', 'trivoo-framework' ).'</div> <h4>%title</h4>' ); ?></div>
    </div>
    <?php
	}
endif;

if ( ! function_exists( 'trivoo_post_author_info' ) ) :
	/**
	 * Shim for `trivoo_post_author_info()`.
	 *
	 * Display category, tag, or term description.
	 */
	function trivoo_post_author_info() {
		global $post;
		$auth_info = get_the_author_meta( 'description' );
		//if(of_get_option('author_info','yes') == 'yes' && $auth_info != '') : ?>
        <div id="about-author" class="clearfix author">
            <h2><?php _e( 'by ', 'trivoo-framework' ) ?><?php the_author_posts_link(); ?></h2>
            <div class="avatar">
                 <?php  echo get_avatar( get_the_author_meta( 'ID' ), 70 );    ?>
            </div>
            <div class="author-content">
                <?php echo $auth_info ?>
            </div>
        </div>
    <?php //endif;
	}
endif;


if ( !function_exists( 'trivoo_try_sidebar' ) ) :

	function trivoo_try_sidebar( $view , $position ) {
		$pos = get_theme_mod( 'layout_'.$view.'_sidebar', trivoo_get_default( 'layout_'.$view.'_sidebar' ) );
		if ( $pos === $position ) {
			get_sidebar();
		}
	}

endif;


if ( !function_exists( 'trivoo_main_cls' ) ) :

	function trivoo_main_cls() {
		$view = trivoo_get_view();
		$pos = get_theme_mod( 'layout_'.$view.'_sidebar', trivoo_get_default( 'layout_'.$view.'_sidebar' ) );
		if ( $pos === 'none' ) {
			echo 'col-md-12';
		} else {
			echo 'col-md-9';
		}
	}

endif;


if ( !function_exists( 'trivoo_title_bar' ) ) :

	function trivoo_title_bar( $view ) {
		$title_bar = get_theme_mod( 'layout_'.$view.'_title-bar', trivoo_get_default( 'layout_'.$view.'_title-bar' ) );
		if ( $title_bar ) : ?>
		<div class="trivoo-row" id="title-container">
			<div class="container title-container">
				<div class="row">
					<div class="col-md-6">
						<h3><?php trivoo_page_title(); ?></h3>
					</div>
					<div class="col-md-6">
						<?php trivoo_breadcrumb();  ?>
					</div>
				</div>
			</div>
		</div>
		<?php
		endif;
	}

endif;


if ( !function_exists( 'trivoo_page_title' ) ) :

	function trivoo_page_title() {
		if ( is_search() ) {
			echo __( 'Search results for: ', 'trivoo-framework' ) . get_search_query();
		} else if ( is_archive() ) {
				single_cat_title();
			} else if ( is_home() ) {
				echo get_bloginfo( 'name' );
			} else {
			the_title();
		}
	}

endif;


/*****************************************************************************************************/

/* FUNCTION TO DISPLAY COMMENTS */

/*****************************************************************************************************/

function trivoo_comments( $comment, $args, $depth ) {

	$GLOBALS['comment'] = $comment;

	if ( get_comment_type() == 'pingback' || get_comment_type() == 'trackback' ): ?>

        <li class="pingback" id="comment-<?php comment_ID() ?>">
            <article <?php comment_class( 'clearfix' ) ?>>
                <div class="comment-meta">
                    <?php _e( 'Pingback:', 'trivoo-framework' ) ?>
                    <?php edit_comment_link() ?>
                </div>
                <div class="comment-content">
                    <?php comment_author_link(); ?>
                </div>
            </article>
        </li>

    <?php elseif ( get_comment_type() == 'comment' ): ?>

        <li id="comment-<?php comment_ID() ?>">
            <article <?php comment_class( 'clearfix' ) ?>>
                <div class="avatar">
                    <?php echo get_avatar( $comment, 70 ); ?>
                </div>
                <div class="comment-meta">
                    <?php $author_url = get_comment_author_url();
	if ( empty( $author_url ) || 'http://' == $author_url ): ?>
                                <i class="fa fa-user"></i>
                                <span class="comment-author"><?php comment_author(); ?></span>
                    <?php else: ?>
                            <i class="fa fa-user"></i>
                            <a class="comment-author" href="<?php $author_url; ?>"><?php comment_author(); ?></a>
                    <?php endif; ?>
                    <span class="comment-date post-date"><i class="fa fa-clock-o"></i><?php comment_date(); ?> <?php _e( 'at', 'trivoo' ) ?> <?php comment_time(); ?></span>
                    <span class="comment-reply"> <i class="fa fa-reply"></i>
                        <?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
                    </span>
                </div>
                <div class="comment-content">
                    <?php if ( $comment->comment_approved == '0' ): ?>
                        <p><?php _e( 'Your comment is awaiting moderation', 'trivoo-framework' ) ?></p>
                    <?php endif; ?>
                    <?php comment_text(); ?>
                </div>
            </article>
        </li>
    <?php  endif;
}

function trivoo_custom_comment_fields() {
	$commenter = wp_get_current_commenter();
	$req = get_option( 'require_name_email' );
	$aria_req = ( $req ? " aria-required='true'" : ' ' );
}

add_filter( 'comment_form_default_fields', 'trivoo_custom_comment_fields' );


/*****************************************************************************************************/

/* PAGINATION/BREADCRUMB FUNCTIONS */

/*****************************************************************************************************/

function trivoo_pagination( $pages = '', $range = 2 ) {
	$showitems = ( $range * 2 ) + 1;

	global $paged;
	if ( empty( $paged ) ) $paged = 1;

	if ( $pages == '' ) {
		global $wp_query;
		$pages = $wp_query->max_num_pages;
		if ( !$pages ) {
			$pages = 1;
		}
	}

	if ( 1 != $pages ) {
		echo "<div class='center'><ul class='pagination'>";
		if ( $paged > 1 ) echo "<li><a class='prev' href='" . get_pagenum_link( $paged - 1 ) . "'><i class='fa fa-angle-double-left'></i></a></li>";

		for ( $i = 1; $i <= $pages; $i++ ) {
			if ( 1 != $pages && ( !( $i >= $paged + $range + 1 || $i <= $paged - $range - 1 ) || $pages <= $showitems ) ) {
				echo ( $paged == $i ) ? "<li class='active'><a href='" . get_pagenum_link( $i ) . "'>" . $i . "</a></li>" : "<li><a href='" . get_pagenum_link( $i ) . "' >" . $i . "</a></li>";
			}
		}

		if ( $paged < $pages ) echo "<li><a class='next' href='" . get_pagenum_link( $paged + 1 ) . "'><i class='fa fa-angle-double-right '></i></a></li>";
		echo "</ul></div>\n";
	}
}

function trivoo_breadcrumb() {
	global $post;
	echo '<ul class="breadcrumbs">';

	if ( !is_front_page() ) {
		echo '<li><a href="';
		echo home_url();
		echo '">' . __( 'Home', 'trivoo-framework' );
		echo "</a></li>";
	}

	if ( is_category() || is_single() && !is_singular( 'portfolio' ) ) {
		$category = get_the_category();
		if ( isset( $category[0] ) ) {
			$ID = $category[0]->cat_ID;
			echo '<li>' . get_category_parents( $ID, TRUE, '', FALSE ) . '</li>';
		}
	}

	if ( is_singular( 'portfolio' ) ) {
		echo get_the_term_list( $post->ID, 'portfolio_category', '<li>', ' - ', '</li>' );
	}

	if ( is_home() ) {
		echo '<li>' . get_option( 'blog_title', 'Blog' ) . '</li>';
	}
	if ( is_single() || is_page() ) {
		echo '<li>' . get_the_title() . '</li>';
	}
	if ( is_tag() ) {
		echo '<li>' . "Tag: " . single_tag_title( '', FALSE ) . '</li>';
	}
	if ( is_404() ) {
		echo '<li>' . __( "404 - Page not Found", 'trivoo-framework' ) . '</li>';
	}
	if ( is_search() ) {
		echo '<li>' . __( "Search", 'trivoo-framework' ) . '</li>';
	}
	if ( is_year() ) {
		echo '<li>' . get_the_time( 'Y' ) . '</li>';
	}

	echo "</ul>";
}