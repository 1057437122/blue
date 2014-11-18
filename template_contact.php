<?php
/*
Template Name: 联系我们 - 模板
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
        <div class="single">
                <h2>联系我们</h2>
				<div class="meta"> </div>
                <div class="company"><img src="http://localhost:8080/wordpress/wp-content/uploads/2010/08/company.jpg"/> </div>
                <div class="detail">
                    <ul>
						<li>公司名称：南京数码科技有限公司</li>
						<li>公司地址：南京市新街口洪武大厦</li>
						<li>邮政编码：008008</li>
						<li>公司电话：025-00800800    传真：025-00800800</li>
						<li>公司邮箱：company@163.com</li>
					</ul>
                </div>
        </div>
        <!-- Page end -->
    </div>
    <!-- Content end -->
<?php get_footer(); ?>