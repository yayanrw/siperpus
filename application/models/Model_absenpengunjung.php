<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_absenpengunjung extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    //Codeigniter : Write Less Do More
    }

    public function absen()
    {
        $nim    = $this->input->post('nim');
        $query  = $this->db->get_where('anggota', array('nim' => $nim));
        $result = $query->row();

        if ($query->num_rows() > 0) {
            $data    = array(
              'nim'  => $nim,
              'nama' => $result->nama,
              'date' => date('Y-m-d'),
              'time' => date('H:i:s')
            );
            $this->db->insert('pengunjung', $data);
            $this->session->set_flashdata('notif', 'Selamat Datang, <br>'.$result->nama.'<br>'.$result->nim);
            $this->session->set_flashdata('foto', $result->foto);
            redirect('absenpengunjung', 'refresh');
        } else {
            $this->session->set_flashdata('notif', 'Maaf, NIM yang anda masukkan tidak terdaftar');
            redirect('absenpengunjung', 'refresh');
        }
    }

}
