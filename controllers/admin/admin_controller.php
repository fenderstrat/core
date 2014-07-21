<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once 'base_admin.php';

class Admin_controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		# Load model
		$this->load->model(array(
			'user_model'
		));
		# Load class library
		$this->load->library(array(
			'admin/admin',
			'services/message'
		));
	}

	public function index()
	{
		# Jika session admin tidak ditemukan, redirect ke login
		if($this->session->userdata('admin')){
			$data['parentMenu'] = 'dashboard';
			$data['childMenu'] = 'index';
			$data['title'] = 'Dashboard';
			$data['template'] =  'admin/dashboard/index';
			$this->load->view('admin/layout/master', $data);
		} else {
			redirect('admin/login');
		} 

	}
	
	public function login()
	{
		$this->load->view('admin/layout/login');
	}

	public function process()
	{
		# File : libraries/admin/admin.php
		# Ambil input artikel
		# jika validasi gagal, tampilkan form login
		if($this->admin->input() !== false) {
			$data = $this->admin->input();

			# cek data di database
			$check_user =  $this->user_model->check_user($data);

			# jika ditemukan, tambahkan session admin dan level admin
			# jika tidak ditemukan, tampilan pesan gagal (library : message; method : login_failed)
			if($check_user->num_rows() === 1) {
				$get_user = $check_user->row();
				$this->session->set_userdata( array(
					'admin' => $get_user->username,
					'level' => $get_user->level,
					'photo' => $get_user->photo
				));
				redirect('admin');
			} else {
				$this->message->login_failed();
			} 
		} else {
			# pesan validasi error
			$this->message->validation();
		}
		redirect('admin/login');
	}

	public function logout()
	{
		$this->session->unset_userdata('admin');
		$this->session->unset_userdata('level');
		redirect('admin/login');
	}

}

/* End of file AdminController.php */
/* Location: ./application/controllers/admin/AdminController.php */