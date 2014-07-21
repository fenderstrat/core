<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Halaman extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array(
			'halaman_model'
		));
	}

	public function index()
	{
		$id = $this->uri->segment(3);
		if ($this->halaman_model->find($id)->num_rows() !=0) {
			$data['halaman'] = $this->halaman_model->find($id)->row();
			$data['title'] = $data['halaman']->judul;
			$data['description'] = $data['halaman']->deskripsi;
			$data['tanggal'] = null;
			$data['tag'] = $data['halaman']->tag;
			$data['isi'] = $data['halaman']->isi;
			$data['content'] = 'template/single';
			$this->load->view('template/index', $data);
		} else {
			show_404();
		}
	}

}

/* End of file halaman.php */
/* Location: ./application/controllers/halaman.php */