<?php

namespace Bblank\Comments;
/**
 * 
 * Comment API: Walker_Comment class
 *
 * @package WordPress
 * @subpackage Comments
 * @since 4.4.0
 */

/**
 * Core walker class used to create an HTML list of comments.
 *
 * @since 2.7.0
 *
 * @see Walker
 */
class WP_Walker_Comment extends \Walker_Comment {
    
    /**
	 * Outputs a single comment.
	 *
	 * @since 3.6.0
	 *
	 * @see wp_list_comments()
	 *
	 * @param WP_Comment $comment Comment to display.
	 * @param int        $depth   Depth of the current comment.
	 * @param array      $args    An array of arguments.
	 */
	protected function comment( $comment, $depth, $args ) {
		if ( 'div' == $args['style'] ) {
			$tag = 'div';
			$add_below = 'comment';
		} else {
			$tag = 'li';
			$add_below = 'div-comment';
		}
?>
		<<?php echo $tag; ?> <?php comment_class( $this->has_children ? 'parent' : '', $comment ); ?> id="comment-<?php comment_ID(); ?>">
		<?php if ( 'div' != $args['style'] ) : ?>
		<div id="div-comment-<?php comment_ID(); ?>" class="comment-body">
		<?php endif; ?>
		<div class="comment-author vcard">
			<?php if ( 0 != $args['avatar_size'] ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
			<?php
				/* translators: %s: comment author link */
				printf( __( '%s <span class="says">says:</span>' ),
					sprintf( '<cite class="fn">%s</cite>', get_comment_author_link( $comment ) )
				);
			?>
		</div>
		<?php if ( '0' == $comment->comment_approved ) : ?>
		<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.' ) ?></em>
		<br />
		<?php endif; ?>

		<div class="comment-meta commentmetadata"><a href="<?php echo esc_url( get_comment_link( $comment, $args ) ); ?>">
			<?php
				/* translators: 1: comment date, 2: comment time */
				printf( __( '%1$s at %2$s' ), get_comment_date( '', $comment ),  get_comment_time() ); ?></a><?php edit_comment_link( __( '(Edit)' ), '&nbsp;&nbsp;', '' );
			?>
		</div>

		<?php comment_text( $comment, array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>

		<?php
		comment_reply_link( array_merge( $args, array(
			'add_below' => $add_below,
			'depth'     => $depth,
			'max_depth' => $args['max_depth'],
			'before'    => '<div class="reply">',
			'after'     => '</div>'
		) ) );
		?>

		<?php if ( 'div' != $args['style'] ) : ?>
		</div>
		<?php endif; ?>
<?php
	}

	/**
	 * Outputs a comment in the HTML5 format.
	 *
	 * @since 3.6.0
	 *
	 * @see wp_list_comments()
	 *
	 * @param WP_Comment $comment Comment to display.
	 * @param int        $depth   Depth of the current comment.
	 * @param array      $args    An array of arguments.
	 */
	protected function html5_comment( $comment, $depth, $args ) {
		$tag = ( 'div' === $args['style'] ) ? 'div' : 'li';
?>
		<<?php echo $tag; ?> id="comment-<?php comment_ID(); ?>" <?php comment_class( $this->has_children ? 'parent' : '', $comment ); ?>>
			<article id="div-comment-<?php comment_ID(); ?>" class="comment-block clear">
			    <div class="comment-img">
			        <?php if ( 0 != $args['avatar_size'] ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
			    </div>
			    <div class="comment-body">
			        <h6 class="comment-title">
			            <?php
							/* translators: %s: comment author link */
							printf( '<span class="fn">%s</span>', get_comment_author_link( $comment ) );
						?>
			        </h6>
			        <span class="comment-date">
			            <time datetime="<?php comment_time( 'c' ); ?>">
								<?php
									/* translators: 1: comment date, 2: comment time */
									printf( __( '%1$s at %2$s' ), get_comment_date( '', $comment ), get_comment_time() );
								?>
							</time> 
						</span>
			        <div class="comment-content clear">
    					<?php comment_text(); ?>
    				</div><!-- .comment-content -->
    				<footer class="comment-meta">

    					<div class="comment-metadata">
    						<a href="<?php echo esc_url( get_comment_link( $comment, $args ) ); ?>"></a>
    						<?php edit_comment_link( __( 'Edit' ), '<span class="edit-link">', '</span>' ); ?>
    					</div><!-- .comment-metadata -->
    					<?php if ( '0' == $comment->comment_approved ) : ?>
    					<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.' ); ?></p>
    					<?php endif; ?>
    				</footer><!-- .comment-meta -->
    				<?php
    				comment_reply_link( array_merge( $args, array(
    					'add_below' => 'div-comment',
    					'depth'     => $depth,
    					'max_depth' => $args['max_depth'],
    					'before'    => '<div class="reply">',
    					'after'     => '</div>'
    				) ) );
    				?>
			    </div>
				
			</article><!-- .comment-body -->
<?php
	}
    
}