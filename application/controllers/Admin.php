<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	private $app_path = '';  // app存放路径
	private $filename_prefix = '';  // 文件名前缀

	function __construct(){
		parent::__construct();
		$this->load->model('admin_model');
		$this->load->library('form_validation');
		$this->app_path = $this->config->item('storage_dir');  // 载入配置
		$this->filename_prefix = $this->config->item('filename_prefix');  // 载入配置
	}

	public function index(){
		$user = $this->session->user;
		if(!empty($user)){
			// 转至列表页
			$base_url = $this->config->item('base_url');
			header("Location: {$base_url}admin/app_list");
		}
		$this->login();
	}

	public function login(){
		if(!empty($_POST)){
			$account = $this->input->post('account');
			$password = $this->input->post('password');
			$captcha = $this->input->post('captcha');
			if(empty($account) || empty($password) || empty($captcha)){
				$data['errmsg'] = '表单不能为空';
			}else{
				$cap_word = $this->session->cap_word;
				if($captcha!=$cap_word){
					$data['errmsg'] = '验证码错误';
				}else{
					$row = $this->admin_model->get_manager_row_by_verify();
					if(is_null($row)){
						$data['errmsg'] = '账号或密码错误';
					}else{
						$this->session->unset_userdata('cap_word');
						$this->session->user = $row;  // row为数组
						$base_url = $this->config->item('base_url');
						header("Location: {$base_url}admin/app_list");
					}
				}
			}
		}

		/* 验证码开始 */
		$this->load->helper('config_captcha');
		$this->load->helper('captcha');
		$img_path = FCPATH.'static/captcha/';
		$img_url = $this->config->item('base_url').'static/captcha/';
		$cfg = config_captcha($img_path, $img_url);
		$cap = create_captcha($cfg);
		$data['cap_img_html'] = $cap['image'];
		$this->session->cap_word = $cap['word'];
		/* 验证码开始 */

		$data['base_url'] = $this->config->item('base_url');
		$data['title'] = '用户登录';
		$this->load->view('admin_login.php', $data);
	}

	public function app_add(){
		$this->app_edit();
	}

	public function app_edit( $id=null ){
		$user = $this->session->user;
		if(empty($user)){
			// 返回首页
			$base_url = $this->config->item('base_url');
			header("Location: {$base_url}admin");
		}
		$mode = "/^[0-9]+$/";  // 正则
		if(!is_null($id) && !preg_match($mode, $id)){
			die('param error');
		}
		// 保存
		if(!empty($_POST)){
			$name = $this->input->post('name');
			$desc = $this->input->post('desc');
			if(empty($name) || empty($desc)){
				$data['errcode'] = 1;
				$data['errmsg'] = '内容不能为空';
			}else{
				if(is_null($id)){
					// 新增
					$this->admin_model->add_apps();
					// 返回列表
					$base_url = $this->config->item('base_url');
					header("Location: {$base_url}admin/app_list");
					return;
				}else{
					// 修改
					$this->admin_model->set_apps($id);
					$data['errcode'] = 0;
					$data['errmsg'] = '修改成功';
				}
			}
		}
		// 显示
		if(is_null($id)){
			$data['title'] = '新增APP';
		}else{
			$data['title'] = '编辑APP';
			$data['row'] = $this->admin_model->get_apps_row_by_id($id);
		}
		$data['user']= $user;
		$data['base_url'] = $this->config->item('base_url');
		$this->load->view('admin_header.php', $data);
		$this->load->view('admin_sidebar_main.php');
		$this->load->view('admin_app_edit.php');
		$this->load->view('admin_footer.php');
	}

	public function app_list(){
		$user = $this->session->user;
		if(empty($user)){
			// 返回首页
			$base_url = $this->config->item('base_url');
			header("Location: {$base_url}admin");
		}

		$query = $this->admin_model->get_apps_rows_by_all();
		$data['app_list'] = $query->result();

		$data['user']= $user;	
		$data['title'] = 'APP列表';
		$data['base_url'] = $this->config->item('base_url');
		$this->load->view('admin_header.php', $data);
		$this->load->view('admin_sidebar_main.php');
		$this->load->view('admin_app_list.php');
		$this->load->view('admin_footer.php');
	}

	public function version_list( $appid=null, $row=0 ){
		$user = $this->session->user;
		if(empty($user)){
			// 返回首页
			$base_url = $this->config->item('base_url');
			header("Location: {$base_url}admin");
		}
		$mode = "/^[0-9]+$/";  // 正则
		if(!preg_match($mode, $appid) || !preg_match($mode, $row)){
			die('param error');
		}
		$apps_row = $this->admin_model->get_apps_row_by_id($appid);
		if(is_null($apps_row)){
			die('appid error');
		}

		/* 分页开始 */
		$this->load->library('pagination');
		$this->load->helpers('config_pagination');
		$per_page = 20;  // 每页数量
		$result = $this->admin_model->get_versions_rows_by_latest($appid, $per_page, $row);		
		$url = "/admin/version_list/{$appid}/";
		$cfg = config_pagination( $url, $result['total_rows'], $per_page, 4 );
		$this->pagination->initialize( $cfg );
		$data['total_rows'] = $result['total_rows'];
		$data['pages_html'] = $this->pagination->create_links();
		/* 分页结束 */

		$data['appid'] = $appid;
		$data['app_name'] = $apps_row->name;
		$data['version_list'] = $result['query']->result();
		$data['user']= $user;	
		$data['title'] = '版本列表';
		$data['base_url'] = $this->config->item('base_url');
		$this->load->view('admin_header.php', $data);
		$this->load->view('admin_sidebar_version.php');
		$this->load->view('admin_version_list.php');
		$this->load->view('admin_footer.php');
	}

	public function version_add( $appid=null ){
		$this->version_edit($appid);
	}

	public function version_edit( $appid=null, $id=null ){
		$user = $this->session->user;
		if(empty($user)){
			// 返回首页
			$base_url = $this->config->item('base_url');
			header("Location: {$base_url}admin");
		}
		$mode = "/^[0-9]+$/";  // 正则
		if(!preg_match($mode, $appid)){
			die('param error');
		}
		if(!is_null($id) && !preg_match($mode, $id)){
			die('param error');
		}
		$apps_row = $this->admin_model->get_apps_row_by_id($appid);
		if(is_null($apps_row)){
			die('appid error');
		}
		// 保存
		if(!empty($_POST)){
			$version = $this->input->post('version');
			$code = $this->input->post('code');
			$content_cn = $this->input->post('content_cn');
			$content_en = $this->input->post('content_en');
			if(empty($version) || !preg_match($mode, $code) || empty($content_cn)){
				$data['errcode'] = 1;
				$data['errmsg'] = '内容不能为空 或 内容不正确';
			}else{

				/* 上传开始 */
				$config['upload_path'] = FCPATH.$this->app_path;
				$config['file_name'] = "{$this->filename_prefix}__p{$appid}__v{$version}.apk";
				$config['allowed_types'] = 'apk';
				$config['overwrite'] = true;  // 覆盖已存在
				$this->load->library('upload', $config);
				$state = $this->upload->do_upload('apkfile');
				$image = $state?$this->upload->data():null;
				/* 上传结束 */

				if(is_null($id)){
					// 新增
					if($state==false){
						$data['errcode'] = 2;
						$data['errmsg'] = $this->upload->display_errors('', '');
					}else{
						$this->admin_model->add_versions($appid, $image);
						// 返回列表
						$base_url = $this->config->item('base_url');
						header("Location: {$base_url}admin/version_list/{$appid}");
						return;
					}
				}else{
					// 修改
					$row = $this->admin_model->get_versions_row_by_id($id);
					if(is_null($row)){
						die('id not exist');
					}
					// 如果变更了文件名，删除旧apk
					if(!is_null($image) && $row->file_name!=$image['file_name']){
						$file = FCPATH.$this->app_path.'/'.$row->file_name;
						@unlink($file);
					}
					// 更新数据
					$this->admin_model->set_versions($id, $image);
					$data['errcode'] = 0;
					$data['errmsg'] = '修改成功';
				}
			}
		}
		// 显示
		if(is_null($id)){
			$data['title'] = '新增版本';
		}else{
			$data['title'] = '编辑版本';
			$data['row'] = $this->admin_model->get_versions_row_by_id($id);
		}
		$data['user']= $user;
		$data['appid'] = $appid;
		$data['app_name'] = $apps_row->name;
		$data['base_url'] = $this->config->item('base_url');
		$this->load->view('admin_header.php', $data);
		$this->load->view('admin_sidebar_version.php');
		$this->load->view('admin_version_edit.php');
		$this->load->view('admin_footer.php');
	}

	public function app_delete( $id ){
		$user = $this->session->user;
		if(empty($user)){
			// 返回首页
			$base_url = $this->config->item('base_url');
			header("Location: {$base_url}admin");
		}
		$mode = "/^[0-9]+$/";  // 正则
		if(!preg_match($mode, $id)){
			die('param error');
		}
		$this->admin_model->remove_apps($id);
		// 返回列表
		$base_url = $this->config->item('base_url');
		header("Location: {$base_url}admin/app_list");
	}

	public function version_delete( $id ){
		$user = $this->session->user;
		if(empty($user)){
			// 返回首页
			$base_url = $this->config->item('base_url');
			header("Location: {$base_url}admin");
		}
		$mode = "/^[0-9]+$/";  // 正则
		if(!preg_match($mode, $id)){
			die('param error');
		}
		$row = $this->admin_model->get_versions_row_by_id($id);
		if(is_null($row)){
			die('id not exist');
		}
		// 删除apk与id
		$file = FCPATH.$this->app_path.'/'.$row->file_name;
		@unlink($file);
		$this->admin_model->remove_versions($id);
		// 返回列表
		$base_url = $this->config->item('base_url');
		header("Location: {$base_url}admin/version_list/{$row->apps_id}");
	}

	public function change_pwd(){
		$user = $this->session->user;
		if(empty($user)){
			// 返回首页
			$base_url = $this->config->item('base_url');
			header("Location: {$base_url}admin");
		}
		if(!empty($_POST)){
			$pwd = $this->input->post('pwd');
			$npwd = $this->input->post('npwd');
			$cpwd = $this->input->post('cpwd');
			if(empty($pwd) || empty($npwd) || empty($cpwd)){
				$data['errcode'] = 1;
				$data['errmsg'] = '表单不能为空';
			}else{
				if($npwd!=$cpwd){
					$data['errcode'] = 2;
					$data['errmsg'] = '新密码与重复新密码不一至';
				}else{
					if(sha1($pwd)!=$user['password']){
						$data['errcode'] = 3;
						$data['errmsg'] = '原密码错误';
					}else{
						$this->admin_model->set_manager($user['id']);
						$data['errcode'] = 0;
						$data['errmsg'] = '修改密码成功';
					}
				}
			}
		}
		$data['title'] = '修改密码';
		$data['user']= $user;
		$data['base_url'] = $this->config->item('base_url');
		$this->load->view('admin_header.php', $data);
		$this->load->view('admin_sidebar_main.php');
		$this->load->view('admin_change_pwd.php');
		$this->load->view('admin_footer.php');
	}

	public function quit(){
		session_destroy();
		$base_url = $this->config->item('base_url');
		header("Location: {$base_url}admin");
	}

}
