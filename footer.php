</div>
<!--content end -->
</div>
<!-- Wrapper end -->
<!--footer start -->
<div id="Footer">
	<div class="line"></div>
	<div class="blank15"></div>
	<ul class="footpage">
         	  <li class="nb"><a href="<?php bloginfo('siteurl');?>/">首页</a></li>
              <?php wp_list_pages('title_li=&sort_column=post_date&sort_order=ASC&depth=1&exclude=')?>
         </ul>
	<div class="clearfix"></div>
		<p><a href="<?php bloginfo('siteurl');?>/"><?php bloginfo('name'); ?></a> 版权所有 地址:山东济南历下区数码港大厦</p>
	<p>电子邮箱:shiqiba7@163.com 电话:15305414197  QQ:1057437122 微信:Dr_Lee-here </p>

</div>
<!--footer end-->
<?php wp_footer(); ?>

</body>

</html>