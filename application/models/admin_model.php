<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin_model extends CI_Model {

	public function get_user()
	{
		$query=$this->db->get('user');
       	return $query->result();
	}	

    public function get_fasilitas()
    {
        $query=$this->db->get('daftar_fasilitas');
        return $query->result();
    }   

    public function update_User(){
        $data = array(
                'username'  => $this->input->post('uname'),
                'password' => $this->input->post('password'),
                'email' => $this->input->post('email'),
                'no_hp' => $this->input->post('nohp'),
                'level' => $this->input->post('level'),
                'is_activated' =>$this->input->post('status')
            );
        $this->db->where('id_user', $this->input->post('id_user'));
        $result=$this->db->update('user',$data);
        return $result;
    }

    public function deleted_User($id_user)
	{
		$this->db->where('id_user', $id_user);
		$result = $this->db->delete('user');
		return $result;
	}

    public function new_fasilitas($kategori,$nama_fasilitas,$icon){
        $data = array(
                'kategori'  => $kategori, 
                'nama_fasilitas' => $nama_fasilitas, 
                'icon' => $icon
            );
        $result=$this->db->insert('daftar_fasilitas',$data);
        return $result;
    }
    

}

/* End of file user_model.php */
/* Location: ./application/models/user_model.php */