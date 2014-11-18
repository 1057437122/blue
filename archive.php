<?php 
	if (get_option('wpyou_news_id'))
		{
			$newsCats = get_option('wpyou_news_id');
			$newsArrays = explode(",",$newsCats);
		}
	if (get_option('wpyou_products_id'))
		{
			$productsCats = get_option('wpyou_products_id');
			$productsArrays = explode(",",$productsCats);	
		}
	if (get_option('wpyou_partner_id'))
		{
			$partnersCats = get_option('wpyou_partner_id');
			$partnersArrays = explode(",",$partnersCats);	
		}
	
	if(in_category($archive_solution) || post_is_in_descendant_category( $archive_solution ))
		{
			include('archive_solution.php');
		}
	elseif(in_category($productsArrays) || post_is_in_descendant_category( $productsArrays))
		{
			include('archive_products.php');
		}
	elseif(in_category($partnersArrays) || post_is_in_descendant_category( $partnersArrays))
		{
			include('archive_partners.php');
		}
	else
		{ include('archive_main.php'); }

?>