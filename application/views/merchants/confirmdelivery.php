<?php

if (isset($this->session->userdata['logged_in'])) {

}
else{
	$eUrl=base_url()."merchant/dashboard?link=2&msg=Could not confirm delivery";
	redirect($eUrl);
}

$order_id='';
$confirm_id='';
$amount=0;
$merchant='';

if (isset($_GET['travis']) && isset($_GET['scott']) && isset($_GET['thugger'])&& isset($_GET['jeffrey'])) {
	$order_id = $_GET['travis'];
	$confirm_id = $_GET['scott'];
	$amount=$_GET['thugger'];
	$merchant=$_GET['jeffrey'];
	$order_id=strrev(base64_decode($order_id));
	$amount=strrev(base64_decode($amount));
	$merchant=strrev(base64_decode($merchant));

	$bankAccount=getBankAccount($merchant);

	$confirm_id = $_GET['scott'];

	$conf=confirmDelivery($order_id,$confirm_id,$amount,$merchant,$bankAccount);

	echo $conf;
	if($conf==1) {
		$eUrl = base_url() . "merchant/dashboard?link=2&msg=Delivery Confirmed";
		redirect($eUrl);
	}
	else if($conf==4) {
		$eUrl = base_url() . "merchant/dashboard?link=2&msg=Your Confirmation Code is Invalid";
		redirect($eUrl);
	}
	else{
		$eUrl=base_url()."merchant/dashboard?link=2&msg=Could not confirm delivery,Try Again";
		redirect($eUrl);
	}
}
else{
	$eUrl=base_url()."merchant/dashboard?link=2&msg=Could not confirm delivery,Try Again";
	redirect($eUrl);
}


?>
