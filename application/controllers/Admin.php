 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	 public function __construct()
	 {
	 	parent::__construct();
	 	$this->load->model('helpmy_model_admin');
	 }
 
	public function index()
	{
		$data['act']="pertanyaan";
		$this->load->view('admin/soal_list',$data);
	}

	public function userlist()
	{
		$data['act']="user";
		$this->load->view('admin/user_list',$data);
	}

	public function detailUser($a)
	{
		$this->load->model('Helpmy_model');
		$data['profil']=$this->Helpmy_model->getCurrentUser($a);

		$data['act']="user";
		$this->load->view('admin/edit_user',$data);
	}

	public function jawabanDetail($a)
	{
		$this->load->model('Helpmy_model');
		$data['profil']=$this->Helpmy_model->getCurrentUser($a);

		$data['act']="user";
		$this->load->view('admin/edit_user',$data);
	}

	public function soallist()
	{
		$this->load->model('Helpmy_model');

		$data['act']="pertanyaan";
		$this->load->view('admin/soal_list',$data);
	}

	public function soaledit($a)
	{
		$this->load->model('Helpmy_model');

		$data['pertanyaan']=$this->Helpmy_model->getPertanyaan($a);
		$data['act']="pertanyaan";
		$this->load->view('admin/edit_soal',$data);
	}

	public function mapellist()
	{
		$data['act']="mapel";
		$this->load->view('admin/mapel_list',$data);
	}

	public function jawablist()
	{
		$data['act']="jawaban";
		$this->load->view('admin/jawab_list',$data);
	}

	public function lihatJawaban($a)
	{
		$this->load->model('Helpmy_model');

		$data['act']="jawaban";
		$data['jwbn']=$this->helpmy_model_admin->getjawabanjoin($a);

		//echo json_encode($this->helpmy_model_admin->getjawabanjoin($a));

		$this->load->view('admin/edit_jawaban',$data);
	}

	public function lihatMapel($a)
	{
		$data['act']="mapel";
		$data['mapel']=$this->helpmy_model_admin->getmapel($a);

		$this->load->view('admin/edit_mapel',$data);
	}

	public function data_server_pertanyaan()
	{
		$this->load->library('Datatables');
		$this->datatables->select('id_q,id_user,pertanyaan,kategori,hadiah,tingkatan,tanggal')->from('pertanyaan');
		echo $this->datatables->generate();
	}

	public function data_server_user()
	{
		$this->load->library('Datatables');
		$this->datatables->select('id,username,nama,pwd,email,level,tanggal')->from('users');
		echo $this->datatables->generate();
	}

	public function data_server_mapel()
	{
		$this->load->library('Datatables');
		$this->datatables->select('id,kategori,icon,priority')->from('kategori');
		echo $this->datatables->generate();
	}

	public function data_server_jawaban()
	{
		$this->load->library('Datatables');
		$this->datatables->select('id_a,id_question,id_user,jawaban,tanggal')->from('jawaban');
		echo $this->datatables->generate();
	}

	public function DelUser($a)
	{
		$this->helpmy_model_admin->deleteUser($a);

		redirect('Admin/userlist','refresh');
	}

	public function DelSoal($a)
	{
		$this->helpmy_model_admin->deleteSoal($a);

		redirect('Admin/soallist','refresh');
	}

	public function DelJawaban($a)
	{
		$this->helpmy_model_admin->deleteJawaban($a);

		redirect('Admin/jawablist','refresh');
	}

// NeWWWWWWWWWWWWWWWW NNNNNNNNNNEEEEEEEEEEWWWWWWWWWWWWWWWWWWWWWWW
	public function PertanyaanBaru()
	{
		$data['act']="pertanyaan";
		$this->load->model('Helpmy_model');
		$this->form_validation->set_rules('poin','poin kosong','trim|required');

		if($this->form_validation->run()==false){
			$this->load->view('Admin/soallist',$data);
		}else{
			$this->Helpmy_model->newsoal();
			redirect('Admin/soallist','refresh');
		}
	}

	public function mendaftarUser()
	{
		$data['act']="user";
		$this->load->model('Helpmy_model');
		$usrnm=$this->Helpmy_model->cekusername();
		if ($usrnm===1) {
			$data['error']="username sudah terpakai";
			$this->load->view('admin/user_list',$data);
		}else{
			$this->Helpmy_model->insertuser();
			redirect('Admin/userlist','refresh');
		}
	}

	public function mapel_add()
	{
			$config['upload_path']   = './img/mapel'; 
		         $config['allowed_types'] = 'gif|jpg|png'; 
		         $config['max_size']      = 80000; 
		         $config['max_width']     = 4400; 
		         $config['max_height']    = 3320;  
		        $this->load->library('upload', $config);

			if($this->upload->do_upload('fotobaru')){
					$this->helpmy_model_admin->new_mapel();
					redirect('Admin/mapellist','refresh');
				}
		
	}

// ======= UUUUPPPPDDDDDAAAATTTTTEEEEEE     ========================

	public function updateJawaban($id)
	{
		$this->helpmy_model_admin->updatejawaban($id);

		redirect('Admin/lihatJawaban/'.$id,'refresh');
	}

	public function mapel_update()
	{
			$config['upload_path']   = './img/mapel'; 
		         $config['allowed_types'] = 'gif|jpg|png'; 
		         $config['max_size']      = 80000; 
		         $config['max_width']     = 4400; 
		         $config['max_height']    = 3320;  
		        $this->load->library('upload', $config);

			if(!$this->upload->do_upload('fotobaru')){
					$status="t";
					$this->helpmy_model_admin->update_mapel($status);
					redirect('Admin/mapellist','refresh');
				}else{
					unlink('./img/mapel/'.$this->input->post('fotolama'));				
					$status="y";
					$this->helpmy_model_admin->update_mapel($status);
					redirect('Admin/mapellist','refresh');
				}
		
	}
//  ========     AAAAAJJJJJJAAAAAAAAAAAAAAAAXXXXXXXXXXXXXXXXX    ===========================

	public function showMenjawab($a)
	{
		$data=$this->Helpmy_model->geJawabanDariUser($a);
		
        echo json_encode($data);
	}

	public function showPertanyaan($a)
	{
		$data=$this->Helpmy_model->getPertanyaanUser($a);
		
        echo json_encode($data);
	}



}

/* End of file Pegawai.php */
/* Location: ./application/controllers/Pegawai.php */