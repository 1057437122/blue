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
                <h2><?php the_title(); ?></h2>
                <div class="meta"> </div>
            <div class="aboutus_cont_page">
            	<?php the_content(''); ?>
            </div>

        </div>
        <!-- Page end -->
    </div>
    <!-- Content end -->
<?php get_footer(); ?>