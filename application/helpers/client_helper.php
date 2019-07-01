<?php
//function getOrders(){
//	$CI = get_instance();
//
//	$result = $CI->Client_M->getOrders();
//
//	return $result;
//
//}
//

//
//function getOrderWithId($id){
//	$CI = get_instance();
//	$result = $CI->Client_M->getOrderWithId($id);
//	return $result[0];
//}
//
//function getMerchantsInState($state){
//	$CI = get_instance();
//	$result = $CI->Client_M->getMerchantsInState($state);
//	return $result;
//}

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


function countOrders($u_id){
	$CI = get_instance();
	$result = $CI->Client_M->countOrders($u_id);
	return $result;
}

function getLitres($u_id){
	$CI = get_instance();
	$result = $CI->Client_M->getLitres($u_id);
	if($result==null){
		$result=0;
	}
	return $result;
}

function getDelivered($u_id){
	$CI = get_instance();
	$result = $CI->Client_M->getDelivered($u_id);
	if($result==null){
		$result=0;
	}
	return $result;
}

function getPending($u_id){
	$CI = get_instance();
	$result = $CI->Client_M->getPending($u_id);
	if($result==null){
		$result=0;
	}
	return $result;
}


function getClientOrders($uuid){
	$CI = get_instance();
	$result = $CI->Client_M->getClientOrders($uuid);
	return $result;
}

function getMerchantWithId($id){
	$CI = get_instance();
	$result = $CI->Client_M->getMerchantWithId($id);
	return $result[0];
}
?>
