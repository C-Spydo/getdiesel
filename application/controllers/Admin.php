<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

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
		$this->load->model('Admin_M');
		$this->load->model('Control_M');
//
		$this->load->helper('control');
		$this->load->helper('admin');
	}

	public function index()
	{
		$this->load->view('admins/login');
	}

	public function register_v()
	{
		$this->load->view('admins/register');
	}

	public function dashboard()
	{
		$this->load->view('admins/dashboard');
	}

	public function login_v()
	{
		$this->load->view('admins/login');
	}

	public function forgotpassword_v()
	{
		$this->load->view('admins/forgotpassword');
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
				'email' => $this->input->post('businessemail'),
				'phone' => $this->input->post('businessphone'),
				'password' => getHashedPassword($this->input->post('password')),
				'status'=>1
			);

			$session_data = array(
				'uuid'=>$user_id,
				'firstname' => $this->input->post('firstname'),
				'lastname' => $this->input->post('lastname'),
				'email' => $this->input->post('businessemail'),
				'phone' => $this->input->post('businessphone'),
				'password' => getHashedPassword($this->input->post('password')),
				'status'=>1
			);

			$this->session->set_userdata('logged_in', $session_data);




			$data2=array(
				'value'=>$user_id
			);

			if(($this->input->post('password')) !=$this->input->post('password-confirm')){

				$data['message_display'] = 'Passwords Do Not Match';
				$this->load->view('admins/register', $data);
				//echo 'Passwords Do Not Match';
			}

			else{
				$result = $this->Admin_M->registration($data);
				$result2 = $this->Admin_M->uuid_insert($data2);

				if ($result == TRUE) {
					$data['message_display'] = 'Registration Successful, Proceed to Login !';

					// echo "Selected Uplink".$uplink;

					echo "<script> alert ('Registration Successful, Proceed to Login !'); </script>";
					$this->send_welcome_email($data['business_email'],$this->input->post('password'));
					$this->load->view('admins/register', $data);
				} elseif($result==1) {
					$data['message_display'] = 'Email  already exists, Try another!';
					$this->load->view('admins/register', $data);
				}
				else{

				}
			}
		}
	}

	public function sign_in() {

		$data = array(
			'email' => $this->input->post('email'),
			'password' => $this->input->post('password')
		);
		$resulter = $this->Admin_M->login($data);

		if ($resulter == 1) {

			$username = $this->input->post('email');
			$result = $this->Admin_M->read_user_information($username);

			if ($result ==true) {
				$regstatus=$result[0]->status;
				if($regstatus==1){
					$session_data = array(
						'uuid'=>$result[0]->uuid,
						'firstname' => $result[0]->firstname,
						'lastname' => $result[0]->lastname,
						'email'=>$result[0]->email,
						'phone'=>$result[0]->phone,
//							'password'=>$result[0]->password,
						'status'=>$result[0]->status,
						'datetime'=>$result[0]->datetime
					);
					// Add user data in session
					$this->session->set_userdata('logged_in', $session_data);



					//$this->load->view('admins/dashboard');
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
			$this->load->view('admins/login', $data);
		}
		else if($resulter==3){
			$data = array(
				'error_message' => 'Invalid Email'
			);
			$this->load->view('admins/login', $data);
		}

		else {
			$data = array(
				'error_message' => 'Invalid Email or Password'
			);
			$this->load->view('admins/login', $data);
		}
	}
//	}

	public function update_profile(){
		$data = array(
			'uuid'=>$this->session->userdata['logged_in']['uuid'],
			'firstname' => $this->input->post('firstname'),
			'lastname' => $this->input->post('lastname'),
//			'email' => $this->input->post('email'),
			'phone' => $this->input->post('phone')
		);

		$result = $this->Admin_M->update_profile($data);

		if ($result == TRUE) {


//			$this->session->userdata['logged_in']['email']=$data['email'];
			$this->session->userdata['logged_in']['firstname']=$data['firstname'];
			$this->session->userdata['logged_in']['lastname']=$data['lastname'];
			$this->session->userdata['logged_in']['phone']=$data['phone'];


			$eUrl=base_url()."admin/dashboard?link=5&msg=Update Successful";
			redirect($eUrl);

		}

		else{
			$eUrl=base_url()."admin/dashboard?link=5&msg=Update Not Successful, Try Again!";
			redirect($eUrl);
		}
	}

	public function assign_merchant(){
		$data = array(
			'uuid' => $this->input->post('uuid'),
			'merchant' => $this->input->post('merchant'),
			'status'=>3,
		);

		$result = $this->Admin_M->assign_merchant($data);



		if ($result == TRUE) {
			$eUrl=base_url()."admin/dashboard?link=201&order_id=" . $data['uuid']."&msg=Successful, Merchant has been Assigned";
			redirect($eUrl);
//			$this->load->view('admins/dashboard', $data);

		}

		else{
			$eUrl=base_url()."admin/dashboard?link=201&order_id=" . $data['uuid']."&msg=Not Successful, Try Again";
			redirect($eUrl);
			$data['message_display'] = 'Error! Not Successful, Try Again!';

//			$this->load->view('admins/dashboard', $data);
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

		$result = $this->Admin_M->idchecker($str);

		if ($result == FALSE){
			$data = array(
				'value' => $str
			);
			//$this->Admin_M->uuid_insert($data);
			return $str;
		}else{
			makeId();
		}
	}


	public function send_welcome_email($email,$password){
		$this->load->library('email');


		$email_subject='GetDiesel || Registration Successful';
		$email_message='You have Successfully Registered, Welcome to GetDiesel'."\n\n"."Email: ".$email.
			"\n"."Password: ".$password

		;

		$email_from='info@getdiesel.ng';
		$headers = 'From: '.$email_from."\r\n".
			'Reply-To: '.$email_from."\r\n" .
			'X-Mailer: PHP/' . phpversion();

		@mail($email, $email_subject, $email_message, $headers);

		echo "<script> alert ('Hello, You have been sent a Registration Email'); </script>";


	}

	public function set_price() {

		$data = array(
			'amount' => $this->input->post('amount'),
		);
		$result = $this->Admin_M->set_price($data);
			if ($result ==true) {
				$eUrl=base_url()."admin/dashboard?link=4&msg=Successful, New Price has been set";
				redirect($eUrl);
			}
			else{
				$eUrl=base_url()."admin/dashboard?link=4&msg=Error Occured, Please try Again";
				redirect($eUrl);
			}
	}




}
