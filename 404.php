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
            <!-- Error begin -->
            <div class="single">
            	<div class="entry">
                	<h4>没有找到您要访问的页面</h4>
                	<div>抱歉, 没有找到对应的文章, 请您 <a href="<?php bloginfo('siteurl');?>/" class="underline"><strong>返回首页</strong></a> 或在搜索中查找所需的信息.</div>
                </div>
            </div>
            <!-- Error end -->
        </div>
        <!-- Page end -->
    </div>
    <!-- Content end -->
<?php get_footer(); ?>