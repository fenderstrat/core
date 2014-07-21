<?php if (defined('basepath')) exit('no direct script access allowed');

require APPPATH.'controllers/admin/base_admin.php';

class User_controller extends Base_admin
{
    public function __construct()
    {
        parent::__construct();

        // load model
        $this->load->model(array(
            'user_model'
        ));

        // load class library
        $this->load->library(array(
            'user/user'
        ));
    }

    public function index()
    {
        $username = $this->session->userdata('admin');
        // jika record tidak ditemukan, hasilkan null
        if ($this->user_model->all_ex($username)->num_rows() !== 0) {
            $data['user'] = $this->user_model->all_ex($username)->result();
        } else {
            $data['user'] = null;
        }

        $data['parentMenu'] = 'user';
        $data['childMenu'] = 'index';
        $data['title'] = 'Olah Data User';
        $data['template'] = 'admin/user/index';
        $this->load->view('admin/layout/master', $data);
    }

    public function save()
    {
        // @file : libraries/user/user.php
        // ambil input user
        $post = $this->user->post();

        #cek apakah username atau email tersedia
        $whr = 'username';
        $key = $this->input->post('username');
        if ( $this->user_model->find_data($whr,$key)->num_rows() != 0 ) {
            $this->message->data_find('Username');
            redirect('admin/user');
        }
        $whr = 'email';
        $key = $this->input->post('email');
        if ( $this->user_model->find_data($whr,$key)->num_rows() != 0 ) {
            $this->message->data_find('Email');
            redirect('admin/user');
        }

        // jika nilai kembalian input user adalah false, redirect ke index user dan tampilkan pesan gagal
        if($post !== false) {
            // simpan ke database
            $this->user_model->save($post);

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
        redirect('admin/user/');
    }


    public function edit()
    {
        // variable id user
        $id = $this->uri->segment(4);
        // jika user tidak ditemukan, tampilkan 404 error
        if($this->user_model->find($id)->num_rows() !== 0) {
            $data['user_single'] = $this->user_model->find($id)->row();
        } else {
            show_404();
        }

        $username = $this->session->userdata('admin');
        // jika record tidak ditemukan, hasilkan null
        if ($this->user_model->all_ex($username)->num_rows() !== 0) {
            $data['user'] = $this->user_model->all_ex($username)->result();
        } else {
            $data['user'] = null;
        }

        $data['parentMenu'] = 'user';
        $data['childMenu'] = 'index';
        $data['title'] = 'Olah Data User '.$data['user_single']->username;
        $data['template'] = 'admin/user/index';
        $this->load->view('admin/layout/master', $data);
    }

    public function update()
    {
        // variable id user
        $id = $this->input->post('user');

        // @file : libraries/user/user.php
        // ambil input user
        $post = $this->user->post();

        // jika nilai kembalian input user adalah false, redirect ke edit user dan tampilkan pesan gagal
        if($post !== false) {

            // update ke database
            $this->user_model->update($id, $post);

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

    public function delete()
    {
        // variable id menu
        $id = $this->uri->segment(4);
        // jika menu tidak ditemukan, tampilkan 404 error
        if($this->user_model->find($id)->num_rows() !== 0) {
            $data = $this->user_model->find($id)->row();

            $update = $this->user->delete_image($data);
            if ($update !== false) {
                // update ke database
                $this->user_model->delete($id);
                $this->message->delete();
            } else {
                $this->message->delete_fail();
            }

            // redirect ke menu sebelumnya
            redirect('admin/user/');
        } else {
            show_404();
        }
    }


}

/* end of file User_controller.php */
/* location: ./application/controllers/admin/User_controller.php */
