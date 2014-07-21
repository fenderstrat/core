<?php if (defined('basepath')) exit('no direct script access allowed');

require APPPATH.'controllers/admin/base_admin.php';

class Menu_controller extends Base_admin
{
    public function __construct()
    {
        parent::__construct();

        // load model
        $this->load->model(array(
            'menu_model'
        ));

        // load class library
        $this->load->library(array(
            'pengaturan/menu'
        ));

        // load helper
        $this->load->helper(array(
            'menu'
        ));
    }

    public function index()
    {
        // jika record tidak ditemukan, hasilkan null
        if ($this->menu_model->all()->num_rows() !== 0) {
            $data['parent'] = $this->menu_model->all()->result();
        } else {
            $data['parent'] = null;
        }

        $data['parentMenu'] = 'pengaturan';
        $data['childMenu'] = 'menu';
        $data['title'] = 'Pengaturan Menu';
        $data['template'] = 'admin/pengaturan/menu';
        $this->load->view('admin/layout/master', $data);
    }

    public function ajax_save()
    {
        // Get the JSON string
        $jsonstring = $_GET['jsonstring'];
        
        // Decode it into an array
        $jsonDecoded = json_decode($jsonstring, true, 64);
        // Run the function above
        $readbleArray = parseJsonArray($jsonDecoded);

        // Loop through the "readable" array and save changes to DB
        foreach ($readbleArray as $key => $value) {
        
            // $value should always be an array, but we do a check
            if (is_array($value)) {
                
                $post = array(
                    'rang' => $key,
                    'parent_id' => $value['parentID'],
                );
                // Update DB
                $result = $this->menu_model->update($value['id'],$post);
                if ($result) {
                    echo "update";
                } else {
                    echo "gagal";
                }
            }
        }
    }

    public function save()
    {
        // @file : libraries/pengaturan/menu.php
        // ambil input menu
        $post = $this->menu->post();

        // jika nilai kembalian input menu adalah false, redirect ke index menu dan tampilkan pesan gagal
        if($post !== false) {
            // simpan ke database
            $this->menu_model->save($post);

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
        redirect('admin/menu/');
    }

    public function edit()
    {
        // variable id menu
        $id = $this->uri->segment(4);

        // jika menu tidak ditemukan, tampilkan 404 error
        if($this->menu_model->find($id)->num_rows() !== 0) {
            $data['menu_single'] = $this->menu_model->find($id)->row();
        } else {
            show_404();
        }

        // jika record tidak ditemukan, hasilkan null
        if ($this->menu_model->all_ex($id)->num_rows() !== 0) {
            $data['parent'] = $this->menu_model->all_ex($id)->result();
        } else {
            $data['parent'] = null;
        }

        $data['parentMenu'] = 'pengaturan';
        $data['childMenu'] = 'menu';
        $data['title'] = 'Edit menu '.$data['menu_single']->name;
        $data['template'] =  'admin/pengaturan/menu';
        $this->load->view('admin/layout/master', $data);
    }

    public function update()
    {
        // variable id menu
        $id = $this->input->post('id');

        // @file : libraries/pengaturan/menu.php
        // ambil input menu
        $post = $this->menu->post();

        // jika nilai kembalian input menu adalah false, redirect ke edit menu dan tampilkan pesan gagal
        if($post !== false) {

            // update ke database
            $this->menu_model->update($id, $post);

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

        // redirect ke menu sebelumnya
        $link = $this->input->server('HTTP_REFERER', TRUE);
        redirect($link, 'location');
    }

    public function delete()
    {
        // variable id menu
        $id = $this->uri->segment(4);
        // jika menu tidak ditemukan, tampilkan 404 error
        if($this->menu_model->find($id)->num_rows() !== 0) {
            $data = $this->menu_model->find($id)->row();
            $parent = $this->menu_model->find_parent($id)->row();
            $post = $this->menu->delete();
            // @file : libraries/pengaturan/menu.php
            // ambil input menu
            $update = $this->menu_model->update($parent->id, $post);
            if ($update !== false) {
                // update ke database
                $this->menu_model->delete($id);
                $this->message->delete();
            } else {
                $this->message->delete_fail();
            }

            // redirect ke menu sebelumnya
            redirect('admin/menu/');
        } else {
            show_404();
        }
    }
 

}

/* end of file menu_controller.php */
/* location: ./application/controllers/admin/menu_controller.php */
