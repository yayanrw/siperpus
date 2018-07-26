<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pegawai extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->Model_security->getSecurity();
        $this->Model_security->getSecurityAdmin();
        $this->load->model('Model_pegawai');
    }

    public function index()
    {
        $data['title'] = 'Data Pegawai';
        $data['pegawai'] = $this->Model_pegawai->index();
        $this->load->view('pegawai/view_pegawai', $data);
    }

    public function show($id_pegawai)
    {
        $data['title'] = 'Informasi Pegawai';
        $data['pegawai'] = $this->Model_pegawai->select($id_pegawai);
        $this->load->view('pegawai/view_detail', $data);
    }

    // Add a new item
    public function add()
    {
    }

    public function store()
    {
        $this->Model_pegawai->store();
    }

    //Update one item
    public function edit($id_pegawai)
    {
        $data['pegawai'] = $this->Model_pegawai->select($id_pegawai);
        $data['password'] = $this->encryption->decrypt($data['pegawai']->password);
        $data['title']   = 'Ubah Data Pegawai';
        $this->load->view('pegawai/view_pegawaiupdate', $data);
    }

    public function update($id_pegawai)
    {
        $this->Model_pegawai->update($id_pegawai);
    }

    //Delete one item
    public function delete($id_pegawai)
    {
        $this->Model_pegawai->delete($id_pegawai);
    }
}

/* End of file Pegawai.php */
/* Location: ./application/controllers/Pegawai.php */
