<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kontak_model extends CI_Model {

    protected $table = 'kontak';


    public function find_data()
    {
        return $this->db
            ->order_by('kontak_id','DESC')
            ->get($this->table);
    }

    public function update($post)
    {
        $this->db
            ->update($this->table, $post);
    }

}

/* End of file Kontak_model.php */
/* Location: ./application/models/Kontak_model.php */