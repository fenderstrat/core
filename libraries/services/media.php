<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Media
{
    protected $instance;

    public function __construct()
    {
        $this->instance =& get_instance();
    }

    public function upload($input)
    {
        $config = array(
            'upload_path' => 'assets/uploads/',
            'allowed_types' => 'gif|jpg|png',
            'max_size' => '5000',
            'encrypt_name' => true
        );

        $this->instance->load->library('upload', $config);

        if ($this->instance->upload->do_upload($input)) {
            $data = $this->instance->upload->data();
            return $data['file_name'];
        } else {
            $this->instance->message->upload_error();
            return false;
        }
    }

    public function upload_galeri($input,$name)
    {
        $config = array(
            'upload_path' => 'assets/uploads/',
            'allowed_types' => 'gif|jpg|png',
            'max_size' => '5000',
            'file_name' => $name
        );

        $this->instance->load->library('upload');
        $this->instance->upload->initialize($config);


        if ($this->instance->upload->do_multi_upload($input)) {
            $data = $this->instance->upload->get_multi_upload_data();
            return $data;
        } else {
            $this->instance->message->upload_error();
            return false;
        }
    }


    public function remove($input)
    {
        $filename = 'assets/uploads/'.$input;
        if (file_exists($filename)) {
            @chmod($filename, 0777);
            unlink($filename);
            return true;
        }
    }
}
