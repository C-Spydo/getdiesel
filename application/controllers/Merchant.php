<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Merchant extends CI_Controller {

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
		$this->load->model('Teacher_M');
		$this->load->model('Control_M');
//
		$this->load->helper('control');
		$this->load->helper('merchant');
	}

	public function index()
	{
		$this->load->view('merchants/login');
	}

	public function register_v()
	{
		$this->load->view('merchants/register');
	}

	public function dashboard()
	{
		$this->load->view('merchants/dashboard');
	}

	public function login_v()
	{
		$this->load->view('merchants/login');
	}

	public function forgotpassword_v()
	{
		$this->load->view('merchants/forgotpassword');
	}

	public function confirmdelivery()
	{
		$this->load->view('merchants/confirmdelivery');
	}

	// Logout from admin page
	public function logout() {

		// Removing session data
		$sess_array = array(
			'username' => ''
		);

		$this->session->unset_userdata('logged_in', $sess_array);
		$data['message_display'] = 'Successfully Logout';

		header("location: sign_in");
		//$this->load->view('login_form', $data);
	}

	public function sign_up() {

		// Check validation for user input in SignUp form
		$this->form_validation->set_rules('firstname', 'Username', 'trim|required');

		$this->form_validation->set_rules('businessemail', 'Email', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('merchant/register');
		} else {


				$user_id=$this->makeId();
				$data = array(
					'uuid'=>$user_id,
					'firstname' => $this->input->post('firstname'),
					'lastname' => $this->input->post('lastname'),
					'business_name' => $this->input->post('businessname'),
					'business_address' => $this->input->post('businessaddress'),
					'business_email' => $this->input->post('businessemail'),
					'business_phone' => $this->input->post('businessphone'),
					'state' => $this->input->post('state'),
					'lga' => $this->input->post('lga'),
					'password' => getHashedPassword($this->input->post('password')),
					'status'=>1
				);

				$session_data = array(
					'uuid'=>$user_id,
					'firstname' => $this->input->post('firstname'),
					'lastname' => $this->input->post('lastname'),
					'business_name' => $this->input->post('businessname'),
					'business_address' => $this->input->post('businessaddress'),
					'business_email' => $this->input->post('businessemail'),
					'business_phone' => $this->input->post('businessphone'),
					'state' => $this->input->post('state'),
					'lga' => $this->input->post('lga'),
					'password' => getHashedPassword($this->input->post('password')),
					'status'=>1
				);

				$this->session->set_userdata('logged_in', $session_data);




			$data2=array(
					'value'=>$user_id
				);

				if(($this->input->post('password')) !=$this->input->post('password-confirm')){

					$data['message_display'] = 'Passwords Do Not Match';
					$this->load->view('merchants/register', $data);
					//echo 'Passwords Do Not Match';
				}

				else{
					$result = $this->Teacher_M->registration($data);
					$result2 = $this->Teacher_M->uuid_insert($data2);

					if ($result == 2) {
						$data['message_display'] = 'Registration Successful, Proceed to Login !';

						// echo "Selected Uplink".$uplink;

						//echo "<script> alert ('Registration Successful, Proceed to Login !'); </script>";
						$this->send_welcome_email($data['business_email'],$this->input->post('password'));

						$eUrl=base_url()."merchant/login?msg=Registration Successful, You have been sent an Email . Please Sign in";
						redirect($eUrl);

						//$this->load->view('merchants/login', $data);
					} elseif($result==1) {
						$data['message_display'] = 'Email  already exists, Try another!';
						$this->load->view('merchants/register', $data);
					}
					else{
						$data['message_display'] = 'Error! occured , Could not register, Please Retry';
						$this->load->view('merchants/register', $data);
					}
				}
			}
	}

	public function sign_in() {


//		$this->form_validation->set_rules('email', 'Username', 'trim|required');
//		$this->form_validation->set_rules('password', 'Password', 'trim');
//
//		if ($this->form_validation->run() == FALSE) {
//			if(isset($this->session->userdata['logged_in'])){
//				$this->load->view('merchant/dashboard');
//			}else{
//				$this->load->view('merchant/login');
//			}
//		} else {
			$data = array(
				'business_email' => $this->input->post('email'),
				'password' => $this->input->post('password')
			);
			$resulter = $this->Teacher_M->login($data);

			if ($resulter == 1) {

				$username = $this->input->post('email');
				$result = $this->Teacher_M->read_user_information($username);

				if ($result ==true) {
					$regstatus=$result[0]->status;
					if($regstatus==1){
						$session_data = array(
							'uuid'=>$result[0]->uuid,
							'firstname' => $result[0]->firstname,
							'lastname' => $result[0]->lastname,
							'business_name'=>$result[0]->business_name,
							'business_email'=>$result[0]->business_email,
							'business_address'=>$result[0]->business_address,
							'business_phone'=>$result[0]->business_phone,
							'state'=>$result[0]->state,
							'lga'=>$result[0]->lga,
//							'password'=>$result[0]->password,
							'status'=>$result[0]->status,
							'datetime'=>$result[0]->datetime
						);
						// Add user data in session
						$this->session->set_userdata('logged_in', $session_data);



						//$this->load->view('merchants/dashboard');
						header("location: dashboard");
					}

					elseif($regstatus==2){

					}
					else{

					}
				}

			}
			else if($resulter==2){
				$data = array(
					'error_message' => 'Invalid Password'
				);
				$this->load->view('merchants/login', $data);
			}
			else if($resulter==3){
				$data = array(
					'error_message' => 'Invalid Email'
				);
				$this->load->view('merchants/login', $data);
			}

			else {
				$data = array(
					'error_message' => 'Invalid Email or Password'
				);
				$this->load->view('merchants/login', $data);
			}
		}
//	}

	public function update_profile(){
		$data = array(
			'uuid'=>$this->session->userdata['logged_in']['uuid'],
			'firstname' => $this->input->post('firstname'),
			'lastname' => $this->input->post('lastname'),
			'business_name' => $this->input->post('businessname'),
			'business_address' => $this->input->post('businessaddress'),
			'business_email' => $this->input->post('businessemail'),
			'business_phone' => $this->input->post('businessphone'),
			'state' => $this->input->post('state')
		);

		$result = $this->Teacher_M->update_profile($data);

		if ($result == TRUE) {
			$data['message_display'] = 'Account Update Successful, Welcome !';


			// echo "<script> alert ('Account Update Successful'); </script>";

			$this->session->userdata['logged_in']['business_email']=$data['business_email'];
			$this->session->userdata['logged_in']['firstname']=$data['firstname'];
			$this->session->userdata['logged_in']['lastname']=$data['lastname'];
			$this->session->userdata['logged_in']['business_phone']=$data['business_phone'];
			$this->session->userdata['logged_in']['business_name']=$data['business_name'];
			$this->session->userdata['logged_in']['business_address']=$data['business_address'];
			$this->session->userdata['logged_in']['state']=$data['state'];

			$eUrl=base_url()."merchant/dashboard?link=5&msg=Update Successful";
			redirect($eUrl);

		}

		else{
			$eUrl=base_url()."merchant/dashboard?link=5&msg=Update Not Successful, Try Again!";
			redirect($eUrl);
		}
	}

	public function updateaccount(){
		$data = array(
			'merchant'=>$this->input->post('uuid'),
			'bankname' => $this->input->post('bankname'),
			'accountname' => $this->input->post('accountname'),
			'accountnumber' => $this->input->post('accountnumber')
		);

		$result = $this->Teacher_M->updateaccount($data);

		if ($result == TRUE) {

			$eUrl=base_url()."merchant/dashboard?link=4&msg=Update Successful";
			redirect($eUrl);

		}

		else{
			$eUrl=base_url()."merchant/dashboard?link=4&msg=Update Not Successful, Try Again!";
			redirect($eUrl);
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

	$result = $this->Teacher_M->idchecker($str);

	if ($result == FALSE){
		$data = array(
			'value' => $str
		);
		//$this->Teacher_M->uuid_insert($data);
		return $str;
	}else{
		makeId();
	}
}


	public function send_welcome_email($email,$password){
		$this->load->config('email');
		$this->load->library('email');

		$email_subject='GetDiesel || Registration Successful';
		$email_message='You have Successfully Registered as a Merchant, Welcome to GetDiesel'."\n"."Email: ".$email.
			"\n"."Password: ".$password;

		$from = $this->config->item('smtp_user');
		$to = $email;
		$subject = $email_subject;
		$message = $email_message;

		$this->email->set_newline("\r\n");
		$this->email->from($from);
		$this->email->to($to);
		$this->email->subject($subject);
		$this->email->message($message);

		$this->email->send();

		//echo "<script> alert ('Hello, You have been sent a Registration Email'); </script>";

	}

}
