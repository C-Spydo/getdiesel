<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/

//General Routes
$route['default_controller'] = 'control';
$route['404_override'] = '';
$route['translate_uri_dashes'] = TRUE;
$route['register'] = "control/register";
$route['login'] = "control/login";
$route['logout'] = "logout";
$route['forgotpassword'] = "control/forgotpassword";

$route['about'] = "control/about";
$route['index'] = "control/index";
$route['contact'] = "control/contact";
$route['ravepay'] = "control/ravepay";
$route['ravepay_2'] = "control/ravepay_2";
$route['paystack'] = "control/paystack";
$route['paystack_verify'] = "control/paystack_verify";
$route['paystack_confirm'] = "control/paystack_confirm";


//Client Routes

$route['logout'] = "client/logout";
$route['dashboard'] = "client/dashboard";
$route['updateprofile'] = "client/update_profile";

//Merchant Routes
$route['merchant/register'] = "merchant/register_v";
$route['merchant/login'] = "merchant/login_v";
$route['merchant/logout'] = "merchant/logout";
$route['merchant/forgotpassword'] = "merchant/forgotpassword_v";
$route['merchant'] = "merchant/login_v";
$route['merchant/dashboard'] = "merchant/dashboard";
$route['merchant/updateprofile'] = "merchant/update_profile";
$route['merchant/confirmdelivery'] = "merchant/confirmdelivery";


//Admin Routes
$route['retractor/register'] = "admin/register_v";
$route['admin/login'] = "admin/login_v";
$route['admin/logout'] = "admin/logout";
$route['admin/forgotpassword'] = "admin/forgotpassword_v";
$route['admin'] = "admin/login_v";
$route['admin/dashboard'] = "admin/dashboard";
$route['admin/updateprofile'] = "admin/update_profile";
