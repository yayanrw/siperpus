<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peminjaman extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model_peminjaman');
		$this->load->model('Model_pendendaan');
	}

	// List all your items
	public function index()
	{
		$data['title'] = 'Data Peminjaman Buku';
		$data['peminjaman'] = $this->Model_peminjaman->getPeminjaman();
		$this->load->view('peminjaman/view_peminjaman', $data);
	}

	public function show($id_peminjaman)
	{
		$data['title'] = 'Informasi Peminjaman Buku';
		$data['peminjaman'] = $this->Model_peminjaman->selectById($id_peminjaman);
		$this->load->view('peminjaman/view_detail', $data);
	}

	public function sedangDiPinjam()
	{
		$data['title'] = 'Data Peminjaman Buku';
		$data['peminjaman'] = $this->Model_peminjaman->sedangDiPinjam();
		$this->load->view('peminjaman/view_peminjaman', $data);
	}

	public function terlambat()
	{
		$data['title'] = 'Data Peminjaman Buku';
		$data['peminjaman'] = $this->Model_peminjaman->terlambat();
		$this->load->view('peminjaman/view_peminjaman', $data);
	}

	public function sudahDikembalikan()
	{
		$data['title'] = 'Data Peminjaman Buku';
		$data['peminjaman'] = $this->Model_peminjaman->sudahDikembalikan();
		$this->load->view('peminjaman/view_peminjaman', $data);
	}

	public function histori()
	{
		$data['peminjaman'] = $this->Model_peminjaman->histori();
		$this->load->view('peminjaman/view_peminjaman', $data);
	}

	// Add a new item
	public function add($id_buku, $operasi)
	{
		$this->Model_peminjaman->updateBuku($id_buku, $operasi);
	}

	public function store($operasi)
	{
		$this->Model_peminjaman->store($operasi);
	}

	//Update one item
	public function update($id_peminjaman)
	{
		$this->Model_peminjaman->update($id_peminjaman);
	}

	public function edit($id_peminjaman)
	{
		$data['title'] = 'Kembalikan Buku';
		$data['denda'] = $this->Model_pendendaan->getDenda();
		$data['peminjaman'] = $this->Model_peminjaman->selectById($id_peminjaman);
		$this->load->view('peminjaman/view_kembalikan', $data);
	}

	//Delete one item
	public function delete( $id = NULL )
	{

	}
}

/* End of file Peminjaman.php */
/* Location: ./application/controllers/Peminjaman.php */
