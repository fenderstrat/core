<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Artikel_model extends CI_Model
{

    protected $table = 'artikel';
    protected $kategori_table = 'kategori';
    protected $kategori_artikel_table = 'kategori_artikel';

    public function all()
    {
        return $this->db
            ->order_by('artikel_id', 'DESC')
            ->where('status !=', 'sampah')
            ->get($this->table);
    }   

    public function all_sampah()
    {
        return $this->db
            ->order_by('artikel_id', 'DESC')
            ->where('status', 'sampah')
            ->get($this->table);
    }   

    public function all_limit($per_page, $offset)
    {
        return $this->db
            ->order_by('artikel_id', 'DESC')
            ->where('status =', 'publish')
            ->limit($per_page, $offset)
            ->get($this->table);
    }   

    public function find($id)
    {
        return $this->db
            ->where($this->table.'.artikel_id', $id)
            ->get($this->table);
    }   

    public function checked_kategori($id)
    {
        return $this->db
            ->join(
                    $this->kategori_table,
                    $this->kategori_table.'.kategori_id = '.$this->kategori_artikel_table.'.kategori_id'
                )
            ->where('artikel_id', $id)
            ->where($this->kategori_table.'.kategori_id !=', 1)
            ->get($this->kategori_artikel_table);
    }   

    public function unchecked_kategori($checked)
    {
        return $this->db
            ->where_not_in($this->kategori_table.'.kategori_id', $checked)
            ->where_not_in($this->kategori_table.'.kategori_id', 1)
            ->get($this->kategori_table);
    }   

    public function save($post)
    {
        $this->db->insert($this->table, $post);
    }

    public function save_kategori_artikel($post)
    {
        $this->db->insert_batch($this->kategori_artikel_table, $post); 
    }

    public function update($id, $post)
    {
        $this->db
            ->where('artikel_id', $id)
            ->update($this->table, $post);
    }

    public function update_kategori_artikel($id, $post)
    {
        $this->db->update_batch($this->kategori_artikel_table, $post,  'artikel_id');
    }
    
    public function delete($id)
    {
         $this->db->delete($this->table, array('artikel_id' => $id));
    }

    public function delete_kategori_artikel($id)
    {
         $this->db->delete($this->kategori_artikel_table, array('artikel_id' => $id));
    }


    // HALAMAN UTAMA
    
    public function get_id($id, $status)
    {
       return $this->db
        ->where('artikel_id', $id)
        ->where('status', $status)
        ->get($this->table);
        return $query;
    }

    public function get_all($per_page, $offset)
    {
        return $this->db
            ->order_by('artikel_id', 'DESC')
            ->where('status =', 'publish')
            ->get($this->table);
    } 
}

/* End of file ArtikelModel.php */
/* Location: ./application/models/ArtikelModel.php */