<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_buku');
    }

	public function buku()
	{
		echo json_encode($this->db->get('buku')->result());
	}

	public function jenis()
	{
		echo json_encode($this->db->get('jenis_buku')->result());
	}

	public function jenisBy($jenis)
	{
		echo json_encode($this->db->get_where('buku', array('jenis' => $jenis))->result());
	}

	public function inisial($inisial)
    {
        $q = "SELECT * FROM buku WHERE judul LIKE '".$inisial ."%'";
    	echo json_encode($this->db->query($q)->result());
    }

    public function searchBuku($search)
    {
        $q = "SELECT * FROM buku WHERE judul LIKE '%".$search ."%' OR pengarang LIKE '%" .$search ."%' OR penerbit LIKE '%" .$search ."%'";
    	echo json_encode($this->db->query($q)->result());
    }

}

/* End of file Api.php */
/* Location: ./application/controllers/Api.php */