<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Album_model extends CI_Model {

	protected $table = 'album';
	protected $table_galeri = 'galeri';
    
    // public function all()
    // {
    //     return $this->db->get_where($this->table, array('kategori_id !=' => 1));
    // }

    public function all()
    {
        return $this->db
            ->select("*,$this->table.album_id as album_id")
            ->join($this->table_galeri,$this->table . '.' .'album_id = '. $this->table_galeri . '.' .'album_id','LEFT')
            ->group_by("$this->table.album_id")
            ->order_by("$this->table.album_id", 'DESC')
            ->get($this->table);
    }   

    public function all_limit($per_page, $offset)
    {
        return $this->db
            ->select("*,$this->table.album_id as album_id")
            ->join($this->table_galeri,$this->table . '.' .'album_id = '. $this->table_galeri . '.' .'album_id','LEFT')
            ->group_by("$this->table.album_id")
            ->order_by("$this->table.album_id", 'DESC')
            ->limit($per_page, $offset)
            ->get($this->table);
    }   

    public function all_limit_galeri($id,$per_page, $offset)
    {
        return $this->db
            ->order_by('galeri_id', 'DESC')
            ->where('album_id', $id)
            ->limit($per_page, $offset)
            ->get($this->table_galeri);
    }   

    public function save($post)
    {
        $this->db->insert($this->table, $post);
    }
    public function save_galeri($post)
    {
        $this->db->insert($this->table_galeri, $post);
    }

    public function find($id)
    {
        return $this->db
            ->where($this->table.'.album_id', $id)
            ->get($this->table);
    }

    public function find_galeri_single($id)
    {
        return $this->db
            ->where($this->table_galeri.'.galeri_id', $id)
            ->get($this->table_galeri);
    }

    public function delete($id)
    {
         $this->db->delete($this->table, array('album_id' => $id));
         $this->db->delete($this->table_galeri, array('album_id' => $id));

    }
    public function delete_galeri($id)
    {
         $this->db->delete($this->table_galeri, array('galeri_id' => $id));

    }

    public function find_galeri($id)
    {
        return $this->db
            ->where($this->table_galeri.'.album_id', $id)
            ->join($this->table_galeri,$this->table_galeri.'.album_id = '.$this->table.'.album_id')
            ->get($this->table);
    }

    public function update($id, $post)
    {
        $this->db
            ->where('album_id', $id)
            ->update($this->table, $post);
    }
    
    // public function delete($id)
    // {
    //      $this->db->delete($this->table, array('kategori_id' => $id));
    // }

    // public function delete_kategori_artikel($id)
    // {
    //      $this->db->delete($this->kategori_artikel_table, array('kategori_id' => $id));
    // }

}

/* End of file album_model.php */
/* Location: ./application/models/album_model.php */