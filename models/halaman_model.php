<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class halaman_model extends CI_Model
{

    protected $table = 'halaman';

    public function all()
    {
        return $this->db
            ->order_by('halaman_id', 'DESC')
            ->where('status !=', 'sampah')
            ->get($this->table);
    }
    public function all_limit($per_page, $offset)
    {
        return $this->db
            ->order_by('halaman_id', 'DESC')
            ->where('status =', 'publish')
            ->limit($per_page, $offset)
            ->get($this->table);
    }
    public function all_sampah()
    {
        return $this->db
            ->order_by('halaman_id', 'DESC')
            ->where('status', 'sampah')
            ->get($this->table);
    }   

    public function find($id)
    {
        return $this->db
            ->where($this->table.'.halaman_id', $id)
            ->get($this->table);
    }   

    public function save($post)
    {
        $this->db->insert($this->table, $post);
    }

    public function update($id, $post)
    {
        $this->db
            ->where('halaman_id', $id)
            ->update($this->table, $post);
    }
    
    public function delete($id)
    {
         $this->db->delete($this->table, array('halaman_id' => $id));
    }

}

/* End of file halamanModel.php */
/* Location: ./application/models/halamanModel.php */