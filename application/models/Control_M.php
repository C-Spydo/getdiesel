<?php

Class Control_M extends CI_Model {

	// Insert registration data in database
	public function make_order($data) {
		    print_r($data);
			$this->db->insert('students', $data);
			if ($this->db->affected_rows() > 0) {
				return true;
			}
	}

	public function currentPrice() {

		$this->db->select('*');
		$this->db->from('price');
		$this->db->order_by("id", "desc");
		$this->db->limit(1);
		$query = $this->db->get();

		if ($query->num_rows() == 1) {
			return $query->result_array();
		} else {
			return false;
		}
	}

	// Read data using username and password
	public function login($data) {
		$this->load->helper('control');
		$password=$data['password'];

		$condition = "business_email =" . "'" . $data['business_email']. "'";
		$this->db->select('*');
		$this->db->from('students');
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
		$this->db->from('students');
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
		$this->db->from('uuid_st');
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
		$this->db->update('students', $data);

		if ($this->db->affected_rows() > 0) {
			return true;
		}
	}

	public function confirmPayment($order_id){
		$this->db->where('uuid', $order_id);
		$this->db->update('students', array('status' => 2));

		if ($this->db->affected_rows() > 0) {
			return true;
		}
		else{
			return false;
		}
	}






	public function user_profile_update($data){

	}

}

?>
