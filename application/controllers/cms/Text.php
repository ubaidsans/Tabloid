<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Text extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//$this->load->model('beranda/m_beranda');
		$this->load->Model('M_text');
	}

	public function index()
	{
//		$data['biodata'] = $this->m_beranda->m_get_data_akun();
//		$data['mini_box_1'] = $this->m_beranda->m_get_mini_box_1();
//		$data['mini_box_2'] = $this->m_beranda->m_get_mini_box_2();
        $data['text'] = $this->M_text->gettext();
        //print_r($data['berita']);
		$this->load->view('page/v_text', $data);
	}

}

/* End of file beranda/c_beranda.php */
/* Location: ./application/controllers/beranda/c_beranda.php */