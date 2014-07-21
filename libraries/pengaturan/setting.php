<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Setting
{

    protected $instance;

    public function __construct()
   {
        $this->instance =& get_instance();
        // Load library
        $this->instance->load->library(array(
            'form_validation', 'services/media',
        ));
        // Load helper
        $this->instance->load->helper(array(
            'services'
        ));
    }

    /**
     * function yang digunakan untuk mengambil input add seo
     * @return boolean jika validasi gagal
     * @return string  jika validasi berhasil
     */
    public function post_seo()
    {
        /**
         * Cek validasi sesuai dengan rule yang ada di config/form_validation.php
         * Jika validasi gagal, tampilkan pesan gagal validasi.
         */
        if ($this->instance->form_validation->run('seo') === true) {
            $data = array(
                'web_title'         => $this->instance->input->post('title'),
                'web_description'   => $this->instance->input->post('description'),
                'web_keyword'       => $this->instance->input->post('keyword')
            );
            return $data;
        } else {
            /**
             * @file  : helper/services_helper.php;
             * Repopulate data yang disubmit
             */
            redata();

            return false;
        }
    }

    /**
     * function yang digunakan untuk mengambil input add contact
     * @return boolean jika validasi gagal
     * @return string  jika validasi berhasil
     */
    public function post_logo()
    {
        /** Cek apakah ada gambar yang diupload */
        // $this->instance->form_validation->set_rules('logo', 'logo', 'required|xss_clean');
        if ($_FILES['logo']['name'] === '')
            return false;

        $image_upload = $this->instance->media->upload('logo');
        if ($image_upload  !== false) {
            $this->instance->media->remove(
                $this->instance->input->post('image')
            );
            $data = array('logo'  => $image_upload);
        } else {
            $data = false;
        }
        return $data;
    }

    /**
     * function yang digunakan untuk mengambil input add contact
     * @return boolean jika validasi gagal
     * @return string  jika validasi berhasil
     */
    public function post_favicon()
    {
        /** Cek apakah ada gambar yang diupload */
        if ($_FILES['favicon']['name'] === '')
            return false;

        $image_upload = $this->instance->media->upload('favicon');
        if ($image_upload  !== false) {
            $this->instance->media->remove(
                $this->instance->input->post('image')
            );
            $data = array('favicon'  => $image_upload);
        } else {
            $data = false;
        }
        return $data;
    }
}
/* End of file seo.php */
/* Location: ./application/libraries/seo/seo.php */
