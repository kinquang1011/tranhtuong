<?php
class Menu extends CI_Model{
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}
	public  function getAllMenu(){
		$strsql = "select menu_id,menu_name,url_img from menu ";
		$query = $this->db->query($strsql);
		$re =  $query->result_array();
		return $re;
	}
}
?>