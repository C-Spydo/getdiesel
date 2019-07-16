<?php

if (isset($this->session->userdata['logged_in'])) {

}
else{
	$eUrl=base_url()."admin/dashboard?link=3&msg=Could not confirm Payment";
	redirect($eUrl);
}

$payment_id='';

if (isset($_GET['travis'])) {
	$payment_id = $_GET['travis'];

	$conf=confirmPaymentAdmin($payment_id);

	if($conf==true) {
		$eUrl = base_url() . "admin/dashboard?link=3&msg=Payment Confirmed";
		redirect($eUrl);
	}

	else{
		$eUrl=base_url()."admin/dashboard?link=3&msg=Could not confirm payment,Try Again";
		redirect($eUrl);
	}
}
else{
	$eUrl=base_url()."admin/dashboard?link=3&msg=Could not confirm Payment,Try Again";
	redirect($eUrl);
}


?>
