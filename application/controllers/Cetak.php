 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cetak extends CI_Controller {

	 public function __construct()
	 {
	 	parent::__construct();
	 	$this->load->model('cetak_model');
	 	$this->load->library('dompdf_gen');
	 	$this->load->helper('file');
	 }

	 public function listUser()
	 {
	 	$data['users']=$this->cetak_model->view_row();
	 	$this->load->view('admin/cetak/cetakusrlist_prev',$data);
	 }

	 public function cetakPdf()
	 {
	 	$data['users']=$this->cetak_model->view_row();
	 	$this->load->view('admin/cetak/cetakuserlist',$data);

	 	$paper_size='A4';
	 	$orientation='landscape';
	 	$html=$this->output->get_output();

	 	$dompdf= new DOMPDF();
	 	$this->dompdf->load_html($html);
	 	$this->dompdf->render();
	 	$this->dompdf->stream("laporan.pdf");
	 	unset($html);
	 	unset($dompdf);
	 }

	 public function cetakUserr($a)
	 {
	 	$this->load->model('Helpmy_model');
		$data['profil']=$this->Helpmy_model->getCurrentUser($a);

	 	$this->load->view('admin/cetak/cetakUser',$data);
	 	// $paper_size='A4';
	 	// $orientation='landscape';
	 	// $html=$this->output->get_output();

	 	// $dompdf= new DOMPDF();
	 	// $this->dompdf->load_html($html);
	 	// $this->dompdf->render();
	 	// $this->dompdf->stream("laporan.pdf");
	 	// unset($html);
	 	// unset($dompdf);
	 }

}
 
/* Location: ./application/controllers/Pegawai.php */