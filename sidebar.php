<div class="sidebar <?php if (get_option('wpyou_sidebar_position') == '1') { echo 'sidebarr'; } ?>">
    <!-- Widgets begin -->
    <ul>
    	<?php if ( is_page() ) { ?>
            <!-- SubPageList begin -->
            <?php
                $parent_page = $post->ID;
                while($parent_page) {
                    $page_query = $wpdb->get_row("SELECT ID, post_title, post_status, post_parent FROM $wpdb->posts WHERE ID = '$parent_page'");
                    $parent_page = $page_query->post_parent;
                 }
               $parent_id = $page_query->ID;
               $parent_title = $page_query->post_title;
                if ($wpdb->get_results("SELECT * FROM $wpdb->posts WHERE post_parent = '$parent_id' AND post_status != 'attachment'")) { ?>
                    <?php $subpage = wp_list_pages('depth=1&echo=0&child_of='.$parent_id); ?><?php //key ?>
                    <?php if($subpage) { ?>
                    	<li class="widget sublist">
                            <h3><?php echo $parent_title; ?></h3>
                            <ul><?php wp_list_pages('depth=1&sort_column=menu_order&title_li=&child_of='. $parent_id); ?></ul>
                    	</li>
					<?php } ?>
                <?php } ?>
            <!-- SubPageList end -->
        <?php } elseif( is_search() || is_404() ) { ?>
		
		<?php } else { ?>
        	<?php
				$this_category = get_the_category();
				$category_id = $this_category[0]->cat_ID;
				$parent_id = get_category_root_id( $category_id );
				$category_link = get_category_link( $parent_id );
        		$childcat = get_categories('child_of='.$parent_id);
				if( $childcat && $parent_id ){
			?>

            <!-- SubCatList begin -->
            <li class="widget sublist">
               <h3><a href="<?php echo $category_link; ?>" title="<?php echo get_cat_name( $parent_id ); ?>"><?php echo get_cat_name( $parent_id ); ?></a></h3>
                <ul>
                    <?php wp_list_cats("orderby=id&child_of=" . $parent_id . "&depth=2&hide_empty=0"); ?>
                </ul>
            </li>
            <!-- SubCatList end -->
            <?php } else { ?><?php } ?>
        <?php } ?>
		<?php wp_reset_query(); ?>
    	<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar(1) ) : else : ?>	
        <!-- Latest begin -->
        <li>
            <h3>解决方案</h3>
            <?php if (get_option('wpyou_solution_id')) { $solutionid = get_option('wpyou_solution_id'); ?>
				<?php query_posts('caller_get_posts=1&showposts=8&cat='.$solutionid); ?>
            <?php } else { ?>
            	<?php query_posts('caller_get_posts=1&showposts=8&cat=solution'); ?>
            <?php } ?>
                <ul>
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                     <li><a href="<?php the_permalink() ?>" title="<?php the_title() ?>"><?php the_title() ?></a></li>
                <?php endwhile ?>
                </ul>
            <?php endif ?>
        </li>
        <!-- Latest end -->
        <!-- Tags begin -->
        <li>
            <h3>最近留言</h3>
			<?php wp_reset_query(); ?>
			<?php
				global $wpdb;
				$sql = "SELECT DISTINCT ID, post_title, post_password, comment_ID,
				comment_post_ID, comment_author, comment_date_gmt, comment_approved,
				comment_type,comment_author_url,
				SUBSTRING(comment_content,1,30) AS com_excerpt
				FROM $wpdb->comments
				LEFT OUTER JOIN $wpdb->posts ON ($wpdb->comments.comment_post_ID =
				$wpdb->posts.ID)
				WHERE comment_approved = '1' AND comment_type = '' AND
				post_password = ''
				ORDER BY comment_date_gmt DESC
				LIMIT 8";
				$comments = $wpdb->get_results($sql);
				$output = $pre_HTML;
				$output .= "\n<ul>";
				foreach ($comments as $comment) {
					
					$output .= "\n<li><a href=".get_permalink($comment->ID).">" . $comment->com_excerpt. "</a></li>";
				/*
					$output .= "\n<li><strong><a href=\"" . $comment->comment_author_url . "\">".strip_tags($comment->comment_author)
					."</a>:</strong>" . "<a href=\"" . get_permalink($comment->ID) .
					"#comment-$comment->ID" . $comment->comment_content . "\" title=\"on " .
					$comment->post_title . "\">" . strip_tags($comment->com_excerpt)
					."</a></li>";
				*/
				}
				$output .= "\n</ul>";
				$output .= $post_HTML;
				echo $output;
			?>
        </li>
        <!-- Tags begin -->
        <!-- Tags begin -->
<!--        <li class="widget widget_tag_cloud">
            <h3><?php /*?><?php _e('热门搜索'); ?><?php */?></h3>
            <div><?php /*?><?php wp_tag_cloud('smallest=12&largest=16&number=40&unit=px&orderby=count&order=DESC'); ?><?php */?></div>
        </li>-->
        <!-- Tags begin -->
    <?php endif; ?>
    </ul>
    <!-- Widgets end -->
</div>
<?php wp_reset_query(); ?>