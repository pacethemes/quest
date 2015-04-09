<?php
/**
 * The template for displaying comments.
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package trivoo-free
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>
<div id="comments" class="clearfix">
<?php if ( have_comments() ) :?>
	<div class="post-comments-heading">
		<h3><?php comments_number( __( 'No Comments', 'trivoo-framework' ),
				__( 'One Comment', 'trivoo-framework' ),
				__( '% Comments', 'trivoo-framework' ) )
			?>
		</h3>
	</div>

	<div class="comments-container">
		<ul class="comment-list">
			<?php wp_list_comments( 'callback=trivoo_comments' ); ?>
		</ul>
	</div>

	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
		<div class="pagination post-pagination clearfix">
			<?php previous_comments_link( __( 'Older Comments', 'trivoo-framework' ) ); ?>
			<?php next_comments_link( __( 'Newer Comments', 'trivoo-framework' ) ); ?>
		</div>
	<?php endif;?>

<?php elseif ( !comments_open() && !is_page() && post_type_supports( get_post_type(), 'comments' ) ) :?>
	<p>
		<?php __( 'Comments are closed.', 'trivoo-framework' ) ?>
	</p>
<?php endif;?>

<?php if ( comments_open() ) : ?>
	<?php
	$commenter = wp_get_current_commenter();
	$req = get_option( 'require_name_email' );
	$aria_req = ( $req ? " aria-required='true'" : '' );
	$fields =  array(
		'author' => '<div class="col-md-4"><input type="text" placeholder="'.__( 'Name (required)', 'trivoo-framework' ).'" name="author" id="author" '.$aria_req.'></div>',
		'email'  => '<div class="col-md-4"><input type="text" placeholder="'.__( 'Email Address (required)', 'trivoo-framework' ).'" name="email" id="email" '.$aria_req.'></div>',
		'website' => '<div class="col-md-4"><input type="text" placeholder="'.__( 'Website (required)', 'trivoo-framework' ).'" name="url" id="url"></div>'
	);

	$comments_args = array(
		'fields' =>  $fields,
		'comment_field' => '<div class="row"><div class="col-md-12"><textarea name="comment" id="comment" placeholder="'.__( 'Your Comment...', 'trivoo-framework' ).'"></textarea></div></div>',
		'id_form' => 'post-comments-form'
	);

	comment_form( $comments_args ); ?>

<?php endif; ?>
</div>