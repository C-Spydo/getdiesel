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
//		$this->load->model('login_database');
//		$this->load->model('dashboard');
//
//		$this->load->helper('pwd_hash');
//		$this->load->helper('dashboard');
	}

	public function index()
	{
		$this->load->view('register');
	}

	public function register() {

		// Check validation for user input in SignUp form
		$this->form_validation->set_rules('username', 'Username', 'trim|required');

		$this->form_validation->set_rules('email', 'Email', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('register');
		} else {

			$uplink='default';
			$uplink2='default';
			$uplink3='default';

			$uplink=$this->input->post('uplink');
			$chkuplink=false;
			$chkuplink=$this->dashboard->chkUser($uplink);
			if ($uplink=='default'){

				$data['message_display'] = 'Get your Sponsor link to Register';
				$this->load->view('regiser', $data);

				$uplink2='default';
				$uplink3='default';
				$uplink4='default';
			}
			elseif($chkuplink==false){
				echo "<script> alert ('The Sponsor you entered does not Exist || Please Check and retry. !'); </script>";
				$this->load->view('register');
			}

			else{

				$uplink_cycle=$this->dashboard->getUplinkCycle($uplink);


				$uplinkmodd=$uplink." -".(string)($uplink_cycle);
				$uplink_no=$this->dashboard->countDirectDownlines($uplinkmodd);

				$uplink=getSpillover($uplinkmodd,$uplink_no);
				// echo $uplink_no;

				// echo "Selected Uplink".$uplink;
				$uplinkmod3=substr($uplink, 0, -3);

				$uplink2=$this->getUplink($uplinkmod3);
				$uplink2mod=substr($uplink2, 0, -3);

				$uplink3=$this->getUplink($uplink2mod);
				$uplink3mod=substr($uplink3, 0, -3);

				$uplink4=$this->getUplink($uplink3mod);

				// $uplink=$uplinkmodd;

				// echo $uplink;
				// echo $uplink2;
				// echo $uplink3;



				// }


				$user_id=$this->makeId();
				$data = array(
					'username' => $this->input->post('username'),
					'email' => $this->input->post('email'),
					'password' => getHashedPassword($this->input->post('password')),
					'fullname' => $this->input->post('fullname'),
					'uplink' => $uplink,
					'uplink2' => $uplink2,
					'uplink3' => $uplink3,
					'uplink4' => $uplink4,
					'telephone' => $this->input->post('telephone'),
					'gender' => $this->input->post('gender'),
					'state' => $this->input->post('state'),
					'user_id' => $user_id,
					'regstatus' => 1,
					'level'=>1

				);

				$data2=array(
					'user_id'=>$this->input->post('username'),
					'wallet_id'=>$this->makeWalletId(),
					'balance'=>0

				);

				if(($this->input->post('password')) !=$this->input->post('confirm_password')){

					$data['message_display'] = 'Passwords Do Not Match';
					$this->load->view('register', $data);
				}

				else{
					$result = $this->login_database->registration_insert($data);
					$result2 = $this->login_database->wallet_insert($data2);

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

}
