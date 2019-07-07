<?php
include("app.php");

$email='';
$phone='';
$amount='';
$altRef='';

$email = $_GET['email'];
$phone=$_GET['phone'];
$amount=$_GET['amount'];
$altRef=$_GET['altRef'];


?>


<!DOCTYPE html>
<html>

<head>
	<!--Let browser know website is optimized for mobile-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body>

<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
<script src="https://js.paystack.co/v1/inline.js"></script>

<script>
	payWithPaystack('<?php echo $email; ?>', '<?php echo $amount; ?>', '<?php echo $phone; ?>', '<?php echo $altRef; ?>');
</script>


</body>

</html>
