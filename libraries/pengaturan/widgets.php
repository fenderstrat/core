<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Widgets
{
	protected $instance;

    public function __construct()
   {
        $this->instance =& get_instance();
        // Load library
        $this->instance->load->library(array(
            'form_validation',
            'services/media',
        ));
        // Load helper
        $this->instance->load->helper(array(
            'services'
        ));
    }

	public function post_recent_post()
    {
		
       if( $this->instance->form_validation->run( 'widget_recent_post' ) === true ) {
            if( 0 == $this->instance->input->post( 'count_post' ) ) {
                $count_post = '5';
            } else {
                $count_post = $this->instance->input->post( 'count_post' );
            }

            $widget_data = array(
                    'widget_title'=>$this->instance->input->post( 'jd_widget' ),
                    'widget_limit_post'=>$count_post,
                    'widget_show_date'=>$this->instance->input->post( 'show_date' )
                );

            $data = array(
                    'widget_position'=>$this->instance->input->post( 'ps_widget' ),
                    'widget_sort'=>$this->instance->input->post( 'sort_widget' ),
                    'widget_name'=>$this->instance->input->post( 'widget_name' ),
                    'widget_data'=>serialize($widget_data)
                );
            return $data;
        } else {
            redata();
            return false;
        }

	}

    public function post_recent_page()
    {
        if( $this->instance->form_validation->run( 'widget_recent_page' ) === true ) {
            if( 0 == $this->instance->input->post( 'count_page' ) ) {
                $count_page = '5';
            } else {
                $count_page = $this->instance->input->post( 'count_page' );
            }

            $widget_data = array(
                    'widget_title'=>$this->instance->input->post( 'jd_widget' ),
                    'widget_limit_page'=>$count_page
                );

            $data = array(
                    'widget_position'=>$this->instance->input->post( 'ps_widget' ),
                    'widget_sort'=>$this->instance->input->post( 'sort_widget' ),
                    'widget_name'=>$this->instance->input->post( 'widget_name' ),
                    'widget_data'=>serialize($widget_data)
                );
            return $data;
        } else {
            redata();
            return false;
        }
    }

    public function post_text_widget()
    {
        if( $this->instance->form_validation->run( 'widget_text' ) === true ) {

            $widget_data = array(
                    'widget_title'=>$this->instance->input->post( 'jd_widget' ),
                    'widget_content'=>$this->instance->input->post( 'content' ),
                );

            $data = array(
                    'widget_position'=>$this->instance->input->post( 'ps_widget' ),
                    'widget_sort'=>$this->instance->input->post( 'sort_widget' ),
                    'widget_name'=>$this->instance->input->post( 'widget_name' ),
                    'widget_data'=>serialize($widget_data)
                );
            return $data;
        } else {
            redata();
            return false;
        }
    }
}