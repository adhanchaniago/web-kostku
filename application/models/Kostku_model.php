<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kostku_model extends CI_Model {

	public function __construct()
	{
		# code...
		parent::__construct();
	}	
/////////////////    proses SYS //////////////////
	public function cekusername(){
		$u=$this->input->post('usr');
		$this->db->where('username',$u);
		return $this->db->get('user')->num_rows();
	}

	public function insertuser()
	{

		$object=array('username'=>$this->input->post('usr'),
					  'password'=>$this->input->post('pwd'),
					  'email'=>$this->input->post('email'),
					  'no_hp'=>$this->input->post('nohp'),
					  'level'=>1
		);
		$this->db->insert('user',$object);
	}


	public function login(){
		$this->db->select('id_user,username,password,level');
		$this->db->from('user');
		$this->db->where('username',$this->input->post('usernamee'));
		$this->db->where('password',$this->input->post('paswd'));
		$query=$this->db->get();
		if ($query->num_rows()==1) {
			return $query->result();
		}else{
			return false;
		}
	}


////////////////////////////////////////////////////////////////////

}
