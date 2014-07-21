<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Setting_model extends CI_Model {

    private $table = 'setting';

    public function get_seo()
    {
        return $this->db->select('web_title, web_description, web_keyword')
            ->get($this->table);
    }

    public function get_logo()
    {
        return $this->db->select('logo')
            ->get($this->table);
    }

    public function get_favicon()
    {
        return $this->db->select('favicon')
            ->get($this->table);
    }

    public function get_contact()
    {
        return $this->db->select('email, phone, longitude, latitude')
            ->get($this->table);
    }

    public function update($post)
    {
        $this->db->update($this->table, $post);
    }

}

/* End of file setting.php */
/* Location: ./application/models/setting.php */