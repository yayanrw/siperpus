<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jurusan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model_jurusan');

	}

	// List all your itemstle
	public function index( $offset = 0 )
	{
		$data['title']	= 'Data Jurusan';
		$data['title2']	= 'Tambah Jurusan';
		$data['jurusan']= $this->Model_jurusan->index();
		$this->load->view('jurusan/view_jurusan', $data);
	}

	// Add a new item
	public function add()
	{
		$this->Model_jurusan->add();
	}

	public function addProdi($id_jurusan)
	{
		$this->Model_jurusan->addProdi($id_jurusan);
	}

	//Update one item
	public function updateJurusan($id_jurusan)
	{
		$this->Model_jurusan->updateJurusan($id_jurusan);
	}

	public function updateProdi($id_jurusan, $id_prodi)
	{
		$this->Model_jurusan->updateProdi($id_jurusan, $id_prodi);
	}

	//Delete one item
	public function deleteJurusan($id_jurusan)
	{
		$this->Model_jurusan->deleteJurusan($id_jurusan);
	}

	public function deleteProdi($id_jurusan, $id_prodi)
	{
		$this->Model_jurusan->deleteProdi($id_jurusan, $id_prodi);
	}

	public function prodi($id_jurusan)
	{
		$this->Model_jurusan->prodi($id_jurusan);
	}
}

/* End of file Jurusan.php */
/* Location: ./application/controllers/Jurusan.php */
