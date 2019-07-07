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



function countOrders($u_id){
	$CI = get_instance();
	$result = $CI->Teacher_M->countOrders($u_id);
	return $result;
}

function getPendingRevenue($u_id){
	$CI = get_instance();
	$result = $CI->Teacher_M->getPendingRevenue($u_id);
	if($result==null){
		$result=0;
	}
	return $result;
}

function getDelivered($u_id){
	$CI = get_instance();
	$result = $CI->Teacher_M->getDelivered($u_id);
	if($result==null){
		$result=0;
	}
	return $result;
}

function getPending($u_id){
	$CI = get_instance();
	$result = $CI->Teacher_M->getPending($u_id);
	if($result==null){
		$result=0;
	}
	return $result;
}


function getMerchantOrders($uuid){
	$CI = get_instance();
	$result = $CI->Teacher_M->getMerchantOrders($uuid);
	return $result;
}


function confirmDelivery($order_id,$confirm_id,$amount,$merchant){
	echo $order_id.$confirm_id;
	if($order_id=$confirm_id) {
		$CI = get_instance();
		$result = $CI->Teacher_M->confirmDelivery($order_id, $confirm_id,$amount,$merchant);
	}
	else{
		$result=4;
	}
	return $result;
}


function getBankAccount($id){
	$CI = get_instance();
	$result = $CI->Teacher_M->getBankAccount($id);
	return $result[0];
}
?>

