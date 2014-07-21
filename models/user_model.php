<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model {

    protected $table = 'user';

    # cek jika user ditemukan
    public function check_user($data)
    {
        return $this->db->get_where($this->table, $data);
    }

    public function save($post)
    {
        $this->db->insert($this->table, $post);
    }

    public function find_data($whr,$key)
    {
        return $this->db
            ->where($this->table.'.'.$whr, $key)
            ->get($this->table);
    }

    public function find($id)
    {
        return $this->db
            ->where($this->table.'.username', $id)
            ->get($this->table);
    }

    public function all_ex($username)
    {
        return $this->db
            ->order_by('username')
            ->where('username !=',$username)
            ->get($this->table);
    }

    public function update($id, $post)
    {
        $this->db
            ->where('username', $id)
            ->update($this->table, $post);
    }

     public function delete($id)
    {
         $this->db->delete($this->table, array('username' => $id));
    }

}

/* End of file user_model.php */
/* Location: ./application/models/user_model.php */