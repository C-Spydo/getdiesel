<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Teacher extends CI_Controller {

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
//		$this->load->model('dashboard');
//
		$this->load->helper('control');
//		$this->load->helper('dashboard');
	}

	public function index()
	{
		$this->load->view('register');
	}

	public function register() {

		// Check validation for user input in SignUp form
		$this->form_validation->set_rules('firstname', 'Username', 'trim|required');

		$this->form_validation->set_rules('businessemail', 'Email', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('register');
		} else {


				$user_id=$this->makeId();
				$data = array(
					'uuid',$user_id,
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

				$data2=array(
					'value'=>$user_id
				);

				if(($this->input->post('password')) !=$this->input->post('confirm_password')){

					$data['message_display'] = 'Passwords Do Not Match';
					$this->load->view('register', $data);
				}

				else{
					$result = $this->Control->registration($data);
					$result2 = $this->Control->uuid_insert($data2);

					if ($result == TRUE) {
						$data['message_display'] = 'Registration Successful, Proceed to Login !';

						// echo "Selected Uplink".$uplink;

						echo "<script> alert ('Registration Successful, Proceed to Login !'); </script>";
						$this->send_welcome_email($data['email'],$data['username'],$this->input->post('password'));
						$this->load->view('login_form', $data);
					} elseif($result==1) {
						$data['message_display'] = 'Username  already exists, Try another!';
						$this->load->view('register', $data);
					}
					else{

					}
				}
			}
	}

	public function user_account_update(){
		$data = array(
			'email' => $this->input->post('email'),
			'fullname' => $this->input->post('fullname'),
			'telephone' => $this->input->post('telephone'),
			'user_id'=>$this->input->post('huserid')
		);

		$result = $this->login_database->user_account_updates($data);

		if ($result == TRUE) {
			$data['message_display'] = 'Account Update Successful, Welcome !';

			// echo "<script> alert ('Account Update Successful'); </script>";

			$this->session->userdata['logged_in']['email']=$data['email'];
			$this->session->userdata['logged_in']['fullname']=$data['fullname'];
			$this->session->userdata['logged_in']['telephone']=$data['telephone'];

			$this->load->view('admin_page');

		}

		else{
			$this->load->view('admin_page');
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
		$this->Teacher_M->uuid_insert($data);
		return $str;
	}else{
		makeId();
	}
}


}
