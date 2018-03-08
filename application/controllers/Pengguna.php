<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require APPPATH . '/libraries/REST_Controller.php';

// use namespace
use Restserver\Libraries\REST_Controller;

class Pengguna extends REST_Controller {

    function __construct() {
        // Construct the parent class
        parent::__construct();
    }

    public function akun_get() {
        echo 2;
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

    public function login_post() {
        $this->cros();
        $postdata = file_get_contents("php://input");
        if (isset($postdata)) {
            $request = json_decode($postdata);
            //$username = $request->user;
            if ($request->user != "") {
                $return = $this->M_pengguna->cekUser($request->user);
                if ($return) {
                    $auth = $this->M_pengguna->auth($request->user, $request->pass);
                    //$bio = $this->M_pengguna->getBio($auth[0]['id']);
                    if ($auth != null) {
                        $this->set_response([
                            'id' => $auth[0]['id']+0,
                            'nama' => $auth[0]['username'],
                            'status' => 'success',
                            'message' => 'sip bener.'
                                ], REST_Controller::HTTP_OK);
                    } else {
                        $this->set_response([
                            'status' => 'failed',
                            'message' => 'Password salah.'
                                ], REST_Controller::HTTP_NOT_FOUND);
                    }
                } else {
                    $this->set_response([
                        'status' => 'failed',
                        'message' => 'Username salah.'
                            ], REST_Controller::HTTP_NOT_FOUND);
                }
            } else {
                $this->set_response([
                        'status' => 'failed',
                        'message' => 'Empty username parameter.'
                            ], REST_Controller::HTTP_NOT_FOUND);
            }
        } else {
            $this->set_response([
                        'status' => 'failed',
                        'message' => 'Not called properly with username parameter!'
                            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function register_post() {
        $this->cros();
        $postdata = file_get_contents("php://input");
        if (isset($postdata)) {
            $request = json_decode($postdata);
            //$username = $request->user;
            if ($request->user != "") {
                $return = $this->M_pengguna->cekUser($request->user);
                $return2 = $this->M_pengguna->cekMail($request->email);
                if (!$return) {
                    if(!$return2){
                        $dataAkun = array('username' => $request->user, 'password' => $request->pass);
                        $this->M_pengguna->setAkun($dataAkun);
                        $id = $this->M_pengguna->getId($request->user);
                        $dataBio = ['id_pengguna' => $id, 'nama' => $request->nama,
                            'email' => $request->email];
                        $this->M_pengguna->setBio($dataBio);
                        $this->set_response([
                                        'status' => 'success',
                                        'message' => 'sip bener.'
                                        ], REST_Controller::HTTP_OK);
                    }
                    else {
                        $this->set_response([
                        'status' => 'failed',
                        'message' => 'email sudah ada.'
                            ], REST_Controller::HTTP_NOT_FOUND);
                    }
                } else {
                    $this->set_response([
                        'status' => 'failed',
                        'message' => 'Username sudah ada.'
                            ], REST_Controller::HTTP_NOT_FOUND);
                }
            } else {
                $this->set_response([
                        'status' => 'failed',
                        'message' => 'Empty username parameter.'
                            ], REST_Controller::HTTP_NOT_FOUND);
            }
        } else {
            $this->set_response([
                        'status' => 'failed',
                        'message' => 'Not called properly with username parameter!'
                            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }
    
    public function forget_post(){
        $this->cros();
        $postdata = file_get_contents("php://input");
        if (isset($postdata)) {
            $request = json_decode($postdata);
            $return = $this->M_pengguna->cekMail($request->email);
            if ($request->email != "") {
                if ($return){
                    $send = $this->send_email($request->email);
                    if ($send){
                    $this->set_response([
                                        'status' => 'success',
                                        'message' => 'sip bener.'
                                        ], REST_Controller::HTTP_OK);
                        
                    } else {
                        $this->set_response([
                        'status' => 'failed',
                        'message' => 'gagal kirim email.'
                            ], REST_Controller::HTTP_NOT_FOUND);
                    }
                } else {
                    $this->set_response([
                        'status' => 'failed',
                        'message' => 'Email tidak ada.'
                            ], REST_Controller::HTTP_NOT_FOUND);
                }
            } else {
                $this->set_response([
                        'status' => 'failed',
                        'message' => 'Empty username parameter.'
                            ], REST_Controller::HTTP_NOT_FOUND);
            }
        } else {
            $this->set_response([
                        'status' => 'failed',
                        'message' => 'Not called properly with username parameter!'
                            ], REST_Controller::HTTP_NOT_FOUND);
        }
        
    }
    
    private function send_email($email){
        $return = $this->M_pengguna->text();
        $id = $this->M_pengguna->getIdByEmail($email);
        $config = Array(  
                    'protocol' => 'smtp',  
                    'smtp_host' => 'localhost',  
                    'smtp_port' => 25,  
                    'smtp_user' => 'tes@ubdbest.com',   
                    'smtp_pass' => '12mobile34',   
                    'mailtype' => 'html',   
                    'charset' => 'iso-8859-1');  
        $this->load->library('email', $config);  
        $this->email->set_newline("\r\n");  
        $this->email->from('tes@ubdbest.com', 'Admin Re:Code');   
        $this->email->to($email);   
        $this->email->subject('Lupa password');   
        $tes = $this->email->message("<p>".$return[0]['pembuka']."</p><p>".$return[0]['isi']."$id"."</p><p>".$return[0]['penutup']."</p>"); 
        if (!$this->email->send()) {  
            return false;  
        } else {
            return true;
        }
    }

}
