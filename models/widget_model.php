<?php if ( ! defined( 'BASEPATH' )) exit( 'No direct script access allowed' );

class Widget_model extends CI_Model
{
	protected $table = 'widget';

	public function All( $widget_position )
	{
		return $this->db
			->order_by( 'widget_sort', 'ASC' )
			->where( 'widget_position', $widget_position )
			->get( $this->table );
	}

	public function Save( $post )
	{
		$this->db->insert( $this->table, $post );
	}

	public function Find( $id, $name )
	{
		return $this->db
			->where( 'widget_id', $id )
			->where( 'widget_name', $name )
			->get( $this->table );
	}

	public function Find_id( $id )
	{
		return $this->db
			->where( 'widget_id', $id )
			->get( $this->table );
	}

	public function Delete( $id )
	{
		return $this->db->delete( $this->table, array( 'widget_id' => $id ) );
	}
	
	public function update($id, $post)
    {
        $this->db
            ->where('widget_id', $id)
            ->update($this->table, $post);
    }
}

/* End of file widget_model.php */
/* Location: ./application/models/widget_model.php */