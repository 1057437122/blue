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
                	<div class="productpic">
                    	<?php if ( (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) { ?>
                            <a href="<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array( 1500,1200 ), false, '' ); echo $image[0];?>" rel="facebox"><img class="thumbpic" src="<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array( 250,250 ), false, '' ); echo $image[0];?>" title="<?php the_title(); ?>" alt="<?php the_title(); ?>" /></a>
                        <?php } else {?>
                            <a href="<?php echo catch_post_image(); ?>" rel="facebox"><img class="thumbpic" src="<?php echo catch_post_image(); ?>" title="<?php the_title(); ?>" alt="<?php the_title(); ?>" /></a>
                        <?php } ?>
                        <a href="<?php if ( (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) { ?><?php $image = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array( 1500,1200 ), false, '' ); echo $image[0];?><?php } else {?><?php echo catch_post_image(); ?><?php } ?>" rel="facebox"><img src="<?php bloginfo("template_url"); ?>/images/facebox/zoom.gif" width="66" height="14" title="查看大图" /></a>
                    </div>
                    
                    <div class="productag">
                    	<h3>产品特性</h3>
                        <ul>
                            <?php $tags = wp_get_post_tags($post->ID);
								if ($tags){ 
									foreach ($tags as $tag ) { 
										echo "<li>" . $keywords = $tag->name . "</li>";
									}
								}else{ echo "<li>产品特色内容</li>"; }
							?>
                        </ul>
                    </div>
                    <div class="entrycontent">
						<h3 class="title">
                        	<span class="mov">产品描述</span>
                        	<span>相关产品</span>
                        </h3>
						<div class="the_content"><?php the_content(''); ?></div>
                        <div class="the_content the_related">
                        	<ul>
								<?php if (get_option('wpyou_news_id')) { $newsid = get_option('wpyou_news_id'); } ?>
                                <?php
                                    $tags = wp_get_post_tags($post->ID);
                                    if ($tags) {
                                        $tag_ids = array();
                                        foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
                                    
                                        $args=array(
                                            'tag__in' => $tag_ids,
                                            'post__not_in' => array($post->ID),
                                            'showposts' => 8, // Number of related posts that will be shown.
                                            'cat' => -$newsid,
                                            'caller_get_posts' => 1
                                        );
                                        $my_query = new wp_query($args);
                                        if( $my_query->have_posts() ) {
                                            while ($my_query->have_posts()) {
                                                $my_query->the_post();
                                            ?>
                                                <li>
                                                    <?php if ( (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) { ?>
                                                        <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" ><img src="<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array( 150,150 ), false, '' ); echo $image[0];?>" title="<?php the_title(); ?>" alt="<?php the_title(); ?>" /></a>
                                                    <?php } else {?>
                                                        <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" ><img src="<?php echo catch_post_image(); ?>" title="<?php the_title(); ?>" alt="<?php the_title(); ?>" /></a>
                                                    <?php } ?>
                                                    <h3><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
                                                </li>
                                            <?php
                                            }
                                        }
                                    } else {
                                        echo"没有相关文章";
                                    }
                                    ?>
                                </ul>
                                <?php wp_reset_query(); ?>
                        </div>
                    </div>
                </div>
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