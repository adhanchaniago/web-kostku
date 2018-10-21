<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

	public function login($username,$password)
	{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('username', $username);
		$this->db->where('password', md5($password));
		$query = $this->db->get();
		if ($query->num_rows()==1) {
			return $query->result();
		}else{
			return false;
		}
	}

	public function check_user($username)
	{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('username', $username);
		$query = $this->db->get();
		if ($query->num_rows()==1) {
			return $query->result();
		}else{
			return false;
		}
	}

	public function create_user($username, $email, $password, $no_hp) {
		
		$data = array(
			'username'   => $username,
			'email'   => $email,
			//'password'   => $this->hash_password($password),
			'password'   => $password,
			'no_hp'   => $no_hp,
			'level'   => 1,
			'is_activated'   => 0
		);
		
		return $this->db->insert('user', $data);
		
	}

	public function create_admin($username, $email, $password, $no_hp) {
		
		$data = array(
			'username'   => $username,
			'email'   => $email,
			//'password'   => $this->hash_password($password),
			'password'   => $password,
			'no_hp'   => $no_hp,
			'level'   => 2,
			'is_activated'   => 1
		);
		
		return $this->db->insert('user', $data);
		
	}

/* End of file login_model.php */
/* Location: ./application/models/login_model.php */	

}

/* End of file login_model.php */
/* Location: ./application/models/login_model.php */