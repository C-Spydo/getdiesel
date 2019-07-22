<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Client extends CI_Controller {

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
		$this->load->model('Client_M');
		$this->load->model('Control_M');
//
		$this->load->helper('control');
		$this->load->helper('client');
	}

	public function index()
	{

	}

	public function dashboard()
	{
		$this->load->view('clients/dashboard');
	}


	// Logout from admin page
	public function logout() {

		// Removing session data
		$sess_array = array(
			'username' => ''
		);

		$this->session->unset_userdata('client_in', $sess_array);
		$data['message_display'] = 'Successfully Logout';

		header("location: login");
		//$this->load->view('login_form', $data);
	}

	public function sign_up() {

			$user_id=$this->makeId();
			$data = array(
				'uuid'=>$user_id,
				'firstname' => $this->input->post('firstname'),
				'lastname' => $this->input->post('lastname'),
				'address' => $this->input->post('address'),
				'email' => $this->input->post('email'),
				'phone' => $this->input->post('phone'),
				'state' => $this->input->post('state'),
//				'lga' => $this->input->post('lga'),
				'password' => getHashedPassword($this->input->post('password')),
				'status'=>1
			);

			$session_data = array(
				'uuid'=>$user_id,
				'firstname' => $this->input->post('firstname'),
				'lastname' => $this->input->post('lastname'),
				'address' => $this->input->post('address'),
				'email' => $this->input->post('email'),
				'phone' => $this->input->post('phone'),
				'state' => $this->input->post('state'),
//				'lga' => $this->input->post('lga'),
				'password' => getHashedPassword($this->input->post('password')),
				'status'=>1
			);

			$this->session->set_userdata('client_in', $session_data);



			$data2=array(
				'value'=>$user_id
			);

			if(($this->input->post('password')) !=$this->input->post('password-confirm')){

				$eUrl=base_url()."register?msg=Passwords do not Match";
				redirect($eUrl);

			}

			else{
				$result = $this->Client_M->registration($data);
				$result2 = $this->Client_M->uuid_insert($data2);

				if ($result == TRUE) {
					echo "<script> alert ('Registration Successful, Proceed to Login !'); </script>";
					$this->send_welcome_email($data['business_email'],$this->input->post('password'));
					$eUrl=base_url()."login?msg=Registration Successful, Please Sign in";
					redirect($eUrl);

				} elseif($result==1) {
					$eUrl=base_url()."register?msg=Email  already exists, Try another";
					redirect($eUrl);
				}
				else{

				}
			}
	}

	public function sign_in() {

		$data = array(
			'email' => $this->input->post('email'),
			'password' => $this->input->post('password')
		);
		$resulter = $this->Client_M->login($data);

		if ($resulter == 1) {

			$username = $this->input->post('email');
			$result = $this->Client_M->read_user_information($username);

			if ($result ==true) {
				$regstatus=$result[0]->status;
				if($regstatus==1){
					$session_data = array(
						'uuid'=>$result[0]->uuid,
						'firstname' => $result[0]->firstname,
						'lastname' => $result[0]->lastname,
						'address'=>$result[0]->address,
						'email'=>$result[0]->email,
						'phone'=>$result[0]->phone,
						'state'=>$result[0]->state,
						'lga'=>$result[0]->lga,
						'status'=>$result[0]->status,
						'datetime'=>$result[0]->datetime
					);
					// Add user data in session
					$this->session->set_userdata('client_in', $session_data);
					redirect('index');
				}

				elseif($regstatus==2){

				}
				else{

				}
			}

		}
		else if($resulter==2){
			$eUrl=base_url()."login?msg=Invalid Password";
			redirect($eUrl);
		}
		else if($resulter==3){
			$eUrl=base_url()."login?msg=Invalid Email";
			redirect($eUrl);
		}

		else {
			$eUrl=base_url()."register?msg=Invalid Email or Password";
			redirect($eUrl);
		}
	}
//	}

	public function update_profile(){
		$data = array(
			'uuid'=>$this->input->post('uuid'),
			'firstname' => $this->input->post('firstname'),
			'lastname' => $this->input->post('lastname'),
			'address' => $this->input->post('address'),
			'email' => $this->input->post('email'),
			'phone' => $this->input->post('phone'),
			'state' => $this->input->post('state')
		);

		$result = $this->Client_M->update_profile($data);

		if ($result == TRUE) {
			$data['message_display'] = 'Account Update Successful, Welcome !';

			$this->session->userdata['client_in']['email']=$data['email'];
			$this->session->userdata['client_in']['firstname']=$data['firstname'];
			$this->session->userdata['client_in']['lastname']=$data['lastname'];
			$this->session->userdata['client_in']['phone']=$data['phone'];
			$this->session->userdata['client_in']['address']=$data['address'];

			$eUrl=base_url()."dashboard?link=5&msg=Update Successful";
			redirect($eUrl);

		}

		else{

			$eUrl=base_url()."dashboard?link=5&msg=Update Not Successful, Try Again!";
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

		$result = $this->Client_M->idchecker($str);

		if ($result == FALSE){
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


	public function forgot_pass(){
		$mynewPass=$this->makeNewPassword();
		$data = array(
			'password' => $mynewPass,
			'email' => $this->input->post('email')
		);

		$result = $this->Client_M->forgot_password($data);
		// echo $result;

		if($result==2){
			$eUrl=base_url()."forgotpassword?msg="."The email does not exist in our records";
			redirect($eUrl);
		}
		elseif($result==0){
			$eUrl=base_url()."forgotpassword?msg="."Could not reset password. Please Try Again Or contact Support";
			redirect($eUrl);
		}
		else{
			$this->send_password_email($data['email'],$mynewPass);
			echo "<script> alert ('Password Reset Successful.Check your Email for New Password'); </script>";
			$eUrl=base_url()."login?msg="."Password Reset Successful. Check your Email for New Password";
			redirect($eUrl);

		}

	}

	public function send_password_email($email,$password){
		$this->load->library('email');


		$email_subject='GetDiesel || Password Reset Successful';
		$email_message='Your new Password has been Set'."\n\n"."Email: ".$email.
			"\n"."Password: ".$password.
			"\n"."Kindly change your password when you Log in";

		$email_from='info@getdiesel.ng';
		$headers = 'From: '.$email_from."\r\n".
			'Reply-To: '.$email_from."\r\n" .
			'X-Mailer: PHP/' . phpversion();

		@mail($email, $email_subject, $email_message, $headers);

		echo "<script> alert ('Hello, You have been sent a Password Reset Email'); </script>";

	}

	public function makeNewPassword()
	{
		$keyspace2 = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';


		$str = '';


		$max = mb_strlen($keyspace2, '8bit') - 1;
		for ($i = 0; $i <7; ++$i) {
			$str .= $keyspace2[rand(0, $max)];
		}

		return $str;
	}

	public function user_password_updates($data){

		$this->load->helper('pwd_hash');
		$password=$data['password'];
		$ipassword=$data['ipassword'];
		$user_id=$data['user_id'];

		$condition = "user_id =" . "'" . $data['user_id']. "'";
		$this->db->select('*');
		$this->db->from('user_login');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();

		if ($query->num_rows() == 1) {
			$q=$query->result_array();
			if(verifyHashedPassword($ipassword, $q[0]['password'])){

				$newpassword=getHashedPassword($password);
				$new_status = array('password'=>$newpassword);
				$this->db->where('user_id', $user_id);
				$this->db->update('user_login', $new_status);

				if ($this->db->affected_rows() > 0) {
					return 4;
				}
				else{
					return 1;
				}
			}
			else{
				return 2;
			}
		}
		else{
			return 3;
		}




	}

}
