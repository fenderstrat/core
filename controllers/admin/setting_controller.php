<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH.'controllers/admin/base_admin.php';

class Setting_controller extends Base_admin
{
    public function __construct()
    {
        parent::__construct();
         // load model
        $this->load->model(array(
            'setting_model'
        ));

        // load class library
        $this->load->library(array(
            'pengaturan/setting'
        ));
    }

    public function seo()
    {
        $data = array(
            'seo'        => $this->setting_model->get_seo()->row(),
            'title'      => 'Pengaturan SEO',
            'parentMenu' => 'pengaturan',
            'childMenu'  => 'seo',
            'template'   => 'admin/pengaturan/seo'
        );
        // var_dump($data);
        $this->load->view('admin/layout/master', $data);
    }

    public function logo()
    {
        $get = $this->setting_model->get_logo()->row();
        $source = ($get !== '')
            ? base_url("assets/uploads/$get->logo")
            : null ;
        $data = array(
            'source'     => $source,
            'image'     => $get->logo,
            'title'      => 'Pengaturan Logo',
            'parentMenu' => 'pengaturan',
            'childMenu'  => 'logo',
            'template'   => 'admin/pengaturan/logo'
        );
        $this->load->view('admin/layout/master', $data);
    }

    public function favicon()
    {
        $get = $this->setting_model->get_favicon()->row();
        $source = ($get !== '')
            ? base_url("assets/uploads/$get->favicon")
            : null ;
        $data = array(
            'source'     => $source,
            'image'     => $get->favicon,
            'title'      => 'Pengaturan Favicon',
            'parentMenu' => 'pengaturan',
            'childMenu'  => 'favicon',
            'template'   => 'admin/pengaturan/favicon'
        );
        $this->load->view('admin/layout/master', $data);
    }

    public function update_seo()
    {
        $post = $this->setting->post_seo();
        $this->update($post);
    }

    public function update_logo()
    {
        $post = $this->setting->post_logo();
        $this->update($post);
    }

    public function update_favicon()
    {
        $post = $this->setting->post_favicon();
        $this->update($post);
    }

    public function update($post)
    {
        // jika nilai kembalian input setting adalah false, redirect ke add setting dan tampilkan pesan gagal
        if($post !== false) {
            // simpan ke database
            $this->setting_model->update($post);

            // @file : libraries/services/message.php
            // tampilkan pesan berhasil
            $this->message->update_success();
        } else {
            // @file : libraries/services/message.php
            // Tampilkan validasi error
            $this->message->validation();
            // tampilkan pesan gagal
            $this->message->add_fail();
        }
        redirect($this->input->server('HTTP_REFERER', TRUE), 'location');
    }
}

/* End of file setting_controller.php */
/* Location: ./application/controllers/admin/setting_controller.php */