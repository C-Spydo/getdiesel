<?php defined('BASEPATH') OR exit('No direct script access allowed');

$config = array(
	'protocol' => 'smtp', // 'mail', 'sendmail', or 'smtp'
	'smtp_host' => 'localhost',
	'smtp_port' => 587,
	'smtp_user' => 'noreply@getdiesel.ng',
	'smtp_pass' => 'noreply@getdiesel.ng',
	'mailtype' => 'text', //plaintext 'text' mails or 'html'
	'smtp_timeout' => '5', //in seconds
	'charset' => 'iso-8859-1',
	'wordwrap' => TRUE,
	'newline'=>"\r\n"
);


//'smtp_port' => 465,      Port 465 is for SSL connection alone
//'smtp_crypto' => 'tls', //can be 'ssl' or 'tls' for example
?>
