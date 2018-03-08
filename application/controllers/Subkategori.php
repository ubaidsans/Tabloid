<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require APPPATH . '/libraries/REST_Controller.php';

// use namespace
use Restserver\Libraries\REST_Controller;

class Subkategori extends REST_Controller {

    function __construct() {
        // Construct the parent class
        parent::__construct();
    }

    public function berita_get($id, $page) {
        if ($id > 0) {
            $id = (int) $id;
            $return = $this->M_berita->get($id, $page);
            $berita = $this->rss($return);            
            if (!empty($berita)) {
                $this->set_response(['status' => "ok",
                                    'feed' => $this->feed(),
                                    'items' => $berita
                                    ], REST_Controller::HTTP_OK); 
            } else {
                $this->set_response(['status' => FALSE,
                                     'message' => 'Sub-kategori tidak ada'], 
                                     REST_Controller::HTTP_NOT_FOUND);                
            }
        } else {
            $this->set_response(['status' => FALSE,
                'message' => 'id salah'
                    ], REST_Controller::HTTP_NOT_FOUND); 
        }
    }

    private function feed() {
        $array = array(
            'url' => "http://tabloidjubi.com",
            'title' => "Papua No. 1 News Portal | Jubi RSS",
            'link' => "http://tabloidjubi.com",
            'author' => "",
            'description' => "",
            'image' => "http://tabloidjubi.com//img_logo/logoasli.jpg");

        return $array;
    }

    private function rss($data) {
        $a = 0;
        $array = null;
        foreach ($data as $row) {
            $likes = $this->M_aksi->totalLike($row->id);
            $array[$a]['id'] = $row->id + 0;
            $array[$a]['title'] = $row->judul;
            $array[$a]['pubDate'] = $row->tanggal . ' ' . $row->jam;
            //$array[$a]['link'] = 'http://tabloidjubi.com/artikel-'.$row->id.'-'.$row->judul_seo.'-.html';
            $array[$a]['link'] = base_url('berita/berita/') . $row->id;
            $array[$a]['guid'] = '';
            $array[$a]['author'] = $row->author;
            $array[$a]['thumbnail'] = '';
            $array[$a]['description'] = "<p><img alt='' hspace=0 src='http://tabloidjubi.com/img_berita/" . $row->gambar . "' align=middle border=0></p><p>" . $row->meta_description . "</p>";
            $array[$a]['content'] = "<p><img alt='' hspace=0 src='http://tabloidjubi.com/img_berita/" . $row->gambar . "' align=middle border=0></p><p>" . $row->isi . "</p>";
            $array[$a]['enclosure'] = '{}';
            $array[$a]['categories'] = '[]';
            $array[$a]['likes'] = $likes['0']['total'];
            $a++;
        }
        return $array;
    }

}
