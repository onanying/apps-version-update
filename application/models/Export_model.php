<?php

class Export_model extends CI_Model {

	function __construct(){
		parent::__construct();
	}

	function get_versions_row_by_newest( $appid ){
		$this->db->select('*');
		$this->db->from('versions');
		$this->db->where('apps_id', $appid);
		$this->db->order_by('id', 'DESC');
		$this->db->limit(1, 0);
		$query = $this->db->get();
		if( $query->num_rows()==0 )
			return NULL;
		return $query->row();
	}

}
