<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_berita extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function all($page) {
        $this->db->select('*');
        $this->db->from('berita');
        $this->db->order_by('tanggal', 'DESC');
        $this->db->order_by('jam', 'DESC');
        if ($page != 0){
            $this->db->limit(5, 5 * ($page - 1) + 1);    
        }
        $query = $this->db->get();
        return $query->result();
    }

    public function get($id, $page) {
        $cat = ',' . $id . ',';
        $this->db->select('*');
        $this->db->from('berita');
        $this->db->like('kategori', $cat);
        $this->db->order_by('tanggal', 'DESC');
        $this->db->order_by('jam', 'DESC');
        if ($page != 0){
            $this->db->limit(5, 5 * ($page - 1) );    
        }
        
        $query = $this->db->get();
        return $query->result();
    }

    public function perkategori($array, $page) {
        $this->db->select('*');
        $this->db->from('berita');
        $this->db->like('kategori', ',' . $array[0] . ',');
        for ($i = 1; $i < count($array); $i++) {
            $this->db->or_like('kategori', ',' . $array[$i] . ',');
        }
        $this->db->order_by('tanggal', 'DESC');
        $this->db->order_by('jam', 'DESC');
        $this->db->limit(5, 5 * ($page - 1));
        $query = $this->db->get();
        return $query->result();
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

    public function get1berita($id) {
        $this->db->select('*');
        $this->db->from('berita');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->result();
    }
    
    public function getLikeBerita() {
        $this->db->select('berita.id, berita.judul, berita.dibaca, (SELECT COUNT(*) FROM suka WHERE suka.id_berita = berita.id) as love');
        $this->db->from('berita');
        $query = $this->db->get();
        return $query->result();
    }

}

