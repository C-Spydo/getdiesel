<?php

Class Teacher extends CI_Model {

	// Insert registration data in database
	public function registration($data) {

		$checker=0;
		// Query to check whether username already exist or not
		$condition = "username =" . "'" . $data['username'] . "'";
		$this->db->select('*');
		$this->db->from('user_login');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() != 0) {
			$checker=1;
			return $checker;

		}



		if ($checker==0){
			// 	Query to insert data in database
			$this->db->insert('user_login', $data);
			if ($this->db->affected_rows() > 0) {
				return true;
			}
		}





	}

	public function wallet_insert($data) {
		// 	Query to insert data in database
		$this->db->insert('wallets', $data);
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

	public function idchecker($data){
		// Query to check whether username already exist or not
		$condition = "user_id =" . "'" . $data . "'";
		$this->db->select('*');
		$this->db->from('user_login');
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

	public function walletidchecker($data){
		$condition = "wallet_id =" . "'" . $data . "'";
		$this->db->select('*');
		$this->db->from('wallets');
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



	// Read data using username and password
	public function login($data) {
		$this->load->helper('pwd_hash');
		$password=$data['password'];

		$condition = "username =" . "'" . $data['username']. "'";
		$this->db->select('*');
		$this->db->from('user_login');
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
				return false;
			}

		} else {
			return false;
		}

	}

	// Read data from database to show data in admin page
	public function read_user_information($username) {

		$condition = "username =" . "'" . $username . "'";
		$this->db->select('*');
		$this->db->from('user_login');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();

		if ($query->num_rows() == 1) {
			return $query->result();
		} else {
			return false;
		}
	}

	public function user_profile_update($data){

	}

}

?>
