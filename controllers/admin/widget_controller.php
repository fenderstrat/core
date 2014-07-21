<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH.'controllers/admin/base_admin.php';

class Widget_controller extends base_admin {

	public function __construct()
	{
		parent::__construct();

		 // load model
        $this->load->model(array(
            'widget_model'
        ));

        // load class library
        $this->load->library(array(
            'pengaturan/widgets'
        ));
	}

	public function index()
	{
        $widget1 = $this->widget_model->all( 'widget1' );
        $widget2 = $this->widget_model->all( 'widget2' );

        if( $widget1->num_rows() !== 0 ) {
            $data['widget1'] = $widget1->result();
        } else {
            $data['widget1'] = null;
        }

        if( $widget2->num_rows() !== 0 ) {
            $data['widget2'] = $widget2->result();
        } else {
            $data['widget2'] = null;
        }
        
		$data['parentMenu'] = 'pengaturan';
        $data['childMenu'] = 'widget';
        $data['title'] = 'Pengaturan Widget';
        $data['template'] = 'admin/pengaturan/widget';
        $this->load->view('admin/layout/master', $data);
	}

    public function Add()
    {
        $data['parentMenu'] = 'pengaturan';
        $data['childMenu'] = 'widget';
        $data['title'] = 'Pengaturan Widget';
        $data['value_data'] = array();
        $data['widget_function'] = $this->uri->segment(4);
        $data['template'] = 'admin/widget/add';
        $this->load->view('admin/layout/master', $data);
    }
    public function edit()
    {
        $data['parentMenu'] = 'pengaturan';
        $data['childMenu'] = 'widget';
        $data['title'] = 'Edit Widget';
        $wd = $this->widget_model->Find_id($this->uri->segment(4))->row_array();
        $sr = unserialize($wd['widget_data']);
        $serializeData = array_merge_recursive($wd,$sr);
        $data['value_data'] = $serializeData;
        $data['widget_function'] = $wd['widget_name'];
        
        $data['template'] = 'admin/widget/add';
        $this->load->view('admin/layout/master', $data);
    }

    public function Save()
    {
        $widget_func = $this->input->post( 'widget_name' );
        $widget_id = 'post_' . $this->input->post( 'widget_name' );
        //panggil funsgi di library menurut tipe post.
        $post = $this->widgets->$widget_id();

        if( false !== $post ){
            $this->widget_model->save( $post );

            $this->message->add_success();
            redirect( 'admin/widget/' );
        } else {
            $this->message->validation();
            $this->message->add_fail();
            redirect( 'admin/widget/add/' . $widget_func );
        }
    }
    public function update()
    {
        if ($this->uri->segment(4) != '') {
            $id = $this->uri->segment(4);
            $widget_func = $this->input->post( 'widget_name' );
            $widget_id = 'post_' . $this->input->post( 'widget_name' );
            //panggil funsgi di library menurut tipe post.
            $post = $this->widgets->$widget_id();

            if( false !== $post ){
                $this->widget_model->update($id,$post );
                $this->message->update_success();
            } else {
                $this->message->validation();
                $this->message->update_fail();
            }

            // redirect ke halaman sebelumnya
            $link = $this->input->server('HTTP_REFERER', TRUE);
            redirect($link, 'location');
        } else {
            show_404();
        }
        
    }

    public function Delete()
    {
        $widget_id = $this->uri->segment(4);
        $widget_name = $this->uri->segment(5);

        if( $this->widget_model->find( $widget_id, $widget_name )->num_rows() !== 0 ){
            $delete = $this->widget_model->delete( $widget_id );

            if( $delete ){
                $this->message->delete();
                $link = $this->input->server('HTTP_REFERER', TRUE);
                redirect($link, 'location');
            } else {
                $this->message->delete_fail();
                $link = $this->input->server('HTTP_REFERER', TRUE);
                redirect($link, 'location');
            }
        } else {
            show_404();
        }
    }

}

/* End of file widget_controller.php */
/* Location: ./application/controllers/admin/widget_controller.php */