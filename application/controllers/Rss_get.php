<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Rss_get extends CI_Controller{

	public function __construct() {
		parent::__construct();
		$this->load->helper('xml'); 
    }
    
    public function all(){
		
			$data = array(
				'feed_name' 		=> 'Papua No. 1 News Portal | Jubi RSS',
				'feed_url' 			=> 'http://tabloidjubi.com',
				'image_url' 	    => 'http://tabloidjubi.com//img_logo/logoasli.jpg',
				'language' 	=> 'id-id',
				'posts' 			=> $this->M_berita->all()
			);
			header("Content-Type: application/rss+xml");
			$this->load->view('view_rss',$data);
		
		
	}
	
	public function get($id){
		if($id > 1){
			$data = array(
				'feed_name' 		=> 'Papua No. 1 News Portal | Jubi RSS',
				'feed_url' 			=> 'http://tabloidjubi.com',
				'image_url' 	    => 'http://tabloidjubi.com//img_logo/logoasli.jpg',
				'language' 	=> 'id-id',
				'posts' 			=> $this->M_berita->get($id)
			);
			header("Content-Type: application/rss+xml");
			$this->load->view('view_rss',$data);
		} else {
			$response['status'] = 'failed';
			$response['message'] = 'sub-kategori tidak ada';
			echo json_encode($response);
		}
		
	}
	
	public function getkategori($id){
		if($id > 1){
			switch($id){
			case 1 : $array = array(20, 17, 16, 10, 19, 14, 15,);break;
                case 2 : $array = array(29, 21,	34,	37,	36,	25,	38,	24,	23,	3,	47);break;
                case 3 : $array = array(34);break;
                case 4 : $array = array(4, 33, 39, 5, 6);break;
                case 5 : $array = array(30,	27,	43,	45, 29);break;
            }
			$data = array(
				'feed_name' 		=> 'Papua No. 1 News Portal | Jubi RSS',
				'feed_url' 			=> 'http://tabloidjubi.com',
				'image_url' 	    => 'http://tabloidjubi.com//img_logo/logoasli.jpg',
				'language' 	=> 'id-id',
				'posts' 			=> $this->M_berita->perkategori($array)
			);
			header("Content-Type: application/rss+xml");
			$this->load->view('view_rss',$data);
		} else {
			$response['status'] = 'failed';
			$response['message'] = 'kategori tidak ada';
			echo json_encode($response);
		}
		
	}
}