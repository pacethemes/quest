<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @author Morgan Estes <morgan.estes@gmail.com>
 * @package Quest
 */


if ( ! function_exists( 'quest_post_meta' ) ) :


	/**
	 * Prints HTML with meta information for the current post-date/time, author & comments.
	 */
	function quest_post_meta() {
		echo '<time class="post-date updated"><i class="fa fa-clock-o"></i>' . get_the_time( get_option( 'date_format' ) ) . '</time>';

		echo '<span class="seperator">/</span>';

		echo comments_popup_link(
			__( '<i class="fa fa-comments"></i>&nbsp; No Comments', 'quest' ),
			__( '<i class="fa fa-comments"></i>&nbsp; 1 Comment', 'quest' ),
			__( '<i class="fa fa-comments"></i>&nbsp; % Comments', 'quest' ) );

	}
endif;


if ( ! function_exists( 'quest_posted_on' ) ) :


	/**
	 * Prints HTML with meta information for the current post-date/time and author.
	 */
	function quest_posted_on() {
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
			_x( 'Posted on %s', 'post date', 'quest' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		$byline = sprintf(
			_x( 'by %s', 'post author', 'quest' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>';

	}
endif;

if ( ! function_exists( 'quest_post_read_more' ) ) :


	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function quest_post_read_more() {

		echo ' <div class="read-more"><a href="' . get_permalink( get_the_ID() ) . '">' . __( 'Read More', 'quest' ) . ' <i class="fa fa-angle-double-right "></i></a></div>';

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
	 * @param string $before (optional) Optional. Content to prepend to the title. Default empty.
	 * @param string $after (optional) Optional. Content to append to the title. Default empty.
	 */
	function the_archive_title( $before = '', $after = '' ) {
		if ( is_category() ) {
			$title = sprintf( __( 'Category: %s', 'quest' ), single_cat_title( '', false ) );
		} elseif ( is_tag() ) {
			$title = sprintf( __( 'Tag: %s', 'quest' ), single_tag_title( '', false ) );
		} elseif ( is_author() ) {
			$title = sprintf( __( 'Author: %s', 'quest' ), '<span class="vcard author"><span class="fn">' . get_the_author() . '</span></span>' );
		} elseif ( is_year() ) {
			$title = sprintf( __( 'Year: %s', 'quest' ), get_the_date( _x( 'Y', 'yearly archives date format', 'quest' ) ) );
		} elseif ( is_month() ) {
			$title = sprintf( __( 'Month: %s', 'quest' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'quest' ) ) );
		} elseif ( is_day() ) {
			$title = sprintf( __( 'Day: %s', 'quest' ), get_the_date( _x( 'F j, Y', 'daily archives date format', 'quest' ) ) );
		} elseif ( is_tax( 'post_format' ) ) {
			if ( is_tax( 'post_format', 'post-format-aside' ) ) {
				$title = _x( 'Asides', 'post format archive title', 'quest' );
			} elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) {
				$title = _x( 'Galleries', 'post format archive title', 'quest' );
			} elseif ( is_tax( 'post_format', 'post-format-image' ) ) {
				$title = _x( 'Images', 'post format archive title', 'quest' );
			} elseif ( is_tax( 'post_format', 'post-format-video' ) ) {
				$title = _x( 'Videos', 'post format archive title', 'quest' );
			} elseif ( is_tax( 'post_format', 'post-format-quote' ) ) {
				$title = _x( 'Quotes', 'post format archive title', 'quest' );
			} elseif ( is_tax( 'post_format', 'post-format-link' ) ) {
				$title = _x( 'Links', 'post format archive title', 'quest' );
			} elseif ( is_tax( 'post_format', 'post-format-status' ) ) {
				$title = _x( 'Statuses', 'post format archive title', 'quest' );
			} elseif ( is_tax( 'post_format', 'post-format-audio' ) ) {
				$title = _x( 'Audio', 'post format archive title', 'quest' );
			} elseif ( is_tax( 'post_format', 'post-format-chat' ) ) {
				$title = _x( 'Chats', 'post format archive title', 'quest' );
			}
		} elseif ( is_post_type_archive() ) {
			$title = sprintf( __( 'Archives: %s', 'quest' ), post_type_archive_title( '', false ) );
		} elseif ( is_tax() ) {
			$tax = get_taxonomy( get_queried_object()->taxonomy );
			/* translators: 1: Taxonomy singular name, 2: Current taxonomy term */
			$title = sprintf( __( '%1$s: %2$s', 'quest' ), $tax->labels->singular_name, single_term_title( '', false ) );
		} else {
			$title = __( 'Archives', 'quest' );
		}

		/**
		 * Filter the archive title.
		 *
		 * @param string $title Archive title to be displayed.
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
	 * @param string $before (optional) Optional. Content to prepend to the description. Default empty.
	 * @param string $after (optional) Optional. Content to append to the description. Default empty.
	 */
	function the_archive_description( $before = '', $after = '' ) {
		$description = apply_filters( 'get_the_archive_description', term_description() );

		if ( ! empty( $description ) ) {

			/**
			 * Filter the archive description.
			 *
			 * @see term_description()
			 *
			 * @param string $description Archive description to be displayed.
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
function quest_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'quest_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'quest_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so quest_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so quest_categorized_blog should return false.
		return false;
	}
}


/**
 * Flush out the transients used in quest_categorized_blog.
 */
function quest_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'quest_categories' );
}

add_action( 'edit_category', 'quest_category_transient_flusher' );
add_action( 'save_post', 'quest_category_transient_flusher' );


if ( ! function_exists( 'quest_post_taxonomy' ) ) :


	/**
	 * Shim for `quest_post_taxonomy()`.
	 *
	 * Display category, tag, or term description.
	 *
	 * @param unknown $view
	 */
	function quest_post_taxonomy( $view ) {
		$show_categories = quest_get_mod( 'layout_' . $view . '_meta-cats' );
		$show_tags       = quest_get_mod( 'layout_' . $view . '_meta-tags' );
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


if ( ! function_exists( 'quest_post_single_navigation' ) ) :


	/**
	 * Shim for `the_archive_description()`.
	 *
	 * Display category, tag, or term description.
	 */
	function quest_post_single_navigation() {
		global $post;
		?>
		<div class="pagination post-pagination row">
			<div
				class="previous col-md-6 col-sm-6"><?php previous_post_link( '%link', '<i class="fa fa-chevron-left"></i><div class="text">' . __( 'Previous Article', 'quest' ) . '</div> <h4>%title</h4>' ); ?></div>
			<div
				class="next col-md-6 col-sm-6"><?php next_post_link( '%link', '<i class="fa fa-chevron-right"></i><div class="text">' . __( 'Next Article', 'quest' ) . '</div> <h4>%title</h4>' ); ?></div>
		</div>
	<?php
	}
endif;

if ( ! function_exists( 'quest_post_author_info' ) ) :


	/**
	 * Shim for `quest_post_author_info()`.
	 *
	 * Display category, tag, or term description.
	 */
	function quest_post_author_info() {
		global $post;
		$auth_info = get_the_author_meta( 'description' );
		?>
		<div id="about-author" class="clearfix vcard author">
			<h2 class="fn"><?php _e( 'by ', 'quest' ) ?><?php the_author_posts_link(); ?></h2>

			<div class="avatar">
				<?php echo get_avatar( get_the_author_meta( 'ID' ), 70 ); ?>
			</div>
			<div class="author-content">
				<?php echo $auth_info ?>
			</div>
		</div>
	<?php
	}
endif;


if ( ! function_exists( 'quest_try_sidebar' ) ) :


	/**
	 * Displays sidebar if the @position matches the @view sidebar position
	 *
	 * @param unknown $view
	 * @param unknown $position
	 */
	function quest_try_sidebar( $view, $position ) {
		$pos = quest_get_mod( 'layout_' . $view . '_sidebar' );
		if ( $pos === $position ) {
			get_sidebar();
		}
	}

endif;


if ( ! function_exists( 'quest_main_cls' ) ) :


	/**
	 * Prints the appropriate Bootstrap class for the main content area
	 */
	function quest_main_cls() {
		$view = quest_get_view();
		$pos  = quest_get_mod( 'layout_' . $view . '_sidebar' );
		if ( $pos === 'none' ) {
			echo 'col-md-12';
		} else {
			echo 'col-md-9';
		}
	}

endif;


if ( ! function_exists( 'quest_title_bar' ) ) :


	/**
	 * Prints the Title Bar Container
	 *
	 * @param unknown $view
	 */
	function quest_title_bar( $view ) {
		$title_bar = quest_get_mod( 'layout_' . $view . '_title-bar' );
		if ( $title_bar ) : ?>
			<div class="quest-row" id="title-container">
				<div class="<?php echo apply_filters( 'quest_content_container_cls', 'container' ); ?> title-container">
					<div class="row">
						<div class="col-md-6">
							<h3><?php quest_page_title(); ?></h3>
						</div>
						<div class="col-md-6">
							<?php quest_breadcrumb(); ?>
						</div>
					</div>
				</div>
			</div>
		<?php
		endif;
	}

endif;


if ( ! function_exists( 'quest_page_title' ) ) :


	/**
	 * Prints the Page Title inside the Title Container
	 */
	function quest_page_title() {
		if ( ( function_exists( 'is_woocommerce' ) && is_woocommerce() && is_product() ) || ( function_exists( 'is_bbpress' ) && is_bbpress() ) ) {
			the_title();
		} else if ( function_exists( 'is_woocommerce' ) && is_woocommerce() ) {
			woocommerce_page_title();
		} else if ( is_archive() ) {
			single_cat_title();
		} else if ( is_home() ) {
			echo get_bloginfo( 'name' );
		} else if ( is_search() ) {
			echo __( 'Search results for: ', 'quest' ) . get_search_query();
		} else {
			the_title();
		}
	}

endif;


if ( ! function_exists( 'quest_comments' ) ) :


	/**
	 * Prints the Comments for a page or post
	 *
	 * @param unknown $comment
	 * @param unknown $args
	 * @param unknown $depth
	 */
	function quest_comments( $comment, $args, $depth ) {

		$GLOBALS['comment'] = $comment;

		if ( get_comment_type() == 'pingback' || get_comment_type() == 'trackback' ): ?>

			<li class="pingback" id="comment-<?php comment_ID() ?>">
				<article <?php comment_class( 'clearfix' ) ?>>
					<div class="comment-meta">
						<?php _e( 'Pingback:', 'quest' ) ?>
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
							<a class="comment-author" href="<?php echo $author_url; ?>"><?php comment_author(); ?></a>
						<?php endif; ?>
						<span class="comment-date post-date"><i
								class="fa fa-clock-o"></i><?php comment_date(); ?> <?php _e( 'at', 'quest' ) ?> <?php comment_time(); ?></span>
	                    <span class="comment-reply"> <i class="fa fa-reply"></i>
		                    <?php comment_reply_link( array_merge( $args, array(
			                    'depth'     => $depth,
			                    'max_depth' => $args['max_depth']
		                    ) ) ); ?>
	                    </span>
					</div>
					<div class="comment-content">
						<?php if ( $comment->comment_approved == '0' ): ?>
							<p><?php _e( 'Your comment is awaiting moderation', 'quest' ) ?></p>
						<?php endif; ?>
						<?php comment_text(); ?>
					</div>
				</article>
			</li>
		<?php endif;
	}
endif;

if ( ! function_exists( 'quest_custom_comment_fields' ) ) :


	/**
	 * Adds the Aria Required attribute for required fields
	 */
	function quest_custom_comment_fields() {
		$commenter = wp_get_current_commenter();
		$req       = get_option( 'require_name_email' );
		$aria_req  = ( $req ? " aria-required='true'" : ' ' );
	}
endif;

add_filter( 'comment_form_default_fields', 'quest_custom_comment_fields' );


if ( ! function_exists( 'quest_commentfields_rowtag' ) ) :


	/**
	 * Adds the Proper opening markup for comment filed
	 *
	 * @param unknown $comment_id
	 */
	function quest_commentfields_rowtag( $comment_id ) {
		echo '<div class="row">';
	}
endif;

if ( ! function_exists( 'quest_commentfields_rowtag_end' ) ) :


	/**
	 * Adds the Proper closing markup for comment filed
	 *
	 * @param unknown $comment_id
	 */
	function quest_commentfields_rowtag_end( $comment_id ) {
		echo '</div>';
	}
endif;

add_action( 'comment_form_before_fields', 'quest_commentfields_rowtag', 10, 1 );
add_action( 'comment_form_after_fields', 'quest_commentfields_rowtag_end', 10, 1 );

if ( ! function_exists( 'quest_pagination' ) ) :


	/**
	 * Prints pagination HTML required by the theme
	 */
	function quest_pagination() {
		global $wp_query;
		$big   = 999999999; // need an unlikely integer
		$pages = paginate_links( array(
			'base'      => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
			'format'    => '?paged=%#%',
			'current'   => max( 1, get_query_var( 'paged' ) ),
			'total'     => $wp_query->max_num_pages,
			'type'      => 'array',
			'prev_next' => true,
			'prev_text' => '<i class="fa fa-angle-double-left"></i>',
			'next_text' => '<i class="fa fa-angle-double-right"></i>',
		) );
		if ( is_array( $pages ) ) {
			$paged = ( get_query_var( 'paged' ) == 0 ) ? 1 : get_query_var( 'paged' );
			echo '<div class="center"><ul class="pagination">';
			foreach ( $pages as $page ) {
				echo "<li>$page</li>";
			}
			echo '</ul></div>';
		}
	}
endif;

if ( ! function_exists( 'quest_breadcrumb' ) ) :


	/**
	 * Prints breadcrumb HTML required by the theme
	 */
	function quest_breadcrumb() {
		global $post;

		if ( function_exists( 'is_woocommerce' ) && is_woocommerce() ) {
			woocommerce_breadcrumb( array(
				'wrap_before' => '<ul class="breadcrumbs">',
				'wrap_after'  => '</ul>',
				'delimiter'   => '',
				'before'      => '<li>',
				'after'       => '</li>'
			) );

			return;
		}

		if ( function_exists( 'is_bbpress' ) && is_bbpress() ) {
			echo '<ul class="breadcrumbs">';
			bbp_breadcrumb( array(
				'delimiter' => '',
				'before'    => '<li>',
				'after'     => '</li>'
			) );
			echo '</ul>';

			return;
		}


		echo '<ul class="breadcrumbs">';

		if ( ! is_front_page() ) {
			echo '<li><a href="';
			echo home_url();
			echo '">' . __( 'Home', 'quest' );
			echo "</a></li>";
		}

		if ( is_category() || is_single() && ! is_singular( 'portfolio' ) ) {
			$category = get_the_category();
			if ( isset( $category[0] ) ) {
				$ID = $category[0]->cat_ID;
				echo '<li>' . get_category_parents( $ID, true, '', false ) . '</li>';
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
			echo '<li>' . "Tag: " . single_tag_title( '', false ) . '</li>';
		}
		if ( is_404() ) {
			echo '<li>' . __( "404 - Page not Found", 'quest' ) . '</li>';
		}
		if ( is_search() ) {
			echo '<li>' . __( "Search", 'quest' ) . '</li>';
		}
		if ( is_year() ) {
			echo '<li>' . get_the_time( 'Y' ) . '</li>';
		}

		echo "</ul>";
	}

endif;

if ( ! function_exists( 'quest_footer_social_icons' ) ) :


	/**
	 * Prints Footer Social Icons HTML markup
	 */
	function quest_footer_social_icons() {

		if ( ! ( quest_get_mod( 'layout_footer_social' ) ) ) {
			return;
		}

		$social_profiles = array(
			'social_facebook',
			'social_twitter',
			'social_google-plus',
			'social_linkedin',
			'social_youtube',
			'social_vimeo-square',
			'social_instagram',
			'social_flickr',
			'social_pinterest',
			'social_dribbble',
			'social_digg',
		);
		$theme_mods      = quest_get_mods();
		foreach ( $social_profiles as $profile ) :
			if ( array_key_exists( $profile, $theme_mods ) && esc_url( $theme_mods[ $profile ] ) !== '' ) :
				$title = ucwords( str_replace( 'social_', '', $profile ) );
				?>
				<li>
					<a data-toggle="tooltip" title="<?php echo $title; ?>" target="_blank"
					   data-original-title="<?php echo $title; ?>"
					   class="social-icon fa fa-<?php echo strtolower( $title ) ?>"
					   href="<?php echo esc_url( $theme_mods[ $profile ] ) ?>"></a>
				</li>
			<?php endif;
		endforeach;
	}
endif;

if ( ! function_exists( 'quest_header_social_icons' ) ) :


	/**
	 * Prints Header Social Icons HTML markup
	 */
	function quest_header_social_icons() {

		$social_profiles = array(
			'social_facebook',
			'social_twitter',
			'social_google-plus',
			'social_linkedin',
			'social_youtube',
			'social_vimeo-square',
			'social_instagram',
			'social_flickr',
			'social_pinterest',
			'social_dribbble',
			'social_digg',
		);
		$theme_mods      = quest_get_mods();
		foreach ( $social_profiles as $profile ) :
			if ( array_key_exists( $profile, $theme_mods ) && esc_url( $theme_mods[ $profile ] ) !== '' ) :
				$title = ucwords( str_replace( 'social_', '', $profile ) );
				?>
				<li>
					<a data-toggle="tooltip" title="<?php echo $title; ?>" target="_blank"
					   data-placement="bottom" data-original-title="<?php echo $title; ?>"
					   class="social-icon fa fa-<?php echo strtolower( $title ) ?>"
					   href="<?php echo esc_url( $theme_mods[ $profile ] ) ?>"></a>
				</li>
			<?php endif;
		endforeach;
	}
endif;

if ( ! function_exists( 'quest_get_view' ) ):


	/**
	 * Determine the current view.
	 *
	 * @return string    The string representing the current view.
	 */
	function quest_get_view() {

		// Post types
		$post_types   = get_post_types( array( 'public' => true, '_builtin' => false ) );
		$post_types[] = 'post';

		// Post parent
		$parent_post_type = '';
		if ( is_attachment() ) {
			$post_parent      = get_post()->post_parent;
			$parent_post_type = get_post_type( $post_parent );
		}

		$view = 'post';

		// Blog
		if ( is_home() ) {
			$view = 'blog';
		} // Archives
		else if ( is_archive() ) {
			$view = 'archive';
		} // Search results
		else if ( is_search() ) {
			$view = 'search';
		} // Posts and public custom post types
		else if ( is_singular( $post_types ) || ( is_attachment() && in_array( $parent_post_type, $post_types ) ) ) {
			$view = 'post';
		} // Pages
		else if ( is_page() || ( is_attachment() && 'page' === $parent_post_type ) ) {
			$view = 'page';
		}

		return $view;
	}
endif;

if ( ! function_exists( 'quest_get_footer_copyright' ) ):
	/**
	 * Return Quest footer copyright text.
	 *
	 * @return copyright text
	 */
	function quest_get_footer_copyright() {

		$copyright = "<a href='" . esc_url( 'http://wordpress.org/' ) . "'>" . sprintf( __( 'Proudly powered by %s', 'quest' ), 'WordPress' ) . '</a>';
		$copyright .= '<span class="sep"> | </span>';
		$copyright .= sprintf( __( 'Theme: %1$s by %2$s.', 'quest' ), 'quest', '<a href="' . wp_get_theme()->get( 'ThemeURI' ) . '" rel="designer">' . wp_get_theme()->get( 'Author' ) . '</a>' );

		return $copyright;
	}
endif;


if ( ! function_exists( 'quest_second_header_icons' ) ) :

	/**
	 * Prints markup for Secondary Header Social icons
	 *
	 */
	function quest_second_header_icons() {
		?>
		<div class="social-icon-container col-md-6">
			<ul>
				<?php quest_header_social_icons(); ?>
			</ul>
		</div>
		<!-- .social-icon-container -->
	<?php
	}
endif;

if ( ! function_exists( 'quest_second_header_callout' ) ) :

	/**
	 * Prints markup for Secondary Header Callout text
	 *
	 */
	function quest_second_header_callout() {
		?>
		<div class="callout col-md-6">
			<p>
				<?php echo esc_html( quest_get_mod( 'layout_header_callout' ) ); ?>
			</p>
		</div>
		<!-- .callout -->
	<?php
	}
endif;

if ( ! function_exists( 'quest_second_header_search' ) ) :

	/**
	 * Prints markup for Secondary Header Search
	 *
	 */
	function quest_second_header_search() {
		?>
		<div class="search-form col-md-6">
			<?php get_search_form(); ?>
		</div>
		<!-- .search-form -->
	<?php
	}
endif;


if ( ! function_exists( 'quest_second_header' ) ) :

	/**
	 * Prints markup for Secondary Header
	 *
	 */
	function quest_second_header() {
		$secondary_layout = explode( '_', quest_get_mod( 'layout_header_secondary-layout' ) );
		if ( count( $secondary_layout ) !== 2 ) {
			return;
		}
		foreach ( $secondary_layout as $item ) {
			$callback = "quest_second_header_$item";
			if ( function_exists( $callback ) ) {
				call_user_func( $callback );
			}
		}
	}
endif;


if ( ! function_exists( 'quest_featured_image_width' ) ) :

	/**
	 * Prints CSS width style for featured image
	 *
	 */
	function quest_featured_image_width( $view ) {
		global $post;

		$img_width = '';

		if ( ! quest_get_mod( 'layout_' . $view . '_ft-img-enlarge' ) && ! quest_get_mod( 'layout_' . $view . '_ft-img-hide' ) && has_post_thumbnail() ) {
			$featured_image = wp_get_attachment_metadata( get_post_thumbnail_id( $post->ID, 'blog-normal' ), true );
			$width          = $featured_image['width'] >= 1140 ? 1140 : $featured_image['width'];
			$img_width      = "style='width:{$width}px;'";
		}

		return $img_width;
	}
endif;