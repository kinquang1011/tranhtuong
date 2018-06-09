<?php
class Submenu extends CI_Model {

	public function __construct(){
		parent::__construct();
		$this->load->database();
	}
	public function getSubMenu($menuId){
		$strsql = "select * from submenu where menu_id ='$menuId' ";
		$query = $this->db->query($strsql);
		return $query->result_array();
	}
	public function getSubMenuBySubId($sub_id){
		$strsql = "select sub_name,description from submenu where sub_id ='$sub_id' ";
		$query = $this->db->query($strsql);
		return $query->result_array();
	}

}
