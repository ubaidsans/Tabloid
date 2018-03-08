<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Beranda extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//$this->load->model('beranda/m_beranda');
	}

	public function index()
	{
//		$data['biodata'] = $this->m_beranda->m_get_data_akun();
//		$data['mini_box_1'] = $this->m_beranda->m_get_mini_box_1();
//		$data['mini_box_2'] = $this->m_beranda->m_get_mini_box_2();
        $data['berita'] = $this->M_berita->getLikeBerita();
        //print_r($data['berita']);
		$this->load->view('page/v_beranda', $data);
	}

}

/* End of file beranda/c_beranda.php */
/* Location: ./application/controllers/beranda/c_beranda.php */