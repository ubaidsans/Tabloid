<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Iklan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
//		$data['biodata'] = $this->m_beranda->m_get_data_akun();
//		$data['mini_box_1'] = $this->m_beranda->m_get_mini_box_1();
//		$data['mini_box_2'] = $this->m_beranda->m_get_mini_box_2();
        $data['iklan'] = $this->M_iklan->getAll();
        //print_r($data['berita']);
		$this->load->view('page/v_iklan',$data);
	}
	
	public function add(){
	    $this->load->view('modal/v_add_iklan');
	}
	
	public function edit($id){
	    $data['iklan'] = $this->M_iklan->getByID($id);
	    $data['tes'] = 1;
	    $this->load->view('modal/v_edit_iklan', $data);
	}
	
	public function addproses(){
	    $input = $this->input->post();
	    if (!isset($_FILES['userfile'])){
	        echo "ga kewoco";
	    } else {
	        $config['upload_path']          = 'assets/img/iklan/';
	        $config['file_name']            = $input['nama'].'.jpg';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $config['max_size']             = 2000;
        
            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload('userfile')){
                echo "error";
            } else {
                $data = ['nama' => $input['nama'], 'gambar' => $this->upload->data('file_name')];
                $this->M_iklan->set($data);
                redirect('iklan');
            }
	    }
	    
	}
	
	public function editproses(){
	    $input = $this->input->post();
	    if (!isset($_FILES['userfile'])){
	        $data = ['nama' => $input['nama']];
            $this->M_iklan->updateIklan($data, $input['id']);
            redirect('iklan');    
	    } else {
	        $config['upload_path']          = 'assets/img/iklan/';
	        $config['file_name']            = $input['nama'].'.jpg';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $config['max_size']             = 2000;
        
            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload('userfile')){
                echo "error";
            } else {
                $data = ['nama' => $input['nama'], 'gambar' => $this->upload->data('file_name')];
                $this->M_iklan->updateIklan($data, $input['id']);
                redirect('iklan');
            }
	    }
	    
	}
	
	public function delete($id){
	    $this->M_iklan->delete($input['id']);
        redirect('iklan');   
	}

}

/* End of file beranda/c_beranda.php */
/* Location: ./application/controllers/beranda/c_beranda.php */