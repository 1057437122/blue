<?php
/*
Template Name: 留言板 - 模板
*/
?>
<?php get_header(); ?>
	<!-- Sidebar begin -->
		<?php include (TEMPLATEPATH . '/sidebar.php'); ?>
    <!-- Sidebar end -->
 	<!-- Content begin -->
	<div class="content <?php if (get_option('wpyou_sidebar_position') == '1') { echo 'contentl'; } ?>">
    	<!-- Breadcrumb begin -->
        <div class="breadcrumb">
            <?php include (TEMPLATEPATH . '/breadcrumb.php'); ?>
        </div>
        <!-- Breadcrumb end -->
		<!-- Page begin -->
        <div class="single page">
        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                <h2><?php the_title(); ?></h2>
                <div class="meta"> </div>
                <div class="entry">
                    <div class="entrycontent"><?php the_content(''); ?></div>
                </div>
                <!-- Post Comment begin -->
                <div class="post_comment">
                    <?php comments_template('/gbcomments.php'); ?>
                </div>
                <!-- Post Comment end -->
            <?php endwhile; ?>
        <?php else : ?>
            <!-- Error begin -->
            <div class="single">
                <h4>没有找到您要访问的页面</h4>
                <div>抱歉, 没有找到对应的文章, 请您 <a href="<?php bloginfo('siteurl');?>/" class="underline"><strong>返回首页</strong></a> 或在搜索中查找所需的信息.</div>
            </div>
            <!-- Error end -->
        <?php endif; ?>
        </div>
        <!-- Page end -->
    </div>
    <!-- Content end -->
<?php get_footer(); ?>