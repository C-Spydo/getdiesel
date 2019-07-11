<script>
	function payWithPaystack(email,amount,phone,order_id) {

		var amount2=Math.ceil(parseFloat(amount.replace(/,/g, '')));
		var amount3=amount2*100;
		var handler = PaystackPop.setup({
			key: 'pk_test_98a4c99dccfb56caa2ce716d70a8d49ea01c6e97', //put your public key here
			email: email, //put your customer's email here
			amount: amount3, //amount the customer is supposed to pay
			metadata: {
				custom_fields: [
					{
						display_name: "Mobile Number",
						variable_name: "mobile_number",
						value: phone //customer's mobile number
					}
				]
			},
			callback: function (response) {
				//after the transaction have been completed
				//make post call  to the server with to verify payment
				//using transaction reference as post data
				$.post("paystack_verify", {reference:response.reference}, function(status) {
					if (status == "success"){
					//successful transaction
						alert('Transaction was successful, Click OK');
					var eUrl = "paystack_confirm/?travis=" + order_id+"&scott="+amount;
					window.location.replace(eUrl);
				}
					else {
						//transaction failed
						alert(response);
					}
				});
			},
			onClose: function () {
				//when the user close the payment modal
				alert('Transaction cancelled');
			}
		});
		handler.openIframe(); //open the paystack's payment modal
	}

</script>
