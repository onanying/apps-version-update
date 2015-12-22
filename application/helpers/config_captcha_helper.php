<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('config_captcha')){
	function config_captcha( $img_path , $img_url ){
		$config = array(
		    'word'      => '',
		    'img_path'  => $img_path,
		    'img_url'   => $img_url,
		    'font_path' => FCPATH.'static/fonts/angsa.ttf',
		    'img_width' => '130',
		    'img_height'    => 35,
		    'expiration'    => 0,
		    'word_length'   => 4,
		    'font_size' => 24,
		    'img_id'    => 'Imageid',
		    'pool'      => '0123456789',
		    'colors'    => array(
		        'background' => array(255, 255, 255),
		        'border' => array(255, 255, 255),
		        'text' => array(0, 0, 0),
		        'grid' => array(255, 40, 40)
		    )
		);
		return $config;
	}
}
