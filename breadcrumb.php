	<div class="breadnavi">
	<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
	<?php /* If this is a category archive */ if (is_home()) { ?>
		  当前位置: <a href="<?php echo get_settings('home'); ?>"><?php bloginfo('name');?></a> > 首页
	<?php /* If this is a tag archive */ } elseif(is_category()) { ?>
		  当前位置: <a href="<?php echo get_settings('home'); ?>">首页</a> > <?php single_cat_title(); ?>
	<?php /* If this is a search result */ } elseif (is_search()) { ?>
		  当前位置: <a href="<?php echo get_settings('home'); ?>">首页</a> > "<strong><?php echo $s; ?></strong>" 的搜索结果
	<?php /* If this is a tag archive */ } elseif(is_tag()) { ?>
		  当前位置: <a href="<?php echo get_settings('home'); ?>">首页</a> > <?php single_tag_title(); ?>
	<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
		  当前位置: <a href="<?php echo get_settings('home'); ?>">首页</a> ><?php the_time('Y, F jS'); ?>
	<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
		  当前位置: <a href="<?php echo get_settings('home'); ?>">首页</a> ><?php the_time('Y, F'); ?>
	<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
		  当前位置: <a href="<?php echo get_settings('home'); ?>">首页</a> ><?php the_time('Y'); ?>
	<?php /* If this is an author archive */ } elseif (is_author()) { ?> 作者文章列表
		  当前位置: <a href="<?php echo get_settings('home'); ?>">首页</a> >
	<?php /* If this is a single page */ } elseif (is_single()) { ?>
		  当前位置: <a href="<?php echo get_settings('home'); ?>">首页</a> > <?php the_category(', ') ?> > <?php the_title(); ?>
	<?php /* If this is a page */ } elseif (is_page()) { ?>
		  当前位置: <a href="<?php echo get_settings('home'); ?>">首页</a> > <?php the_title(); ?>
	<?php /* If this is a 404 error page */ } elseif (is_404()) { ?>
		  当前位置: <a href="<?php echo get_settings('home'); ?>">首页</a> > 404错误页面
	<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
		  当前位置: <a href="<?php echo get_settings('home'); ?>">首页</a> > 存档
	<?php } ?>
	</div>
	<?php if ( is_single() ) { ?>
    	<div class="pagelink"><?php previous_post_link('%link', '&laquo; 上一篇', TRUE); ?> <?php previous_post_link('%link', '下一篇 &raquo;', TRUE); ?></div>
    <?php } else { ?>
    	<div class="pagelink"><?php previous_posts_link('&laquo; 上一页') ?> <?php next_posts_link('下一页 &raquo;') ?></div>
	<?php } ?>
<?php wp_reset_query(); ?>