<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct(){
		parent::__construct();
	}

	public function index(){
		// 转至后台页
		$base_url = $this->config->item('base_url');
		header("Location: {$base_url}admin");
	}

}
