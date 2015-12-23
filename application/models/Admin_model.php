<?php

class Admin_model extends CI_Model {

	function __construct(){
		parent::__construct();
	}

	function get_manager_row_by_verify(){
		$this->db->select('*');
		$this->db->from('manager');
		$this->db->where('account', $this->input->post('account'));
		$this->db->where('password', sha1($this->input->post('password')));
		$query = $this->db->get();
		if( $query->num_rows()==0 )
			return NULL;
		return $query->row_array();
	}

	function get_apps_row_by_id( $id ){
		$this->db->select('*');
		$this->db->from('apps');
		$this->db->where('id', $id);
		$query = $this->db->get();
		if( $query->num_rows()==0 )
			return NULL;
		return $query->row();
	}

	function get_versions_row_by_id( $id ){
		$this->db->select('*');
		$this->db->from('versions');
		$this->db->where('id', $id);
		$query = $this->db->get();
		if( $query->num_rows()==0 )
			return NULL;
		return $query->row();
	}

	function get_versions_rows_by_latest($appid, $per_page, $row){
		// 查询
		$this->db->select('*');
		$this->db->from('versions');
		$this->db->where('apps_id', $appid);
		$this->db->order_by('id', 'DESC');
		$this->db->limit($per_page, $row);
		$query = $this->db->get();
		// 计数
		$this->db->select('*');
		$this->db->from('versions');
		$this->db->where('apps_id', $appid);
		$total_rows = $this->db->count_all_results();
		// 返回
		return array( 'query'=>$query, 'total_rows'=>$total_rows );
	}

	function get_apps_rows_by_all(){
		$this->db->select('*');
		$this->db->from('apps');
		$this->db->order_by('sort', 'DESC');
		return $this->db->get();
	}

	function add_apps(){
		$data = array(
			'name' => $this->input->post('name') ,
			'desc' => $this->input->post('desc') ,
			'sort' => (int)$this->input->post('sort') ,
			'datetime' => date('Y-m-d H:i:s')
		);
		$this->db->insert('apps', $data);
		return $this->db->insert_id();
	}

	function add_versions( $appid, $image ){
		$data = array(
			'apps_id' => $appid ,
			'file_name' => $image['file_name'] ,
			'version' => $this->input->post('version') ,
			'code' => $this->input->post('code') ,
			'file_size' => $image['file_size']*1024 ,
			'content_cn' => $this->input->post('content_cn') ,
			'content_en' => $this->input->post('content_en') ,
			'compel' => (int)$this->input->post('compel') ,
			'datetime' => date('Y-m-d H:i:s')
		);
		$this->db->insert('versions', $data);
		return $this->db->insert_id();
	}

	function set_apps( $id ){
		$data = array(
			'name' => $this->input->post('name') ,
			'desc' => $this->input->post('desc') ,
			'sort' => (int)$this->input->post('sort') ,
			'datetime' => date('Y-m-d H:i:s')
		);
		$this->db->where_in('id', $id);
		$this->db->update('apps', $data);
		return $this->db->affected_rows();
	}

	function set_versions( $id, $image ){
		$data = array(
			'version' => $this->input->post('version') ,
			'code' => $this->input->post('code') ,
			'content_cn' => $this->input->post('content_cn') ,
			'content_en' => (string)$this->input->post('content_en') ,
			'compel' => (int)$this->input->post('compel') ,
			'datetime' => date('Y-m-d H:i:s')
		);
		if(!is_null($image)){
			$data['file_name'] = $image['file_name'];
			$data['file_size'] = $image['file_size']*1024;
		}
		$this->db->where_in('id', $id);
		$this->db->update('versions', $data);
		return $this->db->affected_rows();
	}

	function set_manager( $id ){
		$data = array(
			'password' => sha1($this->input->post('npwd'))
		);
		$this->db->where_in('id', $id);
		$this->db->update('manager', $data);
		return $this->db->affected_rows();
	}

	function remove_versions( $id ){
		$this->db->where('id', $id);
		$this->db->delete('versions');
		return $this->db->affected_rows();
	}

	function remove_apps( $id ){
		$this->db->where('id', $id);
		$this->db->delete('apps');
		return $this->db->affected_rows();
	}

}
