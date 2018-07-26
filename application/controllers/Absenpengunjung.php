<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Absenpengunjung extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('Model_sistem', 'Model_anggota', 'Model_absenpengunjung'));
    }

    public function index()
    {
        $data['sistem'] = $this->Model_sistem->getSistem();
        $this->load->view('pengunjung/view_absen', $data);
    }

    public function absen()
    {
        $this->Model_absenpengunjung->absen();
    }

    public function getAnggota($nim)
    {
        return $this->Model_anggota->select($nim);
    }
}
