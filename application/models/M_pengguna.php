<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_pengguna extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function setAkun($data) {
        $this->db->insert('pengguna', $data);
        return;
    }
    
    public function setBio($data) {
        $this->db->insert('biodata', $data);
        return;
    }
    
    public function getBio($id) {
        $this->db->select('*');
        $this->db->from('biodata');
        $this->db->where('id_pengguna', $id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function cekUser($user) {
        $this->db->select('id');
        $this->db->from('pengguna');
        $this->db->where('username', $user);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return true;
        } return false;
    }
    
    public function cekMail($mail) {
        $this->db->select('id_pengguna');
        $this->db->from('biodata');
        $this->db->where('email', $mail);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return true;
        } return false;
    }

    public function auth($user, $pass) {
        $this->db->select('*');
        $this->db->from('pengguna');
        $this->db->where('username', $user);        
        $this->db->where('password', $pass);
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function getId($user) {
        $this->db->select('id');
        $this->db->from('pengguna');
        $this->db->where('username', $user);
        $query = $this->db->get();
        $result = $query->result_array();
        return $result['0']['id'];
    }
    
    public function getIdByEmail($email) {
        $this->db->select('id_pengguna');
        $this->db->from('biodata');
        $this->db->where('email', $email);
        $query = $this->db->get();
        $result = $query->result_array();
        return $result['0']['id_pengguna'];
    }
    
    public function delete($id) {
        $this->db->where('id_berita', $id);
        try {
            $this->db->delete($this->tabel);
            return 'Berita telah sukses dihapus';
        } catch (Exception $exc) {
            return $exc->getTraceAsString();
        }
    }
    
    public function updatePass($id, $pass){
        $data = array('password' => $pass);
        $this->db->where('id', $id);
        $this->db->update('pengguna', $data);
        return true;
    }
    
    public function text(){
        $this->db->select('*');
        $this->db->from('text');
        $this->db->where('nama', 'forget');
        $query = $this->db->get();
        return $query->result_array();
    }

}
