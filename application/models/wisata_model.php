<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class wisata_model extends CI_Model {

	public $table = 'user';

	public function __construct()
	{
		# code...
		parent::__construct();
	}

	public function insertuser()
	{
		$object=array('username'=>$this->input->post('username'),
					  'nama'=>$this->input->post('nama'),
					  'email'=>$this->input->post('email'),
					  'nohp'=>$this->input->post('nohp'),
					  'pwd'=>$this->input->post('pswd'),
					  'level'=>$this->input->post('level'),
		);
		$this->db->insert('user',$object);
	}

	public function insertWisata()
	{
		$sessData=$this->session->userdata('logged_in');

		$object=array('nama'=>$this->input->post('nama'),
					  'tempat'=>$this->input->post('tempat'),
					  'provinsi'=>$this->input->post('provinsi'),
					  'keterangan'=>$this->input->post('keterangan'),
					  'image_source' => $this->upload->data('file_name'),
					  'author'=> $sessData['username']
		);
		$this->db->insert('data_wisata',$object);
	}

	public function updateWisata($idup,$status)
	{
		$sessData=$this->session->userdata('logged_in');

		if ($status=="y") {
			$object=array('nama'=>$this->input->post('nama'),
					  'tempat'=>$this->input->post('tempat'),
					  'provinsi'=>$this->input->post('provinsi'),
					  'keterangan'=>$this->input->post('keterangan'),
					  'image_source' => $this->upload->data('file_name'),
					  'author'=> $sessData['username']
			);
		}else{
			$object=array('nama'=>$this->input->post('nama'),
					  'tempat'=>$this->input->post('tempat'),
					  'provinsi'=>$this->input->post('provinsi'),
					  'keterangan'=>$this->input->post('keterangan'),
					  'image_source' => $this->input->post('fotolama'),
					  'author'=> $sessData['username']
			);
		}
		
		$this->db->where('id',$idup);
		$this->db->update('data_wisata',$object);
	}
	
	public function totalRecords()
	{
		return $this->db->get('data_wisata')->num_rows();
	}

	public function getWisataObject($jumlah,$offset)
	{
		$query=$this->db->get('data_wisata',$jumlah,$offset);
		return $query->result();
	}

	public function getWisataTop7()
	{
		$query=$this->db->query("SELECT * FROM data_wisata order by tanggal Desc limit 7");
		return $query->result();
	}

	public function getWisataHome()
	{
		$query=$this->db->query("SELECT * FROM data_wisata order by tanggal Desc limit 8");
		return $query->result();

	}
	
	public function getWisataById($idd)
	{
		$this->db->where('id',$idd);
		$query=$this->db->get('data_wisata');
		return $query->result();
	}


	public function DeleteById($idd){
		$row = $this->db->where('id',$idd)->get('data_wisata')->row();
		$this->db->where('id',$idd);
		$this->db->delete('data_wisata');
		unlink('./img/upload/'.$row->image_source);
	}

	public function cekusername(){
		$u=$this->input->post('username');
		$this->db->where('username',$u);
		return $this->db->get('user')->num_rows();
	}

	public function login(){
		$this->db->select('id,username,pwd,level');
		$this->db->from('user');
		$this->db->where('username',$this->input->post('username'));
		$this->db->where('pwd',$this->input->post('password'));
		$query=$this->db->get();
		if ($query->num_rows()==1) {
			return $query->result();
		}else{
			return false;
		}
	}

}
