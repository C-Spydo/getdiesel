<?php



$order_id='';
$amount=0;

if (isset($_GET['travis'])){
	$order_id=$_GET['travis'];
	$amount=$this->session->userdata['current_amount_realer'];

//	echo $order_id."-".$amount;
	$rez=confirmPaymentClient($order_id,$amount);
	if($rez==true){
		$eUrl=base_url()."index?msg=Payment Successful, Order will soon be on the way";
		redirect($eUrl);
	}
	else{
		$eUrl=base_url()."index?msg=Could not Confirm Payment, Please contact support. Do NOT Try Again";
		redirect($eUrl);
//		echo "<script> alert ('Could not Confirm Payment, Please contact again. Do NOT Try Again'); </script>";
	}
}
else{
	echo "<script> alert ('Order Cannot be Confirmed'); </script>";
	$eUrl=base_url()."index?msg=Order Cannot be Confirmed";
	redirect($eUrl);
}
?>
