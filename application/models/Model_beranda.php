<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_beranda extends CI_Model
{
    public function index()
    {
        $data['jumlah_anggota'] = $this->db->count_all('anggota');
        $data['jumlah_pegawai'] = $this->db->count_all('pegawai');
        $data['jumlah_buku']    = $this->db->count_all('buku');
        $data['jumlah_pengunjung']     = $this->db->where('date', date('Y-m-d'))->from("pengunjung")->count_all_results();
        $this->load->view('admin/view_beranda', $data);
    }
}

/* End of file Model_beranda.php */
/* Location: ./application/models/Model_beranda.php */
