<?php if (defined('basepath')) exit('no direct script access allowed');

require APPPATH.'controllers/admin/base_admin.php';

class Artikel_controller extends Base_admin
{
    public function __construct()
    {
        parent::__construct();

        // load model
        $this->load->model(array(
            'artikel_model', 'kategori_model'
        ));

        // load class library
        $this->load->library(array(
            'artikel/artikel'
        ));
    }

    public function index()
    {
        // jika record tidak ditemukan, hasilkan null
        if ($this->artikel_model->all()->num_rows() !== 0) {
            $data['artikel'] = $this->artikel_model->all()->result();

            // loop kategori artikel 
            $i = 1;
            foreach ($data['artikel'] as $row) :
                $data['artikel_kategori'.$i] = $this->artikel_model->checked_kategori($row->artikel_id)->result();
                $i++;
            endforeach;    

        } else {
            $data['artikel'] = null;
            $data['artikel_kategori'] = null;
        }
        $data['jumlahRowSampah'] = $this->artikel_model->all_sampah()->num_rows();
        $data['parentMenu'] = 'artikel';
        $data['childMenu'] = 'index';
        $data['title'] = 'Daftar Artikel';
        $data['template'] = 'admin/artikel/index';
        $this->load->view('admin/layout/master', $data);
    }

    public function kotak_sampah()
    {
        // jika record tidak ditemukan, hasilkan null
        if ($this->artikel_model->all_sampah()->num_rows() !== 0) {
            $data['artikel'] = $this->artikel_model->all_sampah()->result();

            // loop kategori artikel 
            $i = 1;
            foreach ($data['artikel'] as $row) :
                $data['artikel_kategori'.$i] = $this->artikel_model->checked_kategori($row->artikel_id)->result();
                $i++;
            endforeach;    

        } else {
            $data['artikel'] = null;
            $data['artikel_kategori'] = null;
        }
        $data['parentMenu'] = 'artikel';
        $data['childMenu'] = 'index';
        $data['title'] = 'Daftar Kotak Sampah Artikel';
        $data['template'] = 'admin/artikel/sampah';
        $this->load->view('admin/layout/master', $data);
    }

    public function add()
    {       

        // jika record ditemukan, tampilkan record
        // jika record tidak ditemukan, hasilkan null
        if($this->kategori_model->all()->num_rows() !== 0){
            $data['kategori'] = $this->kategori_model->all()->result();
        } else {
            $data['kategori'] = null;
        } 
        //buat ngaktifin class='active' di menu sidebar
        $data['parentMenu'] = 'artikel';
        $data['childMenu'] = 'add';
        $data['title'] = 'Tambah Artikel';
        $data['template'] =  'admin/artikel/add';
        $this->load->view('admin/layout/master', $data);
    }

    public function save()
    {
        // @file : libraries/artikel/artikel.php
        // ambil input artikel
        $post = $this->artikel->post();

        // jika nilai kembalian input artikel adalah false, redirect ke add artikel dan tampilkan pesan gagal
        if($post !== false) {
            // simpan ke database
            $this->artikel_model->save($post);


            // ambil input kategori
            $post_kategori = $this->artikel->post_kategori();
            $this->artikel_model->save_kategori_artikel($post_kategori);

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
        redirect('admin/artikel/add');
    }

    public function edit()
    {
        // variable id artikel
        $id = $this->uri->segment(4);

        // jika artikel tidak ditemukan, tampilkan 404 error
        if($this->artikel_model->find($id)->num_rows() !== 0) {
            $data['artikel'] = $this->artikel_model->find($id)->row();
        } else {
            show_404();
        }
        
        // ambil kategori artikel yang
        if($this->artikel_model->checked_kategori($id)->num_rows() !== 0) {
            $data['artikel_kategori'] = $this->artikel_model->checked_kategori($id)->result();

            // loop kategori artikel 
            $checked = array();
            foreach ($data['artikel_kategori'] as $row) :
                $checked[] = $row->kategori_id;
            endforeach;

            // ambil kategori yang belum dipilih
            if ($this->artikel_model->unchecked_kategori($checked)->num_rows !== 0) {
                $data['kategori'] = $this->artikel_model->unchecked_kategori($checked)->result();
            } else {
                $data['kategori'] = null;
            }
        } else {
            $data['artikel_kategori'] = null;
            $data['kategori'] = $this->kategori_model->all()->result();
        }
        $data['parentMenu'] = 'artikel';
        $data['childMenu'] = 'index';
        $data['title'] = 'Edit Artikel '.$data['artikel']->judul;
        $data['template'] =  'admin/artikel/edit';
        $this->load->view('admin/layout/master', $data);
    }

    public function update()
    {
        // variable id artikel
        $id = $this->input->post('id');        

        // @file : libraries/artikel/artikel.php
        // ambil input artikel
        $post = $this->artikel->post();
        // ambil input kategori artikel
        $post_kategori = $this->artikel->post_kategori();

        // jika nilai kembalian input artikel adalah false, redirect ke edit artikel dan tampilkan pesan gagal
        if($post !== false) {

            // update ke database
            $this->artikel_model->update($id, $post);

            // ambil input kategori
            // lakukan proses delete per kategori
            // lakukan proses insert kategori
            $this->artikel_model->delete_kategori_artikel($id);
            $this->artikel_model->save_kategori_artikel($post_kategori);
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

    public function sampah()
    {
        $id = $this->uri->segment(4); 
        // @file : libraries/artikel/artikel.php
        // ambil input artikel
        $update = $this->artikel->sampah();
        $this->artikel_model->update($id, $update);
        $this->message->sampah();

        // redirect ke halaman sebelumnya
        $link = $this->input->server('HTTP_REFERER', TRUE);
        redirect($link, 'location');
    }

    public function draft()
    {
        $id = $this->uri->segment(4); 
        // @file : libraries/artikel/artikel.php
        // ambil input artikel
        $update = $this->artikel->draft();
        $this->artikel_model->update($id, $update);
        $this->message->draft();

        // redirect ke halaman sebelumnya
        $link = $this->input->server('HTTP_REFERER', TRUE);
        redirect($link, 'location');
    }

    public function publish()
    {
        $id = $this->uri->segment(4); 
        // @file : libraries/artikel/artikel.php
        // ambil input artikel
        $update = $this->artikel->publish();
        $this->artikel_model->update($id, $update);
        $this->message->publish();

        // redirect ke halaman sebelumnya
        $link = $this->input->server('HTTP_REFERER', TRUE);
        redirect($link, 'location');
    }

    public function delete()
    {
        // variable id artikel
        $id = $this->uri->segment(4); 
        // jika artikel tidak ditemukan, tampilkan 404 error
        if($this->artikel_model->find($id)->num_rows() !== 0) {
            $data = $this->artikel_model->find($id)->row();

            // @file : libraries/artikel/artikel.php
            // ambil input artikel
            $update = $this->artikel->delete_image($data);
            if ($update !== false) {
                // update ke database
                $this->artikel_model->delete($id);
                $this->artikel_model->delete_kategori_artikel($id);
                $this->message->delete();
            } else {
                $this->message->delete_image_fail();
            }

            // redirect ke halaman sebelumnya
            $link = $this->input->server('HTTP_REFERER', TRUE);
            redirect($link, 'location');
        } else {
            show_404();
        }
    }

    public function delete_image()
    {
        // variable id artikel
        $id = $this->uri->segment(4); 
        // jika artikel tidak ditemukan, tampilkan 404 error
        if($this->artikel_model->find($id)->num_rows() !== 0) {
            $data = $this->artikel_model->find($id)->row();

            // @file : libraries/artikel/artikel.php
            // ambil input artikel
            $update = $this->artikel->delete_image($data);
            if ($update !== false) {
                // update ke database
                $this->artikel_model->update($id, $update);
                $this->message->delete_image_success();
            } else {
                $this->message->delete_image_fail();
            }

            // redirect ke halaman sebelumnya
            $link = $this->input->server('HTTP_REFERER', TRUE);
            redirect($link, 'location');
        } else {
            show_404();
        }
    }

}

/* end of file artikelcontroller.php */
/* location: ./application/controllers/admin/artikelcontroller.php */
