<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_upload extends CI_Model {

	public function uploadFile($dir)
	{
		$config['upload_path']   = './public/img/'.$dir.'/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']      = '3000';
		// $config['max_width']     = '10240';
		// $config['max_height']    = '7680';

		$this->load->library('upload', $config);
	}

}

/* End of file Model_upload.php */
/* Location: ./application/models/Model_upload.php */
