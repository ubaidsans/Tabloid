<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require APPPATH . '/libraries/REST_Controller.php';

// use namespace
use Restserver\Libraries\REST_Controller;

class Advertisements extends REST_Controller {

    function __construct() {
        // Construct the parent class
        parent::__construct();
    }
    
    public function iklan_get(){
        $iklan = $this->M_iklan->getByID(1);
        $link = base_url('assets/img/iklan/').$iklan[0]['gambar'];
        $url = "<img src='$link'/>";
        $this->response(
                $url
                    , REST_Controller::HTTP_OK);
    }

}
