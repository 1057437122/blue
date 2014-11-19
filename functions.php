<?php
//Widget
if ( function_exists('register_sidebars') )
{
	register_sidebar(array(
		'name' => '侧边栏',
		'before_title' => '<h3>',
		'after_title' => '</h3>'
	));
}
//First Post Image
function catch_post_image() {
	global $post, $posts;
	if(has_post_thumbnail()){$url = wp_get_attachment_url(get_post_thumbnail_id($post->ID));}
	else{
		
		// $post_thumbnail=get_the_post_thumbnail($post->ID,'thumbnail');
		// if($post_thumbnail) return $post_thumbnail;
		$first_img = '';
		ob_start();
		ob_end_clean();
		$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
		$first_img = $matches [1] [0];
		if(empty($first_img)){ //Defines a default image
			$first_img = get_bloginfo("template_url")."/images/no-thumbnail.jpg";
		}
		//$ret='<img src="'.get_bloginfo("template_url").$first_img.'" title="'.$post->post_title.'" alt="'.$post->post_title.' />';
		$url=$first_img;
	}
	return $url;
}
function catch_post_image1() {
	if(has_post_thumbnail()){the_post_thumbnail();return 0;}
	else{
		global $post, $posts;
		// $post_thumbnail=get_the_post_thumbnail($post->ID,'thumbnail');
		// if($post_thumbnail) return $post_thumbnail;
		$first_img = '';
		ob_start();
		ob_end_clean();
		$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
		$first_img = $matches [1] [0];
		if(empty($first_img)){ //Defines a default image
			$first_img = "/images/no-thumbnail.jpg";
		}
		$ret='<img src="'.get_bloginfo("template_url").$first_img.'" title="'.$post->post_title.'" alt="'.$post->post_title.' />';
		echo $ret;
		return 1;
	}
}
//Slider Image
function catch_slider_image() {
	global $post, $posts;
	$first_img = '';
	ob_start();
	ob_end_clean();
	$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
	$first_img = $matches [1] [0];
	if(empty($first_img)){ //Defines a default image
  		$site_url = bloginfo('template_url');
    	$first_img = "$site_url/images/no-slider.jpg";
	}
	return $first_img;
}
//Thumbnail
if ( function_exists( 'add_theme_support' ) )
	add_theme_support( 'post-thumbnails' );
// CustomBackground
if ( function_exists('add_custom_background')) { add_custom_background(); }
// CustomMenus
if ( function_exists('register_nav_menus')) { register_nav_menus(); }
register_nav_menus(array('primary' => '<b style="font-style:normal; color:#F00;">自定义顶部菜单</b>'));
// GetSubcategories
function get_category_root_id($cat)
{
	$this_category = get_category($cat);
	while($this_category->category_parent)
	{
		$this_category = get_category($this_category->category_parent);
	}
	return $this_category->term_id;
}
// Subcategories
function post_is_in_descendant_category( $cats, $_post = null )
{
	foreach ( (array) $cats as $cat ) {
		// get_term_children() accepts integer ID only
		$descendants = get_term_children( (int) $cat, 'category');
		if ( $descendants && in_category( $descendants, $_post ) )
			return true;
	}
	return false;
}//PostExcerpt
function wpyou_strimwidth($str ,$start , $width ,$trimmarker ){
	$output = preg_replace('/^(?:[\x00-\x7F]|[\xC0-\xFF][\x80-\xBF]+){0,'.$start.'}((?:[\x00-\x7F]|[\xC0-\xFF][\x80-\xBF]+){0,'.$width.'}).*/s','\1',$str);
	return $output.$trimmarker;
}
//Pagenavi
function wpyou_pagenavi($range = 9){
	global $paged, $wp_query;
	if ( !$max_page ) {$max_page = $wp_query->max_num_pages;}
	if($max_page > 1){if(!$paged){$paged = 1;}
	if($paged != 1){echo "<a href='" . get_pagenum_link(1) . "' class='extend' title='第一页'>第一页</a>";}
	previous_posts_link('上一页');
    if($max_page > $range){
		if($paged < $range){for($i = 1; $i <= ($range + 1); $i++){echo "<a href='" . get_pagenum_link($i) ."'";
		if($i==$paged)echo " class='current'";echo ">$i</a>";}}
    elseif($paged >= ($max_page - ceil(($range/2)))){
		for($i = $max_page - $range; $i <= $max_page; $i++){echo "<a href='" . get_pagenum_link($i) ."'";
		if($i==$paged)echo " class='current'";echo ">$i</a>";}}
	elseif($paged >= $range && $paged < ($max_page - ceil(($range/2)))){
		for($i = ($paged - ceil($range/2)); $i <= ($paged + ceil(($range/2))); $i++){echo "<a href='" . get_pagenum_link($i) ."'";if($i==$paged) echo " class='current'";echo ">$i</a>";}}}
    else{for($i = 1; $i <= $max_page; $i++){echo "<a href='" . get_pagenum_link($i) ."'";
    if($i==$paged)echo " class='current'";echo ">$i</a>";}}
	next_posts_link('下一页');
    if($paged != $max_page){echo "<a href='" . get_pagenum_link($max_page) . "' class='extend' title='最后一页'>最后一页</a>";}
    }
}
// Custom Comment
function custom_comment($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
   <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
     <div id="comment-<?php comment_ID(); ?>">
         <div class="comment-author vcard">
                <?php /*?><?php echo get_avatar($comment,$size='28',$default='<path_to_url>' ); ?><?php */?>
                <div class="author_info">
					<?php printf(__('<cite class="fn">%s</cite>'), get_comment_author_link()) ?> <?php edit_comment_link(__('(Edit)'),'  ','') ?><br />
                    <em><?php printf(__('%1$s at %2$s'), get_comment_date('Y/m/d '),  get_comment_time(' H:i:s')) ?></em>
                </div>
                <div class="reply">
			   		<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
              	</div>
          </div>
		  <?php if ($comment->comment_approved == '0') : ?>
             <em><?php _e('Your comment is awaiting moderation.') ?></em>
             <br />
          <?php endif; ?>
      		<?php comment_text() ?>
     </div>
<?php } ?>
<?php
$themename = "当前主题";
function wpyou_add_option() {
	global $themename;
	//create new top-level menu under Presentation
	add_menu_page($themename.'设置', ''.$themename.'设置',  10, 'theme-setup', 'wpyou_options', get_bloginfo('template_url').'/images/admin-options/icon_wpyou.png','3' );
	add_submenu_page('theme-setup', '主题设置', '主题设置', 10, 'theme-setup', 'wpyou_options');
	//call register settings function
	add_action( 'admin_init', 'register_mysettings' );
}
function register_mysettings() {
	//register our settings
	register_setting( 'wpyou-settings', 'wpyou_if_custom_menus');
	register_setting( 'wpyou-settings', 'wpyou_sliderposts');
	register_setting( 'wpyou-settings', 'wpyou_news_id');
	register_setting( 'wpyou-settings', 'wpyou_solution_id');
	register_setting( 'wpyou-settings', 'wpyou_products_id');
	register_setting( 'wpyou-settings', 'wpyou_partner_id');
	register_setting( 'wpyou-settings', 'wpyou_sidebar_position');
	register_setting( 'wpyou-settings', 'wpyou_description');
	register_setting( 'wpyou-settings', 'wpyou_keywords');
	register_setting( 'wpyou-settings', 'wpyou_new_products');
	register_setting( 'wpyou-settings', 'wpyou_hot_products');
	register_setting( 'wpyou-settings', 'wpyou_aboutus');
	register_setting( 'wpyou-settings', 'wpyou_aboutus_url');
	register_setting( 'wpyou-settings', 'wpyou_footer');
}
function wpyou_options() {
	global $themename;
?>
<!-- Options Form begin -->
<div class="wrap">
	<div id="icon-options-general" class="icon32"><br/></div>
	<h2><?php echo $themename; ?>设置</h2>
    <ul class="subsubsub wpyounavi">
    	<li><a href="#wpyou_tm">基本设置</a> |</li>
        <li><a href="#wpyou_hp">首页设置</a> |</li>
        <li><a href="#wpyou_ft">底部设置</a></li>
    </ul>
	<form method="post" action="options.php">
		<?php settings_fields('wpyou-settings'); ?>
		<table class="form-table wpyou">
            <tr valign="top">
            	<td><h3 id="wpyou_tm">基本设置</h3></td>
        	</tr>
            <tr valign="top">
                <th scope="row"><label>是否开启自定义菜单<span class="description"></span></label></th>
                <td>
                    <input type="checkbox" name="wpyou_if_custom_menus" value="1" <?php if (get_option('wpyou_if_custom_menus') == '1') { echo 'checked="checked"'; } ?> /><label class="description"> 选中为开启 (默认为不开启, 显示分类列表)</label>
                    <br />
                    <span class="description">设置是否开启自定义菜单功能(WordPress 3.0以上版本支持) <br />▪ 启用后，您需要在<a href='nav-menus.php'>【外观 - 菜单(导航菜单)】里设置菜单内容</a>)<br />▪ <a href='http://www.wpyou.com/wordpress-3-0-use-navigation-menu-operation.html' target='_blank'>如何使用自定义菜单</a></span>
                </td>
            </tr>
            <tr valign="top">
                <th scope="row"><label>新闻分类ID<span class="description">(数值)</span></label></th>
                <td>
                    <input class="regular-text" style="width:35em;" type="text" name="wpyou_news_id" value="<?php echo get_option('wpyou_news_id'); ?>" />
                    <br />
                    <span class="description">设置新闻分类ID (多个ID间用英文逗号","隔开, 例如: 1,2,3)<br />▪ 如没有新闻分类, 则无需设置<br />▪ <a title="如何查看分类ID" href="http://www.wpyou.com/how-to-find-the-category-id.html" target="_blank">如何获取分类ID</a></span>
                </td>
        	</tr>
            <tr valign="top">
                <th scope="row"><label>解决方案分类ID<span class="description">(数值)</span></label></th>
                <td>
                    <input class="regular-text" style="width:35em;" type="text" name="wpyou_solution_id" value="<?php echo get_option('wpyou_solution_id'); ?>" />
                    <br />
                    <span class="description">设置解决方案分类ID (多个ID间用英文逗号","隔开, 例如: 1,2,3)<br />▪ 如没有解决方案分类, 则无需设置<br />▪ <a title="如何查看分类ID" href="http://www.wpyou.com/how-to-find-the-category-id.html" target="_blank">如何获取分类ID</a></span>
                </td>
        	</tr>
            <tr valign="top">
                <th scope="row"><label>产品中心分类ID<span class="description">(数值)</span></label></th>
                <td>
                    <input class="regular-text" style="width:35em;" type="text" name="wpyou_products_id" value="<?php echo get_option('wpyou_products_id'); ?>" />
                    <br />
                    <span class="description">设置产品中心分类ID (多个ID间用英文逗号","隔开, 例如: 1,2,3)<br />▪ 如没有产品中心分类, 则无需设置<br />▪ <a title="如何查看分类ID" href="http://www.wpyou.com/how-to-find-the-category-id.html" target="_blank">如何获取分类ID</a></span>
                </td>
        	</tr>
            <tr valign="top">
                <th scope="row"><label>合作伙伴分类ID<span class="description">(数值)</span></label></th>
                <td>
                    <input class="regular-text" style="width:35em;" type="text" name="wpyou_partner_id" value="<?php echo get_option('wpyou_partner_id'); ?>" />
                    <br />
                    <span class="description">合作伙伴分类ID (多个ID间用英文逗号","隔开, 例如: 1,2,3)<br />▪ 如没有合作伙伴分类, 则无需设置<br />▪ <a title="如何查看分类ID" href="http://www.wpyou.com/how-to-find-the-category-id.html" target="_blank">如何获取分类ID</a></span>
                </td>
        	</tr>
            <tr valign="top" class="alt">
                <th scope="row"><label><strong>内页边栏位置</strong><span class="description"></span></label></th>
                <td>
                    <select name="wpyou_sidebar_position">
                    	<option value="0" <?php if (get_option('wpyou_sidebar_position') == '0') { echo 'selected="selected"'; } ?>>左侧显示</option>
                        <option value="1" <?php if (get_option('wpyou_sidebar_position') == '1') { echo 'selected="selected"'; } ?>>右侧显示</option>
                    </select>
                    <br />
                    <span class="description">设置 内页(除首页以外所有)边栏的显示位置 (默认为左侧显示)</span>
                </td>
            </tr>
            <tr valign="top">
                <th scope="row"><label>网站描述<span class="description">(文本)</span></label></th>
                <td>
                    <textarea style="width:35em; height:5em;" name="wpyou_description"><?php echo get_option('wpyou_description'); ?></textarea>
                    <br />
                    <span class="description">设置网站的描述信息 (显示在首页源代码中, 有利于搜索优化)<br />▪ <strong>如使用了其他SEO插件, 则该设置失效</strong></span>
                </td>
        	</tr>
            <tr valign="top">
                <th scope="row"><label>网站关键字<span class="description">(文本)</span></label></th>
                <td>
                    <textarea style="width:35em; height:5em;" name="wpyou_keywords"><?php echo get_option('wpyou_keywords'); ?></textarea>
                    <br />
                    <span class="description"> 设置网站优化关键字(多个关键词请用<strong>英文"'"逗号</strong>隔开. 显示在首页源代码中, 有利于搜索优化)<br />▪ <strong>如使用了其他SEO插件, 则该设置失效</strong></span>
                </td>
        	</tr>
            <tr valign="top">
                <th scope="row"><label><span class="description"></span></label></th>
                <td>
                    <p class="submit">
                    <input type="submit" name="save" id="button-primary" class="button-primary button-wpyou" value="<?php _e('Save Changes') ?>" />
                    </p>
                </td>
        	</tr>
			<tr valign="top">
            	<td><h3 id="wpyou_hp">首页设置</h3></td>
        	</tr>
           
            <tr valign="top">
                <th scope="row"><label>企业简介<span class="description">(文本)</span></label></th>
                <td>
                	<textarea class="wpyoutextarea" name="wpyou_aboutus"/><?php echo get_option('wpyou_aboutus'); ?></textarea>
                    <br />
                    <span class="description">设置首页【企业简介】栏目显示的内容 (支持HTML)</span>
                </td>
        	</tr>
            <tr valign="top">
                <th scope="row"><label>企业简介 链接地址<span class="description">(URL)</span></label></th>
                <td>
                    <input class="regular-text" style="width:35em;" type="text" name="wpyou_aboutus_url" value="<?php echo get_option('wpyou_aboutus_url'); ?>" />
                    <br />
                    <span class="description">设置首页【企业简介】栏目 的链接地址</span>
                </td>
        	</tr>
            <tr valign="top">
                <th scope="row"><label><span class="description"></span></label></th>
                <td>
                    <p class="submit">
                    <input type="submit" name="save" id="button-primary" class="button-primary button-wpyou" value="<?php _e('Save Changes') ?>" />
                    </p>
                </td>
        	</tr>
            <tr valign="top">
            	<td><h3 id="wpyou_ft">底部设置</h3></td>
        	</tr>
            <tr valign="top">
                <th scope="row"><label>底部内容设置 <span class="description">(文本)</span></label></th>
                <td>
                    <textarea class="wpyoutextarea" name="wpyou_footer"><?php echo get_option('wpyou_footer'); ?></textarea>
                    <br />
                    <span class="description">设置网站底部显示的内容 (支持HTML)</span>
                </td>
        	</tr>
            
            <tr valign="top">
                <th scope="row"><label><span class="description"></span></label></th>
                <td>
                    <p class="submit">
                    <input type="submit" name="save" id="button-primary" class="button-primary button-wpyou" value="<?php _e('Save Changes') ?>" />
                    </p>
                </td>
        	</tr>
		</table>
	</form>
</div>
<style type="text/css">
	.wpyounavi{ float:none; margin:2em 0em 1em; padding-left:1em; font-size:16px; height:32px; line-height:34px; color:#FFF; background-color:#666; -moz-border-radius:8px 8px 0px 0px;}
	.wpyounavi span{ float:left; padding:0px 10px; width:120px; height:32px; text-align:center; display:block; cursor:pointer;}
	.wpyounavi a:link, .wpyounavi a:visited{ font-weight:bold; color:#FFF;}
	.wpyounavi a:hover{ color:#FF0; text-decoration:underline;}
	.form-table th{width:240px !important; text-align:right; font-weight:bold; background-color:#EEE;}
	.form-table th span, span.description{ font-style:normal; font-weight:normal;}
	.form-table h3{ padding:5px 10px 4px; color:#FFF; text-align:center; background-color:#21759B; -moz-border-radius:5px 5px 5px 5px;}
	.button-wpyou{ padding:3px 0px 2px; width:200px;}
	.wpyoutextarea{ width:40em; height:15em;}
</style>
<?php }
	// create custom plugin settings menu
	add_action('admin_menu', 'wpyou_add_option');
?>
<?php 
//标题文字截断
function cut_str($src_str,$cut_length,$sign=0)//sign to show "..." in the description~~~
{
    $return_str='';
    $i=0;
    $n=0;
    $str_length=strlen($src_str);
    while (($n<$cut_length) && ($i<=$str_length))
    {
        $tmp_str=substr($src_str,$i,1);
        $ascnum=ord($tmp_str);
        if ($ascnum>=224)
        {
            $return_str=$return_str.substr($src_str,$i,3);
            $i=$i+3;
            $n=$n+2;
        }
        elseif ($ascnum>=192)
        {
            $return_str=$return_str.substr($src_str,$i,2);
            $i=$i+2;
            $n=$n+2;
        }
        elseif ($ascnum>=65 && $ascnum<=90)
        {
            $return_str=$return_str.substr($src_str,$i,1);
            $i=$i+1;
            $n=$n+2;
        }
        else 
        {
            $return_str=$return_str.substr($src_str,$i,1);
            $i=$i+1;
            $n=$n+1;
        }
    }
    if ($i<$str_length)
    {
        $return_str = $return_str . '';
    }
    if (get_post_status() == 'private')
    {
        $return_str = $return_str . '（private）';
    }
    if($sign==1){//add for show details
    	$return_str.='...';
    }
    return $return_str;
}
?>