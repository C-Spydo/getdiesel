<?php
function getOrders(){
	$CI = get_instance();

	$result = $CI->Admin_M->getOrders();

	return $result;

}

function getMerchantWithId($id){
	$CI = get_instance();

	$result = $CI->Admin_M->getMerchantWithId($id);

//	print_r($result);
	return $result[0];

}

?>
