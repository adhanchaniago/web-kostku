<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
		$this->load->helper('url','form');
		$this->load->library('form_validation');
		if ($this->session->userdata('kostku_logged_in')) {
			$session_data = $this->session->userdata('kostku_logged_in');
			$data['level'] = $session_data['level'];
			if ($data['level'] != 1) {
				redirect('kostku','refresh');
			}
		}else {
			redirect('kostku','refresh');
		}
	}

	public function index()
	{
		$this->home();
	}

	public function kamar($id_kost)
	{
		$this->load->view('pemilik/kamar');
	}

	public function home()
	{
		$this->load->view('pemilik/home');
	}

	public function getKost()
	{
		$session_data = $this->session->userdata('kostku_logged_in');
		$data['id_user'] = $session_data['id_user'];
		$data=$this->user_model->getKost($data['id_user']);
        echo json_encode($data);
	}

	public function upload_kost()
	{
		$session_data = $this->session->userdata('kostku_logged_in');
		$config['upload_path']="./assets/img_kost"; //path folder file upload
		$config['allowed_types']='gif|jpg|png'; //type file yang boleh di upload

		$this->load->library('upload', $config); //call library upload
		if ($this->upload->do_upload("file")){ //upload file
			$data = array('upload_data' => $this->upload->data()); //ambil file name yang diupload

			$nama = $this->input->post('nama'); //get nama
			$alamat = $this->input->post('alamat'); //get alamat
			$Kelamin = $this->input->post('Kelamin'); //get Kelamin
			$deskripsi = $this->input->post('deskripsi'); //get deskripsi
			$foto_kost = $data['upload_data']['file_name']; //set file name ke variable image
			$id_user = $session_data['id_user'];

			$this->user_model->save_kost($nama,$alamat,$Kelamin,$deskripsi,$foto_kost,$id_user); //kirim value ke model user_model	
		}
	}

	public function edit_kost()
	{
		$id_kost = $this->input->post('id_kost_edit'); //get id_kost
		$nama = $this->input->post('nama_edit'); //get nama
		$alamat = $this->input->post('alamat_edit'); //get alamat
		$Kelamin = $this->input->post('Kelamin_edit'); //get Kelamin
		$deskripsi = $this->input->post('deskripsi_edit'); //get deskripsi
		$foto_kost = $data['upload_data']['file_name']; //set file name ke variable image
		$hapus = $this->input->post('lfoto'); //get lcover

		$config['upload_path']="./assets/img_kost"; //path folder file upload
		$config['allowed_types']='gif|jpg|png'; //type file yang boleh di upload

		$this->load->library('upload', $config); //call library upload
		if ($this->upload->do_upload("file")){ //upload file
			$data = array('upload_data' => $this->upload->data()); //ambil file name yang diupload

			$image = $data['upload_data']['file_name']; //set file name ke variable image

			$this->user_model->edit_kost($id_kost,$nama,$alamat,$Kelamin,$deskripsi,$foto_kost);
			unlink('./assets/img_kost/'.$hapus);
		}
		else {
			$this->user_model->edit_kost($id_kost,$nama,$alamat,$Kelamin,$deskripsi,$hapus);
		}
	}

	public function coba()
	{
		$id_kost = 2; //get id_kost
		$alamat = 'aaaa'; //get alamat
		$Kelamin = 'Putra'; //get Kelamin
		$deskripsi = 'ssss'; //get deskripsi
		$foto_kost = 'a.jpg'; //set file name ke variable image
			$this->user_model->edit_kost($id_kost,$alamat,$Kelamin,$deskripsi,$foto_kost);
	}

	public function delete_kost()
	{
		$id_kost = $this->input->post('id_kost');
		$data = $this->user_model->delete_kost($id_kost);
		echo json_encode($data);
	}

	function delete_files($dir) { 
		foreach(glob($dir . '/*') as $file) { 
			if(is_dir($file)){
				$this->delete_files($file);	
			}  else{
				unlink($file); 	
			} 
		} rmdir($dir); 
	}

	public function getKamar()
	{
		$id_kost = $this->input->post('id_kost');
		$data=$this->user_model->getKamar($id_kost);
        echo json_encode($data);
	}

	public function upload_kamar()
	{
		$config['upload_path']="./assets/img_kamar"; //path folder file upload
		$config['allowed_types']='gif|jpg|png'; //type file yang boleh di upload

		$this->load->library('upload', $config); //call library upload
		if ($this->upload->do_upload("file")){ //upload file
			$data = array('upload_data' => $this->upload->data()); //ambil file name yang diupload

			$ukuran = $this->input->post('ukuran'); //get ukuran
			$foto_kamar = $data['upload_data']['file_name']; //set file name ke variable image
			$harga = $this->input->post('harga'); //get harga
			$id_kost = $this->input->post('id_k'); //get id_kost

			$this->user_model->save_kamar($ukuran,$foto_kamar,$harga,$id_kost); //kirim value ke model user_model	
		}
	}

	public function edit_kamar()
	{
		$id_kamar = $this->input->post('id_kamar_edit'); //get id_kamar
		$ukuran = $this->input->post('ukuran_edit'); //get ukuran
		$foto_kamar = $data['upload_data']['file_name']; //set file name ke variable image
		$harga = $this->input->post('harga_edit'); //get harga
		$hapus = $this->input->post('lfoto'); //get lcover

		$config['upload_path']="./assets/img_kamar"; //path folder file upload
		$config['allowed_types']='gif|jpg|png'; //type file yang boleh di upload

		$this->load->library('upload', $config); //call library upload
		if ($this->upload->do_upload("file")){ //upload file
			$data = array('upload_data' => $this->upload->data()); //ambil file name yang diupload

			$image = $data['upload_data']['file_name']; //set file name ke variable image

			$this->user_model->edit_kamar($id_kamar,$ukuran,$harga,$foto_kamar);
			unlink('./assets/img_kamar/'.$hapus);
		}
		else {
			$this->user_model->edit_kamar($id_kamar,$ukuran,$harga,$hapus);
		}
	}

	public function delete_kamar()
	{
		$id_kamar = $this->input->post('id_kamar');
		$data = $this->user_model->delete_kamar($id_kamar);
		echo json_encode($data);
	}

	public function sewakan()
	{
		$id_kamar = $this->input->post('id_kamar');
		$data = $this->user_model->sewakan($id_kamar);
		echo json_encode($data);
	}

	public function kosongkan()
	{
		$id_kamar = $this->input->post('id_kamar');
		$data = $this->user_model->kosongkan($id_kamar);
		echo json_encode($data);
	}

}

/* End of file User.php */
/* Location: ./application/controllers/User.php */