<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('login_model');
	}

	public function index()
	{
		
	}

	public function login()
	{
		// $this->load->model('login_model');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$output = array('error' => false);

		$result = $this->login_model->login($username,$password);
		if ($result) {
			$sess_array = array();
			foreach ($result as $row) {
				$sess_array = array(
					'id_user' => $row->id_user,
					'username' => $row->username,
					'level' => $row->level
				);
				if ($row->is_activated == 0) {
					$output['error'] = true;
					$output['message'] = 'Login Failed. User is not Activaed';
				}else {
					$this->session->set_userdata('kostku_logged_in',$sess_array );
					$output['message'] = 'Logging in. Please wait...';
					if ($row->level == 2) {
						$output['level'] = 'Administrator';
					}else {
						$output['level'] = 'User';
					}
				}
			}
		}else {
			$output['error'] = true;
			$output['message'] = 'Login Invalid. User not found';
		}
		echo json_encode($output);
	}

	public function sign_up()
	{
		// $this->load->model('login_model');
		$username = $this->input->post('username');
		$email = $this->input->post('email');
		$no_hp = $this->input->post('no_hp');
		$password = $this->input->post('password');
		$password = md5($password);
		$output = array('error' => false);

		$result = $this->login_model->check_user($username);
		if ($result) {
			$output['error'] = true;
			$output['message'] = 'Username already exist';
		}else {
			$this->login_model->create_user($username,$email,$password,$no_hp);
			$output['message'] = 'Logging in. Please wait...';
		}
		echo json_encode($output);
	}

	public function logout()
	{
		$this->session->unset_userdata('kostku_logged_in');
		$this->session->sess_destroy();
		redirect('Kostku','refresh');
	}

}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */