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
<?php if(is_home()){ ?>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/slides.jquery.js"></script>
<script>
// Slides
$(document).ready(function(){
	$(".slides").slides({
		play:7000,
		pause:500,
		slideSpeed:1200,
		hoverPause:true,
		animationStart:function(current){
			$(".caption").animate({
				bottom:-90
			},200);
			if(window.console&&console.log){
				console.log("animationStart on slide:",current);
			};
		},animationComplete:function(current){
			$(".caption").animate({
				bottom:0
			},500);
			if(window.console&&console.log){
				console.log("animationComplete on slide:",current);
			};
		},slidesLoaded:function(){
			$(".caption").animate({
				bottom:0
			},200);
		}
	});
});
</script>
<?php }?>
</body>

</html>