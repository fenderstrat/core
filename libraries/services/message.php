<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Message
{
	protected $instance;

	public function __construct()
	{
		$this->instance =& get_instance();
		$this->instance->load->library('session');
	}

	public function login_failed()
	{
		$this->instance->session->set_flashdata(
			'login_failed',
			'Gagal login! Pastikan username dan password Anda sudah benar!'
		);
	}

	public function validation()
	{
		$this->instance->session->set_flashdata(
			'validation',
			validation_errors()
		);
	}

	public function add_success()
	{
		$this->instance->session->set_flashdata(
			'success',
			'Data berhasil ditambahkan'
		);
	}

	public function add_fail()
	{
		$this->instance->session->set_flashdata(
			'fail',
			'Data gagal ditambahkan'
		);
	}


	public function update_success()
	{
		$this->instance->session->set_flashdata(
			'success',
			'Data berhasil diubah'
		);
	}

	public function update_fail()
	{
		$this->instance->session->set_flashdata(
			'fail',
			'Data gagal diubah'
		);
	}

	public function upload_error()
	{
		$this->instance->session->set_flashdata(
			'upload_error',
			$this->instance->upload->display_errors()
		);
	}
	public function semua_data_image()
	{
		$this->instance->session->set_flashdata(
			'dataImage',
			'Semua Gambar Dan Caption Harus Diisi'
		);
	}

	public function delete_image_success()
	{
		$this->instance->session->set_flashdata(
			'success',
			'Image berhasil dihapus'
		);
	}

	public function delete_image_fail()
	{
		$this->instance->session->set_flashdata(
			'fail',
			'Image gagal dihapus'
		);
	}

	public function sampah()
	{
		$this->instance->session->set_flashdata(
			'success',
			'Data dipindah ke kotak sampah'
		);
	}

	public function publish()
	{
		$this->instance->session->set_flashdata(
			'success',
			'Data Telah Diterbitkan'
		);
	}

	public function draft()
	{
		$this->instance->session->set_flashdata(
			'success',
			'Status Data Menjadi Draft'
		);
	}

	public function delete()
	{
		$this->instance->session->set_flashdata(
			'success',
			'Data berhasil dihapus'
		);
	}

	public function delete_fail()
	{
		$this->instance->session->set_flashdata(
			'fail',
			'Data gagal dihapus'
		);
	}

	public function data_find($data)
	{
		$this->instance->session->set_flashdata(
			'fail',
			$data.' Sudah Dipakai'
		);
	}

}

/* End of file message.php */
/* Location: ./application/libraries/message.php */
