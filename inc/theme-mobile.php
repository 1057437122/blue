<?php 
//this is for the mobile 
function is_mobile(){

	$browser = $_SERVER['HTTP_USER_AGENT'];
	// $keys = 'MicroMessenger';//only allow wechat agent to access 
	$keys = 'mobile|android|mobi|tablet|ipad|opera mini|series 60|s60|blackberry|MicroMessenger';//the last is wechat agent
	if (preg_match("/($keys)/i",$browser)){
		
		return TRUE ; 
	}
	
	return FALSE;
	
}

?>