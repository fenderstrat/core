<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('artikel_model');
		$this->load->model('menu_model');
	}
	public function index()
	{
		// Pagination
		$offset = $this->uri->segment(2);
		$base_url = base_url();
		$per_page = 2;
		$total_rows = $this->artikel_model->all()->num_rows();
		Pagination::main($base_url, $per_page, $total_rows);

		if ($this->artikel_model->all()->num_rows() !=0) {
			$data['artikel'] = $this->artikel_model->all_limit($per_page, $offset)->result();
			$data['artikel_bawah'] = $this->artikel_model->all_limit(6, $offset)->result();
		} else {
			$data['artikel'] = null;
		}
		$data['title'] = 'Komisi Pemilihan Umum Kabupaten Mukomuko';
		$this->load->view('template/home',$data);
	}

	public function test()
	{
		//$this->load->library('pengaturan/widgets');
		$this->load->view('welcome_message');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */