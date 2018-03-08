<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require APPPATH . '/libraries/REST_Controller.php';

// use namespace
use Restserver\Libraries\REST_Controller;

class Berita extends REST_Controller {

    function __construct() {
        // Construct the parent class
        parent::__construct();
    }

    public function berita_get($id) {
        // If the id parameter doesn't exist return all the users

        if ($id > 0) {
            $berita = $this->rss($this->M_berita->get1berita($id));

            if ($berita) {
                // Set the response and exit				
                $this->set_response([
                    'status' => "ok",
                    'feed' => $this->feed(),
                    'items' => $berita], REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
            } else {

                $this->set_response([
                    'status' => FALSE,
                    'message' => 'berita tidak ada'
                        ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
            }
        } else {
            $this->set_response([
                'status' => FALSE,
                'message' => 'id salah'
                    ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
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
            $array[$a]['link'] = 'http://tabloidjubi.com/artikel-' . $row->id . '-' . $row->judul_seo . '-.html';
            $array[$a]['guid'] = '';
            $array[$a]['author'] = $row->author;
            $array[$a]['thumbnail'] = '';
            $array[$a]['description'] = "<p><img alt='' hspace=0 src='http://tabloidjubi.com/img_berita/" . $row->gambar . "' align=middle border=0></p><p>" . $row->meta_description . "</p>";
            $array[$a]['content'] = "<p><img alt='' hspace=0 src='http://tabloidjubi.com/img_berita/" . $row->gambar . "' align=middle border=0></p><p>" . $row->isi . "</p>";
            $array[$a]['enclosure'] = '{}';
            $array[$a]['categories'] = '[]';
            $array[$a]['likes'] = $likes['0']['total'];
        }
        return $array;
    }

}
