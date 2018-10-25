 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	 public function __construct()
	 {
	 	parent::__construct();
	 	$this->load->model('admin_model');
	 }
 
	public function index()
	{
		$this->load->view('admin/home');
	}

	public function data_fasilitas()
	{
		$this->load->view('admin/fasilitas');
	}


	public function getUser()
	{
        echo json_encode( $this->admin_model->get_user());
	}

	public function getFasilitas()
	{
        echo json_encode( $this->admin_model->get_fasilitas());
	}

	public function delete_User()
	{
		$id_user = $this->input->post('id_user');
		$this->admin_model->deleted_User($id_user);

		$output['message'] = 'Success';
		echo json_encode($output);
	}


	public function upload_fasilitas()
	{
		$config['upload_path']="./assets/ico"; //path folder file upload
		$config['allowed_types']='gif|jpg|png'; //type file yang boleh di upload

		$this->load->library('upload', $config); //call library upload
		if ($this->upload->do_upload("file")){ //upload file
			$data = array('upload_data' => $this->upload->data()); //ambil file name yang diupload

			$nama = $this->input->post('nama'); //get nama
			$kategori = $this->input->post('kategori'); //get kategori
			$ico = $data['upload_data']['file_name']; //set file name ke variable image
		
			$this->admin_model->new_fasilitas($kategori,$nama,$ico); //kirim value ke model admin_model	
		}
	}

	public function update_User()
	{
		$this->admin_model->update_User();

		$output['message'] = 'Success';
		echo json_encode($output);
	}


}