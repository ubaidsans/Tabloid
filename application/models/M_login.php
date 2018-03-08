<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_login extends CI_Model {

    public function sign_in() {
        $username = $this->input->post('username');
        $password = ($this->input->post('password'));
        $otoritas = 2;
        echo $password;

        $this->db->select('*');
        $this->db->from('pengguna');
        $this->db->join('biodata', 'biodata.id_pengguna = pengguna.id', 'left');
        $this->db->where('pengguna.username', $username);
        $this->db->where('pengguna.password', $password);

        $result = $this->db->get();

        if ($this->db->affected_rows() > 0) {

            foreach ($result->result() as $row) {
                $id = $row->id_user;
            }

            $get_nick = explode(" ", $row->nama_lengkap);
            $nick = $get_nick[0];
            if ($row->id_otoritas == 1) {
                $otoritas = 'Admin Super';
            } else if ($row->id_otoritas == 1) {
                $otoritas = 'Admin';
            } else {
                $otoritas = 'Member';
            }

            $session = array(
                'username' => $username,
                'password' => $password,
                'id' => $id,
                'foto' => $row->id_otoritas . '.png',
                'ceklogin' => 'berhasil',
                'wm' => 0,
                'nick' => $nick,
                'fullname' => $row->nama,
                'otoritas' => $otoritas,
            );

            $this->session->set_userdata($session);

//			$target = "login";
//			$tipe = 1;
//			$data = "-";
//			$this->m_set_log($id,$tipe,$data,$target);

            return true;
        } else {
            $ceklogin = array(
                'ceklogin' => 'gagal',
            );

            $this->session->set_userdata($ceklogin);
            return false;
        }
    }

    public function set_log($id, $tipe, $data, $target) {
        date_default_timezone_set("Asia/Jakarta");
        $tgl = date("Y-m-d");
        $jam = date("H:i:s");

        switch ($tipe) {
            case '1':
                $aktivitas = "Admin telah login ke dalam iptv backoffice";
                break;
            case '2':
                $aktivitas = "Admin telah logout dari iptv backoffice";
                break;
            case '3':
                $aktivitas = "Admin telah menambah data " . $data . " ke dalam layanan iptv backoffice";
                break;
            case '4':
                $aktivitas = "Admin telah meng-update data " . $data . " pada layanan iptv backoffice";
                break;
            case '5':
                $aktivitas = "Admin telah menghapus data " . $data . " dari layanan iptv backoffice";
                break;
            default:
                break;
        }

        $log = array('id_log' => '',
            'id_user' => $id,
            'aktivitas' => $aktivitas,
            'target' => $target,
            'tanggal' => $tgl,
            'jam' => $jam,
            'tipe' => $tipe
        );

        $this->db->insert('log_aktivitas', $log);
    }

}

/* End of file m_login.php */
/* Location: ./application/models/login/m_login.php */