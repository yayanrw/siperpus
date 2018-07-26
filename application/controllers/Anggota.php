<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Anggota extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->Model_security->getSecurity();
        $this->load->model('Model_anggota');
        $this->load->model('Model_peminjaman');
        $this->load->model('Model_pengunjung');
    }

    // List all your items
    public function index()
    {
        // $level = $this->session->userdata('level');
        $data['title']   = 'Data Anggota';
        $data['jurusan'] = $this->Model_anggota->jurusan();
        $data['prodi']   = $this->Model_anggota->prodi();
        $data['anggota'] = $this->Model_anggota->index();
        $this->load->view('anggota/view_anggota', $data);
    }

    public function jurusan()
    {
        $data['jurusan'] = $this->Model_anggota->jurusan();
        $this->load->view('jurusan/view_jurusan', $data);
    }

    public function show($nim)
    {
        $data['title'] = 'Informasi Anggota';
        $data['anggota'] = $this->Model_anggota->select($nim);
        $data['peminjaman'] = $this->Model_peminjaman->select($nim);
        $data['absen'] = $this->Model_pengunjung->getPengunjungAnggota($nim);
        $this->load->view('anggota/view_detail', $data);
    }

    // Add a new item
    public function add()
    {
    }

    public function store()
    {
        $this->Model_anggota->store();
    }

    //Update one item
    public function update($nim)
    {
        $this->Model_anggota->update($nim);
    }

    public function edit($nim)
    {
        $this->Model_anggota->edit($nim);
    }

    //Delete one item
    public function delete($nim)
    {
        $this->Model_anggota->delete($nim);
    }
}

/* End of file Anggota */
/* Location: ./application/controllers/Anggota */
