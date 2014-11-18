<?php // Do not delete these lines
	if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');
	if (!empty($post->post_password)) { // if there's a password
		if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie
			?>
			<p class="nocomments">This post is password protected. Enter the password to view comments.</p>
			<?php
			return;
		}
	}

	/* This variable is for alternating comment background */
	$oddcomment = 'class="alt" ';
?>

<?php if ('open' == $post->comment_status) : ?>
<!-- Add Comment begin -->
<div id="respond">
	<h3 id="addcomment">发表留言</h3>
    <div class="clear"></div>
	<div id="cancel-comment-reply"><?php cancel_comment_reply_link('取消留言') ?></div>
<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
<p>你必须 <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>">登录后</a> 才能留言！</p>
<?php else : ?>

<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

<?php if ( $user_ID ) : ?>

<p>您现在是以 <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a> 的身份登录,<a href="<?php echo wp_logout_url(get_permalink()) ?>" title="退出系统"> 点击退出系统 &raquo;</a></p>
   
<?php else : ?>

    <div class="clear"></div>
        <p><input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" /> 您的昵称 <em> * </em></p>
        <p><input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" /> 您的邮箱 <em> * </em>(绝对保密)</p>
        <p><input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" /> 您的网站</p>
<?php endif; ?>
        <!--<p><small><strong>XHTML:</strong> You can use these tags: <code><?php echo allowed_tags(); ?></code></small></p>-->
        <p><textarea name="comment" id="gbcomment" tabindex="4"></textarea></p>
        <p><input name="submit" type="submit" id="submit" tabindex="5" value="提交留言" /><?php comment_id_fields(); ?></p>

<?php do_action('comment_form', $post->ID); ?>

</form>

<?php endif; // If registration required and not logged in ?>
</div>
<!-- Add Comment end -->
<?php endif; // if you delete this the sky will fall on your head ?>

<div class="clear"></div>

<!-- You can start editing here. -->
<?php if ($comments) : ?>
	<?php $comments = array_reverse($comments) ?>
	<h3 id="comments"><?php comments_number('暂无留言', '1 个留言', '% 个留言' );?></h3>
	<ol class="commentlist">
		<?php wp_list_comments('callback=custom_comment');?>
	</ol>
    <?php
		// 如果用户在后台选择要显示评论分页
		if (get_option('page_comments')) {
			// 获取评论分页的 HTML
			$comment_pages = paginate_comments_links('echo=0');
			// 如果评论分页的 HTML 不为空, 显示导航式分页
			if ($comment_pages) {
	?>
		<div class="comment_navi">
			<span class="cpt">留言分页:</span> <?php echo $comment_pages; ?>
		</div>
	<?php
			}
		}
	?>
 <?php else : // this is displayed if there are no comments so far ?>

	<?php if ('open' == $post->comment_status) : ?>
	<!-- If comments are open, but there are no comments. -->
	 <?php else : // comments are closed ?>
		<!-- If comments are closed. -->
		<p class="nocomments">留言功能关闭.</p>
	<?php endif; ?>
<?php endif; ?>

