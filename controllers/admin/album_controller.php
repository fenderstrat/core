<?php if (defined('basepath')) exit('no direct script access allowed');

require APPPATH.'controllers/admin/base_admin.php';

class Album_controller extends Base_admin
{
    public function __construct()
    {
        parent::__construct();

        // load model
        $this->load->model(array(
            'album_model'
        ));

        // load class library
        $this->load->library(array(
            'media/album'
        ));
    }

    public function index()
    {

        $offset = $this->uri->segment(4);
        $base_url = base_url('admin/album/index/');
        $per_page = 10;
        $total_rows = $this->album_model->all()->num_rows();
        Pagination::admin($base_url, $per_page, $total_rows,4);

        if ($this->album_model->all_limit($per_page, $offset)->num_rows() !=0) {
            $data['album'] = $this->album_model->all_limit($per_page, $offset)->result();
        } else {
            $data['album'] = null;
        }

        $data['parentMenu'] = 'media';
        $data['childMenu'] = 'index';
        $data['title'] = 'Daftar Album';
        $data['template'] = 'admin/media/album';
        $this->load->view('admin/layout/master', $data);
    }
    public function save()
    {
        // @file : libraries/media/album.php
        // ambil input album
        $post = $this->album->post();

        // jika nilai kembalian input album adalah false, redirect ke index album dan tampilkan pesan gagal
        if($post !== false) {
            // simpan ke database
            $this->album_model->save($post);

            // @file : libraries/services/message.php
            // tampilkan pesan berhasil
            $this->message->add_success();
            $jd  = url_title($this->input->post('judul'));
            redirect('admin/album/edit/'.$this->db->insert_id().'/'.$jd);
        } else {
            // @file : libraries/services/message.php
            // Tampilkan validasi error
            $this->message->validation();

            // tampilkan pesan gagal
            $this->message->add_fail();

            redirect('admin/album/');
        }
    }


    public function update()
    {
        // variable id album
        $id = $this->input->post('idAlbum');

        // @file : libraries/album/album.php
        // ambil input album
        $post = $this->album->post();

        // jika nilai kembalian input album adalah false, redirect ke edit album dan tampilkan pesan gagal
        if($post !== false) {

            // update ke database
            $this->album_model->update($id, $post);

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

        // redirect ke album sebelumnya
        $link = $this->input->server('HTTP_REFERER', TRUE);
        redirect($link, 'location');
    }

     public function edit()
    {
        // variables
        $id = $this->uri->segment(4);
        $judul = $this->uri->segment(5);

        // jika album tidak ditemukan, tampilkan 404 error
        if($this->album_model->find($id)->num_rows() !== 0) {
            $data['album_single'] = $this->album_model->find($id)->row();
        } else {
            show_404();
        }

        $offset = $this->uri->segment(6);
        $base_url = base_url('admin/album/edit/'.$this->uri->segment(4).'/'.$this->uri->segment(5));
        $per_page = 10;
        $total_rows = $this->album_model->find_galeri($id)->num_rows();
        Pagination::admin($base_url, $per_page, $total_rows,6);

        if ($this->album_model->all_limit_galeri($id,$per_page, $offset)->num_rows() !=0) {
            $data['galeri'] = $this->album_model->all_limit_galeri($id,$per_page, $offset)->result();
        } else {
            $data['galeri'] = null;
        }
        // jika record tidak ditemukan, hasilkan null
        // if ($this->album_model->find_galeri($id)->num_rows() !== 0) {
        //     $data['galeri'] = $this->album_model->find_galeri($id)->result();
        // } else {
        //     $data['galeri'] = null;
        // }
        $data['parentMenu'] = 'media';
        $data['childMenu'] = 'album';
        $data['title'] = 'Edit album '.$data['album_single']->judul;
        $data['template'] =  'admin/media/galeri';
        $this->load->view('admin/layout/master', $data);
    }

    public function save_galeri()
    {
        
        $post = $this->album->post_galeri();
        if ($post !== false) {
           
          foreach ($post as $value) {
                $postMulti = array(
                                'caption' => $value['raw_name'],
                                'image' => $value['file_name'],
                                'album_id' => $this->input->post('idAlbum')
                            );
                $this->album_model->save_galeri($postMulti);
          }

        }

        //redirect ke album sebelumnya
        $link = $this->input->server('HTTP_REFERER', TRUE);
        redirect($link, 'location');

    }

    public function delete()
    {
        // variable id album
        $id = $this->uri->segment(4); 
        // jika album tidak ditemukan, tampilkan 404 error
        if($this->album_model->find($id)->num_rows() !== 0) {
            $data = $this->album_model->find($id)->row();
            $data_galeri = $this->album_model->find_galeri($id)->result();

            // @file : libraries/album/album.php
            // ambil input album
            $delete_image = $this->album->delete_image($data_galeri);
            if ($delete_image !== false) {
                $this->album_model->delete($data->album_id);
                $this->message->delete();
            } else {
                $this->message->delete_image_fail();
            }

            //redirect ke halaman sebelumnya
            $link = $this->input->server('HTTP_REFERER', TRUE);
            redirect($link, 'location');
        } else {
            show_404();
        }
    }

    public function delete_galeri()
    {
         // variable id album
        $id = $this->uri->segment(4); 
        // jika album tidak ditemukan, tampilkan 404 error
        if($this->album_model->find_galeri_single($id)->num_rows() !== 0) {
            $data = $this->album_model->find_galeri_single($id)->result();

            // @file : libraries/album/album.php
            // ambil input album
            $delete_image = $this->album->delete_image($data);
            if ($delete_image !== false) {
                $this->album_model->delete_galeri($id);
                $this->message->delete();
            } else {
                $this->message->delete_image_fail();
            }

            //redirect ke halaman sebelumnya
            $link = $this->input->server('HTTP_REFERER', TRUE);
            redirect($link, 'location');
        } else {
            show_404();
        }
    }


}

/* end of file albumcontroller.php */
/* location: ./application/controllers/admin/albumcontroller.php */
