<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kontak
{

    protected $instance;

   public function __construct()
   {
        $this->instance =& get_instance();
        // Load library
        $this->instance->load->library(array(
            'form_validation',
            'services/media',
        ));
        // Load helper
        $this->instance->load->helper(array(
            'services','security'
        ));
    }

    /**
     * function yang digunakan untuk mengambil input add kontak
     * @return boolean jika validasi gagal
     * @return string  jika validasi berhasil
     */
    public function post()
    {
        /**
         * Cek validasi sesuai dengan rule yang ada di config/form_validation.php
         * Jika validasi gagal, tampilkan pesan gagal validasi.
         */
        if ($this->instance->form_validation->run('kontak') === true) {

        	$data = array(
                    'judul' => $this->instance->input->post('judul'),
                    'deskripsi' => $this->instance->input->post('deskripsi'),
                    'email' => $this->instance->input->post('email'),
                    'phone' => $this->instance->input->post('phone'),
                    'logitude' => $this->instance->input->post('logitude'),
                    'latitude' => $this->instance->input->post('latitude')
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

    // public function delete_image($data)
    // {
    //     $delete = $this->instance->media->remove($data->photo);
    //     if ($delete === true) {
    //         $update = array('image' => null);
    //         return $update;
    //     } else {
    //         return false;
    //     }
    // }

}

/* End of file kontak.php */
/* Location: ./application/libraries/pengaturan/kontak.php */
