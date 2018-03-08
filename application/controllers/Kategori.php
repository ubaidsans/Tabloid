<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require APPPATH . '/libraries/REST_Controller.php';

// use namespace
use Restserver\Libraries\REST_Controller;

class Kategori extends REST_Controller {

    function __construct() {
        // Construct the parent class
        parent::__construct();
    }

    public function berita_get($id, $page) {
        // If the id parameter doesn't exist return all the users
        if ($id == "all") {
            $berita = $this->rss($this->M_berita->all($page));
            // Set the response and exit				
            $this->set_response(['status' => "ok",
                                'feed' => $this->feed(),
                                'item' => $berita], REST_Controller::HTTP_OK);
        }
        // Find and return a single record for a particular user.
        else if ($id > 0 && $id < 6) {
            $id = (int) $id;
            $array = null;
            switch ($id) {
                case 1 : $array = [20, 17, 16, 10, 19, 14, 15,];break;
                case 2 : $array = [29, 21, 34, 37, 36, 25, 38, 24, 23, 3, 47];break;
                case 3 : $array = [34];break;
                case 4 : $array = [4, 33, 39, 5, 6];break;
                case 5 : $array = array(30, 27, 43, 45, 29);break;
            }
            $return = $this->M_berita->perkategori($array, $page);
            $berita = $this->rss($return);

            $this->set_response([
                'status' => "ok",
                'feed' => $this->feed(),
                'items' => $berita
                    ], REST_Controller::HTTP_OK);
        } else {
            $this->set_response([
                'status' => FALSE,
                'message' => 'id kategori salah'
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
            $array[$a]['author'] = $row->author;
            //$array[$a]['link'] = 'http://tabloidjubi.com/artikel-'.$row->id.'-'.$row->judul_seo.'-.html';
            $array[$a]['link'] = base_url('berita/berita/') . $row->id;
            $array[$a]['description'] = "<![CDATA[<p><img alt='' hspace=0 src='http://tabloidjubi.com/img_berita/" . $row->gambar . "' align=middle border=0></p><p>" . $row->meta_description . "</p>]]>'";
            $array[$a]['content'] = "<![CDATA[<p><img alt='' hspace=0 src='http://tabloidjubi.com/img_berita/" . $row->gambar . "' align=middle border=0></p><p>" . $row->isi . "</p>]]>'";
            $array[$a]['likes'] = $likes['0']['total'];
            $a++;
        }
        return $array;
    }

}
