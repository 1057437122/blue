<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" /> <!-- leave this for stats -->

<title><?php if ( is_home() ) { ?><?php bloginfo('description'); ?> - <?php bloginfo('name'); ?><?php } ?>
<?php if ( is_category() ) { ?><?php single_cat_title(); ?> - <?php bloginfo('name'); ?><?php } ?>
<?php if ( is_search() ) { ?>“<?php echo $s; ?>”的搜索结果 - <?php bloginfo('name'); ?><?php } ?>
<?php if ( is_tag() ) { ?><?php single_tag_title(''); ?> - <?php bloginfo('name'); ?><?php } ?>
<?php if ( is_single() ) { ?><?php wp_title(''); ?> - <?php bloginfo('name'); ?><?php } ?>
<?php if ( is_page() ) { ?><?php wp_title(''); ?> - <?php bloginfo('name'); ?><?php } ?>
<?php if ( is_month() ) { ?>存档 - <?php the_time('F, Y'); ?> - <?php bloginfo('name'); ?><?php } ?>
<?php if ( is_day() ) { ?>存档 - <?php the_time('F j, Y'); ?> - <?php bloginfo('name'); ?><?php } ?>
<?php if ( is_author() ) { ?>作者存档 - <?php bloginfo('name'); ?><?php } ?>
<?php if ( is_404() ) { ?>404页面 - <?php bloginfo('name'); ?><?php } ?>
</title><?php if (is_home()){ 
	if (get_option('wpyou_description')) { $description = get_option('wpyou_description'); }
	if (get_option('wpyou_keywords')) { $keywords = get_option('wpyou_keywords'); }
	} elseif (is_single() || is_page()){ 
		if ($post->post_excerpt) { 
			$description = $post->post_excerpt; 
		} else { 
			$description = substr(strip_tags($post->post_content),0,200); 
		}
		$keywords = ""; 
		$tags = wp_get_post_tags($post->ID); 
		foreach ($tags as $tag ) { 
			$keywords = $keywords . $tag->name . ", "; 
		}
	} elseif (is_category()) {
		$description = htmlentities(strip_tags(trim(category_description())),ENT_QUOTES,'UTF-8');
} 
?> 
<meta name="keywords" content="<?php echo $keywords; ?>" /> 
<meta name="description" content="<?php echo $description; ?>" />
<link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/images/favicon.ico" type="image/x-icon" />
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<script type="text/javascript" src="<?php bloginfo('template_directory');?>/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory');?>/js/wpyou.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory');?>/js/facebox.js"></script>
<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
<?php wp_head(); ?>
</head>
<body>
<!-- Wrapper begin -->
<div class="wrapper">
<!--header start -->
<div id="Header">
	<h1>
    	 <a href="<?php bloginfo('siteurl');?>/" title="<?php bloginfo('description'); ?>"><img title="<?php bloginfo('name'); ?>"  src="<?php bloginfo('template_directory');?>/images/logo_blue.png" alt="<?php bloginfo('name'); ?>"/></a>
    </h1>
	<div id="H_link">
		<a href="#" onClick="this.style.behavior='url(#default#homepage)';this.setHomePage('<?php bloginfo('siteurl');?>/');" title="设为首页">设为首页</a>
		|
		<a  href="#" onclick="javascript:window.external.AddFavorite('<?php bloginfo('siteurl');?>/','<?php bloginfo('name'); ?>');" title="加入收藏">加入收藏</a>
	</div>
	<div class="headr">
    	<div class="blank25"></div>
		<div class="clearfix"> </div>
		<?php include (TEMPLATEPATH . '/searchform.php'); ?>
	</div>
</div>
<div class="mainmenu">
	<?php if ( get_option('wpyou_if_custom_menus') == '1' && function_exists('wp_nav_menu')) { ?>
				<?php wp_nav_menu( array('theme_location' =>'primary','container' => '','depth' => 2,'menu_class'  => 'navi' )); ?>
			<?php } else { ?>

    <ul class="navi">
        <li class="nl <?php if ( is_home()){ echo 'current-cat'; } ?>"><a href="<?php echo get_option('home'); ?>/">首页</a></li>
        
         <?php wp_list_categories('title_li=0&orderby=name&hide_empty=0&show_count=0&depth=2&exclude='); ?>
                	<?php wp_list_pages('title_li=&sort_column=post_date&sort_order=ASC&depth=2&exclude=')?>

    </ul>
     <?php } ?>
</div>
<div class="blank8"></div>
<?php if(is_home()){ 
$sliderspost=get_posts('meta_key=slider&numberposts=10');
if($sliderspost):?>
<div class="slider_frame">
	<div class="slides">
		<div class="slides_container">
		<?php foreach($sliderspost as $post):?>
		<?php if(has_post_thumbnail()):?>
				<div class="slide"><!-- repeat-->
				<a href="<?php the_permalink();?>" rel="bookmark" target="_blank"><?php the_post_thumbnail();?></a><!--main pictures-->
					<div class="caption">
						<div class="cap">
							<h2><span></span><a href="<?php the_permalink();?>" target="_blank"><?php echo cut_str($post->post_title,48); ?></a></h2>
							<p><?php echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 150,"..."); ?></p>
						</div><!--cap-->
					</div><!--caption-->
				</div><!--slide-->
		<?php endif;?>
		<?php endforeach;?>
		</div><!-- slides_container-->
		
	</div><!--slides-->
</div><!--slider_frame-->
<?php endif; ?>
<?php }else{ ?>
<div id="banner">
</div>
<?php } ?>
<!--header end -->
<!--content start -->
<div id="Container">