<?php

if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php if ( have_comments() ) : ?>

      <h2 class="comments-title">
        Comments:
      </h2>

      <ol class="comment-list">
		  <?php
		  wp_list_comments( array(
			  'style'      => 'ol',
			  'short_ping' => true,
			  'avatar_size'=> 60,
			  'date'=>'Y-m-d',
		  ));
		  ?>
      </ol><!-- .comment-list -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
        <nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">

          <div class="nav-previous"><?php previous_comments_link( "previous" ); ?></div>
          <div class="nav-next"><?php next_comments_link( "next" ); ?></div>
        </nav><!-- #comment-nav-below -->
		<?php endif; // Check for comment navigation. ?>

		<?php if ( ! comments_open() ) : ?>
        <p class="no-comments">نظرات برای این صفحه بسته هستند...</p>
		<?php endif; ?>

	<?php endif; // have_comments() ?>


</div><!-- #comments -->
<div class="custom-comments">
  <div class="container">
	  <?php
	  $user = wp_get_current_user();
	  $commenter = wp_get_current_commenter();
	  $req = get_option( 'require_name_email' );
	  $aria_req = ( $req ? " aria-required='true'" : '' );
	  $args = array(
		  'id_form' => 'commentform',
		  'class_form' => 'comment-form',
		  'id_submit' => 'submit',
		  'class_submit' => 'submit',
		  'name_submit' => 'submit',
		  'title_reply' => __('<span>Leave a reply</span>'),
		  'title_reply_to' => __('Leave a reply to %s'),
		  'cancel_reply_link' => __('Cancel comment'),
		  'label_submit' => __('Post Comment'),
		  'format' => 'html5',
		  'comment_field' => '<p class="comment-form-comment"><label for="comment">Comment<span class="required">*</span></label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true" placeholder="Comment"></textarea></p>',
	  'must_log_in'          => sprintf(
		  '<p class="must-log-in">%s</p>',
		  sprintf(
		  /* translators: %s: Login URL. */
			  __( 'welcome to website You must be <a href="%s">logged in</a> to post a comment.' ),
			  /** This filter is documented in wp-includes/link-template.php */
			  wp_login_url( apply_filters( 'the_permalink', get_permalink( $post_id ), $post_id ) )
		  )
	  )
	  );
	  comment_form($args);
	  ?>
  </div>
</div>
