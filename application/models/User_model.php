<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	public function getKost($id_user)
	{
		$this->db->where('id_pemilik', $id_user);
		$query=$this->db->get('kost');
       	return $query->result();
	}	

	public function save_kost($alamat,$Kelamin,$deskripsi,$foto_kost,$id_pemilik){
        $data = array(
                'alamat'  => $alamat, 
                'kota'  => "Malang", 
                'propinsi' => "Jawa Timur", 
                'Kelamin' => $Kelamin,
                'deskripsi' => $deskripsi,
                'jumlah_kamar' => 0,
                'foto_kost' => $foto_kost,
                'id_pemilik' => $id_pemilik
            );
        $result=$this->db->insert('kost',$data);
        return $result;
    }

    public function edit_kost($id_kost,$alamat,$Kelamin,$deskripsi,$foto_kost){
        $data = array(
                'alamat'  => $alamat,
                'Kelamin' => $Kelamin,
                'deskripsi' => $deskripsi,
                'foto_kost' => $foto_kost
            );
        $this->db->where('id_kost', $id_kost);
        $result=$this->db->update('kost',$data);
        return $result;
    }

    public function delete_kost($id_kost)
	{
		$this->db->where('id_kost', $id_kost);
		$result = $this->db->delete('kost');
		return $result;
	}

}

/* End of file user_model.php */
/* Location: ./application/models/user_model.php */