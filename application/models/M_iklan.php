<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_iklan extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function set($data) {
        $this->db->insert('iklan', $data);
        return;
    }
    
    public function getAll(){
        $this->db->select('*');
        $this->db->from('iklan');
        $query = $this->db->get();
        return $query->result();
    }
    
    public function updateIklan($data, $id){
        $this->db->where('id', $id);
        $this->db->update('iklan', $data);
    }
    
    public function getByID($id){
        $this->db->select('*');
        $this->db->from('iklan');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function delete($id) {
        $this->db->where('id',$id);
        $this->db->delete('iklan');
        return true;
    }

}
