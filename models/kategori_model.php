<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kategori_model extends CI_Model
{

    protected $table = 'kategori';
    protected $kategori_artikel_table = 'kategori_artikel';
    
    public function all()
    {
        return $this->db->get_where($this->table, array('kategori_id !=' => 1));
    }

    public function save($post)
    {
        $this->db->insert($this->table, $post);
    }

    public function find($id)
    {
        return $this->db
            ->where($this->table.'.kategori_id', $id)
            ->get($this->table);
    }

    public function update($id, $post)
    {
        $this->db
            ->where('kategori_id', $id)
            ->update($this->table, $post);
    }
    
    public function delete($id)
    {
         $this->db->delete($this->table, array('kategori_id' => $id));
    }

    public function delete_kategori_artikel($id)
    {
         $this->db->delete($this->kategori_artikel_table, array('kategori_id' => $id));
    }
}

/* End of file KategoriModel.php */
/* Location: ./application/models/KategoriModel.php */