<?php

Class Client_M extends CI_Model {

	public function registration($data) {

		$checker=0;
		// Query to check whether username already exist or not
		$condition = "email =" . "'" . $data['email'] . "'";
		$this->db->select('*');
		$this->db->from('pupils');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() != 0) {
			$checker=1;
			return $checker;

		}

		if ($checker==0){
			// 	Query to insert data in database
			$this->db->insert('pupils', $data);
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
		$this->db->from('pupils');
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
	public function read_user_information($email) {

		$condition = "email =" . "'" . $email . "'";
		$this->db->select('*');
		$this->db->from('pupils');
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
		$this->db->from('uuid_pu');
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
		$this->db->insert('uuid_pu', $data);
		if ($this->db->affected_rows() > 0) {
			return true;
		}
	}




	public function update_profile($data){

		$u_id = $data['uuid'];
		$this->db->where('uuid',$u_id);
		$this->db->update('pupils', $data);

		if ($this->db->affected_rows() > 0) {
			return true;
		}

	}

	public function user_profile_update($data){

	}

	public function countOrders($u_id) {

		$this->db->select('*');
		$this->db->from('students');
		$this->db->where('user',$u_id);
		$query = $this->db->get();

		return $query->num_rows() ;

	}

	public function getDelivered($u_id) {

		$this->db->select_sum('quantity');
		$this->db->where('user',$u_id);
		$this->db->where('status',5);
		$query = $this->db->get('students')->row();
		return $query->quantity;

	}

	public function getPending($u_id) {

		$this->db->select_sum('quantity');
		$this->db->where('user',$u_id);
		$this->db->where('status',1);
		$query = $this->db->get('students')->row();
		return $query->quantity;

	}

	public function getLitres($u_id) {

		$this->db->select_sum('quantity');
		$this->db->where('user',$u_id);
		$query = $this->db->get('students')->row();
		return $query->quantity;

	}

	public function getClientOrders($uuid) {
		$this->db->select('*');
		$this->db->from('students');
		$this->db->where('user',$uuid);
		$this->db->order_by("uuid", "desc");
		$query = $this->db->get();

		$q=array();
		if ($query->num_rows() >0) {
			$q=$query->result_array();
		}
		return $q;

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

}

?>
