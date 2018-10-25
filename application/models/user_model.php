<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	public function getKost($id_user)
	{
		$this->db->where('id_pemilik', $id_user);
		$query=$this->db->get('kost');
       	return $query->result();
	}	

	public function save_kost($nama,$alamat,$Kelamin,$deskripsi,$foto_kost,$id_pemilik){
        $data = array(
                'nama'  => $nama,
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

    public function edit_kost($id_kost,$nama,$alamat,$Kelamin,$deskripsi,$foto_kost){
        $data = array(
                'nama'  => $nama,
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

    public function getKamar($id_kost)
    {
        $this->db->where('id_kost', $id_kost);
        $query=$this->db->get('kamar');
        return $query->result();
    }

    public function save_kamar($ukuran,$foto_kamar,$harga,$id_kost){
        $data = array(
                'ukuran'  => $ukuran,
                'foto_kamar'  => $foto_kamar, 
                'harga' => $harga,
                'is_rented' => 0,
                'id_kost' => $id_kost
            );
        $result=$this->db->insert('kamar',$data);
        return $result;
    }

    public function edit_kamar($id_kamar,$ukuran,$harga,$foto_kamar){
        $data = array(
                'ukuran'  => $ukuran,
                'foto_kamar'  => $foto_kamar,
                'harga' => $harga
            );
        $this->db->where('id_kamar', $id_kamar);
        $result=$this->db->update('kamar',$data);
        return $result;
    }

    public function delete_kamar($id_kamar)
    {
        $this->db->where('id_kamar', $id_kamar);
        $result = $this->db->delete('kamar');
        return $result;
    }

    public function sewakan($id_kamar)
    {
        $data = array(
                'is_rented' => 1
            );
        $this->db->where('id_kamar', $id_kamar);
        $result=$this->db->update('kamar',$data);
        return $result;
    }

    public function kosongkan($id_kamar)
    {
        $data = array(
                'is_rented' => 0
            );
        $this->db->where('id_kamar', $id_kamar);
        $result=$this->db->update('kamar',$data);
        return $result;
    }

}

/* End of file user_model.php */
/* Location: ./application/models/user_model.php */