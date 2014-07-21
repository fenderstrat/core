<?php if (defined('basepath')) exit('no direct script access allowed');

require APPPATH.'controllers/admin/base_admin.php';

class Halaman_controller extends Base_admin
{
    public function __construct()
    {
        parent::__construct();

        // load model
        $this->load->model(array(
            'halaman_model'
        ));

        // load class library
        $this->load->library(array(
            'halaman/halaman'
        ));
    }

    public function index()
    {
        // jika record tidak ditemukan, hasilkan null
        if ($this->halaman_model->all()->num_rows() !== 0) {
            $data['halaman'] = $this->halaman_model->all()->result();
        } else {
            $data['halaman'] = null;
        }
        $data['jumlahRowSampah'] = $this->halaman_model->all_sampah()->num_rows();
        $data['parentMenu'] = 'halaman';
        $data['childMenu'] = 'index';
        $data['title'] = 'Daftar Halaman';
        $data['template'] = 'admin/halaman/index';
        $this->load->view('admin/layout/master', $data);
    }
    public function kotak_sampah()
    {
        // jika record tidak ditemukan, hasilkan null
        if ($this->halaman_model->all_sampah()->num_rows() !== 0) {
            $data['halaman'] = $this->halaman_model->all_sampah()->result();
        } else {
            $data['halaman'] = null;
        }
        $data['parentMenu'] = 'halaman';
        $data['childMenu'] = 'index';
        $data['title'] = 'Daftar Kotak Sampah Halaman';
        $data['template'] = 'admin/halaman/sampah';
        $this->load->view('admin/layout/master', $data);
    }

    public function add()
    {     
        $data['parentMenu'] = 'halaman';
        $data['childMenu'] = 'add';  
        $data['title'] = 'Tambah halaman';
        $data['template'] =  'admin/halaman/add';
        $this->load->view('admin/layout/master', $data);
    }

    public function save()
    {
        // @file : libraries/halaman/halaman.php
        // ambil input halaman
        $post = $this->halaman->post();

        // jika nilai kembalian input halaman adalah false, redirect ke add halaman dan tampilkan pesan gagal
        if($post !== false) {
            // simpan ke database
            $this->halaman_model->save($post);

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
        redirect('admin/halaman/add');
    }

    public function edit()
    {
        // variable id halaman
        $id = $this->uri->segment(4);

        // jika halaman tidak ditemukan, tampilkan 404 error
        if($this->halaman_model->find($id)->num_rows() !== 0) {
            $data['halaman'] = $this->halaman_model->find($id)->row();
        } else {
            show_404();
        }
        $data['parentMenu'] = 'halaman';
        $data['childMenu'] = 'index';
        $data['title'] = 'Edit halaman';
        $data['template'] =  'admin/halaman/edit';
        $this->load->view('admin/layout/master', $data);
    }

    public function update()
    {
        // variable id halaman
        $id = $this->input->post('id');        

        // @file : libraries/halaman/halaman.php
        // ambil input halaman
        $post = $this->halaman->post();

        // jika nilai kembalian input halaman adalah false, redirect ke edit halaman dan tampilkan pesan gagal
        if($post !== false) {

            // update ke database
            $this->halaman_model->update($id, $post);

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

        // redirect ke halaman sebelumnya
        $link = $this->input->server('HTTP_REFERER', TRUE);
        redirect($link, 'location');
    }

    public function sampah()
    {
        $id = $this->uri->segment(4); 
        // @file : libraries/halaman/halaman.php
        // ambil input halaman
        $update = $this->halaman->sampah();
        $this->halaman_model->update($id, $update);
        $this->message->sampah();

        // redirect ke halaman sebelumnya
        $link = $this->input->server('HTTP_REFERER', TRUE);
        redirect($link, 'location');
    }

    public function draft()
    {
        $id = $this->uri->segment(4); 
        // @file : libraries/halaman/halaman.php
        // ambil input halaman
        $update = $this->halaman->draft();
        $this->halaman_model->update($id, $update);
        $this->message->draft();

        // redirect ke halaman sebelumnya
        $link = $this->input->server('HTTP_REFERER', TRUE);
        redirect($link, 'location');
    }

    public function publish()
    {
        $id = $this->uri->segment(4); 
        // @file : libraries/halaman/halaman.php
        // ambil input halaman
        $update = $this->halaman->publish();
        $this->halaman_model->update($id, $update);
        $this->message->publish();

        // redirect ke halaman sebelumnya
        $link = $this->input->server('HTTP_REFERER', TRUE);
        redirect($link, 'location');
    }

    public function delete()
    {
        // variable id halaman
        $id = $this->uri->segment(4); 
        // jika halaman tidak ditemukan, tampilkan 404 error
        if($this->halaman_model->find($id)->num_rows() !== 0) {
            $data = $this->halaman_model->find($id)->row();

            // @file : libraries/halaman/halaman.php
            // ambil input halaman
            $update = $this->halaman_model->delete($id);
            if ($update !== false) {
                $this->message->delete();
            } else {
                $this->message->delete_image_fail();
            }

            // redirect ke halaman sebelumnya
            $link = $this->input->server('HTTP_REFERER', TRUE);
            redirect($link, 'location');
        } else {
            show_404();
        }
    }

}

/* end of file halamancontroller.php */
/* location: ./application/controllers/admin/halamancontroller.php */
