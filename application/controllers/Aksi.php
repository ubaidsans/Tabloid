<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require APPPATH . '/libraries/REST_Controller.php';

// use namespace
use Restserver\Libraries\REST_Controller;

class Aksi extends REST_Controller {

    function __construct() {
        // Construct the parent class
        parent::__construct();
    }

    public function cros(){
        if (isset($_SERVER['HTTP_ORIGIN'])) {
            header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
            header('Access-Control-Allow-Credentials: true');
            header('Access-Control-Max-Age: 86400');    // cache for 1 day
        }
        if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {

            if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
                header("Access-Control-Allow-Methods: GET, POST, OPTIONS");

            if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
                header("Access-Control-Allow-Headers:{$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");

            exit(0);
        }
    }

    public function like_post() {
        $this->cros();
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);
        if ($this->M_aksi->cekLike($request->idberita, $request->idpengguna) == 0) {            
            $dataLike = ['id_berita' => $request->idberita, 'id_pengguna' => $request->idpengguna];
            $this->M_aksi->set($dataLike);
            $id = $this->M_aksi->getId($request->idberita, $request->idpengguna);
            $this->response([
                'status' => 'success',
                'id_suka' => $id[0]['id'],
                'message' => 'sip bener.'
                    ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => 'failed',
                'message' => 'Post telah di like.'
                    ], REST_Controller::HTTP_OK);
        }
    }
    
    public function like_get($idberita, $idpengguna) {
        $input = $this->input->post();
        if ($this->M_aksi->cekLike($idberita, $idpengguna) == 0) {            
            $dataLike = ['id_berita' => $idberita, 'id_pengguna' => $idpengguna];
            $this->M_aksi->set($dataLike);
            $id = $this->M_aksi->getId($idberita, $idpengguna);
            $this->response([
                'status' => 'success',
                'id_suka' => $id[0]['id'],
                'message' => 'sip bener.'
                    ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => 'failed',
                'message' => 'Post telah di like.'
                    ], REST_Controller::HTTP_OK);
        }
    }

    public function like_delete($id) {
        if ($this->M_aksi->ceklike2($id) == 1) {
            //$this->M_aksi->delete($idberita, $idpengguna);
            $this->M_aksi->dislike($id);
            $this->response([
                'status' => 'success',
                'message' => 'deleted.'
                    ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => 'failed',
                'message' => 'Data tidak ada.'
                    ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    function cek($idb, $idp) {
        $status = $this->M_aksi->cekLike($idb, $idp);
        if ($status < 1) {
            return 0;
            //echo 1;
        } else {
            return 1;
            //echo 0;
        }
    }

}
