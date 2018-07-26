<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengunjung extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('Model_pengunjung', 'Model_anggota'));
    }

    public function index()
    {
        $data['title'] = 'Data Pengunjung Hari Ini';
        $data['pengunjung'] = $this->Model_pengunjung->getPengunjung()->result();
        $this->load->view('pengunjung/view_pengunjung', $data);
    }

    public function histori()
    {
        $data['title'] = 'Histori Data Pengunjung';
        $data['pengunjung'] = $this->Model_pengunjung->getHistori()->result();
        $this->load->view('pengunjung/view_pengunjung', $data);
    }

    public function selectAnggota($nim)
    {
        
    }
}
