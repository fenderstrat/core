<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin
{

	protected $instance;

	public function __construct()
	{
		$this->instance =& get_instance();
		# Load library
		$this->instance->load->library(array(
			'form_validation'
		));
		# Load helper
		$this->instance->load->helper(array(
			'security'
		));
	}

	public function input()
	{

		# cek validasi sesua dengan rule yang ada di config/form_validation.php
		# jika validasi gagal, tampilkan pesan gagal validasi.
		# fungsi do_hash terdapat di security helper
		if ($this->instance->form_validation->run('login') === true) {
			$data = array(
                'username' => $this->instance->input->post('username'),
                'password' => do_hash($this->instance->input->post('password'))
            );
			return $data;
		} else {
			return false;
		}
	}
}

/* End of file Admin.php */
/* Location: ./application/libraries/admin/Admin.php */
