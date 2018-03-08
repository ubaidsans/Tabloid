<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_aksi extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function set($data) {
        $this->db->insert('suka', $data);
        return;
    }

    public function delete($idb, $idp) {
        $this->db->where('id_berita', $idb);
        $this->db->where('id_pengguna', $idp);
        $this->db->delete('suka');
        return true;
    }
    
    public function dislike($id) {
        $this->db->where('id_suka', $id);
        $this->db->delete('suka');
        return true;
    }
    
    public function totalLike($id_berita){
        $this->db->select('count(*) as total');
        $this->db->from('suka');
        $this->db->where('id_berita', $id_berita);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getId($idb, $idp){
        $this->db->select('id_suka as id');
        $this->db->from('suka');
        $this->db->where('id_berita', $idb);
        $this->db->where('id_pengguna', $idp);
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function cekLike($idb, $idp){
        $this->db->select('id_suka');
        $this->db->from('suka');
        $this->db->where('id_berita', $idb);
        $this->db->where('id_pengguna', $idp);
        $query = $this->db->get();
        return $query->num_rows();
    }
    
    public function cekLike2($id){
        $this->db->select('id_suka');
        $this->db->from('suka');
        $this->db->where('id_suka', $id);
        $query = $this->db->get();
        return $query->num_rows();
    }

}
