<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class helpmy_model_admin extends CI_Model {


	public function __construct()
	{
		parent::__construct();
	}

	public function deleteUser($id)
	{
		$this->db->where('username', $id);
		$this->db->delete('users');

		$this->db->where('username', $id);
		$this->db->delete('profil');
	}

	public function deleteSoal($id)
	{
		$this->db->where('id_q', $id);
		$this->db->delete('pertanyaan');
	}

	public function deleteJawaban($id)
	{
		$this->db->where('id_a', $id);
		$this->db->delete('jawaban');
	}

	public function delete($id)
	{
		$row = $this->db->where('no',$id)->get('dosen')->row();
		$this->db->where('no', $id);
		$this->db->delete('dosen');
		unlink('./upload/'.$row->foto);
	}

	public function getPertanyaanUser($a){
		$this->db->select('*');
		$this->db->from('pertanyaan');
		$this->db->join('profil', 'pertanyaan.id_user = profil.username');
		$this->db->where('id_user',$a);
		$this->db->order_by('tanggal', 'desc');
		$query = $this->db->get();
		
		return $query->result();
	}

	public function getjawabanjoin($a){
		$this->db->select('j.id_user as id_penjawab,p.id_user as id_penanya ,p.hadiah, j.id_a,j.id_question,j.jawaban,p.pertanyaan,p.kategori,p.id_q,p.tingkatan');
		$this->db->from('jawaban as j');
		$this->db->join('pertanyaan as p', 'j.id_question = p.id_q');
		$this->db->where('id_a',$a);
		$query = $this->db->get();
		
		return $query->result();
	}

	public function updateJawaban($id)
	{

		$object=array(
					  'jawaban'=>$this->input->post('jawaban'),
		);

		$this->db->where('id_a',$id);
		$this->db->update('jawaban',$object);
	}

	public function getmapel($a){

		$this->db->where('id',$a);
		$query=$this->db->get('kategori');
		return $query->result();
	}

	public function update_mapel($status){
		if ($status=="y") {
			$aaaaa=array('kategori'=>$this->input->post('mapel'),
						'priority'=>$this->input->post('Priority'),
					  'icon'=>$this->upload->data('file_name')
					);
		}else{
			$aaaaa=array('kategori'=>$this->input->post('mapel'),
					'priority'=>$this->input->post('Priority'),
					  'icon'=>$this->input->post('fotolama')
					);
		}
					
		$this->db->where('id',$this->input->post('id'));
		$this->db->update('kategori',$aaaaa);
	}

	
	public function new_mapel()
	{
		$object=array('kategori'=>$this->input->post('mapel'),
						'priority'=>$this->input->post('Priority'),
					  'icon'=>$this->upload->data('file_name')
		);
		$this->db->insert('kategori',$object);
	}

}

/* End of file pegawai_model.php */
/* Location: ./application/models/pegawai_model.php */