<?php

Class Admin_M extends CI_Model {

	// Insert registration data in database
	public function registration($data) {

		$checker=0;
		// Query to check whether username already exist or not
		$condition = "email =" . "'" . $data['email'] . "'";
		$this->db->select('*');
		$this->db->from('principals');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() != 0) {
			$checker=1;
			return $checker;

		}

		if ($checker==0){
			// 	Query to insert data in database
			$this->db->insert('principals', $data);
			if ($this->db->affected_rows() > 0) {
				return true;
			}
		}


	}

	// Read data using username and password
	public function login($data) {
		$this->load->helper('control');
		$password=$data['password'];

		$condition = "email =" . "'" . $data['email']. "'";
		$this->db->select('*');
		$this->db->from('principals');
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

		$condition = "email =" . "'" . $business_email . "'";
		$this->db->select('*');
		$this->db->from('principals');
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

	public function set_price($data) {
		// 	Query to insert data in database
		$this->db->insert('price', $data);
		if ($this->db->affected_rows() > 0) {
			return true;
		}
	}


	public function update_profile($data){

		$u_id = $data['uuid'];
		$this->db->where('uuid',$u_id);
		$this->db->update('principals', $data);

		if ($this->db->affected_rows() > 0) {
			return true;
		}

	}

	public function getOrders() {
		$allusers=array();

//		$condition = "regstatus = 2";
		$this->db->select('*');
		$this->db->from('students');
		$this->db->order_by("uuid", "desc");
		$query = $this->db->get();

		$q=array();
		if ($query->num_rows() >0) {
			$q=$query->result_array();


			foreach ($q as $row)
			{
				$user=$row;

				array_push($allusers,$user);
			}
		}


		$allusers=$q;
		return $allusers;

	}

	public function getPayments() {
		$allusers=array();

		$this->db->select('*');
		$this->db->from('payments');
		$this->db->order_by("id", "desc");
		$query = $this->db->get();

		$q=array();
		if ($query->num_rows() >0) {
			$q=$query->result_array();
			foreach ($q as $row)
			{
				$user=$row;
				array_push($allusers,$user);
			}
		}
		$allusers=$q;
		return $allusers;
	}

	public function getMerchantWithId($id) {

		$this->db->select('*');
		$this->db->from('teachers');
		$this->db->where('uuid', $id);
		$this->db->limit(1);
		$query = $this->db->get();

		if ($query->num_rows() == 1) {
			return $query->result_array();
		} else {
			return false;
		}

	}

	public function getOrderWithId($id) {

		$this->db->select('*');
		$this->db->from('students');
		$this->db->where('uuid', $id);
		$this->db->limit(1);
		$query = $this->db->get();

		if ($query->num_rows() == 1) {
			return $query->result_array();
		} else {
			return false;
		}

	}


	public function getMerchantsInState($state) {
		$this->db->select('*');
		$this->db->from('teachers');
		$this->db->where('state', $state);
		$query = $this->db->get();

		$q=array();
		if ($query->num_rows() >0) {
			$q=$query->result_array();
		}

		$allusers=$q;
		return $allusers;

	}


	public function assign_merchant($data){

		print_r($data);
		$u_id = $data['uuid'];
		$this->db->where('uuid',$u_id);
		$this->db->update('students', $data);

		if ($this->db->affected_rows() > 0) {
			return true;
		}

	}




	public function countOrders() {

		$this->db->select('*');
		$this->db->from('students');
		$query = $this->db->get();
		return $query->num_rows() ;

	}

	public function countMerchants() {

		$this->db->select('*');
		$this->db->from('teachers');
		$query = $this->db->get();
		return $query->num_rows() ;

	}

	public function countClients() {

		$this->db->select('*');
		$this->db->from('pupils');
		$query = $this->db->get();
		return $query->num_rows() ;

	}


	public function confirmPayment($payment_id){
		$this->db->where('id',$payment_id);
		$this->db->update('payments', array('status' => 5));

		if ($this->db->affected_rows() > 0) {
			return true;
		}
		else{
			return false;
		}

	}


}

?>
