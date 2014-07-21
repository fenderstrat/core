<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Menu
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
        //Load Model 
        $this->instance->load->model(array(
            'menu_model'
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
        if ($this->instance->form_validation->run('menu') === true) {
            if ($this->instance->input->post('id')) {
                $id = $this->instance->input->post('id');
                $menu = $this->instance->menu_model->find($id)->row();
                $rang = $menu->rang;
            } else {
                $menu = $this->instance->menu_model->max()->row();
                $rang = $menu->rang + 1;
            }
            $data = array(
                'name' => $this->instance->input->post('menu'),
                'link' => $this->instance->input->post('link'),
                'parent_id' => $this->instance->input->post('parent'),
                'rang' => $rang,
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


    public function delete()
    {
        return array('parent_id'=>'0');
    }

}

/* End of file halaman.php */
/* Location: ./application/libraries/halaman/halaman.php */
