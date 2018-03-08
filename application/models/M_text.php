<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_text extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function gettext(){
        $this->db->select('*');
        $this->db->from('text');
        $query = $this->db->get();
        return $query->result();
    }

}