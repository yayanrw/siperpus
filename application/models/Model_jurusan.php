<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_jurusan extends CI_Model {

	public function index()
	{
		return $this->db->get('jurusan')->result();
	}

	public function selectJurusan($id_jurusan)
	{
		return $this->db->get_where('jurusan', array('id_jurusan' => $id_jurusan))->row();
	}

	public function selectProdi($id_prodi)
	{
		return $this->db->get_where('prodi', array('id_prodi' => $id_prodi))->row();
	}

	public function add()
	{
		$object = array('jurusan' => $this->input->post('jurusan'));
		$this->db->insert('jurusan', $object);
		redirect('jurusan','refresh');
	}

	public function addProdi($id_jurusan)
	{
		$object = array(
			'id_jurusan' => $id_jurusan,
			'prodi' => $this->input->post('prodi')
		);
		$this->db->insert('prodi', $object);
		redirect('jurusan/prodi/'.$id_jurusan,'refresh');
	}

	public function updateJurusan($id_jurusan)
	{
		if (isset($_POST['simpan'])) {
			$object = array('jurusan' => $this->input->post('jurusan'));
			$this->db->update('jurusan', $object, array('id_jurusan' => $id_jurusan));
			redirect('jurusan','refresh');
		}
		else {
			$data['title'] = 'Ubah Data Jurusan';
			$data['jurusan'] = $this->selectJurusan($id_jurusan);
			$this->load->view('jurusan/view_jurusanupdate', $data);
		}
	}

	public function updateProdi($id_jurusan, $id_prodi)
	{
		if (isset($_POST['simpan'])) {
			$object = array('prodi' => $this->input->post('prodi'));
			$this->db->update('prodi', $object, array('id_prodi' => $id_prodi));
			redirect('jurusan/prodi/'.$id_jurusan,'refresh');
		}
		else {
			$data['title'] = 'Ubah Data Prodi';
			$data['prodi'] = $this->selectProdi($id_prodi);
			$data['id_jurusan'] = $id_jurusan;
			$this->load->view('jurusan/view_prodiupdate', $data);
		}
	}

	public function deleteJurusan($id_jurusan)
	{
		$this->db->delete('jurusan', array('id_jurusan' => $id_jurusan));
		redirect('jurusan','refresh');
	}

	public function deleteProdi($id_jurusan, $id_prodi)
	{
		$this->db->delete('prodi', array('id_prodi' => $id_prodi));
		redirect('jurusan/prodi/'.$id_jurusan,'refresh');
	}

	public function prodi($id_jurusan)
	{
		$jurusan            = $this->selectJurusan($id_jurusan)->jurusan;
		$data['title']      = 'Data Prodi Jurusan '.$jurusan;
		$data['title2']     = 'Tambah Prodi';
		$data['id_jurusan'] = $id_jurusan;
		$data['prodi']      = $this->db->get_where('prodi', array('id_jurusan' => $id_jurusan))->result();
		$this->load->view('jurusan/view_prodi', $data);
	}

}

/* End of file Model_jurusan.php */
/* Location: ./application/models/Model_jurusan.php */
