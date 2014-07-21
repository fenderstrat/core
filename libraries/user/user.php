<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User
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

    function array_push_associative(&$arr) {
       $args = func_get_args();
       foreach ($args as $arg) {
           if (is_array($arg)) {
               foreach ($arg as $key => $value) {
                   $arr[$key] = $value;
                   $ret++;
               }
           }else{
               $arr[$arg] = "";
           }
       }
       return $ret;
    }
    /**
     * function yang digunakan untuk mengambil input add user
     * @return boolean jika validasi gagal
     * @return string  jika validasi berhasil
     */
    public function post()
    {
        /**
         * Cek validasi sesuai dengan rule yang ada di config/form_validation.php
         * Jika validasi gagal, tampilkan pesan gagal validasi.
         */
        $pass = array('password' => do_hash($this->instance->input->post('password')));
        if ($this->instance->uri->segment(3) == 'update') {
            $validation = 'user_edit';
        } else {
            $validation = 'user';
        }
        if ($this->instance->form_validation->run($validation) === true) {
            /**
             * Cek apakah ada gambar yang diupload
             */
            if ($_FILES['photo']['name'] == '') {

                $data = array(
                    'username' => preg_replace("![^a-z0-9]+!i", "", $this->instance->input->post('username')),
                    'level' => $this->instance->input->post('level'),
                    'last_login' => 0,
                    'nama' => $this->instance->input->post('nama'),
                    'email' => $this->instance->input->post('email'),
                );

                if ($this->instance->input->post('password') != '') {
                   $this->array_push_associative($data,$pass);
                }
             } else {
                $image_upload = $this->instance->media->upload('photo');
                if ($image_upload  !== false) {
                    $this->instance->media->remove(
                        $this->instance->input->post('images')
                    );
                    $data = array(
                        'username' => preg_replace("![^a-z0-9]+!i", "", $this->instance->input->post('username')),
                        'level' => $this->instance->input->post('level'),
                        'last_login' => 0,
                        'nama' => $this->instance->input->post('nama'),
                        'email' => $this->instance->input->post('email'),
                        'photo' => $image_upload
                    );
                    if ($this->instance->input->post('password') != '') {
                       $this->array_push_associative($data,$pass);
                    }

                } else {
                    $data = false;
                }
            }

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

    public function delete_image($data)
    {
        $delete = $this->instance->media->remove($data->photo);
        if ($delete === true) {
            $update = array('image' => null);
            return $update;
        } else {
            return false;
        }
    }

}

/* End of file user.php */
/* Location: ./application/libraries/user/user.php */
