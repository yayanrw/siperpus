<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Daftarbuku extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_buku');
    }
    

    public function index()
    {
        $data['buku'] = $this->Model_buku->index();
        $data['jenis'] = $this->Model_buku->getJenis();
        $data['alfabet'] = range('A', 'Z');
        $this->load->view('pengunjung/view_beranda', $data);
    }

    

    public function show($id_buku)
    {
        $data['buku'] = $this->Model_buku->select($id_buku);
        $this->load->view('pengunjung/view_detailbuku', $data);   
    }

    public function jenis($jenis)
    {
        $data['buku'] = $this->Model_buku->showByJenis($jenis, 12);
        $this->load->view('pengunjung/view_jenis', $data);
    }

}

/* End of file Controllername.php */


/* End of file filename.php */
