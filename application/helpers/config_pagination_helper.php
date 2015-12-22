<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('config_pagination')){
	function config_pagination( $base_url , $total_rows , $per_page , $uri_segment ){
		$config['first_link'] = FALSE;
		$config['last_link'] = FALSE;
		$config['next_link'] = '»';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['prev_link'] = '«';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="am-active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['full_tag_open'] = '';
		$config['full_tag_close'] = '';
		$config['num_links'] = 4;
		$config['base_url'] = $base_url;
		$config['total_rows'] = $total_rows;
		$config['per_page'] = $per_page;
		$config['uri_segment'] = $uri_segment;
		return $config;
	}
}
