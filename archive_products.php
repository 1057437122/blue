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
    <?php wp_reset_query(); ?>
    <!-- ProductList begin -->
    <ul class="productlist">
    	<?php if ( get_option('wpyou_products_perpage') ) { ?>
			<?php $products_perpage = stripslashes(get_option('wpyou_products_perpage')); ?>
        <?php } else { ?>
            <?php $products_perpage = 16; ?>
        <?php } ?>
    	<?php $wp_query = new WP_Query('cat='.$cat.'&orderby=date&caller_get_posts=1&order=DESC&posts_per_page='.$products_perpage.'&paged='.$paged); ?>
    	<?php if (have_posts()) : ?>
			<?php while (have_posts()) : the_post(); ?>
            <li>
				<?php if ( (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) { ?>
                    <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" ><img src="<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array( 150,150 ), false, '' ); echo $image[0];?>" title="<?php the_title(); ?>" alt="<?php the_title(); ?>" /></a>
                <?php } else {?>
                    <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" ><img src="<?php echo catch_post_image(); ?>" title="<?php the_title(); ?>" alt="<?php the_title(); ?>" /></a>
                <?php } ?>
                <h3><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" ><?php the_title(); ?></a></h3>
            </li>
            <?php endwhile; ?>
        <?php else : ?>
        	<li>
                <h2>对不起，没找到你对应产品，请重新载入或搜索。</h2>
            </li>
    <?php endif; ?>
    </ul>
    <!-- ProductList end -->
    <div class="clearfix"></div>
    <!-- Navigation begin -->
    <div class="wpagenavi">
		<?php if(function_exists('wpyou_pagenavi')) { wpyou_pagenavi(9); } ?>
    </div>
    <!-- Navigation end -->
</div>
<!-- Content end -->
<?php get_footer(); ?>
