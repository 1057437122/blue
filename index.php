<?php get_header(); ?>
	<div id="main_left">
        <!-- Introduction begin -->
        <div id="aboutus">
            <h2 class="Container_title"><a href="<?php bloginfo('siteurl');?>/about-us">企业简介</a></h2>
            <div class="aboutus_cont">
                    <?php if ( get_option('wpyou_aboutus') ) { ?>
			<?php echo stripslashes(get_option('wpyou_aboutus')); ?>
                    <?php } else { ?>
            		请在后台的【 外观 - 当前主题设置 】中添加 企业简介 的内容
                          <?php } ?>
            </div>
            <div class="more"><a href="<?php if ( get_option('wpyou_aboutus_url') ) { ?><?php echo stripslashes(get_option('wpyou_aboutus_url')); ?><?php } else { ?><?php bloginfo('siteurl');?>/about-us/<?php } ?>">更多...</a></div>
        </div>
        <!-- Introduction end -->
        <!-- solution start-->
		<?php $lft_cats=get_option('leez_left_index'); $ids=explode(',',$lft_cats);foreach($ids as $cat_id):?>
		<div id="solution">
			<h2 class="Container_title"><a href="<?php echo get_category_link($cat_id);?>" title="<?php echo get_cat_name( $cat_id ); ?>" ><?php echo get_cat_name( $cat_id ); ?></a></h2>
			<?php query_posts('caller_get_posts=1&showposts=8&cat='.$cat_id); ?>
			<ul class="solutionList">
				<?php if(have_posts()): while(have_posts()): the_post(); ?>
					<li><a title="<?php the_title() ?>" href="<?php the_permalink() ?>" target="_blank"><?php the_title() ?></a><span>[<?php the_time('Y-m-d') ?>]</span></li>
				<?php endwhile; endif; ?>
			</ul>
			<div class="more"><a href="<?php echo get_category_link( $cat_id );?>"><?php _e('更多...'); ?></a></div>
		</div>
		<?php endforeach; ?>
		<?php wp_reset_query();?>
        <!-- solution end-->
    </div>
    <div id="main_right">
    	<div id="Product" >
                <?php if (get_option('wpyou_products_id')) { $productid = get_option('wpyou_products_id'); ?><h2 class="Container_title"><a href="<?php echo get_category_link($productid);?>" title="<?php echo get_cat_name( $productid ); ?>"><?php echo get_cat_name( $productid ); ?></a></h2>
                <?php query_posts('caller_get_posts=1&showposts=6&cat='.$productid); ?>
				<?php } else { ?>        	
        		<h2 class="Container_title"><a href="<?php bloginfo('siteurl');?>/category/products">主营业务</a></h2>
                <?php query_posts('caller_get_posts=1&showposts=6&cat=products'); ?>
				<?php } ?>        
                <ul>
                 	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <li><a href="<?php the_permalink() ?>" target="_blank" title="<?php the_title(); ?>"><img src="<?php echo catch_post_image(); ?>" title="<?php the_title(); ?>" alt="<?php the_title(); ?>" /></a><span></span></li>
                <?php endwhile ?>
                </ul>
                <?php endif ?>
                <?php if (get_option('wpyou_products_id')) { $productsid = get_option('wpyou_products_id'); ?>   
				<div class="more"><a href="<?php echo get_category_link( $productsid );?>">更多...</a></div>
                <?php } else { ?>
                <div class="more"><a href="<?php bloginfo('siteurl');?>/category/products">更多...</a></div>
                <?php } ?>
        </div>
        <!-- news start-->
        <?php $rht_cats=get_option('leez_right_index'); $ids=explode(',',$rht_cats);foreach($ids as $cat_id):?>
		<div id="solution">
			<h2 class="Container_title"><a href="<?php echo get_category_link($cat_id);?>" title="<?php echo get_cat_name( $cat_id ); ?>" ><?php echo get_cat_name( $cat_id ); ?></a></h2>
			<?php query_posts('caller_get_posts=1&showposts=8&cat='.$cat_id); ?>
			<ul class="solutionList">
				<?php if(have_posts()): while(have_posts()): the_post(); ?>
					<li><a title="<?php the_title() ?>" href="<?php the_permalink() ?>" target="_blank"><?php the_title() ?></a><span>[<?php the_time('Y-m-d') ?>]</span></li>
				<?php endwhile; endif; ?>
			</ul>
			<div class="more"><a href="<?php echo get_category_link( $cat_id );?>"><?php _e('更多...'); ?></a></div>
		</div>
		<?php endforeach; ?>
		<?php wp_reset_query();?>
        <!-- news end-->
    </div>
<?php get_footer(); ?>