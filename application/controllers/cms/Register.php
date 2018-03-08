<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('login/M_login');
	}

	public function index()
	{
		$aut = $this->session->userdata('username');
		$autstatus = $this->session->userdata('ceklogin');

		if (!empty($aut) && ($autstatus == 'berhasil')) {
			redirect('beranda/c_beranda');
		}
		else {
			$this->load->view('login/v_login');
		}
		
	}

	public function c_sign_in()
	{
		$data['sign_in'] = $this->M_login->sign_in();

		if ($data['sign_in'] == true) {
			redirect('beranda/c_beranda');
		}
		else {
			redirect('');
		}
	}

	public function c_sign_out()
	{	
		$id = $this->session->userdata('id');
//		$tipe = 2;
//		$target = "logout";
//		$data = "-";
//		$this->m_login->m_set_log($id,$tipe,$data,$target);

		$this->session->sess_destroy();
		redirect('');
	}
}

/* End of file c_login.php */
/* Location: ./application/controllers/login/c_login.php */