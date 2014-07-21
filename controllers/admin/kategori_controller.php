<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH.'controllers/admin/base_admin.php';

class Kategori_controller extends Base_admin {

	public function __construct()
	{
		parent::__construct();

        // load model
        $this->load->model(array(
           'kategori_model'
        ));

        // load class library
        $this->load->library(array(
            'kategori/kategori'
        ));
	}

	public function index()
	{
		// jika record tidak ditemukan, hasilkan null
        if ($this->kategori_model->all()->num_rows() !== 0) {
            $data['kategori'] = $this->kategori_model->all()->result();
        } else {
            $data['kategori'] = null;
        }

        $data['parentMenu'] = 'artikel';
        $data['childMenu'] = 'kategori';
        $data['title'] = 'Pengolahan Kategori';
        $data['template'] = 'admin/kategori/index';
        $this->load->view('admin/layout/master', $data);
	}

	public function save()
    {
        // @file : libraries/kategori/kategori.php
        // ambil input kategori
        $post = $this->kategori->post();

        // jika nilai kembalian input kategori adalah false, redirect ke index kategori dan tampilkan pesan gagal
        if($post !== false) {
            // simpan ke database
            $this->kategori_model->save($post);

            // @file : libraries/services/message.php
            // tampilkan pesan berhasil
            $this->message->add_success();
        } else {
            // @file : libraries/services/message.php
            // Tampilkan validasi error
            $this->message->validation();

            // tampilkan pesan gagal
            $this->message->add_fail();
        }
        redirect('admin/kategori/');
    }

    public function edit()
    {
        // variable id kategori
        $id = $this->uri->segment(4);

        // jika kategori tidak ditemukan, tampilkan 404 error
        if($this->kategori_model->find($id)->num_rows() !== 0) {
            $data['kategori_single'] = $this->kategori_model->find($id)->row();
        } else {
            show_404();
        }
        // jika record tidak ditemukan, hasilkan null
        if ($this->kategori_model->all()->num_rows() !== 0) {
            $data['kategori'] = $this->kategori_model->all()->result();
        } else {
            $data['kategori'] = null;
        }
        $data['parentMenu'] = 'artikel';
        $data['childMenu'] = 'kategori';
        $data['title'] = 'Edit Kategori '.$data['kategori_single']->kategori;
        $data['template'] =  'admin/kategori/index';
        $this->load->view('admin/layout/master', $data);
    }

    public function update()
    {
        // variable id kategori
        $id = $this->input->post('id');

        // @file : libraries/kategori/kategori.php
        // ambil input kategori
        $post = $this->kategori->post();

        // jika nilai kembalian input kategori adalah false, redirect ke edit kategori dan tampilkan pesan gagal
        if($post !== false) {

            // update ke database
            $this->kategori_model->update($id, $post);

            // @file : libraries/services/message.php
            // tampilkan pesan berhasil
            $this->message->update_success();
        } else {
            // @file : libraries/services/message.php
            // Tampilkan validasi error
            $this->message->validation();
            // tampilkan pesan gagal
            $this->message->update_fail();
        }

        // redirect ke kategori sebelumnya
        $link = $this->input->server('HTTP_REFERER', TRUE);
        redirect($link, 'location');
    }

    public function delete()
    {
        // variable id kategori
        $id = $this->uri->segment(4);
        // jika kategori tidak ditemukan, tampilkan 404 error
        if($this->kategori_model->find($id)->num_rows() !== 0) {
            $data = $this->kategori_model->find($id)->row();

            // @file : libraries/kategori/kategori.php
            // ambil input kategori
            $update = $this->kategori_model->delete_kategori_artikel($id);
            if ($update !== false) {
                // update ke database
            	$this->kategori_model->delete($id);
                $this->message->delete();
            } else {
                $this->message->delete_fail();
            }

            // redirect ke kategori sebelumnya
            $link = $this->input->server('HTTP_REFERER', TRUE);
            redirect($link, 'location');
        } else {
            show_404();
        }
    }

}

/* End of file kategori_controller.php */
/* Location: ./application/controllers/admin/kategori_controller.php */