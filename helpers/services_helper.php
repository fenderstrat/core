<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function redata()
{
	foreach($_POST as $Key => $Value)
	{
		$instance = & get_instance();
		$instance->session->set_flashdata($Key, $Value);
	}
}

function get_first_paragraph($string)
{
	// return substr($string,0, strpos($string, "</p>")+4);
	return strip_tags(htmlspecialchars_decode($string));
}