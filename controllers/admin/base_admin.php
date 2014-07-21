<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Base_admin extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		# load library di folder libraries/services/
		$this->load->library('services/message');

		# cek session. jika session tidak ditemukan, redirect ke halaman login.
		if ($this->session->userdata('admin') == null) {
			return redirect('admin/login');
		}
	}

}

/* End of file BaseAdminController.php */
/* Location: ./application/controllers/admin/BaseAdminController.php */
