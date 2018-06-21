<?php
class Catalogy extends CI_Model {

	public function __construct(){
		parent::__construct();
		$this->load->database();
		
	}
	public function get4Catalogy($sub_id){
		$strsql = "SELECT * FROM CATALOGY WHERE SUB_ID = '$sub_id'  order by rand() limit 4";
		$query = $this->db->query($strsql);
		$re=  $query->result_array();
		return $re;
	}
	
	public function getAllCatalogy($sub_id){
		$strsql = "SELECT * FROM CATALOGY WHERE SUB_ID = '$sub_id' ";
		$query = $this->db->query($strsql);
		$re=  $query->result_array();
		return $re;
	}
	public function deleteImage($imgId){
		$strsql = "DELETE FROM CATALOGY WHERE CATALOGY_ID ='$imgId' LIMIT 1";
	   	$query = $this->db->query($strsql);
        return $query;
	}
	public function addImage($data){
		$insert = $this->db->insert_batch('catalogy',$data);
        return $insert?true:false;
	}

}
