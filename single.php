<?php
$post = $wp_query->post;
if ( in_category('1') || post_is_in_descendant_category('1') ){
	include(TEMPLATEPATH . '/single_products.php');
}
else {
	include(TEMPLATEPATH . '/single_main.php');
}?>