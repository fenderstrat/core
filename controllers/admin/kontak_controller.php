<?php if (defined('basepath')) exit('no direct script access allowed');

require APPPATH.'controllers/admin/base_admin.php';

class Kontak_controller extends Base_admin
{
    public function __construct()
    {
        parent::__construct();

        // load model
        $this->load->model(array(
            'kontak_model'
        ));

        // load class library
        $this->load->library(array(
            'pengaturan/kontak'
        ));
    }

    public function index()
    {
        // // jika record tidak ditemukan, hasilkan null
        if ($this->kontak_model->find_data()->num_rows() !== 0) {
            $data['kontak'] = $this->kontak_model->find_data()->row();
        } else {
            $data['kontak'] = null;
        }

        $data['parentMenu'] = 'pengaturan';
        $data['childMenu'] = 'kontak';
        $data['title'] = 'Olah Data Kontak';
        $data['template'] = 'admin/pengaturan/kontak';
        $this->load->view('admin/layout/master', $data);
    }

    public function update()
    {
        // @file : libraries/kontak/kontak.php
        // ambil input kontak
        $post = $this->kontak->post();

        // jika nilai kembalian input kontak adalah false, redirect ke index kontak dan tampilkan pesan gagal
        if($post !== false) {
            // simpan ke database
            $this->kontak_model->update($post);

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
        redirect('admin/kontak/');
    }
 

}

/* end of file Kontak_controller.php */
/* location: ./application/controllers/admin/Kontak_controller.php */
