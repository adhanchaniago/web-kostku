<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Helpmy extends CI_Controller {

	 public function __construct()
	 {
	 	parent::__construct();
	 	 $this->load->model('Helpmy_model');
	 }
 

//////////////////////    called     ///////////////////////////////////////////////////////
	public function index()
	{		
		$data['kategori']=$this->Helpmy_model->getHome();
		$data['more_kategori']=$this->Helpmy_model->getmoremapel();
		$data['cerdas']=$this->Helpmy_model->getusercerdas();
		$data['soal']=$this->Helpmy_model->getsoalhome();

		$this->home_user();
		
		// if ($this->session->userdata('logged_in')) {
		// 	$lvl=$this->session->userdata('logged_in');
		// 	if ($lvl['level']==1) {
		// 		redirect('Admin','refresh');
		// 	}else{
		// 		$this->home_user();
		// 	}
			
		// }else{
		// 	$this->load->view('home',$data);
		// }
		
	}

	public function mapel($a)
	{	
		$data['cerdas']=$this->Helpmy_model->getusercerdas();

		if ($a=="Semua") {
			$data['soal']=$this->Helpmy_model->getsoalhome();
		}else{
			$data['soal']=$this->Helpmy_model->getsoalmapel($a);
		}
		
		if ($this->session->userdata('logged_in')) {
			$data['profil']=$this->Helpmy_model->getprofil();
			$data['user']=$this->Helpmy_model->getuser();
			$data['kategori']=$this->Helpmy_model->getHomeUser();
			$data['mapel']=$this->Helpmy_model->getmapel();
			$this->load->view('user/home',$data);
		}else{
			$data['kategori']=$this->Helpmy_model->getHome();
			$data['more_kategori']=$this->Helpmy_model->getmoremapel();
			$this->load->view('home',$data);
		}
		
	}

	public function daftar()
	{
		$this->load->view('daftar');	
	}

	public function about()
	{
		$this->load->view('user/about');	
	}


	public function lihatprofil()
	{
		$data['profil']=$this->Helpmy_model->getprofil();
		$data['user']=$this->Helpmy_model->getuser();
		$data['alluser']=$this->Helpmy_model->getAllUser();
		$data['tanya']=$this->Helpmy_model->getPertanyaanUser();
		$data['jawab']=$this->Helpmy_model->getJawabanUser();	


		$this->load->view('user/profil',$data);
	}

	public function edit_profil()
	{
		$data['profil']=$this->Helpmy_model->getprofil();
		$data['user']=$this->Helpmy_model->getuser();
		$data['mapel']=$this->Helpmy_model->getmapel();
		$this->load->view('user/profil_edit',$data);
	}

	public function home_user()
	{
		$data['profil']=$this->Helpmy_model->getprofil();
		$data['user']=$this->Helpmy_model->getuser();
		$data['kategori']=$this->Helpmy_model->getHomeUser();
		$data['mapel']=$this->Helpmy_model->getmapel();
		$data['soal']=$this->Helpmy_model->getsoalhome();
		$data['cerdas']=$this->Helpmy_model->getusercerdas();
	
		$soal=$this->Helpmy_model->getsoalhome();

		$this->load->view('user/home',$data);
	}

	public function search()
	{
		
		if ($this->session->userdata('logged_in')) {
			$data['profil']=$this->Helpmy_model->getprofil();
			$data['user']=$this->Helpmy_model->getuser();
			$data['kategori']=$this->Helpmy_model->getHomeUser();
			$data['mapel']=$this->Helpmy_model->getmapel();
			$data['cerdas']=$this->Helpmy_model->getusercerdas();

			$data['soal']=$this->Helpmy_model->getsoalsearch();
			$this->load->view('user/home',$data);
		}else{
			$data['kategori']=$this->Helpmy_model->getHome();
			$data['more_kategori']=$this->Helpmy_model->getmoremapel();
			$data['cerdas']=$this->Helpmy_model->getusercerdas();
			$data['soal']=$this->Helpmy_model->getsoalhome();

			$data['soal']=$this->Helpmy_model->getsoalsearch();
			$this->load->view('home',$data);
		}

	}

	public function detailpertanyaan($id)
	{
		$data['cerdas']=$this->Helpmy_model->getusercerdas();
		$data['profil']=$this->Helpmy_model->getprofil();
		$data['user']=$this->Helpmy_model->getuser();
		$data['pertanyaan']=$this->Helpmy_model->getPertanyaan($id);
		$data['penjawab']=$this->Helpmy_model->getPenjawab($id);
		$data['mapel']=$this->Helpmy_model->getmapel();

		$this->load->view('user/detail_pertanyaan',$data);
	}

	public function deleteComment($id,$a)
	{
		$this->Helpmy_model->delComment($a);
		
		$data['cerdas']=$this->Helpmy_model->getusercerdas();
		$data['profil']=$this->Helpmy_model->getprofil();
		$data['user']=$this->Helpmy_model->getuser();
		$data['pertanyaan']=$this->Helpmy_model->getPertanyaan($id);
		$data['penjawab']=$this->Helpmy_model->getPenjawab($id);


		$this->load->view('user/detail_pertanyaan',$data);
	}


////////////////////////  Process sys   //////////////////////////////////////////////////
	public function login()
	{
		$result=$this->Helpmy_model->login();
		if ($result) {
			$userData = array();
			foreach ($result as $key) {
				$userData = array(
				'username' => $key->username,
		        'level' => $key->level,
		        'id' => $key->id);
			}
			$this->session->set_userdata('logged_in',$userData);
			redirect('Helpmy','refresh');
		}else{
			$data['error']="username atau password tidak valid";
			$this->load->view('daftar',$data);
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('logged_in');
		$this->session->sess_destroy();
		redirect('helpmy','refresh');
	}
/////////////////////////////   CRUD  ////////////////////////////////////////////
	public function mendaftar()
	{
		$usrnm=$this->Helpmy_model->cekusername();
		if ($usrnm===1) {
			$data['error']="username sudah terpakai";
			$this->load->view('daftar',$data);
		}else{
			$this->Helpmy_model->insertuser();
			redirect('helpmy/daftar','refresh');
		}
	}

	public function like()
	{
		$this->Helpmy_model->like();
	}

	public function profil_update()
	{
		$this->form_validation->set_rules('nama','nama kosong','trim|required');

		$fotobaru=$this->input->post('fotobaru');
		$fotolama=$this->input->post('fotolama');


		if($this->form_validation->run()==false){
			$this->load->view('helpmy/profil_update',$data);
		}else{
			$config['upload_path']   = './img/upload'; 
		         $config['allowed_types'] = 'gif|jpg|png'; 
		         $config['max_size']      = 80000; 
		         $config['max_width']     = 4400; 
		         $config['max_height']    = 3320;
		         $config['encrypt_name'] =TRUE; 
		        $this->load->library('upload', $config);

			if(!$this->upload->do_upload('fotobaru')){
					$status="t";
					$this->Helpmy_model->update_profil($status);
					redirect('helpmy/lihatprofil','refresh');

				}else{
					if ($fotolama!="nopic.jpg") {
						unlink('./img/upload/'.$fotolama);
					}					
					$status="y";
					$this->Helpmy_model->update_profil($status);
					redirect('helpmy/lihatprofil','refresh');
				}
		}
	}

	public function ajukanpertanyaan()
	{
		$this->form_validation->set_rules('poin','poin kosong','trim|required');

		if($this->form_validation->run()==false){
			$this->load->view('helpmy/profil_update',$data);
		}else{
			$this->Helpmy_model->newsoal();
			redirect('helpmy','refresh');
		}
	}

	public function newjawaban($id)
	{
		$this->form_validation->set_rules('jawab','nama kosong','trim|required');

		if($this->form_validation->run()==false){		
			$data['cerdas']=$this->Helpmy_model->getusercerdas();
			$data['profil']=$this->Helpmy_model->getprofil();
			$data['user']=$this->Helpmy_model->getuser();
			$data['pertanyaan']=$this->Helpmy_model->getPertanyaan($id);
			$data['penjawab']=$this->Helpmy_model->getPenjawab($id);

			$this->load->view('user/detail_pertanyaan',$data);
		}else{
			$this->Helpmy_model->newjawaban();
			redirect('Helpmy/detailpertanyaan/'.$id,'refresh');
		}
	}

	public function updatePertanyaan($id)
	{
		$this->Helpmy_model->updatesoal($id);
		if ($this->input->post('dari')=="admin") redirect('Admin/soaledit/'.$id,'refresh');
		else redirect('Helpmy/detailpertanyaan/'.$id,'refresh');
	}

	public function Delsoal($a)
	{
		$this->Helpmy_model->deletesoal($a);
		if ($this->input->post('dari')=="admin") redirect('Admin/soallist','refresh');
		else redirect('Helpmy','refresh');
	}

////////////// Get Data AJAX ////////////////////////////////

	public function showPertanyaan()
	{
		$data=$this->Helpmy_model->getPertanyaanUser();
		
        echo json_encode($data);
	}

	public function showMenjawab()
	{
		$data=$this->Helpmy_model->geJawabanDariUser();
		
        echo json_encode($data);
	}

	public function showUser()
	{
		$data=$this->Helpmy_model->getAllUser();
		
        echo json_encode($data);
	}

}
