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
		<!-- NewsList begin -->
        <ul class="newslist">
        	<?php if ( get_option('wpyou_news_perpage') ) { ?>
				<?php $news_perpage = stripslashes(get_option('wpyou_news_perpage')); ?>
            <?php } else { ?>
                <?php $news_perpage = 20; ?>
            <?php } ?>
    		<?php query_posts("s=$s&caller_get_posts=1&showposts=$news_perpage&paged=$paged"); ?>
        	<?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                <li>
                    <h2>[<?php the_category(' &gt; ', 'single'); ?>] <a href="<?php the_permalink() ?>"title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
                    <span><?php the_time('Y-m-d'); ?></span> 
                </li>
                <?php endwhile; ?>
            <?php else : ?>
                <li>
                    <h2>对不起，没找到你要的文章，请重新载入或搜索。</h2>
                </li>
        <?php endif; ?>
        </ul>
        <!-- NewsList end -->
 		<div class="clearfix"></div>
        <!-- Navigation begin -->
        <div class="wpagenavi">
            <?php if(function_exists('wpyou_pagenavi')) { wpyou_pagenavi(9); } ?>
        </div>
        <!-- Navigation end -->
    </div>
    <!-- Content end -->
<?php get_footer(); ?>
