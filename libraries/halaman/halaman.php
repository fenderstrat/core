<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Halaman
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
        if ($this->instance->form_validation->run('halaman') === true) {

            // jika tanggal kosong masukkan tanggal hari ini.
            if ($this->instance->input->post('tgl') === '') {
                $tanggal = date("Y-m-d H:i:s");
            } else {
                $string = $this->instance->input->post('tgl');
                $ymd = explode("/", $string);
                $time = explode(" ", $ymd[2]);
                $tanggal = $time[0].'-'.$ymd[1].'-'.$ymd[0].' '.$time[1];
            }

            // jika deskripsi kosong ambil deskripsi dari pos.
            if ($this->instance->input->post('deskripsi') === '') {
                $deskripsi = get_first_paragraph($this->instance->input->post('isi'));
            } else {
                $deskripsi = $this->instance->input->post('deskripsi');
            }

            $data = array(
                'judul' => $this->instance->input->post('jd'),
                'isi' => $this->instance->input->post('isi'),
                'deskripsi' => $deskripsi,
                'tag' => $this->instance->input->post('tag'),
                'status' => $this->instance->input->post('sts'),
                'tanggal' => $tanggal
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

    public function sampah()
    {
        return array('status'=>'sampah');
    }

    public function publish()
    {
        return array('status'=>'publish');
    }

    public function draft()
    {
        return array('status'=>'draft');
    }
}

/* End of file halaman.php */
/* Location: ./application/libraries/halaman/halaman.php */
