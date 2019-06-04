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

function getOrderWithId($id){
	$CI = get_instance();
	$result = $CI->Admin_M->getOrderWithId($id);
	return $result[0];
}

function getMerchantsInState($state){
	$CI = get_instance();
	$result = $CI->Admin_M->getMerchantsInState($state);
	return $result;
}

function statusToText($status){
	$stext='';
	if($status==1){
		$stext='ORDER SAVED';
	}
	else{
		$stext='UNKNOWN';
	}
	return $stext;
}

?>
