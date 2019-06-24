<?php


$email='';
$phone='';
$amount='';
$altRef='';

$email = $_GET['email'];
$phone=$_GET['phone'];
$amount=$_GET['amount'];
$altRef=$_GET['altRef'];


?>

<html>

<body>
<!--<script src="https://api.ravepay.co/flwv3-pug/getpaidx/api/flwpbf-inline.js"></script>-->
<script type="text/javascript" src="https://ravesandboxapi.flutterwave.com/flwv3-pug/getpaidx/api/flwpbf-inline.js"></script>
<script>


    const API_publicKey = "FLWPUBK-3751e4e13b87957c48f66813bf723c82-X";

    var altRef="<?php echo $altRef; ?>";
    var amount="<?php print($amount); ?>";

    function payWithRave() {
		var x = getpaidSetup({
            PBFPubKey: API_publicKey,
            customer_email: "<?php echo $email; ?>",
            amount: parseFloat(amount.toString().replace(',','')),
            customer_phone: "<?php echo $phone; ?>",
            currency: "NGN",
            txref: "getdiesel-"+Date.now().toString()+":-:"+altRef,
            hosted_payment: 1,
            redirect_url: "<?php echo base_url().'ravepay_2'?>",
            meta: [{
			metaname: "flightID",
                metavalue: "AP1234"
            }],
            onclose: function() {},
            callback: function(response) {
			var txref = response.tx.txRef; // collect txRef returned and pass to a 					server page to complete status check.
			console.log("This is the response returned after a charge", response);
			if (
				response.tx.chargeResponseCode == "00" ||
				response.tx.chargeResponseCode == "0"
			) {
				alert("Payment Success");
				alert(txref);
			} else {
				alert("Could not pay");
			}

			x.close(); // use this to close the modal immediately after payment.
		}
        });
    }

    payWithRave();
</script>

</body>
</html>
