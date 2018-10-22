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

	public function getUser()
	{
        echo json_encode( $this->admin_model->get_user());
	}

	public function delete_User()
	{
		$id_user = $this->input->post('id_user');
		$this->admin_model->deleted_User($id_user);

		$output['message'] = 'Success';
		echo json_encode($output);
	}

	public function add_fasilitas()
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


}