<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$aut = $this->session->userdata('username');
		$autstatus = $this->session->userdata('ceklogin');

		if (!empty($aut) && ($autstatus == 'berhasil')) {
			redirect('cms/beranda');
		}
		else {
			$this->load->view('login/v_login');
		}
		
	}

	public function sign_in()
	{
		$data['sign_in'] = $this->M_login->sign_in();

		if ($data['sign_in'] == true) {
			redirect('cms/beranda');
		}
		else {
			redirect('cms');
		}
	}

	public function sign_out()
	{	
		$id = $this->session->userdata('id');
//		$tipe = 2;
//		$target = "logout";
//		$data = "-";
//		$this->m_login->m_set_log($id,$tipe,$data,$target);

		$this->session->sess_destroy();
		redirect('cms');
	}
	
	public function forget($id){
	    $data['id'] = $id;
	    $this->load->view('login/v_forget', $data);
	}
	
	public function updatepass(){
	    $data = $this->input->post();
	    if ($data['pass'] != $data['passconfirm']){
	        $cek = array(
                'passconfirm' => 'gagal',
            );

            $this->session->set_userdata($cek);
	        $this->forget($data['id']);
	    } else {
	        $this->M_pengguna->updatePass($data['id'],$data['pass']);
	        $this->load->view('login/v_success');
	    }
	}
}

/* End of file c_login.php */
/* Location: ./application/controllers/login/c_login.php */