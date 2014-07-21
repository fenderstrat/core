<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Menu_model extends CI_Model
{

    protected $table = 'menu';

    public function find_parent($id)
    {
        return $this->db
            ->order_by('rang')
            ->where($this->table.'.parent_id', $id)
            ->get($this->table);
    }   

    public function find($id)
    {
        return $this->db
            ->order_by('rang')
            ->where($this->table.'.id', $id)
            ->get($this->table);
    }   

    public function update($id, $post)
    {
        $this->db
            ->where('id', $id)
            ->update($this->table, $post);
    }
    public function all()
    {
        return $this->db
            ->order_by('rang')
            ->get($this->table);
    }
    public function all_ex($id)
    {
        return $this->db
            ->where_not_in('id',$id)
            ->order_by('rang')
            ->get($this->table);
    }
    public function max()
    {
        return $this->db
            ->select_max('rang')
            ->get($this->table);
    }
   
    public function save($post)
    {
        $this->db->insert($this->table, $post);
    }

    public function delete($id)
    {
         $this->db->delete($this->table, array('id' => $id));
    }
}

/* End of file MenuModel.php */
/* Location: ./application/models/MenuModel.php */