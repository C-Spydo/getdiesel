<?php

Class Teacher_M extends CI_Model {

	// Insert registration data in database
	public function registration($data) {

		$checker=0;
		// Query to check whether username already exist or not
		$condition = "business_email =" . "'" . $data['business_email'] . "'";
		$this->db->select('*');
		$this->db->from('teachers');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() != 0) {
			$checker=1;
			return $checker;

		}

		if ($checker==0){
			// 	Query to insert data in database
			$this->db->insert('teachers', $data);
			if ($this->db->affected_rows() > 0) {
				return true;
			}
		}


	}

	// Read data using username and password
	public function login($data) {
		$this->load->helper('control');
		$password=$data['password'];

		$condition = "business_email =" . "'" . $data['business_email']. "'";
		$this->db->select('*');
		$this->db->from('teachers');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();

		if ($query->num_rows() == 1) {


			$q=$query->result_array();


			if(verifyHashedPassword($password, $q[0]['password'])){
				// echo 'Yes , I got here';
				return 1;
			}
			else{
				return 2;
			}

		} else {
			return 3;
		}

	}

	// Read data from database to show data in admin page
	public function read_user_information($business_email) {

		$condition = "business_email =" . "'" . $business_email . "'";
		$this->db->select('*');
		$this->db->from('teachers');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();

		if ($query->num_rows() == 1) {
			return $query->result();
		} else {
			return false;
		}
	}

	public function idchecker($data){
		// Query to check whether username already exist or not
		$condition = "value =" . "'" . $data . "'";
		$this->db->select('*');
		$this->db->from('uuid_te');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();

		if ($query->num_rows() == 0) {
			return FALSE;

		}
		else{
			return TRUE;
		}
	}

	public function uuid_insert($data) {
		// 	Query to insert data in database
		$this->db->insert('uuid_te', $data);
		if ($this->db->affected_rows() > 0) {
			return true;
		}
	}


	public function update_profile($data){

		$u_id = $data['uuid'];
		$this->db->where('uuid',$u_id);
		$this->db->update('teachers', $data);

		if ($this->db->affected_rows() > 0) {
			return true;
		}

	}

	public function updateaccount($data){

		$u_id = $data['merchant'];
		$this->db->where('merchant',$u_id);
		$this->db->update('bank_accounts', $data);

		if ($this->db->affected_rows() > 0) {
			return true;
		}

	}


	public function confirmDelivery($order_id,$confirm_id,$amount,$merchant){
		$this->db->where('uuid', $order_id);
		$this->db->update('students', array('status' => 5));

		if ($this->db->affected_rows() > 0) {

			$data = array(
				'merchant'=>$merchant,
				'amount' => $amount,
				'status'=>1
			);
			$this->db->insert('payments', $data);
			if ($this->db->affected_rows() > 0) {
				return 1;
			}
			else{
				return 0;
			}
		}
		else{
			return 0;
		}

	}




	public function countOrders($u_id) {

		$this->db->select('*');
		$this->db->from('students');
		$this->db->where('merchant',$u_id);
		$query = $this->db->get();

		return $query->num_rows() ;

	}

	public function getDelivered($u_id) {

		$this->db->select('*');
		$this->db->from('students');
		$this->db->where('merchant',$u_id);
		$this->db->where('status',5);
		$query = $this->db->get();
		return $query->num_rows() ;

	}

	public function getPending($u_id) {

		$this->db->select('*');
		$this->db->from('students');
		$this->db->where('merchant',$u_id);
		$this->db->where('status <',5);
		$query = $this->db->get();
		return $query->num_rows() ;

	}

	public function getPendingRevenue($u_id) {

		$this->db->select_sum('amount');
		$this->db->where('merchant',$u_id);
		$query = $this->db->get('payments')->row();
		return $query->amount;
	}

	public function getMerchantOrders($uuid) {
		$this->db->select('*');
		$this->db->from('students');
		$this->db->where('merchant',$uuid);
		$query = $this->db->get();

		$q=array();
		if ($query->num_rows() >0) {
			$q=$query->result_array();
		}
		return $q;

	}

	public function getBankAccount($uuid) {
		$this->db->select('*');
		$this->db->from('bank_accounts');
		$this->db->where('merchant',$uuid);
		$this->db->limit(1);
		$query = $this->db->get();

		$q=array();
		if ($query->num_rows() >0) {
			$q=$query->result_array();
		}
		return $q;
	}

}

?>
