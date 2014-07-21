<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class artikel
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
     * function yang digunakan untuk mengambil input add artikel
     * @return boolean jika validasi gagal
     * @return string  jika validasi berhasil
     */
    public function post()
    {
        /**
         * Cek validasi sesuai dengan rule yang ada di config/form_validation.php
         * Jika validasi gagal, tampilkan pesan gagal validasi.
         */
        if ($this->instance->form_validation->run('artikel') === true) {

            //contoh tanggal 17/04/2014 21.00:58
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

            /**
             * Cek apakah ada gambar yang diupload
             */
            if ($_FILES['ico']['name'] == '') {
                $data = array(
                    'judul' => $this->instance->input->post('jd'),
                    'isi' => $this->instance->input->post('isi'),
                    'deskripsi' => $deskripsi,
                    'tag' => $this->instance->input->post('tag'),
                    'status' => $this->instance->input->post('sts'),
                    'tanggal' => $tanggal,
                    'post_type' => 'post'
                );
             } else {
                $image_upload = $this->instance->media->upload('ico');
                if ($image_upload  !== false) {
                    $this->instance->media->remove(
                        $this->instance->input->post('image')
                    );
                    $data = array(
                        'judul' => $this->instance->input->post('jd'),
                        'isi' => $this->instance->input->post('isi'),
                        'deskripsi' => $deskripsi,
                        'tag' => $this->instance->input->post('tag'),
                        'status' => $this->instance->input->post('sts'),
                        'tanggal' => $tanggal,
                        'image' => $image_upload,
                        'post_type' => 'post'
                    );

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

    public function post_kategori()
    {
        // simpan kategori sebagai array
        $data = array();

        /**
         * jika input 'id' ditemukan, $data akan menghasilkan proses insert
         * jika input 'id' tidak ditemukan, $data akan menghasilkan proses update
         */
        if ($this->instance->input->post('id')  == 0) {

            //cek jika kategori kosong
            if ($this->instance->input->post('kategori') == "") {
                // masukkan kategori dengan id 1 (uncategorized) jika kategori tidak dipilih.
                //  ambil id terbaru dari artikel yang dimasukkan di database.
                $data[] = array(
                    'kategori_id' 	=> 1,
                    'artikel_id' 	=> $this->instance->db->insert_id()
                );
            } else {
                // masukkan kategori sebagai array.
                //  ambil id terbaru dari artikel yang dimasukkan di database.
                foreach ($this->instance->input->post('kategori') as $kategori_array) {
                    $data[] = array(
                        'kategori_id' 	=> $kategori_array,
                        'artikel_id' 	=> $this->instance->db->insert_id()
                    );

                }
            }
        } else {

             //cek jika kategori kosong
            if ($this->instance->input->post('kategori') == "") {
                // masukkan kategori dengan id 1 (uncategorized) jika kategori tidak dipilih.
                // ambil id terbaru dari artikel yang dimasukkan di database.
                $data[] = array(
                    'kategori_id'   => 1,
                    'artikel_id'    => $this->instance->input->post('id')
                );
            } else {
                // masukkan kategori sebagai array.
                // ambil id terbaru dari artikel yang dimasukkan di database.
                foreach ($this->instance->input->post('kategori') as $kategori_array) {
                    $data[] = array(
                        'kategori_id'   => $kategori_array,
                        'artikel_id'    => $this->instance->input->post('id')
                    );

                }
            }
        }

        return $data;
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

    public function delete_image($data)
    {
        $delete = $this->instance->media->remove($data->image);
        if ($delete === true) {
            $update = array('image' => null);
            return $update;
        } else {
            return false;
        }
    }

}

/* End of file Artikel.php */
/* Location: ./application/libraries/artikel/Artikel.php */
