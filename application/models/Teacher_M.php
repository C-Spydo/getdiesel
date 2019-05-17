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
				return true;
			}
			else{
				return 1;
			}

		} else {
			return 2;
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


	public function user_account_updates($data){

		$u_id = $data['user_id'];
		$this->db->where('user_id',$u_id);
		$this->db->update('user_login', $data);

		if ($this->db->affected_rows() > 0) {
			return true;
		}

	}






	public function user_profile_update($data){

	}

}

?>
