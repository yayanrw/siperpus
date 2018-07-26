<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_sistem extends CI_Model {

	public function getSistem()
	{
		return $this->db->get_where('sistem', array('id_sistem' => '1'))->row();
	}	

}

/* End of file Model_sistem.php */
/* Location: ./application/models/Model_sistem.php */