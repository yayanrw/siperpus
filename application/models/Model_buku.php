<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_buku extends CI_Model {

	public function index()
	{
		return $this->db->get('buku')->result();
	}

	public function select($id_buku)
	{
		return $this->db->get_where('buku', array('id_buku' => $id_buku))->row();
	}

	public function selectJenisBuku($id_jenis)
	{
		return $this->db->get_where('jenis_buku', array('id_jenis' => $id_jenis))->row();
	}

	public function add()
	{
		$object = array(
			'judul'        => $this->input->post('judul'),
			'jenis'        => $this->input->post('jenis'),
			'pengarang'    => $this->input->post('pengarang'),
			'penerbit'     => $this->input->post('penerbit'),
			'tahun_terbit' => $this->input->post('tahun_terbit'),
			'jumlah'       => $this->input->post('jumlah'),
			'lokasi'       => $this->input->post('lokasi'),
			'tgl_input'    => date("Y-m-d")
		);
		$this->db->insert('buku', $object);
		$this->session->set_flashdata('info', 'Data berhasil ditambahkan!');
		redirect('buku','refresh');
	}

	public function addJenisBuku()
	{
		$object = array('jenis' => $this->input->post('jenis') );
		$this->db->insert('jenis_buku', $object);
		redirect('buku/jenisbuku','refresh');
	}

	public function edit($id_buku)
	{
		$data['title'] = 'Ubah Data Buku';
		$data['buku']  = $this->select($id_buku);
		$data['jenis'] = $this->getJenis();
		$this->load->view('buku/view_bukuupdate', $data);
	}

	public function showByJenis($jenis, $limit)
    {
        $q = "select * from buku where jenis = '". $jenis ."' limit ".$limit;
        return $this->db->query($q)->result();
    }

	public function update($id_buku)
	{
		$object = array(
			'judul'        => $this->input->post('judul'),
			'jenis'        => $this->input->post('jenis'),
			'pengarang'    => $this->input->post('pengarang'),
			'penerbit'     => $this->input->post('penerbit'),
			'tahun_terbit' => $this->input->post('tahun_terbit'),
			'jumlah'       => $this->input->post('jumlah'),
			'lokasi'       => $this->input->post('lokasi')
		);
		$this->db->update('buku', $object, array('id_buku' => $id_buku));
		$this->session->set_flashdata('info', 'Data berhasil diubah!');
		redirect('buku','refresh');
	}

	public function updateJenisBuku($id_jenis)
	{
		$object = array(
			'jenis' => $this->input->post('jenis')
		);
		$this->db->update('jenis_buku', $object, array('id_jenis' => $id_jenis));
		$this->session->set_flashdata('info', 'Data berhasil diubah!');
		redirect('buku/jenisbuku','refresh');
	}

	public function editJenisBuku($id_jenis)
	{
		$data['title'] = 'Ubah Data Jenis Buku';
		$data['jenisbuku']  = $this->selectJenisBuku($id_jenis);
		$data['jenis'] = $this->getJenis();
		$this->load->view('buku/view_jenisbukuupdate', $data);
	}

	public function getJenis()
	{
		return $this->db->get('jenis_buku')->result();
	}

	public function delete($id_buku)
	{
		$this->db->delete('buku', array('id_buku' => $id_buku));
		$this->session->set_flashdata('info', 'Data berhasil dihapus!');
		redirect('buku','refresh');
	}

	public function deleteJenisBuku($id_jenis)
	{
		$this->db->delete('jenis_buku', array('id_jenis' => $id_jenis));
		$this->session->set_flashdata('info', 'Data berhasil dihapus!');
		redirect('buku/jenisbuku','refresh');
	}
}

/* End of file Model_buku.php */
/* Location: ./application/models/Model_buku.php */
