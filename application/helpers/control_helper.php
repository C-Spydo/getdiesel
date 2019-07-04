<?php

/**
 * Encrypt and decrypt
 *
 * @author Nazmul Ahsan <n.mukto@gmail.com>
 * @link http://nazmulahsan.me/simple-two-way-function-encrypt-decrypt-string/
 *
 * @param string $string string to be encrypted/decrypted
 * @param string $action what to do with this? e for encrypt, d for decrypt
 */
function crypto( $string, $action ) {
	// you may change these values to your own
	$secret_key = 'my_simple_secret_key';
	$secret_iv = 'my_simple_secret_iv';

	$output = false;
	$encrypt_method = "AES-256-CBC";
	$key = hash( 'sha256', $secret_key );
	$iv = substr( hash( 'sha256', $secret_iv ), 0, 16 );

	if( $action == 'e' ) {
		$output = base64_encode( openssl_encrypt( $string, $encrypt_method, $key, 0, $iv ) );
	}
	else if( $action == 'd' ){
		$output = openssl_decrypt( base64_decode( $string ), $encrypt_method, $key, 0, $iv );
	}

	return $output;
}

/**
 * This function used to generate the hashed password
 * @param {string} $plainPassword : This is plain text password
 */
if(!function_exists('getHashedPassword'))
{
	function getHashedPassword($plainPassword)
	{
		return password_hash($plainPassword, PASSWORD_DEFAULT);
	}
}
/**
 * This function used to generate the hashed password
 * @param {string} $plainPassword : This is plain text password
 * @param {string} $hashedPassword : This is hashed password
 */
if(!function_exists('verifyHashedPassword'))
{
	function verifyHashedPassword($plainPassword, $hashedPassword)
	{
		if(password_verify($plainPassword, $hashedPassword)){
			return true;
		}
		else{
			return false;
		}

	}
}


function currentPrice(){
	$CI = get_instance();
	$result = $CI->Control_M->currentPrice();
	return $result[0]["amount"];
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


/* Order Statuses:
1- saved
2- Paid
3- Assigned to Merchant
4- En Route
5- Delivered

*/

/*
 * PAYMENT STATUSES
 * 1- Saved
 * 2- Paid
 * 3- Received
 * 4- Unknown
 */
?>
