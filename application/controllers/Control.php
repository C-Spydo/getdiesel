<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Control extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */


	public function __construct() {
		parent::__construct();

		//loading url helper
		$this->load->helper('url');

		// Load form helper library
		$this->load->helper('form');

		// Load form validation library
		$this->load->library('form_validation');

		// Load session library
		$this->load->library('session');

		// Load database
		$this->load->model('Control_M');
//
		$this->load->helper('control');;

	}

	public function index()
	{
		$this->load->view('index');
	}

	public function register()
	{
		$this->load->view('register');
	}

	public function login()
	{
		$this->load->view('login');
	}

	public function about()
	{
		$this->load->view('about');
	}

	public function contact()
	{
		$this->load->view('contact');
	}

	public function ravepay()
	{
		$this->load->view('payments/ravepay');
	}

	public function ravepay_2()
	{
		$this->load->view('payments/ravepay_2');
	}

	public function paystack()
	{
		$this->load->view('payments/paystack');
	}

	public function paystack_verify()
	{
		$this->load->view('payments/paystack_verify');
	}
	public function paystack_confirm()
	{
		$this->load->view('payments/paystack_confirm');
	}


	public function make_order() {
			$order_id=$this->makeId();

			//Hey Idiot, Remember to remove the next line once you build the price component, yaaay
			//$this->session->userdata['current_price']=165.78;
			$current_price=currentPrice();
			$data = array(
				'uuid'=>$order_id,
				'name' => $this->input->post('name'),
				'user' => $this->input->post('uuid'),
				'company_name' => $this->input->post('company_name'),
				'email' => $this->input->post('email'),
				'phone' => $this->input->post('phone'),
				'state' => $this->input->post('state'),
				'address' => $this->input->post('address'),
				'quantity' => abs($this->input->post('litres')),
				'price' => $current_price,
				'amount' => number_format($this->input->post('litres')*$current_price,2),
//				'lga' => $this->input->post('lga'),
				'status'=>1
			);

			$data2=array(
				'value'=>$order_id
			);
			
				$result = $this->Control_M->make_order($data);
				$result2 = $this->Control_M->uuid_insert($data2);

				if ($result == TRUE) {
					// Proceed to payment here

					$eUrl=base_url()."paystack?email=".$data['email']."&phone=".$data['phone'].
						"&amount=".$data['amount']."&altRef=".$data['uuid'];

					$this->session->userdata['client_in']['current_amount']=$data['amount'];
					$this->send_order_email($data);

					redirect($eUrl);

//					echo "<script> alert ('Order Placed Successfully, You will receive Email and SMS Alerts !'); </script>";
//					$this->send_order_email($data);
//					$eUrl=base_url()."index?msg=Order Placed Successfully, You will receive Email and SMS Alerts";
//					redirect($eUrl);
				}
				else {
					$eUrl=base_url()."index?msg=Order Not Successful, Please Try Again";
					redirect($eUrl);
					//$data['message_display'] = 'Order Not Successful, Please Try Again';
					echo "<script> alert ('Order Not Successful, Please Try Again !'); </script>";
				}

	}

	public function makeId()
	{
		$keyspace = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$keyspace2 = '0123456789';
		$keyspace3 = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';


		$str = '';
		$max = mb_strlen($keyspace, '8bit') - 1;
		for ($i = 0; $i < 3; ++$i) {
			$str .= $keyspace[rand(0, $max)];
		}

		$max = mb_strlen($keyspace2, '8bit') - 1;
		for ($i = 0; $i < 2; ++$i) {
			$str .= $keyspace2[rand(0, $max)];
		}

		$max = mb_strlen($keyspace3, '8bit') - 1;
		for ($i = 0; $i < 2; ++$i) {
			$str .= $keyspace3[rand(0, $max)];
		}

		$result = $this->Control_M->idchecker($str);

		if ($result == FALSE){
			$data = array(
				'value' => $str
			);
			//$this->Control_M->uuid_insert($data);
			return $str;
		}else{
			makeId();
		}
	}


	public function send_order_email($data){
		$this->load->library('email');


		$email_subject='GetDiesel || Order Successful';
		$email_message="You have Successfully Placed an order.
		\n\nA payment receipt will be sent once payment is confirmed.
		\n\nKindly give the Payment Code to the Merchant once your Order is delivered.\n\nThanks.
		"."\n\n"."Quantity: ".$data['quantity']." litres".
			"\n"."Amount: ".$data['amount']."\n"."Order Code: ".$data['order_id']
			."\n"."State: ".$data['state']."\n"."Address: ".$data['address'];

		;

		$email_from='info@getdiesel.ng';
		$headers = 'From: '.$email_from."\r\n".
			'Reply-To: '.$email_from."\r\n" .
			'X-Mailer: PHP/' . phpversion();

		@mail($data['email'], $email_subject, $email_message, $headers);

		//echo "<script> alert ('Hello, You have been sent a Registration Email'); </script>";


	}

}
