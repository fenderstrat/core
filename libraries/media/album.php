<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Album
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
            'services'
        ));
    }

    /**
     * function yang digunakan untuk mengambil input add halaman
     * @return boolean jika validasi gagal
     * @return string  jika validasi berhasil
     */
    public function post()
    {
        /**
         * Cek validasi sesuai dengan rule yang ada di config/form_validation.php
         * Jika validasi gagal, tampilkan pesan gagal validasi.
         */
        if ($this->instance->form_validation->run('album') === true) {

            $data = array(
                'judul' => $this->instance->input->post('judul')
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

    public function post_galeri()
    {
        $gambar = $_FILES['gmbr']['name'];
        $caption = $this->instance->input->post('alt');
        $htng = count($gambar);
        $main = true;
        for ($i=0; $i < $htng ; $i++) {
            if (strlen($gambar[$i]) === 0 || strlen($caption[$i]) === 0) {
                $this->instance->message->semua_data_image();
                $main = false;
                return $main;
                break;
            }
        }
        if ($main === true) {
            for ($i=0; $i < $htng ; $i++) {
                $file = $gambar[$i];
                $a = explode('.', $file);
                $ext = $a[count($a)-1];
                $fileName[] = url_title($caption[$i]) . '.' . $ext;
            }
            $this->instance->message->add_success();
            $image_upload = $this->instance->media->upload_galeri('gmbr',$fileName);
            return $image_upload;
        }
           
    }

    public function delete_image($data)
    {
        $cek = true;
        foreach ($data as $value) {
            $delete = $this->instance->media->remove($value->image);
            if ($delete != true) {
                $cek = false;
                break;
            }
        }
        
        if ($cek === true) {
            $update = array('image' => null);
            return $update;
        } else {
            return false;
        }
    }

}

/* End of file halaman.php */
/* Location: ./application/libraries/halaman/halaman.php */
