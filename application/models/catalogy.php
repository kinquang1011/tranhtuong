<?php
class Catalogy extends CI_Model {

	public function __construct(){
		parent::__construct();
		$this->load->database();
		
	}
	public function getAllCatalogy($sub_id){
		$strsql = "SELECT * FROM CATALOGY WHERE SUB_ID = '$sub_id'  order by rand() limit 4";
		$query = $this->db->query($strsql);
		$re=  $query->result_array();
		return $re;
	}

}
