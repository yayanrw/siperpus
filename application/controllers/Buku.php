<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->Model_security->getSecurity();
		$this->load->model('Model_buku');
		$this->load->model('Model_peminjaman');
	}

	// List all your items
	public function index()
	{
		$level = $this->session->userdata('level');
		$data['title']   = 'Data Buku';
		$data['buku'] = $this->Model_buku->index();
		$data['jenis'] = $this->Model_buku->getJenis();
		$this->load->view('buku/view_buku', $data);
	}

	public function show($id_buku)
	{
		$data['title']   = 'Informasi Buku';
        $data['peminjaman'] = $this->Model_peminjaman->selectByBuku($id_buku);
		$data['buku'] = $this->Model_buku->select($id_buku);
		$this->load->view('buku/view_detail', $data);
	}

	public function showByJenis($jenis)
	{
		$this->Model_buku->showByJenis($jenis);
	}

	// Add a new item
	public function add()
	{
		$this->Model_buku->add();
	}

	// Add a jenis buku
	public function addJenisBuku()
	{
		$this->Model_buku->addJenisBuku();
	}

	//Update one item
	public function update($id_buku)
	{
		$this->Model_buku->update($id_buku);
	}

	public function edit($id_buku)
	{
		$this->Model_buku->edit($id_buku);
	}

	public function updateJenisBuku($id_jenis)
	{
		$this->Model_buku->updateJenisBuku($id_jenis);
	}

	public function editJenisBuku($id_jenis)
	{
		$this->Model_buku->editJenisBuku($id_jenis);
	}

	//Delete one item
	public function delete($id_buku)
	{
		$this->Model_buku->delete($id_buku);
	}

	public function deleteJenisBuku($id_jenis)
	{
		$this->Model_buku->deleteJenisBuku($id_jenis);
	}

	public function jenisBuku()
	{
		$data['title']  = 'Data Jenis Buku';
		$data['title2']  = 'Tambah Jenis Buku';
		$data['jenis']	= $this->Model_buku->getJenis();
		$this->load->view('buku/view_jenisbuku', $data);
	}

}

/* End of file Buku.php */
/* Location: ./application/controllers/Buku.php */
