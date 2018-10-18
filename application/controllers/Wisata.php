<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wisata extends CI_Controller {

	public function index()
	{
		$this->load->model('wisata_model');
		$data['wisata_builder_object']=$this->wisata_model->getWisataHome();
		$this->load->view('wisata',$data);
	}

	public function tambahWisata()
	{
		if ($this->session->userdata('logged_in')) {
			$sessData=$this->session->userdata('logged_in');
			$data['username']=$sessData['username'];

			$this->load->view('tambah_wisata',$data);
		}else{
			$data['error']="silahkan login terlebih dahulu";
			$this->load->view('daftar',$data);
		}
	}

	public function daftar()
	{
		$this->load->view('daftar');	
	}

	public function list_wisata()
	{
		$this->load->model('wisata_model');

		$total = $this->wisata_model->totalRecords();

		 $config['base_url'] = base_url().'index.php/wisata/list_wisata/';
		 $config['total_rows'] = $total;
		 $config['per_page'] = 8;
		 $from = $this->uri->segment(3);
		 $config['use_page_numbers'] = TRUE;
		 $this->pagination->initialize($config);

		$data['wisata_builder_object']=$this->wisata_model->getWisataObject($config['per_page'],$from);
		$this->load->view('list_wisata',$data);
	}

	public function detailWisata($idd)
	{
		$this->load->model('wisata_model');
		$data['wisata']=$this->wisata_model->getWisataById($idd);
		$data['wisata_builder_object']=$this->wisata_model->getWisataTop7();
		$this->load->view('detail_wisata_view',$data);
	}


	public function create()
	{
		$this->load->model('wisata_model');
		$this->form_validation->set_rules('nama','Nama','trim|required');
		$this->form_validation->set_rules('tempat','Tempat','trim|required');
		$this->form_validation->set_rules('provinsi','Provinsi','trim|required');
		$this->form_validation->set_rules('keterangan','Keterangan','trim|required');

		if ($this->form_validation->run()==false) {
			$this->load->view('tambah_wisata');
		}else{
			 $config['upload_path']   = './img/upload'; 
	         $config['allowed_types'] = 'gif|jpg|png'; 
	         $config['max_size']      = 80000; 
	         $config['max_width']     = 4400; 
	         $config['max_height']    = 3320;  
	        $this->load->library('upload', $config);
			
			if(!$this->upload->do_upload('img_file')){
				$error = array('error' => $this->upload->display_errors() );
				$this->load->view('tambah_wisata',$error);

			}else{
				$this->wisata_model->insertWisata();
				$this->load->view('tambah_wisata_sukses');
			}
		}
	}
	
	public function update($idd)
	{
		$this->load->model('wisata_model');
		$data['wisata']=$this->wisata_model->getWisataById($idd);
		$fotobaru=$this->input->post('img_file');
		$fotolama=$this->input->post('fotolama');

		$this->form_validation->set_rules('nama','Nama','trim|required');
		$this->form_validation->set_rules('tempat','Tempat','trim|required');
		$this->form_validation->set_rules('provinsi','Provinsi','trim|required');
		$this->form_validation->set_rules('keterangan','Keterangan','trim|required');

		if ($this->form_validation->run()==false) {
			$this->load->view('edit_wisata_view',$data);
		}else{
			$config['upload_path']   = './img/upload'; 
		         $config['allowed_types'] = 'gif|jpg|png'; 
		         $config['max_size']      = 80000; 
		         $config['max_width']     = 4400; 
		         $config['max_height']    = 3320;  
		        $this->load->library('upload', $config);	
				
				if(!$this->upload->do_upload('img_file')){
					$status="t";
					$this->wisata_model->updateWisata($idd,$status);
					redirect('wisata/list_wisata','refresh');

				}else{
					unlink('./img/upload/'.$fotolama);
					$status="y";
					$this->wisata_model->updateWisata($idd,$status);
					redirect('wisata/list_wisata','refresh');
				}
				
			}			
	}
	
	public function mendaftar()
	{
		$this->load->model('wisata_model');
		$usrnm=$this->wisata_model->cekusername();
		if ($usrnm===1) {
			$data['error']="username sudah ada";
			$this->load->view('daftar',$data);
		}else{
			$this->wisata_model->insertuser();
			redirect('wisata/daftar','refresh');
		}
	}

	public function delete($id)
	{
		$this->load->model('wisata_model');
		$this->wisata_model->DeleteById($id);
		redirect('wisata/list_wisata','refresh');
	}

	public function ceklogin()
	{
		//Jika tidak ada session (username) maka alihkan ke controller login
	    if (!$this->session->userdata('username')) {
	      redirect('authentication/auth/login');
	    }
	}

	public function login()
	{
		$this->load->model('wisata_model');	
		$result=$this->wisata_model->login();
		if ($result) {
			$userData = array();
			foreach ($result as $key) {
				$userData = array(
				'username' => $key->username,
		        'level' => $key->level,
		        'id' => $key->id);
			}
			$this->session->set_userdata('logged_in',$userData);
			$this->index();
		}else{
			$data['error']="username atau password tidak valid";
			$this->load->view('daftar',$data);
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('logged_in');
		$this->session->sess_destroy();
		redirect('wisata','refresh');
	}

	public function lihatprofil()
	{
		$this->load->view('user/profil');
	}
}
