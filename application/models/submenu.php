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

}
