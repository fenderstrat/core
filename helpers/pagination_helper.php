<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pagination {

	public static function admin($base_url, $per_page, $total_rows, $segment)
	{
		$CI = & get_instance();
    	$CI->load->library('pagination');
		
		$config['full_tag_open'] = '<ul class="pagination pagination-sm inline">';
		$config['full_tag_close'] = '</ul>';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['next_link']  = 'Next';
		$config['prev_link']   = 'Previous';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a>';
		$config['cur_tag_close'] = '</li></a>';
		$config['num_links'] = 1;
		$config['last_link'] = 'Last';
		$config['first_link'] = 'First';
		$config['uri_segment'] = $segment;

		$config['base_url']= $base_url;
		$config['per_page'] = $per_page;
		$config['total_rows'] = $total_rows;

		return $CI->pagination->initialize($config); 
	}

	public static function main($base_url, $per_page, $total_rows, $segment=2)
	{
		$CI = & get_instance();
    		$CI->load->library('pagination');
		
		$config['full_tag_open'] = '<div class="halaman">';
		$config['full_tag_close'] = '</div>';
		$config['next_link']  = '<div class="prev">Next &rsaquo;</div>';
		$config['prev_link']   = '<div class="">&lsaquo; Prev</div>';
		$config['num_tag_open'] = '<div class="digit digit-all">';
		$config['num_tag_close'] = '</div>';
		$config['cur_tag_open'] = '<div class="currents">';
		$config['cur_tag_close'] = '</div>';
		$config['num_links'] = 1;
		$config['last_link'] = '<div class="digit next">Last &raquo;</div>';
		$config['first_link'] = '<div class="digit prev">&laquo; First</div>';
		$config['uri_segment'] = $segment;

		$config['base_url']= $base_url;
		$config['per_page'] = $per_page;
		$config['total_rows'] = $total_rows;

		return $CI->pagination->initialize($config); 
	} 
}

/* End of file pagination.php */
/* Location: ./application/helpers/pagination.php */