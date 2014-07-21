<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Artikel extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array(
			'artikel_model', 'kategori_model'
		));
	}

	public function index()
	{
		$offset = $this->uri->segment(3);
		$base_url = base_url('artikel/index');
		$per_page = 2;
		$total_rows = $this->artikel_model->get_all($per_page, $offset)->num_rows();
		Pagination::main($base_url, $per_page, $total_rows);

		if ($this->artikel_model->all_limit($per_page, $offset)->num_rows() !=0) {
			$data['artikel'] = $this->artikel_model->all_limit($per_page, $offset)->result();
		} else {
			$data['artikel'] = null;
		}
		
		if ($this->kategori_model->all()->num_rows() !=0) {
			$data['kategori'] = $this->kategori_model->all()->result();
		} else {
			$data['kategori'] = null;
		}

		$data['title'] = 'Daftar Berita';
		$data['description'] = 'Daftar Berita';
		$data['content'] = 'template/arsip';
		$data['tag'] = '';
		$this->load->view('template/index', $data);
	}

	public function show()
	{
		$id = $this->uri->segment(3);
		
		# Tampilkan berita berdasarkan id
		$get_id_publish = $this->artikel_model->get_id($id,'publish')->num_rows();

		if($this->uri->segment(4) == '' || $get_id_publish == 0) {
			show_404();
		}

		$data['artikel_id'] = $this->artikel_model->find($id)->row();
		// var_dump($data['artikel_id']);
		$data['title'] = $data['artikel_id']->judul;
		$data['description'] = $data['artikel_id']->deskripsi;
		$data['tanggal'] = $data['artikel_id']->tanggal;
		$data['tag'] = $data['artikel_id']->tag;
		$data['isi'] = $data['artikel_id']->isi;
		
		$data['content'] = 'template/single';
		$this->load->view('template/index', $data);
	}

	


}

/* End of file artikel.php */
/* Location: ./application/controllers/artikel.php */