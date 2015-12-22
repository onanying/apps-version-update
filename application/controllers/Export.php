<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Export extends CI_Controller {

	private $app_path = '';  // app存放路径

	function __construct(){
		parent::__construct();
		$this->load->model('export_model');
		$this->load->helper('json');
		$this->app_path = $this->config->item('storage_dir');  // 载入配置
	}

	/**
	 * 下载最新app的url
	 */
	public function down_app( $appid=null ){
		if(empty($appid)){
			die('param error');
		}
		$row = $this->export_model->get_versions_row_by_newest($appid);
		if(is_null($row)){
			die('Version is empty');
		}
		$base_url = $this->config->item('base_url');
		header("Location: {$base_url}{$this->app_path}/{$row->file_name}");
	}

	/**
	 * 可扫描下载app的二维码
	 */
	public function down_app_qrcode( $appid=null ){
		if(empty($appid)){
			die('param error');
		}
		$base_url = $this->config->item('base_url');
		echo $this->qrcode("{$base_url}export/down_app/{$appid}");
	}

	/**
	 * 返回最新版本数据
	 * @return json
	 */
	public function version(){
		$appid = $this->input->get('appid');
		$lang = $this->input->get('lang');
		$lang = empty($lang)?0:$lang;  // 默认为0
		if(empty($appid)){
			$arr = array(
				'result' => 1
			);
			echo json_encode_ex($arr);
			return;
		}
		$row = $this->export_model->get_versions_row_by_newest($appid);
		if(is_null($row)){
			$arr = array(
				'result' => 2
			);
			echo json_encode_ex($arr);
			return;
		}
		$base_url = $this->config->item('base_url');
		$arr = array(
			'result' => 0 ,
			'code' => $row->code ,
			'version' => $row->version ,
			'url' => "{$base_url}{$this->app_path}/{$row->file_name}" ,
			'file_size' => $row->file_size ,
			'compel' => $row->compel ,
			'context' => $lang==0?$row->content_cn:$row->content_en
		);
		echo json_encode_ex($arr);
	}

	/**
	 * 返回二维码
	 * @param   string  $str  字符串
	 * @return  data          图片
	 */
	private function qrcode( $str ){
		$this->load->library('ci_qrcode');
		return $this->ci_qrcode->png($str);
	}

}
