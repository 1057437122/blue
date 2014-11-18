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
                <h2>合作伙伴</h2>
                <div class="meta"> </div>
                <div class="partner">
                    <ul>
					<?php $wp_query = new WP_Query('cat='.$cat.'&orderby=date&caller_get_posts=1&order=DESC&posts_per_page=100&paged='.$paged); ?>
        			<?php if (have_posts()) : ?>
					<?php while (have_posts()) : the_post(); ?>
                    	<li><a href="javascript:void(0)"><img src="<?php echo catch_post_image(); ?>" title="<?php the_title(); ?>" alt="<?php the_title(); ?>" /><span><?php the_title(); ?></span></a></li>
					<?php endwhile; ?>
					<?php else : ?>
					<li>
						<h2>对不起，目前还没有合作伙伴，请重新载入或搜索。</h2>
					</li>
					<?php endif; ?>
                    </ul>
                </div>

        </div>
        <!-- Page end -->
    </div>
    <!-- Content end -->
<?php get_footer(); ?>