<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class helpmy_model extends CI_Model {

	public function __construct()
	{
		# code...
		parent::__construct();
	}	
/////////////////    proses SYS //////////////////
	public function cekusername(){
		$u=$this->input->post('username');
		$this->db->where('username',$u);
		return $this->db->get('users')->num_rows();
	}

	public function login(){
		$this->db->select('id,username,pwd,level');
		$this->db->from('users');
		$this->db->where('username',$this->input->post('username'));
		$this->db->where('pwd',$this->input->post('password'));
		$query=$this->db->get();
		if ($query->num_rows()==1) {
			return $query->result();
		}else{
			return false;
		}
	}

/////////////////    inPut Data //////////////////////////////////////////// //////////////////
	public function like()
	{
		$sessData=$this->session->userdata('logged_in');

		$object=array('id_question'=>$this->input->post('id_q'),
						'id_jawaban'=>$this->input->post('id_j'),
					  'id_user'=>$sessData['username']
		);

		$this->db->insert('likejawaban',$object);
	}

	public function insertuser()
	{
		$object=array('username'=>$this->input->post('username'),
					  'nama'=>$this->input->post('nama'),
					  'pwd'=>$this->input->post('pswd'),
					  'email'=>$this->input->post('email'),
					  'pwd'=>$this->input->post('pswd'),
					  'level'=>$this->input->post('level')
		);
		$this->db->insert('users',$object);
		$poin=100;
		$o_profil=array('username'=>$this->input->post('username'),
					  'poin'=>$poin,
					  'foto'=>"nopic.jpg"
		);
		$this->db->insert('profil',$o_profil);
	}

	public function newsoal()
	{
		$sessData=$this->session->userdata('logged_in');

		$object=array('id_user'=>$sessData['username'],
					  'pertanyaan'=>$this->input->post('soal'),
					  'kategori'=>$this->input->post('mapel'),
					  'hadiah'=>$this->input->post('poin'),
					  'tingkatan'=>$this->input->post('tingkatan')
		);

		$this->db->insert('pertanyaan',$object);

		$poin=$this->input->post('poinawal')-$this->input->post('poin');
		$o_profil=array(
					  'poin'=>$poin
		);

		$this->db->where('username',$sessData['username']);
		$this->db->update('profil',$o_profil);
	}

	public function updatesoal($id)
	{

		$object=array(
					  'pertanyaan'=>$this->input->post('soal'),
					  'kategori'=>$this->input->post('mapel'),
					  'hadiah'=>$this->input->post('poin'),
					  'tingkatan'=>$this->input->post('tingkatan')
		);

		$this->db->where('id_q',$id);
		$this->db->update('pertanyaan',$object);
	}

	public function deletesoal($idd){

		$this->db->where('id_q',$idd);
		$this->db->delete('pertanyaan');
	}

	public function newjawaban()
	{
		$sessData=$this->session->userdata('logged_in');

		$object=array(
						'id_question'=>$this->input->post('id_q'),
						'id_user'=>$sessData['username'],
						'jawaban'=>$this->input->post('jawab')					  
		);
		$this->db->insert('jawaban',$object);

		$poin=$this->input->post('poin')+($this->input->post('hadiah')/2);
		$o_profil=array(
					  'poin'=>$poin
		);

		$this->db->where('username',$sessData['username']);
		$this->db->update('profil',$o_profil);
	}

	public function delComment($a)
	{

		$this->db->where('id_a',$a);
		$this->db->delete('jawaban');
	}

/////////////////    Update Data //////////////////////////////////////////// //
	public function update_profil($status){
		if ($status=="y") {
			$o_profil=array('note'=>$this->input->post('note'),
					  'pendidikan'=>$this->input->post('pendidikan'),
					  'passion_1'=>$this->input->post('passion_1'),
					  'passion_2'=>$this->input->post('passion_2'),
					  'foto'=>$this->upload->data('file_name')
					);
			$user=array('nama'=>$this->input->post('nama'),
					  'email'=>$this->input->post('email')
					);
		}else{
			$o_profil=array('note'=>$this->input->post('note'),
					  'pendidikan'=>$this->input->post('pendidikan'),
					  'passion_1'=>$this->input->post('passion_1'),
					  'passion_2'=>$this->input->post('passion_2'),
					  'foto'=>$this->input->post('fotolama')
					);
			$user=array('nama'=>$this->input->post('nama'),
					  'email'=>$this->input->post('email')
					);
		}

		$sessData=$this->session->userdata('logged_in');
					
		$this->db->where('username',$sessData['username']);
		$this->db->update('profil',$o_profil);

		$this->db->where('username',$sessData['username']);
		$this->db->update('users',$user);	
	}

////////////////////////   Get Data    ////////////////////////////

	public function getprofil(){
		$sessData=$this->session->userdata('logged_in');
		$this->db->where('username',$sessData['username']);
		$query=$this->db->get('profil');
		return $query->result();
	}

	public function getuser(){
		$sessData=$this->session->userdata('logged_in');
		$this->db->where('username',$sessData['username']);
		$query=$this->db->get('users');
		return $query->result();
	}

	public function getAllUser(){
		$query=$this->db->get('profil');
		return $query->result();
	}

	public function getCurrentUser($a)
	{
		$this->db->select('*');
		$this->db->from('users');
		$this->db->join('profil', 'users.username = profil.username');
		$this->db->where('id',$a);

		$query = $this->db->get();
		
		return $query->result();
	}

	public function getIconUser($usr){
        $hasil=$this->db->query("SELECT * FROM profil where username='$usr'");
        return $hasil->result();
    }

    public function getUsermenjawab($usr){
    	$this->db->where('id_question',$usr);
        $query=$this->db->count_all_result('jawaban');
        return $query->result();
    }

	public function getPertanyaanUser(){
		$sessData=$this->session->userdata('logged_in');
		
		$this->db->select('*');
		$this->db->from('pertanyaan');
		$this->db->join('profil', 'pertanyaan.id_user = profil.username');
		$this->db->where('id_user',$sessData['username']);
		$this->db->order_by('tanggal', 'desc');
		$query = $this->db->get();

		// $query=$this->db->get('pertanyaan');
		
		return $query->result();
	}

	public function geJawabanDariUser(){
		$sessData=$this->session->userdata('logged_in');
		
		$this->db->select('j.jawaban,j.id_a as id_jwbn ,j.id_question,j.id_user as id_pnjwb,
							p.pertanyaan,p.kategori,j.tanggal,p.id_user as id_penanya,
							
						');
		$this->db->from('jawaban as j');
		$this->db->join('pertanyaan as p', 'p.id_q = j.id_question');
		 // $this->db->join('profil as prf', 'prf.username = j.id_user');
		$this->db->where('j.id_user',$sessData['username']);
		$this->db->order_by('j.tanggal', 'desc');
		$query = $this->db->get();

		// $query=$this->db->get('pertanyaan');
		
		return $query->result();
	}

	public function getJawabanUser(){
		$sessData=$this->session->userdata('logged_in');
		$u=$sessData["username"];
		$query=$this->db->query("SELECT * FROM jawaban where id_user='$u' order by tanggal desc ");
		return $query->result();
	}

	public function getHome()
	{
		$query=$this->db->query("SELECT * FROM kategori order by priority limit 6");
		return $query->result();
	}

	public function getHomeUser()
	{
		$query=$this->db->query("SELECT * FROM kategori order by priority limit 15");
		return $query->result();
	}

	public function getmoremapel()
	{
		$query=$this->db->query("SELECT * FROM kategori where priority>6 order by priority");
		return $query->result();
	}

	public function getmapel()
	{
		$query=$this->db->query("SELECT * FROM kategori");
		return $query->result();
	}

	public function getusercerdas()
	{
		$query=$this->db->query("SELECT * FROM profil as pro join users as usr on pro.username= usr.username where usr.level='2' order by poin desc limit 6");
		return $query->result();
	}

	public function getsoalhome()
	{
		$query=$this->db->query("SELECT * FROM pertanyaan order by tanggal desc limit 6");
		return $query->result();
	}

	public function getsoalsearch()
	{
		$a=$this->input->post('srch');
		$query=$this->db->query("SELECT * FROM pertanyaan where pertanyaan like '%$a%' order by tanggal desc");
		return $query->result();
	}

	public function getsoalmapel($mapel)
	{
		$query=$this->db->query("SELECT * FROM pertanyaan where kategori='$mapel' order by tanggal desc limit 6");
		return $query->result();
	}

	public function getPertanyaan($id)
	{
		$query=$this->db->query("SELECT * FROM pertanyaan where id_q='$id'");
		return $query->result();
	}

	public function getPenjawab($id)
	{
		$query=$this->db->query("SELECT * FROM jawaban where id_question='$id'");
		return $query->result();
	}

	public function cekjawaban($id)
	{
		$sessData=$this->session->userdata('logged_in');
		
		$this->db->select('*');
		$this->db->from('jawaban');
		$this->db->where('id_question',$id);
		$this->db->where('id_user',$sessData['username']);
		$query = $this->db->get();
		
		return $query->result();
	}
////////////////////////////////////////////////////////////////////

}
