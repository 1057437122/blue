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
                <div class="meta">
                    <span>发布时间: <?php the_time('Y-m-d H:i'); ?></span>
                    <span>作者: <?php the_author_posts_link(); ?></span>
                    <span>浏览次数: <?php if(function_exists('the_views')) { the_views(); } ?></span>
                    <span>字号: <a href="javascript:void(0)" class="mfbig">大</a> <a href="javascript:void(0)" class="mfmid">中</a> <a href="javascript:void(0)" class="mfsml mfcurrent">小</a> </span> 
                    <?php edit_post_link('编辑本文', '', ''); ?>
            	</div>
                <div class="entry">
                    <div class="entrycontent"><?php the_content(''); ?></div>
                </div>
                <!-- PostFunction begin -->
            <div class="postmeta">
                <?php the_tags('<strong>关键字:</strong> ', ', ', ''); ?><br />
                <strong>本文链接:</strong> <a href="<?php the_permalink() ?>" class="underline"><?php the_title(); ?></a><br />
                <strong>版权所有:</strong> <a href="<?php echo get_settings('home'); ?>" class="underline"><?php bloginfo('name'); ?></a>
            </div>
            <!-- PostFunction end -->
            <!-- Related begin -->
            <div class="related">
            	<h3><?php _e('相关文章'); ?></h3>
                <ul>
                <?php
                    $categories = get_the_category($post->ID);
                    if ($categories) {
                        $category_ids = array();
                        foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;
                        $args=array(
                            'category__in' => $category_ids,
                            'post__not_in' => array($post->ID),
                            'showposts'=>10, // Number of related posts that will be shown.
                            'caller_get_posts'=>1
                        );
                    $my_query = new wp_query($args);
                        if( $my_query->have_posts() ) {
                            while ($my_query->have_posts()) {
                                $my_query->the_post();
                            ?>
                                <li><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></li>
                            <?php
                            }
                        }
                    } else {
                        echo"<li>暂时没有和本文相关的文章</li>";
                    }
                ?>
                </ul>
             </div>
            <!-- Related end -->
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